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
                                 <div class="col-lg-2 col-md-2 col-sm-2 mb-3">
                                     <img src="{{asset('css/images/target-criteria3.svg')}}" alt="target-criteria" class="img-fluid">
                                 </div>
                                 <div class="col-lg-10 col-md-10 col-sm-10 mb-3">
                                     <div class="target-right">
                                         <p>@lang('press_review.download_content') </p>
                                         <!-- <p class="target-capt mt-1">My file available in a few minutes in 3 possible formates 
                                             (excel, CSV, txt )</p> -->
                                     </div>
                                     
                                 </div>
                             </div>  
                            
                             <div class="download-file-format mt-4 mb-4">
                                 <!-- <h6 class="sub-heading mb-4 mt-4">Choose file format</h6> -->
                                 <div class="row justify-content-center">
                                    
                                     <div class="col-md-3 col-lg-3 col-sm-3 col-6 mt-3 mb-3">
                                         <div class="file-format-icons d-flex flex-column justify-content-center">
                                             <label for="male">  
                                                
                                                 <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                 <svg version="1.1" id="Capa_1" height="40" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                      viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">
                                                 <g>
                                                     <g>
                                                         <path d="M64,0v80H0v144h64v160h224l96-96V0H64z M16,208V96h240v112H16z M288,361.376V288h73.376L288,361.376z M368,272h-96v96H80
                                                             V224h192V80H80V16h288V272z"/>
                                                     </g>
                                                 </g>
                                                 <g>
                                                     <g>
                                                         <path d="M90.848,130.864c-0.64-2.464-1.696-4.656-3.168-6.576c-1.472-1.92-3.392-3.472-5.808-4.656
                                                             c-2.416-1.184-5.36-1.776-8.88-1.776H48.8V186.4h13.824v-27.36h7.392c3.264,0,6.24-0.448,8.928-1.264s4.976-2.08,6.864-3.744
                                                             c1.888-1.648,3.36-3.792,4.416-6.416c1.056-2.624,1.584-5.696,1.584-9.216C91.808,135.84,91.472,133.312,90.848,130.864z
                                                              M75.44,146.384c-1.68,1.664-3.92,2.512-6.672,2.512h-6.144v-20.848h5.76c3.456,0,5.92,0.912,7.392,2.688
                                                             c1.472,1.792,2.208,4.416,2.208,7.872C77.984,142.128,77.136,144.72,75.44,146.384z"/>
                                                     </g>
                                                 </g>
                                                 <g>
                                                     <g>
                                                         <path d="M153.36,137.44c-0.576-4.112-1.664-7.6-3.312-10.512c-1.632-2.928-3.92-5.152-6.864-6.72
                                                             c-2.96-1.568-6.816-2.368-11.632-2.368h-22.656v68.544h21.824c4.608,0,8.416-0.704,11.424-2.112
                                                             c3.008-1.408,5.408-3.536,7.2-6.432c1.792-2.88,3.056-6.56,3.792-10.992c0.736-4.448,1.088-9.68,1.088-15.696
                                                             C154.224,146.112,153.936,141.536,153.36,137.44z M139.952,163.264c-0.272,3.152-0.848,5.68-1.728,7.6
                                                             c-0.864,1.92-2.032,3.296-3.504,4.128c-1.472,0.832-3.424,1.248-5.856,1.248h-6.144v-48.208h5.84c2.624,0,4.72,0.512,6.288,1.504
                                                             c1.584,0.976,2.752,2.448,3.568,4.4c0.8,1.952,1.328,4.4,1.584,7.344c0.24,2.96,0.384,6.384,0.384,10.288
                                                             C140.384,156.24,140.24,160.144,139.952,163.264z"/>
                                                     </g>
                                                 </g>
                                                 <g>
                                                     <g>
                                                         <polygon points="211.232,129.184 211.232,117.856 172.928,117.856 172.928,186.4 186.752,186.4 186.752,156.64 209.792,156.64 
                                                             209.792,145.312 186.752,145.312 186.752,129.184 		"/>
                                                     </g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 <g>
                                                 </g>
                                                 </svg>
                                                 </label>
                                             <input type="radio" id="excel" name="excel" value="exel" checked>
                                            
                                         </div>
                                         <p class="text-center">@lang('press_review.press_review_file')</p>
                                     </div>
                                 </div>
                           
                                
                             </div>



                             <div class="download-list mt-4 mb-4 text-center">
                                 <a href="{{route('download', [$token])}}" class="common-button" >@lang('press_review.download_press_review')</a>
                             </div>

                             <h6 class="sub-heading text-center mb-4">@lang('press_review.thank_you_text')</h6>
                           
         
                         </section>
                     </div>
                 </div>
                 <!-- step three ends here -->
             </form>
            
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