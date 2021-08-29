<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('monto');

            $table->unsignedBigInteger('name_id');
            $table->unsignedBigInteger('best_id');
            $table->unsignedBigInteger('sport_id');
            $table->unsignedBigInteger('type_id');

            $table->foreign('name_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('best_id')->references('id')->on('bests')->onDelete('cascade');
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}