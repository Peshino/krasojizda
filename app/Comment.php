<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'seen_by_user_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
