<?php

namespace App\Http\Controllers;

use App\Models\ComercializacionProducto;
use Alert;
use App\Models\ComercializacionServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComercializacionController extends Controller
{
    public function comercializacionesPro(){
        $comerPro = DB::table('comercializacion_producto')
        ->join('tipo_producto_has_comercializacion_producto','comercializacion_producto_idcomercializacion_producto','=','idcomercializacion_producto')
        ->join('tipo_producto','idtipo_producto','=','tipo_producto_idtipo_producto')->get();
        return view('ComercializacionPro.comercializacionesPro',compact('comerPro'));
    }
    
    public function vista_edit($idcomercializacion){
        $comer = ComercializacionProducto::where('idcomercializacion_producto',$idcomercializacion)->first();
        return view('ComercializacionPro.editPro',compact('comer'));
    }

    public function store_update(Request $request,ComercializacionProducto $comercializacion){
        $comercializacion->nombre_comercializacion = $request->comercializacionPro;
        
        if($comercializacion->save()){
            return redirect('/comercializaciones')->with('success','Actualización de Comercialización producto realizado con exito');
        }else{
            return redirect('/comercializaciones')->with('error','Error al actualizar la comercialización de producto');
        }
    }

    public function vistaComerPro(){
        return view('ComercializacionPro.comerPro');
    }
    public function store_comercializacion(Request $request){

        $find = ComercializacionProducto::where('nombre_comercializacion',$request->comercializacionPro)->first();
        if($find){
            return back()->with('warning', 'La comercialización ya existe');
        }
        $comercializacionPro = new ComercializacionProducto();
        $comercializacionPro->nombre_comercializacion = $request->comercializacionPro;
        if($comercializacionPro->save()){
            return redirect('/comercializacion-pro')->with('success','Creación comercialización con exito');
        }else{
            return redirect('/comercializacion-pro')->with('warning','Error en la creación de comercializacion');
        }
    }

    // SERVICIO

    public function comercializacionesSer(){
        $comerSer = ComercializacionServicio::all();
        $i = 1;
        return view('ComercializacionSer.comercializacionesSer',compact('comerSer','i'));
    }

    public function vista_edit_Ser($idcomercializacion){
        $comer = ComercializacionServicio::where('idcomercializacion_servicio',$idcomercializacion)->first();
        return view('ComercializacionSer.editSer',compact('comer'));
    }

    public function store_updateSer(Request $request, ComercializacionServicio $comercializacion){
        $comercializacion->nombre_comercializacion = $request->comercializacionSer;
        if($comercializacion->save()){
            return redirect('/comercializaciones-ser')->with('success','Actualización comercialización con exito');
        }else{
            return redirect('/comercializaciones-ser')->with('warning','Error en la actualización de comercializacion');
        }
    }

    public function vistaComerSer(){
        return view('ComercializacionSer.comerSer');
    }
    public function store_comercializacionSer(Request $request){

        $find = ComercializacionServicio::where('nombre_comercializacion',$request->comercializacionSer)->first();
        if($find){
            return back()->with('warning', 'La comercialización ya existe');
        }
        $comercializacionSer = new ComercializacionServicio();
        $comercializacionSer->nombre_comercializacion = $request->comercializacionSer;
        if($comercializacionSer->save()){
            return redirect('/comercializacion-ser')->with('success','Creación comercialización con exito');
        }else{
            return redirect('/comercializacion-ser')->with('warning','Error en la creación de comercializacion');
        }
        
    }
}
