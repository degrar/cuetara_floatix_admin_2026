<?php

namespace App\Models;

use Duplex\Enums\StockType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'type',
        'name',
        'total',
        'claimed',
    ];

    protected $casts = [
        'type' => StockType::class,
    ];

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }
}

