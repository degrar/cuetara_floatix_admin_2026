<?php

namespace Duplex\Enums;

enum GameResult: int
{
    case Winner = 1;
    case Won = 2;
    case Lost = 3;
    case MaxDay = 4;
}
