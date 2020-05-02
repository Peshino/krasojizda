<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'seen_by_user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
        $user_id = auth()->user()->id;

        return $this->comments()->create(compact('body', 'user_id')) !== null ? true : false;
    }
}
