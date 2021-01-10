<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documento';
    protected $primaryKey = 'iddocumento';
    protected $fillable = [
        'nombre_doc',
        'fecha_subida',
        'oportunidad_negocio_idoportunidad_negocio'
    ];

    public function oportunidad_negocio(){
        return $this->belongsTo('App\Models\OportunidadNegocio','oportunidad_negocio_idoportunidad_negocio','idNeogocio',);
    }
}
