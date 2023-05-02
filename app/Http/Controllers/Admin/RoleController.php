<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:role-list');
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){

            $roles = Role::select('*');

            return Datatables::of($roles)
            ->addIndexColumn()
            ->addColumn('action', function($roles){

                if (\Auth::user()->can('role-edit')) {
                    $editBtn = '<a href="' . route('roles.edit', [$roles->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp; ';
                } else {
                    $editBtn = '';
                }

                if (\Auth::user()->can('role-delete')) {
                    $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('roles.destroy', [$roles->id]) . '" rel="tooltip" title="Delete" class="delete_roles_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                } else {
                    $deleteBtn = '';
                }

                return $editBtn.$deleteBtn;
            })
            ->editColumn('created_at', function ($roles) {
                return [
                   'display' => e($roles->created_at->format('m/d/Y')),
                   'timestamp' => $roles->created_at->timestamp
                ];
             })
            ->filter(function ($instance) use ($request) {
                if ($request->get('search') != '') {
                    $search = $request->get('search');
                    $instance->where('name','LIKE', "%$search%");
                }

            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.roles.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $permissions = [];
        foreach ($permission as $permissionData) {
            $permissions[$permissionData->module][] = $permissionData;
        }
        return view('admin.roles.create',compact('permissions'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","admin_permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return view('admin.roles.show',compact('role','rolePermissions'));
    } */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        $permissions = [];
        foreach ($permission as $permissionData) {
            $permissions[$permissionData->module][] = $permissionData;
        }
        return view('admin.roles.edit',compact('role','permissions','rolePermissions'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
        ->with('success','Role deleted successfully');
    }
}
