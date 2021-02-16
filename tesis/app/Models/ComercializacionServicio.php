<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComercializacionServicio extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];
    protected $table = 'comercializacion_servicio';
    protected $primaryKey = 'idcomercializacion_servicio';
    protected $fillable = [
        'idcomercializacion_servicio',
        'deleted_at',
        'nombre_comercializacion',
        'deleted_at'
    ];
    public $timestamps = false;

    public function servicio(){
        return $this->belongsToMany('App\Models\Servicio','servicio_idservicio','idservicio');
    }
}
