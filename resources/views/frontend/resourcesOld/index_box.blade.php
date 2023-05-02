
@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    @if($resource != null)
        @if($resource->parent_id == null)
            <title>@lang('resource.business_environment') | @lang('home.algeria_invest')</title>
        @elseif($resource->parent_id != null && $resource->parent_id != 1) 
            <title>{{ $resource->localeAll[0]->title }} - {{$resource->parent->localeAll[0]->title}}  | @lang('home.algeria_invest') </title>
        @elseif($resource->parent_id != null) 
            <title> {{ $resource->localeAll[0]->title }} | @lang('home.algeria_invest')</title>
        @endif
    @endif
@endsection

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
<section class="resources-main">
<div class="news-main-area">
<div class="discover-algeria">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-12">
                <div class="discover-algeria__left">
                    <ol class="breadcrumb-area">
                        @if($resource != null)
                            @if($resource->parent_id == null)
                            <li class="breadcrumb-elements"><a href="#">@lang('resource.home')</a></li>
                            <li class="active">@lang('resource.business_environment') </li>
                            @elseif($resource->parent_id != null && $resource->parent_id != 1) 
                            <li class="breadcrumb-elements"><a href="#">@lang('resource.home')</a></li>
                            <li class="active">@lang('resource.business_environment') - {{$resource->parent->localeAll[0]->title}} - {{ $resource->localeAll[0]->title }}</li>
                            @elseif($resource->parent_id != null) 
                            <li class="breadcrumb-elements"><a href="#">@lang('resource.home')</a></li>
                            <li class="active"> {{$resource->parent->localeAll[0]->title}} - {{ $resource->localeAll[0]->title }}</li>
                            @endif
                        @endif
                    </ol>
                   
                    @include('frontend.common.top_banner')
                    
                    @if($resource == null)
                    <br>
                    <div class="alert-text">@lang('discover_algeria.content_error')</div>
                    @else
                        <div class="resources-invest-algeria">
                                <!-- search engine starts -->
                            <div class="search-engine news-select-area">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <h1 class="main-heading mb-2">{{$resource->localeAll[0]->title}} </h1>
                                    </div>
                                </div>
                                <!-- <p class="select-title mt-3 mb-2">@lang('resource.keyword')</p> -->
                                <div class="search-engine__elements">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"  placeholder="@lang('resource.search')" id="keyword" name="keyword">
                                        <div class="input-group-append">
                                            <button type="button" onclick="findString()" style="border:none"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></span></button>

                                        <!-- <a href="#"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></a> </span> -->
                                        </div>
                                    </div>
                                    <p id="error_msg" style="color:red; display: none"></p>
                                </div> 
                            </div>  
                            <!-- search engine ends -->
                            
                            <p class="resource-caption pb-2 resource-ld">{!!strip_tags($resource->localeAll[0]->long_description)!!}</p>
                            <div class="resources-invest-algeria__area">

                                <div class="row">
                                    @foreach($resource->subPages as $content)
                                    <div class="col-lg-6 col-md-12 col-sm-12 mt-4">
                                        <div class="resource-algeria-box {{$class_arr[$loop->iteration]}}">
                                            <img src="{{asset('storage/uploads/business_environnement/logos/video.jpg')}}">
                                        <h6 class="sub-heading text-truncate">{{$content->localeAll[0]->title}}</h6> 
                                        <p class="resource-caption pt-2 mb-2 text-limit">{!! $content->localeAll[0]->short_description !!}</p>
                                            @if($content->link)
                                                <a href="{{$content->link}}" class="download-link">@lang('resource.download_link')</a>
                                            @elseif($content->is_page ==1)
                                                 <div class="heading-with-arrow mt-3">
                                                    <a href="{{ route('business-environment',$content->page_key)}}" class="more-data">@lang('resource.more_details')</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @if($resource->parent_id == null)
                            <section class="resource-red-news-letter"> 
                                <div class="container">
                                    <div class="event-home-letter">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 subscribe-letter-zindex">
                                                <h6 class="sub-heading">@lang('resource.business_environment_and_legal_newsletter')</h6>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <form class="subscribe_form red_btn">
                                                    <div class="input-group">
                                                        <input type="hidden" name="type" value="resource" class="resource">
                                                        <input type="text" class="form-control col-8 subscribe_email" placeholder="@lang('resource.email_placeholder')" id="email" name="email">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                            <!-- <a href="javascript:void(0)" class="resource_submit">@lang('resource.subscribe')</a> -->
                                                                <button type="button" class="btn btn-primary newsletter_btn resource_submit"><i id="spinner" class="fa fa-circle-o-notch fa-spin" style="display:none"></i> @lang('resource.subscribe')</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </form>
                                                <span class="invalid-feedback" role="alert" style="align:center"></span>
                                                <span class="success-alert-msg" style="display:none;align:center">
                                                    @lang('resource.Form_successMessage')
                                                </span>
                                                <span class="subscirbed_already" style="display:none;text-align:center">
                                                    @lang('resource.subscribed')
                                                </span>
                                            </div>
                                        </div>
                                        <div class="event-news-back">
                                            <img src="{{asset('css/images/event-back-2.svg')}}" class="img-fluid event-back-one">
                                            <img src="{{asset('css/images/event-back-1.svg')}}" class="img-fluid event-back-two">
                                            <img src="{{asset('css/images/event-back-3.svg')}}" class="img-fluid event-back-three">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            @endif
                        </div>
                    @endif

                </div>
              
            </div>
            <!-- left area ends here -->

            {{-- @include('frontend.common.right_sidebar') --}}

          
        </div>
        <!-- row ends here -->
      
    </div>
</div>
</div>
<!-- top left and right area ends here -->

</section>
<!-- top left and right area ends here -->

  <!-- image logo carousel -->
  @include('frontend.partner.index')
 <!-- image logo carousel ends here -->
@endsection 
@section('scripts')
<!-- Normal JS -->
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



$(document).ready(function(){
    $(document).on('click','.resource_submit',function(e){
        e.preventDefault();
        var type = $(".resource").val();
        var email = $(".subscribe_email").val();
        // alert(email);

        $.ajax({
            url : '{{route("subscribe_newsletters")}}',
            type : "POST",
            data : {type:type,email:email, _token:"{{csrf_token()}}"},
            beforeSend : function() {
                $('#spinner').css('display','inline-block');
                $('.resource_submit').prop('disabled', true);
            },
            success : function (data)
            {
                $('#spinner').css('display','none');
                $('.resource_submit').prop('disabled', false);
                if(data.errors){
                    if(data.errors.email){
                        $(".subscribe_email").addClass('is-invalid');
                        $(".invalid-feedback").css('display','block');
                        $(".invalid-feedback").html(data.errors.email);
                        $(".success-alert-msg").css('display','none');
                        $(".subscirbed_already").css('display','none');
                    }
                }
                if(data.success){ 
                    $(".subscribe_email").removeClass('is-invalid');
                    $(".invalid-feedback").html('');
                    $(".subscribe_email").val('');
                    $(".success-alert-msg").css('display','block');
                    $(".subscirbed_already").css('display','none');
                    // $(".invalid-feedback").html(data.errors.email);
                }
                if(data.subscribed){
                    $(".success-alert-msg").css('display','none');
                    $(".subscribe_email").removeClass('is-invalid');
                    $(".invalid-feedback").html('');
                    $(".subscribe_email").val('');
                    $(".subscirbed_already").css('display','block');
                    // $(".invalid-feedback").html(data.errors.email);
                }
            }
        });
    });
 });
</script>
<!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/front-end/browser-class.js"></script>
<!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
<script src="{{ asset('js/front-end/main.js') }}"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">
</script> 
@endsection