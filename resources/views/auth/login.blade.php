<!DOCTYPE html> 

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title> Login </title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ asset('dist/assets/css/pages/login/login-1.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('dist/assets/plugins/global/plugins.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('dist/assets/css/style.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ asset('dist/assets/css/themes/layout/header/base/light.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('dist/assets/css/themes/layout/header/menu/light.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('dist/assets/css/themes/layout/brand/dark.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('dist/assets/css/themes/layout/aside/dark.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/algeria-favicon.svg')}}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<!--begin::Aside-->
				<div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
					<!--begin::Aside Top-->
					<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
						<!--begin::Aside header-->
						<a href="#" class="text-center mb-10">
							<img src="{{ asset('css/images/logo_algeria_invest_final.svg') }}" class="max-h-70px" alt="" />
						</a>
						<!--end::Aside header-->
						<!--begin::Aside title-->
						<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Discover Amazing Metronic
						<br />with great build tools</h3>
						<!--end::Aside title-->
					</div>
					<!--end::Aside Top-->
					<!--begin::Aside Bottom-->
					<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(dist/assets/media/svg/illustrations/login-visual-1.svg)"></div>
					<!--end::Aside Bottom-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-center">
						<!--begin::Signin-->
						<div class="login-form login-signin">
							@if (session('status'))

							<div class="alert alert-custom alert-notice alert-light-primary fade show mb-5" role="alert">
    							<div class="alert-text">{{ session('status') }}</div>
								<div class="alert-close">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">
										<i class="ki ki-close"></i>
										</span>
									</button>
								</div>
							</div><br />
							@endif
							<!--begin::Form-->
							{{ Form::open(['method' => 'post', 'route' => 'admin.login.submit', 'id' => 'kt_login_signin_form']) }}
								
                                @csrf
									@if ($errors->any())
									@foreach ($errors->all() as $error)
									<div class="alert alert-custom alert-notice alert-light-danger fade show mb-5" role="alert">
										<div class="alert-text">{{ $error}}</div>
										<div class="alert-close">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">
													<i class="ki ki-close"></i>
												</span>
											</button>
										</div>
									</div>
									@endforeach
									@endif
									<div class="text-center pb-8">
										<h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h2>
									</div>
									<!--end::Title-->
									<!--begin::Form group-->
									<div class="form-group">
										{!! Form::label('email', 'Email',['class' => 'font-size-h6 font-weight-bolder text-dark']) !!}
										{!! Form::email('email', null,['class' => 'form-control form-control-solid h-auto py-7 px-6 rounded-lg','required' => 'true','id' =>'email']) !!}
				
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<!--end::Form group-->
									<!--begin::Form group-->
									<div class="form-group">
										<div class="d-flex justify-content-between mt-n5">
											{!! Form::label('password', 'Password',['class' => 'font-size-h6 font-weight-bolder text-dark']) !!}
											<a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Forgot Password ?</a>
										</div>
										{!! Form::password('password', ['class' => 'form-control form-control-solid h-auto py-7 px-6 rounded-lg','required'=> 'true','id'=>'password']) !!}
									</div>
									<!--end::Form group-->
									<!--begin::Action-->
									<div class="text-center pt-2">
										{!! Form::submit('Sign In', ['class' => 'btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3', 'id' => 'kt_login_signin_submit']) !!}
									</div>
									<!--end::Action-->
								{!! form::close() !!}

							<!--end::Form-->
						</div>
						<!--end::Signin-->
						<!--begin::Forgot-->
						<div class="login-form login-forgot">
							<!--begin::Form-->
							
							{!! Form::open(['method' => 'post', 'route' => 'password.email', 'id'=>'kt_login_forgot_form']) !!}
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
									<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
									<p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
								</div>
								<!--end::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									{!! Form::label('Email', 'Email',['class' => 'font-size-h6 font-weight-bolder text-dark']) !!}
									<input id="email" type="email" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group d-flex flex-wrap pb-lg-0">
									<button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
									<button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
								</div>
								<!--end::Form group-->
							{!! form::close() !!}
							<!--end::Form-->
						</div>
						<!--end::Forgot-->
					</div>
					<!--end::Content body-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ asset('dist/assets/plugins/global/plugins.bundle.js?v=7.0.4')}}"></script>
		<script src="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4')}}"></script>
		<script src="{{ asset('dist/assets/js/scripts.bundle.js?v=7.0.4')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('dist/assets/js/pages/custom/login/login.js?v=7.0.4')}}"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
<!-- <style>
    .login-aside{
        width: 100% !important;
        max-width: 100% !important;
    }
</style> -->