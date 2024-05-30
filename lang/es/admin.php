<?php

use App\Enums\GameState;

return [
    'game' => [
        'state' => [
            GameState::Loser->name => 'Perdedor',
            GameState::Winner->name => 'Ganador',
            GameState::Pending->name => 'Pendiente',
            GameState::Valid->name => '',
        ]
    ]
];
