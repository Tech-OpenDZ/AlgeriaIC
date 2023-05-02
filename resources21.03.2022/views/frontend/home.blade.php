<?php
//session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" href="https://algeriainvest.com/AlgeriaIC/public/dist/assets/media/logos/algeria-favicon.svg">
    <script async="" src="{{ asset('css/front-end/home_page_styles/files/get_counts')}}"></script><script type="”application/ld+json”">
			{
			“@context” : “https://schema.org",
			“@type” : “Organization”,
			“legalName” : “Algeria Invest”,
			“url” : “https://algeriainvest.com/AlgeriaIC/public”,
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
    <title> @lang('home.algeria_invest')® : La Première Plateforme Digitale Dédiée à L’investissement en Algérie </title>
    <meta name="description" content="Algeria Invest est la Première Plateforme Digitale dédiée à l'investissement en Algérie qui
		regroupe toutes les opportunités d'affaires Nationales et Internationales">
    <meta name="keywords" content="Algérie, Investir en Algérie, Investissements en Algérie, économie Algérie, secteurs d'activités Algérie, Business en Algérie,
		administration, fiscalité, conseil, exposition, juridique, logistique, audit, marché, créer une entreprise en Algérie, due diligence,
		assistance juridique, étude de marché, appel d’offres, assistance administrative, ressource humaine">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="facebook-domain-verification" content="5adgm88klyu2fjfk5iqvb289mdfd4r" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/share.css')}}">





    <!--my_css_here -->
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/mon-style.css')}}">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css"> -->

    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/toastr.min.css')}}">
    <!-- <link rel="shortcut icon" href="https://algeriainvest.com/AlgeriaIC/public/dist/assets/media/logos/algeria-favicon.svg"> -->
    <a class="button-home" href="{{route('contactus')}}" target="_self" aria-hidden="false"> </a>




   <!-- <div id="iframeID" class="row video-home d-none d-lg-block">
        <div class="question">

            <input  name="X" id="Close"  class="genric-btn success radius" type="button" style="color:#ffffff;height: 40px;width: 15px;background-color:#000000;" value="X" onClick="closeWin()"  />
        </div>
div>
    <iframe  class="video-home" src="https://www.youtube.com/embed/fv3RL8vs76w" close="close" frameborder="0" >

    </iframe>
</div>

    </div> -->

</head>
<!--<style>
.box:hover {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  border-left: 10px;
  animation-name: example;
  animation-duration: 0.25s;
  border-left: 8px solid rgba(0,0,0,0.25);
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
</style> -->
<style>
    .video-home {
        position: fixed;
        bottom: 1%;
        right: 0%;
        color: #fff;
        z-index: 10;
        width: 8vh;
        min-height: 40vh;
        min-width: 65vh;
        font-weight: 400;
        font-size: 1vw;
        padding: 2%;
        border-radius: 3px;
        margin: 1% 2%;

        background-size: auto 80%;
        -webkit-transition: all 1s ease-in-out;
        -moz-transition: all 1s ease-in-out;
        -o-transition: all 1s ease-in-out;
        -ms-transition: all 1s ease-in-out;
        transition: all 1s ease-in-out;

    }
    .question {
        position: fixed;
        bottom: 20%;
        right: 10%;
        color: #fff;
        z-index: 10;
        width: 8vh;

        min-height: 8vh;
        min-width: 10vh;
        font-weight: 400;
        font-size: 20px;
        padding: 2%;
        border-radius: 3px;
        margin: 8% 57%;

        background-size: auto 80%;
        -webkit-transition: all 1s ease-in-out;
        -moz-transition: all 1s ease-in-out;
        -o-transition: all 1s ease-in-out;
        -ms-transition: all 1s ease-in-out;
        transition: all 1s ease-in-out;

    }
</style>
<!--<script>
    function closeWin()   // Tested Code
    {
        var someIframe = window.parent.document.getElementById('iframeID');
        someIframe.parentNode.removeChild(window.parent.document.getElementById('iframeID'));
    }


</script> -->

</head>

<body class="chrome chrome89 win desktop" cz-shortcut-listen="true">
<?php
if (!isset($_COOKIE['count'])) {
//echo " En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies";
$cookie = 1;
setcookie("count", $cookie); ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:95px">
    <div class="modal-dialog" style="bacground-color: #f0f0f0">
        <div class="modal-content">
            <div class="modal-header" style="background:#000000;border-bottom:2px solid #ffb400;padding-top: 6px; height: 38px">

                <h6 class="modal-title" style="text-align: center; color:#FFFFFF; text-transform: uppercase;font-weight:bold">@lang('navbar.discover')</h6>
                <button class="close" data-dismiss="modal" aria-label="Close" style='color:#ffffff'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding:0; margin:0">
                <iframe src="https://www.youtube.com/embed/yR7fRmVJYBI" allowfullscreen="" frameborder="0" height="315" width="100%"></iframe>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });

    $('.modal').on('hide.bs.modal', function() {
        var memory = $(this).html();
        $(this).html(memory);
    });
</script>

<?php
}else{
    $cookie = ++$_COOKIE['count'];
    setcookie("count", $cookie);
    //echo "You have viewed this page ".$_COOKIE['count']." times.";
}
?>

<!-- Header Start -->

@include('frontend/layouts/header_home')
<!-- Header End -->

<!-- TradingView Widget BEGIN -->
<!--<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
        {
        "symbols": [
        {
        "description": "",
        "proName": "FX_IDC:EURDZD"
        },
        {
        "description": "",
        "proName": "FX_IDC:DZDUSD"
        },
        {
        "description": "",
        "proName": "FX_IDC:USDDZD"
        },
        {
        "description": "",
        "proName": "FX_IDC:DZDGBP"
        },
        {
        "description": "",
        "proName": "FX_IDC:DZDBRX"
        }
        ],
        "showSymbolLogo": true,
        "colorTheme": "light",
        "isTransparent": false,
        "displayMode": "adaptive",
        "locale": "fr"
        }
    </script>
</div> -->
<!-- TradingView Widget END -->




<!-- Nwes slider Start -->
<div class="container-fluid caroussel-contain pt-20 pb-50" style="">
<span class="light-transparent"></span>


    <div class="row "class="mon-slide ">
        <div class="col-md-12 ">


            <!--	<div class="row ">
                    <div class="banner-img" style="height:100px;width:100%">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 section_title" style="float:left;">

                        </div>


                    </div>
                </div>
            <br>
            <br> -->

            <center>
                <div class="slide-title pb-30" >

                    <h3>@lang('home.invest_in_algeria')</h3>


                    <span> <strong> @lang('home.business_opportunities') </strong></span>
                </div>
            </center>
            <div id="owl-demo" class="owl-carousel owl-theme d-flex align-items-center">
                @foreach($business_opportunities as $business_opportunity)
                    <div class="item">
                        <div class="news-post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 p-0">
                                        <div class="news-post__left">
                                            <div class="ratio-1x1" >
                                                <div class="ratio-inner">
                                                    <img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                                </div>
                                                <div class="premium-news"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <a href="http://algeriaic.php-dev.in/news/12" class="more-data"> -->
                                    <div class="col-lg-9 col-md-8 col-sm-8">
                                        <div class="news-post__right">
                                            @foreach($business_opportunity->sectors as $sectors)
                                                @break($loop->iteration == 2)
                                                <h4 >{{$sectors->localeAll[0]->name}}</h4>
                                            @endforeach
                                            <hr class="hero__hr">
                                            </hr>
                                            <a href="{{route('business-opportunity-details', ['sector_id' => $business_opportunity->sectors[0]->page_key,'id' => $business_opportunity->page_key ])}}" class="news-text text-limit pb-3">
                                                {{ str_limit(html_entity_decode(strip_tags($business_opportunity->localeAll[0]->project_title)),70,'...') }}
                                            </a>
                                            <p class="news-post-caption text-limit">
                                                {{ str_limit(html_entity_decode(strip_tags($business_opportunity->localeAll[0]->project_description)),90,'...') }}

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        <!--	 <center>
						<div class="slide-title pt-30">
						<a href="{{route('business-opportunity')}}"style="font-weight:bold;font-size:18px;color:white;letter-spacing:1px;">
						@lang('home.see_more_opportunities') +
						</a>
						</div>
					</center> -->
            <br><br>
            <center>
                <div class="d-none d-lg-block">
                    <ul>
                        <li>
                            <a href="{{route('business-opportunity')}}"class="genric-btn success radius" style="background-color:#4e7cbe!important" >
                                @lang('home.see_more_opportunities')
                            </a>

                        </li>
                    </ul>
                </div>
            </center>

        </div>
    </div>
</div>
<!-- Nwes slider End -->


@if(!$news->isEmpty())
    <div class="row">
        <div class="col-md-12">
            <div class="mine-news d-flex justify-content-between align-items-center breaking-news ">

                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center  py-2  px-1 news">
                    <span class="d-flex align-items-center">@lang('home.economic_news')</span></div>

                <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">

                    @foreach($news->slice(0, 20) as $news)

                        <a href="{{route('news-detail', [$news->page_key])}}" target="_blank"> {{$news->localeAll[0]->title}}</a>
                        <span class="dot"></span>

                    @endforeach
                </marquee>
            </div>

        <!--  <div class="heading-with-arrow mine-newsbutton">
					<a href="{{route('news-list')}}" class="more-data">@lang('home.view_more') +</a>
					</div>
				-->
        </div>
    </div>
@endif





<div id="div-content">

    <table border ="0"; width="100%"; height="100%" background="1.jpg"><tr><td>
                <br>

                <section class="algeria-home">
                    <div class="container">

                        @if(!$premium_news->isEmpty())
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <div class="discover-algeria__left">
                                        <div class="business-banner">
                                        </div>
                                        <!-- Banner slider start here -->
                                        <!-- ---Economic News--- -->
                                        <section class="economic-news">
                                            <div class="title-headings">
                                                <div class="row align-items-center title-border">
                                                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 p-0 title-data">
                                                        <h4 class="main-heading">@lang('home.premium')</h4>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 p-0 title-more-data">
                                                        <div class="heading-with-arrow">
                                                            <a href="{{route('premium-news-list')}}" >@lang('home.view_more') +</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- -------news start here---- -->
                                            <div class="economic-news__elements news-full">
                                                <div class="row">
                                                    @foreach($premium_news as $news)
                                                    @if(!Auth::guard('customer')->check())
                                                        <div class="co-md-12 col-lg-12 mt-4 "  onclick="pageRedirect('{{route('premium-news_free-detail', [$news->page_key])}}')">
                                                            <div class="news-post box" style="background-color:#e8e8e8">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-sm-2  p-0">
                                                                            <div class="news-post__left">
                                                                                <div class="ratio-1x1">
                                                                                    <div class="ratio-inner">
                                                                                        <img src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                                                                    </div>
                                                                                    <div class="premium-news">@lang('home.premium')</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- <a href="http://algeriaic.php-dev.in/news/12" class="more-data"> -->
                                                                        <div class="col-md-9 col-sm-10">
                                                                            <div class="news-post__right">
                                                                                <ul class="tags-top">
                                                                                    @foreach($news->sectors as $sector)
                                                                                        @break($loop->iteration == 2)
                                                                                        <li>
                                                                                            <a href="{{url('news').'?page=1&keyword=&sector%5B%5D='.$sector->id}}" class="yellow-box">{{$sector->localeAll[0]->name}}</a>
                                                                                            <div class="float-right">
                                                                                                <a class="yellow-box">{{Carbon\Carbon::parse($news->created_at)->isoFormat('LL')}}</a>
                                                                                            </div>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                                <p class="news-text text-limit">
                                                                                    {{$news->localeAll[0]->title}}

                                                                                </p>
                                                                                <p class="news-post-caption text-limit">
                                                                                    {{ strip_tags($news->localeAll[0]->description)}}
                                                                                </p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="co-md-12 col-lg-12 mt-4 "  onclick="pageRedirect('{{route('premium-news-detail', [$news->page_key])}}')">
                                                            <div class="news-post box" style="background-color:#e8e8e8">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-sm-2  p-0">
                                                                            <div class="news-post__left">
                                                                                <div class="ratio-1x1">
                                                                                    <div class="ratio-inner">
                                                                                        <img src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                                                                    </div>
                                                                                    <div class="premium-news">@lang('home.premium')</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- <a href="http://algeriaic.php-dev.in/news/12" class="more-data"> -->
                                                                        <div class="col-md-9 col-sm-10">
                                                                            <div class="news-post__right">
                                                                                <ul class="tags-top">
                                                                                    @foreach($news->sectors as $sector)
                                                                                        @break($loop->iteration == 2)
                                                                                        <li>
                                                                                            <a href="{{url('news').'?page=1&keyword=&sector%5B%5D='.$sector->id}}" class="yellow-box">{{$sector->localeAll[0]->name}}</a>
                                                                                            <div class="float-right">
                                                                                                <a class="yellow-box">{{Carbon\Carbon::parse($news->created_at)->isoFormat('LL')}}</a>
                                                                                            </div>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                                <p class="news-text text-limit">
                                                                                    {{$news->localeAll[0]->title}}

                                                                                </p>
                                                                                <p class="news-post-caption text-limit">
                                                                                    {{ strip_tags($news->localeAll[0]->description)}}
                                                                                </p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>




                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- --------news end here---- -->
                                        </section>
                                        <!-- -----End Economic News----- -->
                                    </div>
                                </div>
                                <!-- left area ends here -->
                            </div>
                        @endif
                    </div>
</div>
</section>
<!-- discover algeria home end here -->
</div>
<br><br>
</td></tr></table>
<br><br>
<!-- SERVICE AREA -->
<div class="main-section categories-view1-full" style="
			box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;">
    <!--<span class="light-transparent"></span> -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- FancyTitle -->
                <div class="fancy-title-view1 fancy-title-view1-color">
                    <h2><font size="5rem">@lang('home.services')</font></h2>
                    <p>@lang('home.services_sub_title')</p>
                </div>
                <!-- FancyTitle -->
                <!-- Categories List -->
                <div class="categories categories-view1">
                    <ul class="row">



                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-4"></i>
                                <b>  <font color="#777777" size="4">    <a href="#" class="link-info" data-toggle="modal" data-target="#mod01">        @lang('home.penny_penny')</a></font></b>
                                <!-- <span>01</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="mod01" tabindex="-1" role="dialog" aria-labelledby="mod01" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h6 class="modal-title" id="mod01" style="text-align:center"> <p class="sub-heading-two">@lang('home.penny_penny') </p> </h6> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!--<iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">

															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>


                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-9"></i>
                                <b>  <font color="#777777" size="4">      <a href="#besoin" class="link-info" data-toggle="modal" data-target="#mod02">         @lang('home.cou_va')</a></font></b>
                                <!-- <span>02</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="mod02" tabindex="-1" role="dialog" aria-labelledby="mod02" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h5 class="modal-title" id="mod02" style="text-align:center"> <p class="sub-heading-two">@lang('home.cou_va') </p> </h5> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="TheBodyContent">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!-- <iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">

															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>

                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-4"></i>
                                <b>  <font color="#777777" size="4">      <a href="#besoin" class="link-info" data-toggle="modal" data-target="#mod03">        @lang('home.due_diligence')</a></font></b>
                                <!-- <span>03</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="mod03" tabindex="-1" role="dialog" aria-labelledby="mod03" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h5 class="modal-title" id="mod03" style="text-align:center"> <p class="sub-heading-two">@lang('home.due_diligence') </p> </h5> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="TheBodyContent">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!-- <iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">

															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>
                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-12"></i>
                                <b>  <font color="#777777" size="4">     <a href="#besoin" class="link-info" data-toggle="modal" data-target="#mod04">
                                            @lang('home.exhibition_advice_and_assistance')</a></font></b>
                                <!-- <span>04</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="mod04" tabindex="-1" role="dialog" aria-labelledby="mod04" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h5 class="modal-title" id="mod04" style="text-align:center"> <p class="sub-heading-two">@lang('home.exhibition_advice_and_assistance') </p> </h5> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="TheBodyContent">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!-- <iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">


															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>


                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-7"></i>
                                <b>  <font color="#777777" size="4">
                                        <a href="#besoin" class="link-info" data-toggle="modal" data-target="#mod05">  @lang('home.human_resource_management')</a></font></b>
                                <!-- <span>05</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="mod05" tabindex="-1" role="dialog" aria-labelledby="-mod05" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h5 class="modal-title" id="mod05" style="text-align:center"> <p class="sub-heading-two"> @lang('home.human_resource_management') </p> </h5> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="TheBodyContent">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!-- <iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">


															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>
                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-8"></i>
                                <b>  <font color="#777777" size="4">       <a href="#besoin" class="link-info" data-toggle="modal" data-target="#mod06">
                                            @lang('home.advice_and_assistance_in_calls_for_tenders')</a></font></b>
                                <!-- <span>06</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="mod06" tabindex="-1" role="dialog" aria-labelledby="mod06" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h5 class="modal-title" id="mod06" style="text-align:center"> <p class="sub-heading-two">@lang('home.advice_and_assistance_in_calls_for_tenders') </p> </h5> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="TheBodyContent">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!-- <iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">


															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>
                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-9"></i>
                                <b>  <font color="#777777" size="4">        <a href="#besoin" class="link-info" data-toggle="modal" data-target="#mod07">
                                            @lang('home.location_and_logistics')</a></font></b>
                                <!-- <span>07</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="mod07" tabindex="-1" role="dialog" aria-labelledby="mod07" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h5 class="modal-title" id="mod07" style="text-align:center"> <p class="sub-heading-two">@lang('home.location_and_logistics') </p> </h5> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="TheBodyContent">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!-- <iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">


															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>
                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-10"></i>
                                <b>  <font color="#777777" size="4">       <a href="#besoin" class="link-info" data-toggle="modal" data-target="#mod08">      @lang('home.export_assistance')
                                        </a></font></b>
                                <!-- <span>08</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="mod08" tabindex="-1" role="dialog" aria-labelledby="mod08" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h5 class="modal-title" id="mod08" style="text-align:center"> <p class="sub-heading-two">@lang('home.export_assistance') </p> </h5> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="TheBodyContent">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!-- <iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">


															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>
                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-11"></i>
                                <b>  <font color="#777777" size="4">      <a href="#besoin" class="link-info" data-toggle="modal" data-target="#mod09">
                                            @lang('home.representation_of_foreign_companies')</a></font></b>
                                <!-- <span>09</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="mod09" tabindex="-1" role="dialog" aria-labelledby="mod09" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h5 class="modal-title" id="modal09" style="text-align:center"> <p class="sub-heading-two">@lang('home.representation_of_foreign_companies') </p> </h5> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="TheBodyContent">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!-- <iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">


															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>

                        <a name="besoin"> </a>

                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-6"></i>
                                <b>  <font color="#777777" size="4">
                                        <a href="#besoin" class="link-info" data-toggle="modal" data-target="#moda">    @lang('home.administrative_assistance')</a>
                                    </font></b>
                                <!-- <span>10</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="moda" tabindex="-1" role="dialog" aria-labelledby="moda" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h5 class="modal-title" id="moda" style="text-align:center"> <p class="sub-heading-two">@lang('home.administrative_assistance') </p> </h5> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="TheBodyContent">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!-- <iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">


															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>


                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-12"></i>
                                <b>  <font color="#777777" size="4">        <a href="#besoin" class="link-info" data-toggle="modal" data-target="#modb">         @lang('home.badis_badis')</a></font></b>
                                <!-- <span>11</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="modb" tabindex="-1" role="dialog" aria-labelledby="modb" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h5 class="modal-title" id="modb" style="text-align:center"> <p class="sub-heading-two">@lang('home.badis_badis') </p> </h5> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="TheBodyContent">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!-- <iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">

															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>


                        <li class="col-md-4">
                            <div class="categories-view1-wrap">
                                <i class="icon-3"></i>
                                <b>  <font color="#777777" size="4">       <a href="#besoin" class="link-info" data-toggle="modal" data-target="#modc">
                                            @lang('home.juridic_assistance')</a></font></b>
                                <!-- <span>12</span> -->
                            </div>
                            <!--  Model   -->
                            <div class="modal fade" id="modc" tabindex="-1" role="dialog" aria-labelledby="modc" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <center> <h5 class="modal-title" id="modc" style="text-align:center"> <p class="sub-heading-two">@lang('home.juridic_assistance') </p> </h5> </center>

                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="overflow:hidden" id="TheBodyContent">
                                            <!-- <h1>$services_data->localeAll[0]->title}</h1> -->
                                        <!-- <iframe width="100%" height="560" name="submitter" src="{{route('contact_post')}}">

															</iframe> -->

                                            <object data="{{route('contact_post')}}" width="100%" height="560">
                                                <embed src="{{route('contact_post')}}" width="100%" height="560"> </embed>
                                                Error: Embedded data could not be displayed.
                                            </object>



                                        </div>

                                    </div>

                                </div>

                            </div>



                        </li>


                    </ul>
                </div>
                <!-- Categories List -->
                <div class="more-spacer"></div>

            <!-- <div class="main-load-btn"><a href="{{route('contactus')}}">@lang('home.to_express_a_need')</a>	 </div> -->
            </div>
        </div>
    </div>
</div>

<!--/END SERVICE AREA-->

<div id="div-content">
    <section class="algeria-home">
        <div class="discover-algeria">
            <div class="container">
                @if(!$upcomingEvents->isEmpty())
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- ----Events Start--------->
                            <div class="events-home;">
                              <br>
							  <div class="title-headings">
                                    <div class="row align-items-center title-border">
                                        <div class="col-lg-8 col-md-12 col-sm-12 col-12 p-0 title-data">
                                            <h4 class="main-heading">@lang('home.recent_event')</h4>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-12 p-0 title-more-data">
                                            <div class="heading-with-arrow">
                                                <a href="{{route('event-list')}}">@lang('home.view_more') +</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- events-slider -->
                                <div class="row">

                                    <div class="col-md-12">
                                        <div id="news-slider" class="owl-carousel">
                                            @foreach($upcomingEvents as $event)
                                                <?php
                                                $event->start_date = Carbon\Carbon::parse($event->start_date);
                                                $format_start_date = clone $event->start_date;
                                                $format_start_date = $format_start_date->format('Y-m-d');
                                                // echo "<pre>";print_r($format_start_date);exit();
                                                $carbon_date = Carbon\Carbon::now()->format('Y-m-d');
                                                $route = (($format_start_date == $carbon_date)||($event->start_date->greaterThan(Carbon\Carbon::now()))) ? 'upcoming-event-detail' : 'past-event-detail';
                                                ?>
                                                <div class="post-slide">
                                                    <div class="post-img">
                                                        <a href="{{route($route,[$event->page_key])}}">
                                                            <img src="{{asset('storage/uploads/event_logos/'.$event->event_logo)}}" alt="">
                                                            <div class="post-date">
                                                                @php
                                                                    $string = $event->start_date;
                                                                    $timestamp = strtotime($string);
                                                                    $time =  date("d", $timestamp);
                                                                    $month = date("m", $timestamp);
                                                                @endphp
                                                                <span class="date">{{$time}}</span>
                                                                <span class="month">{{date("F", mktime(0, 0, 0, $month, 10))}}</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="post-review">
                                                        <h3 class="post-title"><a href="{{route($route,[$event->page_key])}}">{{str_limit($event->localeAll[0]->title,20,'...')}}</a></h3>
                                                        <p class="post-description">@lang('home.from') {{Carbon\Carbon::parse($event->start_date)->isoFormat('LL') }} @lang('home.to') {{Carbon\Carbon::parse($event->end_date)->isoFormat('LL') }}
                                                            | {{ str_limit(html_entity_decode(strip_tags($event->localeAll[0]->place)),30,'...') }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                                <!-- events-slider-end -->
                            </div>
                            <!-- ------Events End----- -->
                        </div>
                    </div>
                @endif

            </div>
            <br><br><br><br>

            <!-- ----Presse Start--------->

            <div class="row" style="background: linear-gradient(#e8e8e8, #e8e8e8); left:5px;right:5px;padding-left:60px;padding-right:60px;
	box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;padding-bottom: 56px;">

                <h2 class="pt-50" style="font-size:33px; width: 100%; display: block; text-align: center;">
                    @lang('navbar.presse')<br><br>
                </h2>




                <div class="col-lg-4 col-md-4 col-sm-12" style="background-color:#f8b535;border-radius:20px;padding-top:5px">

                    <h4><center>LAST INTERVIEW</center></h4><br>
                    <div class="fancy-title-view1 fancy-title-view1-color">
                        <font size="3rem"><b>  M. Kacem AÏT YALLA </b></font> <br>
                        <font size="2rem"> Président de la CACI France </font>
                        <br>
                        <br>
                        <i><b><font size="3rem" color="white">

                                </font></b></i>

                        <iframe width="90%" height="50%" src="https://www.youtube.com/embed/B9K9Ux2yZCE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>  </iframe>                    <br>
                        <br>
                        <br>
                        <font size="2rem"><b> Exclusivité Algeria INVEST®</b><br></font>


                    </div>

                </div>




                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <iframe class="video-player d-block w-100" width="100%" data-video-id="28ypNaTzicA" height="100%" src="https://www.youtube.com/embed/28ypNaTzicA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>

                            <div class="carousel-item">
                                <iframe class="video-player d-block w-100" width="100%" data-video-id="yMlOVOPiCd0" height="100%" src="https://www.youtube.com/embed/yMlOVOPiCd0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>

                            <div class="carousel-item">
                                <iframe class="video-player d-block w-100" width="100%" data-video-id="YsRDdSGaUFM" height="100%" src="https://www.youtube.com/embed/YsRDdSGaUFM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>

                            <div class="carousel-item">
                                <iframe class="video-player d-block w-100" width="100%" data-video-id="aPmyWYd78ck" height="100%" src="https://www.youtube.com/embed/aPmyWYd78ck" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>

                            <div class="carousel-item">
                                <iframe class="video-player d-block w-100" width="100%" data-video-id="N1nfPetwOBw" height="100%" src="https://www.youtube.com/embed/N1nfPetwOBw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>
























                        </div>
                        <a class="carousel-control-prev" style="color:transparent"href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>



                    </div>
                <!-- <center> <div class="align-items-center justify-content-center">
                          <br>
                          <center>
                          	<a href="{{ route('presse')}}" class="genric-btn success radius">@lang('home.view_more') +</a>
                           </center>
                          </div> </center>-->


                    <div class="col-lg-12 col-md-12 col-sm-12" style="text-align;center!important">
                        <br>
                        <br>
                        <center>
                            <ul>
                                <li>
                                    <a href="{{ route('presse')}}"class="genric-btn success radius">
                                        @lang('home.view_more') +
                                    </a>

                                </li>
                            </ul>
                        </center>
                    </div>


            </div>

        </div>


        <style>
            .carousel-control-prev {
                background-color: transparent!important;
            }

            .carousel-control-next {
                background-color:  transparent!important;
            }

            .carousel-control-prev-icon{
                background-color:#000000;
                background-size:20px 20px;

                width: 30px;
                height: 35px;
            }

            .carousel-control-next-icon{
                background-color:#000000;
                background-size:20px 20px;

                width: 30px;
                height: 35px;
            }

            @media screen and (min-width: 784px) {
                .carousel-control-prev {

                    height: 350px;


                }
                .carousel-control-next {

                    height: 350px;
                }

                .carousel-control-prev-icon{

                    margin-right:68px;

                }

                .carousel-control-next-icon{

                    margin-left:68px;

                }

            }


            @media screen and (max-width: 784px) {
                .video-player {

                    height: 120%;
                    width:120%


                }

                .footer-area .footer-bottom__elements .map-footer {

                    padding-right: 104px!important;}



            }


        </style>

        <script>


        </script>

                                                     <!-- ------ QHSE ---- -->







        <!-- ------Events End----- -->

<!-- --	box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;" - -->

<div class="row align-items-center justify-content-center" style="background: linear-gradient(#ffffff, #ffffff);
box-shadow: rgb(204, 219, 232)">

    <h2 class="pt-50"style="font-size:33px; width: 100%; display: block; text-align: center;">
        @lang('home.partners')
    </h2>

    <!-- Nes slider Start -->
    <div class="nes-slider-area pt-30 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="news-slider-active">
                        @php
                            $partners = getPartners();
                        @endphp
                        @foreach($partners as $partner)
                            <div class="single-news-slider">
                                <div class="news-img">
                                    <a><img src="{{asset('storage/uploads/partner_logo/'.$partner->logo)}}"></a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Nes slider End -->
</div>



</section>

<!-- discover algeria home end here -->
<br>
<br>
</div>
<style>
    .row .custom-heading:only-child {
        margin-bottom: -70px;
    }

    .custom-heading {
        position: relative;
        width: 100%;
        display: block;
        padding-top: 12px;
        text-transform: uppercase;
    }

    .custom-heading::after {
        position: absolute;
        display: block;
        content: "";
        width: 40px;
        height: 3px;
        left: 0;
        top: 0;
    }

    .custom-heading.centered {
        text-align: center;
    }

    .custom-heading.centered:after {
        position: absolute;
        display: block;
        content: "";
        width: 40px;
        height: 3px;
        left: 50%;
        margin-left: -20px;
        top: 0;
    }

    .promo-box {
        padding: 90px 20px;
    }

    .promo-box02 {
        padding: 30px 30px 90px 30px;
    }

    .promo-box02 p {
        text-align: center;
    }

    .promo-box h4,
    .promo-box p {
        text-align: center;
    }

    .promo-box .btn {
        float: none;
        margin: 0 auto;
        display: table;
    }

    .promo-bkg01 {
        background-image: url("../img/pics/promo01.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .promo-bkg02 {
        background-image: url("../img/pics/promo02.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .promo-bkg-pdf {
        background-image: url("{{ asset('storage/uploads/qhse/pdfDownload.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;
    }

</style>
<!-- footer -->
@php
    $facebook_url = null;
    $linkedin_url = null;
    $youtube_url = null;
    $twitter_url = null;
    $settings = getHeaderInfo();
    foreach($settings as $setting){
    if($setting->key == 'facebook_url')
    $facebook_url= $setting->value;
    if($setting->key == 'linkedin_url')
    $linkedin_url= $setting->value;
    if($setting->key == 'youtube_url')
    $youtube_url= $setting->value;
    if($setting->key == 'twitter_url')
    $twitter_url= $setting->value;

    }
@endphp
@include('frontend/layouts/footer')


<script src="{{ asset('css/front-end/home_page_styles/files/browser-class.js.téléchargement')}}"></script>

<!-- Popper JS -->
<script src="{{ asset('css/front-end/home_page_styles/files/popper.min.js.téléchargement')}}"></script>
<!-- Latest compiled JavaScript -->
<script src="{{ asset('css/front-end/home_page_styles/files/bootstrap.min.js.téléchargement')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
<!-- Please keep your own scripts above main.js -->
<script src="{{ asset('css/front-end/home_page_styles/files/main.js.téléchargement')}}"></script>
<script src="{{ asset('css/front-end/home_page_styles/files/toastr.min.js.téléchargement')}}"></script>



<!-- my-JS-here -->

<!-- Jquery Mobile Menu -->
<script src="{{ asset('css/front-end/home_page_styles/assets/js/jquery.slicknav.min.js')}}"></script>
<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('css/front-end/home_page_styles/assets/js/slick.min.js')}}"></script>
<!-- Nice-select, sticky -->
<script src="{{ asset('css/front-end/home_page_styles/assets/js/jquery.nice-select.min.js')}}"></script>
<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('css/front-end/home_page_styles/assets/js/plugins.js')}}"></script>
<script src="{{ asset('css/front-end/home_page_styles/assets/js/main.js')}}"></script>
<!-- mon-caroussel-script -->
<script>
    $(document).ready(function() {
        $(".slick-track").css("width","1140px");
        $(".single-news-slider").css("width","285px");
        $('html, body').css('overflowX', 'hidden');
        $("#owl-demo").owlCarousel({
            items : 2, //10 items above 1000px browser width
            itemsDesktop : [1000,2], //5 items between 1000px and 901px
            itemsDesktopSmall : [900,2], // betweem 900px and 601px
            itemsTablet: [600,2], //2 items between 600 and 0;
            itemsMobile : [300,1] ,// itemsMobile disabled - inherit from itemsTablet option
            autoPlay:true,
            navigation:true,
            navigationText:["",""],
            pagination:true,

        });

    });
</script>
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
                url: 'https://algeriainvest.com/AlgeriaIC/public/home-subscribe-newsletters',
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
                            $("#economic_error").html(`Le champ email est obligatoire.`);
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
                url: 'https://algeriainvest.com/AlgeriaIC/public/home-subscribe-newsletters',
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
                            $("#resources_error").html(`Le champ email est obligatoire.`);
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
        //         url : 'https://algeriainvest.com/AlgeriaIC/public/readmoredata',
        //         method : "POST",
        //         data : {id:id, _token:"GSxaY4dfFeRRtnk0XTFnAF6tTUPe2i21u0xUtSgk"},
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
                toastr.success(`Lien copié dans le presse-papier`);
            }else {
                toastr.error(`Le lien n&#039;a pas pu être copié.`);
            }
            document.body.removeChild(textarea);
        });
    });
</script>
<script src="{{ asset('css/front-end/home_page_styles/files/select2.min.js.téléchargement')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".login_btn").click(function(){
            $("#login-modal-id").css('display','block');
            $("#login-modal-id").addClass('show');
            $(".mid-header__right").css('display','block');
            $('#login-modal-id').css("opacity", "1");
        });

        $("button.close.grey-close").click(function(){
            $("#login-modal-id").css('display','none');
            //$(".mid-header__right").css('display','none');
        });


        $('#currency').on('change', function(e){
            var selected = $(this).find('option:selected');
            var currency = selected.text();
            var currency_key = selected.data('key');
            $('#currency-value').val(currency_key);
            $('#currency-value-span').html(currency_key);
            $('#currency-unit').html(currency);
        });

        // --Shows forget password popup-----
        $("#forget_password").click(function(){
            $('#login_formmodal').hide();
            $('#forget_modal').show();
            $(".success_message").css('display','none');
        });
        // ------------------------------------
        // --Shows Login password popup-----
        $("#loign_formshow").click(function(){
            $('#login_formmodal').show();
            $('#forget_modal').hide();
            $(".success_message").css('display','none');
        });



        $('body').on('submit','.login_submit_form',function(e){
            e.preventDefault();
            addLoader(true);
            $( '#name-error' ).html( "" );
            $( '#password-error' ).html( "" );
            $("#email_password_error").html("");
            $.ajax({
                type: "POST",
                url:"{{route('customer-login')}}",
                data: $(this).serialize(),
                success: function(data) {
                    addLoader(false);
                    if(data.errors){
                        if(data.errors.customer_username){
                            $('input[name=customer_username]').addClass('is-invalid');
                            var error_username = `Le nom d'utilisateur ou l e-mail est requis`;
                            $( '.name-error' ).addClass('invalid-feedback ').html(error_username);
                            $('.invalid-feedback').css('display','block');

                        }
                        if(data.errors.customer_password){
                            $('input[name=customer_password]').addClass('is-invalid');
                            var error_pass = `Le champ du mot de passe est obligatoire`;
                            $( '.pass_error' ).addClass('invalid-feedback ').html(error_pass);
                            $('.invalid-feedback').css('display','block');
                        }
                    }
                    if(data.success){
                        window.location.href = data.prev_route;
                    }
                    if(data.login_error){
                        $( '#email_password_error' ).html(data.login_error);
                    }
                    if(data.mail_sent){

                        $( '.invalid-feedback' ).css('display', 'none');
                        $( '.success_message' ).css('display', 'block');
                        $( '#mail_sent' ).html(data.mail_sent);
                    }
                }
            });
        });
        @if(Session::has('openLogin') && Session::get('openLogin'))
        @if(Session::get('openLoginCount') > 1)
        @php
            Session::forget('openLoginCount');
            Session::forget('openLogin');
        @endphp

        @else
        @php
            Session::put('openLoginCount', (Session::has('openLoginCount')) ? (Session::get('openLoginCount') + 1): 1);
        @endphp
        $("#loign_formshow").trigger('click');
        @endif
        @endif
        // -----------------Submit Forget Password form-------------------
        $('body').on('submit', ".forget_form", function(e){
            e.preventDefault();
            addLoader(true);
            $('.send_email_passlink').html('Sending..');
            $(".send_email_passlink").attr("disabled", true);
            $('.bd-example-modal-lg').modal({
                backdrop: 'static',
                keyboard: false
            });
            $.ajax({
                type: "POST",
                url:"{{route('customer.password.email')}}",
                data: $(this).serialize(),
                success: function(data) {
                    addLoader(false);
                    if(data.success){
                        $("#useremail").removeClass('is-invalid');
                        $(".invalid-feedback").find("strong").html('');
                        $(".success_message").css('display','block');
                        $('.success_message').html(data.success);
                        $(".send_email_passlink").attr("disabled", false);
                        $('.send_email_passlink').html('Send password');
                        $("#useremail").val('');
                    }
                    if(data.errors){
                        $("#useremail").addClass('is-invalid');
                        $(".invalid-feedback").find("strong").html(data.errors);
                        $(".send_email_passlink").attr("disabled", false);
                        $('.send_email_passlink').html('Send password');
                    }
                }
            });
        });
        // -------------------End here-------------------------------------
    });
    function addLoader(mode) {
        if (mode) {
            $('#cover-spin').show(0);
        }
        else {
            $('#cover-spin').css('display', 'none');
        }
    }

    // -- advertisement click
    var csrf = "{{csrf_token()}}";
    function adClick(ad_id){
        $.ajax({
            type: "POST",
            data:{
                _token:csrf,
                ad_id:ad_id
            },
            url: "{{route('advertisement.click')}}",
            success: function(data)
            {
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){

        // ----Footer Events Subscribe------
        $(document).on('click','.footer_event',function(e){
            e.preventDefault();
            var type = $("#event_subscribe").val();
            var email = $("#subscribe-email").val();

            $.ajax({
                url : '{{route("subscribe_newsletters")}}',
                type : "POST",
                data : {type:type,email:email, _token:"{{csrf_token()}}"},
                beforeSend: function() {
                    $('#spinner').css('display','inline-block');
                    $('.footer_event').prop('disabled', true);
                },
                success : function (data)
                {
                    $('#spinner').css('display','none');
                    $('.footer_event').prop('disabled', false);

                    if(data.errors){
                        if(data.errors.email){
                            // $("#email-error").addClass("invalid-feedback");
                            // $(".invalid-feedback").css('display','block');
                            $("#email-error").html(data.errors.email);
                            $("#success_event").css('display','none');
                            $("#footer_subscirbed_already").css('display','none');
                        }
                    }
                    if(data.success){

                        $("#email-error").html('');
                        $("#subscribe-email").val('');
                        $("#success_event").css('display','block');
                        $("#success_event").html(data.success);
                        $("#footer_subscirbed_already").css('display','none');
                        // $(".invalid-feedback").html(data.errors.email);
                    }
                    if(data.subscribed){
                        $(".success-event").css('display','none');
                        $("#success_event").css('display','none');
                        $("#email-error").html('');
                        $("#subscribe-email").val('');
                        // $("#footer_subscirbed_already").addClass('subscirbed_already');s
                        $("#footer_subscirbed_already").css('display','block');
                        $("#footer_subscirbed_already").html(data.subscribed);
                        // $(".invalid-feedback").html(data.errors.email);
                    }
                }
            });
        });
        // ----Events END-----
        // ----Events Subscribe------
        $(document).on('click','.event_submit',function(e){
            e.preventDefault();
            var type = $(".event_subscribe").val();
            var email = $(".subscribe_email").val();
            $.ajax({
                url : '{{route("subscribe_newsletters")}}',
                type : "POST",
                data : {type:type,email:email, _token:"{{csrf_token()}}"},
                beforeSend: function() {
                    $('#spinner-event').css('display','inline-block');
                    $('.event_submit').prop('disabled', true);
                },
                success : function (data)
                {
                    console.log("event");
                    $('#spinner-event').css('display','none');
                    $('.event_submit').rop('disabled', false);
                    if(data.errors){
                        if(data.errors.email){
                            // $(".subscribe_email").addClass('is-invalid');
                            $("#event_error").css('display','block');
                            $("#event_error").html(data.errors.email);
                            $(".success-event").css('display','none');
                            $(".subscirbed_already").css('display','none');
                        }
                    }
                    if(data.success){
                        console.log(5456);

                        // $(".subscribe_email").removeClass('is-invalid');
                        $("#event_error").html('');
                        $(".subscribe_email").val('');
                        $(".success-event").css('display','block');
                        $(".success-event").html(data.success);
                        $(".subscirbed_already").css('display','none');
                        // $(".invalid-feedback").html(data.errors.email);
                    }
                    if(data.subscribed){
                        $(".success-event").css('display','none');
                        // $(".subscribe_email").removeClass('is-invalid');
                        $("#event_error").html('');
                        $(".subscribe_email").val('');
                        $(".subscirbed_already").css('display','block');
                        $(".subscirbed_already").html(data.subscribed);
                        // $(".invalid-feedback").html(data.errors.email);
                    }
                }
            });
        });
        // ----Events END-----

        $(document).on('click','.event_newsletter_submit',function(e){
            e.preventDefault();
            var type = $(".event_subscribe").val();
            var email = $(".subscribe_email").val();
            $.ajax({
                url : '{{route("subscribe_newsletters")}}',
                type : "POST",
                data : {type:type,email:email, _token:"{{csrf_token()}}"},
                beforeSend: function() {
                    $('#spinner-economic').css('display','inline-block');
                    $('.event_newsletter_submit').prop('disabled', true);
                },
                success : function (data)
                {
                    $('#spinner-economic').css('display','none');
                    $('.event_newsletter_submit').prop('disabled', false);
                    if(data.errors){
                        if(data.errors.email){
                            // $(".subscribe_email").addClass('is-invalid');
                            $("#event_error").css('display','block');
                            $("#event_error").html(data.errors.email);
                            $(".success-event").css('display','none');
                            $(".subscirbed_already").css('display','none');
                        }
                    }
                    if(data.success){
                        // $(".subscribe_email").removeClass('is-invalid');
                        $("#event_error").html('');
                        $(".subscribe_email").val('');
                        $(".success-event").css('display','block');
                        $(".success-event").html(data.success);
                        $(".subscirbed_already").css('display','none');
                        // $(".invalid-feedback").html(data.errors.email);
                    }
                    if(data.subscribed){
                        console.log(5456);
                        $(".success-event").css('display','none');
                        // $(".subscribe_email").removeClass('is-invalid');
                        $("#event_error").html('');
                        $(".subscribe_email").val('');
                        $(".subscirbed_already").css('display','block');
                        $(".subscirbed_already").html(data.subscribed);
                        // $(".invalid-feedback").html(data.errors.email);
                    }
                }
            });
        });
    });

</script>

<!-- events-slide -->
<script>
    $(document).ready(function() {
        $("#news-slider").owlCarousel({
            items : 2,
            itemsDesktop : [1199,2],
            itemsMobile : [600,1],
            pagination :true,
            autoPlay : true
        });



    });




</script>

</body>
</html>
<?php

/*
session_destroy();
header("Location:https://algeriainvest.com/");
*/
?>