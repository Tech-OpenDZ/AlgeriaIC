@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('algeria_business_network.algeria_invest_business_network') | @lang('home.algeria_invest')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
@endsection

@section('content')


    <section class="discover-algeria">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                            <li class="breadcrumb-elements"><a href="#">@lang('algeria_business_network.home')</a></li>
                            <li class="active">@lang('algeria_business_network.algeria_invest_business_network')</li>
                        </ol>

                        @include('frontend.common.top_banner')

                        @if(!$banner[0]->bannerImages->isEmpty())
                        <div class="business-network mt-3">
                            <a href="#"><img src="{{ asset('storage/uploads/banner/'.$banner[0]->bannerImages[0]->banner_img)}}" alt="business-network" class="img-fluid"></a>
                        </div>
                        @endif
                        @if($algeria_business_network == null)
                            <br/>
                            <div class="alert-text">@lang('algeria_business_network.no_content_found')</div>
                        @else
                        <section class="invest-business-network mt-3">
                            <h4 class="main-heading">@lang('algeria_business_network.title')</h4>
                            <div class="row">
                                <!-- <div class="col-lg-4 col-md-12  col-12">
                                    <div class="invest-business-network__left mt-3">
                                        <img src="{{asset('storage/uploads/algeria_network_images/'.$algeria_business_network->image_top)}}" alt="investment" class="img-fluid">
                                    </div>
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="invest-business-network__right mt-3">
                                            @php
                                                $description = explode('</p>',$algeria_business_network->localeAll[0]->description);
                                            @endphp
                                            <p class="business-content">
                                                <img src="{{asset('storage/uploads/algeria_network_images/'.$algeria_business_network->image_top)}}" alt="investment" class="img-fluid network-image">

                                                {{ strip_tags(str_replace("&nbsp;", "",$description[0])) }}
                                            </p>
                                    </div>
                                </div>
                            </div>
                            @for($i = 1 ; $i< count($description); $i++)
                                <p class="business-content mt-3">{{ strip_tags(str_replace("&nbsp;", "",$description[$i])) }}</p>
                            @endfor
                            <div class="investment-post">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6  custom-images-network">
                                        <div class="investment-posts mt-4">
                                            <img src="{{asset('storage/uploads/algeria_network_images/'.$algeria_business_network->image_bottom_one)}}" alt="investment-post-one" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="investment-posts mt-4">
                                            <img src="{{asset('storage/uploads/algeria_network_images/'.$algeria_business_network->image_bottom_two)}}" alt="investment-post-one" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 custom-images-network">
                                        <div class="investment-posts mt-4">
                                            <img src="{{asset('storage/uploads/algeria_network_images/'.$algeria_business_network->image_bottom_three)}}" alt="investment-post-one" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="investment-posts mt-4">
                                            <img src="{{asset('storage/uploads/algeria_network_images/'.$algeria_business_network->image_bottom_one)}}" alt="investment-post-one" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invest-business-network__bottom mt-3">
                                <ul class="social-sharing">
                                    <p class="sharing">@lang('algeria_business_network.sharing')</p>
                                    @include('frontend.share')
                                </ul>
                            </div>
                        </section>
                        @endif
                    </div>
                </div>
                <!-- left area ends here -->

                @include('frontend.common.right_sidebar')
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

<script>
$(document).ready(function() {
    $(document).on('click', '.copy_link', function(){
        var text= $(this).attr('data-link');
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        if(textarea.value != '' && textarea.value == text){
            toastr.success(`{{__('discover_algeria.link_copied')}}`);
        } else {
            toastr.error(`{{__('discover_algeria.link_copied_error')}}`);
        }
        document.body.removeChild(textarea);
    });
});
</script>

@endsection




