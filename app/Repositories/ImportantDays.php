<?php

namespace App\Repositories;

use App\ImportantDay;
use App\Krasojizda;
use Illuminate\Support\Carbon;

class ImportantDays
{
    private $krasojizda;
    private $users;

    public function __construct()
    {
        $this->krasojizda = new Krasojizda();
        $this->users = $this->krasojizda->getUserIdsArray();
    }

    public function all()
    {
        return ImportantDay::all();
    }

    public function getKrasojizdaImportantDays()
    {
        $now = Carbon::now();

        return ImportantDay::whereIn('user_id', $this->users)->whereDate('date', '>=', $now)->orderBy('date', 'asc')->get();
    }

    public function getKrasojizdaImportantDayYears()
    {
        $importantDays = ImportantDay::whereIn('user_id', $this->users)->orderBy('created_at', 'asc')->get();
        $importantDayYears = null;

        if ($importantDays !== null) {
            $importantDayYears = $importantDays->unique(function ($item) {
                return $item['created_at']->year;
            })->map(function ($item) {
                return $item['created_at']->year;
            })->sort()->toArray();

            if (!empty($importantDayYears)) {
                $importantDayYears = array_reverse($importantDayYears);
            }
        }

        return $importantDayYears;
    }

    public function getKrasojizdaImportantDaysByYear($year = null)
    {
        return ImportantDay::whereIn('user_id', $this->users)->whereYear('date', $year)->orderBy('date', 'asc')->get();
    }

    public function getKrasojizdaUnseenImportantDaysCount()
    {
        $now = Carbon::now();

        $unseenImportantDaysCount = ImportantDay::whereIn('user_id', $this->users)->whereYear('date', $now->year)->whereDate('date', '>=', $now)->where('user_id', '!=', auth()->user()->id)->whereNull('seen_by_user_id')->count();

        return $unseenImportantDaysCount;
    }

    public function getKrasojizdaClosingImportantDays()
    {
        $now = Carbon::now();
        $weekFromNow = Carbon::now()->addWeek();

        $closingImportantDays = ImportantDay::whereIn('user_id', $this->users)->whereDate('date', '>=', $now)->whereDate('date', '<=', $weekFromNow)->orderBy('date', 'asc')->get();

        return $closingImportantDays;
    }
}
