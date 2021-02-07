<?php

namespace App\Http\Controllers;

use App\Models\ConocimientoServicio;
use Illuminate\Http\Request;

class ConocimientoController extends Controller
{

    public function conocimientos(){
        $conocimientos = ConocimientoServicio::all();
        $i = 1;
        return view('Conocimiento.conocimientos',compact('conocimientos','i'));
    }
    public function vistaConocimiento(){
        return view('Conocimiento.conocimiento');
    }

    public function vista_edit($idconocimiento){
        $conocimiento = ConocimientoServicio::where('idconocimiento_servicio',$idconocimiento)->first(); 
        return view('Conocimiento.editConocimiento',compact('conocimiento'));
    }

    public function update_conocimiento(Request $request,ConocimientoServicio $conocimiento){
        $conocimiento->nombre_conocimiento = $request->conocimiento;
        if($conocimiento->save()){
            return redirect('/conocimientos')->with('success','Actualización conocimiento realizado con exito');
        }else{
            return redirect('/conocimientos')->with('warning','Error en la actualización conocimiento');
        }        
    }
    public function store_conocimiento(Request $request){
        $find = ConocimientoServicio ::where('nombre_conocimiento',$request->conocimiento)->first();
        if($find){
            return back()->with('warning', 'El conocimiento a crear ya existe');
        }
        $conocimiento = new ConocimientoServicio();
        $conocimiento->nombre_conocimiento= $request->conocimiento;
        if($conocimiento->save()){
            return redirect('/conocimientos')->with('success','Creación conocimiento realizada con exito');
        }else{
            return redirect('/conocimientos')->with('warning','Error en la creación del conocimiento');
        }
    }
}
