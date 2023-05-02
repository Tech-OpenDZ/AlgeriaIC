@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Algeria</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
@endsection

@section('content')
<section class="business-directory-main">
<div class="news-main-area">
<div class="discover-algeria">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-12">
                <div class="discover-algeria__left">
                    <ol class="breadcrumb-area">
                        <li class="breadcrumb-elements"><a href="#">@lang('press_review.home')</a></li>
                        <li class="active">@lang('press_review.press_review')</li>
                    </ol>
                    <div class="business-banner">
                        @php
                            $adv = getAdvertisement('top-header','press-review');
                            if($adv != null) {
                           if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                                 $adv['url'] = "http://" . $adv['url'];
                           }
                        }
                    @endphp
                    @if($adv != null)
                    <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
                    @endif
                    </div>
                    <h1 class="main-heading mt-3 mb-3">@lang('press_review.press_review')</h1>

                    <div class="business-directory-main__elements">
                        <p class="mt-3 mb-3">@lang('press_review.content')</p>
                    </div>
                    <!-- search engine starts -->
                <!-- wizard part -->
               <div class="bd-wizard">
                    {{Form::open(array('route' =>'confirm-payment','method'=>'GET','id'=>'confirm-payment-form'))}}
                        <div class="row" id="">
                            <div class="col-lg-12">
                                <section class="bd-search-outer">
                                    @include('frontend.payment.index', ['page' => 'press-review'])
                                </section>
                            </div>
                        </div>
                        <!-- step three ends here -->
                    {{ Form::close() }}

                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="business-directory-step-one.html" type="button" class="btn btn-default btn-primary btn-circle">1</a>
                                <p>@lang('press_review.step_1')</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="business-directory-step-two.html" type="button" class="btn btn-default btn-primary btn-circle ">2</a>
                                <p>@lang('press_review.step_2')</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="business-directory-step-three.html" type="button" class="btn btn-default btn-primary btn-circle" >3</a>
                                <p>@lang('press_review.step_3')</p>
                            </div>
                        </div>
                    </div>

               </div>

               </div>

            </div>

            <!-- left area ends here -->

            <div class="col-lg-3 col-md-3">
                <div class="discover-algeria__right">
                    @php
                        $adv = getAdvertisement('sidebar-top','press-review');
                        if($adv != null) {
                           if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                                 $adv['url'] = "http://" . $adv['url'];
                           }
                        }
                    @endphp
                    @if($adv != null)
                    <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
                    @endif
                    <div class="join-algeria">
                        <h6 class="mb-3 sub-heading">@lang('press_review.join_algeria')</h6>
                        <a href="#" class="register">@lang('press_review.join')</a>
                    </div>
                </div>
                <div class="discover-algeria__right mt-4">
                    @php
                        $adv = getAdvertisement('sidebar-bottom','press-review');
                        if($adv != null) {
                           if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                                 $adv['url'] = "http://" . $adv['url'];
                           }
                        }
                    @endphp
                    @if($adv != null)
                    <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
                    @endif

                     <div class="join-algeria">
                         <h6 class="mb-3 sub-heading">@lang('press_review.return_on_event')<br></h6>
                         <a href="#" class="register">@lang('press_review.return')</a>
                     </div>
                 </div>
                 <div class="discover-algeria__right mt-4">

                     <div class="join-algeria">
                         <h6 class="sub-heading mb-4">@lang('press_review.business_services')</h6>
                         <a href="#" class="register view-services">@lang('press_review.view_services')</a>
                     </div>
                 </div>
            </div>


        </div>

    </div>
</div>
</div>
<!-- top left and right area ends here -->
</section>
@endsection
@section('scripts')
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
<script>

$(document).ready(function(){
    $('#confirm-order').on('click', function(e){
        e.preventDefault();
        var radio = $( "input[name=chooseOffline]:radio").is(':checked');
        if(radio == true){
            window.location.href = "{{route('confirm-payment')}}"+"?"+$('#confirm-payment-form').serialize();
        }
    });
});


</script>
@endsection
