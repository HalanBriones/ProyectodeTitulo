<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function mostrar(){
        $usuarios = User::with('perfil')->get();
        
        return $usuarios;
    }

    public function registrar(Request $request){

        session_start(['name' => 'Nuevo']);

        request()->validate([
            "rut" =>"required | unique:users | max:12",
            "nombre" =>"required  | max:255",
            "apellido" =>"required  | max:255",
            "email" => ["required , email"],
            "email_validacion" => ["required , email"],
            "password" => "required | min:8",
            "password_confirm" => "require | min:8",
            "telefono" => "required"
        ]);
        
        
        $rut = str_ireplace("-", "", $request->rut);
        $rut = str_ireplace(".", "", $rut);


        $buscarRut = User::where('rut',$rut)->first();
        $buscarEmail = User::where('email',$request->email)->first();

        //guardar datos
        if($buscarRut || $buscarEmail){
            return 'Datos pertenecen a un usuario ya existente';
        }else{

            session_start(['name' => 'perfil']);
            $user = new User();
            $user->rut = $rut;
            $user->nombre = $request->nombre;
            $user->apellido = $request->apellido;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->telefono = $request->telefono;
            $user->idPerfil = 4; //por defecto es un usuario corriente

            //Obtener rol en base a id
            $perfil = Perfil::where('idPerfil',$user->idPerfil);

            $_SESSION['perfil'] = $perfil;

            if($user->save()){
                return view('welcome');
            }else{
                return 'Error al Registrarse';
            }
        }
    }

    public function actualizar_perfil($rut){
        $rut = str_ireplace("-", "", $rut);
        $rut = str_ireplace(".", "", $rut);
        
        $usuario =  User::with('perfil')->where('rut',$rut)->first();

        return $usuario;
    }

    public function actualizar_rol($rut){
        return 'hola';
    }


}
