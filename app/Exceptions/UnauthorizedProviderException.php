<?php

namespace App\Exceptions;

use Exception;
class UnauthorizedProviderException extends Exception
{
    public function __construct($message = 'Unauthorized Provider', $code = 401, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}