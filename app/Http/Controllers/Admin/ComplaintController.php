<?php

namespace App\Http\Controllers\Admin;

use App\Complaint;
use App\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;

class ComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('total_complaint_all',Complaint::whereTrash(false)->get());
        View::share('total_complaint_read',Complaint::whereStatus(true)->whereTrash(false)->get());
        View::share('total_complaint_noread',Complaint::whereStatus(false)->whereTrash(false)->get());
        View::share('total_complaint_trash',Complaint::whereTrash(true)->get());
    }

    public function listAll()
    {
        $complaints = Complaint::orderBy('created_at','DESC')->whereTrash(false)->get();
        return view('admin.complaint.list-all',compact('complaints'));
    }

    public function listRead()
    {
        $complaints = Complaint::orderBy('created_at','DESC')->whereTrash(false)->whereStatus(true)->get();
        return view('admin.complaint.list-read',compact('complaints'));
    }

    public function listNoRead()
    {
        $complaints = Complaint::orderBy('created_at','DESC')->whereTrash(false)->whereStatus(false)->get();
        return view('admin.complaint.list-noread',compact('complaints'));
    }

    public function listTrash()
    {
        $complaints = Complaint::orderBy('created_at','DESC')->whereTrash(true)->get();
        return view('admin.complaint.list-trash',compact('complaints'));
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        Complaint::whereId($id)->update(['status' => true]);
        return view('admin.complaint.show',compact('complaint'));
    }

    public function showtrash($id)
    {
        $complaint = Complaint::findOrFail($id);
        Complaint::whereId($id)->update(['status' => true]);
        return view('admin.complaint.show-trash',compact('complaint'));
    }

    public function trash($id)
    {
        Complaint::whereId($id)->update(['trash' => true]);
        return redirect()->route('admin.complaint.all');
    }

    public function notrash($id)
    {
        Complaint::whereId($id)->update(['trash' => false]);
        return redirect()->route('admin.complaint.all');
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect()->route('admin.complaint.trash');
    }


}
