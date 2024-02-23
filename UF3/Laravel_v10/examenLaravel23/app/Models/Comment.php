<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'fecha', 'autor'];

    //indicamos que Evento pertenece a User
    public function show()
    {
        return $this->belongsTo('App\Models\Show');
    }
}
