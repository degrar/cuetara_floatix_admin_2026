<?php

namespace Duplex\Enums;

enum GameState: int
{
    case Pending = 1;
    case Valid = 2;
    case Winner = 3;
    case Loser = 4;
}
