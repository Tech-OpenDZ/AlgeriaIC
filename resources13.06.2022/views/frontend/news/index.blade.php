@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('news.economicNews') | @lang('news.placeName')</title>
@endsection

@section('content')
<section class="news-main-area">
    <div class="discover-algeria">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-lg-8 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                            <li class="breadcrumb-elements"><a href="#">@lang('news.home')</a></li>
                            <li class="active">@lang('news.news')</li>
                        </ol>

                        @include('frontend.common.top_banner')

                        <div class="slider-area news-head">
                            <h4 class="main-heading mb-3">@lang('news.economicNews')</h4>
                            <h6 class="sub-heading mb-4">@lang('news.todayNews')</h6>
                            <!-- <h4 class="main-heading mb-3">@lang('news.todayNews')</h4> -->
                            @include('frontend.banner.index', ['banner' => 'news'])
                        </div>
                        <!-- slider ends here -->

                        <div class="news-paper">
                            <div class="free-review" id="free-review-tab">
                                <div class="row align-items-center">
                                    <div class="col-md-10 col-sm-10 col-9">
                                        <div class="free-review__left">
                                            <h6 class="sub-heading">@lang('news.generateReview')</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-3">
                                        <div class="free-review__right">
                                            <img src="{{asset('css/images/newspaper.svg')}}" alt="newspaper" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- search engine starts -->
                        <form id="search-news-form">
                            <section class="search-engine">
                                <h6 class="sub-heading">@lang('news.searchEngine')</h6>

                                <p class="mt-3 mb-2">@lang('news.keyword')</p>
                                <div class="search-engine__elements">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="@lang('news.keywordPlaceholder')" id="keyword" name="keyword">
                                        <div class="input-group-append">
                                            <button href="#search-by-keyword" id="search-by-kw"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"> </span></button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- search engine ends -->

                            <section class="news-select-area">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <p class="select-title pb-2">@lang('news.sector')</p>
                                        <select name="sector" id="sector" class="select-button mb-4">
                                            <option value="">@lang('news.selectSector')</option>
                                            @foreach($sectors as $sector)
                                            <option value="{{$sector->id}}">{{$sector->localeAll[0]->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <p class="select-title pb-2">@lang('news.zone')</p>
                                        <select name="zone" id="zone" class="select-button mb-4">
                                            <option value="">@lang('news.selectZone')</option>
                                            @foreach($zones as $zone)
                                            <option value="{{$zone->id}}">{{$zone->localeAll[0]->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <p class="select-title pb-2">@lang('news.source')</p>
                                        <select name="source" id="source"  class="select-button mb-4">
                                            <option value="">@lang('news.selectSource')</option>
                                            @foreach($sources as $source)
                                            <option value="{{$source->news_source_id}}">{{$source->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <p class="select-title pb-2">@lang('news.date')</p>
                                        <div class="date-pik">
                                            <input type="date" id="insertion_date" name="insertion_date"
                                            min="1971-01-01" class="select-button mb-4">
                                            <!-- value="{{date('Y-m-d')}}" -->
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="common-button" id="news-search-form-submit">@lang('news.search')</button>
                            </section>
                        </form>

                    <section class="news-inside-post" id="news-list-data">

                        <div class="slider-area table-carousel">
                            <div id="table-slide">
                                <!-- The slideshow -->
                                <div class="carousel-inner" id="carousel-inner-data">
                                    {!! $nextNews !!}
                                </div>
                            </div>
                            <!-- Left and right controls -->
                            <div class="next-prev-controls-slide">
                                <button class="login-in" id="previous-page-news" style="{{ ($news->onFirstPage()) ? 'visibility:hidden;': ''}}">
                                    <span class="previous-slide">@lang('news.previous')</span>
                                </button>

                               <button class="register" id="next-page-news" style="{{ (!$news->hasMorePages()) ? 'visibility:hidden;': ''}}">
                                    <span class="next-slide">@lang('news.next')</span>
                                </button>
                            </div>
                           
                        </div>
                    </section>
                   
                    <!-- .news letter -->
                    <section class="subscribe-news-letter-event">
                        <!-- ---------Events Subscriber NewsLetter start----------- -->
                            @include('frontend.newsletters.home_events_subscribe')
                        <!-- -----------End Here------------------------ -->
                    </section>
                   
                    </div>
                  
                </div>
                <!-- left area ends here -->
               
                @include('frontend.common.right_sidebar')
            </div>
           
            <!-- row ends here -->
        </div>
        
    
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
    <script>
        // load more testimonials ajax call
        $(document).ready(function(){
            $('#free-review-tab').click(function() {
                window.location.href = '{{route("press-review")}}';
            });
            if (window.location.search) {
                var queryString = window.location.search;
                queryString = decodeURIComponent(queryString);
                var queryStringArray = (queryString.split('?'))[1].split('&');
                var resultArray = [];

                $.each( queryStringArray, function( key, value ) {
                    resultArray = value.split('=');
                    let val = resultArray[1].split("+").join(" ");
                    if (resultArray[0] == 'keyword' || resultArray[0] == 'insertion_date') {

                        $("input[name='"+resultArray[0]+"']").val(val);
                    } else {
                        $('#'+resultArray[0]+' option[value="'+val+'"]').attr("selected", "selected");
                    }
                });
            }

            $(document).on('click', '#previous-page-news', function(e){
                e.preventDefault();
                window.location.href = '{{route("news-list")}}?page='+'{{$news->currentPage()-1}}&'+$('#search-news-form').serialize();
            });

            $(document).on('click', '#next-page-news', function(e){
                e.preventDefault();
                window.location.href = '{{route("news-list")}}?page='+'{{$news->currentPage()+1}}&'+$('#search-news-form').serialize();
            });

            $(document).on( "submit", '#search-news-form', function(event){
                event.preventDefault();
                window.location.href = '{{route("news-list")}}?page=1&'+$('#search-news-form').serialize();
            });

            $(document).on( "click", '#search-by-kw', function(event){
                event.preventDefault();
                window.location.href = '{{route("news-list")}}?page=1&keyword='+$('#keyword').val();
            });
        });
    </script>
    @include('frontend.newsletters.footer-subscribe')
@endsection
