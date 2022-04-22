<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialclinicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialclinico', function (Blueprint $table) {
            $table->id();
            $table->string('actividad');
            $table->string('alergias');
            $table->dateTime('Fecha_ingreso');
            $table->dateTime('Fecha_salida');
            $table->string('enfermedad');
            $table->string('medicamentos');
            $table->unsignedBigInteger('Id_cliente');
            $table->foreign('Id_cliente')->references('id')->on ('users'); 
            $table->unsignedBigInteger('Id_medico');
            $table->foreign('Id_medico')->references('id')->on ('medicos');  //foranea 
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
        Schema::dropIfExists('historialclinico');
    }
}
