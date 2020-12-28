<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function vista(){
        return view('login');
    }

    public function login(Request $request)
    {
        $usuario = User::where('email',$request->email)->first();
        if($usuario){

            if(Hash::check($request->password,$usuario->password)){
                
                $perfil = Perfil::where('idPerfil',$usuario->idPerfil)->first();
                session_start(['name' => 'Login']);
                $_SESSION['rut'] = $usuario->rut;
                $_SESSION['nombre'] = $usuario->nombre;
                $_SESSION['apellidos'] = $usuario->apellido;
                $_SESSION['email'] = $usuario->email;
                $_SESSION['telefono'] = $usuario->email;
                $_SESSION['idPerfil'] = $usuario->idPerfil;
                $_SESSION['perfil'] = $perfil->nombre_perfil;
        
                return  redirect('/inicio');
            }

        }else{
            return view('login');
        }
        

    }

    public function logout()
    {
        session_start(['name' => 'Login']);
        session_destroy();
        return redirect('/');
    }

}
