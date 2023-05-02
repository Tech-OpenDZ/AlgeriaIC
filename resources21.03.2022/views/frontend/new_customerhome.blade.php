@extends('frontend.layouts.master')
@section('head')
<script type=”application/ld+json”>
{
   “@context” : “https://schema.org",
   “@type” : “Organization”,
   “legalName” : “Algeria Invest”,
   “url” : “{{url()->current()}}”,
   “contactPoint” : [{
         “@type” : “ContactPoint”,
         “telephone” : “+213(0)23786347”,
         “contactType” : “customer service”
   }]
   “logo” : “https://algeriainvest.com/AlgeriaIC/public/css/images/logo_algeria_invest_final.svg”,
   “sameAs” : [ “https://fr-fr.facebook.com/algeriatenders”,
   “https://twitter.com/algeriatenders”,
   “https://www.linkedin.com/company/algeria-tenders”,
}
</script>
	<meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @lang('home.algeria_invest')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
@endsection
@section('content')
<section class="algeria-home">
   <div class="discover-algeria">
      <div class="container">
         <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12">
               <div class="discover-algeria__left">
                  @include('frontend.common.top_banner')
                  <!-- Banner slider start here -->
                  <!-- ---Economic News--- -->
                    <div class="slider-area">
                        @include('frontend.banner.index', ['banner' => 'home'])
                    </div>
                  <section class="economic-news">
                     <div class="title-headings">
                        <div class="row align-items-center title-border">
                           <div class="col-lg-8 col-md-12 col-sm-12 col-12 p-0 title-data">
                              <h4 class="main-heading">@lang('home.news')</h4>
                           </div>
                           <div class="col-lg-4 col-md-12 col-sm-12 col-12 p-0 title-more-data">
                              <div class="heading-with-arrow"> 
                                 <a href="{{route('news-list')}}" class="more-data">@lang('home.newMore')</a> 
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- -------news start here---- -->

                     <div class="economic-news__elements">
                        <div class="row">
                           @foreach($news as $newsData)
                           <div class="co-md-6 col-lg-6 mt-4" onclick="pageRedirect('{{route('news-detail', [$newsData->page_key])}}')">
                              <div class="news-post">
                                 <div class="container">
                                    <div class="row">
                                       <div class="col-md-3 col-sm-2  p-0">
                                          <div class="news-post__left">
                                             <div class="ratio-1x1">
                                                <div class="ratio-inner"> 
                                                   <img src="{{asset('storage/uploads/news_logos/'.$newsData->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img"> 
                                                </div>
                                                @if($newsData->is_premium == 1)
                                                <div class="premium-news">@lang('news.premiumNews')</div>
                                                @endif
                                             </div>
                                          </div>
                                       </div>
                                       <!-- <a href="http://algeriaic.php-dev.in/news/12" class="more-data"> -->
                                       <div class="col-md-9 col-sm-10">
                                          <div class="news-post__right">
                                             <ul class="tags-top">
                                                @foreach($newsData->sectors as $sector)
                                                @break($loop->iteration == 3)
                                                <li> <a href="{{url('news').'?page=1&keyword=&sector%5B%5D='.$sector->id}}" class="yellow-box">{{$sector->localeAll[0]->name}}</a> </li>
                                                @endforeach
                                             </ul>
                                             <p class="news-text text-limit"> 
                                                {{ html_entity_decode(strip_tags($newsData->localeAll[0]->title)) }}
                                             </p>
                                             <p class="news-post-caption text-limit"> 
                                                {{ html_entity_decode(strip_tags($newsData->localeAll[0]->description)) }}
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                     <!-- --------news end here---- -->
                     <!-- ----Press review start here--->
                     <div class="discover-algeria__right mt-4">
                        <div class="generate-review-box">
                           <img src="http://algeriaic.php-dev.in/images/generate-intersection.svg" class="img-fluid intersection-one">
                           <img src="http://algeriaic.php-dev.in/images/generate-intersection2.svg" class="img-fluid intersection-two">
                           <div class="col-lg-12 p-0">
                              <div class="row align-items-center">
                                 <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4 d-flex align-items-center">
                                    <div class="news-fig text-center">
                                       <img src="http://algeriaic.php-dev.in/images/news-sidebar.svg" class="img-fluid">
                                    </div>
                                 </div>
                                 <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8">
                                    <div class="news-generate">
                                       <h6 class="sub-heading text-white mb-2">@lang('home.press_review')</h6>
                                       <a href="{{route('press-review')}}" target="_blank" class="generate-yellow">@lang('home.press_button')</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <!-- -----End Economic News----- -->
                  <!-- ----Events Start--------->
                  <div class="events-home">
                     <div class="title-headings">
                        <div class="row align-items-center title-border">
                           <div class="col-lg-8 col-md-6 col-sm-6 col-12 p-0 title-data">
                              <h4 class="main-heading">@lang('home.event')</h4>
                           </div>
                           <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0 title-more-data">
                              <div class="heading-with-arrow"> <a href="{{route('event-list')}}" class="more-data">@lang('home.eventMore')</a> </div>
                           </div>
                        </div>
                     </div>
                    
                     <div class="events-home__elements">
                        <div class="row">
                           @foreach($events as $event)
                           <?php
                              $event->start_date = Carbon\Carbon::parse($event->start_date);
                              $format_start_date = clone $event->start_date;
                              $format_start_date = $format_start_date->format('Y-m-d');
                              // echo "<pre>";print_r($format_start_date);exit();
                              $carbon_date = Carbon\Carbon::now()->format('Y-m-d');
                              $route = (($format_start_date == $carbon_date)||($event->start_date->greaterThan(Carbon\Carbon::now()))) ? 'upcoming-event-detail' : 'past-event-detail';
                              ?>
                           <div class="col-md-6 col-lg-6 col-sm-6  mt-4" onclick="pageRedirect('{{route($route,[$event->page_key])}}')">
                              <div class="events-home__elements-box">
                                 <div class="row">
                                    <div class="col-md-4 col-lg-3 col-sm-3 for-image-padding">
                                       <div class="event-box-left">
                                          <div class="ratio-1x1">
                                             <div class="ratio-inner"> <img src="{{ asset('storage/uploads/event_logos/'.$event->event_logo)}}" alt="events-company" class="img-fluid"> </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-8 col-lg-9 col-sm-9 padding">
                                       <div class="event-box-right">
                                          <p class="print-month"> 
                                             @foreach($event->sectors as $sector)
                                             @break($loop->iteration == 2)
                                             {{ $sector->localeAll[0]->name}}
                                             @endforeach() 
                                          </p>
                                          <p class="semi-bold-para text-truncate"> {{ html_entity_decode(strip_tags($event->localeAll[0]->title)) }} </p>
                                          <p class="event-date">@lang('home.from') {{Carbon\Carbon::parse($event->start_date)->isoFormat('LL') }} @lang('home.to') {{Carbon\Carbon::parse($event->end_date)->isoFormat('LL') }}
                                          </p>
                                          <p class="event-date"> 
                                             {{ str_limit(html_entity_decode(strip_tags($event->localeAll[0]->place)),30,'...') }} 
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                     <!-- ---------Events Subscriber NewsLetter start----------- -->
                     <div class="event-home-letter">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 subscribe-letter-zindex">
                                <h6 class="sub-heading">@lang('home.newsletter_text')</h6>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <form class="subscribe_form red_btn">    
                                    <div class="input-group">
                                        <input type="hidden" name="type" value="general" class="event_subscribe">
                                        <input type="text" class="form-control col-8 subscribe_email" placeholder="@lang('newsletter.emailPlaceholder')" id="demo" name="email">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <!-- <a href="javascript:void(0)" class="event_submit">@lang('home.subscribe')</a> -->
                                                <button type="button" class="btn btn-primary newsletter_btn event_submit">
                                                <i id="spinner-event" class="fa fa-circle-o-notch fa-spin" style="display:none"></i> @lang('home.subscribe')</button>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="" id="event_error" role="alert"></span>
                                    <span class="success-event" style="display:none;">
                                    </span>
                                    <span class="subscirbed_already" style="display:none;">
                                    </span>
                                </form>
                            </div>
                        </div>
                        <div class="event-news-back">
                            <img src="{{asset('images/event-back-2.svg')}}" class="img-fluid event-back-one">
                            <img src="{{asset('images/event-back-1.svg')}}" class="img-fluid event-back-two">
                            <img src="{{asset('images/event-back-3.svg')}}" class="img-fluid event-back-three">
                        </div>
                    </div>
                     <!-- -----------End Here------------------------ -->
                  </div>
                  <!-- ------Events End----- -->
               </div>
            </div>
         
         <!-- left area ends here -->
            <div class="col-lg-4 col-md-4 sidebar-data">
                <div class="discover-algeria__right adimg">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-5">
                        @php
                        $adv = getAdvertisement('sidebar-top','home');
                        @endphp
                        @if($adv != null) 
                           @php
                           if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                                 $adv['url'] = "http://" . $adv['url'];
                           }
                           @endphp
                        <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="w-100 success"></a>
                        @endif
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-7 sidebar-table  top-table">
                        <h6 class="main-heading">@lang('home.commercial_heading')</h6>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="table-heading-text">@lang('home.commercial_row1')</th>
                                <th class="table-heading-text">@lang('home.commercial_row2')</th>
                                <th class="table-heading-text">@lang('home.commercial_row3')</th>
                                <th class="table-heading-text">@lang('home.commercial_row4')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($commercial)>0)
                            @foreach($commercial as $commercail_data)
                            <tr>
                                <td>{{$commercail_data->base}}</td>
                                <td>{{$commercail_data->devis}}</td>
                                <td>{{number_format($commercail_data->cours_achat,2)}}</td>
                                <td>{{number_format($commercail_data->cours_vente,2)}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center">@lang('home.no_data_found')</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="tab-pane-socialmedia">
                            <ul>
                            <p class="sharing">@lang('algeria_business_network.sharing')</p>
                            @include('frontend.share')
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-6">
                        <div class="sidebar-table eco-indicat">
                            <h6 class="main-heading">@lang('home.economic_head')</h6>
                            <table class="table">
                            <thead>
                                <tr>
                                    <th class="table-heading-text">@lang('home.economic_row1')</th>
                                    <th class="table-heading-text">@lang('home.economic_row2')</th>
                                    <th class="table-heading-text">@lang('home.economic_row3')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($economic)>0)
                                @foreach($economic as $economicData)
                                <tr>
                                    <td class="td-bold">
                                        {{ str_limit(html_entity_decode($economicData->localeAll[0]->indicator),11,'') }}
                                    </td>
                                    <td>{{date('d-m-Y', strtotime($economicData->date))}}</td>
                                    <td>{{$economicData->value}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" class="text-center">
                                        @lang('home.no_data_found')
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                            </table>
                            <div class="tab-pane-socialmedia">
                            <ul>
                                <p class="sharing">@lang('algeria_business_network.sharing')</p>
                                @include('frontend.share')
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-6 sidebar-table  top-table">
                        <h6 class="main-heading">@lang('home.algeria_tenders')</h6>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="table-heading-text">@lang('home.publication')<br>
                                @lang('home.pub_date')</th>
                                <!-- <th class="table-heading-text">@lang('home.tendering')<br> -->
                                <!-- @lang('home.tender_sector')</th> -->
                                <th class="table-heading-text">@lang('home.cap_tender')<br>@lang('home.cap_Detail')<br>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($tenders)>0)
                                @foreach($tenders as $tenders_data)
                                <tr @if ($loop->last) class="last-child-no-boder" @endif>
                                    <td>{{date('d-m-Y', strtotime($tenders_data->publication_date))}}</td>
                                    <!-- <td>{{$tenders_data->localeAll[0]->tendering_sector}}</td> -->
                                    <td class="single-stage tender-click" onclick="pageRedirect('http://algeriatenders.com/')"><strong>
                                    {{ html_entity_decode($tenders_data->localeAll[0]->tender_detail) }}</strong>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">
                                        @lang('home.no_data_found')
                                    </td>
                                </tr>

                            @endif
                            </tbody>
                        </table>
                        <div class="tab-pane-socialmedia">
                            <ul>
                            <p class="sharing">@lang('algeria_business_network.sharing')</p>
                            @include('frontend.share')
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
      </div>
   </div>
</section>
<!-- discover algeria home end here -->
<!-- discover algeria invest start here -->
<section class="discover-algeria-invest">
   <div class="container">
      <div class="row">
         <div class="col-md-4 col-lg-4 col-sm-4">
            <div class="discover-algeria-invest-box-yellow">
               <div class="discovera-algeria-caption-box">
                  <h4 class="main-heading mb-2 text-truncate">@lang('home.business_directory')</h4>
                  <p class="discover-algeria-invest-text text-limit">@lang('home.business_directory_description')</p>
                  <a href="{{route('business-directory')}}" class="more-news">@lang('home.business_more')<span class="more-news-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> 
               </div>
            </div>
         </div>
         <div class="col-md-4 col-lg-4 col-sm-4">
            <div class="box-green-outer">
               <div class="discover-algeria-invest-box-yellow">
                  <div class="discovera-algeria-caption-box box-green">
                     <h4 class="main-heading mb-2 text-white text-truncate">@lang('home.business_title')</h4>
                     <p class="discover-algeria-invest-text text-white text-limit">@lang('home.business_opportinity_description')</p>
                     <a href="{{route('business-opportunity')}}" class="more-news text-white">@lang('home.business_more')<span class="more-news-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> 
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4 col-lg-4 col-sm-4">
            <div class="box-blue-outer">
               <div class="discover-algeria-invest-box-yellow">
                  <div class="discovera-algeria-caption-box box-blue">
                     <h4 class="main-heading mb-2 text-white text-truncate">@lang('home.business_intelligence')</h4>
                     <p class="discover-algeria-invest-text text-white text-limit">@lang('home.business_intelligence_description')</p>
                     <a href="{{route('business-intelligence')}}" class="more-news text-white">@lang('home.business_more')<span class="more-news-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> 
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- discover algeria invest ends here -->
@include('frontend.partner.index')
<!-- testimonial-home -->
@php
$setting = getTestimonialStatus(); 
@endphp
@if($setting->status == 1)
<section class="testimonial-home">
   <div class="testimonial-area">
      <div class="testimonial-area__elements">
         <div class="container">
            <div class="title-headings">
               <div class="row align-items-center title-border">
                  <div class="col-lg-8 col-md-6 col-sm-6 p-0 title-data">
                     <h4 class="main-heading">@lang('home.testimonial')</h4>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0 title-more-data">
                     <div class="heading-with-arrow">
                        <a href="{{route('testimonials')}}" class="more-data">@lang('home.view_more')</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach($testimonials as $testimonial)
               @foreach($testimonial['localeAll'] as $testimonial_translate)
               <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="testimonial-area__elements--box mt-4">
                     <div class="quote-font pt-3 pb-3">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                     </div>
                     <p class="testimonial-content">
                        {{ html_entity_decode(strip_tags(str_limit($testimonial_translate->description, 165, '....'))) }}
                        <a type="button" class="modal-read-more" data-toggle="modal" data-target="#myModal{{$testimonial->id}}" data-id="{{ $testimonial->id }}">
                        @lang('home.read_more')
                        </a>
                     <div class="modal" id="myModal{{$testimonial->id}}">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <input type="hidden" name="id" value="{{$testimonial->id}}">
                              <div class="modal-header">
                                 <h4 class="sub-heading">{{$testimonial_translate->name}}</h4>
                                 <br>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                 <p class="modal-innner-text mb-2">
                                    {{ html_entity_decode(strip_tags($testimonial_translate->description))}}
                                 </p>
                                 <div class="authour-detail">
                                    <div class="authour-detail__left">
                                       <img src="{{ isset($testimonial->image)? asset('storage/uploads/testimonial/'.$testimonial->image):  asset('storage/uploads/testimonial/default-image.png') }}" alt="authour" class="img-fluid">
                                    </div>
                                    <div class="authour-detail__right">
                                       <strong>
                                          <p class="authour-name">{{$testimonial_translate->name}}</p>
                                       </strong>
                                       <p class="mt-1">{{$testimonial_translate->sub_title}}</p>
                                       <p class="mt-1">Company one</p>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="common-button" data-dismiss="modal">@lang('home.close')</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     </p>
                     <div class="authour-detail">
                        <div class="authour-detail__left">
                           <img src="{{ asset('storage/uploads/testimonial/'.$testimonial->image) }}" alt="authour" class="img-fluid">
                        </div>
                        <div class="authour-detail__right">
                           <strong>
                              <p class="authour-name">{{$testimonial_translate->name}}</p>
                           </strong>
                           <p>{{$testimonial_translate->sub_title}}</p>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
               @endforeach
            </div>
         </div>
      </div>
   </div>
</section>
@endif
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
    <!-- Please keep your own scripts above main.js -->
    <script src="{{ asset('js/front-end/main.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script>
function pageRedirect(route) {
// alert(route);
    window.location.href = route;
}

$(document).ready(function(){
    // ------Submit Economic NewsLetter--------------
    $(document).on('click','.economic_submit',function(e){
                e.preventDefault();
                var type = $(".business_subscribe").val();
                var email = $(".economic_email").val();

                $.ajax({
                    url: '{{route("subscribe_newsletters")}}',
                    type : "POST",
                    data : {type:type,email:email, _token:"{{csrf_token()}}"},
                    beforeSend : function() {
                        $('#spinner').css('display','inline-block');
                        $('.economic_submit').prop('disabled', true);
                    },
                    success : function (data)
                    {
                        $('#spinner').css('display','none');
                        $('.economic_submit').prop('disabled', false);

                        if(data.errors){
                            if(data.errors.email){
                                // $(".economic_email").addClass('is-invalid');
                                $("#economic_error").css('display','block');
                                // $("#economic_error").html(data.errors.email);
                                $("#economic_error").html(`{{__('home.email_errors')}}`);
                                $("#economic_success").css('display','none');
                                $("#economic_sub_already").css('display','none');
                            }
                        }
                        if(data.success){
                            // $(".economic_email").removeClass('is-invalid');
                            $("#economic_error").html('');
                            $(".economic_email").val('');
                            $("#economic_success").css('display','block');
                            $("#economic_success").html(data.success);
                            $("#economic_sub_already").css('display','none');
                        }
                        if(data.subscribed){
                            $("#economic_success").css('display','none');
                            // $(".economic_email").removeClass('is-invalid');
                            $("#economic_error").html('');
                            $(".economic_email").val('');
                            $("#economic_sub_already").css('display','block');
                            $("#economic_sub_already").html(data.subscribed);
                        }
                    }
                });

    });
    // -------------End here---------------------
    // ------Submit Resources NewsLetter--------------
    $(document).on('click','.resources_submit',function(e){
            e.preventDefault();
            var type = $("#resource_subscribe").val();
            var email = $("#resource_email").val();
            $.ajax({
                url: '{{route("subscribe_newsletters")}}',
                type : "POST",
                data : {type:type,email:email, _token:"{{csrf_token()}}"},
                beforeSend : function() {
                        $('#spinner-economic').css('display','inline-block');
                        $('.resources_submit').prop('disabled', true);
                    },
                success : function (data)
                {
                    $('#spinner-economic').css('display','none');
                    $('.resources_submit').prop('disabled', false);
                    if(data.errors){
                        if(data.errors.email){
                            // $("#resource_email").addClass('is-invalid');
                            $("#resources_error").css('display','block');
                            // $("#economic_error").addClass('invalid-feedback');
                            // $("#resources_error").html(data.errors.email);
                            $("#resources_error").html(`{{__('home.email_errors')}}`);
                            $("#success-resources").css('display','none');
                            $("#resources_already").css('display','none');
                        }
                    }
                    if(data.success){
                        // $("#resource_email").removeClass('is-invalid');
                        $("#resources_error").html('');
                        $("#resource_email").val('');
                        $("#success-resources").css('display','block');
                        $("#success-resources").html(data.success);
                        $("#resources_already").css('display','none');
                    }
                    if(data.subscribed){
                        $("#success-resources").css('display','none');
                        // $("#resource_email").removeClass('is-invalid');
                        $("#resources_error").html('');
                        $("#resource_email").val('');
                        $("#resources_already").css('display','block');
                        $("#resources_already").html(data.subscribed);
                    }
                }
            });
    });
    // -------------End here---------------------
    // $(document).on('click','.modal-read-more',function(){
        //     var id = $(this).data('id');
        //     console.log(id);
        //     // $("#btn-more").html("Loading....");
        //     $.ajax({
        //         url : '{{route("readmoredata")}}',
        //         method : "POST",
        //         data : {id:id, _token:"{{csrf_token()}}"},
        //         dataType : "text",
        //         success : function (response)
        //         {
        //             $('#myModal'+id).modal('show');
        //             $('.modal-dialog').html(response);
        //         }
        //     });
    // });
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
                }else {
                    toastr.error(`{{__('discover_algeria.link_copied_error')}}`);
                 }
                document.body.removeChild(textarea);
    });
});
</script>
@endsection
