<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class MarcaController extends Controller
{
    //crear marca
    public function create (Request $request){
        
        $marca = new Marca();

        $marca->idMac = $request->input('idMac');
        $marca->nombre = $request->input('nombre');
        
        $marca->save();

        return $marca;
    }

    //mostrar todas marcas
    public function index (){
        $marcas = Marca::all();

        return $marcas;
    }

    //mostrar marca por nombre 
    public function marca_nombre($nombre){

        $nombres = Marca::all()->where('nombre',$nombre);

        return $nombres;
    }

    //mostrar marca por id



    //editar marca por id

    public function update(Request $request){

        $mac = Marca::where('idMac',$request->idMac)->first();

        $mac->nombre = $request->nombre;

        $mac->save();

        return $mac;
    }

    
    public function delete ($idMac){

        $marc = Marca::find($idMac);

        Try{
            $marc->delete();
            echo 'eliminacion exitosa';
        }catch(Exception $e){
            echo 'eliminacion erronea';
        }

    }

}