<?php

namespace Duplex\Enums;

enum GameState: int
{
    /**
     * Serveix per marcar participacions que estan pendents de validar.
     * Els possibles seguents estats son:
     *
     * Pending -> Participació que ha aconseguit el moment guanyador però està pendent de validar la imatge del pack.
     * Valid -> En cas de que hagin guanyat i s'hagi validat la imatge del pack.
     * Winner -> En cas de que hagin guanyat Confirmat.
     * Loser -> En cas de que hagin perdut
     * Awaiting -> En cas de que hagin guanyat però no s'hagi validat la imatge del DNI
     * Requested -> En cas de que hagin guanyat però s'hagi tornat a demanar la imatge del DNI
     * Denied -> Participació denegada
     * Comment -> Participació amb el comentari aprovat
     *
     */
    case Pending = 1;

    /**
     * Serveix per marcar participacions que ja han estat validades Imatge Pack.
     * Està pendent de pujar la imatge DNI i adreça.
     */
    case Valid = 2;

    /**
     * Serveix per marcar participacions que han guanyat i confirmat.
     */
    case Winner = 3;

    /**
     * Serveix per marcar participacions que han perdut.
     */
    case Loser = 4;

    /**
     * Serveix per marcar participacions que estan pendents de validar Ticket/DNI/PDF.
     */
    case Awaiting = 5;

    /**
     * Serveix per marcar participacions que estan pendents de validar Ticket/DNI/PDF ja que li ha tornat a demanar a través de l'admin.
     */
    case Requested = 6;

    /**
     * Participació denegada
     */
    case Denied = 7;

    /**
     * Participació amb el comentari aprovat
     */
    case CommentApproved = 8;
}