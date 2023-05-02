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



                            <section class="news-inside-post">
                                <div class="slider-area table-carousel">
                                    <h6 class="sub-heading pt-2">@lang('business_directory_main.companies_list')</h6>
                                    <div id="table-slide" class="carousel slide" data-ride="carousel" data-interval="false">



                                        <!-- The slideshow -->
                                        <div class="carousel-inner business-directory-contact-slide">
                                            <div class="carousel-item active">
                                                <section class="events-main-area">
                                                    <div class="events-home">


                                                        <div class="events-home__elements bd-company-info">

                                                            <div class="row">
                                                                <div class="col-md-12 col-lg-12 col-sm-12 col-12 mt-4">
                                                                    <div class="events-home__elements-box green-border-bottom">
                                                                        <div class="row mb-3">
                                                                            <div class="col-md-2 col-lg-2 col-sm-2">
                                                                                <div class="event-box-left">

                                                                                    <div class="ratio-1x1">
                                                                                        <div class="ratio-inner">
                                                                                            <img src="{{asset('storage/uploads/company_logo/'.$company->company_logo)}}" alt="events-company" class="img-fluid">

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-10 col-lg-10 col-sm-10">
                                                                                <div class="event-box-right bd-company-file">
                                                                                    <ul class="company-social-ic-outer">
                                                                                        @if ($company->youtube)
                                                                                        <li> <a href="{{$company->youtube}}" target="_blank" class="company-social-ic"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                                                                        @endif
                                                                                        @if ($company->twitter)
                                                                                        <li> <a href="{{$company->twitter}}" target="_blank" class="company-social-ic"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                                                        @endif
                                                                                        @if ($company->facebook)
                                                                                        <li> <a href="{{$company->facebook}}" target="_blank" class="company-social-ic"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                                                        @endif
                                                                                        @if ($company->instagram)
                                                                                        <li> <a href="{{$company->instagram}}" target="_blank" class="company-social-ic"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                                                        @endif
                                                                                        @if ($company->linkdeln)
                                                                                        <li> <a href="{{$company->linkdeln}}" target="_blank" class="company-social-ic"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                                                        @endif
                                                                                    </ul>
                                                                                    <h6 class="sub-heading mt-2">
                                                                                    
                                                                                        @foreach($company->localeAll as $localeData)
                                                                                            @if($localeData->locale == Config::get('app.locale'))
                                                                                                {{$localeData->company_name}}
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </h6>
                                                                                    <p class="phone-text"><span class="para-bold">@lang('business_directory_main.sector'):</span> 
                                                                                    @foreach($company->sectors as $sector)
                                                                                        @foreach($sector->localeAll as $localeData)
                                                                                            @if($localeData->locale == Config::get('app.locale'))
                                                                                                {{$localeData->name}},
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endforeach</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <div class="col-md-12 col-lg-12 col-sm-12">
                                                                                <div class="event-box-right">
                                                                                    <h6 class="sub-heading">@lang('business_directory_main.general_information')</h6>

                                                                                    <div class="row ">
                                                                                        <div class="col-md-6 col-lg-6 col-sm-6 mt-2">
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.phone'):</span> {{$company->telephone}}</p>
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.email'):</span> {{$company->email}}</p>
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.website'):</span> {{$company->website}}</p>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-lg-6 col-sm-6 mt-2">
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.fax'):</span> {{$company->fax}}</p>
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.email'):</span> {{$company->email}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <p class="phone-text mb-2"><span class="para-bold">@lang('business_directory_main.address'):</span> 
                                                                                   
                                                                                        @foreach($company->localeAll as $localeData)
                                                                                            @if($localeData->locale == Config::get('app.locale'))
                                                                                                {{$localeData->address}}
                                                                                            @endif
                                                                                        @endforeach
                                                                                   
                                                                                    </p>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="event-box-right mt-4">
                                                                                    <h6 class="sub-heading">@lang('business_directory_main.financial_information')</h6>

                                                                                    <div class="row ">

                                                                                        <div class="col-md-6 col-lg-6 col-sm-6 mt-2">
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.capital'):</span> {{$company->capital}}</p>
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.turnover_2018'):</span> {{$company->net_sales_2018}}</p>


                                                                                        </div>
                                                                                        <div class="col-md-6 col-lg-6 col-sm-6 mt-2">
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.number_of_employees'):</span> {{$company->staff}}</p>
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.turnover_2019'):</span> {{$company->net_sales_2019}}</p>

                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <hr>

                                                                                <div class="contacts-info mt-4 mb-4">
                                                                                    <h6 class="sub-heading mb-3">@lang('business_directory_main.contacts')</h6>
                                                                                    @foreach($company->contacts as $contact)
                                                                                    <div class="row mb-3">
                                                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.contacts_name'):</span> 
                                                                                            <!-- {{$contact->localeAll[0]->name}}  -->
                                                                                            @foreach($contact->localeAll as $localeData)
                                                                                                @if($localeData->locale == Config::get('app.locale'))
                                                                                                    {{$localeData->name}}
                                                                                                @endif
                                                                                            @endforeach
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.contacts_tel'):</span> {{$contact->mobile_number}}</p>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.contacts_email'):</span> {{$contact->email}}</p>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                            <p class="phone-text"><span class="para-bold">@lang('business_directory_main.contacts_job_title'):</span>
                                                                                             @foreach($contact->localeAll as $localeData)
                                                                                                @if($localeData->locale == Config::get('app.locale'))
                                                                                                    {{$localeData->jobtitle}}
                                                                                                @endif
                                                                                            @endforeach
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <hr>
                                                                                <div class="event-box-right">
                                                                                    <div class="row ">
                                                                                        <div class="col-md-6 col-lg-6 col-sm-6 mt-2">
                                                                                            <h6 class="sub-heading mb-3">@lang('business_directory_main.activities_code'):</h6>
                                                                                            @foreach($company->activity_codes as $activity_code)
                                                                                            <p class="mb-2">{{$activity_code->activity_code}}</p>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        <div class="col-md-6 col-lg-6 col-sm-6 mt-2">
                                                                                            <h6 class="sub-heading mb-3">@lang('business_directory_main.products_and_services')</h6>
                                                                                            @foreach($company->products as $product)
                                                                                            <div class="row">
                                                                                                <div class="col-md-3 col-sm-3 mb-2">
                                                                                                    @foreach($product->productImages as $productImage)
                                                                                                    <img src="{{asset('storage/uploads/product_image/'.$productImage->image)}}" alt="events-company" class="img-fluid">
                                                                                                    @endforeach
                                                                                                </div>
                                                                                                @if(!empty($product->productTranslate[0]))
                                                                                                <div class="col-md-9 col-sm-9 mb-2">
                                                                                                    <p>{{ $product->productTranslate[0]->localeAll[0]->name }}</p>
                                                                                                </div>
                                                                                                @endif
                                                                                            </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> -->
@endsection
