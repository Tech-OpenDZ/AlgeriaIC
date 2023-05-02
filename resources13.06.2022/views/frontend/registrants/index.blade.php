@extends('frontend.layouts.master')
@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Conference By Algeria Invest </title>
@endsection

@section('content')

    <!-- services-section -->
    <!--<section class="our-services-main">
		<div class="business-directory-main">
			<div class="discover-algeria">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12">
							<div class="discover-algeria__left">
								<ol class="breadcrumb-area">
									<li class="breadcrumb-elements"><a href="#">@lang('our_services.home_title')</a></li>
									<li class="active">@lang('our_services.services_title')</li>
								</ol> -->

    <div class="business-directory-main">
        <div class="discover-algeria">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="discover-algeria__left">
                            <!--<ol class="breadcrumb-area">
                                <li class="breadcrumb-elements"><a href="{{ route('customer-home')}}">@lang('our_services.home_title')</a></li>
                                <li class="active">@lang('inquiry.breadcrumb_contactus')</li>-->
                            </ol>
                        </div>
                    </div>
                </div>

               <!-- <div class="section_title text-center">
                    <h2>@lang('inquiry.breadcrumb_contactus')</h2>
                    <div class="brand_border">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                        <i class="fas fa-handshake"></i>
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </div>

                </div> -->

                @php
                    $address_title_main ='';
                    $telephone_main = '';
                    $address_main = '';
                    $email_main = '';
                    $address_title_secondary = '';
                    $telephone_secondary = '';
                    $email_secondary = '';
                    $address_secondary = '';
                    $lang_long_secondary = '';
                    $lang_long_main = '';

                    foreach($setting as $setting_data){
                        if($setting_data->key == 'address_title_main'){
                            $address_title_main = $setting_data->localeAll[0]->value;

                        }else if($setting_data->key == 'telephone_main') {
                            $telephone_main = $setting_data->value;

                        }else if($setting_data->key == 'address_main') {
                            $address_main = $setting_data->localeAll[0]->value;

                        }else if($setting_data->key == 'email_main') {
                            $email_main = $setting_data->value;

                        }else if($setting_data->key == 'address_title_secondary') {
                            $address_title_secondary = $setting_data->localeAll[0]->value;

                        }else if($setting_data->key == 'telephone_secondary') {
                            $telephone_secondary = $setting_data->value;

                        }else if($setting_data->key == 'email_secondary') {
                            $email_secondary = $setting_data->value;

                        }else if($setting_data->key == 'address_secondary') {
                            $address_secondary = $setting_data->localeAll[0]->value;

                        }else if($setting_data->key == 'lang_long_secondary') {
                            $lang_long_secondary = $setting_data->value;

                        }else if($setting_data->key == 'lang_long_main') {
                            $lang_long_main = $setting_data->value;

                        }
                    }
                @endphp

              <!--  <div class="title-arrow" style="padding: 50px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">

                    <div class="row" style="margin-left: 0vw;">
                        <div align="center">
                            <div class="section_title" style="padding-top:7px">
                                <h4 class="subtitle mb-1" style="color:#FFFFFF; font-weight:bold">@lang('inquiry.breadcrumb_contactus')</h4>         
                            </div>       
                            
                                              
                        </div>
                                              <div stylr="padding-top:30px">
                                                  <br>
                                                 &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <a href="/add-business-opportunity" class="login-in genric-btn success-border radius" style="cursor: pointer"  class="genric-btn success-border radius"> <strong> @lang('business_opportunity.breadcrumb_add_business_opportunities') </strong> </a>                                      
                                             </div>
                    </div>
                </div> -->
               
                <div class="container">
                <div class="row " style="left:0;right:0 ;max-width: 100%;margin-left: 0px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
							<div class="events_ins_heading" style="height:350px;width:100%">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 section_title" style="padding-top:80px; float:left;">
              <!--  <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:35px">Event Inscription</h4> -->
													
								
								
								</div>
								
							

								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 section_title" style="float:right;padding-top:50px;padding-left:50px">
                               
<!--			<p style="color: #ffffff;padding:0px!important;padding-right:15px; font-size:16px" class="d-none d-lg-block"><strong> @lang('inquiry.you can also submit an opportunity via') <a style="color:red;font-size:15px"href="/add-business-opportunity">  @lang('inquiry.the following link >>') </a> </strong> </p> -->
								</div>
							</div>
						</div>
                        <div class="row  justify-content-center" style=" margin-right:0px;margin-left:0px; background-color:#f5f5f5;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black">

                    <div class="map col-lg-5 col-md-6 col-sm-6 mt-4">
                        <!-- <h4 class="sub-heading" style="color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%) ">{{ isset($address_title_main) ? $address_title_main :'' }}</h4> -->
                            <h4 class="sub-heading" style="color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);text-align:center; ">A propos</h4>
                            <br>
<dl>
    <dt> <h3> Business reports </h3> </dt>
    <dd>    <h4>Algeria Invest vous propose une gamme complète de rapports, conçus pour vous aider à mesurer, analyser et optimiser la performance de votre entreprise afin d’améliorer le processus décisionnel. </h4>
     </dd>
</dl>

                            <dl>
                                <dt> <h3> Rapports d'analyses sectorielles </h3> </dt>
                                <dd>    <h4> Ces rapports vous permettent de tirer parti d’une industrie en tenant compte de ses tendances, ses concurrents, ses produits, sa clientèle et de l’histoire du secteur d’activité.</h4>
                                </dd>
                            </dl>

                            <dl>
                                <dt> <h3> Veille légale</h3> </dt>
                                <dd>    <h4> Ces rapports permettent à la fois d'anticiper les évolutions liées à l'adoption de la législation et de mieux appréhender les marchés soumis aux réglementations nationales.</h4>
                                </dd>
                            </dl>







                          <!-- <style>
                               @media (max-width: 768px){
                                   .sub-heading{
                                   padding-left: 97px;
                               }
                               }
                           </style> -->
                        <br> <br>
                    <!-- <div class="map-area orange-border">
                        <div>
                            <div>
                                <div class="map-area__left">

                                    <iframe class="img1-fluid" src="https://maps.google.com/maps?q=36.735925608570234, 3.0868360987020544&amp;z=15&amp;output=embed" width="95%" frameborder="0" style="border:0.5px solid black; box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)" class="img-fluid"></iframe>
Business reports
Algeria Invest vous propose une gamme complète de rapports, conçus pour vous aider à mesurer, analyser et optimiser la performance de votre entreprise afin d’améliorer le processus décisionnel.
                                </div>
                            </div>

                            <div>
                                <div class="map-area__right">

                                    <div>
                                        <br>
                                        <br>
                                        <div>
                                            <div class="contact-tel" style="
                                            text-align:center">
                                                <p class="tel-heading" style="color:#f9b634; font-size:25px ; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%) ">@lang('inquiry.telephone')</p>
                                                <ul>
                                               <li class="tel-heading-content" style="font-size:20px;color:#000000; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%) ">{{ isset($telephone_main) ? $telephone_main : ''  }}</li>

                                                </ul>
                                            </div>
                                        </div>
                                        <br>


                                        <div>
                                            <div class="contact-tel" style="text-align:center">
                                                <p class="tel-heading" style="color:#f9b634; font-size:25px; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">@lang('inquiry.email')</p>
                                                <p class="tel-heading-content" style="font-size:20px;color:#000000; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">{{ isset($email_main) ? $email_main : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="contact-tel" style="text-align:center">
                                        <p class="tel-heading" style="color:#f9b634; font-size:25px; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">@lang('inquiry.address')</p>
                                        <p class="tel-heading-content" style="font-size:20px;color:#000000; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">{{ isset($address_main) ? $address_main : '' }}
                                        </p>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div> -->
                    </div>
                    
                    <div class="contact-form inline-list col-md-12 col-lg-5 col-sm-12 mb-5 mt-4" style="background-color: #f9b634; text-align:center;color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%); ">
                           <br>
                     <form action="{{ route('registration-store')}}" method="post" role="form" name="">
                                @csrf
                                <h1 class="title main-heading mb-3" style="color:#FFFFFF">

                                    @lang('registrant.breadcrumb_registrant')
								
										
									</h1>
                                <h5 class="subtitle mb-1" style="color:#000000">
								
					
				      <b><i>	
                                <style>
                        #link:active, #link:hover {
                                color: #ffffff!important;
                            }
                        </style>
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
                              <br>

                              <center><div align="center">
                                <center><div align="center">
                                <input type="text" class="form-control @error('username') is-invalid  @enderror" placeholder ="@lang('registrant.user_name') * " id="username" name="username" value="{{ old('username') }}">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div></center>

                                 <br>


                                <center><div>
                                <input type="text" class="form-control @error('company') is-invalid  @enderror" placeholder="@lang('registrant.company') * " id="company" name="company" value="{{ old('company') }}">
                                @error('company')
                                <span class=" invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div></center>

                                <br>

                                <center><div>
                                <input type="text" class="form-control @error('job_title') is-invalid  @enderror" placeholder="@lang('registrant.job_title') * " id="jobtitle" name="job_title" value="{{ old('job_title') }}">
                                @error('job_title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div></center>
                                <br>

                                <center><div>
                                <input type="tel" class="form-control @error('phone_number') is-invalid  @enderror" placeholder="@lang('registrant.phone_number') * " id="phone" name="phone_number" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div></center>
                                <br>

                                <div>
                                <input type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="@lang('registrant.email') * " id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div>
                                <br>

                              

                                <div class="form-group">
                                   <!-- <label for="message"> Message </label> -->
                                <textarea class="form-control @error('message') is-invalid  @enderror" id="message" rows="3" placeholder="@lang('registrant.message')  " name="message">{{ old('message') }}</textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div>
                                <br>

                                <div>
                                    <div>
                                        <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                        @if($errors->has('g-recaptcha-response'))
                                            <span class="invalid-feedback" style="display:block">
                                                <strong> {{$errors->first('g-recaptcha-response')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <center> <button type="submit" value="subscribe" class="genric-btn success radius" id="btn-validate" style="border: 1px solid white;border-radius: 3px;" onclick="myFunction()">@lang('registrant.send_message') </button>  </center>
                                <br>
                        </form> 
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- services-section-end -->
 
    <style>
        
            input{
                text-transform: none!important;

            }
        
</style>
@endsection


@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->
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
