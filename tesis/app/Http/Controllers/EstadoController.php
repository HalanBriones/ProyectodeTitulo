<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Alert;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class EstadoController extends Controller
{
    public function estados(){
        $estados = Estado::all();
        $i = 1;
        return view('Estado.estados',compact('estados','i'));
    }

    public function store_view(){
        return view('Estado.estadoStore');
    }

    public function store_estado(Request $request){
        
        $estado = Estado::where('nombre_estado',$request->estado)->first();

        if($estado){
            return back()->with('warning','El estado ya esta existe');
        }else{
            $nuevo = new Estado();
            $nuevo->nombre_estado = $request->estado;
            if($nuevo->save()){
                return redirect('/estados')->with('success','Estado creado correctamente');
            }else{
                return back()->with('warning','Error al ingresar el estado');
            }
        }
    }

    public function edit_view($idEstado){

        $estado = Estado::find($idEstado);
        if($estado){
            return view('Estado.estadoEdit',compact('estado'));
        }
    }

    public function estado_update(Estado $estado,Request $request){
        $estado->nombre_estado = $request->estado;
        if($estado->save()){
            return redirect('/estados')->with('success','Estado actualizado correctamente');
        }else{
            return back()->with('warning','Error al actualizar el estado');
        }
    }

    public function delete_estado(Request $request){
        $idEstado = $request['idestado'];
        $estado = Estado::find($idEstado);
        if($estado->delete()){
            return 0;
        }
    }
}
