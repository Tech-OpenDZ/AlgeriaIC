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
            $actionEnable = true;
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

<?php
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



if(isset($_GET['idd']) && $_GET['idd'] >0)
    {
        $getid = $_GET['idd'];
       // echo $getid;
        
    }

$sql = "SELECT * FROM customers WHERE id=?";

$selcustomer = $bdd->prepare($sql);

$selcustomer->bindValue(1,$getid,PDO::PARAM_INT);

$selcustomer->execute();

$customerinfo = $selcustomer->fetch();
//var_dump($customerinfo); die;
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">

    <div class="row ">

        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-10 col-md-offset-1  col-sm-10 ">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title" style="text-align: center">METTRE A JOUR UN CLIENT</div>
                </div>

                <div class="panel-body" >
                    <form id="" class="form-horizontal" role="form" method="post" action="{{ route('valide-update')}}">
                        @csrf
                        <div id="alert_enregist" style="display:none" class="alert alert-danger">
                            <p>Erreur:</p>
                            <span></span>
                        </div>
                        @if( Session::has( 'success' ))
                            <div class="success-alert-msg">
                                {{ Session::get( 'success' ) }}
                            </div><br>

                            <style>
                                .success-alert-msg {
                                    color: #35A85E !important;
                                    font-weight: 700;
                                    font-size: 0.90rem !important;
                                    padding-top: 0px;
                                    position: absolute;
                                    center: center;
                                    padding-left: 102px!important;
                                }
                            </style>


                        @elseif( Session::has( 'error' ))
                            <div class="danger-alert-msg col-md-12">
                                {{ Session::get( 'error' ) }}
                            </div><br>
                        @endif

                        <div class="form-group">
                            <label for="name" class="label-text col-md-3">Inscription id <span class="required" style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('subscription_id') is-invalid  @enderror" placeholder="Inscription id " id="subscription_id" name="subscription_id2" value="<?php echo $customerinfo['subscription_id']?>" readonly>
                                @error('subscription_id')
                                <span class="invalid-feedback" id="subscription_id-validation-error" role="alert">
                            {{ $message }}
                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="label-text col-md-3"> Nom et Prénom <span class="required" style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('name') is-invalid  @enderror" placeholder="Nom et Prénom " id="name" name="name2" value="<?php echo $customerinfo['name']?>">
                                @error('name')
                                <span class="invalid-feedback" id="name-validation-error" role="alert">
                            {{ $message }}
                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="companyName" class="label-text col-md-3"> Nom de l'entrprise <span class="required" style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('companyName') is-invalid  @enderror" placeholder="Nom de l'entrprise" id="companyName2" name="companyName" value="<?php echo $customerinfo['company_name']?>">
                                @error('companyName')
                                <span class="invalid-feedback" role="alert" id="companyName-validation-error">
                             {{ $message }}
                         </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="jobTitle" class="label-text col-md-3"> Intitulé de poste  <span class="required" style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('jobTitle') is-invalid  @enderror" placeholder="Intitulé de poste " id="jobTitle" name="jobTitle2" value="<?php echo $customerinfo['job_title']?>">
                                @error('jobTitle')
                                <span class="invalid-feedback" role="alert" id="jobTitle-validation-error">
                          {{ $message }}
                         </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="address" class="label-text col-md-3">Adresse <span class="required" style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('address') is-invalid  @enderror" placeholder="Adresse" id="address" name="address2" value="<?php echo $customerinfo['company_address']?>">
                                @error('address')
                                <span class="invalid-feedback" role="alert" id="address-validation-error">
                            {{ $message }}
                        </span>
                                @enderror
                            </div>
                        </div>

                
                     

                      

                       

                       


                       


                        <div class="form-group">
                            <label for="phone" class="label-text col-md-3">@lang('signup.mobileNumberLabel') <span class="required" style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('phone') is-invalid  @enderror" placeholder="@lang('signup.mobileNumberLabel')" id="phone" name="phone2" value="<?php echo $customerinfo['mobile_number']?>" >
                                @error('phone')
                                <span class="invalid-feedback" role="alert" id="phone-validation-error">
                            {{ $message }}
                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="email_customer" class="label-text col-md-3">@lang('signup.emailAddressLabel') <span class="required" style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="email" class="form-control @error('email_customer') is-invalid  @enderror" placeholder="@lang('signup.emailAddressLabel')" id="email_customer" name="email_customer2" value="<?php echo $customerinfo['email']?>">
                                @error('email_customer')
                                <span class="invalid-feedback" role="alert" id="email_customer-validation-error">
                            {{ $message }}
                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="username" class="label-text col-md-3"> @lang('signup.userNameLabel') <span class="required" style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control @error('username') is-invalid  @enderror" placeholder="@lang('signup.userNameLabel')" id="username" name="username2" value="<?php echo $customerinfo['username']?>">
                                @error('username')
                                <span class="invalid-feedback" role="alert" id="username-validation-error">
                             {{ $message }}
                        </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="password" class="label-text col-md-3">@lang('signup.passwordLabel') <span class="required" style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="password" class="form-control @error('password') is-invalid  @enderror" placeholder="@lang('signup.passwordLabel')" id="password" name="password2" value="<?php echo $customerinfo['password']?>">
                                @error('password')
                                <span class="invalid-feedback" role="alert" id="password-validation-error">
                            {{ $message }}
                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password" class="label-text col-md-3"> Confirmation mot de passe  <span class="required" style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid  @enderror" placeholder="Confirmation mot de passe" id="password_confirmation" name="password_confirmation">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert" id="password_confirmation-validation-error">
                            {{ $message }}
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="note" class="label-text col-md-3"> Commentaire <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <textarea  id="note-field" class="form-control @error('note') is-invalid  @enderror" placeholder="Commentaire" name="note2" value="<?php echo $customerinfo['note']?>"> </textarea>
                            @error('bote_confirmation')
                        <span class="invalid-feedback" role="alert" id="password_confirmation-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>
                        <div class="form-check mb-2 mr-sm-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('general_condition') is-invalid  @enderror" name="general_condition2" id="general_condition">
                                <p class="label-text-check pt-1"> &nbsp &nbsp  <a href="{{route('terms-of-service')}}" target="_blank" class="label-text-check-anchor">@lang('signup.generalConditions')</a> </p>
                                @error('general_condition')
                                <span class="invalid-feedback" role="alert" id="general_condition-validation-error">
                                  {{ $message }}
                            </span>
                                @enderror
                            </label>
                        </div>



                        <div class="form-group" >
                            <div class=" col-md-4 col-md-offset-5" style=" margin-top:20px;">

                                <button type="submit" class="btn btn-info col-md-12" id="continue_button" style="background-color: deepskyblue"> Mette à Jour </button>

                                <!--  <center> <button type="submit" value="subscribe" class="genric-btn success radius" id="btn-validate" style="border: 1px solid white;border-radius: 3px;" onclick="myFunction()">Valider</button> </center> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
</body>
</html>
@endsection