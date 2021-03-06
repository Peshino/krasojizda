<?php

namespace App\Http\Middleware;

use Closure;
use App\Krasojizda;

class CheckKrasojizda
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
        if (auth()->user()->krasojizda_id === null || Krasojizda::find(auth()->user()->krasojizda_id) === null) {
            return redirect('home');
        }

        return $next($request);
    }
}
