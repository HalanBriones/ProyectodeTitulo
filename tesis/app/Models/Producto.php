<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'idPro';
    protected $fillable = [
        'idPro',
        'nombre_producto',
        'descripcion',
        'idMarca',
        'idPro'
    ];
    public $timestamps=false;

    public function mac(){
        return $this->belongsTo('App\Models\Mac','idMarca','idMarca');
    }

    public function tipo_producto(){
        return $this->belongsTo('App\Models\TipoProducto', 'idTipoProducto', 'idTipoProducto');
    }
}
