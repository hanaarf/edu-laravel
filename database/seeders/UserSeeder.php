<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'super.admin',
                'email' => 'spradmn@gmail.com',
                'role' => 1,
                'bio' => 'hi im admin',
                'password' => bcrypt('123456')
            ),
            array(
                'name' => 'master.teacher',
                'email' => 'msteacher@gmail.com',
                'role' => 2,
                'bio' => 'hi im teacher',
                'password' => bcrypt('123456')
            ),
            array(
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'role' => 3,
                'bio' => 'hi im user',
                'password' => bcrypt('123456')
            ),
        ));
    }
}
