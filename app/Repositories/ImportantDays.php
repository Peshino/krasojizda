<?php

namespace App\Repositories;

use App\ImportantDay;
use App\Krasojizda;

class ImportantDays
{
    public function all()
    {
        return ImportantDay::all();
    }

    public function getKrasojizdaImportantDays()
    {
        $krasojizda = new Krasojizda();

        $users = $krasojizda->getUserIdsArray();

        return ImportantDay::whereIn('user_id', $users)->orderBy('date', 'desc')->get();
    }
}
