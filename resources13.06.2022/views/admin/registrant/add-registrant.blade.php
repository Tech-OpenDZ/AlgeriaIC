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
    <div class="pull-right">
        <a class="btn btn-primary" href="/admin/manage-registrant">Retour</a>
    <!-- <a class="btn btn-primary" href="{{ url()->previous() }}" disabled>Modifier</a> -->
    </div>

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




   

    <div class="container">

       <div class="row ">

       <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-10 col-md-offset-1  col-sm-10 ">
            <div class="panel panel-info">
                 <div class="panel-heading">
                 <div class="panel-title" style="text-align: center">AJOUTER UN NOUVEL INSCRIT </div>
            </div>

            <div class="panel-body" >
                <form id="" class="form-horizontal" role="form" method="post" action="{{route('registrant-storeAdmin')}}">
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
                    <style>
                        .success-alert-msg {
                            color: #35A85E !important;
                            font-weight: 700;
                            font-size: 1.2rem !important;
                            padding-top: 0px;
                            position: inherit;
                            center: center;
                            padding-left: 10px!important;
                            background-color: rgba(250,250,250,0.8);
                            text-align: -webkit-center;
                        }

                    </style>

                

                    <div class="form-group">
                        <label for="username" class="label-text col-md-3"> Nom et Prénom <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('username') is-invalid  @enderror" placeholder="Nom et Prénom " id="username" name="username" value="{{ old('username') }}">
                            @error('username')
                        <span class="invalid-feedback" id="username-validation-error" role="alert">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>
					
					  <div class="form-group">
                        <label for="job_title" class="label-text col-md-3"> Intitulé de poste  <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('job_title') is-invalid  @enderror" placeholder="Intitulé de poste " id="job_title" name="job_title" value="{{ old('job_title') }}">
                            @error('job_title')
                         <span class="invalid-feedback" role="alert" id="job_title-validation-error">
                          {{ $message }}
                         </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="company" id="company" class="label-text col-md-3"> Nom de l'entrprise <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('company') is-invalid  @enderror" placeholder="Nom de l'entrprise" id="company" name="company" value="{{ old('company') }}">
                            @error('company')
                         <span class="invalid-feedback" role="alert" id="company-validation-error">
                             {{ $message }}
                         </span>
                            @enderror
                        </div>
                    </div>


                  

                 
                      <div class="form-group">
                        <label for="email" class="label-text col-md-3">@lang('signup.emailAddressLabel') <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="@lang('signup.emailAddressLabel')" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                        <span class="invalid-feedback" role="alert" id="email-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>


                    
                   

                    <div class="form-group">
                        <label for="phone_number" class="label-text col-md-3">@lang('signup.mobileNumberLabel') <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('phone_number') is-invalid  @enderror" placeholder="@lang('signup.mobileNumberLabel')" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                            @error('phone_number')
                        <span class="invalid-feedback" role="alert" id="phone_number-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>


                  

               


                    <div class="form-group">
                        <label for="message" class="label-text col-md-3"> Message <!-- <span class="required" style="color: red">*</span> --></label>
                        <div class="col-md-9">
                        <textarea  id="message-field" class="form-control @error('message') is-invalid  @enderror"  rows="6" placeholder="Commentaire" name="message" value=""> </textarea>
                            @error('message')
                        <span class="invalid-feedback" role="alert" id="password_confirmation-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label for="note_events" class="label-text col-md-3"> Commentaire <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <textarea  id="note_events-field" class="form-control @error('note_events') is-invalid  @enderror" rows="6" placeholder="note_events" name="note_events" value=""> </textarea>
                            @error('note_events')
                        <span class="invalid-feedback" role="alert" id="note_events-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>


                 



                    <div class="form-group" >
                        <div class=" col-md-4 col-md-offset-5" style=" margin-top:20px;">

                             <button type="submit" class="btn btn-info col-md-12" id="continue_button" style="background-color: deepskyblue"> Valider </button>

                              <!--  <center> <button type="submit" value="subscribe" class="genric-btn success radius" id="btn-validate" style="border: 1px solid white;border-radius: 3px;" onclick="myFunction()">Valider</button> </center> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>



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
<script>

document.getElementById('pays').onchange = function () 
{
  

    if ((this.value == 'Algérie'))
    {
        document.getElementById("pays").value = "Algérie";
        document.getElementById("wilaya").hidden = false;
        document.getElementById("wilayaLabel").hidden = false;
    }
    else   if ((this.value == 'zz'))
    {
        document.getElementById("wilaya").hidden = true;
        document.getElementById("wilayaLabel").hidden = true;
    }

    else 
    {
        //document.getElementById("wilaya").value = document.getElementById("pays").value;
        document.getElementById("wilaya").hidden = true;
        document.getElementById("wilayaLabel").hidden = true;
    }


   
}


document.getElementById('contact-inquiry').onchange = function () 
{
  

    if ((this.value == 'Entreprise'))
    {
        document.getElementById("companyName").hidden = false;
        
        document.getElementById("companyNameLabel").hidden = false;
    }

    else 
    {
        document.getElementById("companyName").hidden = true;
        document.getElementById("companyNameLabel").hidden = true;
        document.getElementById("companyName").value = "Particulier";
    }


   
}
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
