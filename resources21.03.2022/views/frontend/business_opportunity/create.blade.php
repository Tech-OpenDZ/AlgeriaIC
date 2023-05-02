
@extends('frontend.layouts.master')
@section('head')

<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> @lang('business_opportunity.breadcrumb_add_business_opportunities') | @lang('news.placeName')</title>
<style>
    #upload-file-info {
        font-size: 0.563rem;
    }

    #upload-file-info_image {
        font-size: 0.563rem;
    }

    #upload-file-info_documents {
        font-size: 0.563rem;
    }

    #upload-file-info_presentation_file {
        font-size: 0.563rem;
    }
</style>
@endsection
@section('content')
<section class="business-opportunities">
    <div class="discover-algeria">
        <div class="container">
            <div class="row" style=" left:0;right:0;max-width:100%;margin-left: 0px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
                <div class="business-heading" style="height:180px; width:100%;">

                    <div class="section_title" style="padding-top:80px;width:50%; float:left;">
                        <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:50px">@lang('business_opportunity.request_form')</h4>
                    </div>

                   <!-- <div class="section_title" style="width:40%;float:right;padding-top:59px">
                        <p class="business-content" style="color:#FFFFFF">@lang('business_opportunity_listing.business_content')</p>
                    </div> -->

                </div>
            </div>
            <div class="row" style=" margin-right:0px;margin-left:0px; background-color:#f5f5f5;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                        <!--<li class="breadcrumb-elements"><a href="#">@lang('business_opportunity.breadcrumb_home')</a></li>
                            <li class="active">@lang('business_opportunity.breadcrumb_add_business_opportunities')</li> -->
                        </ol>
                        <!--
                        <div class="business-banner" style="width:103%">
                            <a href="#"><img src="{{ asset('images/business-banner.png') }}" alt="business-banner" class="img-fluid"></a>
                        </div> -->


                        <div class="slider-area table-carousel">


                            <!-- <img src="images/slider-one.png" alt="slider-one" class="img-fluid"> -->
                            <!-- <div class="business-titles mt-3 mb-3">
                                <h1 class="main-heading mb-3">@lang('business_opportunity.request_form')</h1>

                            </div> -->
                            <div class="business-table business-table-slide-two">


                                <div class=" mt-3">
                                    @include('frontend.business_opportunity.form')
                                </div>

                            </div>

                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <!-- left area ends here -->
                {{-- @include('frontend.common.right_sidebar') --}}
            </div>
            <!-- row ends here -->

        </div>

    </div>

</section>
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
<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> -->
@endsection