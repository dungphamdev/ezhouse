<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // check if new coming user is first or single
        $cnt = User::count();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($cnt === 0)
        {
            $perms_cnt = Permission::count();

            if ($perms_cnt === 0)
            {
                Permission::insert([
                    ["name" => 'permission.show', "title" => 'permission.show', "guard_name" => 'web'],
                    ["name" => 'permission.edit', "title" => 'permission.edit', "guard_name" => 'web'],
                    ["name" => 'permission.add', "title" => 'permission.add', "guard_name" => 'web'],
                    ["name" => 'permission.delete', "title" => 'permission.delete', "guard_name" => 'web'],

                    ["name" => 'roles.show', "title" => 'roles.show', "guard_name" => 'web'],
                    ["name" => 'roles.edit', "title" => 'roles.edit', "guard_name" => 'web'],
                    ["name" => 'roles.add', "title" => 'roles.add', "guard_name" => 'web'],
                    ["name" => 'roles.delete', "title" => 'roles.delete', "guard_name" => 'web'],

                    ["name" => 'user.show', "title" => 'user.show', "guard_name" => 'web'],
                    ["name" => 'user.edit', "title" => 'user.edit', "guard_name" => 'web'],
                    ["name" => 'user.add', "title" => 'user.add', "guard_name" => 'web'],
                    ["name" => 'user.delete', "title" => 'user.delete', "guard_name" => 'web'],
                ]);
            }

            $role_cnt = Role::count();

            if ($role_cnt === 0)
            {
                Role::create([
                    'name' => 'Super Admin',
                    'title' => 'Super Admin',
                    'guard_name' => 'web'
                ]);
            }

            $user->assignRole('Super admin');
        }

        return $user;
    }
}
