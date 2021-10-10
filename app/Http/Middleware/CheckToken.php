<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request_token = $request->bearerToken();
        if (is_null($request_token)) {
            return response('', 402);
        }

        $user = User::where('token', $request_token)->first();
        if (is_null($user)) {
            return response('', 402);
        }

        return $next($request);
    }
}
