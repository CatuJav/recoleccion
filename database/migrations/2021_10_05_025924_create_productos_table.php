<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_ps');
            $table->decimal('precio');
            $table->text('descripcion')->nullable();
            $table->integer('activo');
            $table->unsignedBigInteger('categoria_ps_id');
            $table->timestamps();

            $table->foreign('categoria_ps_id')->references('id')->on('categoria_productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
