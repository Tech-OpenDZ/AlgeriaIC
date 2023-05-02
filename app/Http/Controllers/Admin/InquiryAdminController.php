<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\InquiryReply;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Str;
use Mail;

class InquiryAdminController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:enquiry-list');
        $this->middleware('permission:enquiry-reply',['only' => ['store']]);
        $this->middleware('permission:enquiry-delete', ['only' => ['destroy']]);
        //$this->middleware('permission:enquiry-update', ['only' => ['edit'] , ['update'] ]);
    }

    public function index(Request $request){
    	if($request->ajax()){
           $inquiries = Inquiry::with('replies')->orderByDesc('created_at');
           return Datatables::of($inquiries)
                    ->addColumn('action', function($row){
                        if (\Auth::user()->can('enquiry-reply')) {
                            $editBtn ='<center><a href="javascript:void(0)"  title="Répondre" class="label label-inline label-light-success font-weight-bold editInquiry" data-id="'.$row->id.'"data-toggle="kt_chat_modal" data-original-title="Reply" data-cache="false" aria-hidden="true" data-modal="modal">Reply</a> </center>';
                        } else {
                            $editBtn = '';
                        }
                        if (\Auth::user()) {
                            $view = ' <center><a href="' . route('inquiry-row-detail', [$row->id]) . '" title="Afficher"><i class="fas fa-eye" aria-hidden="true" style="color:#3699FF;" ></i></a> </center> ';
                        } else {
                            $view = '';
                        }
                        if (\Auth::user()->can('enquiry-delete')) {
                            $deleteBtn ='<center><a href="javascript:void(0)" rel="tooltip" title="Supprimer" class="delete_admin_btn" data-id="'.$row->id.'" data-href="' . route('manage-inquiry.destroy', [$row->id]) . '"  aria-hidden="true" data-modal="modal"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a></center>';
                        } else {
                            $deleteBtn = '';
                        }

                        if (\Auth::user()->can('enquiry-list')) {
                            $updateBtn ='<center> <a rel="tooltip" title="Mise à jour" data-id="'.$row->id.'" href="' . route('update-row', [$row->id]) . '"  aria-hidden="false" data-modal="modal"><i class="far fa-edit" style="color: blue;"></i></a></center> ';                        } else {
                            $updateBtn = '';
                        }

                        return $editBtn.$view.$updateBtn.$deleteBtn;
                    })
                    ->editColumn('status', function($row){
                        if($row->status == 1){
                            $status = '<span class="label label-lg font-weight-bold label-light-danger label-inline">Pending</span>';
                            return $status;
                        }else{
                            $status = '<span class="label label-inline label-light-primary font-weight-bold">Replied</span>';
                            return $status;
                        }
                    })
                    ->editColumn('created_at', function ($row) {
                        return [
                           'display' => e($row->created_at->format('m/d/Y')),
                           'timestamp' => $row->created_at->timestamp
                        ];
                     })
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == '1' || $request->get('status') == '2') {
                            $instance->where('status', $request->get('status'));
                        }
                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('username', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%")
                                ->orWhere('company', 'LIKE', "%$search%")
                                ->orWhere('note_inquiry', 'LIKE', "%$search%")
                                ->orWhere('subject', 'LIKE', "%$search%");
                            });
                        }
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
    	return view('admin.inquiry.index');
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
            $reply = new InquiryReply();
            $reply->inquiry_id = $data['inquiry_id'];
            $reply->reply = $data['reply'];
            $reply->reply_by = $user;
            $reply->save();
            if($reply){
                 $inquiry = Inquiry::find($data['inquiry_id']);
                 $inquiry->status = 2;
                 $inquiry->update();

                 $data = [
                        'email'   => $inquiry->email,
                        'username'=> $inquiry->username,
                     ];
            Mail::send('admin.inquiry.email',array('email' => $inquiry->username,'user_message' =>$reply->reply),
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
    	$inquiryId = $id;
    	$inquiry = Inquiry::find($id);
    	return view('admin.inquiry.edit',compact('inquiry','inquiryId'));
    }

    public function getRowsDetail($id)
    {
        $inquiryId = $id;
        $inquiry = Inquiry::find($id);
        return view('admin.inquiry.update-row',compact('inquiry','inquiryId'));
    }



    public function destroy(Request $request,$id)
    {
        $id = $request['delete'];
        $inquiry = Inquiry::with('replies')->find($id);
        $inquiry->replies()->delete();
        $inquiry->delete();

        $request->session()->flash('success', 'Inquiry deleted successfully!');
        return redirect()->route('manage-inquiry.index');
    }

    public function delete($id){
        $delete_id = $id;
        return view('admin.inquiry.action',compact('delete_id'));
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
