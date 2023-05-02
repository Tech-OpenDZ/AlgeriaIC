@extends('frontend.layouts.master')
@section('head')
	<meta charset="UTF-8">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@lang('our_services.title') | @lang('our_services.algeria_invest')</title>
	<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
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
							<ol class="breadcrumb-area">
								<!--<li class="breadcrumb-elements"><a href="{{ route('customer-home')}}">@lang('our_services.home_title')</a></li>
								<li class="active">@lang('our_services.services_title')</li> -->
							</ol>
						</div>
					</div>
				</div>

				<section id="service">
					<div class="container2">
						<div class="row" style="background-color: #f9b634;width:1140px;margin-left: -8px;">
							<div class="serv_bac col-md-12" style="height:180px">
								<div class="section_title text-center" style="padding-top:80px;padding-left: 75px">
									<h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:0px">@lang('our_services.assistance_services')</h4>
<br>
									
								</div>


							</div>
						</div>

						<div class="row">
						<div class="section_title text-center">
						<p style="color:#000000">@lang('home.services_sub_title')</p>
						</div>
							<!--START SINGLE SERVICE AREA-->
							@php
								$i = 0
							@endphp

							@if(count($assistance_services)>0)
								@foreach($assistance_services as $services_data)
									@php
										$i++
									@endphp

									<div class="col-lg-4 col-md-6 col-sm-6 mt-4">
		
										<div class="single_service" style="background-color: #FFFFFF; box-shadow: 10px 10px 10px rgb(0 0 0 / 10%)">
											<script type="text/javascript">
												$(document).ready(function() {
													$('.single_service').bind("mouseover", function(){
														var color  = $(this).css("background-color");

														$(this).css("background", "#f9b634");

														$(this).bind("mouseout", function(){
															$(this).css("background", "#FFFFFF");
														})
													})
												})
											</script>
											<div class="single_service-left">
												<div class="icon">

													<?php
													$services_image =$services_data->services_image;
													$service_icon =  trim($services_image, '"');
													echo $service_icon ;
													?>

												</div>
											</div>








											<div class="single_service-body">


												<a href="#"><h4 class="single_service-heading" class="link-info" data-toggle="modal" data-target="#modal0{{$i}}">{{$services_data->localeAll[0]->title}}</h4></a>

												<p>{{$services_data->localeAll[0]->description}}</p>
											</div>


											<!-- Button trigger modal -->
											<a href="#" data-toggle="modal" data-target="#modal0{{$i}}" class="m-s" >
												@lang('our_services.detail') »
											</a>

											<style>
												a:hover, a:active{
													color:#ffffff;
												}
											</style>

											<!-- Modal -->
											<div class="modal fade" id="modal0{{$i}}" tabindex="-1" role="dialog" aria-labelledby="modal0{{$i}}" aria-hidden="true" >
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">

															<center> <h5 class="modal-title" id="modal0{{$i}}" style="text-align:center"> <p class="sub-heading-two">{{$services_data->localeAll[0]->title}}   </h5> </center>

															<button class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<!-- <h1>$services_data->localeAll[0]->title}</h1> -->



															<form action="{{ route('contactus-store')}}" id="" method="post" role="form" name="">
																<!-- <input type="hidden" name="_token" value="xGzBpHhXYtVE2LedXMGFij3hkk6HGdqxoP0UZzxx">                                            <h1 class="main-heading mb-3"><center>Laissez-nous un message </center></h1>
                                                                <p class="mb-1"><center> Une réponse vous sera adressée dans les meilleurs délais.  <br> <br> </center></p>

                                                                 <div class="success-alert-msg">
                                                                    <center> Merci de nous contacter, je vous répondrai bientôt </center>
                                                                </div><br> -->
																@csrf

																<center> <h1 class="main-heading mb-3">@lang('inquiry.contact_us')</h1> <br></center>
																<center> <p class="mb-1">@lang('inquiry.contact_us_desc')</p> <br><br> </center>

																@if( Session::has( 'success' ))
																	<div class="success-alert-msg">
																		{{ Session::get( 'success' ) }}
																	</div><br>

																@elseif( Session::has( 'error' ))
																	<div class="danger-alert-msg col-md-12">
																		{{ Session::get( 'error' ) }}
																	</div><br>
																@endif

																@csrf
																<div class="row">
																	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <div>
																		<label for="username" class="label-text">@lang('inquiry.user_name') <span class="required">*</span></label>
																		<input type="text" class="form-control @error('username') is-invalid  @enderror" placeholder="" id="username" name="username" value="{{ old('username') }}">
																		@error('username')
																		<span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
																		@enderror

																	</div> &nbsp &nbsp &nbsp &nbsp &nbsp

																	<div>
																		<label for="company" class="label-text">@lang('inquiry.company') <span class="required">*</span></label>
																		<input type="text" class="form-control @error('company') is-invalid  @enderror" placeholder="" id="company" name="company" value="{{ old('company') }}">
																		@error('company')
																		<span class=" invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
																		@enderror

																	</div>
																	</br>
																</div>
																</br>
																<div class="row">
																	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <div>
																		<label for="jobtitle" class="label-text">@lang('inquiry.job_title') <span class="required">*</span></label>
																		<input type="text" class="form-control @error('job_title') is-invalid  @enderror" placeholder="" id="jobtitle" name="job_title" value="{{ old('job_title') }}">
																		@error('job_title')
																		<span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
																		@enderror
																	</div> &nbsp &nbsp &nbsp &nbsp &nbsp
																	</br>

																	<div>
																		<label for="phone" class="label-text">@lang('inquiry.phone_number') <span class="required">*</span></label>
																		<input type="tel" class="form-control @error('phone_number') is-invalid  @enderror" placeholder="" id="phone" name="phone_number" value="{{ old('phone_number') }}">
																		@error('phone_number')
																		<span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
																		@enderror
																	</div>
																	</br>
																</div>
																</br>
																<div class="row ">
																	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <div>
																		<label for="email" class="label-text">@lang('inquiry.email') <span class="required">*</span></label>
																		<input type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="" id="email" name="email" value="{{ old('email') }}">
																		@error('email')
																		<span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
																		@enderror
																	</div>   &nbsp &nbsp &nbsp &nbsp &nbsp
																	</br>

																	<div>
																		<label for="subject" class="label-text">@lang('inquiry.subject') <span class="required">*</span></label>
																		<input type="text" class="form-control @error('subject') is-invalid  @enderror" placeholder="" id="subject" name="subject" value="{{ old('subject') }}">
																		@error('subject')
																		<span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
																		@enderror
																	</div>
																	</br>
																</div>
																</br>
																<div class="row">
																	<div class="col-md-12 col-lg-12 col-sm-12 mt-3">
																		<label for="message" class="label-text">@lang('inquiry.message') <span class="required">*</span></label>
																		<textarea class="form-control @error('message') is-invalid  @enderror" id="message" rows="3" name="message">{{ old('message') }}</textarea>
																		@error('message')
																		<span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
																		@enderror
																	</div>

																</div>
																</br>
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

																<center><div>
																<button type="submit" value="subscribe" class="common-button mt-4" onclick="myFunction()">@lang('inquiry.send_message')</button>
																	&nbsp &nbsp &nbsp <button type="button" class="common-button mt-4 " data-dismiss="modal">Fermer </button>
																</div></center>

															</form>

															<script>

																function onClick(element) {
																	document.getElementById("modal01").src = element.src;
																	document.getElementById("modal01").style.display = "block";
																}

																function myFunction() {
																	alert('Votre message a bien été reçu. Notre équipe commerciale vous répondra dans les meilleurs délais');
																	location.replace("http://127.0.0.1:8000/our-services")
																}

															</script>



														</div>
														<?php
														header("Location:http://127.0.0.1/our-services");
														?>

													</div>

												</div>

											</div>


										</div>

									</div><!--/END SINGLE SERVICE AREA-->



							@endforeach
						@endif

						<!-- <div class="offer-services m-auto">
				<a href="{{asset('storage/uploads/services/'.$our_services->localeAll[0]->files)}}" download="services">
					<div class="common-button">
						<div class="services-offers-button d-flex align-items-center">
							<div class="services-download-img">
								<img src="{{asset('images/download-icon.svg')}}" class="img-fluid">
							</div>
							<div class="services-download-offer">
								<P class="text-white">@lang('our_services.download_our')</P>
								<P class="text-white">@lang('our_services.services_offer')</P>
							</div>
						</div>

					</div>
				</a>
			</div> -->


							<div class="offer-services m-auto" style="box-shadow: 10px 10px 10px rgb(0 0 0 / 10%)">
								<a href="{{asset('storage/uploads/services/'.$our_services->localeAll[0]->files)}}" download="services">
									<div class="down-button">
										<div class="services-offers-button d-flex align-items-center">

											<div class="services-download-img">
												<img src="{{asset('images/download-icon.svg')}}" class="img-fluid"> &nbsp &nbsp
											</div>

											<div class="services-download-offer">
												<P class="text-white">@lang('our_services.download_our')</P>
												<P class="text-white">@lang('our_services.services_offer')</P>

											</div>

										</div>

									</div>
								</a>
							</div>

						</div>
						<br>
					</div>
				</section>

			</div>
		</div>
	</div>
	<!-- services-section-end -->



@endsection

@section('scripts')
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
