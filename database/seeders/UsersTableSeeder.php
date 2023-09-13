<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Importa la classe Str per la creazione dello slug

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nome Utente',
            'surname' => 'Cognome Utente', // Aggiungi il cognome
            'email' => 'utente@example.com',
            'slug' => Str::slug('Nome Utente Cognome Utente', '-'), // Crea uno slug basato sul nome e sul cognome
            'password' => Hash::make('password'),
        ]);
    }
}
