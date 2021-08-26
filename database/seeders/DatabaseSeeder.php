<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Social;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'name'=> 'Super Admin',
            'email'=> 'admin@admin.com',
            'password'=> bcrypt('password'),
            'image'=> '',
            'address'=> 'Bharatpur',
        ]);
        Social::insert([
            'facebook'=> '',
        ]);
    }
}
