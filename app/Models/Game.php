<?php

    namespace App\Models;

    use Carbon\Carbon;
    use DB;
    use Duplex\Enums\FileType as GameType;
    use Duplex\Enums\GameState;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\HasOne;
    use Illuminate\Support\Collection;

    class Game extends Model
    {
        protected $fillable = [
            'buydate',
            'prize_id',
            'state',
            'token',
            'user_id',
            'decline_reason',
            'validated_at',
            'confirmed_at',
            'platform_id',
            'raffle',
            'date_email',
        ];



        use HasFactory;

        protected function casts(): array
        {
            return [
                'state' => GameState::class,
            ];
        }

        public static function getTotalPlaysForUser(int $userId): \stdClass
        {
//            $totalToday = DB::table('games')
//                ->selectRaw('COUNT(*) total')
//                ->where('user_id', $userId)
//                ->where('created_at', '>=', now()->format('Y-m-d'));
//
//            return DB::table('games')
//                ->selectSub($totalToday, 'today')
//                ->selectRaw('COUNT(*) total')
//                ->where('user_id', $userId)
//                ->get()->first();

            $totalMonth = DB::table('games')
                ->selectRaw('COUNT(*) total')
                ->where('user_id', $userId)
                ->whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month);

            return DB::table('games')
                ->selectSub($totalMonth, 'month') // Subconsulta que obtiene el total del mes actual
                ->selectRaw('COUNT(*) total') // Para obtener el total general
                ->where('user_id', $userId)
                ->get()
                ->first();
        }

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function files(): HasMany
        {
            return $this->hasMany(File::class);
        }

        public function mmgg(): HasOne
        {
            return $this->hasOne(Mmgg::class);
        }

        public function address(): hasMany
        {
            return $this->hasMany(Address::class);
        }

        public function retailer(): HasOne
        {
            return $this->hasOne(Retailer::class, 'id', 'retailer_id');
        }

        public function product(): HasOne
        {
            return $this->hasOne(Product::class, 'id', 'product_id');
        }

        public function platform(): HasOne
        {
            return $this->hasOne(StreamigsPlatforms::class, 'id', 'platform_id');
        }
        public function platformCode(): HasOne
        {
            return $this->hasOne(CodesPlatforms::class,);
        }
    }
