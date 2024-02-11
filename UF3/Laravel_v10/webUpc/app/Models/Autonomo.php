<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autonomo extends Model
{
    use HasFactory;

    //especificamos los atributos para crear la tabla de autonomos
    protected $fillable = ['nif', 'nombre', 'email','type', 'password' ];

}
