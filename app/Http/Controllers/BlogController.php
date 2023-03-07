<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use DataTables;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function datatable()
    {
        $blog = Blog::get();

        return DataTables::collection($blog)->toJson();
    }

    public function index()
    {
        $data = [
            'blogs' =>  Blog::get(),
        ];
        return view('cms.blogs.index', $data);
    }

    public function create()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.blogs.add', $data);
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'name' => 'required',
        ]);
        
        $blog         =   new Blog;

        if($request->has('image')){
            $imageName = Storage::disk('cms')->putFile('', $request->image);
            $blog->image  =   $imageName;
        }

        $blog->name                 =   $request->name;
        $blog->by                   =   $request->by;
        $blog->slug                 =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $blog->date                 =   $request->date;
        $blog->short_description    =   $request->short_description;
        $blog->description          =   $request->description;
        $blog->keywords             =   $request->keywords;
        $blog->meta_title           =   $request->meta_title;
        $blog->meta_description     =   $request->meta_description;
        $blog->save();

        return redirect()->route('blogs');
    }

    public function edit(Blog $blog)
    {
        $data = [
            'isEdit'                => true,
            'blog'    => $blog,
        ];

        // return $data['blogs'];

        return view('cms.blogs.add', $data);
    }

    public function update(Request $request, Blog $blog)
    {
        // return $request;

        if($request->has('image')){
            Storage::disk('cms')->delete('', $blog->image);
            $imageName = Storage::disk('cms')->putFile('', $request->image);
            $blog->image  =   $imageName;
        }

        $blog->name                 =   $request->name;
        $blog->by                   =   $request->by;
        $blog->slug                 =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $blog->date                 =   $request->date;
        $blog->short_description    =   $request->short_description;
        $blog->description          =   $request->description;
        $blog->keywords             =   $request->keywords;
        $blog->meta_title           =   $request->meta_title;
        $blog->meta_description     =   $request->meta_description;
        $blog->save();

        return redirect()->route('blogs');
    }

    public function status(Request $request)
    {

        $status = $request->status;
        $id = $request->id;

        $item = Blog::find($id);

        if ($item->update(['status' => $status])) {
            $response['status'] = true;
            $response['message'] = 'Status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    public function destroy(Request $request)
    {
        $blog = Blog::where('id', $request->deleteId)->first();
        Storage::disk('cms')->delete('', $blog->image);
        $blog->delete();

        return response()->json($blog, 200);
    }
}
