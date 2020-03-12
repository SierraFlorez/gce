<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// Modelo de usuario
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'apellidos', 'email', 'sangre', 'rh', 'password', 'tipo_documento', 'documento', 'eps', 'telefono', 'estado', 'rol_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function roles()
    {
        return $this->belongsTo('App\Role', 'rol_id')->withDefault();
    }
    public function contactos()
    {
        return $this->hasMany('App\Contacto_emergencia', 'id_user', 'id');
    }
}
