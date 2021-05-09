<?php

namespace App\Http\Controllers;

use App\Mail\Cotizacion;
use App\Models\CompaniaCotiza;
use App\Models\Estado;
use App\Models\OportunidadNegocio;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use DOMDocument;

class CotizacionController extends Controller
{   
    
    public function cotizacion ($idNegocio){
        //creación cotizacion
        $servicios =  DB::table('oportunidad_negocio')
        ->join('oportunidad_negocio_has_servicio','oportunidad_negocio_has_servicio.oportunidad_negocio_idNegocio','=','oportunidad_negocio.idNegocio')
        ->join('servicio','servicio.idservicio','=','oportunidad_negocio_has_servicio.servicio_idservicio')
        ->select('servicio.sigla_servicio','servicio.nombre_servicio','servicio.descripcion','oportunidad_negocio_has_servicio.valor_total_cliente')
        ->where('idNegocio',$idNegocio)->get();
        $productos = DB::table('oportunidad_negocio')
        ->join('producto_has_oportunidad_negocio','producto_has_oportunidad_negocio.oportunidad_negocio_idNegocio','=','oportunidad_negocio.idNegocio')
        ->join('producto','producto.idproducto','=','producto_has_oportunidad_negocio.producto_idproducto')
        ->select('producto.sigla_producto','producto.nombre_producto','producto.descripcion','producto_has_oportunidad_negocio.cantidad_productos','producto_has_oportunidad_negocio.precio_ventaPro')
        ->where('idNegocio',$idNegocio)->get();
        $compañia = DB::table('oportunidad_negocio')
        ->join('compañia_cotiza','compañia_cotiza.idcompañia_cotiza','=','oportunidad_negocio.idcompañia_cotiza')
        ->where('idNegocio',$idNegocio)->get();
        $date = date('Y-m-d');
        $pdf = PDF::loadView('PDF.datos',compact('servicios','productos','compañia','date'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('datos.pdf');
    }

    public function enviarCotizacion($idNegocio){
        $servicios =  DB::table('oportunidad_negocio')
        ->join('oportunidad_negocio_has_servicio','oportunidad_negocio_has_servicio.oportunidad_negocio_idNegocio','=','oportunidad_negocio.idNegocio')
        ->join('servicio','servicio.idservicio','=','oportunidad_negocio_has_servicio.servicio_idservicio')
        ->select('servicio.sigla_servicio','servicio.nombre_servicio','servicio.descripcion','oportunidad_negocio_has_servicio.valor_total_cliente')
        ->where('idNegocio',$idNegocio)->get();
        $productos = DB::table('oportunidad_negocio')
        ->join('producto_has_oportunidad_negocio','producto_has_oportunidad_negocio.oportunidad_negocio_idNegocio','=','oportunidad_negocio.idNegocio')
        ->join('producto','producto.idproducto','=','producto_has_oportunidad_negocio.producto_idproducto')
        ->select('producto.sigla_producto','producto.nombre_producto','producto.descripcion','producto_has_oportunidad_negocio.cantidad_productos','producto_has_oportunidad_negocio.precio_ventaPro')
        ->where('idNegocio',$idNegocio)->get();
        $compañia = DB::table('oportunidad_negocio')
        ->join('compañia_cotiza','compañia_cotiza.idcompañia_cotiza','=','oportunidad_negocio.idcompañia_cotiza')
        ->where('idNegocio',$idNegocio)->get();
        $date = date('Y-m-d');
        $pdf = PDF::loadView('PDF.datos',compact('servicios','productos','compañia','date'))->setOptions(['defaultFont' => 'sans-serif'])->save(storage_path('app/public/') . 'archivo.pdf');

        $negocio = OportunidadNegocio::find($idNegocio);
        //creando sigla negocio
        $sigla = "";
        foreach ($productos as $pro) {
            $sigla = $sigla.$pro->sigla_producto;
        }
        foreach ($servicios as $ser) {
            $sigla = $sigla.$ser->sigla_servicio;
        }
        //cambiar estado
        $estado = Estado::where('nombre_estado','=','Cotización enviada')->first();
        $negocio->sigla_negocio = $sigla;
        $negocio->estado_idestado= $estado->idEstado;
        try{
            $negocio->save();
        }catch(Exception $e){
            return $e->getMessage();
        }

        $compañia = CompaniaCotiza::where('idcompañia_cotiza',$negocio->idcompañia_cotiza)->first();
        $data = [];
        try{
            Mail::send('Cotizacion.CorreoCotizacion', $data, function ($message) use ($compañia) {
                $message->from('halanbm98@gmail.com', 'ITECHI');
                $message->to($compañia->correo);
                $message->subject('Cotización');
                $message->attach(storage_path('app/public/') . 'archivo.pdf');
            });
            toast("Cotización enviada con exito","success");
            return back();
        }catch(Exception $e){
            $e->getMessage();
        }
    }
}
                // $data = [];
                // $mensaje = ["mensaje" =>"Empresas ITECHI le hace envío de la cotización requerida","mensaje2" => "cualquier duda existente comunicarse con algun gerente comercial"];
            //     try{
            //          Mail::send(['name' => $compañia->compañia], $data,function ($message) use ($compañia,$mensaje) {
            //              $message->from('halanbm98@gmail.com', 'ITECHI');
            //              $message->attach(storage_path('app/public/') . 'archivo.pdf');
            //              $message->to($compañia->correo)->subject('Cotización');
            //          });

            //         // Mail::to($compañia->correo)->send(new Cotizacion()->attach(storage_path('app/public/') . 'archivo.pdf'));
            //         toast("Cotización enviada con exito","success");
            //         return back();
            //     }catch(Exception $e){
            //         return $e->getMessage();
            //     }
            // }

