<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\CategoriaProducto;
use Faker\Generator as Faker;




$factory->define(CategoriaProducto::class, function (Faker $faker) {
    return [
        'nombre_categoria' => $faker->name,
        'descripcion_categoria'=>$faker->sentence(10)
    ];
});
