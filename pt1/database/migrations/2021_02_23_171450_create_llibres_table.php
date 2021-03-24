<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLlibresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('llibres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titol', 100);
            $table->date('data_public');
            $table->unsignedBigInteger('autor_id');
            $table->foreign('autor_id')->references('id')->on('autors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('llibres');
    }
}
