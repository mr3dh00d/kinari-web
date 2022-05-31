<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'palabras_claves' => 'array',
    ];

    public function imagen(){
        return $this->hasOne(Imagen::class);
    }

    public function seccion(){
        return $this->belongsTo(Seccion::class);
    }
}
