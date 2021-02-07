<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\Mac;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class MarcaController extends Controller
{
    public function vistaMarca(){
        return view('Marca.marca');
    }

    public function marcas(){
        $marcas = Mac::all();
        $i=1;
        return view('Marca.marcas',compact('marcas','i'));
    }

    public function vistaEdit($idMac){
        $marca = Mac::where('idMac',$idMac)->first();
        return view('Marca.editmarca',compact('marca'));
    }

    public function updatemarca(Request $request,Mac $marca){
        $marca->nombre_marca = $request->marca;
        if($marca->save()){
            return redirect('/marcas/view')->with('success','Actualización marca realizada con exito');
        }else{
            return redirect('/marcas/view')->with('error','Error en la actualización de la marca');
        }

    }

    public function store_marca(Request $request){

        $find = Mac::where('nombre_marca',$request->marca)->first();
        if($find){
            return back()->with('warning', 'La comercialización ya existe');
        }
        $marca = new Mac();
        $marca->nombre_marca= $request->marca;
        if($marca->save()){
            return redirect('/marca')->with('success','Creación marca realizada con exito');
        }else{
            return redirect('/marca')->with('warning','Error en la creación de una marca');
        }
        
    }
}
