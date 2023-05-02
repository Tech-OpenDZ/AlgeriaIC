@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('press_review.press_review') | @lang('home.invest_algeria')</title>
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
             
                   
             <form role="form">
              
              
                 <div class="row" id="">
                     <div class="col-lg-12">
                         <section class="bd-search-outer">
                             <div class="row">
                                 
                             </div>  
                            <div class="msg-sent text-center">
                                <i class="fa fa-check-circle-o done-right" aria-hidden="true"></i>
                       
                            </div>
                            <br>

                            <p class="text-center">@lang('press_review.payment_confirmation_text')</p>
                            <p class="text-center">@lang('press_review.confirmation_text')</p>
                            <h6 class="sub-heading text-center mb-4">@lang('press_review.thank_you_text')</h6>
                           
         
                         </section>
                     </div>
                 </div>
                 <!-- step three ends here -->
             </form>

             <div class="stepwizard">
                 <div class="stepwizard-row setup-panel">
                     <div class="stepwizard-step">
                         <a href="business-directory-step-one.html" type="" class="btn btn-primary btn-circle">1</a>
                         <p>@lang('press_review.step_1')</p>
                     </div>
                     <div class="stepwizard-step">
                         <a href="business-directory-step-two.html" type="" class="btn btn-default btn-primary btn-circle">2</a>
                         <p>@lang('press_review.step_2')</p>
                     </div>
                     <div class="stepwizard-step">
                         <a href="business-directory-step-three.html" type="" class="btn btn-default btn-circle btn-primary" >3</a>
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
        <!-- row ends here -->
         
    </div>
</div>
</div>
<!-- top left and right area ends here -->
</section>
<div id="downloadModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('press_review.thank_you_text')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>@lang('press_review.popup_text')</p>
                <br>
                <br>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('press_review.ok')</button>
                
            </div>
        </div>
    </div>
</div>
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
<script>
$(document).ready(function(){
	$('body').on('click', "#download_btn", function(e) {
        e.stopPropagation();
        $('#downloadModal').modal('show');
    });
});
</script>
@endsection 