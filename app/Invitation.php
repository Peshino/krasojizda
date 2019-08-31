<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = ['inviter_id', 'receiver_id', 'result', 'confirmator_id'];

    // protected $fillable = ['inviter_id', 'receiver_id'];

    // protected $guarded = ['result'];
}
