<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Cliente extends User
{
    use HasFactory;

    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('cliente', function (Builder $builder) {
            $builder->where('is_admin', false)->where('is_cajero', false);
        });
    }

}
