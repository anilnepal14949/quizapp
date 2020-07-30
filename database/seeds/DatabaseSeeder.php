<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('admin123');
        $admin->visible_password = 'admin123';
        $admin->email_verified_at = NOW();
        $admin->occupation = 'CEO';
        $admin->address = 'Australia';
        $admin->phone = '0125478950';
        $admin->is_admin = 1;
        $admin->save();
    }
}
