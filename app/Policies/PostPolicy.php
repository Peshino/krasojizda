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
     * Determine whether the logged in user can manipulate the post.
     *
     * @param  \App\Post  $post
     * @return mixed
     */
    public function manipulate(User $user, Post $post)
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return in_array($post->user_id, $users) && $post->user_id === $user->id;
    }
}
