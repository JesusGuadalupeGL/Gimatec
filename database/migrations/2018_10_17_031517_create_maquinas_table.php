<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaquinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinas', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('nombre',40);
            $table->string('archivo',255);
            $table->string('descripcion',40);
            $table->string('precio',60);
            $table->integer('stock');
            $table->string('categoria',60);
            $table->integer('existencias');
			
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
        Schema::drop('maquinas');
    }
}
