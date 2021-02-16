<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $table = 'producto';
    protected $primaryKey = 'idproducto';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'idproducto',
        'nombre_producto',
        'sigla_producto',
        'deleted_at',
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

    public function scopeNombres($query,$nombre_producto){
        if($nombre_producto){
            return $query->where('nombre_producto','like',"%$nombre_producto%");
        }
    }
}
