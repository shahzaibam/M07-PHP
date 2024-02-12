<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Empresa extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    // Especificamos los atributos para crear la tabla
    protected $fillable = ['nif', 'nombre', 'email','type', 'password' ];
}
