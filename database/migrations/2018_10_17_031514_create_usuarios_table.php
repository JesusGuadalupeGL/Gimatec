<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('nombre',40);
            $table->string('apat',40);
            $table->string('amat',40);
            $table->string('calle',60);
            $table->integer('telefono');
            $table->string('correo_usu',40);
            $table->string('pass',40);
            $table->string('tipo',40);
            $table->integer('activo');
           
            $table->rememberToken();
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
        Schema::drop('usuarios');
    }
}
