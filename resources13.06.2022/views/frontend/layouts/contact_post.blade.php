<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/bootstrap.min.css')}}">
	<title>Document</title>
</head>
<body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<form action="{{ route('contactus-store')}}" id="" method="post" role="form" name="" target="_self" style="padding-left:40px;padding-right:40px;">
	<!-- <input type="hidden" name="_token" value="xGzBpHhXYtVE2LedXMGFij3hkk6HGdqxoP0UZzxx">                                            <h1 class="main-heading mb-3"><center>Laissez-nous un message </center></h1>
    <p class="mb-1"><center> Une réponse vous sera adressée dans les meilleurs délais.  <br> <br> </center></p>

     <div class="success-alert-msg">
        <center> Merci de nous contacter, je vous répondrai bientôt </center>
    </div><br> -->
	@csrf

	<center> <h4 class="main-heading mb-3">@lang('inquiry.contact_us')</h4> </center>
	<center> <p>@lang('inquiry.contact_us_desc')</p> </center>

	@if( Session::has( 'success' ))
		<div class="success-alert-msg" style="color:green; text-align:center">
			{{ Session::get( 'success' ) }}
		</div>

	@elseif( Session::has( 'error' ))
		<div class="danger-alert-msg col-md-12">
			{{ Session::get( 'error' ) }}
		</div>
	@endif

	@csrf
	<div class="row">

		<div class="col-md-4 col-lg-4 col-sm-4 mt-3">
			<label for="username" class="label-text">@lang('inquiry.user_name') <span class="required">*</span></label>
			<input type="text" class="form-control @error('username') is-invalid  @enderror" placeholder="" id="username" name="username" value="{{ old('username') }}">
			@error('username')
			<span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
			@enderror

		</div>

		<div class="col-md-4 col-lg-4 col-sm-4 mt-3">
			<label for="company" class="label-text">@lang('inquiry.company') <span class="required">*</span></label>
			<input type="text" class="form-control @error('company') is-invalid  @enderror" placeholder="" id="company" name="company" value="{{ old('company') }}">
			@error('company')
			<span class=" invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
			@enderror

		</div>

		<div class="col-md-4 col-lg-4 col-sm-4 mt-3">
			<label for="jobtitle" class="label-text">@lang('inquiry.job_title') <span class="required">*</span></label>
			<input type="text" class="form-control @error('job_title') is-invalid  @enderror" placeholder="" id="jobtitle" name="job_title" value="{{ old('job_title') }}">
			@error('job_title')
			<span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
			@enderror
		</div>
	</div>
	

	<div class="row">



		<div class="col-md-4 col-lg-4 col-sm-4 mt-3">
			<label for="phone" class="label-text">@lang('inquiry.phone_number') <span class="required">*</span></label>
			<input type="tel" class="form-control @error('phone_number') is-invalid  @enderror" placeholder="" id="phone" name="phone_number" value="{{ old('phone_number') }}">
			@error('phone_number')
			<span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
			@enderror
		</div>

		<div class="col-md-4 col-lg-4 col-sm-4 mt-3">
			<label for="email" class="label-text">@lang('inquiry.email') <span class="required">*</span></label>
			<input type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="" id="email" name="email" value="{{ old('email') }}">
			@error('email')
			<span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
			@enderror
		</div>

		<div class="col-md-4 col-lg-4 col-sm-4 mt-3">
			<label for="subject" class="label-text">@lang('inquiry.subject') <span class="required">*</span></label>
			<input type="text" class="form-control @error('subject') is-invalid  @enderror" placeholder="" id="subject" name="subject" value="{{ old('subject') }}">
			@error('subject')
			<span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
			@enderror
		</div>

	</div>




	<div class="row">
		&nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp

		<div class="col-md-10 col-lg-10 col-sm-10 mt-3">
			<label for="message" class="label-text">@lang('inquiry.message') <span class="required">*</span></label>
			<textarea class="form-control @error('message') is-invalid  @enderror" id="message" rows="3" name="message">{{ old('message') }}</textarea>
			@error('message')
			<span class="invalid-feedback" role="alert">
				{{ $message }}
            </span>
			@enderror
		</div>

	</div>


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

	<center> <button type="submit" value="subscribe" class="btn btn-primary mt-4" style="color: #fff;background: #f9b634;border: 1px solid transparent;">@lang('inquiry.send_message')</button> </center>


</form>
</body>
</html>

