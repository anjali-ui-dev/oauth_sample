<?php namespace App\Logic\User;

use App\Models\Role;
use App\Models\User;
use App\Models\Password;
use Hash, Carbon\Carbon;

class UserRepository {

    public function __construct()
    {
    }

    public function register( $data )
    {

        $user = new User;
        $user->email            = $data['email'];
        $user->first_name       = ucfirst($data['first_name']);
        $user->last_name        = ucfirst($data['last_name']);
        $user->password         = Hash::make($data['password']);
        $user->save();

        //Assign Role
        $role = Role::whereName('user')->first();
        $user->assignRole($role);

    }

    public function update( $user, $data )
    {

        $user->email            = $data['email'];
        $user->first_name       = ucfirst($data['first_name']);
        $user->last_name        = ucfirst($data['last_name']);
        $user->password         = Hash::make($data['password']);

        $user->save();
    }
}