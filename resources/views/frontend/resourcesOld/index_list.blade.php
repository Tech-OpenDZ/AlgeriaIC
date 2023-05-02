
@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if($resource != null)
        @if($resource->parent_id == null)
            <title>@lang('resource.business_environment') | @lang('home.algeria_invest')</title>
        @elseif($resource->parent_id != null && $resource->parent_id != 1) 
            <title>{{ $resource->localeAll[0]->title }} - {{$resource->parent->localeAll[0]->title}}  | @lang('home.algeria_invest') </title>
        @elseif($resource->parent_id != null) 
            <title> {{ $resource->localeAll[0]->title }} | @lang('home.algeria_invest')</title>
        @endif
    @endif
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
                        <li class="breadcrumb-elements"><a href="#">@lang('resource.home')</a></li>
                        <li class="active">@lang('resource.business_environment') -  {{ $resource->localeAll[0]->title }}</li>
                    </ol>
                    
                    @include('frontend.common.top_banner')
                   
                <div class="resources-invest-algeria">
                         <!-- search engine starts -->
                    <div class="search-engine news-select-area">
                        <div class="row">
                           <div class="col-md-12 col-sm-12 col-12">
                                <h1 class="main-heading mb-4">{{$resource->localeAll[0]->title}}</h1>
                           </div>
                        </div>
                      
                        <div class="search-engine__elements">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="@lang('resource.search')" id="keyword" name="keyword">
                                <div class="input-group-append">
                                    <button type="button" onclick="findString()" style="border:none"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></span></button>
                                    <!-- <a href="#"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></a> </span> -->
                                </div>
                            </div>
                        </div> 
                    </div>  
                    <p class="resource-caption pb-2 resource-ld">{!!strip_tags($resource->localeAll[0]->long_description)!!}</p>
                     <!-- search engine ends -->
                     <!-- <p class="resource-caption pb-2">{{$resource->localeAll[0]->short_description}}</p> -->
                     <section class="faq">
                        <div class="faq__accordian mt-3">
                            <div class="accordion" id="accordionExample">
                                @foreach($resource->subPages as $content)
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <a href="#" data-toggle="collapse" data-target="#{{preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$content->localeAll[0]->title)) }}"><i class="fa fa-plus"><h6 class="mt-3 mb-3 sub-heading">{{$content->localeAll[0]->title}}</h6></i> </a>		
                                        </div>
                                        <div id="{{preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$content->localeAll[0]->title)) }}" class="collapse {{$loop->first ? 'show':''}}" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>{!! $content->localeAll[0]->long_description !!}</p>
                                            </div>
                                        </div>
                                    </div>   
                                @endforeach
                            </div>
                        </div>
                    </section>
                   
                 </div>
                   
          

              
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
    var str = document.getElementById("keyword").value;

    if (parseInt(navigator.appVersion)<4) return;
    var strFound;
    if (window.find) {

    // CODE FOR BROWSERS THAT SUPPORT window.find

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
        alert ("Opera browsers not supported, sorry...")
        return;
    }
    if (!strFound) alert ("String '"+str+"' not found!")
    return;
} 
</script>
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



@endsection
