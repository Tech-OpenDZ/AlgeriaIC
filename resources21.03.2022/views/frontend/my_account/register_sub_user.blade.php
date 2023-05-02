@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('register_sub_user.registration') | @lang('news.placeName')</title>
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
                                <img src="{{ asset('css/images/reset-password.svg') }}" alt="fogot-password" class="img-fluid">

                            </div>
                        </div>
                        <div class="col-md-5 col-sm-7 col-xs-8 no-padding grey-border">
                            <div class="login-modal__right">
                                <div class="login-modal__right--form">
                                    <div class="container form-width">
                                        <form action="{{route('register-sub-user',[$token])}}" method="POST" class="form-elements">
                                            @csrf
                                            <h4 class="main-heading ">@lang('register_sub_user.registration')</h4>
                                            <p class="mt-3 text-left password-link-text">@lang('register_sub_user.registrationDesc') </p>
                                            <div class="form-group login-name">
                                                <label for="password">@lang('register_sub_user.emailLabel') <span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="" id="email" name="email" value="{{ $email }}" readonly="readonly">
                                            </div>

                                            <div class="form-group login-name">
                                                <label for="password">@lang('register_sub_user.nameLabel') <span class="required">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="" id="name" name="name" value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" id="name-validation-error" role="alert">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group login-name">
                                                <label for="username">@lang('register_sub_user.userNameLabel') <span class="required">*</span></label>
                                                <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="" id="username" name="username" value="{{ old('username') }}">
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert" id="username-validation-error">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group login-name">
                                                <label for="password">@lang('register_sub_user.passwordLabel') <span class="required">*</span></label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="" id="password" name="password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert" id="password-validation-error">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group login-name">
                                                <label for="password">@lang('register_sub_user.confirmPasswordLabel') <span class="required">*</span></label>
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="" id="password_confirmation" name="password_confirmation">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert" id="password_confirmation-validation-error">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="common-button mt-3">@lang('register_sub_user.register')</button>
                                        </form>
                                        <div class="login-bottom-buttons">
                                            <div class="privacy-policy-grid">
                                                <ul class="privacy-policy-grid__elements">
                                                    <li><a target="_blank" href="{{route('privacy-policy')}}"  class="pricay-btn">@lang('register_sub_user.privacyPolicy')</a></li>
                                                    <li><a target="_blank" href="{{route('legal-notice')}}"  class="pricay-btn">@lang('register_sub_user.legalNotices')</a></li>
                                                    <li><a target="_blank" href="{{route('terms-of-service')}}" class="pricay-btn">@lang('register_sub_user.termsOfServices')</a></li>
                                                </ul>
                                                <p class="i2b mt-3">@lang('register_sub_user.i2b') <a href="#"><img src="{{ asset('css/images/i2b-big.svg') }}" alt="i2b" class="img-fluid ml-2"></a></p>
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
