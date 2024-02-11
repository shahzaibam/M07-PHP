<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    // Especificamos los atributos para crear la tabla
    protected $fillable = ['nif', 'nombre', 'email','type', 'password' ];
}
