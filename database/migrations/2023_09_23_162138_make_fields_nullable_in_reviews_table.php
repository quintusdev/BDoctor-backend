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
            $table->string('name', 20)->nullable()->change();
            $table->string('surname', 40)->nullable()->change();
            $table->text('text')->nullable()->change();
            $table->string('email', 50)->nullable()->change();
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
            $table->string('name', 20)->nullable(false)->change();
            $table->string('surname', 40)->nullable(false)->change();
            $table->text('text')->nullable(false)->change();
            $table->string('email', 50)->nullable(false)->change();
        });
    }
};
