<?php

namespace App\Http\Middleware;

use Closure;

class ApiKeyMiddleware
{
    public function handle($request, Closure $next)
    {
        $acceptedSecrets = explode(',', env('ACCEPTED_SECRETS'));
        $providedKey = $request->header('Authorization');

        if (!in_array($providedKey, $acceptedSecrets)) {
            abort(401, 'Unauthorized');
        }

        return $next($request);
    }
}