<?php

namespace App\Models;

use Duplex\Enums\FileType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    protected $fillable = [
        'type', // 'game', 'prize'
        'name',
        'number',
        'stair',
        'floor',
        'door',
        'postal_code',
        'city',
        'phone',
        'via_id',
        'province_id',
        'user_id',
        'game_id',
    ];

    public function province(): HasOne
    {
        return $this->hasOne(Province::class, 'id', 'province_id');
    }

    public function via(): HasOne
    {
        return $this->hasOne(Via::class, 'id', 'via_id');
    }
}


