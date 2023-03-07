<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebMenu;
use App\Models\User;
use Hash;
use DataTables;
use Auth;

class SEOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.seo.index');
    }

    public function datatable()
    {
        $seo = WebMenu::where('status',1)->get();

        // $roles = $roles->transform(function ($item) {
        //     $item->role_names = $item->roles->pluck('name')->implode(', ');
        //     return $item;
        // })->all();

        return DataTables::collection($seo)->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $web_menu = WebMenu::where('slug',$slug)->first();

        $data = [
            'isEdit'    => true,
            'web_menu'       => $web_menu,
        ];

        // return $data['seo'];

        return view('cms.seo.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $web_menu = WebMenu::where('slug',$slug)->first();

        $web_menu->meta_title    =   $request->meta_title;
        $web_menu->meta_description    =   $request->meta_description;
        $web_menu->save();

        return redirect()->route('seo');
    }

    public function status(Request $request)
    {
        $status = $request->status;
        $id = $request->id;

        $item = User::find($id);
        if ($item->update(['status' => $status])) {

            $response['status'] = true;
            $response['message'] = 'User status updated successfully.';
            return response()->json($response, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::where('id', $request->deleteId)->first();
        $user->syncRoles([]);
        $user->delete();
        return response()->json($user, 200);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
