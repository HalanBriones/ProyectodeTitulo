<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComercializacionProducto extends Model
{
    protected $table = 'comercializacion_producto';
    protected $primaryKey = 'idcomercializacion_producto';
    protected $fillable = [
        'nombre_comercializacion'
    ];
    public $timestamps = false;

    public function tipo_producto(){
        return $this->belongsToMany('App\Models\TipoProducto','tipo_producto_idtipo_producto','idtipo_producto');
    }
}
