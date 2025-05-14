<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermalinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run(): void
    {

        DB::table('permalinks')->truncate();

        DB::table('permalinks')->insert(array(
            0  =>
                array(
                    'id'        => 1,
                    'permalink' => 'services',
                    'type'      => 'services',
                    'details'   => 0,
                ),
            1  =>
                array(
                    'id'        => 2,
                    'permalink' => 'service',
                    'type'      => 'service_details',
                    'details'   => 1,
                ),
            2  =>
                array(
                    'id'        => 3,
                    'permalink' => 'functions',
                    'type'      => 'portfolios',
                    'details'   => 0,
                ),
            3  =>
                array(
                    'id'        => 4,
                    'permalink' => 'function',
                    'type'      => 'portfolio_details',
                    'details'   => 1,
                ),
            4  =>
                array(
                    'id'        => 5,
                    'permalink' => 'teams',
                    'type'      => 'team',
                    'details'   => 0,
                ),
            5  =>
                array(
                    'id'        => 6,
                    'permalink' => 'blogs',
                    'type'      => 'blogs',
                    'details'   => 0,
                ),
            6  =>
                array(
                    'id'        => 7,
                    'permalink' => 'blog',
                    'type'      => 'blog_details',
                    'details'   => 1,
                ),
            7  =>
                array(
                    'id'        => 8,
                    'permalink' => 'contact',
                    'type'      => 'contact',
                    'details'   => 0,
                ),
            8  =>
                array(
                    'id'        => 9,
                    'permalink' => 'login',
                    'type'      => 'login',
                    'details'   => 0,
                ),
            9  =>
                array(
                    'id'        => 10,
                    'permalink' => 'register',
                    'type'      => 'register',
                    'details'   => 0,
                ),
            10 =>
                array(
                    'id'        => 11,
                    'permalink' => 'forget-password',
                    'type'      => 'forget_password',
                    'details'   => 0,
                ),
            11 =>
                array(
                    'id'        => 12,
                    'permalink' => 'admin',
                    'type'      => 'admin_login',
                    'details'   => 0,
                ),
            13 =>
                array(
                    'id'        => 13,
                    'permalink' => 'careers',
                    'type'      => 'career',
                    'details'   => 0,
                ),
            14 =>
                array(
                    'id'        => 14,
                    'permalink' => 'career',
                    'type'      => 'career_details',
                    'details'   => 0,
                ),
        ));

    }
}
