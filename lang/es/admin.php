<?php

use App\Enums\GameState;

return [
    'game' => [
        'state' => [
            GameState::Denied->name => 'Rechazado',
            GameState::Winner->name => 'Ganador',
            GameState::Pending->name => 'Pendiente',
            GameState::Valid->name => 'Pack validado',
            GameState::Requested->name => 'Documentación requerida',
        ]
    ]
];
