<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apuntar extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','events_id', 'torneos_id'];


    //al apuntar pertenece a un user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function evento()
    {
        return $this->belongsTo(Evento::class, 'events_id');
    }

    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'torneos_id');
    }
}
