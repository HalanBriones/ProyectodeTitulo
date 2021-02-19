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
            return back()->with('warning', 'La Marca ya existe');
        }
        $marca = new Mac();
        $marca->nombre_marca= $request->marca;
        if($marca->save()){
            return redirect('/marca')->with('success','Creación marca realizada con exito');
        }else{
            return redirect('/marca')->with('warning','Error en la creación de una marca');
        }
        
    }

    public function delete_marca(Request $request){
        $idMac = $request['idmarca'];
        $marca =  Mac::find($idMac);

        if($marca->delete()){
            return 0;
        }
    }

    public function busqueda_marca(Request $request){
        $nombre_marca = $request->nombre_marca;
        if($nombre_marca != ""){
            $i=1;
            $marcas = Mac::where('nombre_marca','like',"%$nombre_marca%")->get();
            return view('Marca.marcas',compact('marcas','i'));
        }else{
            $i=1;
            $marcas = Mac::all();
            return view('Marca.marcas',compact('marcas','i'));
        }

    }
}
