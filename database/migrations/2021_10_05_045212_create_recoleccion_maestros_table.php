<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecoleccionMaestrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recoleccion_maestros', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_recoleccion');
            $table->unsignedBigInteger('tipo_recorrido_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('tipo_recorrido_id')->references('id')->on('tipo_recorridos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recoleccion_maestros');
    }
}
