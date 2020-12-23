<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OportunidadNegocioController extends Controller
{
    //vista Negocio
    public function vistaNegocio(){

        //mandar productos y servicios
        return view('Negocio.registroNegocio');
    }

    //mostrar Negocios
    public function index (){

    }

    //crear Negocio

    public function crear_negocio(Request $request){
        return 0;
    }
}
