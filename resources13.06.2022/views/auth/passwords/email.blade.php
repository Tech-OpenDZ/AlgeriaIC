<!DOCTYPE html> 

<html lang="en">
    <!--begin::Head-->
    <head><base href="../../../">
        <meta charset="utf-8" />
        <title>Metronic</title>
        <meta name="description" content="Login page example" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="{{ asset('dist/assets/css/pages/login/login-2.css?v=7.0.4') }}" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{ asset('dist/assets/plugins/global/plugins.bundle.css?v=7.0.4') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.4') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dist/assets/css/style.bundle.css?v=7.0.4') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <link href="{{ asset('dist/assets/css/themes/layout/header/base/light.css?v=7.0.4') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dist/assets/css/themes/layout/header/menu/light.css?v=7.0.4') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dist/assets/css/themes/layout/brand/dark.css?v=7.0.4') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dist/assets/css/themes/layout/aside/dark.css?v=7.0.4') }}" rel="stylesheet" type="text/css" />
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/favicon.ico') }}" />
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login" style="max-width: auto !important;">
                <!--begin::Aside-->
                <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden" style="max-width: auto !important;">
                    <!--begin: Aside Container-->
                    <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
                        <!--begin::Logo-->
                        <a href="#" class="text-center pt-2">
                            <img src="{{ asset('dist/assets/media/logos/logo.png') }}" class="max-h-75px" alt="" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Aside body-->
                        <div class="d-flex flex-column-fluid flex-column flex-center">
                            <!--begin::Signin-->
                            <div class="login-form login-signin py-11">
                                <!--begin::Form-->
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                {!! Form::open(['method' => 'post', 'route' => 'password.email']) !!}
                                    <!--begin::Title-->
                                    <div class="text-center pb-8">
                                        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Reset Password</h2>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Form group-->
                                    <div class="form-group">
                                        {!! Form::label('Email', 'Email',['class' => 'font-size-h6 font-weight-bolder text-dark']) !!}


                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="text-center pt-2">
                                        <button ype="submit" id="kt_login_signin_submit" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3">Submit</button>
                                    </div>
                                    <!--end::Action-->
                                {!! form::close() !!}
                                <!--end::Form-->
                            </div>
                            <!--end::Signin-->
                        </div>
                        <!--end::Aside body-->
                    </div>
                    <!--end: Aside Container-->
                </div>
                <!--begin::Aside-->
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
        <script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="{{ asset('dist/assets/plugins/global/plugins.bundle.js?v=7.0.4') }}"></script>
        <script src="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4') }}"></script>
        <script src="{{ asset('dist/assets/js/scripts.bundle.js?v=7.0.4') }}"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="{{ asset('dist/assets/js/pages/custom/login/login-general.js?v=7.0.4') }}"></script>
        <!--end::Page Scripts-->
    </body>
    <!--end::Body-->
</html>
<style>
    .login-aside{
        width: 100% !important;
        max-width: 100% !important;
    }
</style>