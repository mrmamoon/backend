<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicants;
use DataTables;
use Illuminate\Support\Facades\Storage;

class ApplicantsController extends Controller
{
     public function datatable()
    {
        $applicants = applicants::get();

        return DataTables::collection($applicants)->toJson();
    }

    public function index()
    {
        $data = [
            'applicants' =>  applicants::get(),
        ];
        return view('cms.applicants.index', $data);
    }
}
