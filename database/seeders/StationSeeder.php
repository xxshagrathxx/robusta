<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = [[
            'name' => 'Cairo',
        ],[
            'name' => 'Giza',
        ],[
            'name' => 'AlFayyum',
        ],[
            'name' => 'AlMinya',
        ],[
            'name' => 'Asyut',
        ]];

        foreach($stations as $station){
            Station::create($station);
        }
    }
}
