<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescuentoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuento_detalles', function (Blueprint $table) {
            $table->unsignedBigInteger('producto_id');
            $table->decimal('cantidad');
            $table->unsignedBigInteger('descuento_id');
            $table->string('estado_pago')->default('1');
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('descuento_id')->references('id')->on('descuento_maestros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descuento_detalles');
    }
}
