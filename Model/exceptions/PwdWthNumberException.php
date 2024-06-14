<?php

namespace Model\Exceptions;

use Exception;

/**
 * Exception levée lorsque le mot de passe ne contient pas de chiffres
 */
class PwdWthNumberException extends Exception
{
    public function __construct($message= "Le mot de passe doit contenir au moins un chiffre", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
