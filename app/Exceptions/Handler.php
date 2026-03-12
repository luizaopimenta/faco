<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        // Minimal handler for scaffold — no custom reporting
    }

    public function render($request, Throwable $e)
    {
        return parent::render($request, $e);
    }
}
