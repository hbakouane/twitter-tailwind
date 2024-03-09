<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;

class AuthorIsNotActiveException extends \Exception
{
    public function report()
    {
        // In this method, we can send emails or reports to an email
        // stating that an error has been occurred, and we can give more details
        // or do whatever we want on this method
        Log::error('This error is coming from an Exception class.', [
            'exception' => $this
        ]);
    }

    public function render()
    {
        throw new \Exception('This author is not active.');
    }
}
