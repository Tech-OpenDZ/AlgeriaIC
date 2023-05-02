@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('past_event.pastEvents') | @lang('news.placeName')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
    <script>
        function hidePagination(status) {
            if(status){
                $('.next-prev-controls-slide').css('display','none');
            }
            else {
                $('.next-prev-controls-slide').css('display','');
            }
        }
    </script>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <section class="news-main-area">
        <div class="discover-algeria" style="padding-top:0px;padding-bottom:0px;background-color:#ffffff!important">
            <div class="container_contact" style="max-width:100%!important">
                <div class="row" style="background-color:#ffffff;margin-left:-15px;margin-right:-15px">
                    <div class="event_heading" style="height:400px; width:100%;padding-top:70px">
                        <div class="section_title text-center" style="padding-top:125px">
                            <h2 class="subtitle align-content-center justify-content-center" style="color:#FFFFFF;font-weight:bold">@lang('past_event.events')</h2>

                        </div>


                    </div>
                </div>
        <div class="page-content" >
            <div class="container" style="max-width:1170px;background-color:transparent">
                <div class="row" style="padding-top:80px;padding-bottom:80px;">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="discover-algeria__left">
                            <!--<ol class="breadcrumb-area">
                            <li class="breadcrumb-elements"><a href="#">@lang('past_event.home')</a></li>
                                <li class="active">@lang('past_event.events')</li>
                            </ol>v -->
                            @include('frontend.common.top_banner')
                            @if(!$banner[0]->bannerImages->isEmpty())
                            <!--<div class="business-banner mt-4">
                                <a href="#"><img src="{{ asset('storage/uploads/banner/'.$banner[0]->bannerImages[0]->banner_img)}}" alt="business-network" class="img-fluid"></a>
                            </div> -->
                            @endif
                            </br>
                            <form id="search-news-form">
                                <section class="search-engine news-select-area">

                                    <div class="row">
                                       <!-- <div class="col-md-6 col-sm-6 col-12">
                                            <h6 class="main-heading">@lang('past_event.pastEvents')</h6>
                                        </div> -->
                                        <div class="col-md-6 col-sm-6 col-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 week">
                                                    <p class="sortby">  @lang('past_event.sortBy')</p>
                                                    <select name="sort_by" id="sort_by" class="select-button mb-2">
                                                        <option value="All">@lang('past_event.allEvent')</option>
                                                        <option value="Week">@lang('past_event.week')</option>
                                                        <option value="Month">@lang('past_event.month')</option>
                                                        <option value="Year">@lang('past_event.year')</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <section class="news-advance-search">

                                        <section class="search-engine">
                                            <div class="search-engine__elements">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="@lang('upcoming_event.keywordPlaceholder')" id="keyword" name="keyword">
                                                    <div class="input-group-append">
                                                        <button id="search-by-kw">
                                                            <span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="advance-search">
                                                <a href="javascript:void(0);" class="ad-search-button" id="advanced_search_btn">@lang('news.advancedSearch')</a>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="news-select-area">
                                            <div id="advanced_search_area">
                                                <div class="row" >
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                        <!-- <p class="select-title">@lang('event.sector')</p> -->
                                                        <select name="sector[]" multiple class="multi-choice select-button mb-4" style="width: 100%;" data-placeholder="@lang('event.sector')">
                                                            @foreach($eventSector as $key =>$value)
                                                            <option value="{{$key}}">{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                        <!-- <p class="select-title">@lang('event.zone')</p> -->
                                                        <select name="zone[]"  multiple  class="multi-choice select-button mb-4" style="width: 100%;" data-placeholder="@lang('event.zone')">
                                                            @foreach($zones as $key =>$value)
                                                            <option value="{{$key}}">{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                   
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                        <!-- <p class="select-title pb-2">@lang('event.date')</p> -->
                                                        <div class="date-pik mt-2">
                                                        <!-- value="{{date('Y-m-d')}}" -->
                                                            <input type="date" id="start_date" name="start_date"
                                                            min="2019-01"  class="select-button mt-1 w-100">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sr-btn">
                                                    <button type="submit" class="common-button mt-2" id="news-search-form-submit">@lang('news.search')</button>
                                                </div>
                                            </div>
                                        
                                        </section>
                                    </section>
                                </section>
                            </form>

                            <section class="news-inside-post">
                                <div class="slider-area table-carousel">
                                    <div id="table-slide">
                                        <!-- The slideshow -->
                                        <div class="carousel-inner" id="carousel-inner-data">
                                            {!! $nextEvent !!}
                                        </div>
                                    </div>
                                    <!-- Left and right controls -->
                                    <div class="next-prev-controls-slide mt-4">

                                        <button class="login-in" id="previous-page-news" style="{{ ($pastEvents->onFirstPage()) ? 'visibility:hidden;': ''}}">
                                            <span class="previous-slide">@lang('news.previous')</span>
                                        </button>
                                        {{  $pastEvents->links() }}
                                        <button class="register" id="next-page-news" style="{{ (!$pastEvents->hasMorePages()) ? 'visibility:hidden;': ''}}">
                                            <span class="next-slide">@lang('news.next')</span>
                                        </button>
                                    </div>
                                </div>
                            </section>
                                <br>
                        </div>
                    </div>
                    <!-- left area ends here -->

                   {{-- <div class="col-lg-3 col-md-3">
                        <div class="discover-algeria__right">
                            <!-- <div class="search-sub-form">
                                <form class="subscribe_form marg_bottom" method="get" action="{{ route('search') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control col-lg-8 col-md-8 col-12" placeholder="@lang('news.sideSearchPlaceholder')" id="side-search" name="search">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <button type="submit" class="btn btn-primary search_btn">
                                                @lang('news.search')
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                        <div class="discover-algeria__right">
                             @php
                                $adv = getAdvertisement('sidebar-top',$sidebar_key);
                             @endphp
                             @if($adv != null)
                                @php
                                    if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                                        $adv['url'] = "http://" . $adv['url'];
                                    }
                                @endphp
                                <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="way-to-success" class="img-fluid success adimg"></a>
                             @endif
                                <div class="join-algeria doc-green">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 col-sm-2 col-3 doc-download-img">

                                            <svg xmlns="http://www.w3.org/2000/svg" height="70" version="1.1" viewBox="-53 1 511 511.99906" width="70" class="img-fluid download-img-fill">
                                                <g id="surface1">
                                                <path d="M 276.410156 3.957031 C 274.0625 1.484375 270.84375 0 267.507812 0 L 67.777344 0 C 30.921875 0 0.5 30.300781 0.5 67.152344 L 0.5 444.84375 C 0.5 481.699219 30.921875 512 67.777344 512 L 338.863281 512 C 375.71875 512 406.140625 481.699219 406.140625 444.84375 L 406.140625 144.941406 C 406.140625 141.726562 404.65625 138.636719 402.554688 136.285156 Z M 279.996094 43.65625 L 364.464844 132.328125 L 309.554688 132.328125 C 293.230469 132.328125 279.996094 119.21875 279.996094 102.894531 Z M 338.863281 487.265625 L 67.777344 487.265625 C 44.652344 487.265625 25.234375 468.097656 25.234375 444.84375 L 25.234375 67.152344 C 25.234375 44.027344 44.527344 24.734375 67.777344 24.734375 L 255.261719 24.734375 L 255.261719 102.894531 C 255.261719 132.945312 279.503906 157.0625 309.554688 157.0625 L 381.40625 157.0625 L 381.40625 444.84375 C 381.40625 468.097656 362.113281 487.265625 338.863281 487.265625 Z M 338.863281 487.265625 "/>
                                                <path d="M 305.101562 401.933594 L 101.539062 401.933594 C 94.738281 401.933594 89.171875 407.496094 89.171875 414.300781 C 89.171875 421.101562 94.738281 426.667969 101.539062 426.667969 L 305.226562 426.667969 C 312.027344 426.667969 317.59375 421.101562 317.59375 414.300781 C 317.59375 407.496094 312.027344 401.933594 305.101562 401.933594 Z M 305.101562 401.933594 " />
                                                <path d="M 194.292969 357.535156 C 196.644531 360.007812 199.859375 361.492188 203.320312 361.492188 C 206.785156 361.492188 210 360.007812 212.347656 357.535156 L 284.820312 279.746094 C 289.519531 274.796875 289.148438 266.882812 284.203125 262.308594 C 279.253906 257.609375 271.339844 257.976562 266.765625 262.925781 L 215.6875 317.710938 L 215.6875 182.664062 C 215.6875 175.859375 210.121094 170.296875 203.320312 170.296875 C 196.519531 170.296875 190.953125 175.859375 190.953125 182.664062 L 190.953125 317.710938 L 140 262.925781 C 135.300781 257.980469 127.507812 257.609375 122.5625 262.308594 C 117.617188 267.007812 117.246094 274.800781 121.945312 279.746094 Z M 194.292969 357.535156 " />
                                                </g>
                                                </svg>
                                        </div>
                                        <div class="col-md-12 col-lg-9 col-sm-10 col-9">
                                            <h6 class="mb-3 sub-heading">@lang('event.downalod_the') <span class="doc-download">@lang('event.create_company')</span> @lang('event.document')</h6>
                                            <a href="#" class="register">@lang('event.cap_download')</a>
                                        </div>
                                    </div>

                                </div>
                        </div>
                        <div class="discover-algeria__right mt-4">
                            @php
                                $adv = getAdvertisement('sidebar-bottom',$sidebar_key);
                            @endphp
                            @if($adv != null)
                                @php
                                    if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                                        $adv['url'] = "http://" . $adv['url'];
                                    }
                                @endphp
                                <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid success"></a>
                            @endif
                            <div class="join-algeria">
                                 <h6 class="mb-3 sub-heading">@lang('event.return_event')<br> </h6>
                                 <a href="{{route('event-list')}}" class="register">@lang('event.return')</a>
                            </div>
                        </div>
                         <div class="discover-algeria__right mt-4">
                             <div class="join-algeria doc-red">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-sm-2 col-3 doc-service-img">

                                    <svg id="Layer_5" enable-background="new 0 0 64 64" height="70" viewBox="0 0 64 64" width="70" class="img-fluid doc-service-fill" xmlns="http://www.w3.org/2000/svg"><path d="m49 1c-7.72 0-14 6.28-14 14 0 3.011.954 5.731 2.761 8h-5.301c.954-1.063 1.54-2.462 1.54-4 0-1.32-.433-2.537-1.158-3.529l1.57-2.515-5.365-5.365-2.303 1.425c-1.056-.586-2.172-1.049-3.332-1.381l-.62-2.635h-7.584l-.62 2.634c-1.16.333-2.276.795-3.332 1.381l-2.303-1.424-5.363 5.363 1.426 2.302c-.586 1.057-1.049 2.173-1.381 3.332l-2.635.62v7.584l2.635.62c.332 1.159.795 2.275 1.381 3.332l-1.426 2.303 5.363 5.363 2.303-1.426c1.057.586 2.173 1.049 3.332 1.381l.62 2.635h.728l-4.799 17.37c-.526 1.904.526 3.913 2.347 4.479.327.102.662.152.996.152.555 0 1.105-.141 1.61-.416.848-.464 1.46-1.247 1.725-2.206l3.973-14.379h5.212l-.002 13.499c0 1.931 1.57 3.501 3.501 3.501s3.501-1.57 3.501-3.501v-15.499c0-2.757-2.243-5-5-5h-.819l.333-2h13.486v13.277l7 11.666 7-11.666v-23.683c4.458-2.537 7-6.731 7-11.594 0-7.72-6.28-14-14-14zm-31.212 29.332-.476 2.523c-4.726-.809-8.312-4.975-8.312-9.855 0-5.514 4.486-10 10-10 1.811 0 3.586.503 5.128 1.424-1.028.871-1.759 2.081-2.019 3.457-.926-.562-1.993-.881-3.109-.881-3.309 0-6 2.691-6 6 0 3.028 2.256 5.532 5.175 5.936-.163.449-.296.914-.387 1.396zm1.378-3.343c-.056.002-.11.011-.166.011-2.206 0-4-1.794-4-4s1.794-4 4-4c1.287 0 2.486.621 3.239 1.662.31 1.073.912 2.019 1.713 2.755-1.961.613-3.648 1.879-4.786 3.572zm4.834-7.989c0-2.206 1.794-4 4-4s4 1.794 4 4-1.794 4-4 4-4-1.794-4-4zm-12.242 15.964-.523-.318-1.986 1.229-3.123-3.123 1.229-1.986-.318-.524c-.736-1.215-1.281-2.528-1.617-3.904l-.146-.595-2.274-.535v-4.416l2.272-.535.146-.595c.336-1.375.881-2.689 1.617-3.904l.318-.524-1.229-1.986 3.123-3.123 1.986 1.229.523-.318c1.214-.737 2.527-1.281 3.904-1.619l.595-.146.537-2.271h4.416l.535 2.272.595.146c1.377.337 2.69.882 3.904 1.619l.523.318 1.986-1.229 3.121 3.121-.498.797c-.961-.658-2.123-1.044-3.374-1.044-.673 0-1.318.116-1.923.322-2.045-1.495-4.531-2.322-7.077-2.322-6.617 0-12 5.383-12 12 0 5.845 4.285 10.836 9.941 11.822l-.504 2.672-.181-.767-.596-.146c-1.375-.336-2.687-.881-3.902-1.617zm4.129 24.883c-.119.433-.389.782-.757.983-.327.18-.703.218-1.054.108-.8-.248-1.254-1.161-1.012-2.035l4.078-14.761c.665.814 1.57 1.414 2.618 1.684zm13.113-18.847c1.654 0 3 1.346 3 3v15.499c0 .827-.674 1.501-1.501 1.501-.828 0-1.501-.674-1.501-1.501l.002-13.499c0-1.103-.897-2-2-2h-4.687-1.313c-1.654 0-3-1.346-3-3v-1.001l1.753-9.296c.623-3.305 3.517-5.703 6.879-5.703h18.368c.268 0 .519.104.707.293.186.185.286.432.29.693l.001.022c-.005.547-.45.992-.998.992h-14.306c-1.474 0-2.718 1.055-2.959 2.507l-1.916 11.493zm15.348 9.303 1.652-1.101 3 2 3-2 1.652 1.101-2.218 3.697h-4.868zm-2.348-19.303h-12.486l.194-1.165c.08-.484.495-.835.986-.835h11.306zm2 0h4v17.131l-2-1.333-2 1.333zm8 15.798-2 1.333v-17.131h4v17.131zm2-17.798h-9c1.301 0 2.401-.839 2.816-2h6.184zm-3.939-4h-2.121l-.5-8h3.121zm-21.214 10 .333-2h12.82v2zm18.919 21h2.468l-1.234 2.057zm6.961-31h-2.662l.5-8h2.435c2.206 0 4-1.794 4-4s-1.794-4-4-4h-.182c-2.107 0-3.861 1.647-3.992 3.75l-.14 2.25h-3.371l-.141-2.25c-.131-2.103-1.885-3.75-3.992-3.75h-.182c-2.206 0-4 1.794-4 4s1.794 4 4 4h2.436l.383 6.127c-.265-.075-.537-.127-.819-.127h-4.521c-2.269-2.13-3.479-4.882-3.479-8 0-6.617 5.383-12 12-12s12 5.383 12 12c0 4.278-2.232 7.816-6.273 10zm-2.038-10 .133-2.125c.066-1.051.943-1.875 1.996-1.875h.182c1.103 0 2 .897 2 2s-.897 2-2 2zm-7.378 0h-2.311c-1.103 0-2-.897-2-2s.897-2 2-2h.182c1.054 0 1.931.824 1.996 1.875z"/></svg>

                                    </div>
                                    <div class="col-md-12 col-lg-9 col-sm-10 col-9">
                                        <h6 class="sub-heading mb-3">@lang('event.business_services')</h6>
                                        <a href="{{route('contactus')}}" class="register">@lang('event.contact_us')</a>
                                    </div>
                                </div>

                             </div>
                         </div>
                        <div class="discover-algeria__right mt-4">
                            <div class="join-algeria doc-blue">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-sm-2 col-3 doc-support-img">
                                            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                            <svg version="1.1" id="Capa_1" width="70" height="70" class="img-fluid doc-support-fill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M402.787,209.711v-41.537h7.515c4.15,0,7.515-3.364,7.515-7.515C417.816,72.072,345.745,0,257.157,0
                                                        C168.57,0,96.499,72.072,96.499,160.659c0,4.151,3.365,7.515,7.515,7.515h7.515v41.361c-39.215,2.185-70.449,34.77-70.449,74.521
                                                        c0,33.671,22.415,62.195,53.104,71.464v53.165c0,7.245,5.895,13.141,13.141,13.141h0.887v30.56
                                                        c0,32.873,26.743,59.616,59.616,59.616h43.084c30.326,0,55.417-22.766,59.126-52.102h0.448c9.967,0,18.077-8.11,18.077-18.077
                                                        v-33.982c0-9.967-8.11-18.077-18.077-18.077h-14.945c-9.967,0-18.077,8.11-18.077,18.077v33.982
                                                        c0,9.738,7.745,17.681,17.395,18.042c-3.569,21.035-21.911,37.107-43.947,37.107h-43.084c-24.586,0-44.587-20.002-44.587-44.587
                                                        v-30.56h0.887c7.245,0,13.141-5.896,13.141-13.141V360.99c4.073,5.875,10.861,9.734,18.536,9.734
                                                        c12.431,0,22.544-10.114,22.544-22.544V219.93c0-12.43-10.113-22.544-22.544-22.544c-8.633,0-16.144,4.88-19.93,12.023h-9.316
                                                        v-41.236h7.515c4.15,0,7.515-3.364,7.515-7.515c0-63.727,51.844-115.571,115.571-115.571c22.249,0,43.871,6.368,62.524,18.418
                                                        c3.486,2.252,8.138,1.252,10.389-2.234c2.252-3.486,1.251-8.138-2.234-10.389c-21.09-13.623-45.53-20.824-70.679-20.824
                                                        c-69.49,0-126.478,54.557-130.386,123.085h-15.051c3.922-76.823,67.655-138.115,145.436-138.115s141.515,61.292,145.438,138.115
                                                        h-15.052c-1.74-30.431-14.024-59.176-35.032-81.632c-2.836-3.03-7.591-3.189-10.622-0.354c-3.031,2.835-3.189,7.59-0.355,10.622
                                                        c20.116,21.502,31.194,49.515,31.194,78.879c0,4.151,3.365,7.515,7.515,7.515h7.515v41.236h-11.632
                                                        c-3.786-7.144-11.297-12.023-19.93-12.023c-12.431,0-22.544,10.114-22.544,22.544v128.25c0,12.43,10.113,22.544,22.544,22.544
                                                        c8.633,0,16.144-4.88,19.93-12.023h20.148c41.16,0,74.646-33.486,74.646-74.646C470.92,245.091,440.906,213.023,402.787,209.711z
                                                        M252.493,441.821v-33.982c0-1.681,1.368-3.048,3.048-3.048h14.945c1.68,0,3.048,1.367,3.048,3.048v33.982
                                                        c0,1.681-1.368,3.048-3.048,3.048h-14.945C253.861,444.869,252.493,443.502,252.493,441.821z M122.239,406.794h-13.025v-48.094
                                                        h6.513h6.513V406.794z M115.726,224.438h17.534v65.127c0,4.151,3.365,7.515,7.515,7.515c4.15,0,7.515-3.364,7.515-7.515V219.93
                                                        c0-4.144,3.371-7.515,7.515-7.515s7.515,3.371,7.515,7.515v128.25c0,4.144-3.371,7.515-7.515,7.515s-7.515-3.371-7.515-7.515
                                                        v-28.556c0-4.151-3.365-7.515-7.515-7.515c-4.15,0-7.515,3.364-7.515,7.515v24.047h-3.507h-14.027
                                                        c-32.873,0-59.616-26.743-59.616-59.616C56.11,251.182,82.853,224.438,115.726,224.438z M363.71,348.18
                                                        c0,4.144-3.371,7.515-7.515,7.515c-4.144,0-7.515-3.371-7.515-7.515V219.93c0-4.144,3.371-7.515,7.515-7.515
                                                        c4.144,0,7.515,3.371,7.515,7.515V348.18z M396.274,343.671H378.74V224.438h17.534c32.873,0,59.616,26.743,59.616,59.616
                                                        S429.147,343.671,396.274,343.671z"/>
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            </svg>

                                    </div>
                                    <div class="col-md-12 col-lg-9 col-sm-10 col-9">
                                        <h6 class="mb-3 sub-heading">@lang('event.support')</h6>
                                        <a href="{{route('contactus')}}" class="register">@lang('event.cap_contact_us')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- row ends here -->
            </div>
        </div>
    </section>
    <style>
        .events-home__elements-box {
            box-shadow: rgb(0 0 0 / 10%) 0px 10px 60px 0px!important;
            
        }
        .events-home__elements-box:hover {
            box-shadow: -8px 3px 25px 1px rgba(0,0,0,0.75)!important;
            transition: all ease 0.3s;
        }
    </style>
    <!-- top left and right area ends here -->
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#advanced_search_area').toggle();
            $('#advanced_search_btn').click(function(){
                $('#advanced_search_area').toggle();
            });
            if (window.location.search) {
                var queryString = window.location.search;
                queryString = decodeURIComponent(queryString);
                var queryStringArray = (queryString.split('?'))[1].split('&');
                var resultArray = [];

                $.each( queryStringArray, function( key, value ) {
                    resultArray = value.split('=');
                    let val = resultArray[1].split("+").join(" ");
                    if (resultArray[0] == 'keyword' || resultArray[0] == 'start_date') {
                        $("input[name='"+resultArray[0]+"']").val(val);
                    } else {
                        $('#'+resultArray[0]+' option[value="'+val+'"]').attr("selected", "selected");
                    }
                });
            }
            $(document).on('click', '#previous-page-news', function(e){
                e.preventDefault();
                window.location.href = '{{route("past-event-list")}}?page='+'{{$pastEvents->currentPage()-1}}&'+$('#search-news-form').serialize();
            });

            $(document).on('click', '#next-page-news', function(e){
                window.location.href = '{{route("past-event-list")}}?page='+'{{$pastEvents->currentPage()+1}}&'+$('#search-news-form').serialize();
            });

            $(document).on( "submit", '#search-news-form', function(event){
                event.preventDefault();
                window.location.href = '{{route("past-event-list")}}?page=1&'+$('#search-news-form').serialize();
            });

            $(document).on( "click", '#search-by-kw', function(event){
                event.preventDefault();
                window.location.href = '{{route("past-event-list")}}?page=1&keyword='+$('#keyword').val();
            });

            $(document).on( "change", '#sort_by', function(event){
                window.location.href = '{{route("past-event-list")}}?page=1&action=search-by-dates&sort_by='+$('#sort_by').val();
            });

            $(document).on('click', '.copy_link', function(){
                var text= $(this).attr('data-link');
                var textarea = document.createElement("textarea");
                textarea.textContent = text;
                textarea.style.position = "fixed";
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand("copy");
                if(textarea.value != '' && textarea.value == text){
                    toastr.success(`{{__('discover_algeria.link_copied')}}`);
                } else {
                    toastr.error(`{{__('discover_algeria.link_copied_error')}}`);
                }
                document.body.removeChild(textarea);
            });
        });
    </script>

@endsection
