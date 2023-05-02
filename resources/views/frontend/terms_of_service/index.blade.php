@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('terms_of_service.terms_of_service') | @lang('home.algeria_invest')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
@endsection 

@section('content') 
<section class="discover-algeria"  style="padding-top:0px;padding-bottom:0px;background-color:#ffffff!important" >
    <div class="container_contact" style="max-width:100%!important">
    <div class="row" style="background-color:#ffffff;margin-left:-15px;margin-right:-15px">
                    <div class="opportunity_heading" style="height:400px; width:100%;padding-top:70px">
                        
                        <div class="section_title" style="padding-top:125px">
                        <h2 class="subtitle align-content-center justify-content-center" style="color:#FFFFFF;font-weight:bold">@lang('terms_of_service.terms_of_service')</h2>
								</div>

								

                    </div>
                </div>


    <div class="page-content" >
        <div class="container" style="max-width:1170px;background-color:transparent">
                <div class="row" style="padding-top:80px;padding-bottom:80px;">
                   <div class="col-md-9 col-lg-9 col-sm-12">
                <div class="discover-algeria__left">
                    <ol class="breadcrumb-area">
                       <!-- <li class="breadcrumb-elements"><a href="#">@lang('terms_of_service.home')</a></li> -->
                       <!-- <li class="active">@lang('terms_of_service.terms_of_service')</li> -->
                    </ol>
                    <!-- <div class="business-banner">
                        <a href="#"><img src="{{ asset('css/images/business-banner.png')}}" alt="business-banner" class="img-fluid"></a> 
                    </div> -->
                    @if($content->isempty()) 
                        <br/>
                        <div class="alert-text"> @lang('terms_of_service.content_error')</div>
                    @else
                    <section class="invest-business-network mt-3" style="position:sticky;border-right: 5px solid #0795fe;border-top-left-radius:20px;border-bottom-left-radius:20px;padding:15px;color:#000000;text-transform: bold;box-shadow: 0px 10px 60px 0px rgb(0 0 0 / 10%) ">
                        <!-- <h1 class="main-heading">{{ $content[0]->localeAll[0]->title }}</h1>  -->
                        <br>
                        {!! $content[0]->localeAll[0]->content; !!}
                                            
                    </section>   
                    @endif                 
                </div>
            </div>
            <!-- left area ends here -->
        
        </div>
        <!-- row ends here -->
    </div>
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
<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> --> 
@endsection




