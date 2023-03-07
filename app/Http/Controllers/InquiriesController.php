<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiries;
use DataTables;

class InquiriesController extends Controller
{
    public function datatable()
    {
        $inquiries = Inquiries::orderByDesc('id')->get();

        return DataTables::collection($inquiries)->toJson();

    }
    public function index()
    {
        return view('cms.inquiries.index');
    }

    public function destroy(Request $request)
    {
        $inquiry = Inquiries::where('id', $request->deleteId)->first();
        $inquiry->delete();
        // return $request;
        return response()->json($inquiry, 200);
    }
}
