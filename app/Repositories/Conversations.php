<?php

namespace App\Repositories;

use App\Conversation;
use App\Krasojizda;

class Conversations
{
    public function all()
    {
        return Conversation::all();
    }

    /**
     * @param $withUnseenCommentsCount
     */
    public function getKrasojizdaConversations($withUnseenCommentsCount = false)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        if ($withUnseenCommentsCount) {
            return Conversation::whereIn('user_id', $users)->withCount(['comments as unseen_comments_count' => function ($query) {
                $query->where('user_id', '!=', auth()->user()->id)->whereNull('seen_by_user_id');
            }])->orderBy('id', 'desc')->get();
        } else {
            return Conversation::whereIn('user_id', $users)->orderBy('id', 'desc')->get();
        }
    }

    public function getKrasojizdaUnseenConversationsCount()
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        $unseenConversationsCount = Conversation::whereIn('user_id', $users)->where('user_id', '!=', auth()->user()->id)->whereNull('seen_by_user_id')->count();

        return $unseenConversationsCount;
    }

    public function getKrasojizdaUnseenConversationsCommentsCount()
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        $unseenConversationsComments = Conversation::whereIn('user_id', $users)->withCount(['comments as unseen_comments_count' => function ($query) {
            $query->where('user_id', '!=', auth()->user()->id)->whereNull('seen_by_user_id');
        }])->get();

        $unseenConversationsCommentsCount = 0;

        foreach ($unseenConversationsComments as $unseenConversationComments) {
            $unseenConversationsCommentsCount += $unseenConversationComments->unseen_comments_count;
        }

        return $unseenConversationsCommentsCount;
    }
}
