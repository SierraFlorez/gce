<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto_emergencia extends Model
{
    protected $table ='contactos_emergencia';
    protected $fillable = ['id_user','nombre','documento','telefono','email']; 

    public function usuarios()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
