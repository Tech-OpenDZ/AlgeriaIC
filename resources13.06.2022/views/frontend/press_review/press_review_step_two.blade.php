@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('press_review.press_review') | @lang('home.invest_algeria')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
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
                        <li class="breadcrumb-elements"><a href="#">@lang('press_review.home')</a></li>
                        <li class="active">@lang('press_review.press_review')</li>
                    </ol>
                    <div class="business-banner">
                        @php
                            $adv = getAdvertisement('top-header','press-review');
                            if($adv != null) {
                           if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                                 $adv['url'] = "http://" . $adv['url'];
                           }
                        }
                    @endphp
                    @if($adv != null)
                    <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
                    @endif
                    </div>
                    <h1 class="main-heading mt-3 mb-3">@lang('press_review.press_review')</h1>

                    <div class="business-directory-main__elements">

                        <p class="mt-3 mb-3">@lang('press_review.content')</p>
                    </div>
                    <!-- search engine starts -->


                <!-- wizard part -->
               <div class="bd-wizard">
                    {{Form::open(array('route' => 'confirm-estimation','method'=>'GET'))}}
                        <div class="row" id="">
                            <div class="col-lg-12">
                                <section class="bd-search-outer">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 mb-3">
                                            <img src="{{ asset('css/images/target-criteria2.svg')}}" alt="target-criteria" class="img-fluid">
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 mb-3">
                                            <div class="target-right">
                                                <p>@lang('press_review.order_title')</p>
                                                <p class="target-capt mt-1">@lang('press_review.order_subtitle')</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="confirm-order">
                                        <p class="mb-4">@lang('press_review.details')</p>
                                        <p class="mb-4">@lang('press_review.search_criteria')</p>
                                        <p class="">@lang('press_review.keywords'): {{ $searched_criteria['keywords'] }}</p>
                                        <p class="">@lang('press_review.sector'): {{ $searched_criteria['sectors'] }}</p>
                                        <p class="">@lang('press_review.area'): {{ $searched_criteria['zones'] }}</p>
                                        <p class="">@lang('press_review.source'): {{ $searched_criteria['source'] }}</p>
                                        <p class="">@lang('press_review.date_title'): {{ $searched_criteria['start_date']}} - {{ $searched_criteria['end_date']}}</p>

                                        <p class="mt-4 mb-4">@lang('press_review.found')</p>
                                        <p class="">{{$totalCount}} @lang('press_review.articles')</p>
                                        @foreach($newsCountBySectors as $key => $value)
                                        <p class="">{{$value['count']}} @lang('press_review.articles') in {{$value['name']}} @lang('press_review.sector')</p>
                                        @endforeach

                                        @foreach($newsCountByZone as $key => $value)
                                        <p class="">{{$value['count']}} @lang('press_review.articles') in {{$value['name']}} @lang('press_review.area')</p>
                                        @endforeach


                                        @foreach($newsCountBySource as $key => $value)
                                        <p class="">{{$value['count']}} @lang('press_review.articles') in {{$value['name']}} @lang('press_review.source')</p>
                                        @endforeach


                                        @foreach($newsCountByKeyword as $key => $value)
                                        <p class="">{{$key}} @lang('press_review.keyword') @lang('press_review.found') @lang('press_review.in') in 1 @lang('press_review.articles')</p>
                                        @endforeach
                                        <br/><br/>
                                        <div class="quotation-table-area">
                                            <p class="pb-2 client-data"><strong>@lang('press_review.name_of_client'): {{$data['name']}}</strong> </p>
                                            <p class="pb-2 client-data"><strong>@lang('press_review.address'): {{$data['address']}}</strong> </p>
                                            <div class="artical-table" style="overflow-x:auto;">
                                                <table class="table table-bordered quotation-table">
                                                    <thead>
                                                    <tr>
                                                        <th>@lang('press_review.articles')</th>
                                                        <th>@lang('press_review.price') </th>
                                                        <th>@lang('press_review.quantity') (Month)</th>
                                                        <th>@lang('press_review.amount')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$data['articles']}}</td>
                                                        <td>{{$data['price_per_month'][$user->currency]}} {{strtoupper($user->currency)}}</td>
                                                        <td>{{$data['quantity']}}</td>
                                                        <td>{{$data['final_price'][$user->currency]}} {{strtoupper($user->currency)}}</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="artical-table-two" style="overflow-x:auto;">
                                                <table class="table table-bordered quotation-table">
                                                    <thead>
                                                        <tr>
                                                            <th> @lang('press_review.pre_tax_amount')</th>
                                                            <td>{{$data['final_price'][$user->currency]}} {{strtoupper($user->currency)}}</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="col">@lang('press_review.VAT') ({{$data['vat_percent'][$user->currency]}}% @lang('press_review.of_final_price'))</th>
                                                            <td>{{$data['vat_price'][$user->currency]}} {{strtoupper($user->currency)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('press_review.of_final_price') </th>
                                                            <td>{{$data['price'][$user->currency]}} {{strtoupper($user->currency)}}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <p class="client-data"><strong>@lang('press_review.amount_in_words')</strong>: {{$data['words']}}</p>
                                        </div>

                                    </div>


                                    <div class="row search-target-button  mb-3 pr-3 pl-3">
                                        <div class="col-md-12 col-sm-12  mt-3 mb-3">
                                            <button class="common-button  btn-lg" type="submit">@lang('press_review.confirm_order')</button>
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
                                <p>Step 1</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="business-directory-step-two.html" type="button" class="btn btn-default btn-primary btn-circle">2</a>
                                <p>Step 2</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="business-directory-step-three.html" type="button" class="btn btn-default btn-circle disabled" >3</a>
                                <p>Step 3</p>
                            </div>
                        </div>
                    </div>

               </div>

               </div>

            </div>

            <!-- left area ends here -->

            @include('frontend.common.right_sidebar')

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
<script src="{{ asset('js/front-end/main.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
