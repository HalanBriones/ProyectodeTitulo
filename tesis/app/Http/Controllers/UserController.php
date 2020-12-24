<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alert;



class UserController extends Controller
{



    public function vistaRegistro(){
        return view('Usuario.registro');
    }

    public function vistaUsuarios(){
        return view('Usuario.mostrarUsers');
    }

    public function index(){
        $usuarios = User::with('perfil')->get();
        return view('Usuario.mostrarUsers',compact('usuarios'));
    }


    public function registrar(Request $request){
 
        request()->validate([
            "rut" =>"required |  max:12",
            "nombre" =>"required  | max:255",
            "apellido" =>"required  | max:255",
            "email" => ["email"],
            "email_validacion" => ["email"],
            "password" => "required | min:8",
            "password_confirm" => "require | min:8",
            "telefono" => "required | max:9"
        ]);

        $rut = str_ireplace("-", "", $request->rut);
        $rut = str_ireplace(".", "", $rut);
           

        $buscarRut = User::where('rut',$rut)->first();
        $buscarEmail = User::where('email',$request->email)->first();

        //guardar datos
        if($buscarRut || $buscarEmail){
            return redirect('/registro')->with('warning','Lo sentimos ya existe un usuario con estas credenciales');
        }else{
            $user = new User();
            $user->rut = $rut;
            $user->nombre = $request->nombre;
            $user->apellido = $request->apellido;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->telefono = $request->telefono;
            $user->idPerfil = 4; //por defecto es un usuario corriente

            //Obtener rol en base a id
            $perfil = Perfil::where('idPerfil',$user->idPerfil)->first();
            
            if($user->save()){

                return redirect('/inicio',compact('perfil'))->with('success','Registro exitoso');
            }else{
                return redirect('/registro',compact('perfil'))->with('warning','Lo sentimos no se pudo registrar');
            }
        }
    }


    public function editRol($rut){

        $user = User::with('perfil')->where('rut',$rut)->first();

        $perfiles = Perfil::all();
        return view('Usuario.editPerfiles', compact('user','perfiles'));
    }

    public function updateRol(Request $request, User $user){
        return $request;  
    }

    public function editPerfil($rut){
        $user = User::with('perfil')->where('rut',$rut)->first();
        return view('Usuario.edit', compact('user'));
    }

    public function updatePerfil(Request $request,User $user){
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->telefono = $request->telefono;

        try{
            $user->save();

            return view('/welcome');
        }catch(Exception $e){
            return view('Usuario.edit');
        }

    }



}
