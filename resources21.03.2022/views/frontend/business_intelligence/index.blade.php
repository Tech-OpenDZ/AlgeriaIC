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
<script src="{{ asset('dist/assets/chartjs/Chart.bundle.js') }}"></script>
<script>
    var barChartData = {
        labels: [
            "Positive",
            "Neutral",
            "Negative"
        ],
        datasets: [
            {
                data: [90, 180, 90],
                backgroundColor: [
                    "#35A85E",
                    "#8BA1B2",
                    "#E50019"
                ],
                fill: false,
            }]
    };

    window.onload = function() {
        var ctx = document.getElementById("doughnut").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'doughnut',
            data: barChartData,
            options: {
                legend: false,
                enable: false
            }
        });

        var ctx = document.getElementById("line-chart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: barChartData,
            options: {
                fill: false
            }
        });

        var ctx = document.getElementById("doughnut-1").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'doughnut',
            data: barChartData,
            options: {
                legend: false,
                enable: false
            }
        });
    };
</script>
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
                                        <h1 class="main-heading mb-4">@lang('business_intelligence.business_intelligence')</h1>
                                   </div>
                                </div>
                              
                                <div class="search-engine__elements">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search.." id="keyword" name="email">
                                        <div class="input-group-append">
                                        <button type="button" onclick="findString()" style="border:none"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></span></button>
                                        </div>
                                    </div>
                                    <p id="error_msg" style="color:red; display: none"></p>
                                </div> 
                            </div>  
                             <!-- search engine ends -->
                            
                             <p class="resource-caption pb-3">@lang('business_intelligence.content')</p>
                             <a href="../apps/images/left-login-img.png" download class="sheet">
                                <div class="common-button">
                                   <div class="events-download-button">
                                        <p class="text-white download-heading">@lang('business_intelligence.shuttle_sheet')</p>
                                     
                                    </div>
                                </div>
                            </a>
                             <div class="dashboard-section">
                                 <h4 class="main-heading mb-4">@lang('business_intelligence.business_intelligence_dashboard') </h4>
                                <div class="dashboard-up-down">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3 col-lg-3 col-sm-3 mb-2 section-with-border">
                                        <div class="rating-remark-outer">
                                             <div class="rating-remark mb-3">
                                                       <h2 class="rating-heading">2987</h2>
                                                       <p class="mt-3 rating-caption">Mentions in Aug. 2020 for your company</p>
                                             </div>
                                                
                                            <div class="rating-remark-arrows">
                                                <p class="arrow-text">-18%</p>
                                                <div class="text-center">
                                                    <i class="fa fa-long-arrow-down arrow-color-red" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-3 mb-2 section-with-border">
                                            <div class="rating-remark-outer">
                                                 <div class="rating-remark mb-3">
                                                           <h2 class="rating-heading">25 000</h2>
                                                           <p class="mt-3 rating-caption">Mentions in Aug. 2020 for your company</p>
                                                 </div>
                                                    
                                                <div class="rating-remark-arrows">
                                                    <p class="arrow-text">+18%</p>
                                                    <div class="text-center">
                                                        <i class="fa fa-long-arrow-up arrow-color-green" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-sm-3 mb-2 section-with-border">
                                                <div class="rating-remark-outer">
                                                     <div class="rating-remark mb-3">
                                                               <h2 class="rating-heading">21 580</h2>
                                                               <p class="mt-3 rating-caption">Mentions in Aug. 2020 for your company</p>
                                                     </div>
                                                        
                                                    <div class="rating-remark-arrows">
                                                        <p class="arrow-text">-20%</p>
                                                        <div class="text-center">
                                                            <i class="fa fa-long-arrow-down arrow-color-red" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                    </div>
                            </div>
                            <!-- dashboard-up-down ends here -->
                            <div class="dashboard-charts">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 col-sm-4 mt-3 mb-3">
                                        <div class="dashboard-charts-area">
                                            <p class="charts-heading">@lang('business_intelligence.sentiments_analyses_company')</p>
                                            <div class="circular-chart-area mt-4">
                                                <div class="pie-chart">
                                                    <canvas id="doughnut" height="50" width="50"></canvas>
                                                </div>
                                                <div class="charts-legends-area mt-3">
                                                    <ul class="charts-legends">
                                                        <li class="positive mb-2">@lang('business_intelligence.positive')</li>
                                                        <li class="nutral mb-2">@lang('business_intelligence.neutral')</li>
                                                        <li class="negative mb-2">@lang('business_intelligence.negative')</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-4 mt-3 mb-3">
                                        <div class="dashboard-charts-area">
                                            <p class="charts-heading">@lang('business_intelligence.daily_evolution_mentions_company')</p>
                                            <div class="circular-chart-area mt-4">
                                                <canvas id="line-chart" height="50" width="50"></canvas>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-4 mt-3 mb-3">
                                        <div class="dashboard-charts-area">
                                            <p class="charts-heading">@lang('business_intelligence.company_competitors_monthly_mentions')</p>
                                            <div class="circular-chart-area mt-4">
                                              <canvas id="doughnut-1" height="50" width="50"></canvas>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- dashboard charts ends here -->
                            <div class="data-sources-area">
                                <p class="data-sources-heading text-center">@lang('business_intelligence.data_sources')</p>
                                <ul class="data-sources">
                                    <li class="text-center">
                                        <p class="data-heading">@lang('business_intelligence.facebook')</p>
                                        <p class="data-caption">123</p>
                                    </li>
                                    <li class="text-center">
                                        <p class="data-heading">@lang('business_intelligence.twitter')</p>
                                        <p class="data-caption">654</p>
                                    </li>
                                    <li class="text-center">
                                        <p class="data-heading">@lang('business_intelligence.news')</p>
                                        <p class="data-caption">1000</p>
                                    </li>
                                    <li class="text-center">
                                        <p class="data-heading">@lang('business_intelligence.forum')</p>
                                        <p class="data-caption">27</p>
                                    </li>
                                    <li class="text-center">
                                        <p class="data-heading">@lang('business_intelligence.instagram')</p>
                                        <p class="data-caption">0</p>
                                    </li>
                                    <li class="text-center">
                                        <p class="data-heading">@lang('business_intelligence.blogs')</p>
                                        <p class="data-caption">0</p>
                                    </li>
                                    <li class="text-center">
                                        <p class="data-heading">@lang('business_intelligence.general')</p>
                                        <p class="data-caption">0</p>
                                    </li>
                                    <li class="text-center">
                                        <p class="data-heading">@lang('business_intelligence.youtube')</p>
                                        <p class="data-caption">0</p>
                                    </li>
                                   
                                  
                                </ul>
                            </div>
                        </div>
                           
                             <div class="resources-invest-algeria__area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4">
                                        <div class="resource-algeria-box border-green">
                                           <h6 class="sub-heading">@lang('business_intelligence.sector_reports'):</h6> 
                                           <p class="resource-caption pt-2 pb-2">@lang('business_intelligence.report_content') </p>
                                            <a href="#" class="download-link">@lang('business_intelligence.download_link')</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4">
                                        <div class="resource-algeria-box border-yellow">
                                           <h6 class="sub-heading">@lang('business_intelligence.pr_monitoring') :</h6> 
                                           <p class="resource-caption pt-2 pb-2">@lang('business_intelligence.report_content')</p>
                                            <a href="#" class="download-link">@lang('business_intelligence.download_link')</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4">
                                        <div class="resource-algeria-box border-red">
                                           <h6 class="sub-heading">@lang('business_intelligence.e_reputation'):</h6> 
                                           <p class="resource-caption pt-2 pb-2">@lang('business_intelligence.report_content')</p>
                                            <a href="#" class="download-link">@lang('business_intelligence.download_link')</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4">
                                        <div class="resource-algeria-box border-blue">
                                           <h6 class="sub-heading">@lang('business_intelligence.competitive_intelligence'):</h6> 
                                           <p class="resource-caption pt-2 pb-2">@lang('business_intelligence.report_content')</p>
                                            <a href="#" class="download-link">@lang('business_intelligence.download_link')</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4">
                                        <div class="resource-algeria-box border-yellow">
                                           <h6 class="sub-heading">@lang('business_intelligence.legal_monitoring'):</h6> 
                                           <p class="resource-caption pt-2 pb-2">@lang('business_intelligence.report_content')</p>
                                            <a href="#" class="download-link">@lang('business_intelligence.download_link')</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4">
                                        <div class="resource-algeria-box border-green">
                                           <h6 class="sub-heading">@lang('business_intelligence.events')</h6> 
                                           <p class="resource-caption pt-2 pb-2">@lang('business_intelligence.report_content')</p>
                                            <a href="#" class="download-link">@lang('business_intelligence.download_link')</a>
                                        </div>
                                    </div>   
                                </div>
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




