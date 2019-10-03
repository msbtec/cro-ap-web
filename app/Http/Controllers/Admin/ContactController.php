<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function apiContactAll(){
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(false);

        return Datatables::of($contacts)
            ->editColumn('sender', function ($contacts) {
                $read = $contacts->status == false ? "font-weight: bold" : "";
                return "<a href='/admin/contact/show/".$contacts->id."'><span style='".$read."'>".$contacts->sender."</span></a>";
            })
            ->editColumn('subject', function ($contacts) {
                $read = $contacts->status == false ? "font-weight: bold" : "";
                return "<a href='/admin/contact/show/".$contacts->id."'><span style='".$read."'>".$contacts->subject."</span> ".$contacts->message."</a>";
            })
            ->editColumn('created_at', function ($contacts) {
                $created = with(new Carbon($contacts->created_at))->diffForHumans();
                return "<div class='text-center'><i class=\"fas fa-hourglass-start\"></i> ".$created."</div>";
            })
            ->rawColumns(['sender','created_at','action','subject'])
            ->make(true);
    }

    public function apiContactRead(){
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(false)->whereStatus(true);

        return Datatables::of($contacts)
            ->editColumn('sender', function ($contacts) {
                $read = $contacts->status == false ? "font-weight: bold" : "";
                return "<a href='/admin/contact/show/".$contacts->id."'><span style='".$read."'>".$contacts->sender."</span></a>";
            })
            ->editColumn('subject', function ($contacts) {
                $read = $contacts->status == false ? "font-weight: bold" : "";
                return "<a href='/admin/contact/show/".$contacts->id."'><span style='".$read."'>".$contacts->subject."</span> ".$contacts->message."</a>";
            })
            ->editColumn('created_at', function ($contacts) {
                $created = with(new Carbon($contacts->created_at))->diffForHumans();
                return "<div class='text-center'><i class=\"fas fa-hourglass-start\"></i> ".$created."</div>";
            })
            ->rawColumns(['sender','created_at','action','subject'])
            ->make(true);
    }

    public function apiContactNoRead(){
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(false)->whereStatus(false);

        return Datatables::of($contacts)
            ->editColumn('sender', function ($contacts) {
                $read = $contacts->status == false ? "font-weight: bold" : "";
                return "<a href='/admin/contact/show/".$contacts->id."'><span style='".$read."'>".$contacts->sender."</span></a>";
            })
            ->editColumn('subject', function ($contacts) {
                $read = $contacts->status == false ? "font-weight: bold" : "";
                return "<a href='/admin/contact/show/".$contacts->id."'><span style='".$read."'>".$contacts->subject."</span> ".$contacts->message."</a>";
            })
            ->editColumn('created_at', function ($contacts) {
                $created = with(new Carbon($contacts->created_at))->diffForHumans();
                return "<div class='text-center'><i class=\"fas fa-hourglass-start\"></i> ".$created."</div>";
            })
            ->rawColumns(['sender','created_at','action','subject'])
            ->make(true);
    }

    public function apiContactTrash(){
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(true);

        return Datatables::of($contacts)
            ->editColumn('sender', function ($contacts) {
                $read = $contacts->status == false ? "font-weight: bold" : "";
                return "<a href='show/trash/".$contacts->id."'><span style='".$read."'>".$contacts->sender."</span></a>";
            })
            ->editColumn('subject', function ($contacts) {
                $read = $contacts->status == false ? "font-weight: bold" : "";
                return "<a href='show/trash/".$contacts->id."'><span style='".$read."'>".$contacts->subject."</span> ".$contacts->message."</a>";
            })
            ->editColumn('created_at', function ($contacts) {
                $created = with(new Carbon($contacts->created_at))->diffForHumans();
                return "<div class='text-center'><i class=\"fas fa-hourglass-start\"></i> ".$created."</div>";
            })
            ->rawColumns(['sender','created_at','subject'])
            ->make(true);
    }

    public function listAll()
    {
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(false);
        return view('admin.contact.list-all',compact('contacts'));
    }

    public function listRead()
    {
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(false)->whereStatus(true);
        return view('admin.contact.list-read',compact('contacts'));
    }

    public function listNoRead()
    {
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(false)->whereStatus(false);
        return view('admin.contact.list-noread',compact('contacts'));
    }

    public function listTrash()
    {
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(true);
        return view('admin.contact.list-trash',compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        Contact::whereId($id)->update(['status' => true]);
        return view('admin.contact.show',compact('contact'));
    }

    public function showtrash($id)
    {
        $contact = Contact::findOrFail($id);
        Contact::whereId($id)->update(['status' => true]);
        return view('admin.contact.show-trash',compact('contact'));
    }

    public function trash($id)
    {
        Contact::whereId($id)->update(['trash' => true]);
        return redirect()->route('admin.contact.all');
    }

    public function notrash($id)
    {
        Contact::whereId($id)->update(['trash' => false]);
        return redirect()->route('admin.contact.all');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.all');
    }


}
