<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'mobile' => '1234567890',
            'password' => bcrypt('12345678')
        ]);
    }
}
