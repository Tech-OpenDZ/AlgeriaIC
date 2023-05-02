
@extends('frontend.layouts.master')
@section('head')
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@lang('business_opportunity_listing.breadcrumb_business_opportunities') | @lang('news.placeName')</title>
<script>
    function hidePagination(status) {
        if (status) {
            $('.next-prev-controls-slide').css('display', 'none');
        } else {
            $('.next-prev-controls-slide').css('display', '');
        }
    }
</script>
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">

@endsection
@section('content')
<section class="business-opportunities">
    <div class="discover-algeria" style="padding-top:0px;padding-bottom:0px;background-color:#ffffff!important">
        <div class="container_contact" style="max-width:100%!important">
           <div class="row" style="background-color:#ffffff">
                    <div class="opportunity_heading" style="height:400px; width:100%;padding-top:70px">  
                        <div class="section_title" style="padding-top:125px">
									<h2 class="subtitle align-content-center justify-content-center" style="color:#FFFFFF;font-weight:bold">@lang('business_opportunity_listing.business_opportunities')</h2>
								</div>
                    </div>
                </div>
    <div class="page-content" >
        <div class="container" style="max-width:1170px;background-color:transparent">
            <div class="row" style="padding-top:80px;padding-bottom:80px">
                <div class="bus_div col-md-9 col-lg-9 col-sm-12">
                    <div class="discover-algeria__left">
                        <!--<ol class="breadcrumb-area">
                            <li class="breadcrumb-elements"><a href="#">@lang('business_opportunity_listing.breadcrumb_home')</a></li>
                            <li class="active">@lang('business_opportunity_listing.breadcrumb_business_opportunities')</li>
                        </ol> -->

                        @include('frontend.common.top_banner')

                        <div class="slider-area table-carousel">

                            <!--<div class="business-titles mt-3 mb-3">
                                <h1 class="main-heading mb-3"></h1>
                                <p class="business-content">@lang('business_opportunity_listing.business_content')</p>
                            </div> -->
                            <div class="business-table business-table-slide-two">
                                @php
                                /*
                                @endphp
                                @if(count($sectors) > 0)
                                <table class="table">
                                    <thead>
                                        <tr class="table-headings">
                                            <th scope="col" class="sector text-center">@lang('business_opportunity_listing.sectors')</th>
                                            <th scope="col" class="sector text-center">@lang('business_opportunity_listing.sectors')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sectors as $key =>$data)
                                        @if($key == 0 || $key%2 == 0)
                                        <tr>
                                            @endif
                                            <td class="sector text-center">
                                               <a href="{{route('business-opportunity-sector-details', ['id' => $data->page_key])}}">{{ $data->localeAll[0]->name }}</a>
                                            </td>
                                            @if(count($sectors) == $key+1 && count($sectors)%2 != 0)
                                            <td class="sector text-center">
                                            </td>
                                            @endif
                                            @if(($key+1)%2==0)
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <br>
                                <div class="alert-text">@lang('business_opportunity_listing.no_sector_found')</div>
                                @endif
                                @php
                                */
                                @endphp
                                <!-- search engine starts -->
                                <section class="news-advance-search">
                                    <form id="generate-form">
                                        <div class="row" id="">
                                            <div class="col-lg-12">
                                                <section class="bd-search-outer">
                                                    <!-- search engine ends -->
                                                    <section class="news-select-area">
                                                        <section class="search-engine">
                                                            <!-- <p class="select-title pb-2">@lang('press_review.keyword')</p> -->
                                                            <div class="search-engine__elements">
                                                                <div class="input-group mb-4">
                                                                    <input type="text" class="form-control" placeholder="@lang('news.keywordPlaceholder')" id="keyword" name="company">
                                                                    <div class="input-group-append">
                                                                        <button href="{{route('business-opportunity')}}" id="search-by-kw"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"> </span></button>
                                                                    </div>
                                                                    <div class="advance-search">
                                                                        <a href="javascript:void(0);" class="ad-search-button" id="advanced_search_btn">@lang('news.advancedSearch')</a>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </section> 
                                                        <div id="advanced_search_area">
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                                    <!-- <p class="select-title">@lang('business_opportunity_listing.business_line')</p> -->
                                                                    <select name="sector[]" multiple class="multi-choice select-button mb-4" style="width: 100%;" data-placeholder="@lang('business_opportunity_listing.business_line')">
                                                                    
                                                                    @foreach($sectors as $key =>$value)
                                                                        <option value="{{$key}}">{{$value}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                                    <!-- <p class="select-title">@lang('business_opportunity_listing.area')</p> -->
                                                                    <select name="zone[]"  multiple  class="multi-choice select-button mb-4" style="width: 100%;" data-placeholder="@lang('business_opportunity_listing.area')">
                                                                        @foreach($zones as $key =>$value)
                                                                            <option value="{{$key}}">{{$value}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                                    <!-- <p class="select-title">@lang('business_opportunity_listing.date')</p> -->
                                                                    <input type="date" id="date" name="date" class="select-button" style="margin-top: 12px;width: 100%;">
                                                                </div>
                                                            </div>
                                                            <div class="sr-btn mt-2">
                                                                <button type="submit" class="common-button" id="news-search-form-submit">@lang('news.search')</button>
                                                            </div>
                                                        </div>
                                                        
                                                        
 
                                                        
                                                        @if( Session::has( 'error' ))
                                                            <div class="danger-alert-msg text-center w-100 mb-2 failure-msg">
                                                                @lang('press_review.records_not_found')
                                                            </div>
                                                        @endif
                                                        
                                                    </section>
                                                </section>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                                <br> <br>
                                <section class="news-inside-post" id="news-list-data">
                                    <div class="slider-area table-carousel">
                                        <div id="table-slide" class="carousel slide" data-ride="carousel" data-interval="false">



                                            <!-- The slideshow -->
                                            <div class="carousel-inner" id="carousel-inner-data">
                                            {!! $next_business_opportunity !!}
                                            </div>

                                        </div>
                                        <!-- Left and right controls -->
                                        @if($newsCount > 0)
                                        <div class="next-prev-controls-slide mt-4">

                                           
                                            <!-- <a class="login-in" id="previous-page-news-disabled" href="#old" role="button">
                                                <span class="previous-slide">@lang('news.previous')</span>
                                            </a>

                                            <a class="right carousel-control register" id="next-page-news" href="#new" role="button">
                                                <span class="next-slide">@lang('news.next')</span>
                                            </a> -->
                                           
                                            <button class="genric-btn success radius" id="previous-business_opportunity" style="{{ ($businessOpportunityList->onFirstPage()) ? 'visibility:hidden;': ''}}">
                                                <span class="previous-slide">@lang('news.previous')</span>
                                            </button>
                                            {{ $businessOpportunityList->links() }}
                                            <button class="genric-btn success radius" id="next-business_opportunity" style="{{ (!$businessOpportunityList->hasMorePages()) ? 'visibility:hidden;': ''}}">
                                                <span class="next-slide">@lang('news.next')</span>
                                               
                                            </button>
                                          
                                        </div>


                                        @endif
 <br>
                                    </div>
                                </section>

                            </div>
                        </div>
                    </div>
                </div>
                <style>
                   
                        .events-main-area .events-home__elements-box .event-box-right .semi-bold-para, .algeria-home .discover-algeria__left .events-home__elements-box .event-box-right .semi-bold-para {
                                line-height: 1.5;
                                padding: 0px;
                                margin: 0px;
                                font-family: 'Muli', sans-serif;
                                text-transform: none!important;
                                height: 61px;

                            }
                            
                                         .business-opportunities .discover-algeria__left .table-carousel .business-table-slide-two .register {
  
                                                  background-color: #f9b634;
                                                  border: 1px solid #f9b634;
                                                
                                              }
                   .events-home__elements-box{
                    box-shadow: rgb(0 0 0 / 10%) 0px 10px 60px 0px;
                   }

                    </style>
                    
       
                <!-- left area ends here -->
                {{-- @include('frontend.common.right_sidebar') --}}
            </div>
            <!-- row ends here -->
        </div>
    </div>
</section>

<!--<div class="content-wrapper">
@foreach($business_opportunities->slice(0,6) as $business_opportunity)
  <div class="news-card">
    <a href="#" class="news-card__card-link"></a>
    <img src="https://images.pexels.com/photos/127513/pexels-photo-127513.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="" class="news-card__image">
    <div class="news-card__text-wrapper">
      <h2 class="news-card__title">{{ str_limit(html_entity_decode(strip_tags($business_opportunity->localeAll[0]->project_title)),90,'...') }} </h2>
      <div class="news-card__post-date">Jan 29, 2018</div>
      <div class="news-card__details-wrapper">
        <p class="news-card__excerpt">{{ str_limit(html_entity_decode(strip_tags($business_opportunity->localeAll[0]->project_description)),150,'...') }} &hellip;</p>
        <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>
  </div>
  @endforeach
  

</div> -->




<script>  




</script>



<!-- top left and right area ends here -->
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> -->
<script>
$(document).ready(function(){
    $('#advanced_search_area').toggle();
    $('#advanced_search_btn').click(function(){
        $('#advanced_search_area').toggle();
    });

    

    $(document).on('click', '#previous-business_opportunity', function(e){
        e.preventDefault();
        window.location.href = '{{route("business-opportunity")}}?page='+'{{$businessOpportunityList->currentPage()-1}}&'+$('#search-news-form').serialize();
    });

    $(document).on('click', '#next-business_opportunity', function(e){
        e.preventDefault();
        window.location.href = '{{route("business-opportunity")}}?page='+'{{$businessOpportunityList->currentPage()+1}}&'+$('#search-news-form').serialize();
    });

    $(document).on( "submit", '#search-news-form', function(event){
        event.preventDefault();
        window.location.href = '{{route("business-opportunity")}}?page=1&'+$('#search-news-form').serialize();
    });
});
</script>

@endsection