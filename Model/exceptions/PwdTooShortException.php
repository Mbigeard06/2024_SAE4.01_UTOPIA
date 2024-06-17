<?php

namespace Model\Exceptions;

use Exception;

/**
 * Exception levée lorsque l'utilisateur donne un mot de passe de moins de 12 caractères spéciaux
 */
class PwdTooShortException extends Exception
{
    public function __construct($message= "Password must be at least 12 characters long", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
