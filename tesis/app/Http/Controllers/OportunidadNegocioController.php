<?php

namespace App\Http\Controllers;

use App\Models\ComercializacionProducto;
use App\Models\ComercializacionServicio;
use App\Models\ConocimientoServicio;
use App\Models\OportunidadNegocio;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;

class OportunidadNegocioController extends Controller
{
    //vista Negocio
    public function vistaNegocio(){

        //mandar productos y servicios
        $productos = Producto::all();
        $servicios = Servicio::all();
        $usuarios = User::all();
        $conocimientos = ConocimientoServicio::all();
        $comercializaciones = ComercializacionProducto::all();
        $comercializacionSer = ComercializacionServicio::all();
        return view('Negocio.NegocioCreacion' , compact('usuarios','conocimientos','comercializacionSer','comercializaciones','productos','servicios'));
    }

    public function getComercializacion($id){
        $comercializaciones= DB::table('producto')
        ->join('tipo_producto_has_comercializacion_producto','producto.tipo_producto_idtipo_producto','tipo_producto_has_comercializacion_producto.tipo_producto_idtipo_producto')
        ->join('comercializacion_producto','comercializacion_producto.idcomercializacion_producto','tipo_producto_has_comercializacion_producto.comercializacion_producto_idcomercializacion_producto')
        ->where('producto.idproducto',$id)
        ->select('comercializacion_producto.idcomercializacion_producto','nombre_comercializacion')
        ->get();

        return $comercializaciones;
    }

    //mostrar Negocios
    public function index (){

    }

    //crear Negocio



    public function crear_negocio(Request $request){
        
        
        
        return 'f';

    }
}
