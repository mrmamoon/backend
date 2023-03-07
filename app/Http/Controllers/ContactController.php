<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use DataTables;

class ContactController extends Controller
{
    public function datatable()
    {
        $contact = Contact::orderByDesc('id')->get();

        return DataTables::collection($contact)->toJson();

    }
    public function index()
    {
        return view('cms.contact.index');
    }

    public function destroy(Request $request)
    {
        $contact = Contact::where('id', $request->deleteId)->first();
        $contact->delete();
        // return $request;
        return response()->json($contact, 200);
    }
}
