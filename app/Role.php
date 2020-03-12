<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Modelo de rol
class Role extends Model
{
    protected $fillable = ['id','nombre'];  
}