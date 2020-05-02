<?php

namespace App\Repositories;

use App\Post;
use App\Krasojizda;

class Posts
{
    public function all()
    {
        return Post::all();
    }

    /**
     * @param $withUnseenCommentsCount
     */
    public function getKrasojizdaPosts($withUnseenCommentsCount = false)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        if ($withUnseenCommentsCount) {
            return Post::whereIn('user_id', $users)->withCount(['comments as unseen_comments_count' => function ($query) {
                $query->where('user_id', '!=', auth()->user()->id)->whereNull('seen_by_user_id');
            }])->orderBy('id', 'desc')->get();
        } else {
            return Post::whereIn('user_id', $users)->orderBy('id', 'desc')->get();
        }
    }

    public function getKrasojizdaUnseenPostsCount()
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        $unseenPostsCount = Post::whereIn('user_id', $users)->where('user_id', '!=', auth()->user()->id)->whereNull('seen_by_user_id')->count();

        return $unseenPostsCount;
    }

    public function getKrasojizdaUnseenPostsCommentsCount()
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        $unseenPostsComments = Post::whereIn('user_id', $users)->withCount(['comments as unseen_comments_count' => function ($query) {
            $query->where('user_id', '!=', auth()->user()->id)->whereNull('seen_by_user_id');
        }])->get();

        $unseenPostsCommentsCount = 0;

        foreach ($unseenPostsComments as $unseenPostComments) {
            $unseenPostsCommentsCount += $unseenPostComments->unseen_comments_count;
        }

        return $unseenPostsCommentsCount;
    }
}
