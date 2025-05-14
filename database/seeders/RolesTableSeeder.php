<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run(): void
    {

        DB::table('roles')->delete();

        DB::table('roles')->insert(array(
            0 =>
                array(
                    'id'          => 1,
                    'name'        => 'Super Admin',
                    'permissions' => '["Dashboard", "Theme & Home", "Menu Builder", "Content Management", "Pages","Users Management","Basic Settings","Admins Management","Client Feedbacks","Contacts"]',
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ),
            1 =>
                array(
                    'id'          => 2,
                    'name'        => 'Content Manager',
                    'permissions' => '["Dashboard","Content Management","Pages","Client Feedbacks"]',
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ),
        ));
    }
}
