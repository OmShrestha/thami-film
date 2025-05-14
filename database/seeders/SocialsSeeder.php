<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socials = [
            [
                'icon'          => 'fab fa-facebook-f',
                'url'           => 'https://www.facebook.com/wom.marketer',
                'serial_number' => 1
            ],
            [
                'icon'          => 'fab fa-youtube',
                'url'           => 'https://www.youtube.com/@wom.academy',
                'serial_number' => 1
            ],
            [
                'icon'          => 'fab fa-linkedin-in',
                'url'           => 'https://www.instagram.com/wom.marketer',
                'serial_number' => 1
            ],
            [
                'icon'          => 'fas fa-envelope',
                'url'           => 'mailto:contact@ntcs.com',
                'serial_number' => 3
            ]
        ];

        foreach ($socials as $social) {
            \App\Models\Social::create($social);
        }
    }
}
