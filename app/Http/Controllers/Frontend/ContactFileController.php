<?php

namespace App\Http\Controllers\Frontend;

use PDF;
use Str;
use Auth;
use Mail;
use Session;
use App\Models\Zone;
use App\Models\Sector;
use App\Models\Company;
use App\Models\Customer;
use LaravelLocalization;
use App\Models\ContactFile;
use Illuminate\Http\Request;
use App\Jobs\GenerateCompanyPDF;
use App\Exports\CompaniesExport;
use App\Models\PaymentTransaction;
use App\Http\Controllers\Controller;
use App\Models\PaymentConfiguration;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ContactFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $currentLocale = LaravelLocalization::getCurrentLocale();
        $sectors = Sector::with([
            'localeAll' => function ($query) use ($currentLocale) {
                return $query->where('locale', $currentLocale)
                    ->get();
            }
        ])
        ->where('status', 1)
        ->get();

        $zones = Zone::with([
            'localeAll' => function ($query) use ($currentLocale) {
                return $query->where('locale', $currentLocale)
                    ->get();
            }
        ])
        ->where('status', 1)
        ->get();
        $sidebar_key = 'discover_algeria';
        return view('frontend.contact_file.contact_file_step_one', compact('sectors', 'zones','sidebar_key'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $currentLocale = LaravelLocalization::getCurrentLocale();
        if (Auth::guard('customer')->check()) {

            if ((!Session::has('request_data')) && ($request->input() == [])) {
                return redirect()->back()->with('error', __('contactfile_step_one.error_search_criteria'));
            }
            if (Session::has('request_data')) {
                $request_data = Session::get('request_data');
            } else {
                $request_data = $request->input();
            }
            //return $request_data;
            // Found query
            $company = Company::where('status',1);

            if (isset($request_data['keyword']) && !empty($request_data['keyword'])) {

                $company = $company->where(function ($innerQuery) use($request_data, $currentLocale){
                    $innerQuery->whereHas(
                        'localeAll',
                        function ($query) use ($currentLocale, $request_data) {
                            return $query->where('locale', $currentLocale)
                                ->where(function ($innerQuery) use ($request_data) {
                                    $innerQuery->where('company_name', 'LIKE', '%' . $request_data['keyword'] . '%');
                            });
                    })
                    ->orWhereHas(
                        'products.productTranslate',
                        function ($query) use ($currentLocale, $request_data) {
                            return $query->whereHas(
                                'localeAll' , function ($query) use ($currentLocale,$request_data) {
                                    return $query->where('locale', $currentLocale)
                                    ->where(function ($innerQuery) use ($request_data) {
                                        $innerQuery->where('name', 'LIKE', '%' . $request_data['keyword'] . '%');
                                    });
                                }
                            );
                        }
                    );
                });

            }

            //return $request_data;
            if (isset($request_data['sector']) && !empty($request_data['sector'])) {
                $company = $company->whereHas(
                    'sectors',
                    function ($query) use ($request_data) {
                        return $query->whereIn('id', $request_data['sector']);
                    }
                );
            }
            if (isset($request_data['zone']) && !empty($request_data['zone'])) {
                $company = $company->whereHas(
                    'zones',
                    function ($query) use ($request_data) {
                        return $query->whereIn('id', $request_data['zone']);
                    }
                );
            }

            if (isset($request_data['capital_from']) && !empty($request_data['capital_from'])) {

                $capital_from = (int)$request_data['capital_from'];
                $company = $company->where('capital', '>=', $capital_from);
            }
            if (isset($request_data['capital_to']) && !empty($request_data['capital_to'])) {

                $capital_to = (int)$request_data['capital_to'];
                $company = $company->where('capital', '<=', $capital_to);
            }
            if (isset($request_data['turnover_from']) && !empty($request_data['turnover_from'])) {
                $turn_over_from = (int)$request_data['turnover_from'];
                $company = $company->where('net_sales_2018', '>=', $turn_over_from)
                ->orWhere('net_sales_2019', '>=', $turn_over_from);
            }
            if (isset($request_data['turnover_to']) && !empty($request_data['turnover_to'])) {
                $turn_over_to = (int)$request_data['turnover_to'];
                $company = $company->where('net_sales_2018', '<=', $turn_over_to)
                ->orWhere('net_sales_2019', '<=', $turn_over_to);
            }
            if (isset($request_data['number_of_employees_from']) && !empty($request_data['number_of_employees_from'])) {

                $staff_from = (int)$request_data['number_of_employees_from'];
                $company = $company->where('staff', '>=', $staff_from);
            }
            if (isset($request_data['number_of_employees_to']) && !empty($request_data['number_of_employees_to'])) {

                $staff_to = (int)$request_data['number_of_employees_to'];
                $company = $company->where('staff', '<=', $staff_to);
            }
            if (isset($request_data['creation_date_from']) && !empty($request_data['creation_date_from'])) {

                $creation_date_from = date('Y-m-d', strtotime($request_data['creation_date_from']));
                $company = $company->whereDate('creation_date', '>=', $creation_date_from);
            }
            if (isset($request_data['creation_date_to']) && !empty($request_data['creation_date_to'])) {

                $creation_date_to = date('Y-m-d', strtotime($request_data['creation_date_to']));
                $company = $company->whereDate('creation_date', '<=', $creation_date_to);
            }

            $company_count = clone $company;
            $company_count = $company_count->distinct('id')->count('id');

            $company_data = clone $company;
            $company_data = $company_data->withCount('contacts')->withCount('products')->distinct('id')->get();

            $company_id = clone $company;
            $company_id = $company_id->select('id')->distinct('id')->get();

            // dd($request_data);
            if ($company_count > 0)
            {

                $contact_file = new ContactFile();
                $contact_file->customer_id = Auth::guard('customer')->user()->id;
                $contact_file->sector_id  = isset($request_data['sector'])?json_encode($request_data['sector']):NULL;
                $contact_file->zone_id   = isset($request_data['zone'])?json_encode($request_data['zone']):NULL;
                $contact_file->status = "inactive";

                $contact_file->turnover_from = $request_data['turnover_from'];
                $contact_file->turnover_to = $request_data['turnover_to'];
                $contact_file->capital_from = $request_data['capital_from'];
                $contact_file->capital_to = $request_data['capital_to'];
                $contact_file->creation_date_from = $request_data['creation_date_from'];
                $contact_file->creation_date_to = $request_data['creation_date_to'];
                $contact_file->number_of_employees_from = $request_data['number_of_employees_from'];
                $contact_file->number_of_employees_to = $request_data['number_of_employees_to'];
                $contact_file->token = Str::random(60);
                $contact_file->keyword = $request_data['keyword'];
                $result = $contact_file->save();
                Session::put('contact_file_request_id', $contact_file->id);

                $searched_criteria = [
                    'turnover_from'     => $request_data['turnover_from'],
                    'turnover_to'       => $request_data['turnover_to'],
                    'sector'            => isset($request_data['sector'])?$request_data['sector']:NULL,
                    'zone'              => isset($request_data['zone'])?$request_data['zone']:NULL,
                    'creation_date_from'   => $request_data['creation_date_from'],
                    'creation_date_to'     => $request_data['creation_date_to'],
                    'capital_from'     => $request_data['capital_from'],
                    'capital_to'     => $request_data['capital_to'],
                    'number_of_employees_from'     => $request_data['number_of_employees_from'],
                    'number_of_employees_to'     => $request_data['number_of_employees_to'],
                    'keyword'     => $request_data['keyword']
                ];

                Session::put('searched_criteria',$searched_criteria);


                $sectorIds                  = isset($request_data['sector'])?$request_data['sector']:NULL;
                $zoneIds                    = isset($request_data['zone'])?$request_data['zone']:NULL;
                $companyBySectors           = [];
                $companyByZones             = [];


                //display purpose
                if (isset($request_data['sector']) && !empty($request_data['sector'])) {

                    // name by sector
                    $sectors = Sector::get();
                    foreach ($sectors as $sector) {
                        foreach ($sectorIds as $sectorId) {
                            if ($sector->id == $sectorId) {
                                $companyBySectors[] = $sector->localeAll[0]->name;
                            }
                        }
                    }
                }

                // display purpose
                if (isset($request_data['zone']) && !empty($request_data['zone'])) {
                    // name by zones
                    $zones = Zone::get();

                    foreach ($zones as $zone) {
                        foreach ($zoneIds as $zoneId) {
                            if ($zone->id == $zoneId) {
                                $companyByZones[] = $zone->localeAll[0]->name;
                            }
                        }
                    }
                }

                //get unique company id
                Session::put('company_unique_ids', $company_id);

                //searched sectors and zones
                Session::put('sectors_data', $companyBySectors);
                Session::put('zones_data', $companyByZones);


                // calculation
                $email_count = 0;
                $product_count = 0;
                $contacts_count = 0;
                foreach($company_data as $data){
                    $contacts_count += $data->contacts_count;
                    $product_count += $data->products_count;
                }
                $phone_count = $contacts_count + $company_count;
                $email_count = $contacts_count + $company_count;
                $job_title_count =  $contacts_count;
                $financial_information_count = $company_count;
                $employees_count = $company_count;

                if($request_data['capital_from']== null && $request_data['capital_to']== null){
                    $capital_count = Company::where('status',1)
                    ->where('capital', '!=', null)
                    ->count('id');
                }else {
                    $capital_count = $company_count;
                }
                if($request_data['turnover_to'] == null && $request_data['turnover_from'] == null){
                    $turnover_count = Company::where('status',1)
                    ->where('net_sales_2018', '!=', null)
                    ->Where('net_sales_2019', '!=', null)
                    ->count('id');
                } else {
                    $turnover_count = $company_count;
                }

                $rates = PaymentConfiguration::where('module_type', 'contact-file')->get();

                foreach ($rates as $rate) {
                    if ($rate->key == 'contact_file_start_price') {
                        $contact_file_start_price_usd = $rate->value_USD;
                        $contact_file_start_price_dzd = $rate->value_DZD;
                        $contact_file_start_price_euro = $rate->value_Euro;
                    }
                    if ($rate->key == 'contact_file_emails') {
                        $contact_file_emails_usd = $rate->value_USD;
                        $contact_file_emails_dzd = $rate->value_DZD;
                        $contact_file_emails_euro = $rate->value_Euro;
                    }
                    if ($rate->key == 'contact_file_phone_numbers') {
                        $contact_file_phone_numbers_usd = $rate->value_USD;
                        $contact_file_phone_numbers_dzd = $rate->value_DZD;
                        $contact_file_phone_numbers_euro = $rate->value_Euro;
                    }
                    if ($rate->key == 'contact_file_job_titles') {
                        $contact_file_job_titles_usd = $rate->value_USD;
                        $contact_file_job_titles_dzd = $rate->value_DZD;
                        $contact_file_job_titles_euro = $rate->value_Euro;
                    }
                    if ($rate->key == 'contact_file_employees') {
                        $contact_file_employees_usd = $rate->value_USD;
                        $contact_file_employees_dzd = $rate->value_DZD;
                        $contact_file_employees_euro = $rate->value_Euro;
                    }
                    if ($rate->key == 'contact_file_capital') {
                        $contact_file_capital_usd = $rate->value_USD;
                        $contact_file_capital_dzd = $rate->value_DZD;
                        $contact_file_capital_euro = $rate->value_Euro;
                    }
                    if ($rate->key == 'contact_file_turnover') {
                        $contact_file_turnover_usd = $rate->value_USD;
                        $contact_file_turnover_dzd = $rate->value_DZD;
                        $contact_file_turnover_euro = $rate->value_Euro;
                    }
                }
                $vat_value = PaymentConfiguration::where('key', 'VAT_value')->first();

                $finalPrice_USD = $contact_file_start_price_usd + ($email_count * $contact_file_emails_usd) + ($phone_count * $contact_file_phone_numbers_usd) + ($job_title_count * $contact_file_job_titles_usd) + ($employees_count * $contact_file_employees_usd) + ($capital_count * $contact_file_capital_usd) + ($turnover_count * $contact_file_turnover_usd);
                $VAT_value_in_USD = ($vat_value->value_USD/100)  * $finalPrice_USD;
                $finalPrice_USD_with_VAT = $finalPrice_USD + $VAT_value_in_USD;
                $finalPrice_DZD = $contact_file_start_price_dzd + ($email_count * $contact_file_emails_dzd) + ($phone_count * $contact_file_phone_numbers_dzd) + ($job_title_count * $contact_file_job_titles_dzd) + ($employees_count * $contact_file_employees_dzd) + ($capital_count * $contact_file_capital_dzd) + ($turnover_count * $contact_file_turnover_dzd);
                $VAT_value_in_DZD = ($vat_value->value_DZD/100)  * $finalPrice_DZD;
                $finalPrice_DZD_with_VAT = $finalPrice_DZD + $VAT_value_in_DZD;

                $finalPrice_Euro = $contact_file_start_price_euro + ($email_count * $contact_file_emails_euro) + ($phone_count * $contact_file_phone_numbers_euro) + ($job_title_count * $contact_file_job_titles_euro) + ($employees_count * $contact_file_employees_euro) + ($capital_count * $contact_file_capital_euro) + ($turnover_count * $contact_file_turnover_euro);
                $VAT_value_in_Euro = ($vat_value->value_Euro/100)  * $finalPrice_Euro;
                $finalPrice_Euro_with_VAT = $finalPrice_Euro + $VAT_value_in_Euro;

                // Session::put('final_price_USD', $finalPrice_USD);
                // Session::put('final_price_DZD', $finalPrice_DZD);
                // Session::put('final_price_Euro', $finalPrice_Euro);
                Session::put('final_price_USD', $finalPrice_USD_with_VAT);
                Session::put('final_price_DZD', $finalPrice_DZD_with_VAT);
                Session::put('final_price_Euro', $finalPrice_Euro_with_VAT);

                $vatPercent  = 0;
                $vatprice = 0;


                $customer = Customer::where('id', Auth::guard('customer')->user()->id)->first();
                $totalprice = $finalPrice_DZD_with_VAT;
                $words = numberToWords($totalprice);

                $data = [
                    'final_price' => number_format($finalPrice_USD, 2),
                    'vat_price'   => number_format($VAT_value_in_DZD, 2),
                    'vat_percent' => number_format($vat_value->value_DZD, 2),
                    'price'       => number_format($totalprice, 2),
                    'words'       => $words,
                    'name'        => $customer->name,
                    'address'     =>  $customer->company_address,

                ];
                Session::put('company_count',$company_count);
                Session::put('email_count',$email_count);
                Session::put('phone_count',$phone_count);
                Session::put('employee_count',$employees_count);
                Session::put('product_count',$product_count);
                Session::put('job_title_count',$job_title_count);

                //reset request data
                Session::forget('request_data');

                return view('frontend.contact_file.contact_file_step_two', compact( 'data','searched_criteria', 'email_count', 'phone_count', 'product_count', 'financial_information_count', 'companyBySectors', 'companyByZones', 'company_count', 'job_title_count'));

            }else{
                // If result not found.
                return redirect('contact-file')->with('error', __('contactfile_step_one.error_search_criteria'));
            }


        } else {

            Session::put('request_data', $request->input());
            return redirect()->back()->with('openLogin', true);
        }

    }

    public function confirmEstimation(Request $request)
    {
        $final_price_USD = Session::get('final_price_USD');
        $final_price_DZD = Session::get('final_price_DZD');
        $final_price_Euro = Session::get('final_price_Euro');
        if ($final_price_USD && $final_price_DZD && $final_price_Euro) {
            return view('frontend.contact_file.contact_file_payment',compact('final_price_USD', 'final_price_DZD', 'final_price_Euro'));
        }else{
            return redirect()->route('contact-file');
        }
    }

    // after payment page
    public function confirmPayment(Request $request)
    {

        if (!Session::has('contact_file_request_id')) {
            return redirect()->route('contact-file');
        }


        // save payment
        $payment = new PaymentTransaction();
        $paymentMode    = ($request->chooseOffline) ? 'offline' : 'online';
        $paymentType    = ($paymentMode == 'offline') ? $request->chooseOffline : $request->chooseOnline;
        $payment->customer_id       = Auth::guard('customer')->user()->id;
        $payment->transaction_id    = "T-" . date('Ymd') . '-' . date('His') . '-' . Auth::guard('customer')->user()->id;
        $payment->module_type       = PaymentTransaction::module_type['contact-file'];
        $payment->price             = (float)$request->price;
        $payment->currency          = $request->currency;
        $payment->payment_mode      = $paymentMode;
        $payment->payment_type      = $paymentType;
        $payment->status            = 'pending';
        $payment->note              = "";
        $result = $payment->save();


        // generate PDF & excel & CSV & txt formats
        //excel
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $contact_file_request_id = Session::get('contact_file_request_id');
        $company_unique_ids = Session::get('company_unique_ids');
        $company = Company::whereIn('id', $company_unique_ids)->with([
            'localeAll' => function ($query) use ($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->select('company_id', 'company_name', 'address')
                ->get();
            },
            'sectors' => function ($query) use ($currentLocale) {
                return $query->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale)->get();
                    }
                ])->get();
            },
            'products.productTranslate' => function ($query) use ($currentLocale) {
                return $query->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale)->get();
                    }
                ])
                    ->get();
            },
            'contacts' => function ($query) use ($currentLocale) {
                return $query->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale)->get();
                    }
                ])
                    ->get();
            },
            'activity_codes' => function ($query) use ($currentLocale) {
                return $query->get();
            }
        ])
        ->select('id', 'company_logo', 'email', 'telephone', 'website', 'capital', 'staff', 'net_sales_2019')
        ->get();

        // STORE XLSX,PDF,CSV FILES IN FILESYSTEM.

        $fileName_xlsx  = "ContactFile" . "-" . $contact_file_request_id . "-" . time() . ".xlsx";
        $fileName_csv  = "ContactFile" . "-" . $contact_file_request_id . "-" . time() . ".csv";
        $fileName_pdf  = "ContactFile" . "-" . $contact_file_request_id . "-" . time() . ".pdf";

        $save_file_xlsx = (new CompaniesExport($company))->store($fileName_xlsx, 'contactFile');
        $save_file_csv =  (new CompaniesExport($company))->store($fileName_csv, 'contactFile');
        $save_file_pdf =  GenerateCompanyPDF::dispatch($company, $fileName_pdf);
        // $save_file_pdf =  (new CompaniesExport($company))->store($fileName_pdf, 'contactFile');
        //mail to admin
        $data = [
            'admin_email'   => "admin@algeriainvest.com",
            'customer_email'   => Auth::guard('customer')->user()->email,
            'payment_mode' => $paymentMode,
            'payment_type' => $paymentType,
            'customer_name' => Auth::guard('customer')->user()->name,
            'price'             => (float)$request->price,
        ];

        $searched_criteria = Session::get('searched_criteria');
        $searched_criteria = [
            'sectors_data'  => implode(", ",Session::get('sectors_data')),
            'zones_data'    => Session::get('zones_data'),
            'start_date'    => date('F jS Y',strtotime($searched_criteria['creation_date_from'])),
            'end_date'      => date('F jS Y',strtotime($searched_criteria['creation_date_to'])),
            'keywords'      => $searched_criteria['keyword'],
            'turnover_from' => $searched_criteria['turnover_from'],
            'turnover_to'   =>  $searched_criteria['turnover_to'],
            'capital_from'  =>  $searched_criteria['capital_from'],
            'capital_to'    => $searched_criteria['capital_to'],
            'number_of_employees_from'  => $searched_criteria['number_of_employees_from'],
            'number_of_employees_to'  => $searched_criteria['number_of_employees_to'],
        ];
        $results = [

            'company_count'     => Session::get('company_count'),
            'email_count'       => Session::get('email_count'),
            'phone_count'       => Session::get('phone_count'),
            'employee_count'    => Session::get('employee_count'),
            'product_count'     => Session::get('product_count'),
            'job_title_count'   => Session::get('job_title_count')
        ];
        // mail to Admin
        Mail::send(
            'frontend.contact_file.contact_file_admin_email',
            array('searched_criteria'=>$searched_criteria,'results'=>$results,'email' => env('ADMIN_MAIL_ADDRESS'), 'data' => $data),
            function ($message) use ($data) {
                $message->from(env('MAIL_FROM_ADDRESS'));
                $message->to($data['admin_email'])->subject('NEW Contact File Payment Successful');
            }
        );

        // mail to client
        Mail::send(
            'frontend.contact_file.contact_file_email',
            array('user' => $data['customer_name'], 'locale' => $currentLocale,'searched_criteria'=>$searched_criteria,'results'=>$results, 'data' => $data),
            function ($message) use ($data) {
                $message->from(env('MAIL_FROM_ADDRESS'));
                $message->to($data['customer_email'])->subject('Contact File Payment Process Initiated.');
            }
        );

        // if both payment save & file store successfull then only
        if ($save_file_xlsx && $result && $save_file_csv && $save_file_pdf) {

            $update_result = ContactFile::where('id', $contact_file_request_id)
            ->update([
                'file_path_xlsx' =>  $fileName_xlsx,
                'file_path_csv' =>  $fileName_csv,
                'file_path_pdf' =>  $fileName_pdf,
                'file_path_txt' =>  NULL,
                'transaction_id' =>  $payment->transaction_id,
                'status' => 'pending'
            ]);

            Session::forget('final_price_USD');
            Session::forget('final_price_DZD');
            Session::forget('final_price_Euro');
            Session::forget('contact_file_request_id');
            Session::forget('company_unique_ids');

            return redirect()->route('contact-file-payment-success');

        }else{

            return redirect()->back()->with('error', __('contactfile_step_one.something_went_wrong'));
        }
    }

    public function paymentSuccess()
    {
        return view('frontend.contact_file.contact_file_payment_success');
    }

    public function downloadContactFile($token)
    {
        $contact_file = ContactFile::where('token', $token)->first();
        if ($contact_file) {

            //check whether user payment is completed.
            $payment_transaction = PaymentTransaction::where('transaction_id', $contact_file->transaction_id)
                ->select('status', 'customer_id')
                ->first();

            // check customer
            if ($payment_transaction->customer_id != Auth::guard('customer')->user()->id) {
                abort(404);
            }

            $payment_status = $payment_transaction->status;

            return view('frontend.contact_file.contact_file_step_three', compact('token', 'payment_status'));
        }
        abort(404);
    }

    public function exportCompanies(Request $request)
    {
        $contact_file = ContactFile::select('file_path_xlsx', 'file_path_csv', 'file_path_pdf', 'file_path_txt')->where('token', $request->token)->first();

        if ($request->format == "csv") {
            return response()->download(public_path('storage/uploads/contact_files/'.$contact_file->file_path_csv));
        }elseif ($request->format == "xlsx") {
            return response()->download(public_path('storage/uploads/contact_files/' . $contact_file->file_path_xlsx));
        }elseif ($request->format == "pdf") {
            return response()->download(public_path('storage/uploads/contact_files/' . $contact_file->file_path_pdf));
        } elseif ($request->format == "txt") {
            abort(404);
            return response()->download(public_path('storage/uploads/contact_files/' . $contact_file->file_path_txt));
        }else{
            abort(404);
        }
    }
}
