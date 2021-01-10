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
        return $this->belongsTo('App\Models\Mac','mac_idMac','idMac');
    }

    public function tipo_producto(){
        return $this->belongsTo('App\Models\TipoProducto', 'tipo_producto_idtipo_producto', 'idtipo_producto');
    }

    public function oportunidad_negocio_pro(){
        return $this->belongsToMany('App\Models\OportunidadNegocio','oportunidad_negocio_idoportunidad_negocio','idNegocio');
    }
}
