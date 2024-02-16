<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'fecha', 'hora', 'autonomo_id' ,'empresa_id'];

}
