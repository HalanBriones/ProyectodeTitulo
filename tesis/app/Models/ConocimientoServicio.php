<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConocimientoServicio extends Model
{
    protected $table = 'conocimiento_servicio';
    protected $primaryKey = 'idConocimiento';
    protected $fillable = [
        'idConocimiento',
        'nombre_conocimiento',
        'valor_conocimiento'
    ];
    public $timestamps = false;

    public function servicio(){
        return $this->belongsToMany('App\Models\Servicio','idServicio','idServicio');
    }
}
