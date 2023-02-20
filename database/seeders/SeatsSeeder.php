<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('seats')->insert([
                'seat_name' =>"A".$i ,
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now(),
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('seats')->insert([
                'seat_name' =>"B".$i ,
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now(),
            ]);
        }
    }
}
