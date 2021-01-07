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

    public function users(){
        return $this->belongsToMany('App\Models\User','rut','rut');
    }

    public function estado(){
        return $this->belongsTo('App\Models\Estado','idEstado','idEstado');
    }   

}
