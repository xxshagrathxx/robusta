<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trip::create([
            'from_city_id' => 1,
            'to_city_id' => 5,
            'via_city_ids' => "[2,3,4]",
            'bus_id' => 1,
        ]);
    }
}
