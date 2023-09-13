<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = ['Cardiologia', 'Ortopedia', 'Chirurgia', 'Ostetricia', 'Odontostomatologia', 'Pneumologia', 'Neurologia', 'Psichiatria'];

        foreach ($specializations as $specialization) {
            $new_specialization = new Specialization();

            $new_specialization->name = $specialization;

            $new_specialization->save();
        }
    }
}
