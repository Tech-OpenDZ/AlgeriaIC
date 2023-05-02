@extends('admin.layouts.master')
@section('head')
    <style type="text/css">
        .dataTables_filter{
            display: none;
        }
    </style>
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
@endsection
@section('content')
    @include('alert_messages')

    <div class="pull-right">
        <a class="btn btn-primary" href="/admin/manage-registrant">Retour</a>
    <!-- <a class="btn btn-primary" href="{{ url()->previous() }}" disabled>Modifier</a> -->
    </div>

    <div class="container">

        <div class="row ">

            <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-10 col-md-offset-1  col-sm-10 ">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title" style="text-align: center"> Mise à jour  enregistrement  </div>
                    </div>

                    <div class="panel-body" style="center:center">

                        <form id="" class="form-horizontal" role="form" method="post" action="{{ route('updateRegistrant') }}">
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
                                        font-size: 1.2rem !important;
                                        padding-top: 0px;
                                        position: inherit;
                                        center: center;
                                        padding-left: 10px!important;
                                        background-color: rgba(250,250,250,0.8);
                                        text-align: -webkit-center;
                                    }

                                </style>


                            @elseif( Session::has( 'error' ))
                                <div class="danger-alert-msg col-md-12">
                                    {{ Session::get( 'error' ) }}
                                </div><br>
                            @endif

                            <div class="form-group">
                               <!-- <label for="name" class="label-text col-md-3">ID  <span class="required" style="color: red">*</span></label> -->
                                <div class="col-md-9">
                                    <input type="hidden" class="form-control @error('id') is-invalid  @enderror"  id="id" name="id" value="{{$row->id}}" readonly>
                                    @error('id')
                                    <span class="invalid-feedback" id="id-validation-error" role="alert">
                            {{ $message }}
                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name" class="label-text col-md-3">Nom et Prénom  <span class="required" style="color: red">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control @error('username') is-invalid  @enderror"  id="username" name="username" value="{{$row->username}}" >
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
                                    <input type="text" class="form-control @error('job_title') is-invalid  @enderror"  id="job_title" name="job_title" value="{{ $row->job_title }}">
                                    @error('job_title')
                                    <span class="invalid-feedback" role="alert" id="job_title-validation-error">
                          {{ $message }}
                         </span>
                                    @enderror
                                </div>
                            </div>
							
							    <div class="form-group">
                                <label for="companyName" id="company" class="label-text col-md-3"> Nom de l'entrprise <span class="required" style="color: red">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control @error('company') is-invalid  @enderror"  id="company" name="company" value="{{$row->company }}">
                                    @error('company')
                                    <span class="invalid-feedback" role="alert" id="company-validation-error">
                             {{ $message }}
                         </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name" class="label-text col-md-3"> Email <span class="required" style="color: red">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control @error('email') is-invalid  @enderror"  id="email" name="email" value="{{ $row->email}}">
                                    @error('email')
                                    <span class="invalid-feedback" id="email-validation-error" role="alert">
                            {{ $message }}
                        </span>
                                    @enderror
                                </div>
                            </div>


                        


                            


                            <div class="form-group">
                                <label for="phone_number" class="label-text col-md-3">Numéro de téléphone <span class="required" style="color: red">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control @error('phone_number') is-invalid  @enderror"  id="phone_number" name="phone_number" value="{{ $row->phone_number }}">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert" id="phone_number-validation-error">
                            {{ $message }}
                        </span>
                                    @enderror
                                </div>
                            </div>



                           


                            <div class="form-group">
                                <label for="message" class="label-text col-md-3">Message <span class="required" style="color: red">*</span></label>
                                <div class="col-md-9">
                                    <textarea  id="message-field" class="form-control @error('message') is-invalid  @enderror" rows="6"  name="message" value=""> {{ $row->message }} </textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert" id="message-validation-error">
                            {{ $message }}
                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note_events" class="label-text col-md-3"> Commentaire <span class="required" style="color: red">*</span></label>
                                <div class="col-md-9">
                                    <textarea  id="note-field" class="form-control @error('note_events') is-invalid  @enderror"  rows="6" placeholder="note_events" name="note_events" value=""> {{ $row->note_events }} </textarea>
                                    @error('bote_confirmation')
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

                <style>
                    .success-alert-msg {
                        color: #35A85E !important;
                        font-weight: 700;
                        font-size: 1.2rem !important;
                        padding-top: 0px;
                        position: absolute;
                        center: center;
                        text-align:center;
                        padding-left: 210px !important;
                    }
                </style>

            </div>
        </div>
    </div>
@endsection
