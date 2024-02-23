<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Show extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'duracion', 'fecha', 'idioma', 'precio', 'valoracion', 'category_id'];


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }


}
