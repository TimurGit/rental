<?php

use Illuminate\Database\Seeder;

class TransportLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transports = \App\Models\Transport::all();
        $facker = Faker\Factory::create();
        foreach ($transports as $transport)
        {
            $countPoints = $facker->numberBetween(20,100);
            $lat = $facker->randomFloat(14,-90,90);
            $lon = $facker->randomFloat(14,-180,180);

            for ($i = 1; $i <= $countPoints; $i++) {

                \App\Models\TransportLocation::create([
                    'transport_id'=>$transport->id,
                    'lat'=>$lat,
                    'lon'=>$lon
                ]);
                $lat += $facker->randomFloat(14,-1,1);
                $lon += $facker->randomFloat(14,-1,1);

            }
        }
    }
}
