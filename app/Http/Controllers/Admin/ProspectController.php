<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Prospect;
use App\Exports\ProspectsExport;
use App\Imports\ProspectsImport;
use App\User;
use Auth;
use Excel;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Mail;
//use Illuminate\Validation\Rule;

class ProspectController extends Controller
{



    public function index(Request $request){
        if($request->ajax()){
            $prospects = Prospect::select('*');
            return Datatables::of($prospects)
                ->addColumn('action', function($prospect){

                    if (\Auth::user()) {
                        $view = '<a href="' . route('prospect-detail', [$prospect->id]) . '" title="Afficher"><i class="fas fa-eye" aria-hidden="true" style="color:#3699FF;" ></i></a> <br>';
                    } else {
                        $view = '';
                    }
                    if (\Auth::user()) {
                        $deleteBtn ='<a href="javascript:void(0)" rel="tooltip" title="Supprimer" class="delete_admin_btn" data-id="'.$prospect->id.'" data-href="' . route('prospect-delete', [$prospect->id]) . '"  aria-hidden="true" data-modal="modal"><i class="far fa-trash-alt" style="color: #F64E60;"></i><br></a>';
                    } else {
                        $deleteBtn = '';
                    }

                    if (\Auth::user()) {
                        $updateBtn ='<a rel="tooltip" title="Mettre à jour" data-id="'.$prospect->id.'" href="' . route('update-prospect', [$prospect->id]) . '"  aria-hidden="false" data-modal="modal"><i class="far fa-edit" style="color: blue;"></i></a>';                        } else {
                        $updateBtn = '';
                    }

                    return $view.$deleteBtn.$updateBtn;
                })

                ->editColumn('created_at', function ($prospect) {
                    return [
                        'display' => e($prospect->created_at->format('m/d/Y')),
                        'timestamp' => $prospect->created_at->timestamp
                    ];
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.prospect.index');
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
        error_reporting(    E_ALL);
        //return $request;
        // Logic to validate form data
        $rules = [
            'subscription_id'      => 'required',
            'name'                 => 'required',
            'companyName'          => 'required',
            'address'              => 'required',
            'jobTitle'             => 'required',
            'phone'                => 'required',
            'email_customer'       => 'required|email|max:255|unique:customers,email,NULL,id,deleted_at,NULL',
            //'username'             => 'required',
            //'note'               => 'required',
            'pays'                 => 'required',
            //'wilaya'               => 'required',
            'provenance'           => 'required',
            'other_provenance'     => 'required',
            //'social_network'     => 'required',
            //'password'             => 'required|min:8|confirmed',
            'general_condition'    => 'required',
            /*'g-recaptcha-response' => 'required',
            'payment_mode'         => 'NULL',
            'payment_status'       => 'NULL',
            'payment_type'         => 'NULL',
            'status'               => 'NULL',
            'currency'             => 'NULL',
            'receive_promotions'   => 'NULL',
            'company_type'         => 'NULL',*/
        ];

        $messages = [
            'username.regex' => __('signup.signup_form_username_regex')
        ];

        $attributes = [
            'subscription_id'   => __('signup.signup_form_subscription_id'),
            'name'              => __('signup.signup_form_name'),
            'companyName'       => __('signup.signup_form_companyName'),
            'address'           => __('signup.signup_form_address'),
            'jobTitle'          => __('signup.signup_form_jobTitle'),
            'phone'             => __('signup.signup_form_phone'),
            'email_customer'    => __('signup.signup_form_email_customer'),
            'username'          => __('signup.signup_form_username'),
            //'note'            => __('signup.signup_form_note'),
            'pays'              => __('signup.signup_form_pays'),
            'wilaya'            => __('signup.signup_form_wilaya'),
            'password'          => __('signup.signup_form_password'),
            'general_condition' => __('signup.signup_form_general_condition'),
        ];

        $validator = Validator::make($request->all(),$rules, $messages, $attributes);

        if ($validator->fails()) {
            return redirect('add-prospect')
                ->withInput()
                ->withErrors($validator);
        } else{
            $data = $request->input();
            $signupUserData = $request->all();

            try{
                $prospect                       = new Prospect;

                $prospect ->subscription_id     = $data['subscription_id'];
                $prospect ->name                = $data['name'];
                $prospect ->company_name        = $data['companyName'];
                $prospect ->company_address     = $data['address'];
                $prospect ->job_title           = $data['jobTitle'];
                $prospect ->mobile_number       = $data['phone'];
                $prospect ->email               = $data['email_customer'];
                $prospect ->username            = 'AlgeriaInvest';
                $prospect ->note                = $data['note'];
                $prospect ->pays                = $data['pays'];
                $prospect ->wilaya              = $data['wilaya'];
                $prospect ->provenance          = $data['provenance'];
                $prospect ->other_provenance    = $data['other_provenance'];

                $prospect ->password            = 'AlgeriaInvest2021';
                $prospect ->payment_status      = 'pending' ;

                $prospect ->payment_type        = null;
                $prospect ->is_deactivated      = 1;
                $prospect ->currency            = 'dzd';
                $prospect ->payment_mode        = 'offline';
                $prospect ->company_type        = 'algerian';
                $prospect ->terms_accepted      = 1;
                $prospect ->receive_promotions  = 1;
                $prospect ->status              = 1;
                $prospect ->default_locale      = 'fr';
                $prospect ->save();


                if ($prospect-> save()) {
                    $prospect->parent_id        = $prospect->id;
                    $prospect -> update();
                }

                if ($prospect ->pays        != "Algérie") {

                    $prospect ->wilaya   = $prospect ->pays;
                    $prospect  -> update();
                }




                if ( $prospect -> save()) {
                    return redirect()->back()->with('success',"Prospect ajouté avec succès !!! ");

                } else {
                    //  return redirect()->back()->with('success',"Enregistrement mis à jour avec succès !!! ");


                }
            }
            catch(Exception $e){
                return redirect('/add-prospect')->with('error',"Opération echoué");
            }

        }

        Session::put('signupUserData', $signupUserData);
        return response()->json(['success' => true]);
    }



    public function getProspectRowDetail($id){
        $prospect = Prospect::findOrFail($id);

        return view('admin.prospect.prospect-detail', compact('prospect'));

    }

    public function getProspectDetail($id){
        $prospect = Prospect::findOrFail($id);

        return view('admin.prospect.update-prospect', compact('prospect'));

    }


    public function exportIntoExcel(){
       return Excel::download(new ProspectsExport,'prospectslist.xlsx');

    }

    public function exportIntoCSV(){
        return Excel::download(new ProspectsExport,'prospectslist.csv');

    }

    public function importForm(){
        return view('add-prospect');

    }


    public function import(Request $request){
        Excel::import(new ProspectsImport, $request->file);
        return "Importation reussie";

    }




    public function destroy(Request $request,$id)
    {
        $prospect = Prospect::find($id);
        $id = $request['delete'];

        $prospect ->delete();

        $request->session()->flash('success', 'Prospect supprimé avec succès !');
        return redirect()->route('manage-prospect.index');
    }

    public function delete($id){
        $delete_id = $id;
        return view('admin.prospect.action',compact('delete_id'));
    }



    public function prospectUpdate( Request $request , Prospect $prospect)
    {
        $prospectUpdate = [
            'id'                          => $request->id,
            'subscription_id'             =>  $request->subscription_id,
            'name'                        =>  $request->name,
            'company_name'               =>  $request->companyName,
            'company_address'             =>  $request->address,
            'pays'                         =>  $request->pays,
            'wilaya'                       =>  $request->wilaya,
            'job_title'                  =>  $request->jobTitle,
            'mobile_number'               =>  $request->phone,
            'email'                       =>  $request->email_customer,
            'username'                    =>  'AlgeriaInvest2021',
            'note'                       =>  $request->note,
            'password'                    =>  $request->password,
            'terms_accepted'              =>  $request->general_condition,
        ];


        if ($prospectUpdate['pays']  != 'Algérie'){
            $prospectUpdate['wilaya'] =$prospectUpdate['pays'];
            // update($userUpdate);
        }else{
            $prospectUpdate['wilaya'] =$prospectUpdate['wilaya'];
        }

        //return dd($userUpdate);
        DB::table('prospect')->where('id',$request->id)->update($prospectUpdate);
        return redirect()->back()->with('success',"L'enregistrement a été mis à jour avec succès");
    }

}
