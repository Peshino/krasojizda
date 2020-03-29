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

    public function getKrasojizdaConversations()
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return Conversation::whereIn('user_id', $users)->orderBy('id', 'desc')->get();
    }
}
