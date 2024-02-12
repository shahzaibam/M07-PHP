<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Autonomo extends Authenticatable
{
    use Notifiable;

    //especificamos los atributos para crear la tabla de autonomos
    protected $fillable = ['nif', 'nombre', 'email','type', 'password' ];

}
