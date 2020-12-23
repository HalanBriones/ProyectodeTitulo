<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginMiddleware
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
        session_start(['name' => 'Login']);

        try {
            if ($_SESSION['rut']) {
                return $next($request);
            }
        } catch (\Throwable $th) {
            session_destroy();
            return redirect('/login');
        }
    }
}
