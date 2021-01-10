<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConocimientoServicio extends Model
{
    protected $table = 'conocimiento_servicio';
    protected $primaryKey = 'idconocimiento_servicio';
    protected $fillable = [
        'idconocimiento_servicio',
        'nombre_conocimiento',
    ];
    public $timestamps = false;

    public function servicio(){
        return $this->belongsToMany('App\Models\Servicio','servicio_idservicio','idservicio');
    }
}
