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
        //factory(\App\User::class)->create();
        //$this->call(CompanySeeder::class);
        factory(\App\Model\Room::class, 100)->create();
    }
}
