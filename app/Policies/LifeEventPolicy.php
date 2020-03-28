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
     * Determine whether the user can view any lifeEvents.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAllAndCreate(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the lifeEvent.
     *
     * @param  \App\User  $user
     * @param  \App\LifeEvent  $lifeEvent
     * @return boolean
     */
    public function view(User $user, LifeEvent $lifeEvent)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return in_array($lifeEvent->user_id, $users);
    }

    /**
     * Determine whether the logged in user can manipulate the model.
     *
     * @param  \App\User  $user
     * @param  \App\LifeEvent  $lifeEvent
     * @return boolean
     */
    public function manipulate(User $user, LifeEvent $lifeEvent)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return in_array($lifeEvent->user_id, $users);
    }
}
