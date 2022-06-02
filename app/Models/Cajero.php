<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Cajero extends User
{
    use HasFactory;

    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('cajero', function (Builder $builder) {
            $builder->where('is_cajero', true);
        });
        static::creating(function ($cajero) {
            $cajero->is_cajero = true;
            $cajero->phone_number = "+11111111111";
        });
    }
}
