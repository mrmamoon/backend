<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sell;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class SellController extends Controller
{
    public function datatable()
    {
        $sell = Sell::orderByDesc('id')->get();

        return DataTables::collection($sell)->toJson();

    }
    public function index()
    {
        return view('cms.sell_list.index');
    }

    public function show($id)
    {
        $data = [
            'sell' => Sell::where('id', $id)->first(),
        ];

        return view('cms.sell_list.show', $data);
    }

    public function destroy(Request $request)
    {
        $sell = Sell::where('id', $request->deleteId)->first();
        $sell->delete();
        // return $request;
        return response()->json($sell, 200);
    }
}
