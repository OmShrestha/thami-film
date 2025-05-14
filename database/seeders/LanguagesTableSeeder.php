<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Seeder for Easy Website Setup for News Portal
     *
     * @return void
     */
    public function run(): void
    {

        // DB::table('languages')->truncate();

        DB::table('languages')->insert(array(
            0 =>
                array(
                    'id'         => 1,
                    'name'       => 'English',
                    'code'       => 'en',
                    'is_default' => 1,
                    'rtl'        => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ),
        ));
    }
}
