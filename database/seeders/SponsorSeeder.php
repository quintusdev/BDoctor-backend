<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                'offer' => 'Basic',
                'price' => 2.99,
                'duration' => 24
            ],
            [
                'offer' => 'Advanced',
                'price' => 5.99,
                'duration' => 72
            ],
            [
                'offer' => 'Premium',
                'price' => 9.99,
                'duration' => 144
            ],
        ];

        foreach ($sponsors as $sponsor) {
            $new_sponsor = new Sponsor();

            $new_sponsor->name = $sponsor['offer'];
            $new_sponsor->price = $sponsor['price'];
            $new_sponsor->duration = $sponsor['duration'];

            $new_sponsor->save();
        }
    }
}
