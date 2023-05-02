<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Registrant;
use App\Models\RegistrantReply;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Str;
use Mail;

class RegistrantAdminController extends Controller
{

    function __construct()
    {
       // $this->middleware('permission:eregistrant-list');
        //$this->middleware('permission:eregistrant-reply',['only' => ['store']]);
       // $this->middleware('permission:eregistrant-delete', ['only' => ['destroy']]);
        //$this->middleware('permission:enquiry-update', ['only' => ['edit'] , ['update'] ]);
    }

    public function index(Request $request){
    	if($request->ajax()){
           $registrants = Registrant::with('replies')->orderByDesc('created_at');
           return Datatables::of($registrants)
                    ->addColumn('action', function($row){
                        if (\Auth::user()->can('eregistrant-reply')) {
                            $editBtn ='<a href="javascript:void(0)"  class="label label-inline label-light-success font-weight-bold editRegistrant" data-id="'.$row->id.'"data-toggle="kt_chat_modal" data-original-title="Reply" data-cache="false" aria-hidden="true" data-modal="modal">Reply</a>&nbsp';
                        } else {
                            $editBtn = '';
                        }
                        if (\Auth::user()) {
                            $deleteBtn ='<a href="javascript:void(0)" rel="tooltip" title="Supprimer" class="delete_admin_btn" data-id="'.$row->id.'" data-href="' . route('manage-registrant.destroy', [$row->id]) . '"  aria-hidden="true" data-modal="modal"><i class="far fa-trash-alt" style="color: #F64E60;"></i><br></a>';
                        } else {
                            $deleteBtn = '';
                        }

                        if (\Auth::user()) {
                            $updateBtn ='<a rel="tooltip" title="Mise à jour" data-id="'.$row->id.'" href="' . route('update-registrant', [$row->id]) . '"  aria-hidden="false" data-modal="modal"><i class="far fa-edit" style="color: blue;"></i></a> </br> </br>';                        } else {
                            $updateBtn = '';
                        }

                        return $editBtn.$updateBtn.$deleteBtn;
                    })
               
                    ->editColumn('created_at', function ($row) {
                        return [
                           'display' => e($row->created_at->format('m/d/Y')),
                           'timestamp' => $row->created_at->timestamp
                        ];
                     })
                    ->filter(function ($instance) use ($request) {
                     
                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('username', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%")
                                ->orWhere('company', 'LIKE', "%$search%");
                                //->orWhere('subject', 'LIKE', "%$search%");
                            });
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    	return view('admin.registrant.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(Request $request){
        // $validatedData = $request->validate([
        //     'reply'   => 'required',
        // ]);
        $validator = \Validator::make($request->all(), [
            'reply'   => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else{
            $data = $request->all();
            $user = Auth::user()->id;
            $reply = new RegistrantReply();
            $reply->registrant_id = $data['registrant_id'];
            $reply->reply = $data['reply'];
            $reply->reply_by = $user;
            $reply->save();
            if($reply){
                 $registrant = Registrant::find($data['registrant_id']);
                // $inquiry->status = 2;
                 $registrant->update();

                 $data = [
                        'email'   => $registrant->email,
                        'username'=> $registrant->username,
                     ];
            Mail::send('admin.registrant.email',array('email' => $registrant->username,'user_message' =>$reply->reply),
                function($message)use($data){
                     $message->from(Auth::user()->email);
                    $message->to($data['email'], $data['username'])->subject('About query');
                });
            return response()->json(['success'=>'Product saved successfully.','replyMessage'=>$reply->reply, 'date'=>$reply->created_at->format('d/m/Y h:i')]);
            }
        }


    }

    /**
    * Show the form for editing the specified inquiry.
    *@author Pooja<pooja.lavhat@neosofttech.com>
    *
    * @param  $id
    * @return $inquiry
    */
    public function edit($id)
    {
    	$registrantId = $id;
    	$registrant = Registrant::find($id);
    	return view('admin.registrant.edit',compact('registrant','registrantId'));
    }

    public function getRowsDetail($id)
    {
        $registrantId = $id;
        $registrant = Registrant::find($id);
        return view('admin.registrant.update-row',compact('registrant','registrantId'));
    }



    public function destroy(Request $request,$id)
    {
        $id = $request['delete'];
        $registrant = Registrant::with('replies')->find($id);
        $registrant ->replies()->delete();
        $registrant ->delete();

        $request->session()->flash('success', 'Enregistrement supprimé avec succès !');
        return redirect()->route('manage-registrant.index');
    }

    public function delete($id){
        $delete_id = $id;
        return view('admin.registrant.action',compact('delete_id'));
    }



   /* public function getRowsDetail($id)
    {
        /*$inquiry= Inquiry::findOrFail($id); //This will fetch the respective record from the table.
        return view('admin.inquiry.update-row',compact('inquiry')); */


        /*$bd_dsn = 'mysql:host=127.0.0.1;dbname=algeriainvest_v1;charset=utf8';
        $bd_user = "algeriainvest_v1";
        $bd_pass = "Toe7huTp2n_ty2Xs";

        try{
            $bdd = new PDO($bd_dsn,$bd_user,$bd_pass);
            // echo "connexion reussite";
        }
        catch(PDOException $ex){
            echo "ECHEC".$ex->getMessage();
        }

        $sql = "SELECT * FROM inquiries";
        $stmt = $bdd->prepare($sql);
//$stmt->bindValue(1,$status,PDO::PARAM_STR);
        $stmt->execute();



    } */

}
