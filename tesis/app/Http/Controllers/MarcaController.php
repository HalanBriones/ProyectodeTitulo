<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\Mac;

class MarcaController extends Controller
{
    public function vistaMarca(){
        return view('Marca.marca');
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
