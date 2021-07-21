<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'dungpt',
            'email' => 'dungpt@gmail.com',
            'password' => Hash::make('admin123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'landlord',
            'email' => 'landlord@gmail.com',
            'password' => Hash::make('admin123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'renter',
            'email' => 'renter@gmail.com',
            'password' => Hash::make('admin123456'),
        ]);


        DB::table('permissions')->insert([
            ['name' => 'permission.show', 'title' => 'Xem quyền', 'guard_name' => 'web'],
            ["name" => 'permission.edit', "title" => 'Sửa quyền', "guard_name" => 'web'],
            ["name" => 'permission.add', "title" => 'Thêm quyền', "guard_name" => 'web'],
            ["name" => 'permission.delete', "title" => 'Xóa quyền', "guard_name" => 'web'],

            ["name" => 'roles.show', "title" => 'Xem nhóm quyền', "guard_name" => 'web'],
            ["name" => 'roles.edit', "title" => 'Sửa nhóm quyền', "guard_name" => 'web'],
            ["name" => 'roles.add', "title" => 'Thêm nhóm quyền', "guard_name" => 'web'],
            ["name" => 'roles.delete', "title" => 'Xóa nhóm quyền', "guard_name" => 'web'],

            ["name" => 'user.show', "title" => 'Xem người dùng', "guard_name" => 'web'],
            ["name" => 'user.edit', "title" => 'Sửa người dùng', "guard_name" => 'web'],
            ["name" => 'user.add', "title" => 'Thêm người dùng', "guard_name" => 'web'],
            ["name" => 'user.delete', "title" => 'Xóa người dùng', "guard_name" => 'web']
        ]);

        DB::table('roles')->insert([
            ['name' => 'Super Admin', 'title' => 'Super Admin', 'guard_name' => 'web'],
            ['name' => 'landlord', 'title' => 'LandLord', 'guard_name' => 'web'],
            ['name' => 'renter', 'title' => 'Renter', 'guard_name' => 'web'],
        ]);

        $admin = User::find(1);
        $admin->assignRole('Super Admin');

        $landlord = User::find(2);
        $landlord->assignRole('landlord');

        $renter = User::find(3);
        $renter->assignRole('renter');

    }
}
