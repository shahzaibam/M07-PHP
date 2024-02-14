<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    // Atributos asignables en masa
    protected $fillable = ['user_id', 'email', 'type', 'password' ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventos()
    {
        return $this->morphMany(Evento::class, 'creatable');
    }

}
