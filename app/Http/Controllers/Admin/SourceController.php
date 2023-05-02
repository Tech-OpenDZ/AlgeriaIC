<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use DataTables;
use App\Models\Source;
use App\Models\SourceTranslate;
use Auth;
use DB;
class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
    	if($request->ajax()){
            $source = Source::with('localeAll');
             return Datatables::of($source)
                    ->addIndexColumn()
                    ->addColumn('name', function($source){
                        foreach($source->localeAll as $source_data) {
                            if($source_data->locale == "en") {
                                $source_name = $source_data->name;
                            }
                        }
                        return $source_name;
                    })
                    ->addColumn('action', function($source){
                         $btn = '<a href="' . route('manage-source.edit', [$source->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp;
                             <a href="javascript:void(0)" data-href="' . route('manage-source.destroy', [$source->id]) . '" rel="tooltip" title="Delete" class="delete_sector_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                             return $btn;
                     })
                     ->editColumn('status', function($source){
                         if($source->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                     ->editColumn('created_at', function ($source) {
                        return [
                           'display' => e($source->created_at->format('m/d/Y')),
                           'timestamp' => $source->created_at->timestamp
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
                     ->rawColumns(['action','status'])
                     ->make(true);
         }
    	return view('admin.source.index');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $defaultDisplayOrder = Source::max('id');
        $defaultDisplayOrder++;

        return view('admin.source.create', compact('defaultDisplayOrder'));
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
            'source_name_in_english'    => 'required',
            'source_name_in_arabic'     => 'required',
            'source_name_in_french'     => 'required',
            'display_order'             =>'required|numeric',
        ]);


        $sector_data = [
            [  'sector_name' => $request->source_name_in_english,
                'locale'      => "en"
            ],
            [  'sector_name' => $request->source_name_in_arabic,
                'locale'      => "ar"
            ],
            [  'sector_name' => $request->source_name_in_french,
                'locale'      => "fr"
            ],
        ];

        $sector = new Source();
        $sector->display_order = $request->display_order;
        $sector->status = isset($request->status)?1:0;
        $sector->created_by = Auth::user()->id;
        $sector->updated_by = Auth::user()->id;
        $result = $sector->save();

         foreach($sector_data as $key => $value) {
            $sector_tanslation = new SourceTranslate();
            $sector_tanslation->name = $value['sector_name'];
            $sector_tanslation->source_id = $sector->id;
            $sector_tanslation->locale = $value['locale'];
            $sector_tanslation->save();
        }
        if($result) {
            return redirect('admin/manage-source')->with('success', 'Source added succsessfully.');
        }
    }

    public function edit($id)
    {
        $source = Source::findOrFail($id);
        // Setting the translated fields to edit
        foreach ($source->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $source->source_name_in_english = $translate->name ;
                    break;
                case 'fr':
                    $source->source_name_in_french = $translate->name ;
                    break;
                case 'ar':
                    $source->source_name_in_arabic = $translate->name ;
                    break;
            }
        }
        $defaultDisplayOrder = $id;
        return view('admin.source.edit', compact('source','defaultDisplayOrder'));
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
            'source_name_in_english'    => 'required',
            'source_name_in_arabic'     => 'required',
            'source_name_in_french'     => 'required',
            'display_order'             =>'required',
        ]);

        $sector = source::findOrFail($id);
        $sector->display_order = $request->display_order;
        $sector->status = isset($request->status)?1:0;
        $sector->created_by = Auth::user()->id;
        $sector->updated_by = Auth::user()->id;
        $result = $sector->Update();

        $trans_sectors = [
            'en' => [
                "name"  => $request->source_name_in_english,
            ],
            'fr' => [
                "name"  => $request->source_name_in_french,
            ],
            'ar' => [
                "name"  => $request->source_name_in_arabic,
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            SourceTranslate::where(
                [
                    [
                        'source_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_sectors[$localeCode]);
        }
        if($result) {
            return redirect('admin/manage-source')->with('success', 'Source updated successfully.');
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
        $source= Source::with('localeAll')->find($id);
        $source->localeAll()->delete();
        $source->delete();
        $request->session()->flash('success', 'Source deleted successfully.');
        return redirect()->route('manage-source.index');
    }
}
