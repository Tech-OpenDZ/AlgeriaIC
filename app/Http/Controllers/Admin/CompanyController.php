<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Services\Slug;
use App\Models\Company;
use App\Models\Product;
use App\Models\ProductTranslate;
use App\Models\ProductImage;
use App\Models\CompanyTranslate;
use App\Models\Contact;
use App\Models\ContactTranslate;
use App\Models\ActivityCode;
use Auth;
use DB;
use LaravelLocalization;
use App\Models\Zone;
use App\Models\Sector;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Imports\CompanyImport;
use App\Imports\CompanyDataImport;
use App\Models\CompanyProduct;
use App\Models\CompanyProductImage;



class CompanyController extends Controller
{

    protected $slug;
    public function __construct()
    {
        $this->slug = new Slug();
        $this->middleware('permission:company-list');
        $this->middleware('permission:company-create', ['only' => ['create','store']]);
        $this->middleware('permission:company-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:company-delete', ['only' => ['destroy']]);
    }

	 public function index(Request $request)
    {
        if ($request->ajax()) {
            $company = Company::with('localeAll');
            // echo "<pre>";print_r($company);exit();
            return Datatables::of($company)
                ->addColumn('company_name', function($company){
                    foreach ($company->localeAll as $company_data) {
                        if($company_data->locale == 'en'){
                            $company_name = $company_data->company_name;
                            return $company_name;
                        }
                        if($company_data->locale == 'ar'){
                            $company_name = $company_data->company_name;
                            return $company_name;
                        }
                        if($company_data->locale == 'fr'){
                            $company_name = $company_data->company_name;
                            return $company_name;
                        }
                    }
                })
                ->editColumn('is_approved',function($company){
                     if($company->is_approved == 1){
                        $is_approved = '<span class="label label-inline label-light-primary font-weight-bold">Approved</span>';
                        return $is_approved;
                     }else{
                        $is_approved = '<span class="label label-lg font-weight-bold label-light-danger label-inline">Pending</span>';
                        return $is_approved;
                     }
                })
                ->editColumn('status',function($company){
                     if($company->status == 1){
                        $status = '<span class="label label-inline label-light-primary font-weight-bold">Active</span>';
                        return $status;
                     }else{
                        $status = '<span class="label label-lg font-weight-bold label-light-danger label-inline">Inactive</span>';
                        return $status;
                     }
                })
                ->editColumn('created_at', function ($company) {
                    return [
                       'display' => e($company->updated_at->format('m/d/Y')),
                       'timestamp' => $company->updated_at->timestamp
                    ];
                })
                ->addColumn('action', function($company){
                    if (\Auth::user()->can('company-edit')) { 
                        $editBtn = '<a href="' . route('manage-company.edit', [$company->id]) . '" title="edit"><i class="fas fa-edit" aria-hidden="true" style="color: #3699FF;"></i></a>&nbsp';
                    } else {
                        $editBtn = '';
                    }
                    if (\Auth::user()->can('company-delete')) { 
                        $deleteBtn ='<a href="javascript:void(0)" data-href="' . route('manage-company.destroy', [$company->id]) . '" rel="tooltip" title="Delete" class="delete_company_btn"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>'; 
                    } else {
                        $deleteBtn = '';
                    }
                    return $editBtn.$deleteBtn;
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->get('status'));
                    }
                    if ($request->get('approval') == '0' || $request->get('approval') == '1') {
                        $instance->where('is_approved', $request->get('approval'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->whereHas('localeAll', function($w) use($request){
                            $search = $request->get('search');
                            $w->where('company_name', 'LIKE', "%$search%")
                              ->orWhere('email', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action','is_approved','status'])
                ->make(true);

        }

        return view('admin.company.index');
    }

    public function create(){
        $contact_view = view('admin.company.contact')->render();

        //author : prathamesh
        $sectors = Sector::all();
        $sector_arr = new \stdClass();
        foreach ($sectors as $sector) {
            foreach ($sector->localeAll as $translate) {
                if ($translate->locale === 'en') {
                    $sector_arr->{$translate->sector_id} = $translate->name;
                }
            }
        }
        $selected_sectors = null;

        $zones = Zone::all();
        $zone_arr = new \stdClass();

        foreach ($zones as $zone) {
            foreach ($zone->localeAll as $translate) {
                if ($translate->locale === 'en') {
                    $zone_arr->{$translate->zone_id} = $translate->name;
                }
            }
        }
        $selected_zones = null;

        $activity_codes = ActivityCode::all();
        $activity_codes_arr = new \stdClass();

        foreach ($activity_codes as $activity_code) {
            $activity_codes_arr->{$activity_code->id} = $activity_code->activity_code;
        }
        $selected_activated_codes = null; 

        $products = Product::all();
        $product_arr = new \stdClass();
        $product_arr->{0} = "-- Select --";

        foreach ($products as $product) {
            foreach ($product->localeAll as $translate) {
                if ($translate->locale === 'en') {
                    $product_arr->{$translate->product_id} = $translate->name;
                }
            }
        }

        //Ends
        return view('admin.company.create',compact('contact_view', 'zone_arr','selected_zones', 'sector_arr', 'selected_sectors', 'activity_codes_arr', 'selected_activated_codes','product_arr'));
    }
// 
    public function store(Request $request) { 
        $data = $request->all();

        // dd($data);
        //return $data;
        $rules = [
            'company_logo'              => 'required|image|mimes:jpeg,png,jpg',
            'company_name_in_english'   => 'required',
            'company_name_in_arabic'    => 'required',
            'company_name_in_french'    => 'required',
            'creation_date'             => 'required',
            'email'                     => 'required',
            'telephone'                 => 'required|numeric',
            'address_in_english'        => 'required',
            'address_in_arabic'         => 'required',
            'address_in_french'         => 'required',
            'contact_name_in_english'   => 'required|array|min:1',
            'contact_name_in_english.0' => 'required|string|min:1',
            'contact_name_in_arabic'    => 'required|array|min:1',
            'contact_name_in_arabic.0'   => 'required|string|min:1',
            'contact_name_in_french'   => 'required|array|min:1',
            'contact_name_in_french.0'   => 'required|string|min:1',

            'job_in_english'   => 'required|array|min:1',
            'job_in_english.0' => 'required|string|min:1',
            'job_in_arabic'   => 'required|array|min:1',
            'job_in_arabic.0'   => 'required|string|min:1',
            'job_in_french'   => 'required|array|min:1',
            'job_in_french.0' => 'required|string|min:1',

            'mobile_number.0'   => 'required|numeric',
            'email_address.0'   => 'required|email',

            'sectors'                   => 'required|array|min:1',
            'zones'                     => 'required|array|min:1',
            'activity_codes'            => 'required|array|min:1',
        ];

         $customMessages = [
            'contact_name_in_english.0.required' => 'The contact name in english field is required.',
            'contact_name_in_arabic.0.required' => 'The contact name in arabic field is required.',
            'contact_name_in_french.0.required' => 'The contact name in french field is required.',
            'job_in_english.0.required' => 'The Job title in english field is required.',
            'job_in_arabic.0.required' => 'The job title in arabic field is required.',
            'job_in_french.0.required' => 'The Job title in french field is required.',
            'mobile_number.0.required' => 'The mobile number field is required.',
            'email_address.0.required' => 'The email  is required.'
        ];
        $this->validate($request, $rules, $customMessages);

        $contactId                = [];
        $contact_name_in_english  = [];
        $contact_name_in_arabic   = [];
        $contact_name_in_french   = [];
        $job_in_english           = [];
        $job_in_arabic            = [];
        $job_in_french            = [];
        $mobile_number            = [];
        $email_address            = [];
        $count_of_id =count($request->contact_id);


        if($count_of_id > 0){
            for($iteration = 0 ; $iteration < $count_of_id; $iteration++ ) {
                if (empty($request->contact_name_in_english[$iteration])) {
                    continue;
                }
                if (empty($request->contact_name_in_arabic[$iteration])) {
                    continue;
                }
                if (empty($request->contact_name_in_french[$iteration])) {
                    continue;
                }
                if (empty($request->email_address[$iteration])) {
                    continue;
                }
                if (empty($request->mobile_number[$iteration])) {
                    continue;
                }
                if (empty($request->job_in_english[$iteration])) {
                    continue;
                }
                if (empty($request->job_in_arabic[$iteration])) {
                    continue;
                }
                if (empty($request->job_in_french[$iteration])) {
                    continue;
                }

                $contactId[]               = $request->contact_id[$iteration];
                $contact_name_in_english[] = $request->contact_name_in_english[$iteration];
                $contact_name_in_arabic[]  = $request->contact_name_in_arabic[$iteration];
                $contact_name_in_french[]  = $request->contact_name_in_french[$iteration];
                $job_in_english[] = $request->job_in_english[$iteration];
                $job_in_arabic[]  = $request->job_in_arabic[$iteration];
                $job_in_french[]  = $request->job_in_french[$iteration];
                $mobile_number[]  = $request->mobile_number[$iteration];
                $email_address[]  = $request->email_address[$iteration];
            }
        }

        $request->contact_id                = $contactId;
        $request->contact_name_in_english   = $contact_name_in_english;
        $request->contact_name_in_arabic    = $contact_name_in_arabic;
        $request->contact_name_in_french    = $contact_name_in_french;
        $request->email_address             = $email_address;
        $request->mobile_number             = $mobile_number;
        $request->job_in_english            = $job_in_english;
        $request->job_in_arabic             = $job_in_arabic;
        $request->job_in_french             = $job_in_french;

        DB::beginTransaction();
            $company_data = [
                [
                    'company_name'      => $request->company_name_in_english,
                    'address'           => $request->address_in_english,
                    'locale'            => "en"
                ],
                [
                    'company_name'      => $request->company_name_in_arabic,
                    'address'           => $request->address_in_arabic,
                    'locale'            => "ar"
                ],
                [
                    'company_name'      => $request->company_name_in_french,
                    'address'        => $request->address_in_french,
                    'locale'            => "fr"
                ],
            ];
            $loop = 0;
            foreach($request->contact_name_in_english as $translate) {
                $contact_data[$loop] =
                [
                    [
                        'contact_name' => $request->contact_name_in_english[$loop],
                        'jobtitle' => $request->job_in_english[$loop],
                        'locale'        => "en",
                    ],
                    [
                        'contact_name' => $request->contact_name_in_arabic[$loop],
                        'jobtitle' => $request->job_in_arabic[$loop],
                        'locale'        => "ar",
                    ],
                    [
                        'contact_name' => $request->contact_name_in_french[$loop],
                        'jobtitle' => $request->job_in_french[$loop],
                        'locale'        => "fr",
                    ],
                ];
                $loop++;
            }
            $productloop = 0;
            $product_data = [];
            // foreach($request->product_name_in_english as $translate) {
            //     if(!empty($request->product_name_in_english[$productloop]) || !empty($request->product_name_in_arabic[$productloop]) || !empty($request->product_name_in_french[$productloop]) || $request->product_images){
            //         $product_data[$productloop] =
            //         [
            //             [
            //                 'description' => $request->product_name_in_english[$productloop],
            //                 'locale'        => "en",
            //             ],
            //             [
            //                 'description' => $request->product_name_in_arabic[$productloop],
            //                 'locale'        => "ar",
            //             ],
            //             [
            //                 'description' => $request->product_name_in_french[$productloop],
            //                 'locale'        => "fr",
            //             ],
            //         ];
            //         $productloop++;
            //     }

            // }
            // echo "<pre>"; print_r($product_data);exit();
        // try {
            $company = new Company();
            if ($request->hasFile('company_logo')) {
                $companyLogo = $request->company_logo;
                $companyLogoSaveAsName = time(). "_company_logo." . $companyLogo->getClientOriginalExtension();
                $upload_path = storage_path('app/public/uploads/company_logo/');
                $company_image_url = $companyLogoSaveAsName;
                $success = $companyLogo->move($upload_path, $companyLogoSaveAsName);
                $company->company_logo     = $companyLogoSaveAsName;
            }
            $company->created_by = Auth::user()->id;
            $company->updated_by = Auth::user()->id;
            $company->page_key         = $this->slug->createSlug('company',$request->company_name_in_english);
            $company->status = isset($request->status) ? 1 : 0;
            $company->is_featured = isset($request->is_featured) ? 1 : 0;
            $company->is_sponsored = isset($request->is_sponsored) ? 1 : 0;
            $company->is_approved = isset($request->is_approved) ? 1 : 0;
            $company->sponsored_rating = isset($request->sponsored_rating) ? $request->sponsored_rating : 0;
            $company->telephone = $request->telephone;
            $company->creation_date = $request->creation_date;
            $company->email = $request->email;
            $company->fax = $request->fax;
            $company->facebook = $request->facebook;
            $company->twitter = $request->twitter;
            $company->instagram = $request->instagram;
            $company->linkdeln = $request->linkdeln;
            $company->capital = $request->capital;
            $company->staff = $request->staff;
            $company->youtube = $request->youtube;
            $company->website = $request->website;
            $company->net_sales_2018 = $request->net_sales_2018;
            $company->net_sales_2019 = $request->net_sales_2019;
            $company->terms_accepted = 1;
            $result = $company->save();

            foreach($company_data as $key => $value) {
                $company_tanslation = new CompanyTranslate();
                $company_tanslation->company_name = $value['company_name'];
                $company_tanslation->address = $value['address'];
                $company_tanslation->company_id = $company->id;
                $company_tanslation->locale = $value['locale'];
                $company_tanslation->save();
            }

	        // echo "<pre>";print_r($data);exit();
	        $image_array = [];
            $ProductImage = $request->product_images;
            if(isset($request->product_images)) { 
                foreach ($request->product_images as $key => $ProductIm) {
                    $expolde_removedImage = explode(",", $request->product_image_removed[$key]);
                    foreach ($ProductIm as $prduct_key => $value) {
                        $Image_name = $value->getClientOriginalName();
                        if(!in_array($Image_name, $expolde_removedImage)){
                            $image_array[$key][] =$value;
                        }	
                    }
                } 
            }
            if($request->product[0] != 0) {
                $loop = 0;
                foreach($request->product as $product){
                    $companyProduct = new CompanyProduct();
                    $companyProduct->company_id = $company->id;
                    $companyProduct->product_id = $product;
                    $companyProduct->save();

                    if(($request->product_images)){
                        foreach ($image_array[$loop] as $imageKey => $imageValue) {
                            $productImage = $imageValue;
                            $productImageSaveAsName = rand(). "_product_image." . $productImage->getClientOriginalExtension();
                            $upload_path = storage_path('app/public/uploads/product_image/');
                            $success = $productImage->move($upload_path, $productImageSaveAsName);
                            $product_images = new CompanyProductImage();
                            $product_images->company_product_id  = $companyProduct->id;
                            $product_images->image     = $productImageSaveAsName;
                            $product_images->save();
                        }
                    }
                    $loop ++;
                } 
            }
            $count = 0;
            foreach($request->email_address as $contacts){
                $contact = new Contact();
                $contact->company_id = $company->id;
                $contact->email = $contacts;
                $contact->mobile_number = $request->mobile_number[$count];
                $contact->save();

                foreach($contact_data[$count] as $key => $value){
                    $contact_translate = new ContactTranslate();
                    $contact_translate->contact_id = $contact->id;
                    $contact_translate->name = $value['contact_name'];
                    $contact_translate->locale = $value['locale'];
                    $contact_translate->jobtitle = $value['jobtitle'];
                    $contact_translate->save();
                }
                $count ++;

             }

            // code by prathamesh
            // sync zones,sectors,activity codes
            $company->sectors()->sync($request->sectors);
            $company->zones()->sync($request->zones);
            $company->activity_codes()->sync($request->activity_codes);
            // prathamesh code ends

            if($result) {
                DB::commit();
                return redirect('admin/manage-company')->with('success', 'Company added succsessfully.');
            } else {
                DB::rollback();
                return redirect('admin/manage-company')->with('error', 'Something went wrong!');
            }


    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */

    public function edit($id){
        $company = Company::with('localeAll','products','products.productImages','contacts','contacts.localeAll')->findOrFail($id);
        // echo "<pre>";print_r($company['contacts']);exit();
        foreach ($company->localeAll as $translate) {
            switch ($translate->locale) {
                case 'en':
                    $company->company_name_in_english = $translate->company_name;
                    $company->address_in_english = $translate->address;
                    break;
                case 'ar':
                    $company->company_name_in_arabic = $translate->company_name;
                    $company->address_in_arabic = $translate->address;
                    break;
                case 'fr':
                    $company->company_name_in_french = $translate->company_name;
                    $company->address_in_french = $translate->address;
                    break;

            }

        }
        // echo "<pre>";print_r($select_codes);exit();

        // author -> prathamesh
        // get sectors & zones & activity _code
        $selected_sectors = null;
        $selected_zones = null;
        foreach ($company->sectors as $sector) {
            $selected_sectors[] = (string)$sector->id;
        }

        foreach ($company->zones as $zone) {
            $selected_zones[] = (string)$zone->id;
        }

        $sectors = Sector::all();
        $sector_arr = new \stdClass();
        foreach ($sectors as $sector) {
            foreach ($sector->localeAll as $translate) {
                if ($translate->locale === 'en') {
                    $sector_arr->{$translate->sector_id} = $translate->name;
                }
            }
        }

        $zones = Zone::all();
        $zone_arr = new \stdClass();

        foreach ($zones as $zone) {
            foreach ($zone->localeAll as $translate) {
                if ($translate->locale === 'en') {
                    $zone_arr->{$translate->zone_id} = $translate->name;
                }
            }
        }

        $activity_codes = ActivityCode::all();
        $activity_codes_arr = new \stdClass();

        $selected_activated_codes = null;
        foreach ($company->activity_codes as $activity_code) {
            $selected_activated_codes[] = (string)$activity_code->id;
        }

        foreach ($activity_codes as $activity_code) {
            $activity_codes_arr->{$activity_code->id} = $activity_code->activity_code;
        } 

        $products = Product::all();
        $product_arr = new \stdClass();
        $product_arr->{0} = "-- Select --";

        foreach ($products as $product) {
            foreach ($product->localeAll as $translate) {
                if ($translate->locale === 'en') {
                    $product_arr->{$translate->product_id} = $translate->name;
                }
            }
        }
        // prathamesh code

        $contact_view = view('admin.company.contact')->render();
        return view('admin.company.edit', compact('company','contact_view', 'sector_arr', 'selected_sectors', 'zone_arr', 'selected_zones', 'activity_codes_arr', 'selected_activated_codes','product_arr'));
    }

    public function addMore(Request $request){
        if($request->ajax() && !empty($request->id)){
            $products = Product::all();
            $product_arr = new \stdClass();
            $product_arr->{0} = "-- Select --";
            foreach ($products as $product) {
                foreach ($product->localeAll as $translate) {
                    if ($translate->locale === 'en') {
                        $product_arr->{$translate->product_id} = $translate->name;
                    }
                }
            } 

            $id = $request->id;
            $view = view("admin.company.product",compact('id','product_arr'))->render();
            return response()->json(['html'=>$view]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $rules = [
            'company_logo'              => 'nullable|image|mimes:jpeg,png,jpg',
            'company_name_in_english'   => 'required',
            'company_name_in_arabic'    => 'required',
            'company_name_in_french'    => 'required',
            'creation_date'             => 'required',
            'email'                     => 'required',
            'telephone'                 => 'required',
            'address_in_english'        => 'required',
            'address_in_arabic'         => 'required',
            'address_in_french'         => 'required',
            'contact_name_in_english'   => 'required|array|min:1',
            'contact_name_in_english.0' => 'required|string|min:1',
            'contact_name_in_arabic'   => 'required|array|min:1',
            'contact_name_in_arabic.0'   => 'required|string|min:1',
            'contact_name_in_french'   => 'required|array|min:1',
            'contact_name_in_french.0'   => 'required|string|min:1',

            'job_in_english'   => 'required|array|min:1',
            'job_in_english.0' => 'required|string|min:1',
            'job_in_arabic'   => 'required|array|min:1',
            'job_in_arabic.0'   => 'required|string|min:1',
            'job_in_french'   => 'required|array|min:1',
            'job_in_french.0' => 'required|string|min:1',

            'mobile_number.0'   => 'required|numeric',
            'email_address.0'   => 'required|email',
        ];

         $customMessages = [
            'contact_name_in_english.0.required' => 'The contact name in english field is required.',
            'contact_name_in_arabic.0.required' => 'The contact name in arabic field is required.',
            'contact_name_in_french.0.required' => 'The contact name in french field is required.',
            'job_in_english.0.required' => 'The Job title in english field is required.',
            'job_in_arabic.0.required' => 'The job title in arabic field is required.',
            'job_in_french.0.required' => 'The Job title in french field is required.',
            'mobile_number.0.required' => 'The mobile number field is required.',
            'email_address.0.required' => 'The email  is required.'
        ]; 

        $this->validate($request, $rules, $customMessages);

        $contactId                = [];
        $contact_name_in_english  = [];
        $contact_name_in_arabic   = [];
        $contact_name_in_french   = [];
        $job_in_english           = [];
        $job_in_arabic            = [];
        $job_in_french            = [];
        $mobile_number            = [];
        $email_address            = [];
        $count_of_id              = count($request->contact_id);
       
        if($count_of_id > 0){     

            for($iteration = 0 ; $iteration < $count_of_id; $iteration++ ) { 

                if (empty($request->contact_name_in_english[$iteration])) { 
                    continue;
                }
                if (empty($request->contact_name_in_arabic[$iteration])) {
                    continue;
                }
                if (empty($request->contact_name_in_french[$iteration])) {
                    continue;
                }
                if (empty($request->email_address[$iteration])) {
                    continue;
                }
                if (empty($request->mobile_number[$iteration])) {
                    continue;
                }
                if (empty($request->job_in_english[$iteration])) {
                    continue;
                }
                if (empty($request->job_in_arabic[$iteration])) {
                    continue;
                }
                if (empty($request->job_in_french[$iteration])) {
                    continue;
                }

                $contactId[]               = $request->contact_id[$iteration];
                $contact_name_in_english[] = $request->contact_name_in_english[$iteration];
                $contact_name_in_arabic[]  = $request->contact_name_in_arabic[$iteration];
                $contact_name_in_french[]  = $request->contact_name_in_french[$iteration];
                $job_in_english[] = $request->job_in_english[$iteration];
                $job_in_arabic[]  = $request->job_in_arabic[$iteration];
                $job_in_french[]  = $request->job_in_french[$iteration];
                $mobile_number[]  = $request->mobile_number[$iteration];
                $email_address[]  = $request->email_address[$iteration];
            }

        }
        $request->contact_id                = $contactId;
        $request->contact_name_in_english   = $contact_name_in_english;
        $request->contact_name_in_arabic    = $contact_name_in_arabic;
        $request->contact_name_in_french    = $contact_name_in_french;
        $request->email_address             = $email_address;
        $request->mobile_number             = $mobile_number;
        $request->job_in_english            = $job_in_english;
        $request->job_in_arabic             = $job_in_arabic;
        $request->job_in_french             = $job_in_french;

        DB::beginTransaction();
        try { 
            $company = Company::findOrFail($id); 
            if ($request->hasFile('company_logo')) {
                $companyLogo = $request->company_logo;
                $companyLogoSaveAsName = time(). "_company_logo." . $companyLogo->getClientOriginalExtension();
                $upload_path = storage_path('app/public/uploads/company_logo/');
                $company_image_url = $companyLogoSaveAsName;
                $success = $companyLogo->move($upload_path, $companyLogoSaveAsName);
                $company->company_logo     = $companyLogoSaveAsName;
            }

            // echo "<pre>";print_r(Auth::user()->id);exit();
            $company->created_by = Auth::user()->id;
            $company->updated_by = Auth::user()->id;
            
            if ($request->englishTitle != $request->company_name_in_english) {
                $company->page_key = $this->slug->createSlug('company',$request->company_name_in_english);
            }
            $company->status = isset($request->status) ? 1 : 0;
            $company->is_featured = isset($request->is_featured) ? 1 : 0;
            $company->is_sponsored = isset($request->is_sponsored) ? 1 : 0;
            $company->is_approved = isset($request->is_approved) ? 1 : 0;
            $company->sponsored_rating = isset($request->sponsored_rating) ? $request->sponsored_rating : 0;
            $company->telephone = $request->telephone;
            $company->creation_date = $request->creation_date;
            $company->email = $request->email;
            $company->fax = $request->fax;
            $company->facebook = $request->facebook;
            $company->twitter = $request->twitter;
            $company->instagram = $request->instagram;
            $company->linkdeln = $request->linkedin;
            $company->capital = $request->capital;
            $company->staff = $request->staff;
            $company->youtube = $request->youtube;
            $company->website = $request->website;
            $company->net_sales_2018 = $request->net_sales_2018;
            $company->net_sales_2019 = $request->net_sales_2019;
            $company->terms_accepted = 1;
            $result = $company->update();

            $trans_events = [
                'en' => [
                    "company_name" => $request->company_name_in_english,
                    "address"   => $request->address_in_english,
                ],
                'fr' => [
                    "company_name"         => $request->company_name_in_french,
                    "address"   => $request->address_in_french,
                ],
                'ar' => [
                    "company_name"         => $request->company_name_in_arabic,
                    "address"   => $request->address_in_arabic,
                ],
            ];

            foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                CompanyTranslate::where(
                    [
                        [
                            'company_id', '=', $id
                        ],
                        [
                            'locale', '=', $localeCode
                        ]
                    ])
                    ->update($trans_events[$localeCode]);
            }
            $loop = 0;

            foreach($request->contact_name_in_english as $translate) {
                $contact_data[$loop] =
                [
                    [
                        'contact_name' => $request->contact_name_in_english[$loop],
                        'jobtitle' => $request->job_in_english[$loop],
                        'locale'        => "en",
                    ],
                    [
                        'contact_name' => $request->contact_name_in_arabic[$loop],
                        'jobtitle' => $request->job_in_arabic[$loop],
                        'locale'        => "ar",
                    ],
                    [
                        'contact_name' => $request->contact_name_in_french[$loop],
                        'jobtitle' => $request->job_in_french[$loop],
                        'locale'        => "fr",
                    ],
                ];
                $loop++;
            }
            $loop = 0;

            foreach($request->contact_id as $contact_id){
                 if($contact_id != null) {
                    $contact = Contact::with('localeAll')->findOrFail($contact_id);
                    $trans_contact = [
                        'en' => [
                            "name" => $request->contact_name_in_english[$loop],
                            'jobtitle' => $request->job_in_english[$loop],

                        ],
                        'fr' => [
                            "name" =>$request->contact_name_in_french[$loop],
                            'jobtitle' => $request->job_in_french[$loop],

                        ],
                        'ar' => [
                            "name" =>$request->contact_name_in_arabic[$loop],
                            'jobtitle' => $request->job_in_arabic[$loop],

                        ],
                    ];
                
                $contact->email = $request->email_address[$loop];
                $contact->mobile_number = $request->mobile_number[$loop];
                $contact->update();

                foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                        ContactTranslate::where(
                            [
                                [
                                    'contact_id', '=', $contact_id
                                ],
                                [
                                    'locale', '=', $localeCode
                                ]
                            ])
                            ->update($trans_contact[$localeCode]);
                    }
                }else if($contact_id == null){
                    $contact = new Contact();
                    $contact->company_id = $company->id;
                    $contact->email = $request->email_address[$loop];
                    $contact->mobile_number = $request->mobile_number[$loop];
                    $contact->save();

                    foreach($contact_data[$loop] as $key => $value){
                        $contact_translate = new ContactTranslate();
                        $contact_translate->contact_id = $contact->id;
                        $contact_translate->name = $value['contact_name'];
                        $contact_translate->locale = $value['locale'];
                        $contact_translate->jobtitle = $value['jobtitle'];
                        $contact_translate->save();
                    }
                 }
                $loop++;
            } 

            // dd($request->product);
            $image_array = [];
            $ProductImage = $request->product_images;
            if(isset($request->product_images)) { 
                foreach ($request->product_images as $key => $ProductIm) {
                    $expolde_removedImage = explode(",", $request->product_image_removed[$key]);
                    foreach ($ProductIm as $prduct_key => $value) {
                        $Image_name = $value->getClientOriginalName();
                        if(!in_array($Image_name, $expolde_removedImage)){
                            $image_array[$key][] =$value;
                        }	
                    }
                } 
            }
           if($request->product[0] != 0) {
                $loop = 0;
                foreach($request->product_id as $company_product_id){
                    if($company_product_id != null) {
                        $company_product = CompanyProduct::findOrFail($company_product_id);
                        $company_product->update(['product_id' => (int)$request->product[$loop]]);

                        if(array_key_exists ($company_product_id ,$image_array)){
                            foreach ($image_array[$company_product_id] as $imageKey => $imageValue) {
                                $productImage = $imageValue;
                                $productImageSaveAsName = rand(). "_product_image." . $productImage->getClientOriginalExtension();
                                $upload_path = storage_path('app/public/uploads/product_image/');
                                $success = $productImage->move($upload_path, $productImageSaveAsName);
                                $product_images = new CompanyProductImage();
                                $product_images->company_product_id  = $company_product_id;
                                $product_images->image     = $productImageSaveAsName;
                                $product_images->save();
                            }
                        }
                    }else{
                        $company_product = new CompanyProduct();
                        $company_product->company_id = $id;
                        $company_product->product_id = $request->product[$loop];
                        $company_product->save();

                        if(($image_array[$loop])){
                            foreach ($image_array[$loop] as $imageKey => $imageValue) {
                                $productImage = $imageValue;
                                $productImageSaveAsName = rand(). "_product_image." . $productImage->getClientOriginalExtension();
                                $upload_path = storage_path('app/public/uploads/product_image/');
                                $success = $productImage->move($upload_path, $productImageSaveAsName);
                                $product_images = new CompanyProductImage();
                                $product_images->company_product_id  = $company_product->id;
                                $product_images->image     = $productImageSaveAsName;
                                $product_images->save();
                            }
                        }
                    }
                    
                    $loop ++;
                } 
            }
            // code by prathamesh
            // sync zones,sectors,activity codes
            $company->sectors()->sync($request->sectors);
            $company->zones()->sync($request->zones);
            $company->activity_codes()->sync($request->activity_codes);
            // prathamesh code ends
            // dd($request->all());

            if($result) {

                DB::commit();
                return redirect('admin/manage-company')->with('success', 'Company updated successfully.');
            } else {
                DB::rollback();
                return redirect('admin/manage-company')->with('error', 'Something went wrong!');
            }

        }catch(\Exception $e) {
            return redirect()->route('manage-company.index')->with('error', json_encode($e->getMessage()));
        }

    }

    public function destroy(Request $request,$id){
        try {
            $company = Company::with('localeAll','products','products.productTranslate','products.productImages','contacts','contacts.localeAll')->find($id);
            if($company->company_logo = ""){
                try { 
                    unlink('storage/uploads/company_logo/'.$company->company_logo);
                } catch (\Throwable $th) {

                }
            }
           $company->localeAll()->delete();
            //  foreach($company->products as $products) {
            //     foreach ($products->product_images as $image) {
            //         echo "<pre>";print_r($image);exit();
            //         unlink('storage/uploads/product_image/'.$image['product_images']);
            //     }
            // }
             $company->products()->delete();
             $company->contacts()->delete();
             $company->delete();
            $request->session()->flash('success', 'Company deleted successfully.');
            return redirect()->route('manage-company.index');
        }catch (Exception $e) {
            return redirect()->route('manage-company.index')->with('error', json_encode($e->getMessage()));
        }

    }

    public function deleteProduct(Request $request){
        $data = $request->all();
        try {
            $product= Product::with('localeAll','product_images')->find($request->delete_product);
             foreach($product->product_images as $productImage) { 
                try { 
                    unlink('storage/uploads/product_image/'.$productImage->product_images);
                } catch (\Throwable $th) {

                }
            }
            $product->localeAll()->delete();
            $product->product_images()->delete();
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully.');
        }catch(\Exception $e) {
            return redirect()->route('manage-company.index')->with('error', json_encode($e->getMessage()));
        }
    }

    public function deleteContact(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);exit();
         try {
                $contact= Contact::with('localeAll')->find($request->delete_conatct);

                $contact->localeAll()->delete();
                $contact->delete();

                return redirect()->back()->with('success', 'Contact deleted successfully.');
         }catch(\Exception $e) {
            return redirect()->route('manage-company.index')->with('error', json_encode($e->getMessage()));
        }

    }

    public function deleteImage(Request $request){
        // dd($request->product_delete);
        $data = $request->all();
        try {
            $productImage= CompanyProductImage::find($request->product_delete);
            try { 
                unlink('storage/uploads/product_image/'.$productImage->image);
            } catch (\Throwable $th) {

                }
            $productImage->delete();

            return redirect()->back()->with('success', 'Product image deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('manage-company.index')->with('error', json_encode($e->getMessage()));
        }
    } 

    // return company import view
    public function import() {
        $error_msg = '';
        return view('admin.company.import',compact('error_msg'));
    } 

    // import company from excel
    public function storeCompany(Request $request)
    {
        $validatedData = $request->validate([
            'file'    => 'required']); 

        try {
            if($request->file('file')){
                $err_msg_array = [];
                $path = $request->file('file')->getRealPath();
                //Import Excel
                $company_import = new CompanyImport();
                $import_company_data =  Excel::toCollection($company_import, $request->file('file')); 
                
                $import_data_filter = array_filter($import_company_data->toArray());
                $array = [];
                $arr = []; 


                foreach($import_data_filter as $data_array) { 
                    
                    foreach($data_array as $data) { 

                        if($data['email'] == "") {
                            $company_id = company::get()->last()->id;
                            // $product = new Product();
                            // $product->company_id = $company_id; 
                            // $product->save();
                            // $translate_data_product = [ 
                            //     [
                            //         'product_id'      =>  $product->id,
                            //         'locale'          => 'en',
                            //         'description'    =>  $data['product_description_in_english'],
                            //     ],
                            //     [
                            //         'product_id'      =>  $product->id,
                            //         'locale'          => 'fr',
                            //         'description'    =>  $data['product_description_in_french'],
                            //     ],
                            //     [
                            //         'product_id'      =>  $product->id,
                            //         'locale'          => 'ar',
                            //         'description'    =>  $data['product_description_in_arabic'],
                            //     ]
                            // ];
                            // ProductTranslate::insert($translate_data_product);
                            $contact = new Contact();
                            $contact->company_id = $company_id;
                            $contact->email = $data['contact_email'];
                            $contact->mobile_number = $data['contact_mobile_number'];
                            $contact->save();
                            $translate_data_contact = [ 
                                [
                                    'contact_id'      =>  $contact->id,
                                    'locale'          => 'en',
                                    'name'            => $data['contact_name_in_english'],
                                    'jobtitle'        =>  $data['job_title_in_english'],
                                ],
                                [
                                    'contact_id'      =>  $contact->id,
                                    'locale'          => 'fr',
                                    'name'            => $data['contact_name_in_french'],
                                    'jobtitle'        =>  $data['job_title_in_french'],
                                ],
                                [
                                    'contact_id'      =>  $contact->id,
                                    'locale'          => 'ar',
                                    'name'            => $data['contact_name_in_arabic'],
                                    'jobtitle'        => $data['job_title_in_arabic'],
                                ]
                            ];
                            ContactTranslate::insert($translate_data_contact);

                            continue;
                        } 
                        $company = new Company();
                        $company->company_logo      = "";
                        $company->page_key          = "";
                        $company->creation_date     = isset($data['creation_date'])? $data['creation_date']:'';
                        $company->telephone         = isset($data['telephone'])? $data['telephone']:'';
                        $company->email             = isset($data['email'])? $data['email']:'';
                        $company->fax               = isset($data['fax'])? $data['fax']:'';
                        $company->website           = isset($data['website'])? $data['website']:'';
                        $company->facebook          = isset($data['facebook'])? $data['facebook']:'';
                        $company->youtube           = isset($data['youtube'])? $data['youtube']:'';
                        $company->instagram         = isset($data['instagram'])? $data['instagram']:'';
                        $company->twitter           = isset($data['twitter'])? $data['twitter']:'';
                        $company->linkdeln          = isset($data['linkedin'])? $data['linkedin']:'';
                        $company->capital           = isset($data['capital'])? $data['capital']:'';
                        $company->staff             = isset($data['staff'])? $data['staff']:'';
                        $company->net_sales_2018    = isset($data['net_sales_2018'])? $data['net_sales_2018']:'';
                        $company->net_sales_2019    = isset($data['net_sales_2019'])? $data['net_sales_2019']:'';
                        $company->terms_accepted    = 0;
                        $company->status            = 0;
                        $company->save();

                        $translate_data = [
                            [
                                'company_id'      =>  $company->id,
                                'locale'          => 'en',
                                'company_name'    =>  $data['company_name_in_english'],
                                'address'         =>  $data['company_address_in_english'],
                            ],
                            [
                                'company_id'      =>  $company->id,
                                'locale'          => 'fr',
                                'company_name'    =>  $data['company_name_in_french'],
                                'address'         =>  $data['company_address_in_french'],
                            ],
                            [
                                'company_id'      =>  $company->id,
                                'locale'          => 'ar',
                                'company_name'    =>  $data['company_name_in_arabic'],
                                'address'         =>  $data['company_address_in_arabic'],
                            ]
                        ];
                        CompanyTranslate::insert($translate_data);
                        // $product = new Product();
                        // $product->company_id = $company->id; 
                        // $product->save();
                        // $translate_data_product = [
                        //     [
                        //         'product_id'      =>  $product->id,
                        //         'locale'          => 'en',
                        //         'description'    =>  $data['product_description_in_english'],
                        //     ],
                        //     [
                        //         'product_id'      =>  $product->id,
                        //         'locale'          => 'fr',
                        //         'description'    =>  $data['product_description_in_french'],
                        //     ],
                        //     [
                        //         'product_id'      =>  $product->id,
                        //         'locale'          => 'ar',
                        //         'description'    =>  $data['product_description_in_arabic'],
                        //     ]
                        // ];
                        // ProductTranslate::insert($translate_data_product);
                        $contact = new Contact();
                        $contact->company_id = $company->id; 
                        $contact->email = $data['contact_email'];
                        $contact->mobile_number = $data['contact_mobile_number'];
                        $contact->save();
                        $translate_data_contact = [ 
                            [
                                'contact_id'      =>  $contact->id,
                                'locale'          => 'en',
                                'name'            => $data['contact_name_in_english'],
                                'jobtitle'        =>  $data['job_title_in_english'],
                            ],
                            [
                                'contact_id'      =>  $contact->id,
                                'locale'          => 'fr',
                                'name'            => $data['contact_name_in_french'],
                                'jobtitle'        =>  $data['job_title_in_french'],
                            ],
                            [
                                'contact_id'      =>  $contact->id,
                                'locale'          => 'ar',
                                'name'            => $data['contact_name_in_arabic'],
                                'jobtitle'        => $data['job_title_in_arabic'],
                            ]
                        ];
                        ContactTranslate::insert($translate_data_contact);

                    }

                }            

            } 
            return redirect()->route('manage-company.index')->with('success', 'Company imported successfully');

        } catch(\Throwable $th) {
            return redirect()->route('manage-company.index')->with('error', 'Something went wrong!'. $th->getMessage());
        }

    }
}
