<?php

namespace Model\Exceptions;

use Exception;

/**
 * Exception levée lorsque le mot de passe ne contient pas de caractères spéciaux
 */
class PwdUppercaseLetterException extends Exception
{
    public function __construct($message= "Password must contain one special character", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
