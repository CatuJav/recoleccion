<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->decimal('total_recoleccion');
            $table->decimal('venta_dulac')->default(0);
            $table->decimal('produccion')->default(0);
            $table->decimal('venta')->default(0);
            $table->decimal('lucila')->default(0);
            $table->decimal('lcm')->default(0);
            $table->string('dia_semana');

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
        Schema::dropIfExists('inventarios');
    }
}
