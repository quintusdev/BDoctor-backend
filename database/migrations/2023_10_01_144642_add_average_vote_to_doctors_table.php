<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->integer('average_vote')->nullable();
        });

        // Popola la colonna "average_vote" con i valori calcolati dalla funzione `calculateAverageVote()`
        Doctor::chunk(200, function ($doctors) {
            foreach ($doctors as $doctor) {
                $averageVote = $doctor->calculateAverageVote();
                DB::table('doctors')->where('id', $doctor->id)->update(['average_vote' => $averageVote]);
            }
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('average_vote');
        });
    }
};
