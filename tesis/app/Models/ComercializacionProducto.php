<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComercializacionProducto extends Model
{
    use SoftDeletes ;
    protected $table = 'comercializacion_producto';
    protected $primaryKey = 'idcomercializacion_producto';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre_comercializacion',
        'deleted_at'
    ];
    public $timestamps = false;

    public function tipo_producto(){
        return $this->belongsToMany(TipoProducto::class,'tipo_producto_has_comercializacion_producto');
    }
}
