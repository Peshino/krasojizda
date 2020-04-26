<?php

namespace App\Repositories;

use App\ImportantDay;
use App\Krasojizda;
use Illuminate\Support\Carbon;

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

        $now = Carbon::now();

        return ImportantDay::whereIn('user_id', $users)->whereYear('date', $now->year)->whereDate('date', '>=', $now)->orderBy('date', 'asc')->get();
    }
}
