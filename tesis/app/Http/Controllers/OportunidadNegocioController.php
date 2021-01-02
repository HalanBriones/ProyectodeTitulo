<?php

namespace App\Http\Controllers;

use App\Models\ComercializacionProducto;
use App\Models\ComercializacionServicio;
use App\Models\OportunidadNegocio;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\TipoMoneda;
use App\Models\TipoNegocio;
use Illuminate\Http\Request;

class OportunidadNegocioController extends Controller
{
    //vista Negocio
    public function vistaNegocio(){

        //mandar productos y servicios
        $productos = Producto::all();
        $servicios = Servicio::all();
        $tipoNegocios = TipoNegocio::all();
        $comercializaciones = ComercializacionProducto::all();
        $comercializacionSer = ComercializacionServicio::all();
        $monedas = TipoMoneda::all();
        return view('Negocio.NegocioCreacion' , compact('comercializacionSer','comercializaciones','productos','servicios','tipoNegocios','monedas'));
    }

    //mostrar Negocios
    public function index (){

    }

    //crear Negocio

    public function store_negocio(Request $request){
        return $request;
    }

    public function crear_negocio(Request $request){
        return 0;
    }
}
