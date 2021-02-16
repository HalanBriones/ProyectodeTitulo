<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoProducto extends Model
{
    use SoftDeletes ;
    protected $date = ['deleted_at'];
    protected $table = 'tipo_producto';
    protected $primaryKey = 'idtipo_producto';
    protected $fillable = [
        'idtipo_producto',
        'nombre_tipo_producto',
        'deleted_at'
    ];
    public $timestamps = false;

    public function comercializacion_producto(){
        return $this->belongsToMany(ComercializacionProducto::class,'tipo_producto_has_comercializacion_producto');
    }
}
