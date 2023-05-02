<?php

namespace App\Http\Controllers\Admin;
use App\Models\Partner,
    App\Models\PartnerTranslate,
    App\User;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use DataTables;

class PartnerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:partner-list');
        $this->middleware('permission:partner-create', ['only' => ['create','store']]);
        $this->middleware('permission:partner-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:partner-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $partners = Partner::with('localeAll');
             return Datatables::of($partners)
                    ->addIndexColumn()
                    ->addColumn('logo', function($partners){
                        $url= asset('storage/uploads/partner_logo/'.$partners->logo);
                        foreach($partners->localeAll as $partner_data) {
                            if($partner_data->locale == "en") {
                                $partner_name = $partner_data->name;
                            }
                        }
                        return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" title="'.$partner_name.'"/>';
                    })
                    ->addColumn('action', function($partners){
                        if (\Auth::user()->can('partner-edit')) { 
                            $editBtn = '<a href="' . route('manage-partner.edit', [$partners->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        }
                        else {
                            $editBtn = '';
                        }
                        if (\Auth::user()->can('partner-delete')){
                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-partner.destroy', [$partners->id]) . '" rel="tooltip" title="Delete" class="delete_partner_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';

                        } else {
                            $deleteBtn = '';
                        }
                        return $editBtn.$deleteBtn;
                     })
                     ->editColumn('status', function($partners){
                         if($partners->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                     ->editColumn('created_at', function ($partners) {
                        return [
                           'display' => e($partners->created_at->format('m/d/Y')),
                           'timestamp' => $partners->created_at->timestamp
                        ];
                     })
                     ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == '0' || $request->get('status') == '1') {
                            $instance->where('status', $request->get('status'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->whereHas('localeAll', function($w) use($request){
                                $search = $request->get('search');
                                $w->where('name', 'LIKE', "%$search%");
                            });
                        }

                    })
                     ->rawColumns(['action','status','logo'])
                     ->make(true);
         }
         return view('admin.partner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.partner.create');
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
        $validatedData = $request->validate([
            'name_in_english'   => 'required',
            'name_in_arebic'    => 'required',
            'name_in_french'    => 'required',
            'logo'             => 'required|image|dimensions:max_width=500,max_height=500',
        ],
        [
            'logo.dimensions'  => 'Plese select the image of max width and height of 500 pixels.'
        ]
        );


        $partner_data = [
            [  'partner_name' => $request->name_in_english,
                'locale'      => "en"
            ],
            [  'partner_name' => $request->name_in_arebic,
                'locale'      => "ar"
            ],
            [  'partner_name' => $request->name_in_french,
                'locale'      => "fr"
            ],
        ];

        $partner = new Partner();
        if ($request->hasFile('logo')) {
            $logoImage = $request->file('logo');
            $logoImageSaveAsName = time() . "_logo." . $logoImage->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/partner_logo/');
            $logo_image_url = $logoImageSaveAsName;
            if($request->logo){
                if(file_exists($upload_path.$request->logo)) {
                    unlink($upload_path.$request->logo);
                }
            }
            $success = $logoImage->move($upload_path, $logoImageSaveAsName);
            $partner->logo = $logoImageSaveAsName;
        }

        $partner->status = isset($request->status)?1:0;
        $partner->created_by = Auth::user()->id;
        $partner->updated_by = Auth::user()->id;
        $result = $partner->save();

         foreach($partner_data as $key => $value) {
            $partner_tanslation = new PartnerTranslate();
            $partner_tanslation->name = $value['partner_name'];
            $partner_tanslation->partner_id = $partner->id;
            $partner_tanslation->locale = $value['locale'];
            $partner_tanslation->save();
        }
        if($result) {
            return redirect('admin/manage-partner')->with('success', 'Partner added succsessfully.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        // Setting the translated fields to edit
        foreach ($partner->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $partner->name_in_english = $translate->name ;
                    break;
                case 'fr':
                    $partner->name_in_french = $translate->name ;
                    break;
                case 'ar':
                    $partner->name_in_arebic = $translate->name ;
                    break;
            }
        }
        return view('admin.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_in_english'   => 'required',
            'name_in_arebic'    => 'required',
            'name_in_french'    => 'required',
        ]);
        if($request->hasFile('logo')){
            $validatedData = $request->validate(
                [
                    'logo'             => 'image|dimensions:max_width=500,max_height=500',
                ],
                [
                    'logo.dimensions'  => 'Please select the image of max width and height of 500 pixels.'
                ]
            );
        }

        $partner = Partner::findOrFail($id);
        if ($request->hasFile('logo')) {
            $logoImage = $request->file('logo');
            $logoImageSaveAsName = time() . "_logo." . $logoImage->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/partner_logo/');
            $logo_image_url = $logoImageSaveAsName;
            if($request->logo){
                if(file_exists($upload_path.$partner->logo)) {
                    unlink($upload_path.$partner->logo);
                }
            }
            $success = $logoImage->move($upload_path, $logoImageSaveAsName);
            $partner->logo = $logoImageSaveAsName;
        }
        $partner->status = isset($request->status)?1:0;
        $partner->created_by = Auth::user()->id;
        $partner->updated_by = Auth::user()->id;
        $result = $partner->Update();

        $trans_partners = [
            'en' => [
                "name"  => $request->name_in_english,
            ],
            'fr' => [
                "name"  => $request->name_in_french,
            ],
            'ar' => [
                "name"  => $request->name_in_arebic,
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            PartnerTranslate::where(
                [
                    [
                        'partner_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_partners[$localeCode]);
        }
        if($result) {
            return redirect('admin/manage-partner')->with('success', 'Partner updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request,$id)
    {
        
        $partner= Partner::with('localeAll')->find($id);
        if(file_exists('storage/uploads/partner_logo/'.$partner->logo)) {
            unlink('storage/uploads/partner_logo/'.$partner->logo);
        }
        $partner->localeAll()->delete();
        $partner->delete();
        $request->session()->flash('success', 'Partner deleted successfully.');
        return redirect()->route('manage-partner.index');
    }

}
