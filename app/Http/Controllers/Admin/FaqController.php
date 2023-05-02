<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Models\FaqTranslate;
use Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use LaravelLocalization;
use DataTables;
use DB;

class FaqController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:faq-list');
        $this->middleware('permission:faq-create', ['only' => ['create','store']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $faqs = Faq::with('localeAll');

            return Datatables::of($faqs)
                ->filter(function ($instance) use ($request) {

                    if (!empty($request->get('search'))) {

                        $instance->whereHas('localeAll', function($w) use($request){
                            $search = $request->get('search');
                            $w->where('question', 'LIKE', "%$search%")
                            ->orWhere('answer', 'LIKE', "%$search%");
                        });
                    }

                    if ($request->get('status') == '1' || $request->get('status') == '0') {
                        return $instance->where('status', $request->get('status'));
                    }
                })
                ->addColumn('question', function($faqs){

                    return $faqs->localeAll[0]->question;
                })
                ->addColumn('answer', function($faqs){

                    return $faqs->localeAll[0]->answer;
                })
                ->editColumn('status', function($faqs){
                    if($faqs->status == 1){
                        $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                        return $status;
                    }else{
                        $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                        return $status;
                    }
                })
                ->editColumn('created_at', function ($faqs) {
                    return [
                       'display' => e($faqs->created_at->format('m/d/Y')),
                       'timestamp' => $faqs->created_at->timestamp
                    ];
                 })
                ->addColumn('action', function($row){

                    if (\Auth::user()->can('faq-edit')) {
                        $btnEdit = '<a href="' . route('manage-faq.edit', [$row->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp;';
                    } else {
                        $btnEdit = '';
                    }
                    if (\Auth::user()->can('faq-delete')) {
                        $btnDelete = '<a class="delete_admin_btn" rel="tooltip" title="Delete" href="javascript:;" data-href="' . route('manage-faq.destroy', [$row->id]) . '"  title="Delete"  data-id="'.$row->id.'"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                    } else {
                        $btnDelete = '';
                    }
                    return $btnEdit.$btnDelete;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

        return view('admin.faq.index');

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
            'question_in_english'              => 'required',
            'question_in_arabic'              => 'required',
            'question_in_french'              => 'required',
            'answer_in_english'              => 'required',
            'answer_in_arabic'              => 'required',
            'answer_in_french'              => 'required',
            'display_order'                => 'integer|required',
        ];
        $messages = [
            'image.dimensions'             => "Image must be maximum 500x500 "
        ];
        $attributes = [
            'question_in_english'             => 'English question',
            'question_in_arabic'             => 'Arabic question',
            'question_in_french'             => 'French question',
            'answer_in_english'             => 'English answer',
            'answer_in_arabic'             => 'Arabic answer',
            'answer_in_french'             => 'French answer',
            'display_order'       => 'Display Order is required',
        ];

        $this->validate($request, $rules, $messages, $attributes);

        $faq_data = [
            [   'question' => $request->question_in_english,
                'answer' => $request->answer_in_english,
                'locale'      => "en"
            ],
            [   'question' => $request->question_in_arabic,
                'answer' => $request->answer_in_arabic,
                'locale'      => "ar"
            ],
            [   'question' => $request->question_in_french,
                'answer' => $request->answer_in_french,
                'locale'      => "fr"
            ],
        ];

        $user = User::find(Auth::user()->id);

        $faq = new Faq();
        $faq->status = isset($request->status)?1:0;
        $faq->display_order = $request->display_order;
        $faq->created_by = Auth::user()->id;
        $faq->updated_by = Auth::user()->id;
        $result = $faq->save();

        Faq::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$faq->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);

        foreach($faq_data as $key => $value) {
            $faq_tanslation = new FaqTranslate();
            $faq_tanslation->question = $value['question'];
            $faq_tanslation->answer = $value['answer'];
            $faq_tanslation->faq_id = $faq->id;
            $faq_tanslation->locale = $value['locale'];
            $faq_tanslation->save();
        }


        if($result) {
            $request->session()->flash('success', 'FAQ added successfully.');
            return redirect()->route('manage-faq.index');
        }
    }

    public function edit($id)
    {
        $faq = Faq::with(['localeAll' => function($query){return $query->orderBy('id');}])->findOrFail($id);

        return view('admin.faq.edit', ['faq' => $faq]);
    }

    public function create(){
        $defaultDisplayOrder = Faq::max('id');
        $defaultDisplayOrder++;
        return view('admin.faq.create', compact('defaultDisplayOrder'));
    }

    public function show(){
        // return view('admin.faq.create');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);

        $faq->localeAll()->delete();

        $faq->delete();

        return redirect()->route('manage-faq.index')->with('flash_message', "FAQ Deleted Successfully.");
    }


     /**
     * Update the given user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id){

        $rules = [
            'question_in_english'              => 'required',
            'question_in_arabic'              => 'required',
            'question_in_french'              => 'required',
            'answer_in_english'              => 'required',
            'answer_in_arabic'              => 'required',
            'answer_in_french'              => 'required',
            'display_order'                => 'integer|required',
        ];
        $messages = [
            'image.dimensions'             => "Image must be maximum 500x500 "
        ];
        $attributes = [
            'question_in_english'             => 'English question',
            'question_in_arabic'             => 'Arabic question',
            'question_in_french'             => 'French question',
            'answer_in_english'             => 'English answer',
            'answer_in_arabic'             => 'Arabic answer',
            'answer_in_french'             => 'French answer',
            'display_order'       => 'Display Order is required',
        ];

        $this->validate($request, $rules, $messages, $attributes);

        // Logic to update data
        $faq =  Faq::find($id);
        $userId = Auth::user()->id;
        $faq->display_order = $request->display_order;
        $faq->status        = isset($request->status) ? 1 : 0;
        $faq->updated_by    = $userId;
        $result = $faq->save();

        Faq::where('display_order','>=',$request->display_order)
            ->where('id','!=',$faq->id)
            ->update(['display_order' => DB::raw('display_order + 1')]);


        // Logic to update translations

        $trans_faq = [
            'en' => [
                "question"       => $request->question_in_english,
                "answer"         => $request->answer_in_english,
            ],
            'ar' => [
                "question"       => $request->question_in_arabic,
                "answer"         => $request->answer_in_arabic,
            ],
            'fr' => [
                "question"       => $request->question_in_french,
                "answer"         => $request->answer_in_french,
            ]

        ];

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            FaqTranslate::where(
                [
                    [
                        'faq_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_faq[$localeCode]);
        }

        if($result) {

            $request->session()->flash('success', 'Testimonial Updated Successfully.');
            return redirect()->route('manage-faq.index');
        }


    }




}
