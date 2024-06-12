<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;
use CountriesTableSeeder;
use Database\Seeders\UserTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            LeagueSeeder::class,
            ClubTableSeeder::class,
        ]);
    }
}



