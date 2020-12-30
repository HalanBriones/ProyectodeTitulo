<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComercializacionServicio extends Model
{
    protected $table = 'comercializacion_servicio';
    protected $primaryKey = 'idComer_servicio';
    protected $fillable = [
        'idComer_servicio',
        'nombre_comercializacion_ser',
        'valor'
    ];
    public $timestamps = false;
    public function servicio(){
        return $this->belongsToMany('App\Models\Servicio','idServicio','idServicio');
    }
}
