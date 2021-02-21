<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ProductoHasSolicitud;
use App\Models\ServicioHasSolicitud;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    public function vista(){
        $servicios = DB ::table('servicio')->get();
        $productos = DB::table('producto')
        ->join('tipo_producto','idtipo_producto','=','tipo_producto_idtipo_producto')
        ->join('mac','idMac','=','mac_idMac')->get();

        return view('FormCliente',compact('productos','servicios'));
    }

    public function solicitudes(){
        $solicitudes = DB::table('solicitud')
        ->join('cliente','cliente.idcliente','=','solicitud.idcliente')->get();
        return view('Solicitud.solicitudes',compact('solicitudes'));
    }

    public function productos($idSolicitud){
        $productos = DB::table('solicitud')
        ->join('producto_has_solicitud','producto_has_solicitud.solicitud_idsolicitud','=','solicitud.idSolicitud')
        ->join('producto','producto.idproducto','=','producto_has_solicitud.producto_idproducto')
        ->join('mac','mac.idMac','=','producto.mac_idMac')
        ->join('tipo_producto','tipo_producto.idtipo_producto','=','producto.tipo_producto_idtipo_producto')
        ->select('producto.nombre_producto','producto.modelo','producto.version','mac.nombre_marca','tipo_producto.nombre_tipo_producto')
        ->where('solicitud.idSolicitud',$idSolicitud)->distinct()->get();
        return view('Solicitud.solicitudProductos',compact('productos'));
    }

    public function servicios($idSolicitud){
        $servicios = DB::table('solicitud')
        ->join('servicio_has_solicitud','servicio_has_solicitud.solicitud_idsolicitud','=','solicitud.idSolicitud')
        ->join('servicio','servicio.idservicio','=','servicio_has_solicitud.servicio_idservicio')
        ->where('solicitud.idSolicitud',$idSolicitud)->distinct()->get();

        return view('Solicitud.solicitudServicios',compact('servicios'));
    }

    public function store_solicitud(Request $request){
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre_cliente;
        $cliente->apellido= $request->apellido_cliente;
        $cliente->email = $request->correo_cliente;
        $cliente->telefono = $request->telefono_cliente;
        if($cliente->save()){
            $solicitud = new Solicitud();
            $solicitud->fecha_solicitud = date('Y-m-d');
            $solicitud->idcliente = $cliente->idcliente;
            if($solicitud->save()){
                $productos = $request->productos;
                $servicios = $request->servicios;
                $servicios = array_slice($servicios,1);
                $productos = array_slice($productos,1);
                $cont_pro = 0;
                if(count($productos) > 0){

                    foreach ($productos as $pro) {
                        $soliPro = new ProductoHasSolicitud();
                        $soliPro->producto_idproducto = $pro;
                        $soliPro->solicitud_idsolicitud = $solicitud->idSolicitud;
                        $soliPro->save();
                        $cont_pro++;
                    }
                }
                $cont_ser = 0;
                if(count($servicios) > 0){
                    foreach ($servicios as $ser) {
                        $soliSer = new ServicioHasSolicitud();
                        $soliSer->servicio_idservicio = $ser;
                        $soliSer->solicitud_idsolicitud = $solicitud->idSolicitud;
                        $soliSer->save();
                        $cont_ser++;
                    }
                }

                $suma = count($servicios)+count($productos);
                $suma2 = $cont_ser+$cont_pro;

                if($suma == $suma2){
                    toast('Solicitud enviada con exito, pronto se pondran en contacto con usted','success');
                    return back();
                }else{
                    toast('Enviar nuevamente la solicitud','warning');
                    return back();
                }
            }else{
                toast('Enviar nuevamente la solicitud','warning');
                return back();
            }
        }else{
            toast('Error al enviar la solicitud','warning');
            return back();
        }



    }
}
