<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Mmgg extends Model
    {
        use HasFactory;

        protected $fillable = [
            'user_id',
            'game_id',
            'assigned',
            'date_assigned'
        ];

        public static function getTotalForUser(int $userId): int
        {
            return static::query()->where('user_id', $userId)->count();
        }

        public function assign(int $userId, int $gameId): void
        {
            $this->user_id = $userId;
            $this->game_id = $gameId;
            $this->assigned = '1';
            $this->date_assigned = now();
            $this->save();
        }

        public function games(): Collection
        {
            return $this->with(Game::class)->get();
        }

        public static function firstAvailable(): ?Mmgg
        {
            return self::query()
                ->where('date_moment', '<=', now())
                ->where('assigned', '!=', 1)
                ->whereNull('user_id')
                ->orderBy('date_moment')
                ->first();
        }
    }
