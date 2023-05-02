@extends('admin.layouts.master')
@section('head')
    <style type="text/css">
        .dataTables_filter{
            display: none;
        }
    </style>
@endsection
@section('content')
    @include('alert_messages')

    @php
        if (\Auth::user()->can('subscription-edit') || \Auth::user()->can('subscription-delete') || \Auth::user()->can('subscribers-list')) {
            $actionEnable = true;
        }
        else {
            $actionEnable = false;
        }
    @endphp
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/front-end/browser-class.js') }}"></script>
    <!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
    <!-- Please keep your own scripts above main.js -->
    <script src="{{ asset('js/front-end/main.js') }}"></script>
    @php
        if (\Auth::user()->can('subscription-edit') || \Auth::user()->can('subscription-delete') || \Auth::user()->can('subscribers-list') || \Auth::user()->can('subscribers-update')) {
             $actionEnable = true;
         }
         else {
             $actionEnable = true;
         }
             error_reporting(E_ALL);
             $bd_dsn = 'mysql:host=127.0.0.1;dbname=algeriainvest_v1;charset=utf8';
             $bd_user = "algeriainvest_v1";
             $bd_pass = "Toe7huTp2n_ty2Xs";

             try{
                 $bdd = new PDO($bd_dsn,$bd_user,$bd_pass);
                 //echo "<h1> <center> <strong> Page Under Construction ... </strong> </center> </h1> ";

             }
             catch(PDOException $ex){
                 echo "ECHEC".$ex->getMessage();

             }


             if(isset($_GET['updat-form'])){
             //$id = $_POST['id'];
             $subscription_id = htmlspecialchars($_GET['subscription_id']);
             $name = htmlspecialchars($_GET['name']);
             $companyName = htmlspecialchars($_GET['companyName']);
             $jobTitle = htmlspecialchars($_GET['jobTitle']);
             $address= htmlspecialchars($_GET['address']);
             $phone = htmlspecialchars($_GET['phone']);
             $email_customer = htmlspecialchars($_GET['email_customer']);
             $username = htmlspecialchars($_GET['username']);
             $password= sha1($_GET['password']);
             $note= htmlspecialchars($_GET['commentaire']);
             $general_condition= htmlspecialchars($_GET['general_condition']);
             }

             $sql = "UPDATE customers SET $user->subscription_id=$subscription_id, $user->name=$name , $user->job_title=$jobTitle , $user->company_name=$companyName , $user->email=$email_customer  , $user->mobile_number=$phone , $user->company_address=$address , $user->username=$username , $user->note=$note  ,$user->general_condition=$general_condition'  WHERE id->$id";
             $stmt = $bdd->prepare($sql);

             $upd=$stmt->execute();

             if ($upd)
             {
                 $msg = 'Les informations de user ont été mis à jour avec succès !!!';

             }
             else
             {
                 $msg = 'Echec de modification!!!';

             }


@endphp
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Validat Update</title>
    </head>
    <body>
  
    </body>
    </html>

@endsection