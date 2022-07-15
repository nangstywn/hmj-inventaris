<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin HMJ TI',
            'username' => 'adminTI',
            'level' => 'admin-ti',
            'email' => 'adminTI@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        DB::table('users')->insert([
            'name' => 'Admin HMJ SI',
            'username' => 'adminSI',
            'level' => 'admin-si',
            'email' => 'adminSI@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        DB::table('users')->insert([
            'name' => 'Admin HMJ TK',
            'username' => 'adminTK',
            'level' => 'admin-tk',
            'email' => 'adminTK@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        DB::table('users')->insert([
            'name' => 'Admin HMJ MI',
            'username' => 'adminMI',
            'level' => 'admin-mi',
            'email' => 'adminMI@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        DB::table('users')->insert([
            'name' => 'Admin HMJ KA',
            'username' => 'adminKA',
            'level' => 'admin-ka',
            'email' => 'adminKA@gmail.com',
            'password' => bcrypt('admin123')
        ]);
    }
}