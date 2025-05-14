<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LanguagesTableSeeder::class);
        $this->call(TimezonesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(PermalinksTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(BasicSettingsTableSeeder::class);
        $this->call(SocialsSeeder::class);
        $this->call(EmailTemplatesSeeder::class);
    }
}
