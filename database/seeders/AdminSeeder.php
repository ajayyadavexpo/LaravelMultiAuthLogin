<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name'  => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password')
        ];
        User::create($user);

        $admin = [
            ['name'  => 'Admin','email' => 'admin@admin.com','password' =>bcrypt('password')],
            ['name'  => 'Editor','email' => 'editor@editor.com','password' =>bcrypt('password')],
            ['name'  => 'Author','email' => 'author@author.com','password' =>bcrypt('password')],
        ];
        Admin::insert($admin);

        Role::insert([
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'Editor','slug'=>'editor'],
            ['name'=>'Author','slug'=>'author'],
        ]);

        Permission::insert([
            ['name'=>'Add Post','slug'=>'add-post'],
            ['name'=>'Delete Post','slug'=>'delete-post'],
        ]);

        // Assign Role 
        Admin::whereId(1)->first()->roles()->attach([1]);
        Admin::whereId(2)->first()->roles()->attach([2]);
        Admin::whereId(3)->first()->roles()->attach([3]);

        // Role has Permission
        Role::whereId(1)->first()->permissions()->attach([1,2]);
        Role::whereId(2)->first()->permissions()->attach([1]);
        Role::whereId(3)->first()->permissions()->attach([1]);

    }
}
