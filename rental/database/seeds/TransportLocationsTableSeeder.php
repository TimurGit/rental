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
        $arrayPoints = [];
//        Всего 5 тысяч точек
        for ($i=1;$i<=5000; $i++)
        {
            $arrayPoints[$i]['lat'] = $facker->randomFloat(4,-90,90);
            $arrayPoints[$i]['lon'] = $facker->randomFloat(4,-180,180);
        }

        foreach ($transports as $transport)
        {
            $countPoints = $facker->numberBetween(20,100);
//            $lat = $facker->randomFloat(14,-90,90);
//            $lon = $facker->randomFloat(14,-180,180);
            $start = $facker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get());
            for ($i = 1; $i <= $countPoints; $i++) {

                $randomArrayPoints = $facker->numberBetween(1,5000);

                $days = $facker->numberBetween($min = 1, $max = 10);
                $finished = $facker->dateTimeInInterval($startDate = $start, $interval = '+ '.$days.' minutes', $timezone = date_default_timezone_get());

                \App\Models\TransportLocation::create([
                    'transport_id'=>$transport->id,
                    'lat'=>$arrayPoints[$randomArrayPoints]['lat'],
                    'lon'=>$arrayPoints[$randomArrayPoints]['lon'],
                    'created_at'=> $start,
                    'finished_at'=> $finished
                ]);
                $start = $finished;
//                $lat += $facker->randomFloat(4,-1,1);
//                $lon += $facker->randomFloat(4,-1,1);

            }
        }
    }
}
