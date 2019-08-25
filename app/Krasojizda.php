<?php

namespace App;

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
}
