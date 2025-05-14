<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Claim extends Model
{
    protected $fillable = [
        'user_id',
        'stock_id',
        'address_id',
        'is_sent',
    ];

    public static function totalClaimedStock(int $stockId): int
    {
        return self::query()
            ->where('stock_id', $stockId)
            ->count();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }


}
