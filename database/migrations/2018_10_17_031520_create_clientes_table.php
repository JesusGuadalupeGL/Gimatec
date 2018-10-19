<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('nombre',40);
            $table->string('apat',40);
            $table->string('amat',40);
            $table->string('empresa',60);
            $table->integer('telefono');
            $table->string('direccion',60);
            $table->integer('cp');

			$table->unsignedInteger('municipio_id');
			$table->foreign('municipio_id')->references('id')->on('municipios');
            
			$table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');            
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
        Schema::drop('clientes');
    }
}
