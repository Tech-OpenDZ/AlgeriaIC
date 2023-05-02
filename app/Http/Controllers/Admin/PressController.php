<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Press;
use App\Models\PressTranslate;
use DataTables;
use Auth;
use LaravelLocalization;
use DB;

class PressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // echo "<pre>";print_r($sections);exit();
        if($request->ajax()){
            $sections = Press::with('localeAll');
            return Datatables::of($sections)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    foreach($row->localeAll as $row_data) {
                        if($row_data->locale == "en") {
                            $row_name = $row_data->name;
                        }
                        return $row_name;
                    }
                })
                ->addColumn('function', function($row){
                    foreach($row->localeAll as $row_data) {
                        if($row_data->locale == "en") {
                            $row_function = $row_data->function;
                        }
                        return html_entity_decode(strip_tags($row_function));
                    }
                })

                ->addColumn('img_link', function($row){
                    foreach($row->localeAll as $row_data) {
                        if($row_data->locale == "en") {
                            $row_img_link = $row_data->img_link;
                        }
                        return html_entity_decode(strip_tags($row_img_link));
                    }
                })

          
                ->addColumn('press_image', function($row){
                    $press_image = $row->press_image;
                    $press_img =  trim($press_image, '"');
                    return $press_img;
                })
                ->addColumn('action', function($sections){
                    if (\Auth::user()->can('press-edit')) {
                        $editbtn = '<a href="' . route('manage-press.edit', [$sections->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                    } else {
                        $editbtn = '';
                    }
                    if (\Auth::user()->can('press-delete')) {
                        $deletebtn = '<a href="javascript:void(0)" data-href="' . route('manage-press.destroy', [$sections->id]) . '" rel="tooltip" title="Delete" class="delete_bi_report_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    } else {
                        $deletebtn = '';
                    }
                    return $editbtn.$deletebtn;
                })

                
                ->editColumn('status', function($sections){
                    if($sections->status == 1){
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                        return $status;
                    }else{
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                        return $status;
                    }
                })
                ->editColumn('created_at', function ($row) {
                    return [
                        'display' => e($row->created_at->format('m/d/Y')),
                        'timestamp' => $row->created_at->timestamp
                    ];
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->get('status'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->whereHas('localeAll', function($w) use($request){
                            $search = $request->get('search');
                            $w->where('name', 'LIKE', "%$search%")
                                ->orWhere('function', 'LIKE', "%$search%");
                               
                        });
                    }

                })
                ->rawColumns(['action','status','press_link','img_link'])
                ->make(true);
        }
        return view('admin.press.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $display_order = Press::max('display_order');
        if($display_order ==0)
            $display_order = 1;
        else
            $display_order++;
        // echo "<pre>";print_r($display_order);exit();
        return view('admin.press.create',compact('display_order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_in_english'         => 'required',
            'name_in_arabic'          => 'required',
            'name_in_french'          => 'required',
            'function_in_english'     => 'required',
            'function_in_arabic'      => 'required',
            'function_in_french'      => 'required',
            'press_image'                         => 'image|mimes:jpeg,png,jpg,gif|max:1024',
          
        ]);

        $press_data = [
            [   'name'        => $request->name_in_english,
                'function'    => $request->function_in_english,
                'locale'      => "en"
            ],
            [   'name'        => $request->name_in_arabic,
                'function'    => $request->function_in_arabic,
                'locale'      => "ar"
            ],
            [   'name'        => $request->name_in_french,
                'function'    => $request->function_in_french,
                'locale'      => "fr"
            ],
        ];

        $press = new Press();
        if ($request->hasFile('press_image')) {
            $image = $request->file('press_image');
            $imageSaveAsName = time() . "_press_image." . $image->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/press/image/');
            $logo_image_url = $imageSaveAsName;
            if($request->image){
                if(file_exists($upload_path.$request->image)) {
                    unlink($upload_path.$request->image);
                }
            }
            $success = $image->move($upload_path, $imageSaveAsName);
            $press->press_image = $imageSaveAsName;
        }

        $press->status = isset($request->status)?1:0;
        $press->display_order = $request->display_order;
        $press->press_link = $request->press_link;
        $press->img_link = $request->img_link;
        $press->publication_date = $request->publication_date;
      
        $result = $press->save();

        Press::where('display_order','>=',$request->display_order)
            ->where('id','!=',$press->id)
            ->update(['display_order' => DB::raw('display_order + 1')]);

        foreach($press_data as $key => $value) {
            $press_tanslation = new PressTranslate;
            $press_tanslation->name = $value['name'];
            $press_tanslation->press_id = $press->id;
            $press_tanslation->function = $value['function'];
         
            $press_tanslation->locale = $value['locale'];
            $press_tanslation->save();
        }
        if($result) {
            $request->session()->flash('success', 'video press added successfully.');
            return redirect()->route('manage-press.index');
        }
    }

    public function edit($id)
    {
        $press_data = Press::findOrFail($id);
        // Setting the translated fields to edit
        foreach ($press_data->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $press_data->name_in_english = $translate->name;
                    $press_data->function_in_english = $translate->function;
                   
                    break;
                case 'fr':
                    $press_data->name_in_french = $translate->name;
                    $press_data->function_in_french = $translate->function;
                  
                    break;
                case 'ar':
                    $press_data->name_in_arabic = $translate->name;
                    $press_data->function_in_arabic = $translate->function;
                    
                    break;
            }
        }
        return view('admin.press.edit', compact('press_data'));
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
        $validatedData = $request->validate([
            'name_in_english'         => 'required',
            'name_in_arabic'          => 'required',
            'name_in_french'          => 'required',
            'function_in_english'   => 'required',
            'function_in_arabic'    => 'required',
            'function_in_french'    => 'required',
           
        ]);

        $press_data = Press::findOrFail($id);
        if ($request->hasFile('press_image')) {
            $image = $request->file('press_image');
            $imageSaveAsName = time() . "_press_image." . $image->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/press/image/');
        
            $logo_image_url = $imageSaveAsName;
            if($request->image){
                try {
                    unlink($upload_path.$press_data->image);
                } catch (\Throwable $th) {

                }
            }
            $success = $image->move($upload_path, $imageSaveAsName);
            $press_data->press_image = $imageSaveAsName;
        }
        $press_data->status = isset($request->status)?1:0;
        $press_data->display_order = $request->display_order;
        $press_data->publication_date = $request->publication_date;
        $press_data->press_link = $request->press_link;
        $press_data->img_link = $request->img_link;
        $result = $press_data->Update();

        Press::where('display_order','>=',$request->display_order)
            ->where('id','!=',$press_data->id)
            ->update(['display_order' => DB::raw('display_order + 1')]);

        $trans_press = [
            'en' => [
                "name"       => $request->name_in_english,
                "function" => $request->function_in_english,
               
            ],
            'fr' => [
                "name"       => $request->name_in_french,
                "function" => $request->function_in_french,
                
            ],
            'ar' => [
                "name"       => $request->name_in_arabic,
                "function" => $request->functionn_in_arabic,
               
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            PressTranslate::where(
                [
                    [
                        'press_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_press[$localeCode]);
        }
        if($result) {
            $request->session()->flash('success', 'press video updated successfully.');
            return redirect()->route('manage-press.index');
        }
    }

    public function destroy(Request $request,$id)
    {
        $press_data= Press::with('localeAll')->find($id);
        // unlink('storage/uploads/assistance_service/'.$assistance_data->services_image);
        $press_data->localeAll()->delete();
        $press_data->delete();
        $request->session()->flash('success', 'Video Press deleted successfully.');
        return redirect()->route('manage-press.index');
    }
}
