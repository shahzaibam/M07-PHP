<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'duracion', 'fecha', 'idioma', 'precio', 'valoracion'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }
}
