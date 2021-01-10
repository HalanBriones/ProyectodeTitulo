<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComercializacionServicio extends Model
{
    protected $table = 'comercializacion_servicio';
    protected $primaryKey = 'idcomercializacion_servicio';
    protected $fillable = [
        'idcomercializacion_servicio',
        'nombre_comercializacion',
    ];
    public $timestamps = false;

    public function servicio(){
        return $this->belongsToMany('App\Models\Servicio','servicio_idservicio','idservicio');
    }
}
