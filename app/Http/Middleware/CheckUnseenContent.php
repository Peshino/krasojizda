<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Repositories\Posts;
use App\Repositories\Conversations;

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

            $conversations = new Conversations();
            $unseenConversationsCount = $conversations->getKrasojizdaUnseenConversationsCount();
            $unseenConversationsCommentsCount = $conversations->getKrasojizdaUnseenConversationsCommentsCount();
            $unseenConversationsCommentsTotal = (int) $unseenConversationsCount + (int) $unseenConversationsCommentsCount;

            View::share(compact('unseenPostsCommentsTotal', 'unseenConversationsCommentsTotal'));
        }
        return $next($request);
    }
}
