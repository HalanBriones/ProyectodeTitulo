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
        'siglas',
        'descripcion',
        'precio_final',
        'margen',
        'idEstado',
        'idTipoNegocio',
        'idMoneda'
    ];
    public $timestamps= false;

    public function users(){
        return $this->belongsToMany('App\Models\User','rut','rut');
    }

    public function estado(){
        return $this->belongsTo('App\Models\Estado','idEstado','idEstado');
    }

    public function tipo_negocio(){
        return $this->belongsTo('App\Models\TipoNegocio','idTipoNegocio','idTipoNegocio');
    }

    public function tipo_moneda(){
        return $this->belongsTo('App\Models\TipoMoneda','idMoneda','idMoneda');
    }

}
