<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConocimientoServicioHasServicio extends Model
{
    protected $table ='conocimiento_servicio_has_servicio';
    protected $fillable = ['conocimiento_servicio_idconocimiento_servicio','servicio_idservicio'];
    public $timestamps = false;
}
