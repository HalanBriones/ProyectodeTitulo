<?php

namespace App\Http\Controllers;

use App\Models\ComercializacionProducto;
use App\Models\ComercializacionServicio;
use App\Models\TipoProducto;
use App\Models\TipoProductoHasComercializacion;
use Illuminate\Http\Request;
use Alert;

class TipoProductoController extends Controller
{
    public function vistaTipoProducto(){
        $comercializaciones = ComercializacionProducto::all();
        return view('TipoProducto.tipoproducto',compact('comercializaciones'));
    }

    public function store_comercializacion(Request $request){
        return $request;
    }

    public function store_tipo_producto(Request $request){
        $find = TipoProducto::where('nombre_tipo_producto',$request->tipo_producto)->first();
        if(isset($find)){
            return redirect('/tipo/producto')->with('warning','El tipo producto ya existe');
        }else{
            $tipoProducto = new TipoProducto();
            $tipoProducto->nombre_tipo_producto = $request->tipo_producto;
            $comercializaciones = $request->comercializaciones;
            if($tipoProducto->save()){
                foreach($comercializaciones as $comer){
                    $tipo_has_comer = new TipoProductoHasComercializacion();
                    $tipo_has_comer->tipo_producto_idtipo_producto = $tipoProducto->idtipoProducto;
                    $tipo_has_comer->comercializacion_producto_idcomercializacion_producto = $comer;

                    $tipo_has_comer->save();
                }
                return redirect('productos.mostrar')->with('success','Tipo Producto Creado Correctamente');
            }else{
                return redirect('/tipo/producto')->with('warning','Error al crear el tipo producto');
            }
        }
    }


}
