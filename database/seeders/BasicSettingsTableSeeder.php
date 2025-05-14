<?php

namespace Database\Seeders;

use App\Models\BasicSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasicSettingsTableSeeder extends Seeder
{
    /**
     * Change this version when you update the theme
     */
    const THEME_VERSION = 'wom-marketing';
    const WEBSITE_TITLE = 'Wom Marketing Inc. Pvt. Ltd';

    /**
     * Seeder for Easy Website Setup
     * @return void
     * @author Sushant P <sushantp.com>
     *
     */
    public function run(): void
    {
//        DB::table('basic_settings')->truncate();

        $settings = [
            [
                'name'  => 'theme_version',
                'value' => self::THEME_VERSION
            ],
            [
                'name'  => 'home_version',
                'value' => 'static'
            ],
            [
                'name'  => 'favicon',
                'value' => ''
            ],
            [
                'name'  => 'logo',
                'value' => ''
            ],
            [
                'name'  => 'website_title',
                'value' => self::WEBSITE_TITLE
            ],
            [
                'name'  => 'primary_color',
                'value' => '9A1F33'
            ],
            [
                'name'  => 'secondary_color',
                'value' => '353368'
            ],
            [
                'name'  => 'support_email',
                'value' => 'contact@ntcs.com'
            ],
            [
                'name'  => 'support_address',
                'value' => 'Tinkune, Kathmandu, Nepal 44600'
            ],
            [
                'name'  => 'support_phone',
                'value' => '9804400000'
            ],
            [
                'name'  => 'breadcrumb',
                'value' => ''
            ],
            [
                'name'  => 'footer_logo',
                'value' => ''
            ],
            [
                'name'  => 'footer_text',
                'value' => 'Welcome to our website.'
            ],
            [
                'name'  => 'newsletter_text',
                'value' => 'Subscribe to get the latest news and updates from us.'
            ],
            [
                'name'  => 'copyright_text',
                'value' => '<p><span style="font-size: 14px;font-family: Calibri, sans-serif;">Copyright © 2024. All rights reserved</span></p>'
            ],
            [
                'name'  => 'cta_bg',
                'value' => ''
            ],
            [
                'name'  => 'cta_section_text',
                'value' => '<strong>ONE CALL DOES IT ALL</strong>'
            ],
            [
                'name'  => 'cta_section_button_text',
                'value' => 'Contact Us'
            ],
            [
                'name'  => 'cta_section_button_url',
                'value' => '/contact'
            ],
            [
                'name'  => 'contact_form_title',
                'value' => 'Contact us'
            ],
            [
                'name'  => 'contact_form_subtitle',
                'value' => 'Fill up the Information.'
            ],
            [
                'name'  => 'google_analytics_script',
                'value' => NULL
            ],
            [
                'name'  => 'dynamic_css',
                'value' => ''
            ],
            [
                'name'  => 'is_recaptcha',
                'value' => 1
            ],
            [
                'name'  => 'google_recaptcha_site_key',
                'value' => ''
            ],
            [
                'name'  => 'google_recaptcha_secret_key',
                'value' => ''
            ],
            [
                'name'  => 'is_testimonial',
                'value' => 1
            ],
            [
                'name'  => 'is_analytics',
                'value' => 0
            ],
            [
                'name'  => 'maintenance_mode',
                'value' => 0
            ],
            [
                'name'  => 'maintenance_text',
                'value' => 'We are upgrading our site. We will be back soon. Thank you.'
            ],
            [
                'name'  => 'secret_path',
                'value' => 'secretpath'
            ],
            [
                'name'  => 'error_title',
                'value' => '404 Not Found'
            ],
            [
                'name'  => 'error_subtitle',
                'value' => 'Oops! Looks like you\'re lost'
            ],
            [
                'name'  => 'dynamic_js',
                'value' => ''
            ],
            [
                'name'  => 'timezone',
                'value' => 'Asia/Kathmandu'
            ],
            [
                'name'  => 'preloader_status',
                'value' => 0
            ],
            [
                'name'  => 'preloader',
                'value' => ''
            ],
            [
                'name'  => 'is_admin_dark',
                'value' => 0
            ],
            [
                'name'  => 'is_user_panel',
                'value' => 1
            ],
            [
                'name'  => 'is_facebook_login',
                'value' => 1
            ],
            [
                'name'  => 'facebook_app_id',
                'value' => NULL
            ],
            [
                'name'  => 'facebook_app_secret',
                'value' => NULL
            ],
            [
                'name'  => 'is_google_login',
                'value' => 1
            ],
            [
                'name'  => 'google_client_id',
                'value' => NULL
            ],
            [
                'name'  => 'google_client_secret',
                'value' => NULL
            ],
            [
                'name'  => 'to_mail',
                'value' => ''
            ],
            [
                'name'  => 'is_facebook_pixel',
                'value' => 0
            ],
            [
                'name'  => 'facebook_pixel_script',
                'value' => NULL
            ],
            [
                'name'  => 'menu_section',
                'value' => 1
            ],
            [
                'name'  => 'instagram_section',
                'value' => 1
            ],
            [
                'name'  => 'map_section',
                'value' => 1
            ],
            [
                'name'  => 'categories_section',
                'value' => 1
            ],
            [
                'name'  => 'blogs_meta_keywords',
                'value' => 'blogs, news, articles, posts'
            ],
            [
                'name'  => 'blogs_meta_description',
                'value' => 'Read the latest blogs, news, articles, and posts from our website.'
            ],
            [
                'name'  => 'services_meta_keywords',
                'value' => 'services, products, offers, deals'
            ],
            [
                'name'  => 'services_meta_description',
                'value' => 'Get the best services, products, offers, and deals from our website.'
            ],
            [
                'name'  => 'portfolios_meta_keywords',
                'value' => 'portfolios, projects, works, designs'
            ],
            [
                'name'  => 'portfolios_meta_description',
                'value' => 'View the best portfolios, projects, works, and designs from our website.'
            ],
            [
                'name'  => 'contact_meta_keywords',
                'value' => 'contact, address, phone, email'
            ],
            [
                'name'  => 'contact_meta_description',
                'value' => 'Contact us for any queries, address, phone, and email.'
            ],
            [
                'name'  => 'about_meta_keywords',
                'value' => 'about, company, team, history'
            ],
            [
                'name'  => 'about_meta_description',
                'value' => 'Know about our company, team, and history.'
            ],
        ];

        foreach ($settings as $setting) {

            if (BasicSetting::where('name', $setting['name'])->exists()) {
                continue;
            }

            $setting['language_id'] = 1;
            DB::table('basic_settings')->insert($setting);
        }
    }
}
