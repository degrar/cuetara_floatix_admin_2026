<?php

namespace Duplex\Enums;

enum FileType: int
{
    case Ticket = 1;
    case Acceptance = 2;
    case FrontDni = 3;
    Case BackDni = 4;
    Case Barcode = 5;
    Case LetterIBAN = 6;
}
