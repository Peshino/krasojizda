<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Repositories\Posts;

class CheckUnseenContent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  \App\Repositories\Posts  $posts
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->krasojizda_id !== null) {
            $posts = new Posts();
            $unseenPostsCount = $posts->getKrasojizdaUnseenPostsCount();
            $unseenPostsCommentsCount = $posts->getKrasojizdaUnseenPostsCommentsCount();
            $unseenPostsCommentsTotal = (int) $unseenPostsCount + (int) $unseenPostsCommentsCount;

            View::share(compact('unseenPostsCommentsTotal'));
        }
        return $next($request);
    }
}
