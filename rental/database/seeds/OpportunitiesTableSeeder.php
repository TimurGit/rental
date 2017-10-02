<?php

use Illuminate\Database\Seeder;

class OpportunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Opportunity::class, 5000)->create();
    }
}
