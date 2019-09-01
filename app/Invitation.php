<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = ['inviter_id', 'receiver_id', 'result', 'confirmator_id'];

    // protected $fillable = ['inviter_id', 'receiver_id'];

    // protected $guarded = ['result'];

    /**
     * Gets the inviter's last not confirmed invitation result
     *
     * @return bool
     */
    public function getLastNotConfirmedInvitation()
    {
        $record = Invitation::where('inviter_id', auth()->user()->id)->latest('created_at')->first();

        if ($record !== null) {
            if ($record->confirmator_id === null && ($record->result === 'accepted' || $record->result === 'rejected')) {
                return $record;
            }
        }

        return null;
    }
}
