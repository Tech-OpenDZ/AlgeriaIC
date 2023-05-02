<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AdminPermission;
use App\Http\Controllers\Controller;
use DataTables;

class AdminPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:module-list');
        $this->middleware('permission:module-create', ['only' => ['create','store']]);
        $this->middleware('permission:module-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:module-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){

            $adminPermissions = AdminPermission::select('*');

            return Datatables::of($adminPermissions)
            ->addIndexColumn()
            ->addColumn('action', function($adminPermissions){

                if (\Auth::user()->can('module-edit')) {
                    $editBtn = '<a href="' . route('manage-admin-permission.edit', [$adminPermissions->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp; ';
                } else {
                    $editBtn = '';
                }

                if (\Auth::user()->can('module-delete')) {
                    $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-admin-permission.destroy', [$adminPermissions->id]) . '" rel="tooltip" title="Delete" class="delete_admin_permission_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                } else {
                    $deleteBtn = '';
                }

                return $editBtn.$deleteBtn;
            })
            ->editColumn('created_at', function ($adminPermissions) {
                return [
                   'display' => e($adminPermissions->created_at->format('m/d/Y')),
                   'timestamp' => $adminPermissions->created_at->timestamp
                ];
             })
            ->filter(function ($instance) use ($request) {
                if ($request->get('search') != '') {
                    $search = $request->get('search');
                    $instance->where('name','LIKE', "%$search%")
                    ->orWhere('module', 'LIKE', "%$search%");
                }
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.permission.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
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
            'name'      => 'required',
            'module'    => 'required',
        ]);
        // dd($request->input());
        $adminPermission = new AdminPermission;
        $adminPermission->name = $request->input('name');
        $adminPermission->module = $request->input('module');
        $adminPermission->guard_name = 'web';
        $adminPermission->save();

        if($adminPermission){
            return redirect()->route('manage-admin-permission.index')
            ->with('success','Admin permission created successfully');
        }
        else {
            return redirect()->route('manage-admin-permission.index')
            ->with('error','error to create Admin permission');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminPermission = AdminPermission::find($id);
        return view('admin.permission.edit',compact('adminPermission'));
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
            'name'          => 'required',
            'module'        => 'required',
        ]);

        $adminPermission = AdminPermission::find($id);
        $adminPermission->name = $request->input('name');
        $adminPermission->module = $request->input('module');
        $adminPermission->save();

        if($adminPermission){
            return redirect()->route('manage-admin-permission.index')
            ->with('success','Admin permission updated successfully');
        }
        else {
            return redirect()->route('manage-admin-permission.index')
            ->with('error','error to update Admin permission');
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
        AdminPermission::find($id)->delete();
        return redirect()->route('manage-admin-permission.index')
        ->with('success','Admin permission deleted successfully');
    }
}
