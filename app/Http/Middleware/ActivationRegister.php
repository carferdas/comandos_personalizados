<?php

namespace App\Http\Middleware;

use Closure;
use App\Site;

class ActivationRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Site::first()->allow_registrations) {
            return $next($request);
        }

        return redirect()->to('/')->with('error', 'El registro esta desactivado');
    }
}
