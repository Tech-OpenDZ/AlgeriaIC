<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use App\Models\TestimonialTranslate;
use App\Models\Setting;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use DataTables;
use DB;


class TestimonialController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:testimonial-list');
        $this->middleware('permission:testimonial-create', ['only' => ['create','store']]);
        $this->middleware('permission:testimonial-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $testimonials = Testimonial::with('localeAll');

            return Datatables::of($testimonials)
                ->addColumn('name', function($testimonials){
                    return $testimonials->localeAll[0]->name;
                })
                ->addColumn('sub_title', function($testimonials){

                    return $testimonials->localeAll[0]->sub_title;
                })
                ->addColumn('description', function($testimonials){

                    return html_entity_decode( strip_tags($testimonials->localeAll[0]->description) );
                })
                ->editColumn('status', function($testimonials){
                    if($testimonials->status == 1){
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                        return $status;
                    }else{
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                        return $status;
                    }
                })
                ->addColumn('action', function($row){
                    if (\Auth::user()->can('testimonial-edit')) { 
                        $btnEdit = '<a href="' . route('manage-testimonial.edit', [$row->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp;';
                    } else {
                        $btnEdit = '';
                    }
                    if (\Auth::user()->can('testimonial-delete')) {  
                        $btnDelete = '<a class="delete_admin_btn" rel="tooltip" title="Delete" href="javascript:;" data-href="' . route('manage-testimonial.destroy', [$row->id]) . '"  title="Delete"  data-id="'.$row->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    } else {
                        $btnDelete = '';
                    }
                    return $btnEdit.$btnDelete;
                })
                ->editColumn('created_at', function ($testimonials) {
                    return [
                       'display' => e($testimonials->created_at->format('m/d/Y')),
                       'timestamp' => $testimonials->created_at->timestamp
                    ];
                 })
                 ->editColumn('created_at', function ($testimonials) {
                    return [
                       'display' => e($testimonials->created_at->format('m/d/Y')),
                       'timestamp' => $testimonials->created_at->timestamp
                    ];
                 })
                ->filter(function ($instance) use ($request) {

                    if (!empty($request->get('search'))) {

                        $instance->whereHas('localeAll', function($w) use($request){
                            $search = $request->get('search');
                            return $w->where('name', 'LIKE', "%$search%")
                            ->orWhere('sub_title', 'LIKE', "%$search%")
                            ->orWhere('description', 'LIKE', "%$search%");
                        });
                    }

                    if ($request->get('status') == '1' || $request->get('status') == '0') {
                        return $instance->where('status', $request->get('status'));
                    }
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

        return view('admin.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $display_order = Testimonial::max('display_order');
        $display_order++;
        return view('admin.testimonial.edit',compact('display_order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Logic to validate form data
        $rules = [
            'name_in_english'              => 'required',
            'description_in_english'       => 'required',
            'sub_title_in_english'         => 'required',
            'name_in_french'               => 'required',
            'description_in_french'        => 'required',
            'sub_title_in_french'          => 'required',
            'name_in_arabic'               => 'required',
            'description_in_arabic'        => 'required',
            'sub_title_in_arabic'          => 'required',
            'image'                        => 'nullable|image|dimensions:max_width=500,max_height=500',
            'display_order'                => 'required|numeric',
        ];
        $messages = [
            'image.dimensions'             => "Image must be maximum 500x500 "
        ];
        $attributes = [
            'name_in_english'             => 'English name',
            'sub_title_in_english'        => 'English sub title',
            'description_in_english'      => 'English description',
            'name_in_french'              => 'French name',
            'sub_title_in_french'         => 'French sub title',
            'description_in_french'       => 'French description',
            'name_in_arabic'              => 'Arabic name',
            'sub_title_in_arabic'         => 'Arabic sub title',
            'description_in_arabic'       => 'Arabic description'
        ];

        $this->validate($request, $rules, $messages, $attributes);

        // Logic to upload the file
        if ($request->hasFile('image')) {

            $image              = $request->file('image');
            $imageSaveAsName    = time() . "_image." . $image->getClientOriginalExtension();
            $upload_path        = storage_path('app/public/uploads/testimonial/');

            if(file_exists($upload_path.$request->image)) {
                unlink($upload_path.$request->image);
            }
            $success = $image->move($upload_path, $imageSaveAsName);
        }

        // Logic to insert data
        $testimonial                = new Testimonial;

        $userId                     = Auth::user()->id;
        $testimonial->image         = isset($imageSaveAsName)? $imageSaveAsName : null;
        $testimonial->display_order = $request->display_order;
        $testimonial->status        = isset($request->status) ? 1 : 0;
        $testimonial->created_by    = $userId;
        $testimonial->updated_by    = $userId;

        $testimonial->save();

        Testimonial::where('display_order','>=',$request->display_order)
                    ->where('id','!=',$testimonial->id)
                    ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('testimonials');


        // Logic to insert translations
        $trans_testimonial = [
            [
                "testimonial_id"    => $testimonial->id,
                "name"              => $request->name_in_english,
                "sub_title"         => $request->sub_title_in_english,
                "description"       => $request->description_in_english,
                "locale"            => 'en'
            ],
            [
                "testimonial_id"    => $testimonial->id,
                "name"              => $request->name_in_french,
                "sub_title"         => $request->sub_title_in_french,
                "description"       => $request->description_in_french,
                "locale"            => 'fr'
            ],
            [
                "testimonial_id"    => $testimonial->id,
                "name"              => $request->name_in_arabic,
                "sub_title"         => $request->sub_title_in_arabic,
                "description"       => $request->description_in_arabic,
                "locale"            => 'ar'
            ],
        ];

        $testimonial = TestimonialTranslate::insert($trans_testimonial);

        $request->session()->flash('success', 'Testimonial added successfully.');
        return redirect()->route('manage-testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $testimonials = Testimonial::locale(1);
        // dd($testimonials);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonial.edit')->withTestimonial($testimonial);
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
        // Logic to validate form data
        $rules = [
            'name_in_english'              => 'required',
            'description_in_english'       => 'required',
            'sub_title_in_english'         => 'required',
            'name_in_french'               => 'required',
            'description_in_french'        => 'required',
            'sub_title_in_french'          => 'required',
            'name_in_arabic'               => 'required',
            'description_in_arabic'        => 'required',
            'sub_title_in_arabic'          => 'required',
            'display_order'                => 'required|numeric',
        ];
        $messages = [];
        $attributes = [
            'name_in_english'             => 'English name',
            'sub_title_in_english'        => 'English sub title',
            'description_in_english'      => 'English description',
            'name_in_french'              => 'French name',
            'sub_title_in_french'         => 'French sub title',
            'description_in_french'       => 'French description',
            'name_in_arabic'              => 'Arabic name',
            'sub_title_in_arabic'         => 'Arabic sub title',
            'description_in_arabic'       => 'Arabic description'
        ];

        if ($request->hasFile('image')) {
            $rules = [
                'image'   => 'required|image|dimensions:max_width=500,max_height=500'
            ];

            $messages = [
                'image.dimensions' => "Image must be maximum 500x500 "
            ];
        }

        $this->validate($request, $rules, $messages, $attributes);

        $testimonial =  Testimonial::findOrFail($id);

        // Logic to upload the file
        if ($request->hasFile('image')) {

            $image              = $request->file('image');
            $imageSaveAsName    = time() . "_image." . $image->getClientOriginalExtension();
            $upload_path        = storage_path('app/public/uploads/testimonial/');

            if(file_exists($upload_path.$request->image)) {
                unlink($upload_path.$request->image);
            }
            $success                = $image->move($upload_path, $imageSaveAsName);
            $testimonial->image     = $imageSaveAsName;
        }

        // Logic to update data

        $userId                     = Auth::user()->id;
        $testimonial->display_order = $request->display_order;
        $testimonial->status        = isset($request->status) ? 1 : 0;
        $testimonial->created_by    = $userId;
        $testimonial->updated_by    = $userId;

        $testimonial->save(); 

        Testimonial::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$testimonial->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('testimonials');

        // Logic to update translations
        $trans_testimonial = [
            'en' => [
                "name"              => $request->name_in_english,
                "sub_title"         => $request->sub_title_in_english,
                "description"       => $request->description_in_english
            ],
            'fr' => [
                "name"              => $request->name_in_french,
                "sub_title"         => $request->sub_title_in_french,
                "description"       => $request->description_in_french
            ],
            'ar' => [
                "name"              => $request->name_in_arabic,
                "sub_title"         => $request->sub_title_in_arabic,
                "description"       => $request->description_in_arabic
            ],
        ];

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {

            TestimonialTranslate::where(
                [
                    [
                        'testimonial_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_testimonial[$localeCode]);
        }

        // Setting success message and return
        $request->session()->flash('success', 'Testimonial updated successfully.');
        return redirect()->route('manage-testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->localeAll()->delete();

        $testimonial->delete();

        $request->session()->flash('success', 'Testimonial deleted successfully.');
        return redirect()->route('manage-testimonial.index');
    }
}
