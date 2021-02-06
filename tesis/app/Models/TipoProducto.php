<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'tipo_producto';
    protected $primaryKey = 'idtipo_producto';
    protected $fillable = [
        'idtipo_producto',
        'nombre_tipo_producto'
    ];
    public $timestamps = false;

    public function comercializacion_producto(){
        return $this->belongsToMany('App\Models\ComercializacionProducto','comercializacion_producto_idcomercializacion','idcomercializacion');
    }
}
