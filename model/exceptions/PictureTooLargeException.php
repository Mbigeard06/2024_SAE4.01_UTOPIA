<?php

namespace Model\Exceptions;

use Exception;


/**
 * Exception levée lorsque la taille de l'image est trop grande.
 */
class PictureTooLargeException extends Exception
{
    public function __construct($message = "The image you uploaded exceeds the 5MB limit.", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}