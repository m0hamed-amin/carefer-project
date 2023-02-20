<?php

namespace Database\Seeders;

use App\Http\Constants\BussesConstants;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BussesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('busses')->insert([
            'bus_type' => BussesConstants::LONGTRIPBUS,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('busses')->insert([
            'bus_type' => BussesConstants::SHORTTRIPBUS,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
