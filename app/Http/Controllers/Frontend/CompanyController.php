<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Product;
use App\Models\ProductTranslate;
use App\Models\ProductImage;
use App\Models\CompanyTranslate;
use App\Models\Contact;
use App\Models\ContactTranslate;
use LaravelLocalization;
use DB;
use App\Models\ActivityCode;
use Auth;
use App\Models\CompanyProduct;
use App\Models\CompanyProductImage;

class CompanyController extends Controller
{
	private $removed_image_array;

    public function index()
    {
        return "test";
    }

    public function create(){

        $currentLocale = LaravelLocalization::getCurrentLocale();
		$user = Auth::guard('customer')->user();

		if(!$user->can('has-permission', ['business_directory_company_profile', $user])) {
			return redirect('upgrade-plan');
		}
		// activity code
		$activity_codes = ActivityCode::all();
		$activity_codes_arr = new \stdClass();

		foreach ($activity_codes as $activity_code) {
			$activity_codes_arr->{$activity_code->id} = $activity_code->activity_code;
        } 
        
		$selected_activated_codes = null;
        $products = Product::all();
        $product_arr= [];

        foreach ($products as $product) {
            foreach ($product->localeAll as $translate) {
                if ($translate->locale === $currentLocale) {
                    $product_arr[$translate->product_id] = $translate->name;
                }
            }
        }

		$sidebar_key = 'company';
		$contact_view = view('frontend.company.contact')->render();

    	return view('frontend.company.create',compact('product_arr','activity_codes_arr', 'selected_activated_codes','sidebar_key','contact_view'));
    }
    public function store(Request $request){

        $rules = [
            'company_logo'      => 'required|image|mimes:jpeg,png,jpg,gif|max:800',
            'company_name'      => 'required',
            'creation_date'     => 'required',
            'telephone'         => 'required',
            'email'             => 'required',
            'address'           => 'required',
            'name.0'            => 'required|min:1',
            'mobile_number.0'   => 'required|min:1',
            'jobtitle.0'        => 'required|min:1',
            'email_address.0'   => 'required|min:1',
            'activity_codes'    => 'required|array|min:1',
        ];
        $messages = [
            'name.0.required'           => __('company.contactNameReq'),
            'mobile_number.0.required'  => __('company.contactEmailReq'),
            'jobtitle.0.required'       => __('company.contactMobileReq'),
            'email_address.0.required'  => __('company.contactJobTitleReq'),
    	];
        $attributes = [
            'company_logo'      => __('company.company_logo'),
            'company_name'      => __('company.company_name'),
            'creation_date'     => __('company.creation_date'),
            'telephone'         => __('company.telephone'),
            'email'             => __('company.email'),
            'address'           => __('company.address'),
            'name.0'            => __('company.name'),
            'mobile_number.0'   => __('company.mobile_number'),
            'jobtitle.0'        => __('company.jobtitle'),
            'email_address.0'   => __('company.email_address'),
            'activity_codes'    => __('company.activity_codes'),
        ];
        $this->validate($request, $rules, $messages, $attributes);

        /**
         * Getting the data to insert in database
        */
        $customerId = Auth::guard('customer')->user()->id;
        // $currentLocale = LaravelLocalization::getCurrentLocale();

        /**
         * Creating Company
        */
        $company = new Company();

        /**
         * If there is logo file then upload
        */
        if ($request->hasFile('company_logo')) {
            $logoImage = $request->file('company_logo');
            $logoImageSaveAsName = time() . "_logo." . $logoImage->getClientOriginalExtension();
            $upload_path = storage_path('app/public/uploads/company_logo/');
            $logo_image_url = $logoImageSaveAsName;
            if($request->logo){
                if(file_exists($upload_path.$request->logo)) {
                    unlink($upload_path.$request->logo);
                }
            }
            $success = $logoImage->move($upload_path, $logoImageSaveAsName);
            $company->company_logo = $logoImageSaveAsName;
        }

        /**
         * Setting data to create company
        */
        $company->page_key          = '';
        $company->status            = isset($request->status)?1:0;
        $company->customer_id       = $customerId;
        $company->telephone         = $request->telephone;
        $company->creation_date     = $request->creation_date;
        $company->email             = $request->email;
        $company->fax               = $request->fax;
        $company->facebook          = $request->facebook;
        $company->twitter           = $request->twitter;
        $company->instagram         = $request->instagram;
        $company->linkdeln          = $request->linkdeln;
        $company->capital           = $request->capital;
        $company->staff             = $request->staff;
        $company->youtube           = $request->youtube;
        $company->website           = $request->website;
        $company->net_sales_2018    = $request->net_sales_2018;
        $company->net_sales_2019    = $request->net_sales_2019;
        $company->terms_accepted    = 1;

        $result = $company->save();

        /**
         * Inserting translate date of company in current language
        */
        
        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            
            $company_translate = new CompanyTranslate();
    
            $company_translate->company_id      = $company->id;
            $company_translate->company_name    = $request->company_name;
            $company_translate->address         = $request->address;
            $company_translate->locale          = $localeCode;
    
            $company_translate->save();
        }

        $i = 0;

        /**
         * If there is product image then upload excluding removed images.
        */
        $image_array = [];
        $ProductImage = $request->product_image;
        if(isset($request->product_image)) {
            foreach ($request->product_image as $key => $ProductIm) {
                $explode_removedImage = explode(",", $request->product_image_removed[$key]);
                foreach ($ProductIm as $product_key => $value) {
                    $Image_name = $value->getClientOriginalName();
                    if(!in_array($Image_name, $explode_removedImage)){
                        $image_array[$key][] =$value;
                    }
                }
            }
        }
        // dd($request->product_name);
        if($request->product_name[0] != 0) {
            $loop = 0;
            foreach($request->product_name as $product){
                $companyProduct = new CompanyProduct();
                $companyProduct->company_id = $company->id;
                $companyProduct->product_id = $product;
                $companyProduct->save();

                if(array_key_exists ($loop ,$image_array)) {
                    foreach ($image_array[$loop] as $imageKey => $imageValue) {
                        $productImage = $imageValue;
                        $productImageSaveAsName = rand(). "_product_image." . $productImage->getClientOriginalExtension();
                        $upload_path = storage_path('app/public/uploads/product_image/');
                        $success = $productImage->move($upload_path, $productImageSaveAsName);
                        $product_images = new CompanyProductImage();
                        $product_images->company_product_id  = $companyProduct->id;
                        $product_images->image     = $productImageSaveAsName;
                        $result = $product_images->save();
                    }
                }
                $loop ++;
            } 
        }

        /**
         * Adding Contact information.
        */
        $count = 0;
        foreach($request->name as  $contacts_info) {
            $contact = new Contact();
            $contact->company_id = $company->id;
            $contact->email = $request->email_address[$count];
            $contact->mobile_number = $request->mobile_number[$count];
            $contact->save();

            foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                $contact_translate = new ContactTranslate;
                $contact_translate->contact_id = $contact->id;
                $contact_translate->locale = $localeCode;
                $contact_translate->name = $contacts_info;
                $contact_translate->jobtitle = $request->jobtitle[$count];
                $contact_translate->save();
            }
            $count ++;
        }

        // Sync Activity code
        $company->activity_codes()->sync($request->activity_codes);

        if($result) {
            return redirect('add-company-profile')->with('showSuccessModel',true);
        } else {
            DB::rollback();
            return redirect('add-company-profile')->with('error',  __('payment.paymentErrorMSG'));
        }
    }
}