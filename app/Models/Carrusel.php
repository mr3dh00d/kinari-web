<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Carrusel extends Imagen
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope('carrusel', function (Builder $builder) {
            $builder->where('is_carrusel', true);
        });
        static::creating(function ($carrusel) {
            $carrusel->is_carrusel = true;
        });
    }
}
