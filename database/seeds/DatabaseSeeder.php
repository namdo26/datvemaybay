<?php

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
        // $this->call(UserSeeder::class);
        $this->call(permissionSeeder::class);
        $this->call(seatClassSeeder::class);
        $this->call(citySectorSeeder::class);
    }
}
