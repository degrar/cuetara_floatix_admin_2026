<?php

namespace Duplex\Enums;

enum FileState: int
{
    case Pending = 0;
    case Valid = 1;
    case Denied = 2;
}
