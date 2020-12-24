<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'idPro';
    protected $fillable = [
        'idPro',
        'sku',
        'partNumber',
        'nombre_producto',
        'descripcion',
        'configuracion',
        'precioPventa',
        'precioPcosto',
        'idMarca',
        'idProHW',
        'idProSW',
        'idTcp'
    ];
    public $timestamps=false;

    public function mac(){
        return $this->belongsTo('App\Models\Mac','idMarca','idMarca');
    }

    public function tipo_produto_hw(){
        return $this->belongsTo('App\Models\TipoProductoHW','idProHW','idProHW');
    }

    public function tipo_produto_sw(){
        return $this->belongsTo('App\Models\TipoProductoSW','idProSW','idProSW');
    }

    public function tipo_comercializacion_pro(){
        return $this->belongsTo('App\Models\TipoComercializacionPro','idTcp','idTcp');
    }
}
