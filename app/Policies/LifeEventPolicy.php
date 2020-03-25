<?php

namespace App\Policies;

use App\User;
use App\LifeEvent;
use App\Krasojizda;
use Illuminate\Auth\Access\HandlesAuthorization;

class LifeEventPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @param  \App\User  $user
     * @param  \App\LifeEvent  $lifeEvent
     * @return mixed
     */
    public function manipulate(User $user, LifeEvent $lifeEvent)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return in_array($lifeEvent->user_id, $users);
    }
}
