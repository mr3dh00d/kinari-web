<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Administrador extends User
{
    use HasFactory;

    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('administador', function (Builder $builder) {
            $builder->where('is_admin', true);
        });
        static::creating(function ($administrador) {
            $administrador->is_admin = true;
            $administrador->phone_number = "+11111111111";
        });
    }
}
