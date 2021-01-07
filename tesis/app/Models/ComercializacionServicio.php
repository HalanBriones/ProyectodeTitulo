<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComercializacionServicio extends Model
{
    protected $table = 'comercializacion_servicio';
    protected $primaryKey = 'idcomer_servicio';
    protected $fillable = [
        'idcomer_servicio',
        'nombre_comercializacion_ser',
    ];
    public $timestamps = false;
    public function servicio(){
        return $this->belongsToMany('App\Models\Servicio','idServicio','idServicio');
    }
}
