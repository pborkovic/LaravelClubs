<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\League;
use App\Http\Controllers\FileHandlerController;
use Faker\Factory as Faker;

class LeagueSeeder extends Seeder
{
    public function run(){
        $leagueNames = FileHandlerController::fileHandler(public_path('csvdata/league.csv'));
        $faker = Faker::create();

        foreach ($leagueNames as $name) {
            League::create([
                'name' => $name,
                'established_date' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
