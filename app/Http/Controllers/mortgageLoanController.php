<?php

namespace App\Http\Controllers;

use App\Models\mortgageLoan;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class mortgageLoanController extends Controller
{
    public function index()
    {
        return view('cms.mortgage-loan.index');
    }

    public function datatable()
    {
        $mort = mortgageLoan::orderByDesc('id')->get();

        return DataTables::collection($mort)->toJson();
    }

    public function status(Request $request)
    {

        $status = $request->status;
        $id = $request->id;

        $item = mortgageLoan::find($id);
        // if($item->status == 'pending'){
        //     $item->status = 'approved';
        //     $item->save();
        // }
        // else{
        //     $item->status = 'pending';
        //     $item->save();
        // }
        if ($item->update(['status' => $status])) {
            $response['status'] = true;
            $response['message'] = 'Status Updated Successfully!';

            return response()->json($response, 200);
        }
    }
}
