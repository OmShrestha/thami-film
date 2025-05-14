<?php

namespace Database\Seeders;

use App\Models\Permission;
use DB;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->truncate();

        $permissions = [
            'Dashboard',
            'Analytics',
            'Theme and Home',
            'Menu Builder',
            'Content Management',
            'Pages',
            'Users Management',
            'Basic Settings',
            'Admins Management',
            'Client Feedbacks',
            'Contacts',
        ];

        foreach ($permissions as $permission) {
            Permission::insert([
                'name'        => $permission,
                'identifier'  => make_slug($permission),
                'description' => 'Perform ' . $permission . ' operations',
                'is_active'   => true,
                'created_by'  => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
