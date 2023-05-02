<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use DataTables;
use App\Models\Product;
use App\Models\ProductTranslate;
use Auth;
use DB;
class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list');
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the reProduct.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
    	if($request->ajax()){
            $product = Product::with('localeAll');
             return Datatables::of($product)
                    ->addIndexColumn()
                    ->addColumn('name', function($product){
                        foreach($product->localeAll as $product_data) {
                            if($product_data->locale == "en") {
                                $product_name = $product_data->name;
                            }
                        }
                        return isset($product_name)?$product_name:"";
                    })
                    ->addColumn('action', function($product){ 
                        if (\Auth::user()->can('product-edit')) {
                            $editBtn = '<a href="' . route('manage-product.edit', [$product->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                        } else {
                            $editBtn = '';
                        }
                        if (\Auth::user()->can('product-delete')) {
                            $deleteBtn = '<a href="javascript:void(0)" data-href="' . route('manage-product.destroy', [$product->id]) . '" rel="tooltip" title="Delete" class="delete_product_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>';
                        }else {
                            $deleteBtn ='';
                        }
                             return $editBtn.$deleteBtn;
                     })
                     ->editColumn('status', function($product){
                         if($product->status == 1){
                             $status = '<span class="label label-lg font-weight-bold label-light-primary label-inline">Active</span>';
                             return $status;
                         }else{
                             $status = '<span class="label label-inline label-light-danger font-weight-bold">Inactive</span>';
                             return $status;
                         }
                     })
                     ->editColumn('created_at', function ($product) {
                        return [
                           'display' => e($product->created_at->format('m/d/Y')),
                           'timestamp' => $product->created_at->timestamp
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
    	return view('admin.product.index');
    }

     /**
     * Show the form for creating a new reProduct.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $defaultDisplayOrder = Product::count('id');
        $defaultDisplayOrder++;

        return view('admin.product.create', compact('defaultDisplayOrder'));
    }

    /**
     * Store a newly created reProduct in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name_in_english'    => 'required',
            'product_name_in_arabic'     => 'required',
            'product_name_in_french'     => 'required',
            'display_order'             =>'required|numeric',
        ]);


        $product_data = [
            [  'product_name' => $request->product_name_in_english,
                'locale'      => "en"
            ],
            [  'product_name' => $request->product_name_in_arabic,
                'locale'      => "ar"
            ],
            [  'product_name' => $request->product_name_in_french,
                'locale'      => "fr"
            ],
        ];

        $product = new Product();
        $product->display_order = $request->display_order;
        $product->status = isset($request->status)?1:0;
        $result = $product->save();

        Product::where('display_order','>=',$request->display_order)
                                ->where('id','!=',$product->id)
                                ->update(['display_order' => DB::raw('display_order + 1')]);
                                
        setDisplayOrder('products');

        foreach($product_data as $key => $value) {
            $product_tanslation = new ProductTranslate();
            $product_tanslation->name = $value['product_name'];
            $product_tanslation->product_id = $product->id;
            $product_tanslation->locale = $value['locale'];
            $product_tanslation->save();
        }
        if($result) {
            return redirect('admin/manage-product')->with('success', 'Product added succsessfully.');
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        // Setting the translated fields to edit
        foreach ($product->localeAll as $translate) {

            switch ($translate->locale) {
                case 'en':
                    $product->product_name_in_english = $translate->name ;
                    break;
                case 'fr':
                    $product->product_name_in_french = $translate->name ;
                    break;
                case 'ar':
                    $product->product_name_in_arabic = $translate->name ;
                    break;
            }
        }
        $defaultDisplayOrder = $id;
        return view('admin.product.edit', compact('product','defaultDisplayOrder'));
    }

    /**
     * Update the specified reProduct in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'product_name_in_english'    => 'required',
            'product_name_in_arabic'     => 'required',
            'product_name_in_french'     => 'required',
            'display_order'             =>'required',
        ]);

        $product = Product::findOrFail($id);
        $product->display_order = $request->display_order;
        $product->status = isset($request->status)?1:0;
        $result = $product->Update();

        Product::where('display_order','>=',$request->display_order)
                ->where('id','!=',$product->id)
                ->update(['display_order' => DB::raw('display_order + 1')]);

        setDisplayOrder('products');
        

        $trans_products = [
            'en' => [
                "name"  => $request->product_name_in_english,
            ],
            'fr' => [
                "name"  => $request->product_name_in_french,
            ],
            'ar' => [
                "name"  => $request->product_name_in_arabic,
            ],
        ];
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            ProductTranslate::where(
                [
                    [
                        'Product_id', '=', $id
                    ],
                    [
                        'locale', '=', $localeCode
                    ]
                ])
                ->update($trans_products[$localeCode]);
        }
        if($result) {
            return redirect('admin/manage-product')->with('success', 'Product updated successfully.');
        }
    }

     /**
     * Remove the specified reProduct from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request,$id)
    {
        $Product= Product::with('localeAll')->find($id);
        $Product->localeAll()->delete();
        $Product->delete();
        $request->session()->flash('success', 'Product deleted successfully.');
        return redirect()->route('manage-product.index');
    }
}