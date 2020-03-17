<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'fullname', 'nickname', 'email', 'password', 'color_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function lifeEvents()
    {
        return $this->hasMany(LifeEvent::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function addPost($post)
    {
        return $this->posts()->create($post) !== null ? true : false;
    }

    public function addConversation($conversation)
    {
        return $this->conversations()->create($conversation) !== null ? true : false;
    }

    public function addLifeEvent($lifeEvent)
    {
        return $this->lifeEvents()->create($lifeEvent) !== null ? true : false;
    }
}
