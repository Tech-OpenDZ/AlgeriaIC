<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Auth;
use Hash;
use DataTables;
use Spatie\Permission\Models\Permission;


class AdminController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:admin-list');
        $this->middleware('permission:admin-create', ['only' => ['create','store']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
        $this->middleware('permission:admin-change-password', ['only' => ['changePassword']]);
    }

    /**
     * change the user password
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'existing_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required_with:new_password|same:new_password'
        ]);

        $user = User::find(Auth::user()->id);
        if ( !Hash::check($request->existing_password, $user->password )) {
            return \Redirect::back()->with('error', 'Existing Password does not match');
        }else {
            $user->password = Hash::make( $request->confirm_password);
            $user->update();
            return \Redirect::back()->with('success', 'Password changed successfully');
        }
    }

    public function index(Request $request){

        if ($request->ajax()) {
            $users = User::where('id','!=',1);

            return Datatables::of($users)
                ->filter(function ($instance) use ($request) {

                    if (!empty($request->get('search'))) {

                        $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->where('name', 'LIKE', "%$search%")
                            ->orWhere('email', 'LIKE', "%$search%")
                            ->where('id', '!=', 1);
                        });
                    }

                    if ($request->get('status') == '1' || $request->get('status') == '0') {
                        return $instance->where('status', $request->get('status'));
                    }
                })
                ->editColumn('status', function($users){
                    if($users->status == 1){
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                        return $status;
                    }else{
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                        return $status;
                    }
                })
                ->editColumn('created_at', function ($users) {
                    return [
                       'display' => e($users->created_at->format('m/d/Y')),
                       'timestamp' => $users->created_at->timestamp
                    ];
                })
                ->addColumn('action', function($row){
                    if (\Auth::user()->can('admin-edit')) {
                        $btnEdit = '<a href="' . route('manage-admin.edit', [$row->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp;';
                    } else {
                        $btnEdit = '';
                    }
                    if (\Auth::user()->can('admin-delete')) {
                        $btnDelete = '<a class="delete_admin_btn" rel="tooltip" title="Delete" href="javascript:;" data-href="' . route('manage-admin.destroy', [$row->id]) . '"  title="Delete"  data-id="'.$row->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    } else {
                        $btnDelete = '';
                    }
                    return $btnEdit.$btnDelete;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

        return view('admin.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $permission = Permission::get();
        $permissions = [];
        foreach ($permission as $permissionData) {
            $permissions[$permissionData->module][] = $permissionData;
        }
        return view('admin.admin.edit', compact('permissions'));
    }

    public function edit($id)
    {

        $admin = User::findOrFail($id);
        $permission = Permission::get();
        $permissions = [];
        foreach ($permission as $permissionData) {
            $permissions[$permissionData->module][] = $permissionData;
        }
        $rolePermissions = DB::table("model_has_permissions")->where("model_has_permissions.model_id",$id)
            ->pluck('model_has_permissions.permission_id','model_has_permissions.permission_id')
            ->all();
        return view('admin.admin.edit', compact('permissions','rolePermissions'))->withAdmin($admin);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        // Logic to validate form data
        $rules = [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required',

        ];
        $messages = [];
        $attributes = [
            'name'     => 'Admin Name',
            'email'    => 'Admin Email',
            'password' => 'Admin Password',
        ];

        $request->validate($rules, $messages, $attributes);
        try{
            DB::beginTransaction();

            $admin           = New User;
            $admin->name     = $request->name;
            $admin->email    = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->status   = isset($request->status) ? 1 : 0;

            $result          = $admin->save();
            //$admin->assignRole(['Admin']);
            $admin->givePermissionTo($request->permission);
            if($result) {
                DB::commit();
                $request->session()->flash('success', 'Admin added successfully.');
                return redirect()->route('manage-admin.index');
            }
        } catch(\Throwable $th) {
            DB::rollback();
            return redirect()->route('manage-admin.index')->with('error', 'Something went wrong!'. $th->getMessage());
        }
    }

    /**
     * Update the given Admin.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name'      => 'required',
            'email'     => 'required|email'

        ];
        $messages = [];
        $attributes = [
            'name'      => 'Admin Name',
            'email'     => 'Admin Email'
        ];

        $this->validate($request, $rules, $messages, $attributes);
        try {
            DB::beginTransaction();
            // Logic to update data
            $admin           =  User::find($id);
            $admin->name     = $request->name;
            $admin->email    = $request->email;
            $admin->status   = isset($request->status) ? 1 : 0;
            $result          = $admin->save();
            $admin->permissions()->sync($request->permission);

            if($result) {
                DB::commit();
                $request->session()->flash('success', 'Admin Updated Successfully.');
                return redirect()->route('manage-admin.index');
            }
        } catch(\Throwable $th) {
            DB::rollback();
            return redirect()->route('manage-admin.index')->with('error', 'Something went wrong!'. $th->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1) {
            return redirect()->route('manage-admin.index')
            ->with('error','You can not delete Super-admin.');
        } else {
            User::find($id)->delete();
            return redirect()->route('manage-admin.index')
            ->with('success','User deleted successfully');
        }
    }
}
