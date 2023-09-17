<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;

use App\Models\Doctor;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $doctors = Doctor::all();
        $reviewId = 1; // Inizia con l'ID del review desiderato

        foreach ($doctors as $doctor) {
            $review = new Review();

            // Assegna l'ID utente come proprietario del review
            $review->doctor_id = $doctor->id;

            // Altri dati del review
            $review->name = $faker->word(1);
            $review->surname = $faker->word(1);
            $review->text = $faker->paragraph(100);
            $review->email = $faker->email();

            $review->save();

            $reviewId++; // Incrementa l'ID del review
        }
    }
}
