<?php

namespace App\Http\Controllers;

use App\Models\ComercializacionProducto;
use App\Models\ComercializacionServicio;
use App\Models\ConocimientoServicio;
use App\Models\Documento;
use App\Models\Estado;
use App\Models\OportunidadNegocio;
use App\Models\OportunidadNegocioHasServicio;
use App\Models\Producto;
use App\Models\ProductoHasOportunidadNegocio;
use App\Models\Servicio;
use App\Models\User;
use App\Models\UsuarioParticipaON;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Location;
use PhpParser\Node\Stmt\Catch_;

class OportunidadNegocioController extends Controller
{
    //vista Negocio
    public function vista_negocio_f1(){
        return view('Negocio.Fase1');
    }
    public function vista_negocio_f2(){
        $productos = Producto::all();
        $servicios = Servicio::all();
        $usuarios = User::all();
        $conocimientos = ConocimientoServicio::all();
        $comercializaciones = ComercializacionProducto::all();
        $comercializacionSer = ComercializacionServicio::all();
        return view('Negocio.Fase2',compact('productos','servicios','usuarios','conocimientos','comercializaciones','comercializacionSer'));
    }

    public function vista_negocio_f3(){
        return view('Negocio.Fase3');
    }

    public function store_negocio_f1(Request $request){
        //guardar nombre negocio descripcion estado y usuario asociado a la creación
        date_default_timezone_set('America/Santiago');
        $estado = Estado::where("nombre_estado","Fase 1:Creación Negocio")->first();//estado inicial 
        $op = new OportunidadNegocio();
        $op->nombre_negocio = $request->nombre_negocio;
        $op->descripcion = $request->descripcion;
        $op->estado_idestado = $estado->idEstado;
        session_start(["name" =>"Login"]);
        $op->usuario_rut = $_SESSION['rut'];
        if($op->save()){
            $_SESSION['idNegocio'] = $op->idNegocio;
            $_SESSION['nombre_negocio'] = $op->nombre_negocio;
            $_SESSION['descripcion_op'] = $op->descripcion;
            $_SESSION['estado_op'] = $op->estado_idestado;
            $_SESSION['rut_op'] = $op->usuario_rut;
            toast('Fase 1 compeltada exitosamente','success');
            return redirect()->route('negociof2.crear');
        }else{
            toast('Error en la creación del negocio','warning');
            return back();
        }
    }

    public function store_negocio_f2(Request $request){
        //inicializar contadores 
        $cont_pro = 0;
        $cont_ser = 0;
        $cont_part = 0;
        $negocio = $request['negocio']; //array con los datos del negocio
        $productos = $request['productos'];//array con los productos
        $servicios = $request['servicios']; //array con los servicios
        // $servicios = json_decode($servicios);
        $participantes = $request['participantes'];//array con los participantes
        // $participantes = json_decode($participantes);
        //validar si es que vienen productos servicios participantes
        //almacenando productos; 
        $contador = 0;
        if($productos != ""){
            foreach($productos as $producto){
                $pro_has_op = new ProductoHasOportunidadNegocio();
                $pro_has_op->producto_idproducto = $producto["producto_id"];
                $pro_has_op->oportunidad_negocio_idNegocio = $negocio[0];
                $pro_has_op->costo_producto = $producto["precioPcosto"];
                $pro_has_op->precio_ventaPro = $producto["precioPventa"];
                $pro_has_op->configuracion = $producto["configuracion"];
                $pro_has_op->margen_NegocioPro = $producto["margen_negocioPro"];
                $pro_has_op->margen_vendedorPro = $producto["margen_vendedorPro"];
                $pro_has_op->ganancia_vendedorPro = $producto["ganancia_vendedor"];
                $pro_has_op->utilidadPro = $producto["utilidadPro"];
                $pro_has_op->numero_meses = $producto["numero_meses"];
                $pro_has_op->precio_mes = $producto["precioxmes"];
                $pro_has_op->comercializacion_producto_idcomercializacion_producto = $producto["comercializacionproducto_id"];
                $pro_has_op->cantidad_productos = $producto['cantidad_productos'];
                $pro_has_op->save();
                $contador++;
            }
            $cont_pro = count($productos);
        }
        //almacenando servicios
        if($servicios != ""){
            foreach($servicios as $servicio){
                $op_has_ser = new OportunidadNegocioHasServicio();
                $op_has_ser->servicio_idservicio = $servicio["servicio_id"];
                $op_has_ser->oportunidad_negocio_idNegocio = $negocio[0];
                $op_has_ser->conocimiento_servicio_idconocimiento_servicio = $servicio["conocimiento_id"];
                $op_has_ser->comercializacion_servicio_idcomercializacion_servicio = $servicio["comercializacionservicio_id"];
                $op_has_ser->costo_hora = $servicio["costoxhora"];
                $op_has_ser->cantidad_horas = $servicio["cantidad_hora"];
                $op_has_ser->costo_totalSer = $servicio["costo_total"];
                $op_has_ser->margen_negocioSer = $servicio["margen_negocioSer"];
                $op_has_ser->valor_total_cliente = $servicio["precioSventa"];
                $op_has_ser->utilidadSer = $servicio["utilidadSer"];
                $op_has_ser->margen_vendedorSer = $servicio["margen_vendedorSer"];
                $op_has_ser->comentarios = $servicio["comentario"];
                $op_has_ser->meses = $servicio["meses"];
                $op_has_ser->costo_total_mes = $servicio["costo_total_mes"];
                $op_has_ser->valor_cliente_hora = $servicio["valor_cliente_hora"];
                $op_has_ser->valor_venta_mes = $servicio["valor_venta_mes"];
                $op_has_ser->ganancia_vendedorSer_clp = $servicio["ganancia_vendedorSer_clp"];
                $op_has_ser->costo_totalSer_clp = $servicio["costo_totalSer_clp"];
                $op_has_ser->costo_total_mes_clp = $servicio["costo_total_mes_clp"];
                $op_has_ser->save();
                $contador++;
            }
            $cont_ser = count($servicios);
        }

        if($participantes != ""){
         //almacenando participantes  
         for($i=0; $i < count($participantes); $i++){ 
            $user_participa = new UsuarioParticipaON();
            $user_participa->usuario_rut = $participantes[$i];
            $user_participa->oportunidad_negocio_idoportunidad_negocio = $negocio[0];
            $user_participa->save();
            $contador++;
         }
         $cont_part = count($participantes);
        }
        $suma = $cont_pro+$cont_ser+$cont_part;
        if($suma == $contador){
            //inserciones con exito, cambio estado a fase 2
            $negocio = OportunidadNegocio::where("idNegocio",$negocio[0])->first();
            $estado = Estado::where("nombre_estado","Fase 2:Inserción Productos, Servicios y Participantes")->first();
            $negocio->estado_idestado = $estado->idEstado;
            if($negocio->save()){
                return 0;
            }else{
                return 1;    
            }
        }else{
         //error en las inserciones
            return 1;
        }
    }

    public function store_negocio_f3(){
        return 'archivos';
    }

    public function getComercializacion($id){
        $comercializacion = DB::table('producto')
        ->join('tipo_producto_has_comercializacion_producto','producto.tipo_producto_idtipo_producto','tipo_producto_has_comercializacion_producto.tipo_producto_idtipo_producto')
        ->join('comercializacion_producto','comercializacion_producto.idcomercializacion_producto','tipo_producto_has_comercializacion_producto.comercializacion_producto_idcomercializacion_producto')
        ->where('producto.idproducto',$id)
        ->select('comercializacion_producto.idcomercializacion_producto','nombre_comercializacion')
        ->get();
        return $comercializacion;
    }

    //mostrar Negocios
    public function VerNegocios(){
        $negocios = OportunidadNegocio::all();
        return view("Negocio.NegociosView",compact("negocios"));
    }

    public function verProAsociado($idNegocio){
        $pro_has_op = DB::table('producto_has_oportunidad_negocio')
        ->join('producto','idproducto','=','producto_idproducto')
        ->join('comercializacion_producto','idcomercializacion_producto','=','comercializacion_producto_idcomercializacion_producto')
        ->where('oportunidad_negocio_idNegocio',$idNegocio)->get();
        return view('Negocio.ProAsoc',compact('pro_has_op'));
    }

    public function verSerAsociado($idNegocio){
        // $ser_has_op = OportunidadNegocioHasServicio::where('oportunidad_negocio_idNegocio',$idNegocio)->get();
        $ser_has_op = DB::table('oportunidad_negocio_has_servicio')
        ->join('servicio','idservicio','=','servicio_idservicio')
        ->join('comercializacion_servicio','idcomercializacion_servicio','=','comercializacion_servicio_idcomercializacion_servicio')
        ->join('conocimiento_servicio','idconocimiento_servicio','=','conocimiento_servicio_idconocimiento_servicio')
        ->where('oportunidad_negocio_idNegocio',$idNegocio)->get();
        return view('Negocio.SerAsoc',compact('ser_has_op'));
    }

    public function verParAsociado($idNegocio){
        $user_participa = DB::table('users')
        ->join('usuario_participa_oportunidad_negocio','usuario_participa_oportunidad_negocio.usuario_rut','=','users.rut')
        ->join('rol','rol.idRol','=','users.rol_idRol')
        ->where('usuario_participa_oportunidad_negocio.oportunidad_negocio_idoportunidad_negocio','=',$idNegocio)
        ->get();
        return view('Negocio.PartAsoc',compact('user_participa'));
    }   
}
