<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisaos', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->string('fabricante');
            $table->string('carro');
            $table->foreign('carro')->references('placa')->on('carros')->onDelete('cascade')->onUpdate('cascade');
            $table->string('pneus');
            $table->string('motor');
            $table->string('freios');
            $table->string('suspensao');
            $table->string('iluminacao');
            $table->double('preco', 10, 2 );
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
        Schema::dropIfExists('revisaos');
    }
}
