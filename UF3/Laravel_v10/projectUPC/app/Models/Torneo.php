<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'fecha', 'hora' ,'user_id'];


    //indicamos que Torneo pertenece a User
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
