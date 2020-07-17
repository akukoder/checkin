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

        $day = 20;

        $stations = \App\Station::get();

        foreach ($stations as $station) {
            for ($x = 0; $x < rand(50, 200); $x++) {
                $carbon = \Illuminate\Support\Carbon::now();

                $date = $carbon->subDays($day--);

                $faker = Faker::create();


                \App\Attendance::create([
                    'name' => $faker->name,
                    'telephone' => $faker->e164PhoneNumber,
                    'temperature' => rand(35, 37),
                    'station_id' => $station->id,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }
        }
    }
}
