@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('news.economicNews') | @lang('news.placeName')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<section class="news-main-area">
    <div class="discover-algeria">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                            <li class="breadcrumb-elements"><a href="#">@lang('news.home')</a></li>
                            <li class="active">@lang('news.news')</li>
                        </ol>

                        @include('frontend.common.top_banner')

                        <!-- <div class="slider-area news-head">
                            <h1 class="main-heading mb-3">@lang('news.economicNews')</h1>
                            <h6 class="sub-heading mb-4" id='todays_news_id'>{{Carbon\Carbon::parse(date('F jS, Y'))->isoFormat('LL')}}</h6>
                        </div> -->

                        <!-- search engine starts -->
                        <section class="news-advance-search">
                            <form id="search-news-form">
                                <section class="search-engine">
                                    <div class="search-engine__elements">
                                        <div class="input-group mb-4">
                                            <input type="text" class="form-control" placeholder="@lang('news.keywordPlaceholder')" id="keyword" name="keyword">
                                            <div class="input-group-append">
                                                <button href="#search-by-keyword" id="search-by-kw"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"> </span></button>
                                            </div>
                                        </div>
                                        <div class="advance-search">
                                            <a href="javascript:void(0);" class="ad-search-button" id="advanced_search_btn">@lang('news.advancedSearch')</a>
                                        </div>
                                    </div>
                                </section>
                                <!-- search engine ends -->

                                <section class="news-select-area">
                                    <div id="advanced_search_area">
                                        <div class="row" >
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <!-- <p class="select-title">@lang('news.sector')</p> -->
                          <select name="sector[]" multiple class="multi-choice select-button mb-4" style="width: 100%;" data-placeholder="@lang('news.sector')" class="select-title">
                                                    @foreach($sectors as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <!-- <p class="select-title">@lang('news.zone')</p> -->
                                                <select name="zone[]"  multiple  class="multi-choice select-button mb-4" style="width: 100%;" data-placeholder="@lang('news.zone')">
                                                    @foreach($zones as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <!-- <p class="select-title">@lang('news.source')</p> -->
                                                <select name="source[]"  multiple  class="multi-choice select-button mb-4" style="width: 100%;" data-placeholder="@lang('news.source')">
                                                    @foreach($sources as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <!-- <p class="select-title pb-2">@lang('news.date')</p> -->
                                                <div class="date-pik mt-2">
                                                    <input type="date" id="insertion_date" name="insertion_date"
                                                    min="1971-01-01" class="select-button mt-1 w-100">
                                                    <!-- value="{{date('Y-m-d')}}" -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sr-btn">
                                            <button type="submit" class="common-button mt-2" id="news-search-form-submit">@lang('news.search')</button>
                                        </div>
                                    </div>
                                   
                                </section>
                            </form>
                        </section>

                        <section class="news-inside-post" id="news-list-data">

                            <div class="slider-area table-carousel">
                                <div id="table-slide">
                                    <!-- The slideshow -->
                                    <div class="carousel-inner" id="carousel-inner-data">
                                        @if ($latestNews != '')
                                        <h4 class="main-heading">
								@lang('news.latestNewsLabelexp')
									</h4>
                                        <div id="latestnewscarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                                        
                                            @if (count($ids) > 3) 
												  {!! $latestNews !!}
                                            <div class="pagination-latest-news">

                                                <a class="carousel-control-prev news-pagination-prev" href="#latestnewscarousel" role="button" data-slide="prev" id="latest_news_previous_btn">
                                                    <span class="carousel-control-prev-icon news-prev" aria-hidden="true"></span>
                                                    <span class="sr-only ">@lang('news.previous')</span>
                                                </a>
                                                <a class="carousel-control-next news-pagination-next" href="#latestnewscarousel" role="button" data-slide="next" id="latest_news_next_btn">
                                                    <span class="carousel-control-next-icon news-next" aria-hidden="true"></span>
                                                    <span class="sr-only">@lang('news.next')</span>
                                                </a>
                                            </div>
                                            @endif 
                                        </div>
                                        <!-- <div class="pagination-latest-news">
                                            <a class="news-pagination-prev" href="" data-slide="prev" id="previous-page-latest-news" >
                                                <span class="news-prev"></span>
                                            </a>
                                            <a class="news-pagination-next" href="" data-slide="next" id="next-page-latest-news" >
                                                <span class="news-next"></span>
                                            </a>
                                        </div> -->
                                        @endif
                                        <!-- latest news ends here -->
                                        <h4 class="main-heading">@lang('news.moreNewsLabelexp')</h4>
                                        {!! $moreNews !!}

                                    </div>
                                </div>
                                <!-- Left and right controls -->
                                <div class="next-prev-controls-slide mt-4">
                                    <button class="login-in" id="previous-page-more-news" style="{{ ($news->onFirstPage()) ? 'visibility:hidden;': ''}}">
                                        <span class="previous-slide">@lang('news.previous')</span>
                                    </button>

                                <button class="register" id="next-page-more-news" style="{{ (!$news->hasMorePages()) ? 'visibility:hidden;': ''}}">
                                        <span class="next-slide">@lang('news.next')</span>
                                    </button>
                                </div>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        // load more testimonials ajax call
        $(document).ready(function(){
            $('#advanced_search_area').toggle();
            $('#advanced_search_btn').click(function(){
                $('#advanced_search_area').toggle();
            });

            $(document).on('click','.economic_submit',function(e){
                e.preventDefault();
                var type = $(".business_subscribe").val();
                var email = $(".economic_email").val();

                $.ajax({
                    url: '{{route("subscribe_newsletters")}}',
                    type : "POST",
                    data : {type:type,email:email, _token:"{{csrf_token()}}"},
                    beforeSend : function() {
                        $('#spinner-economic-newsletter').css('display','inline-block');
                        $('.economic_submit').prop('disabled', true);
                    },
                    success : function (data)
                    { 
                        $('#spinner-economic-newsletter').css('display','none');
                        $('.economic_submit').prop('disabled', false);
                        if(data.errors){
                            if(data.errors.email){
                                $("#economic_error").css('display','block');
                                $("#economic_error").html(data.errors.email);
                                $("#economic_success").css('display','none');
                                $("#economic_sub_already").css('display','none');
                            }
                        }
                        if(data.success){
                            $("#economic_error").html('');
                            $(".economic_email").val('');
                            $("#economic_success").css('display','block');
                            $("#economic_success").html(data.success);
                            $("#economic_sub_already").css('display','none');
                        }
                        if(data.subscribed){
                            $("#economic_success").css('display','none');
                            $("#economic_error").html('');
                            $(".economic_email").val('');
                            $("#economic_sub_already").css('display','block');
                            $("#economic_sub_already").html(data.subscribed);
                        }
                    }
                });

            });
            // $("#latest_news_previous_btn").toggle();
            // $("#latest_news_previous_btn").on('click', function(){

            //     $("#latest_news_previous_btn").toggle();
            //     $("#latest_news_next_btn").toggle();
            // });
            // $("#latest_news_next_btn").on('click', function(){

            //     $("#latest_news_previous_btn").toggle();
            //     $("#latest_news_next_btn").toggle();
            // });


            if (window.location.search) {
                var queryString = window.location.search;
                if( queryString != '?page=1&keyword=' && queryString != '?page=1&keyword=&sector=&zone=&source=&insertion_date='){
                    $('#advanced_search_area').css('display','');
                }
                queryString = decodeURIComponent(queryString);
                var queryStringArray = (queryString.split('?'))[1].split('&');
                var resultArray = [];

                $.each( queryStringArray, function( key, value ) {
                    resultArray = value.split('=');
                    let val = resultArray[1].split("+").join(" ");
                    if (resultArray[0] == 'keyword' || resultArray[0] == 'insertion_date') {

                        $("input[name='"+resultArray[0]+"']").val(val);
                        if(resultArray[0] == 'insertion_date' && val != '') {

                            // $('#todays_news_id').html("{{date('F jS, Y', strtotime(Request::get('insertion_date')))}}");
                            $('#todays_news_id').html("{{Carbon\Carbon::parse(date('F jS, Y', strtotime(Request::get('insertion_date'))))->isoFormat('LL')}}");
                        }
                    } else {
                        if(resultArray[0] == 'sector[]'){
                            resultArray[0] = 'sector';
                        }
                        if(resultArray[0] == 'zone[]'){
                            resultArray[0] = 'zone';
                        }
                        if(resultArray[0] == 'source[]'){
                            resultArray[0] = 'source';
                        }
                        $('#'+resultArray[0]+' option[value="'+val+'"]').attr("selected", "selected");
                    }
                });
            }

            $(document).on('click', '#previous-page-more-news', function(e){
                e.preventDefault();
                var currentURL = window.location.href.split('?')[1];
                if(currentURL != undefined) { 
                    currentURL= currentURL.slice(6);
                }else {
                    currentURL= '';
                }
                window.location.href = '{{route("premium-news-list")}}?page='+'{{$news->currentPage()-1}}'+currentURL;
            });
            
            $(document).on('click', '#next-page-more-news', function(e){
                e.preventDefault();
                var currentURL = window.location.href.split('?')[1];
                if(currentURL != undefined) { 
                    currentURL= currentURL.slice(6);
                }else {
                    currentURL= '';
                }
                window.location.href = '{{route("premium-news-list")}}?page='+'{{$news->currentPage()+1}}'+currentURL;
            });

            $(document).on( "submit", '#search-news-form', function(event){
                event.preventDefault();
                window.location.href = '{{route("premium-news-list")}}?page=1&'+$('#search-news-form').serialize();
            });

            $(document).on( "click", '#search-by-kw', function(event){
                event.preventDefault();
                window.location.href = '{{route("premium-news-list")}}?page=1&keyword='+$('#keyword').val();
            });
        });
    </script>
 <!--   @include('frontend.newsletters.footer-subscribe') -->
@endsection
