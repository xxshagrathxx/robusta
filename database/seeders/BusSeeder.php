<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buses = [[
            'name' => 'Bus 1',
            'trip_id' => 1,
            'total_seats' => 12,
        ],[
            'name' => 'Bus 2',
            'total_seats' => 12,
        ],[
            'name' => 'Bus 3',
            'total_seats' => 12,
        ]];

        foreach($buses as $bus){
            $createdBus = Bus::create($bus);

            for ($i = 1; $i <= $createdBus->total_seats; $i++) { 
                Seat::create([
                    'bus_id' => $createdBus->id,
                    'seat_number' => $i,
                ]);
            }
        }
    }
}
