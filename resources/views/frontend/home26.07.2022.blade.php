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


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/6.0.0/css/font-awesome.min.css">
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
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/mon-style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/style_headd.css')}}">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/new_style.css')}}">
 




 

    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/toastr.min.css')}}">
  



  

</head>

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


</head>

<body class="chrome chrome89 win desktop" cz-shortcut-listen="true" style="overflow-x: hidden">
<?php
if (!isset($_COOKIE['count'])) {
//echo " En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies";
$cookie = 1;
setcookie("count", $cookie); ?>




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
<div class="container-fluid caroussel-contain" style="background-color:transparent">
    <!--<span class="light-transparent"></span> -->




    <div class="row" >

        <section  id="slideshow">

            <div class="slider">
                <div class="content">
                    <div class="slideh current">
                        <div class="content col-sm-3 col-xs-3" >
                            <h5 class="head" style="color:#000000; background-color:#ffffff">@lang('home.invest_algeria')</h5>
                            <p class="text_head " style="color:#ffffff;font-weight:bolder;font-size:60px"> @lang('home.home_slide_text1') </p>

                            <br>
                            <br>
                            <center>
                                <div class="">
                                    <ul>
                                        <li>
                                            <a class="btn_head" href="{{ route('about')}}" class="genric-btn success radius" style="background-color:#4e7cbe!important;cursor:pointer!important;float:left;font-weight:bold" >
                                                @lang('home.view_more')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </center>
                        </div>

                    </div>



                    <div class="slideh">
                        <div class="content col-sm-3 col-xs-3">
                            <h5 class="head" style="color:#000000; background-color:#ffffff">@lang('our_services.assistance_services')</h5>
                            <p  class="text_head col-sm-9 col-xs-9" style="color:#ffffff;font-weight:bolder;font-size:60px">  @lang('home.home_slide_text2-1') <br> @lang('home.home_slide_text2-2')  <br> @lang('home.home_slide_text2-3') </p>
                            <br>
                            <br>
                            <center>
                                <div class="" style='position:absolute!important'>
                                    <ul>
                                        <li>
                                            <a class="btn_head" href="{{route('our-services')}}" class="genric-btn success radius" style="background-color:#4e7cbe!important;cursor:pointer!important;float:left"  >
                                                @lang('home.view_more')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </center>
                        </div>

                    </div>




                    <div class="slideh">
                        <div class="content">
                            <h5 class="head" style="color:#000000; background-color:#ffffff">@lang('navbar.businessOpportunities')</h5>
                            <p  class="text_head col-sm-6 col-xs-6" style="color:#ffffff;font-weight:bolder;font-size:60px"> @lang('home.home_slide_text3') </p>
                            <br>
                            <br>
                            <center>
                                <div class="">
                                    <ul>
                                        <li>
                                            <a class="btn_head" href="{{route('business-opportunity')}}"class="genric-btn success radius" style="background-color:#4e7cbe!important;cursor:pointer!important;float:left" >
                                                @lang('home.view_more')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </center>
                        </div>
                    </div>


                    <div class="slideh">
                        <div class="content col-sm-3 col-xs-3">
                            <h5 class="head" style="color:#000000; background-color:#ffffff">@lang('home.premium')</h5>
                            <p  class="text_head col-sm-9 col-xs-9" style="color:#ffffff;font-weight:bolder;font-size:60px">  @lang('home.home_slide_text4-1') <br>
                            @lang('home.home_slide_text4-2') <br>
                            @lang('home.home_slide_text4-3') </p>
                            <br>
                            <br>
                            <center>
                                <div class="" style='position:absolute!important'>
                                    <ul>
                                        <li>
                                            <a class="btn_head" href="{{route('premium-news-list')}}" class="genric-btn success radius" style="background-color:#4e7cbe!important;cursor:pointer!important;float:left"  >
                                                @lang('home.view_more')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </center>
                        </div>
                    </div>


                </div>
            </div>

            <div class="onoffswitch">
                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                <!--<label class="onoffswitch-label" for="myonoffswitch">Auto</label> -->
            </div>

            <div class="buttons d-sm-block d-xs-block">
                <button id="prev"><i class="fas fa-arrow-left"></i></button>
                <button id="next"><i class="fas fa-arrow-right"></i></button>
            </div>

        </section>

        <div class="col-md-12" style="bottom: 45px;z-index: 2;background-color:transparent">

            <section class="services" >
                <div class="service-item-container">
                    <div class="service-item" >
                        <div class="bar"></div>
                        <div class="item">
                            <img src="http://www.algeriainvest.com/storage/uploads/services/service1_new.jpg" style="height:35%;width:100%;border-top-left-radius: 10px 10px;border-top-right-radius:10px 10px;" fill="none" alt="eco-news">
                        </div>
                        <div class="service-icon"><div class="icon"> <img src="{{asset('storage/uploads/graphs/graph-1.png')}}" style="width:50px;height:50px;margin:10px" alt="eco-news" class="img-fluid eco-news-img"></div></div>
                            <br>

                        <div class="p-20 pt-30" style="margin-left:20px">
                          <div style="height:40px">  <h6 class="font-weight-bold" style="font-weight: 700;line-height: 1.4;">@lang('home.service_title1') </h6> </div>
                            <br>
                            <h6 style="margin-left:20px!important;color:#66788a;font-size:0.8rem;font-family:Poppins;font-weight: 400;line-height: 2"> @lang('home.service1_list1')  <br> @lang('home.service1_list2')  <br> @lang('home.service1_list3') </h6>
                            <br>
                            <br>

                            <a class="genric-btn success radius" href="{{route('our-services')}}" style="margin-left:20px">   @lang('home.view_more') ➞ </a> <br>
                        </div>

                    </div>
                    <div class="service-item">
                        <div class="bar"></div>
                        <div class="item">
                            <img src="http://www.algeriainvest.com/storage/uploads/services/service2_new.jpg" style="height:35%;width:100%;border-top-left-radius: 10px 10px;border-top-right-radius:10px 10px;" fill="none" alt="eco-news">
                        </div>

                        <div class="service-icon"><div class="icon"> <img src="{{asset('storage/uploads/graphs/graph-2.png')}}" style="width:50px;height:50px;margin:10px" alt="eco-news" class="img-fluid eco-news-img"></div></div>
                       <br>
                        <div class="p-20 pt-30" style="margin-left:20px">
                        <div style="height:40px"> <h6 class="font-weight-bold"  style="font-weight: 700;line-height: 1.4;"> @lang('home.service_title2') </h6>  </div> 
                            <br>
                            <h6 style="margin-left:20px!important;color:#66788a;font-size:0.8rem;font-family:Poppins;font-weight: 400;line-height: 2">@lang('home.service2_list1')  <br>  @lang('home.service2_list2') <br> @lang('home.service2_list3') </h6>
                            <br>
                            <br>
                            <a  class="genric-btn success radius" href="{{route('our-services')}}" style="margin-left:20px">   @lang('home.view_more') ➞ </a>
                        </div>
                    </div>
                    <div class="service-item">
                        <div class="bar"></div>
                        <div class="item">

                            <img src="http://www.algeriainvest.com/storage/uploads/services/service3.jpg" style="height:35%;width:100%;border-top-left-radius: 10px 10px;border-top-right-radius:10px 10px;" fill="none" alt="eco-news">
                        </div>
                        <div class="service-icon"><div class="icon"> <img src="{{asset('storage/uploads/graphs/graph-3.png')}}" style="width:50px;height:50px;margin:10px" alt="eco-news" class="img-fluid eco-news-img"></div></div>
                        <br>
                        <div class="p-20 pt-30" style="margin-left:20px">
                        <div style="height:40px"> <h6 class="font-weight-bold"  style="font-weight: 700;line-height: 1.4;"> @lang('home.service_title3') </h6>  </div>
                            <br>
                            <h6 style="margin-left:20px!important;color:#66788a;font-size:0.8rem;font-family:Poppins;font-weight: 400;line-height: 2">@lang('home.service3_list1') <br> @lang('home.service3_list2') <br> @lang('home.service3_list3')</h6>
                            <br>
                            <br>
                            <a  class="genric-btn success radius" href="{{route('our-services')}}" style="margin-left:20px">   @lang('home.view_more') ➞ </a>
                        </div>
                    </div>

                    <div class="service-item">
                        <div class="bar"></div>
                        <div class="item">
                            <img src="http://www.algeriainvest.com/storage/uploads/services/service4.jpg" style="height:35%;width:100%;border-top-left-radius: 10px 10px;border-top-right-radius:10px 10px;" fill="none" alt="eco-news">
                        </div>

                        <div class="service-icon"><div class="icon"> <img src="{{asset('storage/uploads/graphs/graph-4.png')}}" style="width:50px;height:50px;margin:10px" alt="eco-news" class="img-fluid eco-news-img"></div></div>
                        <br>
                        <div class="p-20 pt-30" style="margin-left:20px">
                        <div style="height:40px"> <h6 class="font-weight-bold"  style="font-weight: 700;line-height: 1.4;"> @lang('home.service_title4') </h6> </div>
                            <br>
                            <h6 style="margin-left:20px!important;color:#66788a;font-size:0.8rem;font-family:Poppins;font-weight: 400;line-height: 2">@lang('home.service4_list1') <br> @lang('home.service4_list2')  <br> @lang('home.service4_list3') </h6>
                            <br>
                            <br>
                            <a  class="genric-btn success radius" href="{{route('our-services')}}" style="margin-left:20px">   @lang('home.view_more') ➞ </a>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>


<!-- Nwes slider End -->

<!--
@if(!$news->isEmpty())
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="mine-news d-flex justify-content-between align-items-center breaking-news " >
                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center  py-2  px-1 news" style="background-color:#e8e8e8">
                    <span class="d-flex align-items-center"></span></div>
                <div id="ticker-roll" class="ticker  hidden-sm hidden-xs ">
                    <div class="header-flash__title d-sm-block" style="color:#dc4e40">

                        @lang('home.economic_news')
            </div>

            <ul class="rollnews">

@foreach($news->slice(0, 20) as $news)
        <li> <a href="{{route('news-detail', [$news->page_key])}}" target="_blank"> {{$news->localeAll[0]->title}}</a></li>

                        @endforeach
            </ul>

        </div>


<!--  <div class="heading-with-arrow mine-newsbutton">
					<a href="{{route('news-list')}}" class="more-data">@lang('home.view_more') +</a>
					</div>
				-->
    <!--  </div>
  </div>
</div>
</div> -->

@endif
<!-- news-ticker  -->
<style>
    #ticker-roll:hover{
        animation: step-end;
    }

    #ticker-roll:active{
        animation: step-end;
    }
    .ticker {
        margin: 0;
        height: 56px!important;
        padding: 20px;
        width: 100%;
        text-align: left;
        position: absolute;
        overflow: hidden;


    }
    .rollnews li a{
        color:black;
        font-weight:bold;

    }
    .ticker ul {
        width: 100%;
        position: sticky;
        margin: auto;
        text-align:center;
    }

    .ticker ul li {
        width: 100%;
        display: none;
    }

    @media (max-width: 222px) {
        #ticker-roll {
            display: none !important;
        }
    }



    .header-flash__title{

        font-weight: bold;
        color: red;
        border-right: 1px solid grey;
        padding-right: 10px;
        position: absolute;

        top: 20px;
    }

    @media only screen and (max-width: 992px) {
        /* line 1, C:/Users/HP/Desktop/jun-2020/281.Magazine_News/assets/scss/_video_area.scss */
        .header-flash__title {
            display: none!important;
        }
    }

    @media only screen and (max-width: 992px) {
        /* line 1, C:/Users/HP/Desktop/jun-2020/281.Magazine_News/assets/scss/_video_area.scss */
        .ticker ul {

            text-align:left;

        }
    }

    @media only screen and (max-width: 769px) {
        /* line 1, C:/Users/HP/Desktop/jun-2020/281.Magazine_News/assets/scss/_video_area.scss */
        .ticker {

            padding: 10px;
            padding-right:2px;



        }
    }
</style>
<!-- ticker-script -->
<script>

    /**
     * jQuery simple Ticker plugin
     *
     * Copyright (c) 2012 miraoto
     * Dual licensed under the MIT and GPL licenses:
     * http://www.opensource.org/licenses/mit-license.php
     * http://www.gnu.org/licenses/gpl.html
     *
     */

    /**
     * ticker plugin
     *
     * @name $.simpleTiecker();
     * @cat Plugins/Preload
     * @author miraoto
     *
     * @example $.simpleTiecker();
     * @desc default setting
     */
    (function($) {
        $.simpleTicker =function(element, options) {
            var defaults = {
                speed : 1200,
                delay : 5000,
                easing : 'swing',
                effectType : 'slide',
                type: 'horizontal'
            }

            var param = {
                'ul' : '',
                'li' : '',
                'initList' : '',
                'ulWidth'  : '',
                'liHeight' : '',
                'tickerHook' : 'tickerHook',
                'effect' : {}
            }

            var plugin = this;
            plugin.settings = {}

            var $element = $(element),
                element = element;

            plugin.init = function() {
                plugin.settings = $.extend({}, defaults, options);
                param.ul = element.children('ul');
                param.li = element.find('li');
                param.initList = element.find('li:first');
                param.ulWidth  = param.ul.width();
                param.liHeight = param.li.height();

                element.css({height:(param.liHeight)});
                param.li.css({top:'0',left:'0',position:'absolute'});

                //dispatch
                switch (plugin.settings.effectType) {
                    case 'fade':
                        plugin.effect.fade();
                        break;
                    case 'roll':
                        plugin.effect.roll();
                        break;
                    case 'slide':
                        plugin.effect.slide();
                        break;
                }
                plugin.effect.exec();
            }

            plugin.effect = {};

            plugin.effect.exec = function() {
                param.initList.css(param.effect.init.css)
                    .animate(param.effect.init.animate,plugin.settings.speed,plugin.settings.easing)
                    .addClass(param.tickerHook);
                if (element.find(param.li).length > 1) {
                    setInterval(function(){
                        element.find('.' + param.tickerHook)
                            .animate(param.effect.start.animate,plugin.settings.speed,plugin.settings.easing)
                            .next()
                            .css(param.effect.next.css)
                            .animate(param.effect.next.animate,plugin.settings.speed,plugin.settings.easing)
                            .addClass(param.tickerHook)
                            .end()
                            .appendTo(param.ul)
                            .css(param.effect.end.css)
                            .removeClass(param.tickerHook);
                    },plugin.settings.delay);
                }
            }

            plugin.effect.fade = function() {
                param.effect = {
                    'init' : {
                        'css' : {display:'block',opacity:'0'},
                        'animate' : {opacity:'1',zIndex:'98'}
                    },
                    'start' : {
                        'animate' : {opacity:'0'}
                    },
                    'next' : {
                        'css' : {display:'block',opacity:'0',zIndex:'99'},
                        'animate' : {opacity:'1'}
                    },
                    'end' : {
                        'css' : {display:'none',zIndex:'98'}
                    }
                }
            }

            plugin.effect.roll = function() {
                param.effect = {
                    'init' : {
                        'css' : {top:'3em',display:'block',opacity:'0'},
                        'animate' : {top:'0',opacity:'1',zIndex:'98'}
                    },
                    'start' : {
                        'animate' : {top:'-3em',opacity:'0'}
                    },
                    'next' : {
                        'css' : {top:'3em',display:'block',opacity:'0',zIndex:'99'},
                        'animate' : {top:'0',opacity:'1'}
                    },
                    'end' : {
                        'css' : {zIndex:'98'}
                    }
                }
            }


            plugin.effect.slide = function() {
                param.effect = {
                    'init' : {
                        'css' : {left:(200),display:'block',opacity:'0'},
                        'animate' : {left:'0',opacity:'1',zIndex:'98'}
                    },
                    'start' : {
                        'animate' : {left:(-(200)),opacity:'0'}
                    },
                    'next' : {
                        'css' : {left:(param.ulWidth),display:'block',opacity:'0',zIndex:'99'},
                        'animate' : {left:'0',opacity:'1'}
                    },
                    'end' : {
                        'css' : {zIndex:'98'}
                    }
                }
            }

            plugin.init();
        }

        $.fn.simpleTicker = function(options) {
            return this.each(function() {
                if (undefined == $(this).data('simpleTicker')) {
                    var plugin = new $.simpleTiecker(this, options);
                    $(this).data('simpleTicker', plugin);
                }
            });
        }
    })(jQuery);

</script>
<script>
    $(function(){

        $.simpleTicker($("#ticker-roll"),{'effectType':'roll'});


    });
</script>




<br>
<div id="div-content" >
    <section class="algeria-home">
        <div class="container" style="padding-left:0;padding-right:20px">
            <div class="title-headings">
                <center><img src="{{asset('storage/uploads/premium_news/premium_logo.jpg')}}" style="width:30px;height:30px"></center>
                <br>
                <a href="{{route('business-opportunity')}}"> <h6 class="subtitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@lang('business_opportunity_listing.breadcrumb_business_opportunities')</font></font></h6> </a>
                <br>
                <a href="{{route('business-opportunity')}}">  <h2 class="title";style="color:#092a49"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@lang('home.section_title1') </font></font></h2> </a>
            </div>
            <br>
            <br>
            <div class="row">

                @foreach($business_opportunities->slice(0,3) as $business_opportunity)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <figure class="snip0019">
                            <span class="light-transparent"></span>
                            <img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" style="height:100%;" alt="eco-news" class="img-fluid eco-news-img">
                            <figcaption>
                                <h5 id="title_pre" style="position:absolute;color:#ffffff;font-weight:bold;font-size:18px; top:80%;left:10px;"> {{ str_limit(html_entity_decode(strip_tags($business_opportunity->localeAll[0]->project_title)),90,'...') }} </h5>
                                <div><h2 style="color:#ffffff;font-size:16px; left:0;font-weight:bold">  {{ str_limit(html_entity_decode(strip_tags($business_opportunity->localeAll[0]->project_description)),150,'...') }}</h2></div>
                                <div><p><a href="{{route('business-opportunity-details', ['sector_id' => $business_opportunity->sectors[0]->page_key,'id' => $business_opportunity->page_key ])}}"class="genric-btn success radius">
                                            @lang('home.view_more') ➞
                                        </a></p></div>
                                <a href="#"></a>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach



            </div>
            <br>
            <br>
            <br>
       
    </section>



</div>

<br>

<br><br><br><br>

<div class="about">

    <div class="container">
        <div class="row">

            <h2 class="pt-50" style="font-size:33px; width: 100%; display: block; text-align: center;">

            </h2>




            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                <div class="agency-video-wrapper">
                    <div class="box-hover-effect tm-sc-video-popup tm-sc-video-popup-button-over-image mb-30">
                        <div class="effect-wrapper">
                            <div class="thumb">
                                <img class="img-fullwidth" src="http://algeriainvest.com/storage/uploads/video/video.jpg" alt="images">
                            </div>
                            <a class="popup-youtube iteme" href="https://www.youtube.com/watch?v=yR7fRmVJYBI"> <div class="animated-css-play-button">  <span class="play-icon"><i class="fa fa-play"></i></span></div></a>

                            <script type="text/javascript">
                                /* $(window).on('load', function() {
                                     $('#myModal').modal('show');
                                 });*/

                                $('.modal').on('hide.bs.modal', function() {
                                    var memory = $(this).html();
                                    $(this).html(memory);
                                });
                            </script>
                            <!--<a class="hover-link" data-lightbox-gallery="youtube-video" href="https://www.youtube.com/watch?v=yR7fRmVJYBI" title=""></a> -->
                        </div>
                    </div>
                    <div class="about-box style3">
                        <div class="help-details" style="border-left: 5px solid #0795fe;">
                            <div class="icon"><img src="{{asset('storage/uploads/logos/i2b_logo.png')}}" style="height: 50px;" ></div>
                            <div class="content">
                               <a href="{{route('about')}}">  <h5 class="titles3" >@lang('home.discover_us')</h5></a>

                            </div>
                        </div>
                    </div>
                </div>




            </div>

            <script>
                $(document).ready(function() {
                    $('.popup-youtube').magnificPopup({
                        type: 'iframe',
                       
                        mainClass: 'mfp-fade',
                         removalDelay: 160,
                        preloader: false,
                        fixedContentPos: true
                    });
                });

            </script>
            
          


            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h6 class="subtitle text-white ml-30" style="text-align:left;font-weight:800"> @lang('home.our_certifications')</h6>
                <br>
                <h3 class=" text-white ml-30" style="text-align:left;font-weight:650"> @lang('home.qhse')</h3>
                <br>
                <br>
                <br>
                <div class="agency-wrapper ml-30">

                    <div class="tm-sc-icon-box icon-box icon-left text-start iconbox-centered-in-responsive iconbox-theme-colored1 icon-position-icon-left pb-40 mb-40 border-bottom-light">
                        <div class="icon-box-wrapper">
                            <a class="icon icon-type-font-icon mt-10 me-4"> <img src="{{asset('storage/uploads/logos/icon1.png')}}" alt="11.png"> </a>
                            <div class="icon-text">
                                <a href="{{route('qhse')}}">   <h5 class="icon-box-title text-white mt-0" style="    font-family: Mulish, sans-serif ;font-weight: 700;line-height: 1.4; margin-bottom: 1rem;">Original cycle Start</h5> </a>
                                <div class="content">
                                    <a href="{{route('qhse')}}">  <p data-tm-text-color="#cccbcb" style="color:#cccbcb">ISO 9001 V2008, ISO 14001 V2004, OHSAS 18001 V2007</p> </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tm-sc-icon-box icon-box icon-left text-start iconbox-centered-in-responsive iconbox-theme-colored1 icon-position-icon-left pb-40 mb-40 border-bottom-light">
                        <div class="icon-box-wrapper">
                            <a class="icon icon-type-font-icon mt-10 me-4"> <img src="{{asset('storage/uploads/logos/icon2.png')}}" alt="11.png"> </a>
                            <div class="icon-text">
                                <a href="{{route('qhse')}}">   <h5 class="icon-box-title text-white mt-0" style="    font-family: Mulish, sans-serif ;font-weight: 700;line-height: 1.4; margin-bottom: 1rem;">@lang('home.transition + renewal')</h5> </a>
                                <div class="content">
                                    <a href="{{route('qhse')}}">    <p data-tm-text-color="#cccbcb"  style="color:#cccbcb">ISO 9001 V2015, ISO 14001 V2015, OHSAS 18001 V2007</p> </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tm-sc-icon-box icon-box icon-left text-start iconbox-centered-in-responsive iconbox-theme-colored1 icon-position-icon-left border-bottom-dark">
                        <div class="icon-box-wrapper">
                            <a class="icon icon-type-font-icon mt-10 me-4"> <img src="{{asset('storage/uploads/logos/icon3.png')}}" alt="12.png"> </a>
                            <div class="icon-text">
                                <a href="{{route('qhse')}}">   <h5 class="icon-box-title text-white mt-0"  style="font-family: Mulish, sans-serif ;font-weight: 700;line-height: 1.4; margin-bottom: 1rem;">@lang('home.renewal')</h5> </a>
                                <div class="content">
                                    <a href="{{route('qhse')}}">    <p data-tm-text-color="#cccbcb"  style="color:#cccbcb">ISO 9001 V2015, ISO 14001 V2015</p> </a>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>





            </div>






        </div>

    </div>
</div>
</div>

<style>
    .about{
        background: url("http://algeriainvest.com/storage/uploads/about/about_section.jpg") center right 100% no-repeat;
        background-attachment:scroll;
        position:relative;
        background-size:cover;



        box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;
        padding-bottom: 56px;
    }

    .border-bottom-light {
        border-bottom: 1px solid rgba(255, 255, 255, 0.102);
    }
    .icon-box {
        position: relative;
        z-index: 0;
        transition: all 0.5s ease;
    }
    .pb-40 {
        padding-bottom: 40px !important;
    }
    .mb-40 {
        margin-bottom: 40px !important;
    }
    .text-start {
        text-align: left!important;
    }
    figure{
        transition: 0.3s;
    }
    figure:hover{
       /* transform: scale(1.1);*/
    }
</style>
<br>
<br>
<br>


<br>
<br>
<br>
<br>

<div id="div-content" >
    <section class="algeria-home">
        <div class="container" style="padding-left:0;padding-right:20px">
             <div class="title-headings">
                <center><img src="{{asset('storage/uploads/premium_news/premium_logo2.jpg')}}" style="width:30px;height:30px"></center>
                <br>
                <a href="{{route('premium-news-list')}}">  <h6 class="subtitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@lang('home.premium')</font></font></h6>  <a href="{{route('business-opportunity')}}"> 
                <br>
                <a href="{{route('premium-news-list')}}"> <h2 class="title";style="color:#092a49"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@lang('home.section_title2')  </font></font></h2> </a>
            </div>
            <br>
            <br>
            @if(!Auth::guard('customer')->check())
            <div class="row"  style=""   onclick="pageRedirect('{{route('premium-news_free-detail', [$news->page_key])}}')">
              @foreach($premium_news->slice(0,4) as $news)
                <div class="premium_section col-sm-6 col-md-3" style="">
                <a href="{{route('premium-news_free-detail', [$news->page_key])}}" >   <figure class="snip1312">
                            <div class="image" style="height: 100%;width:140%" ><img src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="pr-sample11" style="height: 100%"/></div>
                            <figcaption>
                                <div class="date">    
                                    <ul class="tags-top" style="">
                                            @foreach($news->sectors as $sector)
                                                @break($loop->iteration == 2)
                                                    <li>
                                                        <a href="{{route('premium-news_free-detail', [$news->page_key])}}" class="yellow-box">{{$sector->localeAll[0]->name}}</a>
                                                        
                                                    </li>
                                            @endforeach
                                    </ul>
                                </div>
                                <br>
                            

                                <p>
                                {{ str_limit(html_entity_decode(strip_tags($news->localeAll[0]->title)),82,'...') }} 
                               
                                </p>
                                <footer>
                                <i class="fa fa-calendar" style="color:#ffffff" aria-hidden="true"></i>
                                {{Carbon\Carbon::parse($news->insertion_date)->isoFormat('LL')}}</a>
                                </footer>
                            </figcaption>
                        </figure> </a>
                   

                </div>  
             
              @endforeach
            </div>
            @else
            <div class="row"  style=""  onclick="pageRedirect('{{route('premium-news-detail', [$news->page_key])}}')">
              @foreach($premium_news->slice(0,4) as $news)
                <div class="premium_section col-sm-6 col-md-3" style="">
                <a href="{{route('premium-news-detail', [$news->page_key])}}" >  <figure class="snip1312">
                            <div class="image" style="height: 100%;width:140%" ><img src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="pr-sample11" style="height: 100%"/></div>
                            <figcaption>
                                <div class="date">    
                                    <ul class="tags-top" style="">
                                            @foreach($news->sectors as $sector)
                                                @break($loop->iteration == 2)
                                                    <li>
                                                        <a href="{{route('premium-news-detail', [$news->page_key])}}" class="yellow-box">{{$sector->localeAll[0]->name}}</a>
                                                        
                                                    </li>
                                            @endforeach
                                    </ul>
                                </div>
                                <br>
                            
                                <p>
                                
                                {{ str_limit(html_entity_decode(strip_tags($news->localeAll[0]->title)),82,'...') }} 
                                </p>
                                <footer>
                                <i class="fa fa-calendar" style="color:#ffffff" aria-hidden="true"></i>
                                {{Carbon\Carbon::parse($news->insertion_date)->isoFormat('LL')}}</a>

                                </footer>
                            </figcaption>
                        </figure> </a>
                   

                </div>  
             
              @endforeach
            </div>
            @endif
        </div>      
   
  </section>
</div>
  



</div>


<br>




<br>
<br>
<br>
<br>

<div class="page-content" style="background: linear-gradient(#e8e8e8, #e8e8e8)">
<div class="container" style="max-width:1170px;background-color:transparent">
<div class="row" style="background: transparent; left:5px;right:5px;padding-top: 120px;padding-top: 120px;padding-bottom:50px;">
 
        <div class="col-lg-5 col-xl-5 col-sm-12">
           
              <div class="about-box style2">
              <div class=" tm-sc-video-popup tm-sc-video-popup-button-over-image mb-30">
                        <div class="effect-wrapper">
                  
                        <div class="box-hover-effect tm-sc-video-popup tm-sc-video-popup-button-over-image mb-30">
                           <div class="effect-wrapper">
                            <div class="thumb">
                            <img class="img-fullwidth box-hover-effect" style="width:100%" src="{{asset('storage/uploads/video_presse/presse1907.jpg')}}">
                            </div>
                          </div>
                        </div>
                  <a class="popup-youtube iteme" href="https://www.youtube.com/watch?v=6oE6PuUzJg0">  <div class="animated-css-play-button" style="left:50%!important">  <span class="play-icon"><i class="fa fa-play"></i></span></div>
                </a>
            </div>
          </div>

                  
              
                <div class="help-details d-block" style="border-left: 5px solid #0795fe;">
               
                  <div class="content" >
                <div class="icon"> <h5 style="text-transform: uppercase;">Last Interview </h5></div>   
                     <font size="3rem"><b>  Mehmet OFLAZ  </b></font> </br>
                    <h4 class="hd-subtitle"> Director - Conmach Dış Ticaret Limited Şirketi </h4>
                    <br>
                   <center> <font size="2rem"style="font-weight:bold;color:#0795fe"> Exclusivité Algeria INVEST®<br></font> </center>
                  
             
                  </div>
                </div>
              </div>
              <br>
            <br>
            </div>
            <div class="col-lg-7 col-xl-7 col-sm-12">
            
              <div class="about-box-contents" style="margin-top: -6px;">
                <div class="destails">
              

                
                
                 <a href="{{route('videos_press')}}">   <h6 class="subtitle" style="text-align:left;    line-height: 1.4;margin-bottom: 1rem; margin-top: 0.75rem;">@lang('home.press_title')</h6> </a>
              
                 <a href="{{route('videos_press')}}">   <h3 class="title" style="text-align:left;font-weight: 800; line-height: 1.3; color: #092a49;"> Les interviews <br> by AlgeriaInvest</h3> </a>
          
                 <br>
             
                
                </div>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                       <!-- <ol class="carousel-indicators" style="bottom:170px">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol> -->
                        <div class="carousel-inner" style="height:70%">

                          
                            <div class="carousel-item active">
                                <iframe class="video-player d-block w-100" width="120%" data-video-id="qT3XZbwcorY" height="70%" src="https://www.youtube.com/embed/qT3XZbwcorY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>

                            <div class="carousel-item">
                                <iframe class="video-player d-block w-100" width="120%" data-video-id="cUABMUwym8U" height="70%" src="https://www.youtube.com/embed/IPgZYaqbHUQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>

                            <div class="carousel-item">
                                <iframe class="video-player d-block w-100" width="120%" data-video-id="tpoPgRwPlQY" height="70%" src="https://www.youtube.com/embed/cn_4IBPUiBw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>

                            <div class="carousel-item">
                                <iframe class="video-player d-block w-100" width="120%" data-video-id="U3u7LpoQLlI" height="70%" src="https://www.youtube.com/embed/U3u7LpoQLlI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>

                            <div class="carousel-item">
                                <iframe class="video-player d-block w-100" width="120%" data-video-id="tpoPgRwPlQY" height="70%" src="https://www.youtube.com/embed/4mwbsgKwP_c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                    <br>
                </div>
                </div> 
                <br>
              <br>           
              </div>   
                     
            </div>        
          </div>      
        </div>     
      </div>
    </div> 
                                </div>
                                </div>                     
<style>
     @media only screen and (max-width: 992px) {
       
        .about-box-contents{

            height: max-content;

        }
        .title{
            font-size:20px!important;
        }
    }

    </style>
  


  <div class="about_event">

<div class="container"  style="padding-left:0;padding-right:20px">

    <div class="row event">

        <h2 class="pt-80 pb-80" style="font-size:33px; width: 100%; display: block; text-align: center;">

        </h2>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           
       <!-- <center> <div class="service-icon" style="background: #4e7cbe;border-radius: 12%;height: 150px;left: auto;line-height: 75px;    position: sticky;;right: 30px;top: 105px;width: 150px;transition: all 0.4s ease-in-out;"><div class="icon"> <img src="{{asset('storage/uploads/graphs/graph-6.png')}}" style="width:50px;height:50px;margin:10px" alt="eco-news" class="img-fluid eco-news-img"></div></div> </center> -->
        <center>   <a href="{{route('event-list')}}">   <div class="service-icon_event" style="background: #4e7cbe;border-radius: 12%;height: 150px;left: auto;line-height: 75px;    position: sticky;;right: 30px;top: 105px;width: 150px;transition: all 0.4s ease-in-out;"><div class="icon"> <img src="http://algeriainvest.com/storage/uploads/graphs/graph-6.png" style="width: 80%;height: 80%;margin: 12px;" alt="eco-news" class="img-fluid eco-news-img"></div></div> </a></center>
        <br>
            <br>
          <a href="{{route('event-list')}}">   <h1 class="text-white ml-30" style="font-family: Mulish, sans-serif;text-align:left;margin-bottom: 1rem;margin-top: 0.75rem;font-weight: 800;font-size: 3.75rem;line-height: 1.3;"><center> @lang('home.section_title3')  </center>  <center>Save the date  </center> <center>Now  </center></h1>  
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>

</div>
</div>

                    <style> 
                    .event:hover .service-icon_event{
                    transform: rotateY(180deg);
                    }

                     .service-icon_event:hover{
                    transform: rotateY(180deg);
                    }

                    .about_event{
                        background: url("http://algeriainvest.com/storage/uploads/about/event_back.jpg") center right 100% no-repeat;
                        background-attachment:fixed;
                        position:relative;
                        background-size:cover;



                        box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;
                        padding-bottom: 56px;
                    }


                    @media only screen and (max-width: 991px) {
                        .text-white {
                            font-size: 35px!important;
                        }
                    }

                    </style>
</div>
<br>
<br>

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

            @media screen and (min-width: 1200px) {
                .carousel-control-prev {
                    height: 280px;
                }
                .carousel-control-next {
                    height: 280px;
                }

                .carousel-control-prev-icon{
                  margin-right:68px;
                }

                .carousel-control-next-icon{
                    margin-left:68px;
                }
            }

            @media screen and (max-width: 1199px) {
                .carousel-control-prev {
                    height: 150px;
                }
                .carousel-control-next {
                    height: 150px;
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

     




<br>
<br>
<br><br>
<br>
<br>
<br>



<div class="container" >
            <div class="row "class="mon-slide" >
               <div class="col-md-12 " style="border:2px solide #000000">
              
             <div class="title-headings">
                <center><img src="{{asset('storage/uploads/home_news_logo/news_icon.png')}}" style="width:30px;height:30px"></center>
                <br>
                <a href="{{route('news-list')}}">  <h6 class="subtitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@lang('navbar.news')</font></font></h6>  <a href="{{route('business-opportunity')}}"> 
                <br>
                <a href="{{route('news-list')}}"> <h2 class="title";style="color:#092a49"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@lang('home.section_title4') </font></font></h2> </a>
            </div>
            <br>
             <br>
             <div id="owl-demo" class="owl-carousel owl-theme d-flex align-items-center">
                 @if(!$home_news->isEmpty())
                   @foreach($home_news->slice(0, 20) as $news)
                        <div class="service-item-container">
                    
                            <div class="service-item" style="width:360px;margin:10px;border-radius:5px;height:auto;box-shadow: 0px 10px 60px 0px rgb(0 0 0 / 10%)">
                             
                                <div class="">
                                <a href="{{route('news-detail', [$news->page_key])}}">   <img class="img_news" src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" style="height: auto;width:100%;height:222px;border-top-left-radius: 10px 10px;border-top-right-radius:5px 5px;border-top-left-radius:5px 5px;" fill="none" alt="eco-news"> </a>
                                </div>
                            
                                    <br>

                                <div class="p-30" style="margin-left:20px">
                                        <div class="entry-meta" style="color:#616870;border-radius:5px;width:100%;height:5%;padding-top:2px;font-size:14px">
                                        
                                                
                                                                                            @foreach($news->sectors as $sectors)
                                                                                                        
                                                                                                        @break($loop->iteration == 2)
                                                                                                        {{$sectors->localeAll[0]->name}}
                                                                                            @endforeach
                                                                                        
                                        </div>
                                    <br>
                                    <h4 class="entry-title text-theme-colored2 mb-30" style="font-size: 26px!important;font-weight: 800;line-height:30px;margin-top: 0;"><a href="{{route('news-detail', [$news->page_key])}}" style="font-size:16px"> {{ str_limit(html_entity_decode(strip_tags($news->localeAll[0]->title)),70,'...') }}  </a> </h4>
                               
                               
                                    <hr style="    border-bottom: 2px solid #eceff8;border-top: 0 none;margin: 20px 0;padding: 0px;width: 100%;">

                                <div class="entry-footer mt-20 d-flex">
                                        <div class="entry-date" style="background-color: #e9eef4;border-radius: 5px;color: #66788a;font-size: 14px; font-family: Mulish, sans-serif;font-weight: 600;height: 35px;line-height: 2.571;text-align: center;width: 125px;"> {{Carbon\Carbon::parse($news->insertion_date)->isoFormat('LL')}}</div>
                                    
                                        <a class="read-more" href="{{route('news-detail', [$news->page_key])}}"><i class="fa fa-arrow-right" aria-hidden="true" style=" color: #0795fe;float:right;font-family: 'Font Awesome 5 Free';font-weight: 900;margin-left: 170px;font-size:20px"></i></a>                      
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                @endforeach
              @endif
              

        </div>
        </div>









            </div>
</div>

<style> 
.service-item:hover img{
    transform: scale(1.01);
  }

  

  
</style>








<br>
<br>
<br><br>
<br>
<br>
<br>







<div id="div-content" style ="border-top:0.5px solid #ddd;padding-top: 60px; padding-bottom:60px" >
    <section class="algeria-home">

        <div class="row  justify-content-center" style="background: linear-gradient(#ffffff, #ffffff);box-shadow: rgb(204, 219, 232)">
         <div class="col-lg-12 col-md-12">
          <!-- <h2 class=" pt-50"style="font-size:33px; width: 100%; text-align: center;font-family: Mulish, sans-serif;font-size: 3.125rem;font-weight: 600;line-height: 1.3;margin-top: -6px;position: relative;z-index: 0;text-align: center;color: #3363a7;">
                @lang('home.partners')
            </h2> -->
        </div> 
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
                                    <center><div class="single-news-slider">
                                        <div class="news-img" style="width: 200px">
                                            <a><img src="{{asset('storage/uploads/partner_logo/'.$partner->logo)}}" ></a>
                                        </div>
                                    </div> </center>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
          <!-- Nes slider End -->
        </div>
    </section>
</div>
        <style> 
           .news-img{
            filter: grayscale(100%);
            opacity: 0.5;
    }

    .news-img:hover{
        filter: none!important;
        opacity: 1;
    }
     


    @media only screen and (min-width: 990px) {
     
    .container_partner{
        max-width: 1500px; 
        width: 1500px;

    }
  }
        </style>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="page-content" >
<div id="div-content" >
    <section class="algeria-home contact">
           <style> 
           .contact{
            background: url('http://algeriainvest.com/storage/uploads/contact/contact_bg.jfif') center right 50%  no-repeat;
            position:sticky;
            background-size:cover;

           }
            
           </style>
                <div class="row contact_row">
                <div class="col-lg-6 col-md-6 col-ms-12">
                    <img src="http://algeriainvest.com/storage/uploads/contact/contact1.png" class="img_contact">
                    <!-- <img src="{{asset('storage/uploads/contact/contact1.png')}}"> -->


                </div>
                    <div class="col-lg-5 col-md-5 col-ms-12">
                           <div class="form_contact" >
                      

                           
                            <form id="contact" action="{{ route('store-inquiry')}}" method="post" role="form" name=""  target="_self" style="border-radius:10px" >
                            @csrf
                                <h1 class="title main-heading mb-3" style="color:#0795fe;font-weight: 800;line-height: 1.3;padding-top:20px">  @lang('inquiry.contact_us')    </h1>
                                <br>
                                            @if( Session::has( 'success' ))
                                            <div class="success-alert-msg">
                                                    {{ Session::get( 'success' ) }}
                                                </div><br>
                                                <style>
                                                    .success-alert-msg {
                                                        color: #35A85E !important;
                                                        font-weight: 700;
                                                        font-size: 1.2rem !important;
                                                        padding-top: 0px;
                                                        position: inherit;
                                                        center: center;
                                                        padding-left: 10px!important;
                                                        background-color: rgba(250,250,250,0.8);
                                                        text-align: -webkit-center;
                                                    }

                                                </style>


                                            @elseif( Session::has( 'error' ))
                                                <div class="danger-alert-msg col-md-12">
                                                    {{ Session::get( 'error' ) }}
                                                </div><br>
                                            @endif
                                <fieldset>
                                        <input type="text" class="form-control @error('username') is-invalid  @enderror" placeholder ="@lang('inquiry.user_name')" id="username" name="username" value="{{ old('username') }}" tabindex="1" required style="background-color: #e9eef4;color: #686a6f;font-size: 0.9rem;width: 100%;border: none" >
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                </fieldset>
                                <fieldset>
                                        <input type="text" class="form-control @error('company') is-invalid  @enderror" placeholder="@lang('inquiry.company') " id="company" name="company" value="{{ old('company') }}" tabindex="2" required style="background-color: #e9eef4;color: #686a6f;font-size: 0.9rem;width: 100%;border: none">
                                            @error('company')
                                            <span class=" invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                </fieldset>
                                <fieldset>
                                        <input type="text" class="form-control @error('job_title') is-invalid  @enderror" placeholder="@lang('inquiry.job_title')" id="jobtitle" name="job_title" value="{{ old('job_title') }}" tabindex="3" required style="background-color: #e9eef4;color: #686a6f;font-size: 0.9rem;width: 100%;border: none">
                                            @error('job_title')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                </fieldset>
                                <fieldset>
                                        <input type="tel" class="form-control @error('phone_number') is-invalid  @enderror" placeholder="@lang('inquiry.phone_number')" id="phone" name="phone_number" value="{{ old('phone_number') }}"  tabindex="4" required style="background-color: #e9eef4;color: #686a6f;font-size: 0.9rem;width: 100%;border: none">
                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                </fieldset>
                                <fieldset>
                                        <input type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="@lang('inquiry.email') " id="email" name="email" value="{{ old('email') }}"  tabindex="5" required style="background-color: #e9eef4;color: #686a6f;font-size: 0.9rem;width: 100%;border: none">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                </fieldset>
                                <fieldset>
                                            <input type="text" class="form-control @error('subject') is-invalid  @enderror" placeholder="@lang('inquiry.subject')" id="subject" name="subject" value="{{ old('subject') }}" required style="background-color: #e9eef4;color: #686a6f;font-size: 0.9rem;width: 100%;border: none">
                                            @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                </fieldset>
                                <fieldset>
                                        <textarea class="form-control @error('message') is-invalid  @enderror" id="message" rows="3" placeholder="@lang('inquiry.message') " name="message" required style="background-color: #e9eef4;color: #686a6f;font-size: 0.9rem;width: 100%;;border: none">{{ old('message') }}</textarea>
                                            @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                </fieldset>
                                <fieldset>
                                    <center>
                                            <div>
                                                <div>
                                                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                                    @if($errors->has('g-recaptcha-response'))
                                                        <span class="invalid-feedback" style="display:block">
                                                            <strong> {{$errors->first('g-recaptcha-response')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>   
                                    </center> 
                                </fieldset>
                                <fieldset>
                                <center> <button href="#contact" value="subscribe" class="genric-btn success radius"   id="btn-validate" style="border: 1px solid white;border-radius: 3px;width: 115px;height: 45px;border-radius:5px">@lang('inquiry.send_message')</button>  </center>
                                </fieldset>
                            </form>
                           </div>
                    </div>
                </div>
            
    </section>
</div>
</div>


    </section>

    <!-- discover algeria home end here -->
    
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

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
            items : 3, //10 items above 1000px browser width
            itemsDesktop : [1000,2], //5 items between 1000px and 901px
            itemsDesktopSmall : [900,2], // betweem 900px and 601px
            itemsTablet: [600,2], //2 items between 600 and 0;
            itemsMobile : [600,1] ,// itemsMobile disabled - inherit from itemsTablet option
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



<script>
    const slides = document.querySelectorAll('.slideh');
    const next = document.querySelector('#next');
    const prev = document.querySelector('#prev');
    const toggle = document.querySelector('#myonoffswitch');
    let auto = true; // Auto scroll
    const intervalTime = 7000;
    let slideInterval;

    const nextSlide = () => {
        // Get current class
        const current = document.querySelector('.current');
        // Remove current class
        current.classList.remove('current');
        // Check for next slide
        if (current.nextElementSibling) {
            // Add current to next sibiling
            current.nextElementSibling.classList.add('current');
        }
        else {
            // Add current to start
            slides[0].classList.add('current');
        }
        setTimeout(() => current.classList.remove('current'));
    }

    const prevSlide = () => {
        // Get current class
        const current = document.querySelector('.current');
        // Remove current class
        current.classList.remove('current');
        // Check for next slide
        if (current.previousElementSibling) {
            // Add current to prev sibiling
            current.previousElementSibling.classList.add('current');
        }
        else {
            // Add current to last
            slides[slides.length - 1].classList.add('current');
        }
        setTimeout(() => current.classList.remove('current'));
    }

    // Button events
    next.addEventListener('click', e => {
        nextSlide();
        if(auto) {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, intervalTime);
        }
    })
    prev.addEventListener('click', e => {
        prevSlide();
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, intervalTime);
    })
    // Auto slide toggle
    toggle.addEventListener('click', e => {
        if ( toggle.checked ) {
            auto = true;
            slideInterval = setInterval(nextSlide, intervalTime);
        } else {
            auto = false;
            clearInterval(slideInterval);
        }
    })

    // Auto slide
    if(auto) {
        slideInterval = setInterval(nextSlide, intervalTime);
    }
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