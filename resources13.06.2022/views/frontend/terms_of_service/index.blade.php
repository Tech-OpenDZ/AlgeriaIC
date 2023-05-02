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
<section class="discover-algeria">
    <div class="container">
    <div class="row" style=" left:0;right:0;max-width:100%;margin-left: 0px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
                    <div class="business-heading" style="height:180px; width:100%;">
                        
                        <div class="section_title" style="padding-top:80px;width:50%; float:left;">
									<h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:50px">@lang('terms_of_service.terms_of_service')</h4>
								</div>

								

                    </div>
                </div>

                <div class="row" style=" margin-right:0px;margin-left:0px; background-color:#f5f5f5;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black">
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
                    <section class="invest-business-network mt-3">
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




