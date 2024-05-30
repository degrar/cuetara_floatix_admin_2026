<?php

namespace Duplex\Enums;

/*
 * Definir routes que farem anar.
 */

enum Route: string
{
    case PromoSoon = 'proximamente';
    case PromoEnded = 'promo-finalizada';
    case Contact = 'contacto';
    case Admin = 'dashboard';
}
