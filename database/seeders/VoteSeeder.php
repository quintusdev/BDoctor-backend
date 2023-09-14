<?php

namespace Database\Seeders;

use Dotenv\Parser\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
