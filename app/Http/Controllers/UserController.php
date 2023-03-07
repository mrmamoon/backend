<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Hash;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('cms.user_management.index');
    }
    public function datatable()
    {
        $roles = User::whereHas('roles', function ($query) {
            $query  ;
        })
            ->with('roles')
            ->where('user_type', '!=', 0)->latest()
            ->get();

        $roles = $roles->transform(function ($item) {
            $item->role_names = $item->roles->pluck('name')->implode(', ');
            return $item;
        })->all();

        return DataTables::collection($roles)->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'isEdit' => false,
            'user' => User::where('user_type', '!=', 0)->get(),
            'roles' => Role::where('name', '!=', 'super-admin')->get(),
        ];

        return view('cms.user_management.add-user', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'role_name' => 'required',
            'image' => 'file|dimensions:min_width=255,min_height=255,max_width=255,max_height=255',
        ]);
        if($request->user_image){
            $image = Storage::disk('cms')->putFile('', $request->user_image);
            $user['image']  =   $image;
        }

        $user['name'] = $request->name;
        if ($request->password) {
            $user['password'] = Hash::make($request->password);
        }
        $user['email'] = $request->email;
        $user['phone'] = $request->phone;
        $user['description'] = $request->description;
        $user['user_type'] = 1;
        $user = User::updateOrCreate(['id' => $request->id], $user);
        $user->syncRoles($request->role_name);

        // return redirect()->intended('users');
        return redirect()->route('user');
        // return redirect()->back();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = [
            'isEdit' => true,
            'user' => $user,
            'roles' => Role::where('name', '!=', 'super-admin')->get(),
            'userRole' => $user->getRoleNames()->toArray(),
        ];
        return view('cms.user_management.add-user', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        // dd($request->request);
        $user->name = $request->name;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if($request->user_image){
            $image = Storage::disk('cms')->putFile('', $request->user_image);
            $user->image  =   $image;
            // dd($image);
        }
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->description = $request->description;
        $user->save();
        if($user->user_type != 0){
        $user->syncRoles($request->role_name);
        }
        // return redirect()->intended('users');
        return redirect()->route('user');

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
