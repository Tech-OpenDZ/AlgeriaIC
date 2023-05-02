@extends('frontend.layouts.master')
@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @lang('inquiry.breadcrumb_contactus') | @lang('news.placeName')</title>
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
                <div class="title-arrow text-white" style="background-color:#f9b634; height:40px;border-bottom:2px solid #ffb400;border-top: 1px solid #e6e5ea;border:0px solid black; box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
                    <div class="row" style="margin-left: 3.5vw;">
                        <div align="center">
                            <div class="section_title text-center" style="padding-top:7px">
                                <h4 class="subtitle mb-1" style="color:#FFFFFF; font-weight:bold">@lang('inquiry.breadcrumb_contactus')</h4>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="container1">

                    <div class="map">
                        <h4 class="sub-heading" style="text-align:center;color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%) ">{{ isset($address_title_main) ? $address_title_main :'' }}</h4>

                        <br> <br>
                    <div class="map-area orange-border">
                        <div>
                            <div>
                                <div class="map-area__left" style="text-align:center;height:250px">

                                    <iframe class="img1-fluid" src="https://maps.google.com/maps?q=36.735925608570234, 3.0868360987020544&amp;z=15&amp;output=embed" width="400" height="650" frameborder="0" style="border:0.5px solid black; box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)" class="img-fluid"></iframe>

                                </div>
                            </div>
                            <br><br><br><br><br><br>
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
                    </div>
                    </div>
                    <div class="contact-form inline-list">

                        <center><form action="{{ route('contactus-store')}}" method="post" role="form" name="">
                                @csrf
                                <h1 class="title main-heading mb-3" style="color:#FFFFFF">@lang('inquiry.contact_us')</h1>
                                <h2 class="subtitle mb-1" style="color:#FFFFFF">@lang('inquiry.contact_us_desc')</h2>
                                <br><br>

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
                                <center><div>
                                <input type="text" class="form-control @error('username') is-invalid  @enderror" placeholder ="@lang('inquiry.user_name')" id="username" name="username" value="{{ old('username') }}">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div></center>
                                    



                                <center><div style="padding-top:2px">
                                <input type="text" class="form-control @error('company') is-invalid  @enderror" placeholder="@lang('inquiry.company') " id="company" name="company" value="{{ old('company') }}">
                                @error('company')
                                <span class=" invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div></center>



                                <center><div style="padding-top:2px">
                                <input type="text" class="form-control @error('job_title') is-invalid  @enderror" placeholder="@lang('inquiry.job_title')" id="jobtitle" name="job_title" value="{{ old('job_title') }}">
                                @error('job_title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div></center>

                                <center><div style="padding-top:2px">
                                <input type="tel" class="form-control @error('phone_number') is-invalid  @enderror" placeholder="@lang('inquiry.phone_number')" id="phone" name="phone_number" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div></center>


                                <center><div style="padding-top:2px">
                                <input type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="@lang('inquiry.email') " id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div></center>


                                <center><div style="padding-top:2px">
                                <input type="text" class="form-control @error('subject') is-invalid  @enderror" placeholder="@lang('inquiry.subject')" id="subject" name="subject" value="{{ old('subject') }}">
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div></center>


                                <center><div style="padding-top:3px">
                                <textarea class="form-control @error('message') is-invalid  @enderror" id="message" rows="3" placeholder="@lang('inquiry.message') " name="message">{{ old('message') }}</textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                    </div></center>


                                <div align="center" style="padding-top:2px">
                                    <div>
                                        <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                        @if($errors->has('g-recaptcha-response'))
                                            <span class="invalid-feedback" style="display:block">
                                                <strong> {{$errors->first('g-recaptcha-response')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <center> <button type="submit" value="subscribe" class="common-button mt-4" id="btn-validate" onclick="myFunction()">@lang('inquiry.send_message')</button> </center>
                                <br>
                        </form> </center>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- services-section-end -->
 

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
