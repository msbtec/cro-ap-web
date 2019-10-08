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
    public function listAll()
    {
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(false)->get();
        return view('admin.contact.list-all',compact('contacts'));
    }

    public function listRead()
    {
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(false)->whereStatus(true)->get();
        return view('admin.contact.list-read',compact('contacts'));
    }

    public function listNoRead()
    {
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(false)->whereStatus(false)->get();
        return view('admin.contact.list-noread',compact('contacts'));
    }

    public function listTrash()
    {
        $contacts = Contact::orderBy('created_at','DESC')->whereTrash(true)->get();
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
