<?php

namespace App\Http\Controllers;

use App\ImportantDay;
use App\Repositories\ImportantDays;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ImportantDayController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.krasojizda', 'check.unseenContent']);
        $this->middleware('can:viewAllAndCreate,App\ImportantDay')->only(['index', 'store', 'create']);
        $this->middleware('can:view,important_day')->only('show');
        $this->middleware('can:manipulate,important_day')->except(['index', 'show', 'store', 'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  $filterByYear
     * @param  \App\Repositories\ImportantDays  $importantDays
     * @return \Illuminate\Http\Response
     */
    public function index($filterByYear = null, ImportantDays $importantDaysRepository)
    {
        $importantDays = $importantDaysRepository->getKrasojizdaImportantDays();
        $importantDayYearSelected = null;
        $importantDayYears = null;

        if ($importantDays !== null) {
            $importantDayYears = $importantDaysRepository->getKrasojizdaImportantDayYears();

            if ($filterByYear !== null) {
                $importantDays = $importantDaysRepository->getKrasojizdaImportantDaysByYear($filterByYear);
            }

            if ($importantDayYears !== null) {
                $importantDayYearSelected = $filterByYear === null ? $importantDayYears[array_key_first($importantDayYears)] : $filterByYear;
            }
        }

        $now = Carbon::now();
        $todayDate = Carbon::now()->toDateString();
        $criticalPeriod = Carbon::now()->addDays(3);
        $shortPeriod = Carbon::now()->addWeek();
        $longPeriod = Carbon::now()->addMonth();

        $attributes = [
            'seen_by_user_id' => auth()->user()->id,
        ];

        foreach ($importantDays as $importantDay) {
            if ($importantDay->seen_by_user_id === null && auth()->user()->id !== $importantDay->user_id) {
                $importantDay->update($attributes);
            }
        }

        return view('important-days.index', compact('importantDays', 'now', 'todayDate', 'criticalPeriod', 'shortPeriod', 'longPeriod', 'importantDayYearSelected', 'importantDayYears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('important-days.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|min:2|max:100',
            'date' => 'required|date|date_format:Y-m-d',
        ]);

        if (auth()->user()->addImportantDay($attributes)) {
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return redirect('important-days');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImportantDay  $importantDay
     * @return \Illuminate\Http\Response
     */
    public function show(ImportantDay $importantDay)
    {
        return view('important-days.show', compact('importantDay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImportantDay  $importantDay
     * @return \Illuminate\Http\Response
     */
    public function edit(ImportantDay $importantDay)
    {
        return view('important-days.edit', compact('importantDay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImportantDay  $importantDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImportantDay $importantDay)
    {
        $attributes = $request->validate([
            'title' => 'required|min:2|max:100',
            'date' => 'required',
        ]);

        if ($importantDay->update($attributes)) {
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return redirect()->route('important-days.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImportantDay  $importantDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImportantDay $importantDay)
    {
        if ($importantDay->delete()) {
            $status = 'success';
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            $status = 'error';
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return response()->json([
            'status' => $status,
        ]);
    }
}
