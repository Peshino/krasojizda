<?php

namespace App\Repositories;

use App\lifeEvent;
use App\Krasojizda;

class lifeEvents
{
    public function all()
    {
        return lifeEvent::all();
    }

    public function getKrasojizdalifeEvents()
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return lifeEvent::whereIn('user_id', $users)->get();
    }
}
