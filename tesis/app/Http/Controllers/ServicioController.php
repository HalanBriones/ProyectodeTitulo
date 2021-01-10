<?php

namespace App\Http\Controllers;
use App\Models\ConocimientoServicio;
use App\Models\Servicio;
use App\Models\ConocimientoServicioHasServicio;
use Illuminate\Http\Request;
use App\Models\ComercializacionServicio;
use Alert;
use App\Models\ComercializacionServicioHasServicio;

class ServicioController extends Controller
{

    //vista creacion producto

    public function vistaRegistro_Servicio(){
        return view('Servicio.creacionServicio');
    }

    public function edit_servicio($idServicio){
        $servicio = Servicio::where('idservicio',$idServicio)->first();
        return view('Servicio.editServicio',compact('servicio'));
    }

    public function update_servicio(Request $request, Servicio $servicio){

        $servicio->nombre_servicio = $request->nombre_servicio;
        $servicio->idChileCompra = $request->idChileCompra;
        $servicio->descripcion = $request->descripcion;

        if($servicio->save()){
            return redirect('/servicios')->with('success','Servicio editado Correctamente');
        }else{
            return redirect('/servicios')->with('warning','Error al editar servicio');
        }
    }

    public function store_servicio(Request $request){
        request()->validate([
            "nombre_servicio" => "required",
            "descripcion" => "required"
        ]);    
        $sigla_servicio= substr($request->nombre_servicio,0,-4);
        $servicio = new Servicio();
        $servicio->idChileCompra = $request->idChileCompra;
        $servicio->nombre_servicio = $request->nombre_servicio;
        $servicio->descripcion = $request->descripcion;
        $servicio->sigla_servicio = $sigla_servicio;

        $existe = Servicio::where('nombre_servicio',$servicio->nombre_servicio)->first();
         if($existe){
            return back()->with('warning', 'El Servicio ya existe');
         }

        if($servicio->save()){
            //enlazar el servicio con todos los tipos de conocimiento

            $conocimientos = ConocimientoServicio::all();
            foreach($conocimientos as $conociemiento){
                $conociemiento_has_servicio = new ConocimientoServicioHasServicio();

                $conociemiento_has_servicio->conocimiento_servicio_idconocimiento_servicio = $conociemiento->idconocimiento_servicio;
                $conociemiento_has_servicio->servicio_idservicio = $servicio->idservicio;

                $conociemiento_has_servicio->save();
            }

            //enlazar el servicio con todos los tipos de comercializacion

            $comer = ComercializacionServicio::all();

            foreach($comer as $com)
            {
                $ser_comer = new ComercializacionServicioHasServicio();
                $ser_comer->comercializacion_servicio_idcomercializacion_servicio = $com->idcomercializacion_servicio;
                $ser_comer->servicio_idservicio = $servicio->idservicio;

                $ser_comer->save();
            }

            return redirect('/registroServicio')->with('success','Servicio creado correctamente');
        }else{
            return redirect('/registroServicio')->whith('warning','Error al crear el servicio');
        }
    }

    public function mostrar_servicios(){
        $servicios = Servicio::all();
        return view('Servicio.servicios',compact('servicios'));
    }


}