<?php

namespace App;

use App\User;
use App\Invitation;
use Illuminate\Database\Eloquent\Model;

class Krasojizda extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Returns user ids array based on logged in user's krasojizda_id.
     *
     * @return array
     */
    public function getUserIdsArray()
    {
        $userObjects = null;
        $userIdsArray = [];

        if (($krasojizda = Krasojizda::find(auth()->user()->krasojizda_id)) !== null) {
            $userObjects = $krasojizda->users;
        }

        if ($userObjects !== null) {
            foreach ($userObjects as $userObject) {
                $userIdsArray[] = $userObject->id;
            }
        }

        return $userIdsArray;
    }

    /**
     * Creates new Krasojizda based on accepted invitation
     *
     * @return bool
     */
    public function create(Invitation $invitation)
    {
        $inviter = User::find($invitation->inviter_id);
        $receiver = User::find($invitation->receiver_id);

        if ($inviter !== null && $receiver !== null) {
            $this->name = 'Krasojízda ' . $inviter->firstname . ' & ' . $receiver->firstname;

            if ($this->save()) {
                $inviter->krasojizda_id = $receiver->krasojizda_id = $this->id;

                if ($inviter->save() && $receiver->save()) {
                    return true;
                }
            }
        }

        return false;
    }
}
