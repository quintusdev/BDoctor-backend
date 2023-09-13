<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        for ($i = 1; $i < 11; $i++) {
            $doctor = new Doctor();

            $doctor->address = $faker->sentence(2);
            $doctor->cv = $faker->file('docs', 'PDF', 'JPG', 'JPEG', 'PNG', false);
            $doctor->picture = $faker->imageUrl(360, 180, 'doctor', true);
            $doctor->phone_number = $faker->randomNumber('+39', 10);
            $doctor->medical_service = $doctor->paragraph(200);

            $doctor->save();
        }
    }
}
