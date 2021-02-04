<?php

namespace App\Http\Controllers;

use App\Models\ComercializacionProducto;
use Alert;
use App\Models\ComercializacionServicio;
use Illuminate\Http\Request;

class ComercializacionController extends Controller
{
    public function vistaComerPro(){
        return view('Comercializacion.comerPro');
    }

    public function vistaComerSer(){
        return view('Comercializacion.comerSer');
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
