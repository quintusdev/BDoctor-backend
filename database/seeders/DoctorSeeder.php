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
            $doctor->cv = $faker->fileExtension('pdf', 'jpg', 'jpeg', 'docs');
            $doctor->picture = $faker->imageUrl(360, 180, 'doctor', true);
            // Generate a 10-digit phone number as a string
            $phone = '0'; // Start with a 0 (assuming this is a valid prefix)
            for ($j = 1; $j < 10; $j++) {
                $phone .= $faker->randomDigit;
            }
            $doctor->phone = $phone;
            $doctor->medical_service = $faker->paragraph(100);

            $doctor->save();
        }
    }
}
