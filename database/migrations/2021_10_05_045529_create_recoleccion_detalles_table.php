<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecoleccionDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recoleccion_detalles', function (Blueprint $table) {
            $table->unsignedBigInteger('recoleccion_id');
            $table->decimal('litros_manana');
            $table->decimal('litros_tarde');
            $table->timestamps();

            $table->foreign('recoleccion_id')->references('id')->on('recoleccion_maestros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recoleccion_detalles');
    }
}
