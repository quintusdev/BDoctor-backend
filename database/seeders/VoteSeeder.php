<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Vote;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cancella tutti i record esistenti
        DB::table('votes')->delete();

        // Ripristina l'ID autoincrementante a 1
        DB::statement("ALTER TABLE votes AUTO_INCREMENT = 1;");

        $votes = [
            ['value' => 1],
            ['value' => 2],
            ['value' => 3],
            ['value' => 4],
            ['value' => 5],
        ];

        foreach ($votes as $vote) {
            $new_vote = new Vote();

            $new_vote->value = $vote['value'];

            $new_vote->save();
        }
    }
}
