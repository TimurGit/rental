<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(MarksTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(TransportsTableSeeder::class);
         $this->call(OpportunitiesTableSeeder::class);
         $this->call(TransportLocationsTableSeeder::class);
    }
}
