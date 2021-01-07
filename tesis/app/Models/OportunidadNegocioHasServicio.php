<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OportunidadNegocioHasServicio extends Model
{
    protected $table = 'oportunidad_negocio_has_servicio';
    protected $primaryKey = ['oportunidad_negocio_idoportunidad_negocio','servicio_idservicio'];
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
}
