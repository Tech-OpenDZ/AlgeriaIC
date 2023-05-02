<?php
// On indique au navigateur qu'on utilise l'encodage UTF-8
header('Content-type: text/html; charset=utf-8');

// Param�tres de connexion � la base
define('DB_HOST' , '127.0.0.1');
define('DB_NAME' , 'algeriainvest_v1');
define('DB_USER' , 'algeriainvest_v1');
define('DB_PASS' , 'Toe7huTp2n_ty2Xs');

// Connexion � la base avec PDO
try{
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch(Exception $e) {
    echo "Impossible de se connecter � la base de donn�es '".DB_NAME."' sur ".DB_HOST." avec le compte utilisateur '".DB_USER."'";
    echo "<br/>Erreur PDO : <i>".$e->getMessage()."</i>";
    die();
}






// On pr�pare les donn�es � ins�rer
$ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
$date = date('Y-m-d');           // La date d'aujourd'hui, sous la forme AAAA-MM-JJ

// Mise � jour de la base de donn�es
// 1. On initialise la requ�te pr�par�e

$query = $pdo->prepare("
        INSERT INTO stats_visites (ip , date_visite , pages_vues) VALUES (:ip , :date , 1)
        ON DUPLICATE KEY UPDATE pages_vues = pages_vues + 1
    ");
// 2. On execute la requ�te pr�par�e avec nos param�tres
$visit = $query->execute(array(
    ':ip'   => $ip,
    ':date' => $date
));
//echo $visit;




use App\Http\Controllers\Controller;

use App\Models\Banner;
use App\Models\BannerImage;
use App\Models\Event;
use App\Models\Partner;


use App\Models\News;

use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\BusinessOpportunity;
use App\Models\Company;
use App\Models\AlgeriaBusinessNetwork;
use Illuminate\Support\Facades\Session;
use App\Models\Economic;
use App\Models\BusinessIntelligence;
use App\Models\Commercial;
use App\Models\Tender;
use App\Models\BusinessIntelligenceReports;
use App\Models\AssistanceService;
use App\Models\Resource;

$currentLocale = LaravelLocalization::getCurrentLocale();
// -----Display Business Opportunities---
$business_opportunities = BusinessOpportunity::where('activated',1)->limit(5)->orderBy('created_at','desc')->orderBy('display_order','desc')->whereHas(
    'localeAll' , function($query) use($currentLocale) {
            return $query->where('locale', $currentLocale);
})
->with(['localeAll'=> function($q) use($currentLocale){
        return $q->where('locale',$currentLocale)->get();
},'sectors.localeAll'=> function($q) use($currentLocale){
        return $q->where('locale',$currentLocale)->get();
}])->get(); 









    $header_news = News::where('status',1)->whereHas(
        'localeAll' , function($query) use($currentLocale) {
        return $query->where('locale', $currentLocale);
    })
        ->with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                    ->get();
            },
            'sectors' => function($query) use($currentLocale) {
                return $query->with([
                    'localeAll' => function($query) use($currentLocale) {
                        return $query->where('locale', $currentLocale)
                            ->get();
                    }
                ])
                    ->get();
            },
        ])
        ->orderBy('created_at','desc')
        ->where('is_premium',0)
        ->limit(5)
        ->orderBy('created_at','desc')
        ->get();    





        $home_news = News::where('status',1)->whereHas(
            'localeAll' , function($query) use($currentLocale) {
            return $query->where('locale', $currentLocale);
        })
            ->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                        ->get();
                },
                'sectors' => function($query) use($currentLocale) {
                    return $query->with([
                        'localeAll' => function($query) use($currentLocale) {
                            return $query->where('locale', $currentLocale)
                                ->get();
                        }
                    ])
                        ->get();
                },
            ])
            ->orderBy('created_at','desc')
            ->where('is_premium',0)
            ->limit(20)
            ->orderBy('created_at','desc')
            ->get();  

$premium_news = News::where('status',1)->whereHas(
    'localeAll' , function($query) use($currentLocale) {
            return $query->where('locale', $currentLocale);
})
->with([
    'localeAll' => function($query) use($currentLocale) {
        return $query->where('locale', $currentLocale)
        ->get();
    },
    'sectors' => function($query) use($currentLocale) {
        return $query->with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->get();
    },
])
->orderBy('insertion_date','desc')
->where('is_premium',1)
->limit(4)
->get();



$upcomingEvents = Event::whereHas(
    'localeAll' , function($query) use($currentLocale) {
            return $query->where('locale', $currentLocale);
    })
    ->with([
        'localeAll' => function($query) use($currentLocale) {
            return $query->where('locale', $currentLocale)
            ->get();
        },
        'sectors' => function($query) use($currentLocale) {
            return $query->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)->get();
                }
            ])->get();
        },
        'zones' => function($query) use($currentLocale) {
            return $query->with([
                'localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                    ->get();
                }
            ])
            ->get();
        },
    ])

    ->orderBy('start_date','asc')
    ->limit(4)
    ->get();










?>

<!--
<div class="page-loader">
    <div class="pre">
        <td class="d-none d-lg-block" width="50%">
            <a href="{{route('customer-home')}}">
                <img src="{{ asset('css/front-end/home_page_styles/assets/img/logo/logo_algeria_invest.png')}}">
            </a>
        </td>
    </div>

    <div class="spinner"></div>
    <div class="txt" style="color:#ffffff"></div>
</div>


<script>

    $(window).on('load',function(){
        setTimeout(function(){ // allowing 3 secs to fade out loader
            $('.page-loader').fadeOut('slow');
        });
    });
</script> -->

<div id="algeria-main-section" style="position:relative;z-index: 9;background-color:#4d7cbd; background-image:linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.01)); ">
    <a href="#algeria-main-section" id="button"></a>


    <style>
        #button {
            display: inline-block;
            background-color: #4e7cbe;
            width: 50px;
            height: 50px;
            opacity:0.5;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color .3s,
            opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }
        #button::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 2em;
            line-height: 50px;
            color: #fff;
        }
        #button:hover {
            cursor: pointer;
            opacity:1!important;
            background-color: #333;
        }
        #button:active {
            background-color: #555;
            opacity:1!important;
        }
        #button.show {
            opacity: 0.5;
            visibility: visible;
        }

        /* Styles for the content section */


    </style>

    <script>
        var btn = $('#button');

        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });


        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
        /*btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
        });*/


    </script>


     <script>

            $(document).ready(function(){
                $(window).scroll(function(){
                    var scroll = $(window).scrollTop();
                    if (scroll > 300) {
                        $(".black").css("background" , "#4e7cbe");

                    }

                    else{
                        $(".black").css("background" , "transparent");
                    }
                })
            })
            </script>

            <script>

            $(document).ready(function(){
                $(window).scroll(function(){
                    var scroll = $(window).scrollTop();
                    if (scroll > 300) {
                        $(".mobile_header").css("background" , "#3363a7");

                    }

                    else{
                        $(".mobile_header").css("background" , "rgba(255,255,255,0.2)");
                    }
                })

            })


            </script>
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
        $discover_algeria_menus = getDiscoverAlgeriaContent();
        $resource_menu = getResourcesContent();

    @endphp
    <table class="headertoplink" style="border:0;background-color:rgba(255,255,255,0.2);color:#FFFFFF" width="100%">
        <tr>



            <td  style="background-color: #4e7cbe;color: #fff;padding: 0;font-size: 16px;line-height: 1.7;text-align:right;height: 50px;">
                <font style="font-size:12px;color:#FFFFFF">
                    <a  class="home_link" style="font-size:12px;color:#ffffff;font-weight:bold" href="/discover-algeria/about-algeria">@lang('navbar.discoverAlgeria')  |</a>

                    <a class="nav-link1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:12px;color:#ffffff;font-weight:bold">@lang('footer.who_we_are') | </a>
                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al" style="font-size:12px;color:#777a7c;float:right;background-color:#bfc0ba!important" >
                        <a class="dropdown-item" style="font-size:12px;color:#ffffff;font-weight:bold" href="{{ route('gallery')}}"> @lang('navbar.discover')</a>
                        <a class="dropdown-item" style="font-size:12px;color:#ffffff;font-weight:bold" href="{{ route('qhse')}}"> QHSE</a>
                    </div>

                    <style>
                        .nav-link1 {
                            display: inline-block;
                            padding: 0rem 0rem;
                        }
                    </style>
                    <style>
                        @media only screen and (max-width: 990px) {
                            .home_link{
                                color:#ffffff!important;
                            }
                            .nav-link1{
                                color:#ffffff!important;
                            }
                            .dropdown-item{
                                color:#ffffff!important;
                            }
                            .presse_link{
                                color:#ffffff!important;
                            }
                            .contact_link{
                                color:#ffffff!important;
                            }


                        }
                    </style>


                <!-- <a style="font-size:12px;color:#777a7c" href="{{ route('gallery')}}">@lang('navbar.discover') | </a>  -->

                <!--      <a style="font-size:12px;color:#777a7c" href="{{ route('sitemap')}}">@lang('navbar.sitemap') | </a> -->

                    <a class="presse_link" style="font-size:12px;color:#ffffff;font-weight:bold" href="{{ route('presse')}}">@lang('navbar.presse') | </a>

                    <a class="contact_link" style="font-size:12px;color:#ffffff;font-weight:bold" href="{{route('contactus')}}">@lang('navbar.contact') &nbsp; </a>
                </font>


                <!-- Social -->
                <!-- <a href="#"><i class="fab fa-pinterest-p"></i></a>&nbsp -->
            <!--
@if($linkedin_url != null)
                <a href="{{ $linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in" style="color:#ffffff"></i></a>&nbsp
                @endif

            @if($twitter_url != null)
                <a href="{{ $twitter_url }}" target="_blank"><i class="fab fa-twitter" style="color:#ffffff"></i></a>&nbsp
                @endif
            @if($facebook_url != null)
                <a href="{{ $facebook_url }}" target="_blank"><i class="fab fa-facebook-f" style="color:#ffffff"></i></a>&nbsp
                @endif

            @if($youtube_url != null)
                <a href="{{ $youtube_url }}" target="_blank"><i class="fab fa-youtube" style="color:#ffffff"></i></a>&nbsp&nbsp
                @endif -->
            </td>
        </tr>

        <style>
            @media only screen and (max-width: 990px) {

                .fa-linkedin-in{
                    color:#ffffff!important;
                }
                .fa-twitter{
                    color:#ffffff!important;
                }
                .fa-facebook-f{
                    color:#ffffff!important;
                }
                .fa-youtube{
                    color:#ffffff!important;
                }

            }
        </style>

       

        <script>
            window.console = window.console || function(t) {};
        </script><script>
            if (document.location.search.match(/type=embed/gi)) {
                window.parent.postMessage("resize", "*");
            }</script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script id="rendered-js">
            $(document).ready(function () {
                $('#so-close').click(function () {
                    $('.s-soft').addClass('so-collapse');
                    $('#so-open').delay(300).css('left', '0');
                });

                $('#so-open').click(function () {
                    $('#so-open').css('left', '-60px');
                    $('.s-soft').removeClass('so-collapse');
                });});
        </script>


        <tr>
            <td>
                <div class="header-top" style=" background-color: #ffffff;padding-top: 10px;padding-bottom: 10px;">
                    <div class="container-fluid">
                        <div class="col-xl-12">
                            <table style="border:0;" width="100%">
                                <tr class="headerflex">
                                    <td class="d-none d-lg-block" width="32%">
                                        <a href="{{route('customer-home')}}">
                                            <img src="{{ asset('css/front-end/home_page_styles/assets/img/logo/logo_algeria_investNew.png')}}">
                                        </a>
                                    </td>





                                    <td width="68%">
                                        <table style="border:0;" width="100%">
                                            <tbody>
                                            <tr class="headerright">
                                                <td>
                                                <!--<ul>
                                                        <li class="d-none d-lg-block">

                                                            <form class="search-header-form" method="get" action="{{route('search')}}" style="background-color:#00000">
                                                                <input class="headerserchbar" type="hidden" name="_token" value="3sdhSaOUIExthWYi4zQBA4umcTToLKYrhc1X89A4" id="search-text" >
                                                                <input class="headerserchbar" type="text" style="width: 310px" name="Search" placeholder="@lang('navbar.search_placeholder')" id="search-box" name="search" style="background-color:#000000;border-color:black">



                                                                <button type="submit" color="#ffffff" style="background-color: transparent; border: none">&nbsp
                                                                    <img src="{{asset('css/images/search.svg')}}" class="img-fluid" >&nbsp&nbsp
                                                                </button>



                                                            </form>



                                                        </li>
                                                    </ul> -->
                                                </td>
                                               
                                                @if(Auth::guard('customer')->check())
                                                    <td class="d-none d-lg-block">
                                                        <ul>
                                                            <li><a class="genric-btn success radius" style="background-color:#4e7cbe!important" href="{{route('customer-logout')}}" onclick="event.preventDefault();document.getElementById('customer_logout_form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;@lang('navbar.signout')</a></li>
                                                        </ul>
                                                        <form action="{{route('customer-logout')}}" id="customer_logout_form" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <li><a href="{{route('customer-account')}}" class="genric-btn success radius my-account-web" style="background-color:#4e7cbe!important"><i class="fa fa-user"></i> @lang('my_account.myAccount')</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                @else
                                                    <td class="d-none d-lg-block">
                                                        <ul>
                                                            <li><a href="{{route('subscription-pack')}}" class="genric-btn success radius" style="background-color:#4e7cbe!important"><i class="fa fa-user-plus" aria-hidden="true"> </i>&nbsp;@lang('navbar.test_for_free')</a></li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <li><a href="#" class="login-in genric-btn success radius" style="background-color:#4e7cbe!important" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer" id="loign_formshow" class="genric-btn success-border radius"><i class="fa fa-user"></i> @lang ('navbar.toLoginIn')</a>
                                                                @include('frontend.layouts.login')
                                                            </li>
                                                        </ul>
                                                    </td>
                                                @endif


                                               

                                                <td class="d-none d-lg-block">

                                                    <div class="dropdown show">
                                                        <a href="#" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img src="{{ asset('css/images/web-icon2.png')}}" alt="search" class="img-fluid globe" style="color:white!important"></a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                                    {{ $properties['name'] }}
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                   

                                                </td>







                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <div class="mobile_header header-bottom header-sticky" style="background-color:#ffffff;border-top: 0px solid rgba(255,255,255,-0.6);">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 p-0" style="background-color:#ffffff">
                   
                    <!-- logo 2 -->
                    <div class="logo2">
                        <a href="{{route('customer-home')}}"><img src="assets/img/logo/logo.png" alt=""></a>
                        
                    </div>
                    <!-- logo 3 -->
                    <div class="logo3 d-block d-lg-none">
                        <a href="{{route('customer-home')}}"><img src="{{ asset('css/front-end/home_page_styles/assets/img/logo/logo_algeria_investNew.png')}}" alt=""></a>
                        <button class="btn-link aside-btn" style="float:right;width:50px;height:50px;background-color:transparent;border-color:transparent" ><i class="fa fa-bars" style="color:#000000;font-size:25px"></i></button>
                        
                    </div>

                    <!-- Main-menu -->
                    
	<style> 
	a{
		color:#ffffff;
	}
	.dropdown-list{
		background-color:#7891a7;
	}
	
	</style>
                   <div id="nav-bottom">
                   
					<div class="container" style="max-width:100%!important">
                        <ul class="nav-menu" style="float:left;left:50px">
                             <li class="nav-item dropdown" style="">
                                 <a class="" href="{{route('customer-home')}}" target="_self" ><img src="{{ asset('css/front-end/home_page_styles/assets/img/logos/homeNew.png')}}" title="Home" style="width:22px;height:22px"> </a>
                             </li>

                             <li class="nav-item dropdown" style="">
                                 <a class="" href="{{route('contactus')}}" target="_self" ><img src="{{ asset('css/front-end/home_page_styles/assets/img/logos/contact_logoNew.png')}}" title="Contact" style="width:22px;height:22px"> </a>
                             </li>
                            



                             <li class="nav-item dropdown" style="">
                                 <button type="submit" class="search-btn" color="#ffffff" style="background-color: transparent; border: none" data-toggle="modal" data-target="#mod_search" style="width:22px;height:22px">&nbsp
                                     <img src="{{asset('css/images/search.png')}}" class="img-fluid" title="Search" style="width:22px;height:22px">&nbsp&nbsp
                                 </button>
                             </li>
                         </ul>
                           

                            <style>
                                @media only screen and (min-width: 1280px) {
                                    .icons_head {
                                        padding-left: 60px;
                                    }
                                }
                            </style>

                            <div class="nav-btns">
						
                        <div id="nav-search">
                            <form class="search-header-form" method="get" action="{{route('search')}}">
                            <input class="headerserchbar" type="hidden" name="_token" value="3sdhSaOUIExthWYi4zQBA4umcTToLKYrhc1X89A4" id="search-text">
                                <input class="input" name="search" placeholder="@lang('navbar.search_placeholder')" required>
                                <button type="submit" color="#008000" style="background-color: #4e7cbe52; border: none;width:10%;height:80px">&nbsp
                                               <img src="{{asset('css/images/search.svg')}}" class="img-fluid" >&nbsp&nbsp
                                </button>
                            </form>
                        
                            <button class="nav-close search-close">
                                <span></span>
                            </button>
                        </div>
                    </div>

                <style>
                   



                #nav-search {
                  position: fixed;
                  left: 50%;
                  -webkit-transform: translate(-50%, 10px);
                  -ms-transform: translate(-50%, 10px);
                  transform: translate(-50%, 10px);
                  opacity: 0;
                  visibility: hidden;
                  max-width: 960px;
                  width: 100%;
                  padding: 60px 5%;
                  background: #ffffff;
                  z-index: 999;
                  -webkit-transition: 0.2s all;
                  transition: 0.2s all;
                }

                #nav-search.active {
                  opacity: 1;
                  visibility: visible;
                  -webkit-transform: translate(-50%, 0px);
                  -ms-transform: translate(-50%, 0px);
                  transform: translate(-50%, 0px);
                }

                #nav-search form .input {
                  height: 80px;
                  background: #f5f5f5;
                  border: 2px solid #323335;
                  color: #000000;
                  font-size: 24px;
                  font-weight: 700;
                  padding: 15px 25px;
                }

                 /* Styles for the content section */
                 .nav-close {
                            width: 50px;
                            height: 50px;
                            position: absolute;
                            top: 10px;
                            right: 15px;
                            background-color: transparent;
                            border: none;
                            }

                            .nav-close span {
                            display: block;
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            -webkit-transform: translateX(-50%);
                            -ms-transform: translateX(-50%);
                            transform: translateX(-50%);
                            }

                            .nav-close span:before, .nav-close span:after {
                            content: "";
                            display: block;
                            width: 30px;
                            background-color: #4e7cbe!important;
                            height: 2px;
                            }

                            .nav-close span:before {
                            -webkit-transform: translateY(0px) rotate(-135deg);
                            -ms-transform: translateY(0px) rotate(-135deg);
                            transform: translateY(0px) rotate(-135deg);
                            }

                            .nav-close span:after {
                            -webkit-transform: translateY(-2px) rotate(135deg);
                            -ms-transform: translateY(-2px) rotate(135deg);
                            transform: translateY(-2px) rotate(135deg);
                            }

                @media only screen and (max-width: 992px) {
                    /* line 1, C:/Users/HP/Desktop/jun-2020/281.Magazine_News/assets/scss/_video_area.scss */
                    .nav-btns {
                        display: none!important;
                    }
                    
                }


                
                    </style>

                    <script>
                        $('.search-btn').on('click', function() {
                                $('#nav-search').toggleClass('active');
                            });

                            $('.search-close').on('click', function () {
                                $('#nav-search').removeClass('active');
                            });

                        </script>

						<!-- nav -->
                        
						<ul class="nav-menu" style="float:right">
                        
                        

                        @if(!Auth::guard('customer')->check())
                            <li class="has-dropdown megamenu">
								<a href="#" style="color:#000000">@lang('navbar.business_environment')</a>
								<div class="dropdown">
									<div class="dropdown-body" style="display:flex!important">
                                      <div class="row">   
                                                    @if($resource_menu != null)
                                                        @if(!$resource_menu->isEmpty())
                                                            @foreach($resource_menu as $resource)
                                                            <div class="col-md-4" style="padding-bottom:0" >
                                                            <p class="text-uppercase font-weight-bold text-center d-flex"><a style='font-size: 0.7rem;font-weight: 800;color: #222;' class='bus_univ dropdown-item' href="{{route('business-environment2',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a></p>
                                                            <ul class="dropdown-list" style="background-color: #ffffff!important">
                                                                    @foreach($resource->subPages as $content)
                                                                   <li><a style='color: #777; font-size: 0.85rem;line-height: 1.20;padding: 5px 12px 5px' class='bus_univ dropdown-item' href="{{route('business-environment2',['key'=>$resource->page_key])}}"><i class="fa fa-angle-right" aria-hidden="true" style="font-weight:bold;font-size:12px"></i>  &nbsp; {{ str_limit(html_entity_decode(strip_tags($content->localeAll[0]->title)),40,'...') }}</a></li>
                                                                    @endforeach
                                                            </ul>
                                                            </div>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                        </div>
									</div>
								</div>
							</li>
                            @else
                            <li class="has-dropdown megamenu">
								<a href="#"  style="color:#000000">@lang('navbar.business_environment')</a>
								<div class="dropdown">
									<div class="dropdown-body">
                                    <div class="row">
                                                @if($resource_menu != null)
                                                    @if(!$resource_menu->isEmpty())
                                                        @foreach($resource_menu as $resource)
                                                        <div class="col-md-4">
                                                        <p class="text-uppercase font-weight-bold text-center d-flex"> <a style='    font-size: 0.8rem;font-weight: 700;color: #222;' class='bus_univ dropdown-item' href="{{route('business-environment',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a></p>
                                                            <ul class="dropdown-list" style="background-color: #ffffff!important;">
                                                                 @foreach($resource->subPages as $content)
                                                                     <li><a style='color: #777;display: block; font-size: 0.85rem;line-height: 1.20;padding: 5px 12px 5px;' class='bus_univ dropdown-item' href="{{route('business-environment',['key'=>$resource->page_key])}}">{{ str_limit(html_entity_decode(strip_tags($content->localeAll[0]->title)),40,'...') }}</a></li>
                                                               
                                                                @endforeach
                                                    
                                                            </ul>
                                                        </div>
                                                        @endforeach
                                                    @endif
                                                @endif
                                        </div>
									</div>
								</div>
							</li>
                            @endif
                            <style>
                               .bus_univ:hover{
                                   color:#e7aa32!important;

                               }
                            </style>
							<li class="has-dropdown megamenu">
                            <a class="" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false"  style="color:#000000">@lang('navbar.businessOpportunities')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                   
								<div class="dropdown">
									<div class="dropdown-body">
                                    <div class="row">
                                    
											<div class="col-md-4">
												<p class="text-uppercase font-weight-bold text-center d-flex">Dernières opportunités</p>
												<div id="" class="">
                                              
                                               
                                                        @foreach($business_opportunities->slice(1, 4) as $business_opportunity)
                                                        
                                                            



                                                            <div class="">
                                                                   <!-- <p class="text-uppercase font-weight-bold text-center d-flex justify-content-center align-items-center">
                                                                   
                                                                      
                                                                        @foreach($business_opportunity->sectors as $sectors)
                                                                                    
                                                                                    @break($loop->iteration == 2)
                                                                                    <h6 style='font-weight:bold'>{{$sectors->localeAll[0]->name}}</h6>
                                                                         @endforeach
                                                                        
                                                                       
                                                                    </p> -->
                                                                    <div class="row gx-4">
                                                                        <div class="col-3" style="padding-top:20px">
                                                                        <div class="bg-image hover-overlay ripple rounded shadow-2-strong" data-mdb-ripple-color="light">
                                                                        <img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" alt="eco-news" style="width:50px;height:50px" class="img-fluid eco-news-img">
                                                                            <a href="#!">
                                                                            <div class="mask" style="background-color: rgba(251,251,251,0.15);"></div>
                                                                            </a>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-8">

                                                                                 <a href="{{route('business-opportunity-details', ['sector_id' => $business_opportunity->sectors[0]->page_key,'id' => $business_opportunity->page_key ])}}" class="" style="color:#000000;flaot:left">
                                                                                       <p style="line-height:1.2rem;font-family: Poppins, sans-serif"> {{ ((($business_opportunity->localeAll[0]->project_title))) }}</p>
                                                                                    </a>
                                                                        
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        @endforeach
                                             
                                                    </div>
											</div>

											<div class="col-md-4">
											
												<div id="" class="">

                                                        @foreach($business_opportunities->slice(0, 1) as $business_opportunity)

                                                            <div class="" >
                                                                <p class="text-uppercase font-weight-bold" >
                                                                    nouvelle opportunité <span class="badge bg-danger" style="color:#ffffff">New</span>
                                                                </p>
                                                                <br>
                                                                <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                                                                   <img class="bo_image" src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" alt="eco-news" style="width:50px;height:50px" class="img-fluid eco-news-img">
                                                                    <a href="#!">
                                                                    <div class="mask" style="background-color: rgba(251,251,251,0.15);"></div>
                                                                    </a>
                                                                </div>
                                                               <!-- <div class="d-flex justify-content-between">
                                                                    <a href="" class="text-info"><i class="pe-1"></i>
                                                                    @foreach($business_opportunity->sectors as $sectors)
                                                                                    
                                                                        @break($loop->iteration == 2)
                                                                        <h6 style="font-weight:bold">{{$sectors->localeAll[0]->name}}</h6>
                                                                    @endforeach
                                                                    
                                                                    </a>
                                                                
                                                                </div> -->
                                                                <a href="{{route('business-opportunity-details', ['sector_id' => $business_opportunity->sectors[0]->page_key,'id' => $business_opportunity->page_key ])}}">
                                                                    <p style="line-height:1.5rem;font-family: Poppins, sans-serif;font-size:20px">   {{ ((($business_opportunity->localeAll[0]->project_title))) }} </p>
                                                                    <br>
                                                                   <!-- <p>
                                                                    {{ str_limit(html_entity_decode(strip_tags($business_opportunity->localeAll[0]->project_description)),190,'...') }}
                                                                    </p> -->
                                                                </a>
                                                            </div>
                                                            <style>  
                                                            .bo_image{
                                                                width:500px!important;
                                                                height:400px!important;
                                                                text-align: center;
                                                            }
                                                         
                                                            </style>
                                                           
                                                        
                                                        @endforeach
                                                     
                                                      
                                                      
                                                    </div>
											</div>
											<div class="col-md-4">
												<p class="text-uppercase font-weight-bold text-center d-flex">@lang('home.view_more')</p>
												<ul class="dropdown-list voir_plus">
													<li> <h6 style="color:#3b4855"> <a style="font-size:16px"  href="{{route('business-opportunity')}}"> <i class="fa fa-angle-right" aria-hidden="true" style="font-weight:bold"></i> @lang('business_opportunity.breadcrumb_check_business_opportunities')</a>  </h6></li>
                                                    <li>  <h6 style="color:#3b4855"> <a style="font-size:16px"  href="/add-business-opportunity"> <i class="fa fa-angle-right" aria-hidden="true" style="font-weight:bold"></i> @lang('business_opportunity.breadcrumb_add_business_opportunities')</a> </h6></li>
												</ul>
                                                <p class="text-uppercase font-weight-bold text-center d-flex">@lang('inquiry.breadcrumb_contactus') </p>
                                                <div class="map-area__left">

                                                        <iframe class="img1-fluid" src="https://maps.google.com/maps?q=36.735925608570234, 3.0868360987020544&amp;z=15&amp;output=embed" width="90%" height="80%" frameborder="0" style="border:0.5px solid black;height:40%; box-shadow: 10px 10px 10px rgb(0 0 0 / 20%) ;text-align:center; " class="img-fluid "></iframe> <br><br>
                                                       <ul>
                                                           <a href="{{route('contactus')}}" style="color:#3b4855">
                                                            <li class=" font-weight-bold  d-flex" style="font-size:13px">@lang('inquiry.telephone') :  +213 770 008 496 </li>
                                                            <li class=" font-weight-bold  d-flex" style="font-size:13px">@lang('inquiry.email') :      contact@algeriainvest.com </li> 
                                                            <li class=" font-weight-bold  d-flex" style="font-size:13px">@lang('inquiry.address') :    6, rue Ahmed Chérifi, Kouba, ALGER </li> 
                                                           </a>
                                                       </ul>
                                                </div>
												
											</div>
                                            
											
										</div>
									</div>
								</div>
							</li>

                            <style> 
                            .last{
                                width:500%!important;
                                height:500%!important
                            }
                            
                            </style>





                            <li class="has-dropdown megamenu">
                            <a class="" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false"  style="color:#000000">@lang('home.premium')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                   
								<div class="dropdown">
									<div class="dropdown-body">
                                    <div class="row">
											<div class="col-md-4">
                                            <p class="text-uppercase font-weight-bold"> derniers avis d'experts</p>
                                                @if(!$premium_news->isEmpty())
                                                        @foreach($premium_news->slice(1,3)->all() as $news)
                                                            @if(!Auth::guard('customer')->check())
                                                               
                                                                <div class="">
                                                                   <!-- <p class="text-uppercase font-weight-bold text-center d-flex justify-content-center align-items-center">
                                                                   
                                                                      
                                                                        @foreach($news->sectors as $sectors)
                                                                                    
                                                                                    @break($loop->iteration == 2)
                                                                                    <h6 style='font-weight:bold'>{{$sectors->localeAll[0]->name}}</h6>
                                                                         @endforeach
                                                                        
                                                                       
                                                                    </p> -->
                                                                    <div class="row gx-4">
                                                                        <div class="col-md-3" style="padding-top:20px">

                                                                        <div class="bg-image hover-overlay ripple rounded shadow-2-strong" data-mdb-ripple-color="light">
                                                                        <img src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                                                            <a href="#!">
                                                                            <div class="mask" style="background-color: rgba(251,251,251,0.15);"></div>
                                                                            </a>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-9 mb-3">

                                                                        <a href="{{route('premium-news_free-detail', [$news->page_key])}}" class="" style="color:#000000">
                                                                            <p style="line-height:1.2rem;font-family: Poppins, sans-serif"> {{$news->localeAll[0]->title}} </p>
                                                                                    </a>

                                                                        
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                                @else
                                                                <div class="">
                                                                   <!-- <p class="text-uppercase font-weight-bold text-center d-flex justify-content-center align-items-center">
                                                                   
                                                                      
                                                                        @foreach($news->sectors as $sectors)
                                                                                    
                                                                                    @break($loop->iteration == 2)
                                                                                    <h6 style='font-weight:bold'>{{$sectors->localeAll[0]->name}}</h6>
                                                                         @endforeach
                                                                        
                                                                       
                                                                    </p> -->
                                                                    <div class="row gx-4">
                                                                        <div class="col-md-3" style="padding-top:20px">
                                                                        <div class="bg-image hover-overlay ripple rounded shadow-2-strong" data-mdb-ripple-color="light">
                                                                        <img src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                                                            <a href="#!">
                                                                            <div class="mask" style="background-color: rgba(251,251,251,0.15);"></div>
                                                                            </a>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-9 mb-3">

                                                                        <a href="{{route('premium-news-detail', [$news->page_key])}}" class="" style="color:#000000">
                                                                            <p style="line-height:1.2rem;font-family: Poppins, sans-serif"> {{$news->localeAll[0]->title}} </p>
                                                                                    </a>

                                                                        
                                                                        </div>
                                                                    </div>
                                                            </div>




                                                                @endif
                                                            @endforeach
                                                            @endif
                                                        
											</div>
											<div class="col-md-4">
												
												<div id="" class="">
                                                @if(!$premium_news->isEmpty())
                                                @foreach($premium_news->slice(0,1) as $news)
                                                            @if(!Auth::guard('customer')->check())
                                                                     
                                                                            <div class="" >
                                                                                        <p class="text-uppercase font-weight-bold" >
                                                                                        Nouveau avis d'experts <span class="badge bg-danger" style="color:#ffffff">New</span>
                                                                                        </p>
                                                                                <br>
                                                                                        <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                                                                                        <img class='news_img' src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                                                                            <a href="#!">
                                                                                            <div class="mask" style="background-color: rgba(251,251,251,0.15);"></div>
                                                                                            </a>
                                                                                        </div>
                                                                                       <!-- <div class="d-flex justify-content-between">
                                                                                            <a href="" class="text-info"><i class="pe-1"></i>
                                                                                            @foreach($news->sectors as $sectors)
                                                                                                            
                                                                                                            @break($loop->iteration == 2)
                                                                                                            <h6 style='font-weight:bold'>{{$sectors->localeAll[0]->name}}</h6>
                                                                                                @endforeach
                                                                                            
                                                                                            </a>
                                                                                        
                                                                                        </div> -->
                                                                                        <a href="{{route('premium-news_free-detail', [$news->page_key])}}" class="" style="color:#000000">
                                                                                            <p style="line-height:1.5rem;font-family: Poppins, sans-serif;font-size:20px">     {{$news->localeAll[0]->title}}</p>
                                                                                            <br>
                                                                                            <!--<p>
                                                                                            {{ str_limit(html_entity_decode(strip_tags($news->localeAll[0]->description)),190,'...') }}
                                                                                            </p> -->
                                                                                        </a>
                                                                                    </div>
                                                                                    <style>  
                                                                                    .news_img{
                                                                                        width:280px!important;
                                                                                        height:200px!important;
                                                                                        text-align: center;
                                                                                    }
                                                                                
                                                                                    </style>
                                                                    
                                                                    </div>
                                                                @else
                                                                     
                                                                            <div class="" >
                                                                                        <p class="text-uppercase font-weight-bold" >
                                                                                        @lang('news.todayNews')
                                                                                        </p>
                                                                                        <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                                                                                        <img class='news_img' src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                                                                            <a href="#!">
                                                                                            <div class="mask" style="background-color: rgba(251,251,251,0.15);"></div>
                                                                                            </a>
                                                                                        </div>
                                                                                       <!-- <div class="d-flex justify-content-between">
                                                                                            <a href="" class="text-info"><i class="pe-1"></i>
                                                                                            @foreach($news->sectors as $sectors)
                                                                                                            
                                                                                                            @break($loop->iteration == 2)
                                                                                                            <h6 style='font-weight:bold'>{{$sectors->localeAll[0]->name}}</h6>
                                                                                                @endforeach
                                                                                            
                                                                                            </a>
                                                                                        
                                                                                        </div> -->
                                                                                        <a href="{{route('premium-news-detail', [$news->page_key])}}" class="" style="color:#000000">
                                                                                            <p style="line-height:1.5rem;font-family: Poppins, sans-serif;font-size:20px">    {{$news->localeAll[0]->title}}</p>
                                                                                            <br>
                                                                                           <!-- <p>
                                                                                            {{ str_limit(html_entity_decode(strip_tags($news->localeAll[0]->description)),190,'...') }}
                                                                                            </p> -->
                                                                                        </a>
                                                                                    </div>
                                                                                    <style>  
                                                                                    .news_img{
                                                                                        width:280px!important;
                                                                                        height:200px!important;
                                                                                        text-align: center;
                                                                                    }
                                                                                
                                                                                    </style>
                                                                         
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            @endif
                                                     
                                                     
                                                    </div>
											
											<div class="col-md-4">
                                            <p class="text-uppercase font-weight-bold">@lang('home.view_more')</p>
												<ul class="dropdown-list voir_plus">
                                                    <li> <h6 style="color:#3b4855;"><a style="font-size:16px"  href="{{route('premium-news-list')}}"><i class="fa fa-angle-right" aria-hidden="true" style="font-weight:bold"></i> @lang('navbar.consult_expert_advice')</a> </h6></li>
                                                    <li> <h6 style="color:#3b4855;"> <a style="font-size:16px"  href="{{route('add-premium-news')}}"><i class="fa fa-angle-right" aria-hidden="true" style="font-weight:bold"></i> @lang('navbar.propose_contribution')</a> </h6> </li>

													
												</ul>




                                                    <p class="text-uppercase font-weight-bold">Les interviews By AlgeriaInvest</p>
                                                    <ul class="dropdown-list voir_plus">

                                                        <li> <h6 style="color:#3b4855;"> <a   href="#" style="font-size:16px" data-toggle="modal"  data-target="#last_int">  <i class="fa fa-angle-right" aria-hidden="true" style="font-weight:bold"></i> Derniére interview   <span class="badge bg-danger" style="color:#ffffff">New</span> </a> </h6> </li>
                                                        <li> <h6 style="color:#3b4855;"> <a style="font-size:16px"  href="{{route('presse')}}"> <i class="fa fa-angle-right" aria-hidden="true" style="font-weight:bold"></i> Toutes les interviews </a> </h6> </li>
                                                        <div class="modal fade" id="last_int" tabindex="-1" role="dialog" aria-labelledby="last_int" aria-hidden="true" style="margin-top:95px">
                                                            <div class="modal-dialog" style="bacground-color: #f0f0f0">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background:#000000;border-bottom:2px solid #ffb400;padding-top: 6px; height: 38px">

                                                                        <h6 class="modal-title" style="text-align: center; color:#FFFFFF; text-transform: uppercase;font-weight:bold">Last Interview</h6>
                                                                        <button class="close" data-dismiss="modal" aria-label="Close" style='color:#ffffff'>
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" style="padding:0; margin:0">
                                                                        <iframe src="https://www.youtube.com/embed/4mwbsgKwP_c" allowfullscreen="" frameborder="0" height="315" width="100%"></iframe>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                            <script type="text/javascript">
                                                               /* $(window).on('load', function() {
                                                                    $('#myModal').modal('show');
                                                                });*/

                                                            $('.modal').on('hide.bs.modal', function() {
                                                                var memory = $(this).html();
                                                                $(this).html(memory);
                                                            });
                                                        </script>



                                                    </ul>


                                                <p class="text-uppercase font-weight-bold">Newsletter</p>
                                                <div class="generate-review-box-green">
                                                    <img src="{{ asset('images/generate-intersection.svg')}}" class="img-fluid intersection-one">
                                                    <img src="{{ asset('images/generate-intersection2.svg')}}" class="img-fluid intersection-two">
                                                    <div class="col-lg-12 p-0">
                                                        <div class="row">
                                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-flex align-items-center">
                                                                <div class="news-fig">
                                                                    <img src="{{ asset('images/green-mailbox.svg')}}" class="img-fluid">
                                                                    <img src="{{ asset('images/mail-thread.svg')}}" class="img-fluid mail-thread">
                                                                    <img src="{{ asset('images/mail-arrow.svg')}}" class="img-fluid mail-arrow">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9 d-flex align-items-center">
                                                                <div class="news-generate">
                                                                    <h6 class="sub-heading text-white mb-2">@lang('home.economic_newsletter')</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sidebar-news-letter">
                                                            <form class="subscribe_form sidebar_form yellow_btn">
                                                                <div class="input-group">
                                                                    <input type="hidden" name="type" value="business" class="business_subscribe">
                                                                    <input type="text" class="form-control col-8 economic_email"placeholder="@lang('newsletter.email')"  name="email">
                                                                    <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <!-- <a href="javascript:void(0)" class="economic_submit">@lang('home.subscribe')</a></span> -->
                                                        <button type="submit" class="btn btn-primary newsletter_btn economic_submit"><i id="spinner-economic-newsletter" class="fa fa-circle-o-notch fa-spin" style="display:none"></i> @lang('home.subscribe')</button>
                                                                    </div>
                                                                    <p class="alert-sidebar">
                                                                        <span  id="economic_success" style="display: none"></span>
                                                                        <span class="" id="economic_error" role="alert" style="display: none"></span>
                                                                        <span class="" id="economic_sub_already"></span>
                                                                    </p>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>








												
											</div>



                                            
											
										</div>
									</div>
								</div>
							</li>

                            <li class="has-dropdown megamenu">
                            <a class="" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false"  style="color:#000000">@lang('navbar.news')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                   
								<div class="dropdown">
									<div class="dropdown-body">
                                    <div class="row">
											<div class="col-md-4">
												<p class="text-uppercase font-weight-bold">DERNIÈRES NEWS</p>
                                                @if(!$header_news->isEmpty())
                                                    @foreach($header_news->slice(1, 4) as $news)

                                                                 <div class="">

                                                                   <!-- <p class="text-uppercase font-weight-bold text-center d-flex justify-content-center align-items-center">
                                                                   
                                                                      
                                                                        @foreach($news->sectors as $sectors)
                                                                                    
                                                                                    @break($loop->iteration == 2)
                                                                                    <h6 style='font-weight:bold'>{{$sectors->localeAll[0]->name}}</h6>
                                                                         @endforeach
                                                                        
                                                                       
                                                                    </p> -->
                                                                    <div class="row gx-4">
                                                                        <div class="col-md-3" style="padding-top:20px">
                                                                        <div class="bg-image hover-overlay ripple rounded shadow-2-strong" data-mdb-ripple-color="light">
                                                                        <img src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                                                            <a href="#!">
                                                                            <div class="mask" style="background-color: rgba(251,251,251,0.15);"></div>
                                                                            </a>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-9">

                                                                        <a href="{{route('news-detail', [$news->page_key])}}" class="" style="color:#000000">
                                                                            <p style="line-height:1.2rem;font-family: Poppins, sans-serif"> {{$news->localeAll[0]->title}} </p>
                                                                                    </a>

                                                                        
                                                                        </div>
                                                                    </div>
                                                            </div>



                                                    @endforeach
                                                @endif
                                                        
											</div>
											<div class="col-md-4">

												<div id="" class="">
                                                @if(!$header_news->isEmpty())
                                                    @foreach($header_news->slice(0, 1) as $news)

                                                      <div class="" >
                                                                <p class="text-uppercase font-weight-bold" >
                                                                @lang('news.todayNews') <span class="badge bg-danger" style="color:#ffffff">New</span>
                                                                </p>
                                                               <br>
                                                                <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                                                                <img class='news_img' src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                                                    <a href="#!">
                                                                    <div class="mask" style="background-color: rgba(251,251,251,0.15);"></div>
                                                                    </a>
                                                                </div>
                                                              <!--  <div class="d-flex justify-content-between">
                                                                    <a href="" class="text-info"><i class="pe-1"></i>
                                                                    @foreach($news->sectors as $sectors)
                                                                                    
                                                                                    @break($loop->iteration == 2)
                                                                                    <h6 style='font-weight:bold'>{{$sectors->localeAll[0]->name}}</h6>
                                                                         @endforeach
                                                                    
                                                                    </a>
                                                                
                                                                </div> -->
                                                                <a href="{{route('news-detail', [$news->page_key])}}" class="" style="color:#000000">
                                                                    <p style="line-height:1.5rem;font-family: Poppins, sans-serif;font-size:20px">    {{$news->localeAll[0]->title}}</p>
                                                                    <br>
                                                                   <!-- <p>
                                                                    {{ str_limit(html_entity_decode(strip_tags($news->localeAll[0]->description)),190,'...') }}
                                                                    </p> -->
                                                                </a>
                                                            </div>
                                                            <style>  
                                                            .news_img{
                                                                width:280px!important;
                                                                height:200px!important;
                                                                text-align: center;
                                                            }
                                                         
                                                            </style>








                                                    </div>
                                                    @endforeach
                                                    @endif


											</div>

											<div class="col-md-4">

                                                <p class="text-uppercase font-weight-bold">@lang('home.view_more')</p>
                                                <ul class="dropdown-list voir_plus">
                                                    <li> <h6 style="color:#3b4855;">  <a style="font-size:16px"  href="{{route('news-list')}}"><i class="fa fa-angle-right" aria-hidden="true" style="font-weight:bold"></i> @lang('navbar.news1')</a>  </h6></li>
                                                    <li> <h6 style="color:#3b4855">  <a   style="font-size:16px"  href="{{route('event-list')}}"><i class="fa fa-angle-right" aria-hidden="true" style="font-weight:bold"></i> @lang('navbar.events')</a>  </h6></li>

                                                </ul>

                                                <div class="map-area__left">

                                                    @include('frontend.newsletters.footer-subscribe')

                                                </div>


                                            <div id="" class="">
                                              
                                            @foreach($upcomingEvents->slice(0,1) as $event)
                                                <?php
                                                $event->start_date = Carbon\Carbon::parse($event->start_date);
                                                $format_start_date = clone $event->start_date;
                                                $format_start_date = $format_start_date->format('Y-m-d');
                                                // echo "<pre>";print_r($format_start_date);exit();
                                                $carbon_date = Carbon\Carbon::now()->format('Y-m-d');
                                                $route = (($format_start_date == $carbon_date)||($event->start_date->greaterThan(Carbon\Carbon::now()))) ? 'upcoming-event-detail' : 'past-event-detail';
                                                ?>
                                                  <div class="" >
                                                      <p class="text-uppercase font-weight-bold" >
                                                      @lang('event.upcomingEvents') <span class="badge bg-danger" style="color:#ffffff">New</span>
                                                      </p>

                                                      <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                                                     <center>  <img src="{{asset('storage/uploads/event_logos/'.$event->event_logo)}}" alt="" style="width:120px;height:120px;padding-top:0"> </center>
                                                      <div class="post-date">
                                                                @php
                                                                    $string = $event->start_date;
                                                                    $timestamp = strtotime($string);
                                                                    $time =  date("d", $timestamp);
                                                                    $month = date("m", $timestamp);
                                                                @endphp
                                                               <!-- <span class="date">{{$time}}</span>
                                                                <span class="month">{{date("F", mktime(0, 0, 0, $month, 10))}}</span> -->
                                                            </div>
                                                        
                                                      </div>
                                                     
                                                      <a href="{{route($route,[$event->page_key])}}" class="text-dark">
                                                          <p style="line-height:1.5rem;font-family: Poppins, sans-serif;font-size:20px">   {{str_limit($event->localeAll[0]->title,100,'...')}} </p>

                                                          <p style="line-height:1.2rem;font-family: Poppins, sans-serif">
                                                          @lang('home.from') {{Carbon\Carbon::parse($event->start_date)->isoFormat('LL') }} @lang('home.to') {{Carbon\Carbon::parse($event->end_date)->isoFormat('LL') }}
                                                            | {{ str_limit(html_entity_decode(strip_tags($event->localeAll[0]->place)),100,'...') }}
                                                          </p>
                                                      </a>
                                                  </div>
                                                  <style>  
                                                  .bo_image{
                                                      width:280px!important;
                                                      height:200px!important;
                                                      text-align: center;
                                                  }
                                               
                                                  </style>
                                                 
                                              
                                              @endforeach
                                           
                                            
                                            
                                          </div>


												
											</div>
                                            
											
										</div>
									</div>
								</div>
							</li>

                            



                           
                            <li class="">
                            <a href="{{route('our-services')}}"  style="color:#000000">@lang('navbar.ourServices')</a>
                            </li>


							
							
						</ul>
						<!-- /nav -->
					</div>
				</div>
				
				<!-- /Main Nav -->
                    </div>
                
                <div class="col-12">
                
                  <div class="mobile_menu d-block d-lg-none">
                 
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="mobileheadbottom">
         <div class="mobileheadleft">
            <div class="mobileheadsearch">
                <form class="search-header-form" method="get" action="{{route('search')}}">
                    <input type="hidden" name="_token" value="3sdhSaOUIExthWYi4zQBA4umcTToLKYrhc1X89A4" id="search-text">
                    <input type="text"  name="Search" placeholder="@lang('navbar.search_placeholder')" id="search-box" name="search">
                </form>
            </div>
         </div>
         <div class="mobileheadright">
            <div class="site-user">
               <div class="btn-group">      
                  <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-user-circle" aria-hidden="true"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                     @if(!Auth::guard('customer')->check())
                     <button class="dropdown-item login_btn" data-toggle="modal" data-target=".bd-example-modal-lg" type="button" id="mobile-login"> @lang ('navbar.toLoginIn')</button>
                     <a href="{{route('subscription-pack')}}" class="register register_btn">@lang('navbar.test_for_free')</a>
                     @else
                     <a href="{{route('customer-logout')}}" class="register" onclick="event.preventDefault();document.getElementById('customer_logout_form').submit();">@lang('navbar.signout')</a>
                     <a href="{{route('customer-account')}}" class="register">@lang('my_account.myAccount')</a>
                     @endif
                  </div>
               </div>
            </div>
            <div class="dropdown show">
               <a href="#" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('css/images/web-icon2.png')}}" alt="search" class="img-fluid globe"></a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                     <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['name'] }}
                     </a>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
	  </div>


<!--      Cookies      -->

                                                     <div id="nav-aside">
                                                        <ul class="nav-aside-menu">
                                                            <li><a href="{{ route('customer-home')}}">Home</a></li>

                                                            @if(!Auth::guard('customer')->check())
                                                            <li class="has-dropdown"><a>@lang('navbar.business_environment')</a>
                                                                <ul class="dropdown">
                                                               
                                                                   
                                                                    @if($resource_menu != null)
                                                                        @if(!$resource_menu->isEmpty())
                                                                            @foreach($resource_menu as $resource)
                                                                            <li> <a class="dropdown-item" href="{{route('business-environment2',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a>   </li>
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                  
                                                                @else
                                                              
                                                                @if($resource_menu != null)
                                                                   @if(!$resource_menu->isEmpty())
                                                                       @foreach($resource_menu as $resource)
                                                                       <li> <a class="dropdown-item" href="{{route('business-environment',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a> </li>
                                                                       @endforeach
                                                                   @endif
                                                                   @endif
                                                              
                                                               @endif

                                                                    
                                                                  
                                                                </ul>
                                                            </li>





                                                            <li class="has-dropdown"><a>@lang('navbar.businessOpportunities')</a>
                                                                <ul class="dropdown">
                                                                    <li><a href="{{route('business-opportunity')}}">@lang('business_opportunity.breadcrumb_check_business_opportunities')</a></li>
                                                                    <li><a href="/add-business-opportunity">@lang('business_opportunity.breadcrumb_add_business_opportunities')</a></li>
                                                                  
                                                                </ul>
                                                            </li>
                                                            <li class="has-dropdown"><a>@lang('home.premium')</a>
                                                                <ul class="dropdown">
                                                                    <li><a href="{{route('premium-news-list')}}">@lang('navbar.consult_expert_advice')</a></li>
                                                                    <li><a href="{{route('add-premium-news')}}">@lang('navbar.propose_contribution')</a></li>
                                                                  
                                                                </ul>
                                                            </li>
                                                            <li class="has-dropdown"><a>@lang('navbar.news')</a>
                                                                <ul class="dropdown">
                                                                    <li><a href="{{route('news-list')}}">@lang('navbar.news1')</a></li>
                                                                    <li><a href="{{route('event-list')}}">@lang('navbar.events')</a></li>
                                                                  
                                                                </ul>
                                                            </li>
                                                            <li><a href="{{route('our-services')}}">@lang('navbar.ourServices')</a></li>
                                                            <li><a href="#">Contacts</a></li>

                                                        </ul>
                                                        <button class="nav-close nav-aside-close"><span></span></button>
                                                      </div>

                <script> 

                // Mobile dropdown
	$('.has-dropdown>a').on('click', function() {
		$(this).parent().toggleClass('active');
	});
                $(document).click(function(event) {
		if (!$(event.target).closest($('#nav-aside')).length) {
			if ( $('#nav-aside').hasClass('active') ) {
				$('#nav-aside').removeClass('active');
				$('#nav').removeClass('shadow-active');
			} else {
				if ($(event.target).closest('.aside-btn').length) {
					$('#nav-aside').addClass('active');
					$('#nav').addClass('shadow-active');
				}
			}
		}
	});

	$('.nav-aside-close').on('click', function () {
		$('#nav-aside').removeClass('active');
		$('#nav').removeClass('shadow-active');
	});
                
                </script>
<style> 

/*----------------------------*\
	nav aside
\*----------------------------*/

#nav-aside {
  position: fixed;
  right: 0;
  top: 0;
  bottom: 0;
  background-color: #1b1c1e;
  max-width: 360px;
  width: 100%;
  padding: 80px 20px;
  overflow-y: scroll;
  z-index: 99;
  -webkit-transform: translateX(100%);
  -ms-transform: translateX(100%);
  transform: translateX(100%);
  -webkit-transition: 0.4s all cubic-bezier(.77, 0, .18, 1);
  transition: 0.4s all cubic-bezier(.77, 0, .18, 1);
}

#nav-aside.active {
  -webkit-transform: translateX(0%);
  -ms-transform: translateX(0%);
  transform: translateX(0%);
}

.nav-aside-menu li a {
  display: block;
  padding: 15px 0px;
  color: #fff;
  border-bottom: 1px solid #323335;
}

.nav-aside-menu li a:hover, .nav-aside-menu li a:focus {
  color: #ee4266;
}

.nav-aside-menu li.has-dropdown>a {
  cursor: pointer;
}

.nav-aside-menu li.has-dropdown>a:after {
  font-family: 'FontAwesome';
  content: "\f0d7";
  float: right;
}

.nav-aside-menu li.has-dropdown>.dropdown {
  display: none;
  margin-left: 30px;
  border-left: 1px solid #323335;
}

.nav-aside-menu li.has-dropdown.active>.dropdown {
  display: block;
}

.nav-aside-menu li.has-dropdown>.dropdown a {
  padding: 15px;
}

.nav-close {
  width: 50px;
  height: 50px;
  position: absolute;
  top: 10px;
  right: 15px;
  background-color: transparent;
  border: none;
}

.nav-close span {
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
}

.nav-close span:before, .nav-close span:after {
  content: "";
  display: block;
  width: 30px;
  background-color: #fff;
  height: 2px;
}

.nav-close span:before {
  -webkit-transform: translateY(0px) rotate(-135deg);
  -ms-transform: translateY(0px) rotate(-135deg);
  transform: translateY(0px) rotate(-135deg);
}

.nav-close span:after {
  -webkit-transform: translateY(-2px) rotate(135deg);
  -ms-transform: translateY(-2px) rotate(135deg);
  transform: translateY(-2px) rotate(135deg);
}

</style>
<?php

if (!isset($_COOKIE['count1'])) {
    //echo " En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies";
    $cookie = 1;
    setcookie("count1", $cookie);

}else
if((($_COOKIE['count1'])) <= 1 || ($_COOKIE['count1']) >=4 ){


?>


<!--<section class="cookie">
    <div class="txt">
        <p class="">
            En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies. <a href="https://policies.google.com/technologies/partner-sites?hl=fr" target="_blank" class=""> En savoir plus</a> | <a class="btn accept d-inline">Accepter</a>

        </p>
    </div>
    <div>

    </div>
</section> -->

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
								speed : 1000,
								delay : 3000,
								easing : 'swing',
								effectType : 'slide'
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
				<script>
					// 12 Pop Up Video
					var popUp = $('.popup-video');
					if(popUp.length){
						popUp.magnificPopup({
							type: 'iframe'
						});
					}

				</script>
              
<style>


    .cookie{
        width:100%;
        height: 50px;
        background-color: #fff;
        position: fixed;
        bottom: 88px;
        border-radius: 10px;
        left: 5%;
        padding: 10px 20px;
        z-index:9999;
    }

    .cookie .txt{
        float: left;
        width: 65%;
    }
    .txt p{
        color:#1D2D35;
    }

    .cookie .accept {
        background-color: #40CC79;
        color: #fff !important;
        border-radius: 32px;
        padding: 3px 23px;
        /* align-self: center; */
        font-size: 19px;
        margin-top: 2.5%;
        margin-left: 3%;

    }
    .cookie .accept:hover {
        background-color: #30b867;
    }
</style>


<script>
    $(".accept").click(function(){
        $(".cookie").hide();
        //Enter your code hear...
    });
</script>

<script src="https://dimsemenov.com/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script>
    $(document).ready(function() {
        $('.popup-youtube').magnificPopup({
            type: 'iframe'
        });
    });
</script>

<?php

$cookie = ++$_COOKIE['count1'];
setcookie("count1", $cookie);
//echo "You have viewed this page ".$_COOKIE['count']." times.";
}
?>
<!-- Header End -->

