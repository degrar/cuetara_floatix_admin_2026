<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodesPlatforms extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'status',
        'platform_id',
        'game_id',
        'user_id',
    ];

    public static function updateStatus(string $code, int $status, int $user_id, int $game_id): bool
    {
        return self::query()
                ->where('code', $code)
                ->update([
                    'status' => $status,
                    'user_id' => $user_id,
                    'game_id' => $game_id
                ]) === 1;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
