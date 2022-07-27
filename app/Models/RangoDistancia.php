<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RangoDistancia extends Model
{
    use HasFactory;

    protected $table = 'rangos_distancias';
    protected $fillable = [
        'distancia',
        'costo'
    ];
}
