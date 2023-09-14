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
        $users = User::all();
        $doctorId = 1; // Inizia con l'ID del dottore desiderato

        foreach ($users as $user) {
            $doctor = new Doctor();

            // Assegna l'ID utente come proprietario del dottore
            $doctor->user_id = $user->id;

            // Altri dati del dottore
            $doctor->address = $faker->sentence(5);
            $doctor->cv = $faker->fileExtension('pdf', 'jpg', 'jpeg', 'docs');
            $doctor->picture = $faker->imageUrl(360, 180, 'doctor', true);
            $doctor->phone = $faker->e164PhoneNumber();
            $doctor->medical_service = $faker->paragraph(100);

            $doctor->save();

            $doctorId++; // Incrementa l'ID del dottore
        }
    }
}
