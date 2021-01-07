<?php

namespace App\Http\Controllers;

use App\Models\ComercializacionProducto;
use App\Models\ComercializacionServicio;
use App\Models\ConocimientoServicio;
use App\Models\OportunidadNegocio;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\TipoMoneda;
use App\Models\TipoNegocio;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Location;

class OportunidadNegocioController extends Controller
{
    //vista Negocio
    public function vistaNegocio(){

        //mandar productos y servicios
        $productos = Producto::all();
        $servicios = Servicio::all();
        $conocimientos = ConocimientoServicio::all();
        $comercializaciones = ComercializacionProducto::all();
        $comercializacionSer = ComercializacionServicio::all();
        $monedas = TipoMoneda::all();
        return view('Negocio.NegocioCreacion' , compact('conocimientos','comercializacionSer','comercializaciones','productos','servicios','monedas'));
    }

    //mostrar Negocios
    public function index (){

    }

    //crear Negocio



    public function crear_negocio(Request $request){
        
        $servicios = $request->input("servicios",null);
        foreach($servicios as $servicio){

            

            return $servicio['comentario'];
        }
    }
}
