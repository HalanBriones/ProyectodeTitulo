<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'idproducto';
    protected $fillable = [
        'idproducto',
        'nombre_producto',
        'sigla_producto',
        'descripcion',
        'tipo_producto_idtipo_producto',
        'mac_idMac'
    ];
    public $timestamps=false;

    public function mac(){
        return $this->belongsTo('App\Models\Mac','idMarca','idMarca');
    }

    public function tipo_producto(){
        return $this->belongsTo('App\Models\TipoProducto', 'idTipoProducto', 'idTipoProducto');
    }
}
