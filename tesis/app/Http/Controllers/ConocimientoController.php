<?php

namespace App\Http\Controllers;

use App\Models\ConocimientoServicio;
use Illuminate\Http\Request;

class ConocimientoController extends Controller
{
    public function vistaConocimiento(){
        return view('Conocimiento.conocimiento');
    }

    public function store_conocimiento(Request $request){
        $find = ConocimientoServicio ::where('nombre_conocimiento',$request->conocimiento)->first();
        if($find){
            return back()->with('warning', 'El conocimiento a crear ya existe');
        }
        $conocimiento = new ConocimientoServicio();
        $conocimiento->nombre_conocimiento= $request->conocimiento;
        return $request;
        if($conocimiento->save()){
            return redirect('/marca')->with('success','Creación marca realizada con exito');
        }else{
            return redirect('/marca')->with('warning','Error en la creación de una marca');
        }
    }
}
