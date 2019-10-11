<?php

namespace App\Http\Controllers\Site;

use App\Schedule;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{

    public function showSchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('site.home.modal-schedule',compact('schedule'));
    }
}
