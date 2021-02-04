<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OportunidadNegocioHasServicio extends Model
{
    protected $table = 'oportunidad_negocio_has_servicio';
    protected $fillable = [
        'costo_hora',
        'cantidad_horas',
        'comentarios',
        'margen_negocioSer',
        'valor_total_cliente',
        'costo_totalSer',
        'margen_vendedorSer',
        'ganancia_vendedorSer',
        'utilidadSer',
        'comercializacon_servicio_idcomercializacon_servicio',
        'conocimiento_servicio_idconocimiento_servicio'
    ]; 
    public $timestamps = false;
    public function comercializacion_servicio(){
        return $this->belongsTo('App\Models\ComercializacionServicio','comercializacion_servicio_idcomercialicacion_servicio','idcomercializacion_servicio');
    }

    public function conocimiento_servicio(){
        return $this->belongsTo('App\Models\ConocimientoServicio','conocimiento_servicio_idconocimiento_servicio','idconocimiento_servicio');
    }
}
