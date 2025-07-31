<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class TokenAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');
        if (!$token || ! str_starts_with($token, 'Bearer ')) {
            return response()->json(['message' => 'Token missing'], 401);
        }

        $token = substr($token, 7);
        $hashedToken = hash('sha256', $token);

        $user = User::where('api_token', $hashedToken)->first();
        if (! $user) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        $request->auth = $user;

        return $next($request);
    }
}
