<?php

namespace App\Policies;

use App\User;
use App\OurPlace;
use Illuminate\Auth\Access\HandlesAuthorization;

class OurPlacePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any our places.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the our place.
     *
     * @param  \App\User  $user
     * @param  \App\OurPlace  $ourPlace
     * @return mixed
     */
    public function view(User $user, OurPlace $ourPlace)
    {
        //
    }

    /**
     * Determine whether the user can create our places.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the our place.
     *
     * @param  \App\User  $user
     * @param  \App\OurPlace  $ourPlace
     * @return mixed
     */
    public function update(User $user, OurPlace $ourPlace)
    {
        //
    }

    /**
     * Determine whether the user can delete the our place.
     *
     * @param  \App\User  $user
     * @param  \App\OurPlace  $ourPlace
     * @return mixed
     */
    public function delete(User $user, OurPlace $ourPlace)
    {
        //
    }

    /**
     * Determine whether the user can restore the our place.
     *
     * @param  \App\User  $user
     * @param  \App\OurPlace  $ourPlace
     * @return mixed
     */
    public function restore(User $user, OurPlace $ourPlace)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the our place.
     *
     * @param  \App\User  $user
     * @param  \App\OurPlace  $ourPlace
     * @return mixed
     */
    public function forceDelete(User $user, OurPlace $ourPlace)
    {
        //
    }
}
