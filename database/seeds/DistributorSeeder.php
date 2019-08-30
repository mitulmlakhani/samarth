<?php

use Illuminate\Database\Seeder;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Distributor::create([
            'name' => 'admin',
            'email' => 'admin@distributor.com',
            'mobile' => '1234567890',
            'password' => bcrypt('12345678')
        ]);
    }
}
