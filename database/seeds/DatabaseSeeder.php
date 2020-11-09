<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
       DB::table('data')->insert([
           'timezone_type' => '3',
           'timezone' => 'UTC',
           'Time' => Carbon::now()
       ]);

       DB::table('pemin')->insert([
        'user' => 'razan',
        'pass' => '123',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ]);
    }
}
