<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';
    protected $primaryKey = 'idservicio';
    protected $fillable = [
        'idservicio',
        'idChileCompra',
        'nombre_servicio',
        'descripcion'
    ];
    public $timestamps = false;

    public function conocimientoServicio(){
        return $this->belongsToMany('App\Models\ConocimientoServicio','conocimiento_servicio_idconocimiento_servicio','idconocimiento_servicio');
    }

    public function comercializacionServicio(){
        return $this->belongsToMany('App\Models\ComercializacionServicio','comercializacion_servicio_idcomercializacion_servicio','idcomercializacion_servicio');
    }

    public function oportunidad_negocio(){
        return $this->belongsToMany('App\Models\OportunidadNegocio','oportunidad_negocio_idoportunidad_negocio','idNegocio');
    }




}
