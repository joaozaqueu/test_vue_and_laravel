<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     */
    public function handle()
    {
       return [
            'supportsCredentials' => false,
            'allowedOrigins' => ['*'],
            'allowedHeaders' => ['Content-Type', 'X-Requested-With'],
            'allowedMethods' => ['GET', 'POST', 'PUT',  'DELETE'],
            'exposedHeaders' => [],
            'maxAge' => 0,
        ];
    }
}
