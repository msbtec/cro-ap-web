<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNoticiumRequest;
use App\Http\Requests\StoreNoticiumRequest;
use App\Http\Requests\UpdateNoticiumRequest;
use App\Noticium;
use App\Schedule;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('admin.schedule.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedule.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'data'          => 'required',
            'description'   => 'required',

        ], $message = [
            'title.required'        => 'Campo obrigatório',
            'data.required'         => 'Campo obrigatória',
            'description.required'  => 'Campo obrigatória',
        ]);

        $data = $request->all();
        Schedule::create($data);

        return redirect()->route('admin.schedule.index');
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedule.edit', compact('schedule'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required',
            'data'          => 'required',
            'description'   => 'required',

        ], $message = [
            'title.required'        => 'Campo obrigatório',
            'data.required'         => 'Campo obrigatória',
            'description.required'  => 'Campo obrigatória',
        ]);

        $data = $request->all();
        Schedule::find($id)->update($data);

        return redirect()->route('admin.schedule.index');
    }


    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return back();
    }
}
