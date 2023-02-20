<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=10; $i++){
            DB::table('booking')->insert([
                "user_id" => $i+1 ,
                "bus_id" => 1,
                "trip_id" =>2,
                "seat_id" =>$i+1,
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now(),
            ]);
        }
    }
}
