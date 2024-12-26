<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->truncate();
        $admin = Admin::create([
            'name' => 'super admin',
            'email' => 'super@admin.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->addRole('super_admin');
    }
}
