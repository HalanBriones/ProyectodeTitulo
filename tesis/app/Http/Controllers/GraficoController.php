<?php

namespace App\Http\Controllers;

use App\Models\OportunidadNegocio;
use App\Models\OportunidadNegocioHasServicio;
use App\Models\Producto;
use App\Models\ProductoHasOportunidadNegocio;
use App\Models\Servicio;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function graficos(Request $request){
        $objeto = array();
        //Primero buscar op del año
        $fecha = $request['fecha'];
        $ops = OportunidadNegocio::whereYear('fecha_creacion','=',$fecha)->get();
        //obtener todos los productos
        $productos = Producto::all();
        //Recorrer todos los productos
        foreach ($productos as $pro) {
            $contador = 0;
            foreach ($ops as $op) {
                $union = ProductoHasOportunidadNegocio::where('producto_idproducto','=',$pro->idproducto)->where('oportunidad_negocio_idNegocio','=',$op->idNegocio)->get();
                foreach ($union as $uni) {
                    $contador = $contador + $uni->cantidad_productos;
                }
            }
            $array = [
                "producto" => $pro->nombre_producto,
                "cantidad" => $contador
            ];
            array_push($objeto,$array);
        }
        return $objeto;
    }

    public function graficos_servicios(Request $request){
        $objeto = array();
        //Primero buscar op del año
        $fecha = $request['fecha'];
        $ops = OportunidadNegocio::whereYear('fecha_creacion','=',$fecha)->get();
        //obtener todos los productos
        $servicios = Servicio::all();
        //Recorrer todos los productos
        foreach ($servicios as $ser) {
            $contador = 0;
            foreach ($ops as $op) {
                $union = OportunidadNegocioHasServicio::where('servicio_idservicio','=',$ser->idservicio)->where('oportunidad_negocio_idNegocio','=',$op->idNegocio)->get();
                foreach ($union as $uni) {
                    $contador++;
                }
            }
            $array = [
                "servicio" => $ser->nombre_servicio,
                "cantidad" => $contador
            ];
            array_push($objeto,$array);
        }
        return $objeto;
    }
}
