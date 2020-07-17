<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('attendances')->truncate();

        $day = 30;

        $stations = \App\Station::pluck('id');
        $carbon = \Illuminate\Support\Carbon::parse('2020-06-20');

        $rand = rand(50, 200);

        $faker = Faker::create();

        for ($d = 0; $d < $day; $d++) {
            $date = $carbon->addDay();

            for ($x = 0; $x < $rand; $x++) {
                \App\Attendance::create([
                    'name' => $faker->name,
                    'telephone' => $faker->e164PhoneNumber,
                    'temperature' => rand(35, 37),
                    'station_id' => $stations[rand(0, count($stations) - 1)],
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }
        }
    }
}
