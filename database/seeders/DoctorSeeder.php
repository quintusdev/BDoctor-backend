<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Models\Doctor;
use App\Models\User;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        $user = User::all();

        for ($i = 1; $i < 11; $i++) {
            $doctor = new Doctor();

            // Assegna un ID utente esistente come proprietario del dottore
            $doctor->user_id = $user->id; // Sostituisci con l'ID dell'utente desiderato

            $doctor->address = $faker->sentece(5);
            $doctor->cv = $faker->fileExtension('pdf', 'jpg', 'jpeg', 'docs');
            $doctor->picture = $faker->imageUrl(360, 180, 'doctor', true);
            $doctor->phone = $faker->randomNumber(10, true);
            $doctor->medical_service = $faker->paragraph(100);

            $doctor->save();
        }
    }
}
