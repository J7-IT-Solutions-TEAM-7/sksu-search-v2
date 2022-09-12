<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhilippineCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!DB::table('philippine_cities')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/philippine_cities.sql'));
        }
    }
}
