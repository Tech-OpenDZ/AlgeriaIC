@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('business_intelligence.title') | @lang('business_intelligence.algeria_invest')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
@endsection 

@section('content')
<section class="resources-main">
    <div class="news-main-area">
        <div class="discover-algeria">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-9 col-sm-12">
                        <div class="discover-algeria__left">
                            <ol class="breadcrumb-area">
                                <li class="breadcrumb-elements"><a href="#">@lang('business_intelligence.breadcrumb_home') </a></li>
                              
                                <li class="active">@lang('business_intelligence.business_intelligence')</li>
                            </ol>
                            
                            @include('frontend.common.top_banner')
                            
                        <div class="resources-invest-algeria">
                                 <!-- search engine starts -->
                            <div class="search-engine news-select-area">
                                <div class="row">
                                   <div class="col-md-12 col-sm-12 col-12">
                                        <h6 class="main-heading mb-4">@lang('business_intelligence.business_intelligence')</h6>
                                   </div>
                                </div>
                              
                                <!-- <div class="search-engine__elements">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search.." id="keyword" name="email">
                                        <div class="input-group-append">
                                        <button type="button" onclick="findString()" style="border:none"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></span></button>
                                        </div>
                                    </div>
                                    <p id="error_msg" style="color:red; display: none"></p>
                                </div>  -->
                            </div>  
                             <!-- search engine ends -->
                            
                             <p class="resource-caption pb-3">@lang('business_intelligence.content')</p>
                        {{-- <a href="{{route('contactus')}}" target="_blank" class="sheet">
                                <div class="common-button">
                                   <div class="events-download-button">
                                        <p class="text-white download-heading">@lang('business_intelligence.shuttle_sheet')</p>
                                     
                                    </div>
                                </div>
                            </a> --}}
                            @if(!$sub_dashboard->isEmpty())
                             <div class="dashboard-section">
                                <h4 class="main-heading mb-4">@lang('business_intelligence.business_intelligence_dashboard') </h4>
                                <div id="latestnewscarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                                <div class="carousel-inner">
                                    @foreach($sub_dashboard as $dashboard)
                                    <div class="carousel-item {{($loop->first)? 'active': ''}}">
                                        <p >{!!$dashboard->localeAll[0]->description !!}</p>
                                        <img src="{{asset('storage/uploads/business_intelligence/images/'.$dashboard->image)}}" class="img-fluid" style="width:100%">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="pagination-latest-news">
                                    <a class="carousel-control-prev news-pagination-prev" href="#latestnewscarousel" role="button" data-slide="prev" style="margin-top: 10px;">
                                        <span class="carousel-control-prev-icon news-prev" aria-hidden="true"></span>
                                        <span class="sr-only ">Previous</span>
                                    </a>
                                    <a class="carousel-control-next news-pagination-next" href="#latestnewscarousel" role="button" data-slide="next" style="margin-top: 10px;">
                                    <span class="carousel-control-next-icon news-next" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                    </a>
                                </div>
                               
                              </div>
                             </div>
                            @endif
                            <br>
                            {{ $report_title }}
                            <br><br>
                             <div class="resources-invest-algeria__area">
                                @foreach($reports as $report)
                                <div class="dashboard-section">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-12 mt-4">
                                        <div class="events-home__elements-box green-border-bottom">
                                            <div class="row">
                                                <div class="col-md-9 col-lg-9 col-sm-9">
                                                    <h6 class="sub-heading sponsered-heading">
                                                        {!! strip_tags($report->localeAll[0]->title) !!}
                                                    </h6>
                                                    <p style="word-break: break-all;">
                                                        {!! strip_tags($report->localeAll[0]->description) !!}
                                                    </p>
                                                    
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-sm-3">
                                                    <h6 class="sub-heading sponsered-heading">
                                                        @lang('business_intelligence.period'): {{ strip_tags($report->localeAll[0]->period)}}
                                                    </h6>
                                                    <br>
                                                    <a class="common-button"  href="{{ route('download-report',['id' => $report->id])}}" download>CONSULT REPORT</a>
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
                    <!-- left area ends here -->

                    {{-- @include('frontend.common.right_sidebar') --}}

                  
                </div>
                <!-- row ends here -->
                <!-- image logo carousel -->

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
<script src="js/browser-class.js"></script>
<!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
<script src="{{ asset('js/front-end/main.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>

<script src="{{ asset('dist/assets/chartjs/Chart.bundle.js') }}"></script>

<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> --> 
<script>
    var TRange=null;

function findString () {
    var str = $("#keyword").val();

    if(str != '' && str != undefined){
        if (parseInt(navigator.appVersion)<4) return;
        var strFound;
        if (window.find) {

        // CODE FOR BROWSERS THAT SUPPORT window.find
            $('#error_msg').css('display', 'none')
            strFound=self.find(str);
            if (!strFound) {
                strFound=self.find(str,0,1);
                while (self.find(str,0,1)) continue;
            }
        }
        else if (navigator.appName.indexOf("Microsoft")!=-1) {

        // EXPLORER-SPECIFIC CODE

            if (TRange!=null) {
                TRange.collapse(false);
                strFound=TRange.findText(str);
                if (strFound) TRange.select();
            }
            if (TRange==null || strFound==0) {
                TRange=self.document.body.createTextRange();
                strFound=TRange.findText(str);
                if (strFound) TRange.select();
            }
        }
        else if (navigator.appName=="Opera") {
            toastr.error(`{{__('discover_algeria.browser_error')}}`);
            return;
        }
        if (!strFound){
            $('#error_msg').html(`{{__('discover_algeria.keyword_not_found')}}`)//alert ("String '"+str+"' not found!")
            $('#error_msg').css('display', 'block')//alert ("String '"+str+"' not found!")
        }
        return;
    } else {
        $("#keyword").val('');
        $('#error_msg').html(`{{__('discover_algeria.enter_keyword')}}`)//alert ("String '"+str+"' not found!")
        $('#error_msg').css('display', 'block')
    }
}
</script>
@endsection




