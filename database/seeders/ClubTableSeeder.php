<?php

namespace Database\Seeders;

use App\Http\Controllers\FileHandlerController;
use App\Models\Club;
use App\Models\League;
use Illuminate\Database\Seeder;
use Nette\IOException;
use Exception;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        try {
            $leagueIds = League::pluck('id')->toArray();

            for ($i = 0; $i < 20; $i++) {
                $club = new Club();

                $club->name = FileHandlerController::fileHandler(public_path('csvdata/name.csv'))[$i];
                $club->country = FileHandlerController::fileHandler(public_path('csvdata/country.csv'))[$i];
                $club->number_of_titles = FileHandlerController::fileHandler(public_path('csvdata/number_of_titles.csv'))[$i];

                $club->league_id = $leagueIds[array_rand($leagueIds)];

                $club->founding_year = FileHandlerController::fileHandler(public_path('csvdata/founding_year.csv'))[$i];
                $club->stadium = FileHandlerController::fileHandler(public_path('csvdata/stadium.csv'))[$i];
                $club->coach = FileHandlerController::fileHandler(public_path('csvdata/coach.csv'))[$i];
                $club->captain = FileHandlerController::fileHandler(public_path('csvdata/captain.csv'))[$i];
                $club->current_value = FileHandlerController::fileHandler(public_path('csvdata/current_value.csv'))[$i];
                $club->colors = FileHandlerController::fileHandler(public_path('csvdata/colors.csv'))[$i];
                $club->description = FileHandlerController::fileHandler(public_path('csvdata/description.csv'))[$i];
                $club->avg_goals = FileHandlerController::fileHandler(public_path('csvdata/average_goals.csv'))[$i];
                $club->is_champion = FileHandlerController::fileHandler(public_path('csvdata/is_champion.csv'))[$i] ? 1 : 0;
                $club->avg_attendance = FileHandlerController::fileHandler(public_path('csvdata/avg_attendance.csv'))[$i];

                $club->save();
            }
        } catch (IOException $e) {
            echo ($e->getMessage());
        } catch (Exception $e) {
            echo ($e->getMessage());
        }
    }
}
