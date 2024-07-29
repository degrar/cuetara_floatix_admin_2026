<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Code extends Model
    {
        use HasFactory;

        protected $fillable = [
            'source',
            'status',
        ];

        public static function updateStatus(string $code, int $status, int $user_id): bool
        {
            return self::query()
                    ->where('code', $code)
                    ->update([
                        'status' => $status,
                        'user_id' => $user_id,
                    ]) === 1;
        }
    }