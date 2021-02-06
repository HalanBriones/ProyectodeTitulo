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
    public function mostrar_tipoproductos(){
        $tipoProductos = TipoProducto::all();
        $i = 1;
        return view('TipoProducto.vertipoProductos',compact('tipoProductos','i'));
    }

    public function edit_tipoproducto($idtipo_producto){
        $tipoproducto = TipoProducto::where('idtipo_producto',$idtipo_producto)->first();
        return view('TipoProducto.editTP',compact('tipoproducto'));
    }
    public function vistaTipoProducto(){
        $comercializaciones = ComercializacionProducto::all();
        return view('TipoProducto.tipoproducto',compact('comercializaciones'));
    }
    
    public function store_tipo_producto(Request $request){
        $find = TipoProducto::where('nombre_tipo_producto',$request->tipo_producto)->first();
        if($find){
            return back()->with('warning', 'El tipo producto ya existe');
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
                return redirect('/tipo/producto')->with('success','Tipo Producto Creado Correctamente');
            }else{
                return redirect('/tipo/producto')->with('warning','Error al crear el tipo producto');
            }
        }
    }

    public function update(Request $request,TipoProducto $tipoproducto){
        $tipoproducto->nombre_tipo_producto = $request->nombre_tp;
        
        if($tipoproducto->save()){
            return redirect('/tipo-productos')->with('success','Tipo Producto actualizado Correctamente');
        }else{
            return back()->with('error','Error al actualizar el tipo producto');
        }
    }   


}
