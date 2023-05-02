@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('signup.link_expired') | @lang('news.placeName')</title>
@endsection

@section('content')
    <section class="signup-container">
        <div class="container">
            <form id="msform">
                <fieldset>
                    <div class="form-card mb-5">
                    <div class="success-msg-box mb-4">
                        <h4 class="main-heading-two mt-4 mb-2">@lang('signup.page_expired_sorry')</h4>

                        <p class=" mt-4 mb-5 text-center">@lang('signup.page_expired_msg') </p>
                        <!-- <input type="button" name="next" class="register action-button" value="Login"/> -->
                        <a href="{{route('customer-home')}}" class="common-button mb-3">@lang('signup.page_expired_website')</a>
                    </div>
                    </div>
                </fieldset>
            </form>
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
