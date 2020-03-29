<?php

namespace App\Repositories;

use App\Post;
use App\Krasojizda;

class Posts
{
    public function all()
    {
        return Post::all();
    }

    public function getKrasojizdaPosts()
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return Post::whereIn('user_id', $users)->orderBy('id', 'desc')->get();
    }
}
