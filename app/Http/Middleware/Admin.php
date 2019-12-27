<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\RedirectResponse;

class Admin
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
		$user = $request->user();

		// if ($user && $user->admin === 1) {
    //     return $next($request);
    // }
		//
		// return redirect()->route('map');

		// if ($request->user()->admin)
		// {
		// 	return $next($request);
		// }
		// return new RedirectResponse(url('posts'));

		if (!$user) {
        return redirect()->route('login');
    }
    if ($user->admin == 1) {
        return $next($request);
    }
    if ($user->admin == 0) {
        return redirect()->route('contribute');
		}

	}

}
