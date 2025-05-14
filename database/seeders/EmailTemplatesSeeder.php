<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('email_templates')->truncate();

        DB::table('email_templates')->insert(array(
            0 =>
                array(
                    'email_type'    => 'welcome_email',
                    'email_subject' => 'Welcome to {website_title}',
                    'email_body'    => '<p style="line-height: 1.6;">Hello<b> {customer_username}</b>,</p><p style="line-height: 1.6;"><br></p><p style="line-height: 1.6;">Welcome to&nbsp;<span style="font-size: medium;"><b>{website_title}</b>.</span><br></p><p><br></p><p>Best Regards,</p><p>{website_title}</p>',
                ),
            1 =>
                array(
                    'email_type'    => 'subscription_email',
                    'email_subject' => 'Thank you for subscribing to our newsletter',
                    'email_body'    => '<p style="line-height: 1.6;">Hello<b></b>,</p><p style="line-height: 1.6;"><br></p><p style="line-height: 1.6;">Thank you for subscribing to our newsletter.</p><p><br></p><p>Best Regards,</p><p>{website_title}</p>',
                ),
        ));
    }
}
