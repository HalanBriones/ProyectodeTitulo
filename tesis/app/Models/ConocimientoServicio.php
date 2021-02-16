<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConocimientoServicio extends Model
{
    
    use SoftDeletes;
    protected $date = ['deleted_at'];
    protected $table = 'conocimiento_servicio';
    protected $primaryKey = 'idconocimiento_servicio';
    protected $fillable = [
        'idconocimiento_servicio',
        'deleted_at',
        'nombre_conocimiento',
    ];
    public $timestamps = false;

    public function servicio(){
        return $this->belongsToMany('App\Models\Servicio','servicio_idservicio','idservicio');
    }
}
