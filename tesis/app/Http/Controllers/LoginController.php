<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
                
                $perfil = Rol::where('idRol',$usuario->idPerfil)->first();
                session_start(['name' => 'Login']);
                $_SESSION['rut'] = $usuario->rut;
                $_SESSION['nombre'] = $usuario->nombre;
                $_SESSION['apellido'] = $usuario->apellido;
                $_SESSION['email'] = $usuario->email;
                $_SESSION['telefono'] = $usuario->email;
                $_SESSION['idRol'] = $usuario->idPerfil;
                $_SESSION['rol'] = $perfil->nombre_rol;
        
                return  redirect('/inicio');
            }else{
                toast('Error al ingresar las credenciales','error');
                return redirect('login');
            }

        }else{
            toast('Error al ingresar las credenciales','error');
            return redirect('login');
        }
        

    }

    public function logout()
    {
        session_start(['name' => 'Login']);
        session_destroy();
        return redirect('/');
    }

}

