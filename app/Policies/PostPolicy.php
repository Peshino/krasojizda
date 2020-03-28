<?php

namespace App\Policies;

use App\User;
use App\Post;
use App\Krasojizda;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAllAndCreate(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return boolean
     */
    public function view(User $user, Post $post)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return in_array($post->user_id, $users);
    }

    /**
     * Determine whether the logged in user can manipulate the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return boolean
     */
    public function manipulate(User $user, Post $post)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return in_array($post->user_id, $users) && $post->user_id === $user->id;
    }
}
