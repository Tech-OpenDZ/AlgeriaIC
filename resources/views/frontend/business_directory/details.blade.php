@extends('frontend.layouts.master')
@section('head')
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> @lang('business_directory_main.business_directory') | @lang('news.placeName')</title>
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
                                <li class="breadcrumb-elements"><a href="#">@lang('business_directory_main.breadcrumb_home')</a></li>
                                <li class="active">@lang('business_directory_main.business_directory')</li>
                            </ol>
                            @php $count_data = getCompanyDataCount(); @endphp
                            <div class="business-banner">
                                @php
                                $adv = getAdvertisement('top-header','business_directory');
                                @endphp

                                <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
                            </div>
                            <h4 class="main-heading mt-3 mb-3">@lang('business_directory_main.business_directory')</h4>

                            @if($company_count > 0)

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
                                <p class="mt-3 mb-3">@lang('business_directory_main.description')</p>
                            </div>

                            @endif
                            <!-- search engine starts -->
                            <form id="search-news-form">
                                <section class="bd-search-outer">
                                    <div class="search-engine news-select-area">

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <!-- <h6 class="sub-heading mt-2">@lang('business_directory_main.search_engine')</h6> -->
                                            </div>

                                        </div>


                                        <!-- <p class="mt-3 mb-2">@lang('business_directory_main.keyword')</p> -->
                                        <div class="search-engine__elements mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="@lang('news.keywordPlaceholder')" id="keyword" name="keyword">
                                                <div class="input-group-append">
                                                    <button id="search-by-kw" href="#search-by-keyword"><span class="input-group-text"><img src="{{ asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></button> </span>
                                                </div>
                                                <div class="advance-search">
                                                    <a href="javascript:void(0);" class="ad-search-button" id="advanced_search_btn">@lang('news.advancedSearch')</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- search engine ends -->

                                    <section class="news-select-area bd-wizard">
                                        <div class="container" id="advanced_search_area">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-6">
                                                    <p class="select-title pb-2">@lang('business_directory_main.turnover_from_to')</p>
                                                    <div class="row">

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-left">
                                                            <div class="date-pik">
                                                                <input type="text" id="turn_over_start" name="turn_over_start" class="select-button mb-4">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-right">

                                                            <div class="date-pik">
                                                                <input type="text" id="turn_over_end" name="turn_over_end" class="select-button mb-4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6">
                                                    <p class="select-title pb-2">@lang('business_directory_main.capital_from_to')</p>
                                                    <div class="row">

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-left">

                                                            <div class="date-pik">
                                                                <input type="text" id="capital_start" name="capital_start" class="select-button mb-4">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-right">

                                                            <div class="date-pik">
                                                                <input type="text" id="capital_end" name="capital_end" class="select-button mb-4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row bd-source">
                                                <div class="col-md-6 col-lg-6 col-sm-6">
                                                    <p class="select-title pb-2">@lang('business_directory_main.sector')</p>
                                                    <select name="sector" id="sector" class="select-button mb-4">
                                                        <option value="">@lang('news.selectSector')</option>
                                                        @foreach($sectors as $sector)
                                                        <option value="{{$sector->id}}">{{$sector->localeAll[0]->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-sm-6">
                                                    <p class="select-title pb-2">@lang('business_directory_main.area')</p>
                                                    <select name="zone" id="zone" class="select-button mb-4">
                                                        <option value="">@lang('news.selectZone')</option>
                                                        @foreach($zones as $zone)
                                                        <option value="{{$zone->id}}">{{$zone->localeAll[0]->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-lg-6">
                                                    <p class="select-title pb-2">@lang('business_directory_main.creation_date_from_to')</p>
                                                    <div class="row">

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-left">

                                                            <div class="date-pik">
                                                                <input type="date" id="creation_date_start" name="creation_date_start" class="select-button mb-4">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-right">

                                                            <div class="date-pik">
                                                                <input type="date" id="creation_date_end" name="creation_date_end" class="select-button mb-4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6">
                                                    <p class="select-title pb-2">@lang('business_directory_main.number_of_employees_from_to')</p>
                                                    <div class="row">

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-left">

                                                            <div class="date-pik">
                                                                <input type="text" id="staff_start" name="staff_start" class="select-button mb-4">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-right">

                                                            <div class="date-pik">
                                                                <input type="text" id="staff_end" name="staff_end" class="select-button mb-4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="search-target-button sr-btn">
                                            <div class="col-md-12 col-sm-12">
                                                <button class="common-button" type="submit">@lang('business_directory_main.search') </button>
                                            </div>
                                        </div>
                                    </section>
                                </section>
                            </form>

                            <section class="news-inside-post">
                                <div class="slider-area table-carousel">
                                    <h6 class="sub-heading pt-2">@lang('business_directory_main.contact_file')</h6>
                                    <div id="table-slide">

                                        <!-- The slideshow -->
                                        <div class="carousel-inner business-directory-contact-slide" id="carousel-inner-data">
                                            {!! $nextComapny !!}
                                        </div>

                                    </div>
                                    <!-- Left and right controls -->
                                    <div class="next-prev-controls-slide mt-4">
                                        <button class="login-in" id="previous-page-news" style="{{ ($company->onFirstPage()) ? 'visibility:hidden;': ''}}">
                                            <span class="previous-slide">@lang('business_directory_main.previous')</span>
                                        </button>

                                        <button class="register" id="next-page-news" style="{{ (!$company->hasMorePages()) ? 'visibility:hidden;': ''}}">
                                            <span class="next-slide">@lang('business_directory_main.next')</span>
                                        </button>
                                    </div>

                                </div>
                            </section>
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
                                <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
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
                            @if($adv != null)
                                @php
                                if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                                    $adv['url'] = "http://" . $adv['url'];
                                }
                                @endphp
                            <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
                            @endif
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> -->
<script>
    // load more testimonials ajax call

    $(document).ready(function() {

        $('#advanced_search_area').toggle();
        $('#advanced_search_btn').click(function(){
            $('#advanced_search_area').toggle();
        });

        if (window.location.search) {
            $('#advanced_search_area').css('display','');
            var queryString = window.location.search;
            queryString = decodeURIComponent(queryString);
            var queryStringArray = (queryString.split('?'))[1].split('&');
            var resultArray = [];

            $.each(queryStringArray, function(key, value) {
                resultArray = value.split('=');
                let val = resultArray[1].split("+").join(" ");
                if (resultArray[0] == 'keyword' ||
                    resultArray[0] == 'turn_over_start' ||
                    resultArray[0] == 'turn_over_end' ||
                    resultArray[0] == 'capital_start' ||
                    resultArray[0] == 'capital_end' ||
                    resultArray[0] == 'creation_date_start' ||
                    resultArray[0] == 'creation_date_end' ||
                    resultArray[0] == 'staff_start' ||
                    resultArray[0] == 'staff_end'
                ) {

                    $("input[name='" + resultArray[0] + "']").val(val);
                } else {
                    $('#' + resultArray[0] + ' option[value="' + val + '"]').attr("selected", "selected");
                }
            });
        }

        $(document).on('click', '#previous-page-news', function(e) {
            e.preventDefault();
            window.location.href = '{{route("business-directory-details")}}?page=' + '{{$company->currentPage()-1}}&' + $('#search-news-form').serialize();
        });

        $(document).on('click', '#next-page-news', function(e) {
            e.preventDefault();
            window.location.href = '{{route("business-directory-details")}}?page=' + '{{$company->currentPage()+1}}&' + $('#search-news-form').serialize();
        });

        $(document).on("submit", '#search-news-form', function(event) {
            event.preventDefault();
            window.location.href = '{{route("business-directory-details")}}?page=1&' + $('#search-news-form').serialize();
        });

        $(document).on("click", '#search-by-kw', function(event) {
            event.preventDefault();
            window.location.href = '{{route("business-directory-details")}}?page=1&keyword=' + $('#keyword').val();
        });

    });
</script>
<script src="{{ asset('js/front-end/main.js') }}"></script>
@endsection
