<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'date', 'time'];

    public function user()
    {
        return $this->belongsTo('App\Models\User'); // Asegúrate de que la ruta del namespace sea correcta
    }


}
