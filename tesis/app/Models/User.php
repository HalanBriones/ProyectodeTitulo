<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey = 'rut';
    protected $fillable = [
        'rut',
        'nombre',
        'apellido',
        'email',
        'password',
        'telefono',
        'rol_idRol'
    ];

    public function rol(){
        return $this->belongsTo('App\Models\Rol','idRol','idRol');
    }
    public function oportunidad_negocio(){
        return $this->belongsToMany('App\Models\OportunidadNegocio','idoportunidad_negocio','idoportunidad_negocio');
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
