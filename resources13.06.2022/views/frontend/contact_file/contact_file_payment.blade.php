@extends('frontend.layouts.master')

@section('head')
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@lang('contactfile_step_one.business_directory') | @lang('news.placeName')</title>

@endsection

@section('content')

<section class="business-directory-main">
    <div class="news-main-area">
        <div class="discover-algeria">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-9 col-sm-12">
                        <div class="discover-algeria__left">
                            <ol class="breadcrumb-area">
                                <li class="breadcrumb-elements"><a href="#">@lang('contactfile_payment.breadcrumb_home')</a></li>
                                <li class="active">@lang('contactfile_payment.contact_file')</li>
                            </ol>
                            @php $count_data = getCompanyDataCount(); @endphp
                            <div class="business-banner">
                                @php $adv = getAdvertisement('top-header','contact_list'); @endphp
                                <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
                            </div>
                            <h1 class="main-heading mt-3 mb-3">@lang('contactfile_payment.contact_file')</h1>

                            <div class="business-directory-main__elements">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 col-sm-4">
                                        <div class="directory-box">
                                            <div class="row">
                                                <div class="col-md-8 col-lg-8 col-sm-8">
                                                    <h3 class="companies-heading text-white">{{ $count_data['company_count'] }}</h3>
                                                    <h6 class="sub-heading text-white">@lang('business_directory_main.companies') </h6>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-sm-4 d-flex align-item-center">
                                                    <img src="{{ asset('css/images/bd-companies.svg')}}" alt="companies" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-sm-4">
                                        <div class="directory-box">
                                            <div class="row">
                                                <div class="col-md-8 col-lg-8 col-sm-8">
                                                    <h3 class="companies-heading text-white">{{ $count_data['mobile_count'] }}</h3>
                                                    <h6 class="sub-heading text-white">@lang('business_directory_main.Cell_Phone') </h6>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-sm-4 d-flex align-item-center">
                                                    <img src="{{ asset('css/images/bd-cellphone.svg')}}" alt="cellphone" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-sm-4">
                                        <div class="directory-box">
                                            <div class="row">
                                                <div class="col-md-8 col-lg-8 col-sm-8">
                                                    <h3 class="companies-heading text-white">{{ $count_data['email_count'] }}</h3>
                                                    <h6 class="sub-heading text-white">@lang('business_directory_main.email') </h6>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-sm-4 d-flex align-item-center">
                                                    <img src="{{ asset('css/images/bd-mail.svg')}}" alt="mail" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-3">@lang('contactfile_payment.description')</p>
                            </div>
                            <!-- search engine starts -->


                            <!-- wizard part -->
                            <div class="bd-wizard">
                                @if( Session::has( 'success' ))
                                <div class="success-alert-msg">
                                    {{ Session::get( 'success' ) }}
                                </div><br>

                                @elseif( Session::has( 'error' ))
                                <div class="danger-alert-msg text-center failure-msg">
                                    @lang('contactfile_step_one.something_went_wrong')
                                </div><br>
                                @endif


                                {{Form::open(array('route' => 'contact-file-confirm-payment','method'=>'GET'))}}

                                <div class="row" id="">
                                    <div class="col-lg-12">
                                        <section class="bd-search-outer">
                                            @include('frontend.payment.index', ['page' => 'contact-file'])
                                        </section>
                                    </div>
                                </div>
                                <!-- step three ends here -->
                                {{ Form::close() }}

                                <div class="stepwizard">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step">
                                            <a href="business-directory-step-one.html" type="" class="btn btn-primary btn-circle">1</a>
                                            <p>@lang('contactfile_payment.step1')</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="business-directory-step-two.html" type="" class="btn btn-default btn-primary btn-circle">2</a>
                                            <p>@lang('contactfile_payment.step2')</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="business-directory-step-three.html" type="" class="btn btn-default btn-circle btn-primary">3</a>
                                            <p>@lang('contactfile_payment.step3')</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- left area ends here -->
                    <div class="col-lg-3 col-md-3">
                        <div class="discover-algeria__right">
                            @php
                            $adv = getAdvertisement('sidebar-top','business_directory');
                            @endphp
                            @if($adv != null) 
                                @php
                                if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                                        $adv['url'] = "http://" . $adv['url'];
                                }
                                @endphp
                        
                            <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="w-100 success"></a>
                            @endif

                            <div class="join-algeria">
                                <h6 class="mb-3 sub-heading"> @lang('news_detail.joinAlgeriaNetwork')</h6>
                                <a href="#" class="register"> @lang('news_detail.join')</a>
                            </div>
                        </div>
                        <div class="discover-algeria__right mt-4">
                            @php
                            $adv = getAdvertisement('sidebar-bottom','business_directory');
                            @endphp
                            <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>

                            <div class="join-algeria">
                                <h6 class="mb-3 sub-heading">@lang('news_detail.downloadResources'):<br> XXXXXXXX</h6>
                                <a href="#" class="register">@lang('news_detail.join')</a>
                            </div>
                        </div>
                        <div class="discover-algeria__right mt-4">

                            <div class="join-algeria">
                                <h6 class="sub-heading mb-4"> @lang('news_detail.businessServices')</h6>
                                <a href="#" class="register view-services"> @lang('news_detail.viewServices')</a>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- row ends here -->

            </div>
        </div>
    </div>
    <!-- top left and right area ends here -->
</section>

@endsection

@section('scripts')
<!-- Normal JS -->
<!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/front-end/browser-class.js') }}"></script>
<!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
<script src="{{ asset('js/front-end/main.js') }}"></script>

<script>
    $(document).ready(function() {
        /* $('#confirm-order').on('click', function(e) {
            e.preventDefault();
            var radio = $("input[name=chooseOffline]:radio").is(':checked');
            if (radio == true) {
                window.location.href = "{{route('confirm-payment')}}" + "?" + $('#confirm-payment-form').serialize();
            }
        }); */

        $('#currency').on('change', function(e) {
            var selected = $(this).find('option:selected');
            var currency_key = selected.val();
            var currency_value = selected.data('key');
            $('#price').val(currency_value);
        });
    });
</script>

<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> -->

@endsection