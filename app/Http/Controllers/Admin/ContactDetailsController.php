<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SettingTranslate;

use Illuminate\Http\Request;
use LaravelLocalization;
use DataTables;
use Auth;
use Illuminate\Support\Str;

class ContactDetailsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:general-setting-list');
        $this->middleware('permission:general-setting-edit', ['only' => ['edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $setting = Setting::with('localeAll')
                                ->where('category','contact_details')
                                ->orWhere('category','general')
                                ->orderBy('id','asc');

            return Datatables::of($setting)

                ->filter(function ($instance) use ($request) {

                    if (!empty($request->get('search'))) {

                         return $instance
                            ->where('category','contact_details')
                            ->where('title', 'LIKE', '%' . $request->get('search') . '%')
                            ->orWhere('value', 'LIKE', '%' . $request->get('search') . '%')
                            ->orWhereHas('localeAll', function($w) use($request){
                                $search = $request->get('search');
                                $w->where('value', 'LIKE', "%$search%");
                            });
                    }

                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                            $instance->where('status', $request->get('status'));
                    }
                })


                ->addColumn('value', function($setting){

                    if($setting->is_locale == 1){
                        $value = '';
                        foreach($setting->localeAll as $settting_data) {
                            $value .= $settting_data->value.' ('.$settting_data->locale.')'."</br>";
                        }
                            return $value;
                    }else{
                        return $setting->value;
                    }
                })

                ->addColumn('category', function($setting){

                    $settingCategoryArr = array(

                        'contact_details'   => 'Contact Details',
                        'general'   => 'General',
                    );

                    return isset($settingCategoryArr[$setting->category]) ? $settingCategoryArr[$setting->category] : null;
                    //return array_search($setting->category,$settingCategoryArr);
                })

                ->editColumn('status', function($setting){
                    if($setting->status == 1){
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                        return $status;
                    }else{
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                        return $status;
                    }
                })
                ->editColumn('created_at', function ($setting) {
                    return [
                       'display' => e($setting->created_at->format('m/d/Y')),
                       'timestamp' => $setting->created_at->timestamp
                    ];
                })
                ->addColumn('action', function($row){
                    if (\Auth::user()->can('general-setting-edit')) { 

                        $btnEdit = '<a href="' . route('manage-contact-details.edit', [$row->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp;';
                    } else {
                        $btnEdit = '';
                    }
                    
                    return $btnEdit;
                })
                ->rawColumns(['action','status','value'])
                ->make(true);
        }

        return view('admin.contact_details.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.contact_details.edit')->withSetting($setting);
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
        //return $request;
        // Logic to validate form data
        /*$rules = [
            'key'              => 'required',
            'title'       => 'required',
            'category'         => 'required',
            'value_type'               => 'required',
        ];
        $attributes = [
            'key'             => 'key',
            'title'        => 'title',
            'category'      => 'category',
            'value_type'    => 'value_type',
        ];
        $this->validate($request, $rules, $attributes);*/

        // Logic to insert data
        $setting =  Setting::findOrFail($id);

        $userId                 = Auth::user()->id;
        //$setting->key           = $request->key;
        //$setting->title         = $request->title;
        //$setting->category      = $request->category;
        //$setting->value_type    = $request->value_type;
        //$setting->is_locale    = isset($request->is_locale) ? 1 : 0;
        $setting->status        = isset($request->status) ? 1 : 0;
        $setting->updated_by    = $userId;

        $setting->save();

        // check is_locale = 1 then save in translate table otherwise setting table -> value
        if ($setting->is_locale == 1) {
            // Logic to insert translations

            $trans_setting = [
            'en' => [
                "setting_id"              => $setting->id,
                "value"         => $request->value_en,
                "locale"       => 'en'
            ],
            'ar' => [
                "setting_id"              => $setting->id,
                "value"         => $request->value_ar,
                "locale"       => 'ar'
            ],
            'fr' => [
                "setting_id"              => $setting->id,
                "value"         => $request->value_fr,
                "locale"       => 'fr'
            ],
        ];
            //SettingTranslate::insert($trans_setting);
            foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {

            SettingTranslate::where(
                [
                    [
                        'setting_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_setting[$localeCode]);
        }

        }else{
            $Setting = Setting::findOrFail($id);
            $Setting->value = $request->value;
            $Setting->update();
        }


        $request->session()->flash('success', 'Setting Updated successfully.');
        return redirect()->route('manage-contact-details.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
