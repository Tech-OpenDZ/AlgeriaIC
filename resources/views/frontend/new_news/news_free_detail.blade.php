<html prefix="og: http://ogp.me/ns#">

@extends('frontend.layouts.master')

@section('head')

    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{str_limit($news->localeAll[0]->title,50,'...')}} | @lang('news.placeName')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&amp;display=swap">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js"></script>
    <?php
    $Url = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    $Url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]
    ;
    ?>

    <meta property="og:image" content=" <?php echo $Url; ?>" />
    <meta property="og:image:secure_url" content="<?php echo $Url; ?>" />

@endsection

@section('content')
    <section class="news-main-area">
        <div class="discover-algeria">
            <div class="container">
                <div class="discover-algeria__left">
                    <ol class="breadcrumb-area">
                       <!-- <li class="breadcrumb-elements"><a href="#">@lang('news_detail.home')</a></li> -->
                       <!-- <li class="active">@lang('news_detail.newsDetailPage')</li> -->
                    </ol>
                    <div class="business-banner text-center">
                        @php
                            $adv = getAdvertisement('top-header','news');
                        @endphp
                        @if($adv != null)
                        @php
                            if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                                $adv['url'] = "http://" . $adv['url'];
                            }
                        @endphp
                            <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid success"></a>
                        @endif
                    </div>

                    <div class="news-head">
                        <div class="source-with-social">
                            <div class="row">
                            <?php
                                 if ($news->is_premium == 1  ) { ?>
                                  <div class="col-lg-7 col-md-7 pt-4">
                                        <p class="news-article-content">
                                            {{Carbon\Carbon::parse($news->insertion_date)->isoFormat('LL')}}
                                            | <span class="show-time-detail">{{Carbon\Carbon::parse($news->insertion_date)->diffForHumans()}}</span>
                                        </p>
                                    </div>
                                   <?php
                                   }
                                 else if ($news->is_premium == 0  ) {


                                   ?>
                                    <div class="col-lg-7 col-md-7 pt-4">
                                        <p class="news-article-content">
                                            {{Carbon\Carbon::parse($news->created_at)->isoFormat('LL')}}
                                            | <span class="show-time-detail">{{Carbon\Carbon::parse($news->created_at)->diffForHumans()}}</span>
                                        </p>
                                    </div>
                                     <?php
                                     }
                                 ?>
                             
                            </div>
                        </div>

                        <h1 class="large-heading mb-3">{{$news->localeAll[0]->title}}</h1>
                        <h2 class="large-heading-two">{{$news->localeAll[0]->summary}}</h2>

                    </div>


                             <div align="right">
                                 <?php 
                                 if ($news->is_premium == 1  ) { ?>
                                <!-- <h5 style="color:#0F2333;font-style:italic;float:left"> @lang('news.by') : &nbsp;</h5>  <h5 style="color:#dd4f41;font-style:italic;float:left">{{$news->localeAll[0]->editor}}</h5> -->
                                   <?php
                                   }
                                 else {


                                   ?>
                                   <!--  <h5 style="color:#0F2333;font-style:italic;float:left"></h5>  <h5 style="color:#dd4f41;font-style:italic;float:left">{{$news->localeAll[0]->editor}}</h5> -->
                                     <?php
                                     
                                     }
                                 ?>

<u><i><a target="_blank" href="{{route('legal-notice')}}" class="pricay-btn" style="color:#858282">@lang('signup.legalNotices')</a></i></u> |
                       <u><i><a target="_blank" href="{{route('terms-of-service')}}" class="pricay-btn" style="color:#858282">@lang('signup.termsOfServices')</a>
							</i></u>
								</div>
                                <br>
                                <br>

 <!--<center> <a href="/customerlogin"  type="button" class="read-more-button" style="color:#4e7cbe;font-size:20px;font-weight:bold" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer; color:#4e7cbe" id="loign_formshow" class="more-data"></i>@lang('event.seeMore') <br> <img src="{{asset('storage/uploads/icon/flech.gif')}}" alt="" style="height:40px;width:50px"><br> <!-- <i class="fas fa-angle-double-down" style="font-size:30px"></i> --> <!-- </a> <br> <br></center> -->
                                                                                        @if(!Auth::guard('customer')->check())
                                                                                       <!-- <a href="/customerlogin" class="more-data heading-with-arrow mt-1" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer; color:#4e7cbe" id="loign_formshow" class="more-data"></i>@lang('event.seeMore') <i class="fas fa-arrow-circle-right"></i> </a> -->
                                                                                       <center> <a href="/customerlogin"  type="button" class="read-more-button" style="color:#4e7cbe;font-size:20px;font-weight:bold" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer; color:#4e7cbe" id="loign_formshow" class="more-data"></i>@lang('event.seeMore') <br> <img src="{{asset('storage/uploads/icon/flech.gif')}}" alt="" style="height:40px;width:50px"> <!-- <i class="fas fa-angle-double-down" style="font-size:30px"></i> --> </a> </center> 
                                                                                       @else
                                                                                       <center> <a href="{{route('premium-news-list')}}" type="button" class="read-more-button" style="color:#4e7cbe;font-size:20px;font-weight:bold"  style="color:#4e7cbe" id="loign_formshow" class="more-data"></i>@lang('event.seeMore') <br> <img src="{{asset('storage/uploads/icon/flech.gif')}}" alt="" style="height:40px;width:50px"> <!-- <i class="fas fa-angle-double-down" style="font-size:30px"></i> --> </a> </center> 

                                                                                        @endif


		







				 <!--<div class="industry-tags mb-3">
                        <ul class="tags-top">
                            @foreach($news->sectors as $sector)
                            <li> <a href="{{URL::to('/').'/news?page=1&keyword=&sector%5B%5D='.$sector->id}}" class="yellow-box">{{$sector->localeAll[0]->name}}  </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div> -->
                <!--<div class="row">
                    
          
        </div> -->
    </section>
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
    // load more testimonials ajax call
    $(document).ready(function(){
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

        $(document).on('click','.economic_submit',function(e){
            e.preventDefault();
            var type = $(".business_subscribe").val();
            var email = $(".economic_email").val();

            $.ajax({
                url: '{{route("subscribe_newsletters")}}',
                type : "POST",
                data : {type:type,email:email, _token:"{{csrf_token()}}"},
                success : function (data){
                    if(data.errors){
                        if(data.errors.email){
                            $("#economic_error").css('display','block');
                            $("#economic_error").html(data.errors.email);
                            $("#economic_success").css('display','none');
                            $("#economic_sub_already").css('display','none');
                        }
                    }
                    if(data.success){
                        $("#economic_error").html('');
                        $(".economic_email").val('');
                        $("#economic_success").css('display','block');
                        $("#economic_success").html(data.success);
                        $("#economic_sub_already").css('display','none');
                    }
                    if(data.subscribed){
                        $("#economic_success").css('display','none');
                        $("#economic_error").html('');
                        $(".economic_email").val('');
                        $("#economic_sub_already").css('display','block');
                        $("#economic_sub_already").html(data.subscribed);
                    }
                }
            });
        });
    });
</script>
@endsection
