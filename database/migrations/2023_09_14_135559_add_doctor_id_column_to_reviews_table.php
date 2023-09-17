<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            //creo la nuova colonna nella tabella
            $table->unsignedBigInteger('doctor_id')->nullable()->after('id');

            //creo il vincolo/foreign key
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            /* elimino la foreign key e la colonna in caso di rollback */
            $table->dropForeign('reviews_doctor_id_foreign');
            $table->dropColumn('doctor_id');
        });
    }
};
