<?php

namespace Model\Exceptions;

use Exception;


/**
 * Exception levée lorsque les deux mots de passes saisis lors de l'inscription ne correspondent pas
 */
class PasswordNoMatchException extends Exception
{
    public function __construct($message = "Password do not match", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}