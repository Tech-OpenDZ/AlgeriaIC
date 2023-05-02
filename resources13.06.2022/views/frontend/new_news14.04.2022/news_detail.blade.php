<html prefix="og: http://ogp.me/ns#">
@extends('frontend.layouts.master')

@section('head')

    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{str_limit($news->localeAll[0]->title,50,'...')}} | @lang('news.placeName')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>

    <script type="text/javascript">
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '319416819891149');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=319416819891149&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->
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
                                <div class="col-lg-7 col-md-7 pt-4">
                                    <p class="news-article-content">
                                        {{Carbon\Carbon::parse($news->created_at)->isoFormat('LL')}}
                                        | <span class="show-time-detail">{{Carbon\Carbon::parse($news->created_at)->diffForHumans()}}</span>
                                    </p>
                                </div>
                                <div class="col-lg-5 col-md-5">
                                    <div class="tab-pane-socialmedia pt-4">
                                        <ul class="head-social-icons">
                                            <p class="sharing">@lang('algeria_business_network.sharing')</p>
                                            @include('frontend.share')
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h1 class="large-heading mb-3">{{$news->localeAll[0]->title}}</h1>
                        <h2 class="large-heading-two">{{$news->localeAll[0]->summary}}</h2>

                    </div>


                             <div align="right">
                                 <?php
                                 if ($news->is_premium == 1  ) { ?>
                                 <h5 style="color:#0F2333;font-style:italic;float:left"> @lang('news.by') : &nbsp;</h5>  <h5 style="color:#dd4f41;font-style:italic;float:left">{{$news->localeAll[0]->editor}}</h5>
                                   <?php
                                   }
                                 else {


                                   ?>
                                     <h5 style="color:#0F2333;font-style:italic;float:left"></h5>  <h5 style="color:#dd4f41;font-style:italic;float:left">{{$news->localeAll[0]->editor}}</h5>
                                     <?php
                                     }
                                 ?>
						<u><i><a target="_blank" href="{{route('legal-notice')}}" class="pricay-btn">@lang('signup.legalNotices')</a></i></u> |
                       <u><i><a target="_blank" href="{{route('terms-of-service')}}" class="pricay-btn">@lang('signup.termsOfServices')</a>
							</i></u>
								</div>





				 <div class="industry-tags mb-3">
                        <ul class="tags-top">
                            @foreach($news->sectors as $sector)
                            <li> <a href="{{URL::to('/').'/news?page=1&keyword=&sector%5B%5D='.$sector->id}}" class="yellow-box">{{$sector->localeAll[0]->name}}  </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 col-lg-9 col-sm-12">
                        <div class="discover-algeria__left">
                            <section class="news-artcle detail-page-news">
                                <div class="news-detail-article">
                                    <div class="ratio-1x1">
                                        <div class="ratio-inner">
                                            <img src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="news-detail" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="news-data common-heading">
                                        <p class="news-detail-content mt-4">{!! str_replace('<p>&nbsp;</p>', "<br>", $news->localeAll[0]->description) !!}</p>
                                    </div>
                                    <div class="news-detail-custome-img">
                                        <div class="row">
                                            @foreach($news->newsImages as $newsImage)
                                            <div class="col-md-3 col-sm-3  mt-4">
                                                <div class="ratio-1x1">
                                                    <div class="ratio-inner">
                                                        <img src="{{asset('storage/uploads/news_images/'.$newsImage->image)}}" alt="news-detail" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="source-with-social">
                                        <div class="row">
                                            <div class="col-lg-7 pt-4">


                                                <p class="news-article-content">{{Carbon\Carbon::parse($news->insertion_date)->isoFormat('LL')}} | <a href="{{$news->source_link}}" target="_blank"> <span class="source-name"><img src="{{asset('storage/uploads/news_source/logo/'.$news->newsSource->logo)}}" alt="algeria-logo" class="" height="24px" width="60px"></span> </a></p>

                                            </div>
                                            <div class="col-lg-5">
                                                <div class="tab-pane-socialmedia pt-4">
                                                    <div style="padding-top:10px">
                                                    <ul>
                                                        <p class="sharing">@lang('algeria_business_network.sharing')</p>
                                                        @include('frontend.share')
                                                    </ul>
                                                    <div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    @include('frontend.common.right_sidebar')
                </div>
            </div>
            <!-- left area ends here -->
        </div>
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
