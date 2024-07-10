<?php

    namespace App\Models;

    use Carbon\Carbon;
    use DB;
    use Duplex\Enums\Game as GameType;
    use Duplex\Enums\GameState;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
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

            'date_validated',
            'date_confirmed',
        ];

        protected function casts(): array
        {
            return [
                'type' => GameType::class,
                'state' => GameState::class,
            ];
        }

        public static function getTotalPlaysForUser(int $userId, \Duplex\Enums\Game $type): \stdClass
        {
            $totalToday = DB::table('games')
                ->selectRaw('COUNT(*) total')
                ->where('user_id', $userId)
                ->where('type', $type)
                ->where('created_at', '>=', now()->format('Y-m-d'));

            return DB::table('games')
                ->selectSub($totalToday, 'today')
                ->selectRaw('COUNT(*) total')
                ->where('type', $type)
                ->where('user_id', $userId)
                ->get()->first();
        }

        public function user(): Collection
        {
            return $this->belongsTo(User::class)->get();
        }

        public function files(): Collection
        {
            return $this->hasMany(File::class)->get();
        }
    }
