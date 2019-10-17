<?php

namespace App\Http\Controllers\Site;

use App\Schedule;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ScheduleController extends Controller
{

    public function showSchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('site.home.modal-schedule',compact('schedule'));
    }

    public function schedules()
    {
        $schedules = Schedule::where('data','>=',Carbon::today())->OrderBy('data')->paginate(10);
        return view('site.schedule.list',compact('schedules'));
    }
}
