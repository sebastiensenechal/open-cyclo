<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Contribute as Middleware;
use Auth;
use Closure;

class Contribute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return string
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        // if ($user && $user->admin === 0) {
        //     return $next($request);
        // }
        // return redirect()->route('map');

        if (!$user) {
            return redirect()->route('login');
        }
        if ($user->admin == 1) {
            return redirect()->route('home')->with('info',"Vous êtes connecté comme administrateur.");
        }
        if ($user->admin == 0) {
            return $next($request);
        }
    }
}
