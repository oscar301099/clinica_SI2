<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha_cita');
            $table->time('Hora_cita');
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
        Schema::dropIfExists('cita');
    }
}
