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
     * Determine whether the user can view any conversations.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAllAndCreate(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the conversation.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return boolean
     */
    public function view(User $user, Conversation $conversation)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return in_array($conversation->user_id, $users);
    }

    /**
     * Determine whether the logged in user can manipulate the conversation.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return boolean
     */
    public function manipulate(User $user, Conversation $conversation)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return in_array($conversation->user_id, $users) && $conversation->user_id === $user->id;
    }
}
