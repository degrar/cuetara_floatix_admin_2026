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

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function address(): hasMany
    {
        return $this->hasMany(Address::class, 'id', 'address_id');
    }

//    public function stock(): HasOne
//    {
//        return $this->hasOne(Stock::class, 'id', 'province_id');
//    }


}
