<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactMessagesController extends Controller
{
    public function index()
    {
        $messages = Contact::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.contacts.index', compact('messages'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Message deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        Contact::whereIn('id', $ids)->delete();

        Session::flash('success', 'Contacts deleted successfully!');
        return "success";
    }
}
