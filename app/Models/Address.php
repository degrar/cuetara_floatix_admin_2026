<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Address extends Model
    {
        protected $fillable = [
            'type', // 'game', 'more-info'
            'address',
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
    }
