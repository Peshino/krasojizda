<?php

namespace App\Policies;

use App\User;
use App\Conversation;
use App\Krasojizda;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function manipulate(User $user, Conversation $conversation)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return in_array($conversation->user_id, $users) && $conversation->user_id === $user->id;
    }
}
