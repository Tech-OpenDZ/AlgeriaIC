<?php

namespace App\Http\Controllers\Admin;

use Auth;
use DataTables;
use LaravelLocalization;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\PermissionTranslate;
use App\Http\Controllers\Controller;

class FrontendPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:frontend-permission-list');
        $this->middleware('permission:frontend-permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:frontend-permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:frontend-permission-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){

            $frontendPermissions = Permission::with('localeAll');

            return Datatables::of($frontendPermissions)
            ->addIndexColumn()
            ->addColumn('module', function($permissions){
                foreach($permissions->localeAll as $permission_data) {
                    if($permission_data->locale == "en") {
                        $module = $permission_data->module;
                    }
                }
                return $module;
            })
            ->addColumn('value', function($permissions){
                foreach($permissions->localeAll as $permission_data) {
                    if($permission_data->locale == "en") {
                        $value = $permission_data->value;
                    }
                }
                return $value;
            })
            ->addColumn('action', function($frontendPermissions){

                if (\Auth::user()->can('frontend-permission-edit')) {
                    $editBtn = '<a href="' . route('manage-frontend-permission.edit', [$frontendPermissions->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp; ';
                } else {
                    $editBtn = '';
                }

                if (\Auth::user()->can('frontend-permission-delete')) {
                    $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-frontend-permission.destroy', [$frontendPermissions->id]) . '" rel="tooltip" title="Delete" class="delete_frontend_permission_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                } else {
                    $deleteBtn = '';
                }

                return $editBtn.$deleteBtn;
            })
            ->editColumn('created_at', function ($permissions) {
                return [
                   'display' => e($permissions->created_at->format('m/d/Y')),
                   'timestamp' => $permissions->created_at->timestamp
                ];
             })
            ->filter(function ($instance) use ($request) {
                if ($request->get('search') != '') {
                    $instance->whereHas('localeAll', function($w) use($request){
                        $search = $request->get('search');
                        $w->where('module', 'LIKE', "%$search%")
                        ->orWhere('value', 'LIKE', "%$search%");
                    });
                }
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.frontend_permission.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create()
    {
        return view('admin.frontend_permission.create');
    } */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
        ]);

        $frontendPermission             = new Permission;

        $userId                         = Auth::user()->id;
        $frontendPermission->name       = $request->input('name');
        $frontendPermission->created_by = $userId;
        $frontendPermission->updated_by = $userId;
        $frontendPermission->save();

        if($frontendPermission){
            return redirect()->route('manage-frontend-permission.index')
            ->with('success','Frontend permission created successfully');
        }
        else {
            return redirect()->route('manage-frontend-permission.index')
            ->with('error','error to create Frontend permission');
        }
    } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $frontendPermission = Permission::with([
            'localeAll'
        ])
        ->findOrFail($id);
        return view('admin.frontend_permission.edit',compact('frontendPermission'));
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
            "module_name_in_english"        => 'required',
            "module_name_in_arabic"         => 'required',
            "module_name_in_french"         => 'required',
            "permission_name_in_english"    => 'required',
            "permission_name_in_arabic"     => 'required',
            "permission_name_in_french"     => 'required'
        ]);

        $frontendPermission             = Permission::findOrFail($id);

        $userId                         = Auth::user()->id;
        $frontendPermission->updated_by = $userId;
        $frontendPermission->save();

        $translated_permission = [
            'en' => [
                'module'        => $request->module_name_in_english,
                'value'         => $request->permission_name_in_english
            ],
            'ar' => [
                'module'        => $request->module_name_in_arabic,
                'value'         => $request->permission_name_in_arabic
            ],
            "fr" => [
                'module'        => $request->module_name_in_french,
                'value'         => $request->permission_name_in_french
            ]
        ];

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            PermissionTranslate::where(
            [
                [
                    'permission_id', '=', $id
                ],
                [
                    'locale', '=', $localeCode
                ]
            ])
            ->update($translated_permission[$localeCode]);
        }

        if($frontendPermission){
            return redirect()->route('manage-frontend-permission.index')
            ->with('success','Frontend permission updated successfully');
        }
        else {
            return redirect()->route('manage-frontend-permission.index')
            ->with('error','error to update Frontend permission');
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
        Permission::find($id)->delete();
        return redirect()->route('manage-frontend-permission.index')
        ->with('success','Frontend permission deleted successfully');
    }
}
