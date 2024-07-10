<?php

namespace App\Models;

use Duplex\Enums\FileType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'hash',
        'user_id',
        'game_id',
        'is_valid',
        'type'
    ];

    public function casts(): array
    {
        return [
            'type' => FileType::class
        ];
    }
}
