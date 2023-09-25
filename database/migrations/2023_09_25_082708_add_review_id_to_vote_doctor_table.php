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
        Schema::table('vote_doctor', function (Blueprint $table) {
            $table->unsignedBigInteger('review_id')->nullable();
            $table->foreign('review_id')->references('id')->on('reviews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vote_doctor', function (Blueprint $table) {
            $table->dropForeign(['review_id']);
            $table->dropColumn('review_id');
        });
    }
};

