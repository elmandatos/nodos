<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('estado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        $data = array(
            array('nombre' => 'En existencia', 'created_at' => CARBON::now(), 'updated_at'=>CARBON::now() ),
            array('nombre' => 'En mantenimiento', 'created_at' => CARBON::now(), 'updated_at'=>CARBON::now()),
            array('nombre' => 'Agotado', 'created_at' => CARBON::now(), 'updated_at'=>CARBON::now()),
            array('nombre' => 'Defectuoso', 'created_at' => CARBON::now(), 'updated_at'=>CARBON::now())
        );
        DB::table('estado')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado');
    }
}
