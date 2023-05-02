@extends('frontend.layouts.master')
@section('head')
<style type="text/css">
	.message_success{
		color: #35A85E!important;
        font-size: 0.75rem;
        font-weight: 800;
	}
</style>
@endsection
@section('content')
<div class=" reset-password">
	<div class="reset-area">
		<div class="modal-content">
			<div>
				<div class="container">
					 <div class="row">
					 	<div class="col-md-7 col-sm-5 col-xs-4 no-padding">
					 		<div class="login-modal__left d-flex justify-content-center align-center forgot-password-left">
					 			<img src="{{asset('css/images/reset-password.svg')}}" alt="fogot-password" class="img-fluid">
					 		</div>
					 	</div>
					 	<div class="col-md-5 col-sm-7 col-xs-8 no-padding grey-border">
					 		<div class="login-modal__right">
					 			<div class="login-modal__right--form">
					 				<div class="container form-width">
					 					{{ Form::open(['method' => 'post', 'route' => 'customer-change-password', 'class' => 'form-elements reset_formelements']) }}
						 					@if(session()->has('success'))
			                                    <span class="" role="alert" style="">
			                                        <p class="message_success mb-4 text-left">
			                                            @lang('resetpassword.change_success')
			                                        </p>
			                                    </span>
		                                    @endif 
					 						<h4 class="main-heading text-left">@lang('resetpassword.change_passwordheader')</h4>
					 						<p class="mt-3 text-left password-link-text">@lang('resetpassword.change_passwordsubheader')</p>
					 						<div class="form-group login-name">
					 							<label for="password" class="password_label">@lang('resetpassword.change_firstlable')</label>
					 							<input type="password" class="password_hide form-control @error('current_password') is-invalid @enderror" placeholder=""  name="current_password">
					 							@if(session()->has('error'))
		                                            <span class="invalid-feedback" role="alert" style="display: block">
		                                                 <strong>
		                                                 	@lang('resetpassword.password_error')
		                                                 </strong>
		                                             </span>
                                                @endif
					 							@error('current_password')
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                  				@enderror
					 						</div>
					 						<div class="form-group login-name">
					 							<label for="password" class="password_label">@lang('resetpassword.change_secondlable')</label>
					 							<input type="password" class="password_hide form-control @error('new_password') is-invalid @enderror" placeholder=""  name="new_password">

					 							@error('new_password')
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                  				@enderror
					 						</div>
					 						<div class="form-group login-name">
					 							<label for="password" class="password_label">@lang('resetpassword.change_thirdlable')</label>
					 							<input type="password" class="password_hide form-control @error('confirm_password') is-invalid @enderror" placeholder="" id="email" name="confirm_password">

					 							@error('password_confirmation')
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
                                  				@enderror
					 						</div>
					 						<button type="submit" class="common-button mt-3 password_hide">
					 						@lang('resetpassword.change_passwordButton')</button>
					 					{!! form::close() !!}
					 					<div class="login-bottom-buttons">
					 						<div class="privacy-policy-grid">
					 							<ul class="privacy-policy-grid__elements">
					 								<li><a href="#" class="pricay-btn">@lang('signup.privacyPolicy')</a></li>
                                                     <li><a href="#" class="pricay-btn">@lang('signup.legalNotices')</a></li>
                                                    <li><a href="#" class="pricay-btn">@lang('signup.termsOfServices')</a></li>
                                                </ul>
                                                 <p class="i2b mt-3">@lang('signup.i2b')<a href="#"><img src="{{asset('css/images/i2b-big.svg')}}" alt="i2b" class="img-fluid ml-2"></a></p>   
					 						</div>
					 					</div>
					 				</div>
					 			</div>
					 		</div>
					 	</div>
					 </div>
				</div>
			</div>
		</div>
	</div>
</div>

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