<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatableController extends Controller
{
    //Este controllador tiene el propósito de procesar los datos de cuando sean llamados por AJAX

    public function categorias(){
         $categorias= CategoriaProducto::select('id','nombre_categoria','descripcion_categoria','activo')->where('activo','1')->get();
        return datatables()->of($categorias)->toJson();
    }

    public  function  crearCategorias(Request $request){

        if ($request->ajax()){
            $data=array(
                'nombre_categoria'=>$request->nombre_categoria,
                'descripcion_categoria'=>$request->descripcion_categoria,
            );

            CategoriaProducto::create($data);
        }
    }

    public  function  actualizarCategorias(Request  $request)
    {
        if ($request->ajax()) {
            $data = array(
                'nombre_categoria' => $request->nombre_categoria,
                'descripcion_categoria' => $request->descripcion_categoria,
            );
            CategoriaProducto::where('id','=',$request->id)->update($data);
        }
    }
    public function deleteCategorias(Request $request){

        if ($request->ajax()) {

            CategoriaProducto::where('id','=',$request->id)->update(['activo'=>'0']);
        }
    }

    public function action(Request $request){
        return $request;

        if ($request->ajax()){
            if ($request->action=='Edit'){
                $data=array(
                    'nombre_categoria'=>$request->nombre,
                    'descripcion_categoria'=>$request->descripcion,
                    'activo'=>$request->estado
                );
                CategoriaProducto::where('id','=',$request->id)->update($data);
            }

            if ($request->action=='delete'){
                DB::table('categoria_productos')->where('id',$request->id)->update(["activo"=>'0']);
            }
            return request()->json($request);
        }
    }
}
