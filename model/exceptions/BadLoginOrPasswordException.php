<?php

namespace Model\Exceptions;

use Exception;

/**
 * Exception levée lorsqu'un nom d'utilisateur ou un mot de passe invalide est fourni.
 */
class BadLoginOrPasswordException extends Exception
{
    public function __construct($message = "Nom d'utilisateur ou mot de passe invalide", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}