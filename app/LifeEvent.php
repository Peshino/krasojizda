<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LifeEvent extends Model
{
    protected $fillable = ['title', 'date', 'user_id', 'seen_by_user_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
