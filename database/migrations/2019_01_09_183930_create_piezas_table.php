<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piezas', function (Blueprint $table) {
            $table->increments('id_piezas');
            $table->string('nombre');
            $table->string('modelo');
            $table->string('foto')->nullable();
            $table->unsignedInteger('cantidad');
            $table->longText('descripcion');
            $table->unsignedInteger('anaquel');
            $table->unsignedInteger('id_estado');
            $table->timestamps();
        });

        Schema::table('piezas', function(Blueprint $table){
            $table->foreign('id_estado')->references('id')->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piezas');
    }
}
