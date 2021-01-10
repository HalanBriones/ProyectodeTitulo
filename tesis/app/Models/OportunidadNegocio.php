<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OportunidadNegocio extends Model
{
    protected $table = 'oportunidad_negocio';
    protected $primaryKey = 'idNegocio';
    protected $fillable = [
        'nombre_negocio',
        'sigla_negocio',
        'descripcion',
        'precio_final',
        'margen',
        'fecha_creacion',
        'estado_idestado',
        'usuario_rut'
    ];
    public $timestamps= false;

    //usuario crea 1 a n negocios y el negocio lo crea 1 y 1 solo usuario
    public function user(){
        return $this->belongsTo('App\Models\User','usuario_rut','rut',);
    }

    public function estado(){
        return $this->belongsTo('App\Models\Estado','estado_idestado','idEstado');
    }
    //1,n usuarios participan en un ON y en esa ON participan de 1,n usuarios
    public function users(){
        return $this->belongsToMany('App\Models\User','usuario_rut','rut');
    }

    public function servicios(){
        return $this->belongsToMany('App\Models\Servicio','servicio_idservicio','idservicio');
    }
    public function productos(){
        return $this->belongsToMany('App\Models\Producto','producto_idproducto','idproducto');
    }

}
