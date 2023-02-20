<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trips')->insert([
            "trip_date" => Carbon::tomorrow(),
            "pickup_id" => 1,
            "destination_id" =>2,
            'created_at' =>  Carbon::now(),
            'updated_at' =>  Carbon::now(),
        ]);
        DB::table('trips')->insert([
            "trip_date" => Carbon::tomorrow(),
            "pickup_id" => 1,
            "destination_id" =>3,
            'created_at' =>  Carbon::now(),
            'updated_at' =>  Carbon::now(),
        ]);
    }
}
