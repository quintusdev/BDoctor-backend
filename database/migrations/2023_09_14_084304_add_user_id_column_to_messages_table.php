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
        Schema::table('messages', function (Blueprint $table) {
            //creo la nuova colonna nella tabella projects
            $table->unsignedBigInteger('user_id')->nullable()->after('id');

            //creo il vincolo/foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            /* elimino la foreign key e la colonna in caso di rollback */
            $table->dropForeign('messages_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
