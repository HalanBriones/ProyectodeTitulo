<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alert;
use App\Models\Rol;

class UserController extends Controller
{



    public function vistaRegistro(){
        return view('Usuario.registro');
    }

    public function index(){
        $roles = Rol::all();
        $usuarios = User::with('rol')->get();
        return view('Usuario.mostrarUsers',compact('usuarios','roles'));
    }

    public function busqueda_usuario(Request $request){


        $nombre = $request->nombre_usuario;
        $idrol = $request->rol;

        if($nombre == "" && $idrol ==""){
            $roles = Rol::all();
            $usuarios = User::with('rol')->get();
            return view('Usuario.mostrarUsers',compact('usuarios','roles'));
        }
        if($nombre =="" && $idrol !=""){
            $usuarios = User::where('rol_idRol',$idrol)->with('rol')->get();
            $roles = Rol::all();
            return view('Usuario.mostrarUsers',compact('usuarios','roles'));
        }

        if($nombre !="" && $idrol ==""){
            $usuarios = User::where('nombre','like',"%$nombre%")->with('rol')->get();
            $roles = Rol::all();
            return view('Usuario.mostrarUsers',compact('usuarios','roles'));
        }

        if($nombre !="" && $idrol !=""){
            $usuarios = User::where('nombre','like',"%$nombre%")->where('rol_idRol',$idrol)->with('rol')->get();
            $roles = Rol::all();
            return view('Usuario.mostrarUsers',compact('usuarios','roles'));
        }

    }

    public function registrar(Request $request){
        request()->validate([
            "rut" =>"required |  max:12",
            "nombre" =>"required  | max:255",
            "apellido" =>"required  | max:255",
            "email" => ["email"],
            "email_vali" => ["email"],
            "password" => "required | min:8",
            "password_conf" => "require | min:8",
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
            $user->rol_idRol = 4; //por defecto es un usuario corriente
            
            if($user->save()){
                return redirect('/inicio')->with('success','Registro exitoso');
            }else{
                return redirect('/registro')->with('warning','Lo sentimos no se pudo registrar');
            }
        }
    }


    public function editRol($rut){

        $user = User::with('rol')->where('rut',$rut)->first();
        $roles = Rol::all();
        return view('Usuario.editPerfiles', compact('user','roles'));
    }

    public function updateRol(Request $request, User $user){
        $user->rol_idRol = $request->rol;

        if($user->save()){
            return redirect('/mostrar')->with('success','Actualización de rol correctamente');
        }else{
            return redirect('/mostrar')->with('warning','Error al actualizar el rol');
        }

    }

    public function editPerfil($rut){
        $user = User::with('rol')->where('rut',$rut)->first();
        return view('Usuario.edit', compact('user'));
    }

    public function updatePerfil(Request $request,User $user){
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->password =  Hash::make($request->password);
        try{
            $user->save();
            return view('/welcome')->with('success','Actualización del Perfil correctamente');
        }catch(Exception $e){
            return view('Usuario.edit')->with('warning','Error al actualizar su perfil');
        }

    }

    public function delete_user(Request $request){
        $rut = $request['rut'];
        $usuario = User::find($rut);

        if($usuario->delete()){
            return 0;
        }
    }

}
