<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactFile,
    App\Models\PaymentTransaction,
    App\Models\SectorTranslate,
    App\Models\Customer,
    App\Models\ZoneTranslate;

use DataTables;
use Auth;
use Mail;


class ContactFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return $contact_file;
        if ($request->ajax()) {

            $contact_file_request = ContactFile::with('customer','transaction')
                                                    ->where('status','pending')
                                                    ->where('verified_at', null);

            return Datatables::eloquent($contact_file_request)
                ->addIndexColumn()
                ->addColumn('user', function ($contact_file_request) {
                    return $contact_file_request->customer->name. '<br>' .$contact_file_request->customer->email;
                })
                ->addColumn('search_criteria', function ($contact_file_request) {
                    $sectors = "";
                    $zones = "";
                    if ($contact_file_request->sector_id != null) {
                        foreach (json_decode($contact_file_request->sector_id) as $sector_id) {
                            $sector_name = SectorTranslate::where('locale', 'en')
                                ->where('sector_id', $sector_id)
                                ->select('name')->first();
                            $sectors = $sectors . $sector_name['name'] . ",";
                        }
                    }
                    if ($contact_file_request->zone_id != null) {
                        foreach (json_decode($contact_file_request->zone_id) as $zone_id) {
                            $zone_name = ZoneTranslate::where('locale', 'en')
                                ->where('zone_id', $zone_id)
                                ->select('name')->first();
                            $zones = $zones . $zone_name['name'] . ",";
                        }
                    }
                    $search_criteria = '<p>Keyword:' . $contact_file_request->keyword . '<br>Sector:' . $sectors . '<br>Area:' . $zones . '<br>Date of creation: <br> from ' . $contact_file_request->creation_date_from . ' to ' . $contact_file_request->creation_date_to . '<br>Capital: between'. $contact_file_request->capital_from . '&' . $contact_file_request->capital_to . '<br>Turnover: between' . $contact_file_request->turnover_from . '&' . $contact_file_request->turnover_to . '<br>Number of employees: between' . $contact_file_request->number_of_employees_from . '&' . $contact_file_request->number_of_employees_to . 'employees </p>';
                    return $search_criteria;
                })
                ->addColumn('estimation', function ($contact_file_request) {
                    return $contact_file_request->transaction->price."<br>".$contact_file_request->transaction->currency;
                   
                })
                ->addColumn('action', function ($contact_file_request) {
                   /*  $btn = '<a href="' . route('validate-contact-file-request', [$contact_file_request->token, $contact_file_request->customer_id]) . '" class="btn btn-primary">Validate</a><br><br><a href="' . route('cancel-contact-file-request', [$contact_file_request->token]) . '" class="btn btn-danger">Cancel</button>';
                    return $btn; */
                    if (\Auth::user()->can('contact-file-validate-request')) { 
                        $btnvalidate = '<a href="javascript:void(0)" data-id="'.$contact_file_request->transaction_id.'" class="btn btn-primary validate_btn">Validate</a><br><br>';
                    } else {
                        $btnvalidate = '';
                    } 
                    if (\Auth::user()->can('contact-file-cancel-request')) { 
                        $btnCancel = '<a class="cancel_admin_btn btn btn-danger" rel="tooltip" title="Cancel" href="javascript:;" data-href="' . route('cancel-contact-file-request', [$contact_file_request->token, $contact_file_request->customer_id, $contact_file_request->transaction_id]) . '"    data-id="' . $contact_file_request->customer_id . '">Cancel</a>';
                    } else {
                        $btnCancel = '';
                    } 
                    return $btnvalidate.$btnCancel;

                })
                ->editColumn('created_at', function ($contact_file_request) {
                    return [
                       'display' => e($contact_file_request->created_at->format('m/d/Y')),
                       'timestamp' => $contact_file_request->created_at->timestamp
                    ];
                 })
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->orWhere('keyword', 'LIKE', "%$search%")
                            ->orWhere('turnover_from', 'LIKE', "%$search%")
                            ->orWhere('capital_from', 'LIKE', "%$search%")
                            ->orWhere('turnover_to', 'LIKE', "%$search%")
                            ->orWhereHas('customer', function($w) use($request,$search){
                                $w->where('name', 'LIKE', "%$search%");
                            })
                            ->orWhereHas('transaction', function($w) use($request,$search){
                                $w->where('price', 'LIKE', "%$search%")
                                ->orWhere('currency', 'LIKE', "%$search%");
                            });
                        });
                    }
                })

                ->rawColumns(['action', 'search_criteria','user','estimation'])
                ->make(true);
        }

        return view('admin.contact_files.index');
    }

    public function cancelledRequest(Request $request)
    {

        //return $contact_file;
        if ($request->ajax()) {

            $contact_file_request = ContactFile::with('customer','transaction')
                                                ->where('status', 'cancelled');

            return Datatables::eloquent($contact_file_request)
                ->addIndexColumn()
                ->addColumn('user', function ($contact_file_request) {
                    return $contact_file_request->customer->name. '<br>' .$contact_file_request->customer->email;
                })
                ->addColumn('search_criteria', function ($contact_file_request) {
                    $sectors = "";
                    $zones = "";
                    if ($contact_file_request->sector_id != null) {
                        foreach (json_decode($contact_file_request->sector_id) as $sector_id) {
                            $sector_name = SectorTranslate::where('locale', 'en')
                                ->where('sector_id', $sector_id)
                                ->select('name')->first();
                            $sectors = $sectors . $sector_name['name'] . ",";
                        }
                    }
                    if ($contact_file_request->zone_id != null) {
                        foreach (json_decode($contact_file_request->zone_id) as $zone_id) {
                            $zone_name = ZoneTranslate::where('locale', 'en')
                                ->where('zone_id', $zone_id)
                                ->select('name')->first();
                            $zones = $zones . $zone_name['name'] . ",";
                        }
                    }
                    $search_criteria = '<p>Keyword:' . $contact_file_request->keyword . '<br>Sector:' . $sectors . '<br>Area:' . $zones . '<br>Date of creation: <br> from ' . $contact_file_request->creation_date_from . ' to ' . $contact_file_request->creation_date_to . '<br>Capital: between' . $contact_file_request->capital_from . '&' . $contact_file_request->capital_to . '<br>Turnover: between' . $contact_file_request->turnover_from . '&' . $contact_file_request->turnover_to . '<br>Number of employees: between' . $contact_file_request->number_of_employees_from . '&' . $contact_file_request->number_of_employees_to . 'employees </p>';
                    return $search_criteria;
                })
                ->addColumn('estimation', function ($contact_file_request) {
                    return $contact_file_request->transaction->price."<br>".$contact_file_request->transaction->currency;
                })
                ->editColumn('created_at', function ($contact_file_request) {
                    return [
                       'display' => e($contact_file_request->created_at->format('m/d/Y')),
                       'timestamp' => $contact_file_request->created_at->timestamp
                    ];
                 })
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->orWhere('keyword', 'LIKE', "%$search%")
                            ->orWhere('turnover_from', 'LIKE', "%$search%")
                            ->orWhere('capital_from', 'LIKE', "%$search%")
                            ->orWhere('turnover_to', 'LIKE', "%$search%")
                            ->orWhereHas('customer', function($w) use($request,$search){
                                $w->where('name', 'LIKE', "%$search%");
                            })
                            ->orWhereHas('transaction', function($w) use($request,$search){
                                $w->where('price', 'LIKE', "%$search%")
                                ->orWhere('currency', 'LIKE', "%$search%");
                            });
                        });
                    }
                })

                ->rawColumns(['action', 'search_criteria','user','estimation'])
                ->make(true);
        }

        return view('admin.contact_files.cancelled');
    }

    public function validatedRequest(Request $request)
    {

        //return $contact_file;
        if ($request->ajax()) {

            $contact_file_request = ContactFile::with('customer','transaction')
                                                ->where('status','completed');

            return Datatables::eloquent($contact_file_request)
                ->addIndexColumn()
                ->addColumn('user', function ($contact_file_request) {
                    return $contact_file_request->customer->name. '<br>' .$contact_file_request->customer->email;
                })
                ->addColumn('search_criteria', function ($contact_file_request) {
                    $sectors = "";
                    $zones = "";
                    if ($contact_file_request->sector_id != null) {
                        foreach (json_decode($contact_file_request->sector_id) as $sector_id) {
                            $sector_name = SectorTranslate::where('locale', 'en')
                                ->where('sector_id', $sector_id)
                                ->select('name')->first();
                            $sectors = $sectors . $sector_name['name'] . ",";
                        }
                    }
                    if ($contact_file_request->zone_id != null) {
                        foreach (json_decode($contact_file_request->zone_id) as $zone_id) {
                            $zone_name = ZoneTranslate::where('locale', 'en')
                                ->where('zone_id', $zone_id)
                                ->select('name')->first();
                            $zones = $zones . $zone_name['name'] . ",";
                        }
                    }
                    $search_criteria = '<p>Keyword:' . $contact_file_request->keyword . '<br>Sector:' . $sectors . '<br>Area:' . $zones . '<br>Date of creation: <br> from ' . $contact_file_request->creation_date_from . ' to ' . $contact_file_request->creation_date_to . '<br>Capital: between' . $contact_file_request->capital_from . '&' . $contact_file_request->capital_to . '<br>Turnover: between' . $contact_file_request->turnover_from . '&' . $contact_file_request->turnover_to . '<br>Number of employees: between' . $contact_file_request->number_of_employees_from . '&' . $contact_file_request->number_of_employees_to . 'employees </p>';
                    return $search_criteria;
                })
                ->addColumn('estimation', function ($contact_file_request) {
                    return $contact_file_request->transaction->price."<br>".$contact_file_request->transaction->currency;
                })
                ->editColumn('created_at', function ($contact_file_request) {
                    return [
                       'display' => e($contact_file_request->created_at->format('m/d/Y')),
                       'timestamp' => $contact_file_request->created_at->timestamp
                    ];
                 })
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->orWhere('keyword', 'LIKE', "%$search%")
                            ->orWhere('turnover_from', 'LIKE', "%$search%")
                            ->orWhere('capital_from', 'LIKE', "%$search%")
                            ->orWhere('turnover_to', 'LIKE', "%$search%")
                            ->orWhereHas('customer', function($w) use($request,$search){
                                $w->where('name', 'LIKE', "%$search%");
                            })
                            ->orWhereHas('transaction', function($w) use($request,$search){
                                $w->where('price', 'LIKE', "%$search%")
                                ->orWhere('currency', 'LIKE', "%$search%");
                            });
                        });
                    }
                })
                ->rawColumns(['search_criteria','user','estimation'])
                ->make(true);
        }

        return view('admin.contact_files.validated');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validateRequest(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'note'   => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $token = $request->token; 
        $user = Customer::select('email','default_locale','name')->where('id', $request->get('customer_id'))->first();
        $transaction = PaymentTransaction::where('transaction_id', $request->get('transaction_id'))
        ->update([
            'note' => $request->note,
            'status'      => 'completed',
        ]);
        $result = ContactFile::where('token', $token)
        ->update([
            'verified_at' => date('Ymd'),
            'status'      => 'completed',
        ]);

        $press_review_request = ContactFile::where('token', $token)->first();
        // dd($user->default_locale);
        Mail::send('admin.contact_files.email', ['token' => $token,'locale'=>$user->default_locale,'user'=>$user->name], function ($message) use ($user) {
            $message->from(Auth::user()->email);
            $message->to($user->email);
            $message->subject('Contact File Download Link');
        });
        return ['result' => true, 'detail' => 'Mail sent successfully'];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelRequest($token,$transaction_id, Request $request)
    {

        $transaction = PaymentTransaction::where('id', $transaction_id)
        ->update([
            'note' => $request->note,
            'status'      => 'cancel',
        ]);
        $result = ContactFile::where('token', $token)
        ->update([
            'verified_at' => date('Ymd'),
            'status'      => 'cancelled',
        ]);


        return redirect()->back()->with('success', 'Request Cancelled Successfully.');
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

    public function transactionDetails(Request $request)
    {
        $paymentTranaction = PaymentTransaction::where('transaction_id',$request->get('transaction_id'))->first();
        $contactFileRequest = ContactFile::where('transaction_id',$request->get('transaction_id'))->first();
        $paymentTranaction->token = $contactFileRequest->token;
        $paymentTranaction->customer_id = $contactFileRequest->customer_id;
        return \Response::json($paymentTranaction);
    }
}
