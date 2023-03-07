<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keywords;
use DataTables;

class KeywordsController extends Controller
{
    public function datatable()
    {
        $keywords = keywords::get();

        return DataTables::collection($keywords)->toJson();
    }

    public function index()
    {
        $data = [
            'types' =>  keywords::get(),
        ];
        return view('cms.keywords.index', $data);
    }

    public function create()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.keywords.add', $data);
    }

    public function store(Request $request)
    {
        // return $request;

        $keywords = new keywords;

        $keywords->keyword                 =   $request->keywords;

        $keywords->save();

        return redirect()->route('keywords');
    }
}
