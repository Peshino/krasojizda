<?php

namespace App\Repositories;

use App\LifeEvent;
use App\Krasojizda;

class LifeEvents
{
    public function all()
    {
        return LifeEvent::all();
    }

    public function getKrasojizdaLifeEvents()
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return LifeEvent::whereIn('user_id', $users)->orderBy('date', 'desc')->get();
    }

    public function getKrasojizdaUnseenLifeEventsCount()
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        $unseenLifeEventsCount = LifeEvent::whereIn('user_id', $users)->where('user_id', '!=', auth()->user()->id)->whereNull('seen_by_user_id')->count();

        return $unseenLifeEventsCount;
    }
}
