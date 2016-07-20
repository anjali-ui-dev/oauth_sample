<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder{

    public function run(){
        DB::table('users')->delete();

        $userRole = Role::whereName('user')->first();

        $user = User::create(array(
            'first_name'    => 'Anjali',
            'last_name'     => 'Jain',
            'email'         => 'anjali8jain@gmail.com',
            'password'      => Hash::make('password')
        ));
        $user->assignRole($userRole);
    }
}