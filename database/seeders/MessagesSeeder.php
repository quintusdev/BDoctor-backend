<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Models\Messages;
use App\Models\User;


class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $messageId = 1; // Inizia con l'ID del dottore desiderato

        foreach ($users as $user) {
            $message = new Messages();

            // Assegna l'ID utente come proprietario del dottore
            $message->user_id = $user->id;

            // Altri dati del dottore
            $message->text = $faker->paragraph();
            $message->email = $faker->email();
            $message->name = $faker->word();
            $message->surname = $faker->word();

            $message->save();

            $messageId++; // Incrementa l'ID del dottore
        }
    }
}
