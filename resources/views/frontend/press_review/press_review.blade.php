@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @lang('press_review.press_review') | @lang('home.invest_algeria')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection 

@section('content') 
<section class="business-directory-main">
<div class="news-main-area">
<div class="discover-algeria">
    <div class="container" style="padding-top:15px">

                 <div class="row" style=" left:0;right:0 ;max-width:100%;margin-left: 0px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
                    <div class="news_img " style="height:180px; width:100%">
                        <div class="section_title" style="padding-top:80px">
                            <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:50px">@lang('press_review.press_review')</h4>

                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 section_title" style="float:right;">
									<p style="color: #ffffff;padding:0px!important" class="d-none d-lg-block">@lang('press_review.subtitle')</p>
						</div>


                    </div>
                </div>
        <div class="row" style=" margin-right:0px;margin-left:0px; background-color:#f5f5f5;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="discover-algeria__left">
                    <ol class="breadcrumb-area">
                      <!--  <li class="breadcrumb-elements"><a href="#">@lang('press_review.home')</a></li> -->
                      <!--  <li class="active">@lang('press_review.press_review')</li> -->
                    </ol>
                    
                    @include('frontend.common.top_banner')
                    

                    <!--<h1 class="main-heading mt-3 mb-3">@lang('press_review.press_review')</h1> -->

                  
                  <!--  <div class="business-directory-main__elements">
                        <p class="mt-3 mb-3">@lang('press_review.content')</p>
                    </div> -->
                    <!-- search engine starts -->
                <!-- wizard part -->
               <div class="bd-wizard">
                    <form id="generate-form">
                        <div class="row" id="">
                            <div class="col-lg-12">
                                <section class="bd-search-outer press_reviewmain">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 mb-3">
                                            <img src="{{ asset('css/images/target-criteria.svg')}}" alt="target-criteria" class="img-fluid">
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 mb-3">
                                          <!--  <div class="target-right">
                                                <p>@lang('press_review.title')</p>
                                                <p class="target-capt mt-1">@lang('press_review.subtitle')</p>
                                            </div> -->
                                        </div>
                                    </div>  
                                    <!-- search engine ends -->
                                    <section class="news-select-area">
                                        <section class="search-engine">
                                            <!-- <p class="select-title pb-2">@lang('press_review.keyword')</p> -->
                                            <div class="search-engine__elements">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="@lang('press_review.search')" id="keyword" name="keyword">
                                                    <!-- <div class="input-group-append">
                                                    <a href="#"><span class="input-group-text"><img src="{{ asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></a> </span>
                                                    </div> -->
                                                </div>
                                            </div> 
                                        </section> 
                                        <div class="row bd-source">
                                            <div class="col-md-6 col-lg-6 col-sm-6 mb-3">
                                                <p class="select-title">@lang('press_review.sector')</p>
                                                <select name="sector[]" id="sector" multiple class="multi-choice select-button mb-4" style="width: 100%;">
                                                    @foreach($sectors as $key =>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6 mb-3">
                                                <p class="select-title">@lang('press_review.area')</p>
                                                <select name="zone[]" id="zone" multiple  class="multi-choice select-button mb-4" style="width: 100%;">
                                                    @foreach($zones as $key =>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mb-3 bd-source">
                                                        <p class="select-title pb-1">@lang('press_review.source')</p>
                                                        <select name="sources[]" id="source" multiple  class="multi-choice select-button mb-4" style="width: 100%;">
                                                            @foreach($sources as $key =>$value)
                                                            <option value="{{$key}}">{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-6">
                                                <p class="select-title pb-3">@lang('press_review.date')
                                                <span style="color:red">*</span>
                                                </p>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-left">
                                                        <div class="date-pik">
                                                            <input type="date" id="start_date" name="start"
                                                             class="select-button mb-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-right">
                                                        <div class="date-pik">
                                                            <input type="date" id="end_date" name="end"
                                                             class="select-button mb-4">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id ="date-error" style="display:none">
                                                <span class="failure-msg">@lang('press_review.date_error')</span>
                                                </div>
                                            </div>
                                        </div> 
                                        @if( Session::has( 'error' ))
                                            <div class="danger-alert-msg text-center w-100 mb-2 failure-msg">
                                                @lang('press_review.records_not_found')
                                            </div>
                                        @endif
                                        <div class="row search-target-button mb-3 mt-2">
                                            <div class="col-md-12 col-sm-12">
                                               <button class="common-button" type="submit" id="generate" style="background-color:#f9b634; border:#f9b634" >@lang('press_review.generate')</button>
                                            </div>
                                        </div>
                                    </section>
                                </section>
                            </div>
                        </div>
                    </form>

                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="business-directory-step-one.html" type="button" class="btn btn-default btn-primary btn-circle">1</a>
                                <p>@lang('press_review.step_1')</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="business-directory-step-two.html" type="button" class="btn btn-default btn-circle disabled">2</a>
                                <p>@lang('press_review.step_2')</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="business-directory-step-three.html" type="button" class="btn btn-default btn-circle disabled" >3</a>
                                <p>@lang('press_review.step_3')</p>
                            </div>
                        </div>
                    </div>
          
               </div> 

               </div>
               <br>
            </div>
           
            <!-- left area ends here -->
            
           
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
@if(Session::has('openLogin'))
    <script>
        $(function(){
            $("#loign_formshow").trigger('click');
        });
    </script>
@endif

<script>
$(document).ready(function(){
    
    $('form').on('submit', function(e){
        e.preventDefault();
        var start_date = $('#start_date').val();
        var end_date =$('#end_date').val();
        var keyword = $('#keyword').val();
        var sector = $('#sector').val();
        var zone = $('#zone').val();
        var source = $('#source').val(); 

       
        if((start_date!="" && end_date!="")){
            window.location.href = "{{route('generate')}}"+"?"+$('#generate-form').serialize();
            
        }else{
            $('#date-error').css("display", "block");
        }

    });
    // $(document).on('change','#start_date',function(e){
    //     console.log($('#start_date').val());
    //     var start_date = $('#start_date').val();
    //     var end_date = $('#end_date').val();
    //     if(end_date < start_date) {
    //         $('#end_date').val($('#start_date').val());
    //         $('#end_date').attr('min',$('#start_date').val()+"");
    //     }
    // })
});
</script>
@endsection
