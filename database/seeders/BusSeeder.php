<?php

namespace Database\Seeders;

use App\Models\Bus;
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
        ],[
            'name' => 'Bus 2',
        ],[
            'name' => 'Bus 3',
        ]];

        foreach($buses as $bus){
            Bus::create($bus);
        }
    }
}
