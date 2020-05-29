<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Repositories\Posts;
use App\Repositories\Conversations;
use App\Repositories\ImportantDays;
use App\Repositories\LifeEvents;

class CheckUnseenContent
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
        if (auth()->user()->krasojizda_id !== null) {
            $posts = new Posts();
            $unseenPostsCount = $posts->getKrasojizdaUnseenPostsCount();
            $unseenPostsCommentsCount = $posts->getKrasojizdaUnseenPostsCommentsCount();
            $unseenPostsCommentsTotal = (int) $unseenPostsCount + (int) $unseenPostsCommentsCount;

            $conversations = new Conversations();
            $unseenConversationsCount = $conversations->getKrasojizdaUnseenConversationsCount();
            $unseenConversationsCommentsCount = $conversations->getKrasojizdaUnseenConversationsCommentsCount();
            $unseenConversationsCommentsTotal = (int) $unseenConversationsCount + (int) $unseenConversationsCommentsCount;

            $importantDays = new ImportantDays();
            $unseenImportantDaysCount = $importantDays->getKrasojizdaUnseenImportantDaysCount();

            $lifeEvents = new LifeEvents();
            $unseenLifeEventsCount = $lifeEvents->getKrasojizdaUnseenLifeEventsCount();

            View::share(compact(
                'unseenPostsCommentsTotal',
                'unseenConversationsCommentsTotal',
                'unseenImportantDaysCount',
                'unseenLifeEventsCount'
            ));
        }
        
        return $next($request);
    }
}
