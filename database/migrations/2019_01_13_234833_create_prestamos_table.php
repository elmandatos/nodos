<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_piezas');
            $table->unsignedInteger('cantidad');
            $table->string('estado');
            $table->timestamp('hora_egreso')->nullable();
            $table->timestamp('hora_ingreso')->nullable();
        });

        Schema::table('prestamos', function(Blueprint $table){
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_piezas')->references('id_piezas')->on('piezas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
