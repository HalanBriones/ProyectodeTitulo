<?php

namespace App\Http\Controllers;

use App\Models\CompaniaCotiza;
use App\Models\OportunidadNegocio;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CotizacionController extends Controller
{   
    
    public function cotizacion ($idNegocio){
        $servicios =  DB::table('oportunidad_negocio')
        ->join('oportunidad_negocio_has_servicio','oportunidad_negocio_has_servicio.oportunidad_negocio_idNegocio','=','oportunidad_negocio.idNegocio')
        ->join('servicio','servicio.idservicio','=','oportunidad_negocio_has_servicio.servicio_idservicio')
        ->select('servicio.nombre_servicio','servicio.descripcion','oportunidad_negocio_has_servicio.valor_total_cliente')
        ->where('idNegocio',$idNegocio)->get();
        $productos = DB::table('oportunidad_negocio')
        ->join('producto_has_oportunidad_negocio','producto_has_oportunidad_negocio.oportunidad_negocio_idNegocio','=','oportunidad_negocio.idNegocio')
        ->join('producto','producto.idproducto','=','producto_has_oportunidad_negocio.producto_idproducto')
        ->select('producto.nombre_producto','producto.descripcion','producto_has_oportunidad_negocio.cantidad_productos','producto_has_oportunidad_negocio.precio_ventaPro')
        ->where('idNegocio',$idNegocio)->get();
        $compañia = DB::table('oportunidad_negocio')
        ->join('compañia_cotiza','compañia_cotiza.idcompañia_cotiza','=','oportunidad_negocio.idcompañia_cotiza')
        ->where('idNegocio',$idNegocio)->get();
        $date = date('Y-m-d');
        $pdf = PDF::loadView('PDF.datos',compact('servicios','productos','compañia','date'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('datos.pdf');
    }
    public function crear_cotizacion(){
        $pdf = PDF::loadView('cotizacion',compact('negocio'));
    }

    public function enviarCotizacion($idNegocio){
        $servicios =  DB::table('oportunidad_negocio')
        ->join('oportunidad_negocio_has_servicio','oportunidad_negocio_has_servicio.oportunidad_negocio_idNegocio','=','oportunidad_negocio.idNegocio')
        ->join('servicio','servicio.idservicio','=','oportunidad_negocio_has_servicio.servicio_idservicio')
        ->select('servicio.nombre_servicio','servicio.descripcion','oportunidad_negocio_has_servicio.valor_total_cliente')
        ->where('idNegocio',$idNegocio)->get();
        $productos = DB::table('oportunidad_negocio')
        ->join('producto_has_oportunidad_negocio','producto_has_oportunidad_negocio.oportunidad_negocio_idNegocio','=','oportunidad_negocio.idNegocio')
        ->join('producto','producto.idproducto','=','producto_has_oportunidad_negocio.producto_idproducto')
        ->select('producto.nombre_producto','producto.descripcion','producto_has_oportunidad_negocio.cantidad_productos','producto_has_oportunidad_negocio.precio_ventaPro')
        ->where('idNegocio',$idNegocio)->get();
        $compañia = DB::table('oportunidad_negocio')
        ->join('compañia_cotiza','compañia_cotiza.idcompañia_cotiza','=','oportunidad_negocio.idcompañia_cotiza')
        ->where('idNegocio',$idNegocio)->get();
        $date = date('Y-m-d');
        $pdf = PDF::loadView('PDF.datos',compact('servicios','productos','compañia','date'))->setOptions(['defaultFont' => 'sans-serif']);

        $negocio = OportunidadNegocio::find($idNegocio);
        $compañia = CompaniaCotiza::where('idcompañia_cotiza',$negocio->idcompañia_cotiza)->first();

        try{

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
