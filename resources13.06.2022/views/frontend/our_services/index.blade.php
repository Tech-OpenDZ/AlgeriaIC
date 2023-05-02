@extends('frontend.layouts.master')
@section('head')
	<meta charset="UTF-8">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@lang('our_services.title') | @lang('our_services.algeria_invest')</title>
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



				<section id="service">
					<div class="container" style="padding-top:15px">
						<div class="row " style="left:0;right:0 ;max-width: 100%;margin-left: 0px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
							<div class="serv_bac" style="height:180px;width:100%">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 section_title" style="padding-top:80px; float:left;">
									<h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:35px">@lang('our_services.assistance_services')</h4>
								</div>

								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 section_title" style="float:right;padding-top:59px">
									<p style="color: #ffffff;padding:0px!important" class="d-none d-lg-block">@lang('home.services_sub_title')</p>
								</div>
							</div>
						</div>

						<div class="row align-content-center justify-content-center" style=" margin-right:0px;margin-left:0px; background-color:#f5f5f5;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black">
						<!--<div class="section_title text-center">
						<p style="color:#000000">@lang('home.services_sub_title')</p>
						</div> -->
							<!--START SINGLE SERVICE AREA-->
							@php
								$i = 0
							@endphp

							@if(count($assistance_services)>0)
								@foreach($assistance_services as $services_data)
									@php
										$i++
									@endphp

									<div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                                     
										<div class="single_service " style="background-color: #FFFFFF; box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);width:100%">
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


												<a href="#" ><h4 class="single_service-heading" class="link-info" data-toggle="modal" data-target="#modal0{{$i}}">{{$services_data->localeAll[0]->title}}</h4></a>

												<p class="d-none d-sm-block d-lg-block d-md-block">{{$services_data->localeAll[0]->description}}</p>


											</div>

											<!-- Button trigger modal -->


											<style>
												a:hover, a:active{
													color:#ffffff;
												}
											</style>

											<!-- Modal -->
										  
											<div class="modal fade" id="modal0{{$i}}" tabindex="-1" role="dialog" aria-labelledby="modal0{{$i}}" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
													<style>
														@media only screen and (max-width: 767px) {
															.modal.show .modal-dialog {
																	
																	padding-top: 172px;
																}
															}

														
													</style>
													<div class="modal-content">
														<div class="modal-header">

															<center> <h5 class="modal-title" id="modal0{{$i}}" style="text-align:center"> <p class="sub-heading-two">{{$services_data->localeAll[0]->title}}   </h5> </center>

															<button class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body" id="TheBodyContent">
															<!-- <h1>$services_data->localeAll[0]->title}</h1> -->
															<iframe width="100%" height="570" name="submitter" src="{{route('contact_post')}}">


															</iframe>



														</div>

													</div>

												</div>

											</div>
											

											<center><a href="#" data-toggle="modal" data-target="#modal0{{$i}}"  style="width:330px" class="button arrow m-s" >
												@lang('our_services.detail') 
											</a></center>
                                          
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
									<br>
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
	<script >


		$(document).ready(function () {

			$("#submitForm").submit(function(e) {

				e.preventDefault(); // avoid to execute the actual submit of the form.

				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				var username = $('#username').val();
				var company = $('#company').val();
				var jobtitle = $('#jobtitle').val();
				var phone = $('#phone').val();
				var email = $('#mail').val();
				var subject = $('#subject').val();
				var message = $('#message').val();

				$('#usernameError').addClass('d-none');
				$('#companyError').addClass('d-none');
				$('#jobtitleError').addClass('d-none');
				$('#phoneError').addClass('d-none');
				$('#emailError').addClass('d-none');
				$('#subjectError').addClass('d-none');
				$('#messageError').addClass('d-none');


				$.ajaxSetup({
					type: 'POST',
					async: true,
					url: '/our-services',
					data: {_token: CSRF_TOKEN,
						username:username,
						company:company,
						jobtitle:jobtitle,
						phone:phone,
						email:email,
						subject:subject,
						message:message,
					},

					success:function(data){
						$('#modal01').modal('show');

						var success = data.responseJSON;
						alert('Votre message a bien été reçu. Notre équipe commerciale vous répondra dans les meilleurs délais');
					},


					error:function(data){
						$('#modal01').modal('show');

						var errors = data.response.json();
						if($.isEmptyObject(errors) == false){
							$.each(errors.errors,function(key, value){
								var ErrorID = '#' + key + 'Error';
								$(ErrorID).removeClass('d-none');
								$(ErrorID).text(value);
							});
						}
					}
				});
			});
		});


		function openModal(){
			$('#modal0{{$i}}').modal('show')
		}
	</script>
	<script src="{{ asset('js/front-end/browser-class.js') }}"></script>
	<!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
	<!-- Please keep your own scripts above main.js -->
	<script src="{{ asset('js/front-end/main.js') }}"></script>
@endsection
