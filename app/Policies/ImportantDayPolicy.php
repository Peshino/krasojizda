<?php

namespace App\Policies;

use App\User;
use App\ImportantDay;
use App\Krasojizda;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImportantDayPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any importantDays.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAllAndCreate(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the importantDay.
     *
     * @param  \App\User  $user
     * @param  \App\ImportantDay  $importantDay
     * @return boolean
     */
    public function view(User $user, ImportantDay $importantDay)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return in_array($importantDay->user_id, $users);
    }

    /**
     * Determine whether the logged in user can manipulate the model.
     *
     * @param  \App\User  $user
     * @param  \App\ImportantDay  $importantDay
     * @return boolean
     */
    public function manipulate(User $user, ImportantDay $importantDay)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return in_array($importantDay->user_id, $users);
    }
}
