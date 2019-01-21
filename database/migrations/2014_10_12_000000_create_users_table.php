<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('matricula')
                ->unique()
                ->nullable();
            $table->string('carrera');
            $table->string('rol');
            $table->string('tipo_de_usuario');
            $table->string('foto')
                ->nullable();
            $table->string('password')
                ->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $data = array(
            array( 'nombres' => 'Enrique Josué', 
                   'apellidos' => 'Chan Y Díaz', 
                   'telefono' => '9992573121',
                   'email' => 'echan_diaz@hotmail.com',  
                   'matricula' => 'MECINT00148',  
                   'carrera' => 'Ing. Mecánica',  
                   'rol' => 'Maestro',
                   'tipo_de_usuario' => 'Administrador',
                   'foto' => '/usersImg/9992573121.png',
                   'password' => '$2y$10$kZF/H0QfqBRwypkrviKwtudBAITtVuFjaPI.xTS9ymlaP2HlrYO4.',
                   'remember_token' => 'chWPh8ReyWnjiwrms2LY4V9EnCdzIT3VSg5uf22Kpk8mGKrhRchupP9fheRD',
                   'created_at'=>CARBON::now(), 
                   'updated_at'=>CARBON::now() 
               )
        );
        DB::table('users')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
