<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permissions;
use Spatie\Permission\Models\Role;
use DataTables;
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('cms.role_management.index');
    }
    public function datatable()
    {

        $roles = Role::select(['id', 'name'])->where('name','!=','super-admin')->get();

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
            'menus' => Permissions::with('children')->get(),
        ];

        return view('cms.role_management.add-role', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role['name'] = $request->name;
        $role = Role::create($role);
        $role->syncPermissions($request->permission);

        return redirect()->route('role');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $data = [
            'isEdit' => true,
            'role' => $role,
            'menus' => Permissions::with('children')->get(),
            'rolesPermissions' => $role->getPermissionNames()->toArray(),
        ];
        return view('cms.role_management.add-role', $data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // return $request;

        $role->name = $request->name;
        $role->syncPermissions($request->permission);
        $role->save();

        return redirect()->route('role');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $role = Role::where('id', $request->deleteId)->first();
        if ($role->name != 'super-admin') {
            $role->syncPermissions([]);
            $role->delete();
        }
    }

    public function supadm()
    {
        $role3 = Role::where(['name' => 'super-admin'])->first();
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $role3->givePermissionTo(Permission::all());
    }
}
