<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancies;
use DataTables;
use Illuminate\Support\Facades\Storage;

class VacanciesController extends Controller
{
    public function datatable()
    {
        $vacancies = Vacancies::get();

        return DataTables::collection($vacancies)->toJson();
    }

    public function index()
    {
        $data = [
            'vacancies' =>  Vacancies::get(),
        ];
        return view('cms.vacancies.index', $data);
    }

    public function create()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.vacancies.add', $data);
    }

    public function store(Request $request)
    {
        // return $request;

        $vacancies = new Vacancies;

        $vacancies->department                 =   $request->department;
        $vacancies->position                   =   $request->position;
        $vacancies->description                 =   $request->description;
        $vacancies->short_description                 =   $request->short_description;
        $vacancies->save();

        return redirect()->route('vacancies');
    }

    public function edit(Vacancies $vacancies)
    {
        $data = [
            'isEdit'                => true,
            'vacancies'    => $vacancies,
        ];

        return view('cms.vacancies.add', $data);
    }

    public function update(Request $request, Vacancies $vacancies)
    {

        $vacancies->department                 =   $request->department;
        $vacancies->position                   =   $request->position;
        $vacancies->description                 =   $request->description;
        $vacancies->short_description                 =   $request->short_description;
        $vacancies->save();

        return redirect()->route('vacancies');
    }

    //  public function status(Request $request)
    // {

    //     $status = $request->status;
    //     $id = $request->id;

    //     $item = Blog::find($id);

    //     if ($item->update(['status' => $status])) {
    //         $response['status'] = true;
    //         $response['message'] = 'Status Updated Successfully!';

    //         return response()->json($response, 200);
    //     }
    // }

    public function destroy(Request $request)
    {
        $vacancies = Vacancies::where('id', $request->deleteId)->first();
        $vacancies->delete();

        return response()->json($vacancies, 200);
    }
}
