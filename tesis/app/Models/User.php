<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    use SoftDeletes ;
    protected $date = ['deleted_at'];
    protected $table = 'users';
    protected $primaryKey = 'rut';
    protected $fillable = [
        'rut',
        'nombre',
        'apellido',
        'email',
        'deleted_at',
        'password',
        'telefono',
        'rol_idRol'
    ];
    public $timestamps = false;

    public function rol(){
        return $this->belongsTo('App\Models\Rol','rol_idRol','idRol');
    }

    public function oportunidades_negocios(){
        return $this->belongsToMany('App\Models\OportunidadNegocio','oportunidad_negocio_idoportunidad_negocio','idNegocio',);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
