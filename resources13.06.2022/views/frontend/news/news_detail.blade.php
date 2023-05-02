
@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{str_limit($news->localeAll[0]->title,50,'...')}} | @lang('news.placeName')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
@endsection

@section('content')

    <section class="news-main-area">
        <div class="discover-algeria">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-12">
                        <div class="discover-algeria__left">
                            <ol class="breadcrumb-area">
                                <li class="breadcrumb-elements"><a href="#">@lang('news_detail.home')</a></li>
                                <li class="active">@lang('news_detail.newsDetailPage')</li>
                            </ol>
                            <div class="business-banner">
                                @php
                                    $adv = getAdvertisement('top-header','discover_algeria');
                                @endphp
                                <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
                            </div>

                            <div class="news-head pt-4">
                                <h6 class="sub-heading">{{$news->localeAll[0]->title}}</h6>
                                <h6 class="sub-heading-two mt-3">{{date('jS', strtotime($news->insertion_date))}} of {{date('F Y', strtotime($news->insertion_date))}}</span></h6>

                            </div>
                            <!-- search engine starts -->
                            <form id="search-news-form">
                                <section class="search-engine">
                                    <h6 class="sub-heading">@lang('news_detail.searchEngine')</h6>

                                    <p class="mt-3 mb-2">@lang('news_detail.keyword')</p>
                                    <div class="search-engine__elements">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="@lang('news_detail.keywordPlaceholder')" id="search-form" name="keyword">
                                            <div class="input-group-append">
                                                <a href="#search-by-keyword" id="search-by-keyword-button"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></a> </span>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- search engine ends -->

                                <section class="news-select-area">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <p class="select-title pb-2">@lang('news_detail.sector')</p>
                                            <select name="sector" id="sector" class="select-button mb-4">
                                                <option value="">@lang('news_detail.selectSector')</option>
                                                @foreach($sectors as $sector)
                                                <option value="{{$sector->id}}">{{$sector->localeAll[0]->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <p class="select-title pb-2">@lang('news_detail.zone')</p>
                                            <select name="zone" id="zone" class="select-button mb-4">
                                                <option value="">@lang('news_detail.selectZone')</option>
                                                @foreach($zones as $zone)
                                                <option value="{{$zone->id}}">{{$zone->localeAll[0]->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <p class="select-title pb-2">@lang('news_detail.source')</p>
                                            <select name="source" id="source"  class="select-button mb-4">
                                                <option value="">@lang('news_detail.selectSource')</option>
                                                @foreach($sources as $source)
                                                <option value="{{$source->news_source_id}}">{{$source->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <p class="select-title pb-2">@lang('news_detail.date')</p>
                                            <div class="date-pik">
                                                <input type="date" id="insertion_date" name="insertion_date"
                                                min="1971-01-01" class="select-button mb-4">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="common-button">@lang('news_detail.search')</button>
                                </section>
                            </form>
                            <!-- news article starts -->
                            @include('frontend.news.news_detail_content')
                        </div>
                    </div>
                    <!-- left area ends here -->

                    @include('frontend.common.right_sidebar')
                </div>
                <!-- row ends here -->
            </div>
        </div>
    </section>
    <!-- top left and right area ends here -->
    @if(count($footerNews) > 0)
    <section class="news-inside-post news-detail-posts">
        <div class="slider-area table-carousel">
            <div class="news-area-post-elements">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-3 entire-news-section">
                    <div class="container">
                        <div class="row new-coloumn">
                            @foreach($footerNews as $news)
                            <div class="col-lg-4 co-md-6 col-sm-6">
                                <div class="news-post">

                                    <div class="row mt-3">
                                        <div class="col-lg-4 col-md-3 col-sm-4 col-12  no-padding-right">
                                            <div class="news-post__left">
                                                <a href="{{route('news-detail', [$news->page_key])}}">
                                                    <div class="ratio-1x1">
                                                        <div class="ratio-inner">
                                                            <img src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                                        </div>
                                                    </div>
                                                    @if($news->is_premium == 1)
                                                    <a href="#" class="premium-news">@lang('news.premiumNews')</a>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-9 col-sm-8 ">

                                            <div class="news-post__right for-detail-page">
                                                <ul class="tags-top">

                                                    @foreach($news->sectors as $sector)
                                                    @break($loop->iteration == 4)
                                                    <li> <a href="#" class="yellow-box">{{$sector->localeAll[0]->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                                <a href="{{route('news-detail', [$news->page_key])}}">
                                                    <p class="news-text text-limit">{{ html_entity_decode(strip_tags($news->localeAll[0]->title)) }}</p>
                                                </a>

                                                <p class="news-post-caption text-limit">{{ html_entity_decode(strip_tags($news->localeAll[0]->description)) }}</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
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
    <script>
    // load more testimonials ajax call
    $(document).ready(function(){

        $(document).on( "submit", '#search-news-form', function(event){
            event.preventDefault();
            var data = $(this).serialize();
            if( data !== "keyword=&sector=&zone=&source=&insertion_date="){
                window.location.href = "{{ route('news-list') }}"+"?"+data;
            }
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
