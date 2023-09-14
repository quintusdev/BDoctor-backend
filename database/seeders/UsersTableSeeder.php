<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Importa la classe Str per la creazione dello slug
use Faker\Generator as Faker;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        for ($i = 1; $i < 11; $i++) {
            $user = new User();

            $user->name = $faker->sentence(1);
            $user->surname = $faker->sentence(1);
            $user->slug = Str::slug($user->name, '-', $user->surname);
            $user->email = $faker->unique()->safeEmail;
            $user->password = bcrypt($faker->password);

            $user->save();
        }
    }
}
