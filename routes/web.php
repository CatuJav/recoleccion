<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categoria_productos','CategoriaProductoController')->names('categoria_productos');
Route::resource('productos','ProductoController')->names('productos');


//DATABLES

Route::get('datable/categorias','DatableController@categorias')->name('datable.categorias');
Route::post('datable/categorias/create','DatableController@crearCategorias')->name('datable.categorias.create');
Route::post('datable/categorias/update','DatableController@actualizarCategorias')->name('datable.categorias.update');
Route::get('datable/categorias/delete','DatableController@deleteCategorias')->name('datable.categorias.delete');
Route::post('datable/action','DatableController@action')->name('datable.action');
