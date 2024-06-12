<?php

use Illuminate\Database\Seeder;
use App\Models\Country; // Update the namespace as per your application structure
use Faker\Factory as Faker;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $countryNames = FileHandlerController::fileHandler(public_path('csvdata/country.csv'));

        foreach ($countryNames as $countryName) {
            $country = new Country();
            $country->name = $countryName;
            $country->founding_year = $faker->year();
            $country->save();
        }
    }
}
