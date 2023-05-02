@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('payment.paymentSuccessPage') | @lang('news.placeName')</title>
@endsection

@section('content')
    <section class="business-directory-main">
        <div class="news-main-area">
            <div class="discover-algeria">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="discover-algeria__left">
                                <ol class="breadcrumb-area">
                                    <li class="breadcrumb-elements"><a href="#">@lang('payment.homePage')</a></li>
                                    <li class="active">@lang('payment.paymentSuccessPage')</li>
                                </ol>
                                <section class="user-account">
                                    <div class="user-detail">
                                        <div class="msg-sent text-center pt-4">
                                            <i class="fa fa-check-circle-o done-right" aria-hidden="true"></i>
                                            <h6 class="main-heading pt-4 pb-4 text-center">{!! $message !!}</p>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- left area ends here -->
                    </div>
                    <!-- row ends here -->
                </div>
            </div>
        </div>
        <!-- top left and right area ends here -->
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
