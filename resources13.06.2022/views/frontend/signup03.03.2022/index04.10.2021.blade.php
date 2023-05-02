@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('signup.signup') | @lang('news.placeName')</title>
@endsection

@section('content')


<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/front-end/browser-class.js') }}"></script>
    <!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    
    <script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
    <!-- Please keep your own scripts above main.js -->
    <script src="{{ asset('js/front-end/main.js') }}"></script>







    <div class="container">
        

       <div class="row ">

       <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-10 col-md-offset-1  col-sm-10 ">
            <div class="panel panel-info">
                 <div class="panel-heading">
            <b>   <div class="panel-title" style="text-align: center">
					Formulaire d'inscription<br><br>Tarif de lancement à 49 900,00 DZD HT/AN
					</div>
			</b>
            </div>

            <div class="panel-body" >
                <form id="" class="form-horizontal" role="form" method="post" action="{{ route('customer-store') }}">
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
                        <label for="name" class="label-text col-md-3"></label>
                        <div class="col-md-9">
                            <input type="hidden" class="form-control @error('subscription_id') is-invalid  @enderror" placeholder="Inscription id " id="subscription_id" name="subscription_id" value="4">
                            @error('subscription_id')
                            <span class="invalid-feedback" id="subscription_id-validation-error" role="alert">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="label-text col-md-3"> @lang('signup.nameLabel') <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('name') is-invalid  @enderror" placeholder="@lang('signup.nameLabel')" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                        <span class="invalid-feedback" id="name-validation-error" role="alert">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="companyName" class="label-text col-md-3"> @lang('signup.companyNameLabel')  <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('companyName') is-invalid  @enderror" placeholder="@lang('signup.companyNameLabel') " id="companyName" name="companyName" value="{{ old('companyName') }}">
                            @error('companyName')
                         <span class="invalid-feedback" role="alert" id="companyName-validation-error">
                             {{ $message }}
                         </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="jobTitle" class="label-text col-md-3"> @lang('signup.jobTitleLabel')   <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('jobTitle') is-invalid  @enderror" placeholder="@lang('signup.jobTitleLabel')  " id="jobTitle" name="jobTitle" value="{{ old('jobTitle') }}">
                            @error('jobTitle')
                         <span class="invalid-feedback" role="alert" id="jobTitle-validation-error">
                          {{ $message }}
                         </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="address" class="label-text col-md-3"> @lang('signup.companyAddressLabel') <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('address') is-invalid  @enderror" placeholder="@lang('signup.companyAddressLabel') " id="address" name="address" value="{{ old('address') }}">
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
                        <input type="text" class="form-control @error('phone') is-invalid  @enderror" placeholder="@lang('signup.mobileNumberLabel')" id="phone" name="phone" value="{{ old('phone') }}">
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
                        <input type="email" class="form-control @error('email_customer') is-invalid  @enderror" placeholder="@lang('signup.emailAddressLabel')" id="email_customer" name="email_customer" value="{{ old('email_customer') }}">
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
                        <input type="text" class="form-control @error('username') is-invalid  @enderror" placeholder="@lang('signup.userNameLabel')" id="username" name="username" value="{{ old('username') }}">
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
                            <div>
                        <input type="password" id="password-field"  class="form-control @error('password') is-invalid  @enderror" placeholder="@lang('signup.passwordLabel')" id="password" name="password" value="{{ old('password') }}"> <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> </div>
                            @error('password')
                            
                        <span class="invalid-feedback" role="alert" id="password-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="password" class="label-text col-md-3"> @lang('signup.confirmPasswordLabel')   <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="password" id="password_confirmation-field" class="form-control @error('password_confirmation') is-invalid  @enderror" placeholder="@lang('signup.confirmPasswordLabel') " id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"> <span toggle="#password_confirmation-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('password_confirmation')
                        <span class="invalid-feedback" role="alert" id="password_confirmation-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-check mb-2 mr-sm-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input @error('general_condition') is-invalid  @enderror" name="general_condition" id="general_condition">
                            <p class="label-text-check pt-1" inline> &nbsp &nbsp  <a href="{{route('terms-of-service')}}" target="_blank" class="label-text-check-anchor">@lang('signup.iAccept') @lang('signup.generalConditions')</a> </p>
                            @error('general_condition')
                            <span class="invalid-feedback" role="alert" id="general_condition-validation-error">
                                  {{ $message }}
                            </span>
                            @enderror
                        </label>
                    </div>



                    <div class="form-group" >
                        <div class=" col-md-3 col-md-offset-5" style=" margin-top:20px;">

                        <center> <button type="submit" value="subscribe" class="genric-btn btn-lg success radius" id="btn-validate" style="border: 1px solid white;border-radius: 3px;" onclick="myFunction()">
						Envoyer</button>  </center>

                              <!--  <center> <button type="submit" value="subscribe" class="genric-btn success radius" id="btn-validate" style="border: 1px solid white;border-radius: 3px;" onclick="myFunction()">Valider</button> </center> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <style>
        .field-icon {
        float: right;
        padding-right:25px;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        }
input{
    text-transform: none!important;

}

#succ-btn:hover , #succ-btn:active{
    background-color:#f9b634;
}
        
</style>

        </div>
        </div>
    </div>
    </div>
    </section>
<script>
                $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
            input.attr("type", "text");
            } else {
            input.attr("type", "password");
            }
            });

            $(".toggle-password_confirmation").click(function() {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password_confirmation") {
                input.attr("type", "text");
                } else {
                input.attr("type", "password_confirmation");
                }
                });



</script>


<style>
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }
</style>
@endsection
