<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('proprietario');
            $table->foreign('proprietario')->references('n_cpf')->on('pessoas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('placa')->unique();
            $table->string('modelo');
            $table->integer('ano');
            $table->string('n_fabricante');
            $table->string('Renavan')->unique();
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
        Schema::dropIfExists('carros');
    }
}
