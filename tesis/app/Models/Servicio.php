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

    public function comercializacionServicio(){
        return $this->belongsToMany('App\Models\ComercializacionServicio','idComercializacion_servicio','idComercializacion_servicio');
    }

    public function conocimientoServicio(){
        return $this->belongsToMany('App\Models\ConocimientoServicio','idConocimiento','idConocimiento');
    }


}
