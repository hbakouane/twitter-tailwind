<?php

namespace App\Exceptions;

class AuthorIsNotActiveException extends \Exception
{
    public function report()
    {
        return false;
    }

    public function render()
    {
        throw new \Exception('This author is not active.');
    }
}
