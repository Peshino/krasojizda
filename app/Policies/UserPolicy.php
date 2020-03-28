<?php

namespace App\Policies;

use App\User;
use App\Krasojizda;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the logged in user can manipulate the model (User).
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return boolean
     */
    public function manipulate(User $user, User $model)
    {
        return $model->id === $user->id;
    }

    /**
     * Determine whether the logged in user can view the model (User).
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return boolean
     */
    public function view(User $user, User $model)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return ($user->krasojizda_id === null && $model->id === $user->id) || in_array($model->id, $users);
    }
}
