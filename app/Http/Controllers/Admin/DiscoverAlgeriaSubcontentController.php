<?php

namespace App\Http\Controllers\Admin;
use App\Models\DiscoverAlgeriaSubcontent,
    App\Models\DiscoverAlgeriaSubcontentTranslate,
    App\User,
    App\Models\DiscoverAlgeriaDocuments;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use DataTables;
use Session;
use DB;


class DiscoverAlgeriaSubcontentController extends Controller
{
    protected $display_order;

    public function __construct()
    {
        $this->middleware('permission:discover-algeria-subcontent-list');
        $this->middleware('permission:discover-algeria-subcontent-create', ['only' => ['create','store']]);
        $this->middleware('permission:discover-algeria-subcontent-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:discover-algeria-subcontent-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        Session::put('constant_id', $request->id);
        if($request->ajax()){
            $algeria_contents = DiscoverAlgeriaSubcontent::orderBy('display_order', 'asc')
                                ->orderBy('created_at', 'asc')
                                ->with('localeAll')
                                ->where('content_id',$request->get('id'));
             return Datatables::of($algeria_contents)
                    ->addIndexColumn()
                    ->addColumn('title', function($algeria_contents){
                        foreach($algeria_contents->localeAll as $algeria_contents_data) {
                            if($algeria_contents_data->locale == "en") {
                                $title = $algeria_contents_data->sub_content_title;
                            }
                        }
                        return $title;
                    })
                    ->addColumn('action', function($algeria_contents){
                        if (\Auth::user()->can('discover-algeria-subcontent-edit')) { 
                            $editBtn = '<a href="' . route('manage-algeria-subcontent.edit', [$algeria_contents->id,'id'=>Session::get('constant_id')]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $editBtn = '';
                        }
                        if (\Auth::user()->can('discover-algeria-subcontent-delete')) { 
                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-algeria-subcontent.destroy', [$algeria_contents->id]) . '" rel="tooltip" title="Delete" class="delete_algeria_subcontent_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>&nbsp';
                        } else {
                            $deleteBtn = '';
                        }
                        return $editBtn.$deleteBtn;
                     })
                     ->editColumn('status', function($algeria_contents){
                         if($algeria_contents->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                     ->editColumn('created_at', function ($algeria_contents) {
                        return [
                           'display' => e($algeria_contents->created_at->format('m/d/Y')),
                           'timestamp' => $algeria_contents->created_at->timestamp
                        ];
                     })
                     ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == '0' || $request->get('status') == '1') {
                            $instance->where('status', $request->get('status'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->whereHas('localeAll', function($w) use($request){
                                $search = $request->get('search');
                                $w->where('sub_content_title', 'LIKE', "%$search%");
                            });
                        }

                    })
                     ->rawColumns(['action','status'])
                     ->make(true);
         }
         return view('admin.discover_algeria_subcontent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $display_order = DiscoverAlgeriaSubcontent::where('content_id',$request->id)->count('id');
        if($display_order == 0)
            $this->display_order = 1;
        else
            $this->display_order = $display_order + 1;

        return view('admin.discover_algeria_subcontent.create',['display_order' => $this->display_order]);
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
        
        $rules = [
            'sub_title_name_in_english'    => 'required',
            'sub_title_name_in_arabic'     => 'required',
            'sub_title_name_in_french'     => 'required',
            'description_in_english'       => 'required',
            'description_in_arabic'        => 'required',
            'description_in_french'        => 'required',
            'display_order'                => 'required',
            'document_in_english'          => 'file|mimes:pdf',
            'document_in_french'          => 'file|mimes:pdf',
        ];
        $messages = [
            'document_in_english'                  => "The document type must be pdf.",
            'document_in_french'                  => "The document type must be pdf.",
        ];
        
        $this->validate($request, $rules, $messages);
        
        
        
        $content_data = [
            [
                'sub_title_name' => $request->sub_title_name_in_english,
                'description'    => $request->description_in_english,
                'locale'         => "en"
            ],
            [
                'sub_title_name' => $request->sub_title_name_in_arabic,
                'description'    => $request->description_in_arabic,
                'locale'         => "ar"
            ],
            [
                'sub_title_name' => $request->sub_title_name_in_french,
                'description'    => $request->description_in_french,
                'locale'         => "fr"
            ],
        ];
        
        $this->display_order = DiscoverAlgeriaSubcontent::where('content_id',$request->content_id)->count('id');
       
        $algeria_subcontent = new DiscoverAlgeriaSubcontent();
        $algeria_subcontent->content_id = $request->content_id;
        $algeria_subcontent->display_order = $request->display_order;
        $algeria_subcontent->status = isset($request->status)?1:0;
        $algeria_subcontent->created_by = Auth::user()->id;
        $algeria_subcontent->updated_by = Auth::user()->id;
        $result = $algeria_subcontent->save();

        DiscoverAlgeriaSubcontent::where('display_order','>=',$request->display_order)
                                    ->where('display_order','<=',$this->display_order)
                                    ->where('id','!=',$algeria_subcontent->id)
                                    ->where('content_id',$request->content_id)
                                    ->update(['display_order' => DB::raw('display_order + 1')]);       


        DB::statement("SET @r=0");

        $query = 'UPDATE discover_algeria_subcontents AS t1
        INNER JOIN (
        SELECT id,@r:= (@r+1) AS rn
        FROM discover_algeria_subcontents
        WHERE (deleted_at IS NULL) AND (content_id ='.$request->content_id.')
        ORDER BY display_order ASC 
        ) AS t2
        ON t1.id = t2.id SET t1.display_order = t2.rn WHERE (deleted_at IS NULL) AND (content_id ='.$request->content_id.')';


        DB::statement($query);

        foreach($content_data as $key => $value) {
            $algeria_subcontent_tanslation = new DiscoverAlgeriaSubcontentTranslate();
            $algeria_subcontent_tanslation->sub_content_title = $value['sub_title_name'];
            $algeria_subcontent_tanslation->sub_content_description = $value['description'];
            $algeria_subcontent_tanslation->subcontent_id = $algeria_subcontent->id;
            $algeria_subcontent_tanslation->locale = $value['locale'];
            $algeria_subcontent_tanslation->save();
        }

        if ($request->document_in_english != null) {
           
            $file = $request->document_in_english;
            $fileSaveAsNameEnglish = $file->getClientOriginalName();
            $fileSaveAsNameInEnglish = time()."-".$file->getClientOriginalName();
            $upload_path = storage_path('app/public/uploads/discover_algeria/documents/');
            $success = $file->move($upload_path, $fileSaveAsNameInEnglish);    
        } 
        if ($request->document_in_french != null) {
           
            $file = $request->document_in_french;
            $fileSaveAsNameFrench = $file->getClientOriginalName();
            $fileSaveAsNameInFrench = time()."-".$file->getClientOriginalName();
            $upload_path = storage_path('app/public/uploads/discover_algeria/documents/');
            $success = $file->move($upload_path, $fileSaveAsNameInFrench);    
        } 
        if($request->document_in_english != null || $request->document_in_french != null) {
            $fileSaveAsNameInEnglish = isset($fileSaveAsNameInEnglish) ? $fileSaveAsNameInEnglish : '';
            $fileSaveAsNameInFrench = isset($fileSaveAsNameInFrench) ? $fileSaveAsNameInFrench: '';
            $discover_algeria_document = new DiscoverAlgeriaDocuments();
            $discover_algeria_document->subcontent_id  = $algeria_subcontent->id;
            $discover_algeria_document->document_name = json_encode(['en'=>$fileSaveAsNameEnglish,'fr'=>$fileSaveAsNameFrench]);
            $discover_algeria_document->document =  json_encode(['en'=>$fileSaveAsNameInEnglish,'fr'=>$fileSaveAsNameInFrench]);
            $discover_algeria_document->save(); 
        }

        if($result) {
            Session::put('success', 'Discover algeria sub content added successfully.');
            return view('admin.discover_algeria_subcontent.index');

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
        $algeria_content = DiscoverAlgeriaSubcontent::findOrFail($id);
        // Setting the translated fields to edit
        foreach ($algeria_content->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $algeria_content->sub_title_in_english = $translate->sub_content_title;
                    $algeria_content->description_in_english = $translate->sub_content_description;
                    break;
                case 'fr':
                    $algeria_content->sub_title_in_french = $translate->sub_content_title;
                    $algeria_content->description_in_french = $translate->sub_content_description;
                    break;
                case 'ar':
                    $algeria_content->sub_title_in_arabic = $translate->sub_content_title;
                    $algeria_content->description_in_arabic = $translate->sub_content_description;
                    break;
            }
        }
        return view('admin.discover_algeria_subcontent.edit', compact('algeria_content'));
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

        $rules = [
            'sub_title_name_in_english'    => 'required',
            'sub_title_name_in_arabic'     => 'required',
            'sub_title_name_in_french'     => 'required',
            'description_in_english'       => 'required',
            'description_in_arabic'        => 'required',
            'description_in_french'        => 'required',
            'display_order'                => 'required',
            'document_in_english'          => 'file|mimes:pdf',
            'document_in_french'           => 'file|mimes:pdf',
        ];
        $messages = [
            'document_in_english'          => "The document type must be pdf.",
            'document_in_french'           => "The document type must be pdf.",
        ];

        $this->validate($request, $rules, $messages); 

        $this->display_order = DiscoverAlgeriaSubcontent::where('content_id',$request->content_id)->count('id'); 
        
        if($request->display_order > $this->display_order){ 

            $request->display_order = $this->display_order;
        }
        $algeria_subcontent = DiscoverAlgeriaSubcontent::findOrFail($id);
        $algeria_subcontent->content_id = $request->content_id;
        $algeria_subcontent->display_order = $request->display_order;
        $algeria_subcontent->status = isset($request->status)?1:0;
        $algeria_subcontent->created_by = Auth::user()->id;
        $algeria_subcontent->updated_by = Auth::user()->id;
        $result = $algeria_subcontent->Update();

        // dd($request->display_order,$algeria_subcontent->display_order+1);
        DiscoverAlgeriaSubcontent::where('display_order','>=',$request->display_order)
                                    ->where('display_order','<=',$this->display_order)
                                    ->where('id','!=',$algeria_subcontent->id)
                                    ->where('content_id',$request->content_id)
                                    ->update(['display_order' => DB::raw('display_order + 1')]);       

        DB::statement("SET @r=0");
        $query = 'UPDATE discover_algeria_subcontents AS t1
        INNER JOIN (
        SELECT id,@r:= (@r+1) AS rn
        FROM discover_algeria_subcontents
        WHERE (deleted_at IS NULL) AND (content_id ='.$request->content_id.')
        ORDER BY display_order ASC 
        ) AS t2
        ON t1.id = t2.id SET t1.display_order = t2.rn WHERE (deleted_at IS NULL) AND (content_id ='.$request->content_id.')';

        DB::statement($query);

        $trans_algeria_content = [
            'en' => [
                "sub_content_title"         => $request->sub_title_name_in_english,
                "sub_content_description"   => $request->description_in_english,
            ],
            'fr' => [
                "sub_content_title"         => $request->sub_title_name_in_french,
                "sub_content_description"   => $request->description_in_french,
            ],
            'ar' => [
                "sub_content_title"         => $request->sub_title_name_in_arabic,
                "sub_content_description"   => $request->description_in_arabic,
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            DiscoverAlgeriaSubcontentTranslate::where(
                [
                    [
                        'subcontent_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_algeria_content[$localeCode]);
        }

        if ($request->document_in_english != null || $request->document_in_french != null) {
             $fileSaveAsNameInFrench = '';
             $fileSaveAsNameInEnglish = '';
             $fileSaveAsNameEnglish ='';
             $fileSaveAsNameFrench = '';

             $subcontent = DiscoverAlgeriaDocuments::where('subcontent_id',$id)->first();
             if($subcontent != null) {
                $subcontent->document = json_decode($subcontent->document);
                $subcontent->document_name = json_decode($subcontent->document_name);
             } else {
                $subcontent = new DiscoverAlgeriaDocuments();
             }

             if ($request->document_in_english != null) {
                try { 
                    unlink('storage/uploads/discover_algeria/documents/'.$subcontent->document->en);
                } catch (\Throwable $th) {

                }
                $file = $request->document_in_english;
                $fileSaveAsNameEnglish = $file->getClientOriginalName();
                $fileSaveAsNameInEnglish = time().$file->getClientOriginalName();
                $upload_path = storage_path('app/public/uploads/discover_algeria/documents/');
                $success = $file->move($upload_path, $fileSaveAsNameInEnglish);    
            } 
            if ($request->document_in_french != null) { 
                try { 
                    unlink('storage/uploads/discover_algeria/documents/'.$subcontent->document->fr);
                } catch (\Throwable $th) {

                }
                $file = $request->document_in_french;
                $fileSaveAsNameFrench = $file->getClientOriginalName();
                $fileSaveAsNameInFrench = time().$file->getClientOriginalName();
                $upload_path = storage_path('app/public/uploads/discover_algeria/documents/');
                $success = $file->move($upload_path, $fileSaveAsNameInFrench);    
            } 
            
            if($fileSaveAsNameInEnglish == '' && $subcontent != null) {
                $fileSaveAsNameInEnglish = isset($subcontent->document->en) ?$subcontent->document->en :'';
                $fileSaveAsNameEnglish    = isset($subcontent->document_name->en) ?$subcontent->document_name->en:'';
            }
            if($fileSaveAsNameInFrench == '' && $subcontent != null) {
                $fileSaveAsNameInFrench = isset($subcontent->document->fr) ?$subcontent->document->fr:'' ;
                $fileSaveAsNameFrench  = isset($subcontent->document_name->fr) ? $subcontent->document_name->fr :'';
            }
            $subcontent->subcontent_id = $algeria_subcontent->id;
            $subcontent->document_name = json_encode(['en'=>$fileSaveAsNameEnglish,'fr'=>$fileSaveAsNameFrench]);
            $subcontent->document =  json_encode(['en'=>$fileSaveAsNameInEnglish,'fr'=>$fileSaveAsNameInFrench]);
            $subcontent->save(); 
        }
        
        if($result) {
            // Session::put('success', 'Discover algeria sub content updated successfully.');
            // return view('admin.discover_algeria_subcontent.index');
            return redirect()->route('manage-algeria-subcontent.index',['id'=>$algeria_subcontent->content_id])->with('success', 'Discover algeria sub content updated successfully.');
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
        $algeria_content= DiscoverAlgeriaSubcontent::with('localeAll')->find($id);
        $content_id = $algeria_content->content_id;
        DiscoverAlgeriaSubcontent::where('display_order','>=',$algeria_content->display_order)
        ->where('content_id',$algeria_content->content_id)
        ->update(['display_order' => DB::raw('display_order - 1')]);
        
        $content_id = $algeria_content->content_id;

        if($algeria_content != null){
            $algeria_content->localeAll()->delete();
            $algeria_content->delete();
        }
        DB::statement("SET @r=0");
        $query = 'UPDATE discover_algeria_subcontents AS t1
        INNER JOIN (
        SELECT id,@r:= (@r+1) AS rn
        FROM discover_algeria_subcontents
        WHERE (deleted_at IS NULL) AND (content_id ='.$content_id.')
        ORDER BY display_order ASC 
        ) AS t2
        ON t1.id = t2.id SET t1.display_order = t2.rn WHERE (deleted_at IS NULL) AND (content_id ='.$content_id.')';

        DB::statement($query);
        
        return redirect()->back()->with('success', 'Discover algeria sub content deleted successfully.');
    }
}
