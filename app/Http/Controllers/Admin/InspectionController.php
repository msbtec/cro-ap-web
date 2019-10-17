<?php

namespace App\Http\Controllers\Admin;

use App\Inspection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class InspectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('total_inspection_all',Inspection::whereTrash(false)->get());
        View::share('total_inspection_read',Inspection::whereStatus(true)->whereTrash(false)->get());
        View::share('total_inspection_noread',Inspection::whereStatus(false)->whereTrash(false)->get());
        View::share('total_inspection_trash',Inspection::whereTrash(true)->get());
    }

    public function listAll()
    {
        $inspections = Inspection::orderBy('created_at','DESC')->whereTrash(false)->get();
        return view('admin.inspection.list-all',compact('inspections'));
    }

    public function listRead()
    {
        $inspections = Inspection::orderBy('created_at','DESC')->whereTrash(false)->whereStatus(true)->get();
        return view('admin.inspection.list-read',compact('inspections'));
    }

    public function listNoRead()
    {
        $inspections = Inspection::orderBy('created_at','DESC')->whereTrash(false)->whereStatus(false)->get();
        return view('admin.inspection.list-noread',compact('inspections'));
    }

    public function listTrash()
    {
        $inspections = Inspection::orderBy('created_at','DESC')->whereTrash(true)->get();
        return view('admin.inspection.list-trash',compact('inspections'));
    }

    public function show($id)
    {
        $inspection = Inspection::findOrFail($id);
        Inspection::whereId($id)->update(['status' => true]);
        return view('admin.inspection.show',compact('inspection'));
    }

    public function showtrash($id)
    {
        $inspection = Inspection::findOrFail($id);
        Inspection::whereId($id)->update(['status' => true]);
        return view('admin.inspection.show-trash',compact('inspection'));
    }

    public function trash($id)
    {
        Inspection::whereId($id)->update(['trash' => true]);
        return redirect()->route('admin.inspection.all');
    }

    public function notrash($id)
    {
        Inspection::whereId($id)->update(['trash' => false]);
        return redirect()->route('admin.inspection.all');
    }

    public function destroy(Inspection $inspection)
    {
        $inspection->delete();
        return redirect()->route('admin.inspection.trash');
    }


}
