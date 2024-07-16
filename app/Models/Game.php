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
        use HasFactory;



        protected $fillable = [
            'state',
            'type',
            'token',
            'user_id',
            'decline_reason',
            // 'comment',
            // 'is_favourite
            'validated_at',
            'confirmed_at',
        ];

        protected function casts(): array
        {
            return [
                'state' => GameState::class,
            ];
        }

        public static function getTotalPlaysForUser(int $userId): \stdClass
        {
            $totalToday = DB::table('games')
                ->selectRaw('COUNT(*) total')
                ->where('user_id', $userId)
                ->where('created_at', '>=', now()->format('Y-m-d'));

            return DB::table('games')
                ->selectSub($totalToday, 'today')
                ->selectRaw('COUNT(*) total')
                ->where('user_id', $userId)
                ->get()->first();
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

    }
