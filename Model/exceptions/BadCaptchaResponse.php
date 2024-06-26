<?php

namespace Model\Exceptions;

use Exception;

/**
 * Exception levée lorsque l'utilisateur donne une mauvaise réponse au captcha
 */
class BadCaptchaResponse extends Exception
{
    public function __construct($message= "Captcha incorrecte", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
