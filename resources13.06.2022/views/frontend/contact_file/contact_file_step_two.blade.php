@extends('frontend.layouts.master')

@section('head')
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> @lang('contactfile_step_two.business_directory') | @lang('news.placeName')</title>
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
                                <li class="breadcrumb-elements"><a href="#">@lang('contactfile_step_two.breadcrumb_home')</a></li>
                                <li class="active">@lang('contactfile_step_two.business_directory')</li>
                            </ol>
                            <div class="business-banner">
                                @php $adv = getAdvertisement('top-header','contact_list'); @endphp
                                @php $count_data = getCompanyDataCount(); @endphp
                                <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
                            </div>
                            <h1 class="main-heading mt-3 mb-3">@lang('contactfile_step_two.contact_file_detail')</h1>

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
                                <p class="mt-3 mb-3">@lang('contactfile_step_two.description')</p>
                            </div>
                            <!-- search engine starts -->


                            <!-- wizard part -->
                            <div class="bd-wizard">


                                {{Form::open(array('route' => 'contact-file-confirm-estimation','method'=>'GET'))}}
                                <div class="row" id="">
                                    <div class="col-lg-12">
                                        <section class="bd-search-outer">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 mb-3">
                                                    <img src="{{ asset('css/images/target-criteria.svg')}}" alt="target-criteria" class="img-fluid">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 mb-3">
                                                    <div class="target-right">
                                                        <p>@lang('contactfile_step_two.description2') </p>
                                                        <p class="target-capt mt-1">@lang('contactfile_step_two.description3')</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="confirm-order">
                                                <p class="mb-4">@lang('contactfile_step_two.details')</p>
                                                <p class="mb-4">@lang('contactfile_step_two.search_criteria'):</p>
                                                <p class="">@lang('contactfile_step_two.Keywords'): {{ $searched_criteria['keyword'] }}</p>
                                                <p class="">@lang('contactfile_step_two.Area'):
                                                    @foreach($companyByZones as $zone)
                                                    {{ $zone }},
                                                    @endforeach
                                                </p>
                                                <p class="">@lang('contactfile_step_two.date_of_creation'): {{ $searched_criteria['creation_date_from'] }} - {{ $searched_criteria['creation_date_to'] }}</p>
                                                <p class="">@lang('contactfile_step_two.turnover'): {{ $searched_criteria['turnover_from'] }} - {{ $searched_criteria['turnover_to']}}</p>
                                                <p class="">@lang('contactfile_step_two.capital'): {{ $searched_criteria['capital_from'] }} - {{ $searched_criteria['capital_to']}}</p>
                                                <p class="">@lang('contactfile_step_two.number_of_employees'): {{ $searched_criteria['number_of_employees_from'] }} - {{ $searched_criteria['number_of_employees_to']}}</p>
                                                <p class="">@lang('contactfile_step_two.sectors'):
                                                    @foreach($companyBySectors as $sector)
                                                    {{ $sector }},
                                                    @endforeach
                                                </p>

                                                <p class="mt-4 mb-4">@lang('contactfile_step_two.found')</p>
                                                <p class="">{{ $company_count }} @lang('contactfile_step_two.companies')</p>
                                                <p class="">{{ $email_count }} @lang('contactfile_step_two.emails') </p>
                                                <p class="">{{ $phone_count }} @lang('contactfile_step_two.phone_numbers')</p>
                                                <p class="">{{ $financial_information_count }} @lang('contactfile_step_two.financial_information')</p>
                                                <p class="">{{ $product_count }} @lang('contactfile_step_two.list_of_product')</p>
                                                <p class="">{{ $job_title_count }} @lang('contactfile_step_two.job_titles')</p>

                                                <br /><br />
                                                <div class="quotation-table-area">
                                                    <p class="pb-2 client-data"><strong>@lang('press_review.name_of_client'): {{$data['name']}}</strong> </p>
                                                    <p class="pb-2 client-data"><strong>@lang('press_review.address'): {{$data['address']}}</strong> </p>
                                                    <div class="artical-table" style="overflow-x:auto;">
                                                        <table class="table table-bordered quotation-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>@lang('press_review.amount')</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{$data['final_price']}} @lang('contactfile_payment.dzd')</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="artical-table-two" style="overflow-x:auto;">
                                                        <table class="table table-bordered quotation-table">
                                                            <thead>
                                                                <tr>
                                                                    <th> @lang('press_review.pre_tax_amount')</th>
                                                                    <td>{{$data['final_price']}} @lang('contactfile_payment.dzd')</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="col">@lang('press_review.VAT') ({{$data['vat_percent']}}% @lang('press_review.of_final_price'))</th>
                                                                    <td>{{$data['vat_price']}} @lang('contactfile_payment.dzd')</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="col">@lang('press_review.of_final_price') </th>
                                                                    <td>{{$data['price']}} @lang('contactfile_payment.dzd')</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <p class="client-data"><strong>@lang('press_review.amount_in_words')</strong>: {{$data['words']}}</p>
                                                </div>

                                                <div class="row search-target-button  mb-3 pr-3 pl-3">
                                                    <div class="col-md-12 col-sm-12  mt-3 mb-3">
                                                        <button class="common-button  btn-lg" type="submit">@lang('contactfile_step_two.confirm_order')</button>
                                                    </div>

                                                </div>

                                            </div>

                                        </section>
                                    </div>
                                </div>


                                {{ Form::close() }}

                                <div class="stepwizard">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step">
                                            <a href="business-directory-step-one.html" type="button" class="btn btn-default btn-primary btn-circle">1</a>
                                            <p>@lang('contactfile_step_one.Step1')</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="business-directory-step-two.html" type="button" class="btn btn-default btn-primary btn-circle">2</a>
                                            <p>@lang('contactfile_step_one.Step2')</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="business-directory-step-three.html" type="button" class="btn btn-default btn-circle disabled">3</a>
                                            <p>@lang('contactfile_step_one.Step3')</p>
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
                            $adv = getAdvertisement('sidebar-top','contact_list');
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
                            $adv = getAdvertisement('sidebar-bottom','contact_list');
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
                <!-- featured events starts here -->
                <section class="brand-carousel">


                    <h4 class="sub-heading mb-3">@lang('business_directory_main.featured_companies')</h4>
                    <div class="our-partners owl-carousel owl-theme brand-slider active" id="brands-demo">

                        @foreach($count_data['featured_companies'] as $companyData)
                        <div class="brand-outer-area item">
                            <img src="{{ asset('storage/uploads/company_logo/'.$companyData->company_logo) }}" alt="logo1" class="img-fluid">
                        </div>
                        @endforeach

                    </div>
                </section>
                <!-- featured events ends here -->
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
<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> -->
@if(Session::has('openLogin'))
<script>
    $(function() {
        $("#loign_formshow").trigger('click');
    });
</script>
@endif
@endsection