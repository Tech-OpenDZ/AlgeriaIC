@extends('frontend.layouts.master')
@section('content')
<section class="signup-container">
	<div class="container">
		<div class="signup-form-area pb-4">
			<div class="container pt-3">
				<div class="signup-form-area__elements text-left pt-4">
					<h4 class="main-heading mb-3">@lang('newsletter.sub-business-heding')</h4>
					<p class="mb-3">@lang('newsletter.business-subheading')</p>
					
                    @if( Session::has( 'success' ))
                        <div class="success-alert-msg">
                            @lang('newsletter.Form_successMessage')
                        </div><br>

                        @elseif( Session::has( 'error' ))
                            <div class="danger-alert-msg col-md-12">
                                {{ Session::get( 'error' ) }}
                            </div><br>
                        @elseif( Session::has( 'subscribed' ))
                            <div class="success-alert-msg">
                                @lang('newsletter.subscribed')
                            </div><br>
                    @endif

                        {!! Form::open(['method' => 'post', 'route' => 'business-store', 'class' => 'form-horizontal,submit_bannerform' ,'id' => 'bannerForm','files' => true]) !!}
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <input type="hidden" name="type" value="business">
                            <label for="companyname" class="label-text">@lang('newsletter.labelone')</label>
                            <input type="text"name="company_name" class="form-control @error('company_name') is-invalid  @enderror" placeholder="" id="cname" value="{{ old('company_name') }}">
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <label for="username" class="label-text">@lang('newsletter.labeltwo')</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" placeholder="" id="nameofuser" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <label for="jobtitle" class="label-text">@lang('newsletter.labelthree')</label>
                            <input type="text" name="job_title" class="form-control @error('job_title') is-invalid  @enderror" placeholder="" id="jobtitle" value="{{ old('job_title') }}">
                            @error('job_title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <label for="cellnumber" class="label-text">@lang('newsletter.labelfour')</label>
                                <input type="tel" name="cell_phone" class="form-control @error('cell_phone') is-invalid  @enderror" placeholder="" id="cellnumber" value="{{ old('cell_phone') }}">
                                @error('cell_phone')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <label for="email" class="label-text">@lang('newsletter.labelfive')</label>
                                 <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror" placeholder="" value="{{ old('email') }}">
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                 @enderror
                        </div>
                    </div>
                    <button type="submit" value="subscribe" class="common-button mt-4 mb-4">@lang('newsletter.button')</button>
                    {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
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