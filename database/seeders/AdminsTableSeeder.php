<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{

    /**
     * Seeder for Easy Website Setup for News Portal
     *
     * @return void
     */
    public function run(): void
    {

        DB::table('admins')->truncate();

        DB::table('admins')->insert(array(
            0 =>
                array(
                    'id'         => 1,
                    'role_id'    => NULL,
                    'username'   => 'super-admin',
                    'email'      => 'admin@wom.com.np',
                    'first_name' => 'Super Admin',
                    'last_name'  => '',
                    'image'      => '',
                    'password'   => bcrypt('PassWord1'),
                    'status'     => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
            1 =>
                array(
                    'id'         => 2,
                    'role_id'    => 2,
                    'username'   => 'content-manager',
                    'email'      => 'manager@wom.com.np',
                    'first_name' => 'Content Manager',
                    'last_name'  => '',
                    'image'      => '',
                    'password'   => bcrypt('PassWord1'),
                    'status'     => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
        ));
    }
}
