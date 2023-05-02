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






?>

<div id="algeria-main-section" style="position:absolute;z-index: 9;background-color:rgba(255,255,255,-0.7);left:0; right:0; linear-gradient(0.25turn, #f0f0f0, #ffffff, #ffffff, #ffffff, #f0f0f0) ">
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
<link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/style_head.css')}}">
<link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/mon-style.css')}}">
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
                        $(".mobile_header").css("background" , "#4e7cbe");
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



            <td  style="text-align:right" style="background-color:#000000">
                <font style="font-size:12px;color:#FFFFFF">
                    <a  class="home_link" style="font-size:12px;color:#ffffff;font-weight:bold" href="{{ route('customer-home')}}">Home |</a>

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

        <div class="s-soft">
            <a href="https://www.facebook.com/algeriainvestbyi2b" target="_blank" class="s-item facebook">
                <span class="fa fa-facebook"></span>
            </a>
            <a href="https://twitter.com/Algeria_invest1" target="_blank" class="s-item twitter">
                <span class="fa fa-twitter"></span>
            </a>

            <a href="https://www.linkedin.com/company/algeria-invest-by-i2b" target="_blank" class="s-item linkedin">
                <span class="fa fa-linkedin"></span>
            </a>

            <a href="https://www.youtube.com/channel/UCbINosfBtoht9AV6WEFUu_A/featured" target="_blank" class="s-item youtube">
                <span class="fa fa-youtube"></span>
            </a>

            <a id="so-close" class="s-item print">
                <span class="fa fa-arrow-left"></span>
            </a></div>
        <a id="so-open" class="s-item print so-collapse">
            <span class="fa fa-arrow-right"></span></a>

        <style>
            *{margin:0;}.s-soft{ position: fixed; top: 200px ;
                            left: 0; z-index: 1000; transition:all linear 0.2s ;}
            .s-soft a:first-child{ border-radius: 0 5px 0 0;}
            .s-soft a:last-child{ border-radius: 0 0 5px 0;}
            .s-item { display:block; width: 30px;height: 30px;
                color: white; font-size: 100%;line-height: 80px;padding-top:10px;
                text-align: center;transition:all linear 0.2s ;}
            .s-item:hover { width:110px;
                border-radius:0px 20px 20px 0px;  }
            #so-open { position: fixed; top: 100px ;color: white;
                left: -90px;border-radius:0 30px 30px 0;
                transition:all linear 0.2s ;}
            #so-close {color:white}
            .facebook {background-color:  #3b5999;}
            .twitter {background-color: #3AAFD6;}
            .print {background-color: #f9b634;}
            .youtube{background-color: red;}
            .linkedin{background-color: #0e76a8 ;}
            .instagram{background-color:  #c32aa3;}
            .so-collapse{left: -60px; }
            .print:hover {background-color: white;}
            @media only screen and (max-width: 1280px) {
                .s-soft {
                    top: 200px!important;
                    width: 15px!important;
                    height: 15px!important
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
                <div class="header-top">
                    <div class="container-fluid">
                        <div class="col-xl-12">
                            <table style="border:0;" width="100%">
                                <tr class="headerflex">
                                    <td class="d-none d-lg-block" width="32%">
                                        <a href="{{route('customer-home')}}">
                                            <img src="{{ asset('css/front-end/home_page_styles/assets/img/logo/logo_algeria_invest.png')}}">
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
                                                            <img src="{{ asset('css/images/web-icon.svg')}}" alt="search" class="img-fluid globe" style="color:white!important"></a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                                    {{ $properties['name'] }}
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <button class="aside-btn" style="float:left" ><i class="fa fa-bars"></i></button>   

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

    <div class="mobile_header header-bottom header-sticky" style="background-color:rgba(255,255,255,0.2);border-top: 1px solid rgba(255,255,255,-0.6);">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 p-0">
                    <!-- logo 2 -->
                    <div class="logo2">
                        <a href="{{route('customer-home')}}"><img src="assets/img/logo/logo.png" alt=""></a>
                    </div>
                    <!-- logo 3 -->
                    <div class="logo3 d-block d-lg-none">
                        <a href="{{route('customer-home')}}"><img src="{{ asset('css/front-end/home_page_styles/assets/img/logo/logo_algeria_invest.png')}}" alt=""></a>
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
                                 <a class="" href="{{route('customer-home')}}" target="_self" ><img src="{{ asset('css/front-end/home_page_styles/assets/img/logos/home.png')}}" title="Home" style="width:22px;height:22px"> </a>
                             </li>

                             <li class="nav-item dropdown" style="">
                                 <a class="" href="{{route('contactus')}}" target="_self" ><img src="{{ asset('css/front-end/home_page_styles/assets/img/logos/contact5.png')}}" title="Contact" style="width:22px;height:22px"> </a>
                             </li>
                            



                             <li class="nav-item dropdown" style="">
                                 <button type="submit" class="search-btn" color="#ffffff" style="background-color: transparent; border: none" data-toggle="modal" data-target="#mod_search" style="width:22px;height:22px">&nbsp
                                     <img src="{{asset('css/images/Group 14.png')}}" class="img-fluid" title="Search" style="width:22px;height:22px">&nbsp&nbsp
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
                            <li class="has-dropdown">
								<a href="#">@lang('navbar.business_environment')</a>
								<div class="dropdown" style="width:100%!important">
									<div class="dropdown-body">
										<ul class="dropdown-list" style="background-color:#ffffff!important">
                                        @if($resource_menu != null)
                                            @if(!$resource_menu->isEmpty())
                                                @foreach($resource_menu as $resource)
											       <a style='font-size:13px; font-weight:bold;color:#000000' class='dropdown-item' href="{{route('business-environment2',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a></li>
                                                @endforeach
                                            @endif
                                        @endif
										</ul>
									</div>
								</div>
							</li>
                            @else
                            <li class="has-dropdown">
								<a href="index.html">@lang('navbar.business_environment')</a>
								<div class="dropdown">
									<div class="dropdown-body">
										<ul class="dropdown-list">
                                        @if($resource_menu != null)
                                            @if(!$resource_menu->isEmpty())
                                                @foreach($resource_menu as $resource)
											       <li><a class="dropdown-item" href="{{route('business-environment',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a></li>
                                                  
                                                @endforeach
                                            @endif
                                        @endif
										</ul>
									</div>
								</div>
							</li>
                            @endif
                            
							<li class="has-dropdown megamenu">
                            <a class="" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false">@lang('navbar.businessOpportunities')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                   
								<div class="dropdown">
									<div class="dropdown-body">
                                    <div class="row">
                                    
											<div class="col-md-4">
												<h4 class="dropdown-heading">Dernieres opportunities</h4>
												<div id="" class="">
                                              
                                               
                                                        @foreach($business_opportunities->slice(1, 3) as $business_opportunity)
                                                        
                                                            <div class="item">
                                                                <div class="news-post">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-4 col-sm-4 p-0">
                                                                                <div class="news-post__left">
                                                                                    <div class="ratio-1x1" >
                                                                                        <div class="ratio-inner">
                                                                                            <img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" alt="eco-news" style="width:50px;height:50px" class="img-fluid eco-news-img">
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
                                                                                        {{ ((($business_opportunity->localeAll[0]->project_title))) }}
                                                                                    </a>
                                                                                    

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
											<div class="col-md-4">
												<h4 class="dropdown-heading">Derniere opportunitie</h4>
												<div id="" class="">
                                              
                                                        @foreach($business_opportunities->slice(0, 1) as $business_opportunity)
                                                        
                                                            <div class="item">
                                                                <div class="news-post">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-4 col-sm-4 p-0">
                                                                                <div class="news-post__left">
                                                                                    <div class="ratio-1x1" >
                                                                                        <div class="ratio-inner">
                                                                                            <img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}"alt="eco-news" class="img-fluid eco-news-img last"  > 
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
											</div>
											<div class="col-md-4">
												<h4 class="dropdown-heading">Voir Plus</h4>
												<ul class="dropdown-list">
													<li> <a  href="{{route('business-opportunity')}}">@lang('business_opportunity.breadcrumb_check_business_opportunities')</a> </li>
                                                    <li>  <a  href="/add-business-opportunity">@lang('business_opportunity.breadcrumb_add_business_opportunities')</a></li>
													
												</ul>
                                                <h4 class="dropdown-heading">Contactez Nous </h4>
                                                <div class="map-area__left">

                                                        <iframe class="img1-fluid" src="https://maps.google.com/maps?q=36.735925608570234, 3.0868360987020544&amp;z=15&amp;output=embed" width="95%" frameborder="0" style="border:0.5px solid black; box-shadow: 10px 10px 10px rgb(0 0 0 / 20%) ;text-align:center; " class="img-fluid "></iframe>

                                                </div>
												
											</div>
                                            
											
										</div>
									</div>
								</div>
							</li>

                            <style> 
                            .last{
                                width:100px!important;
                                height:100px!important
                            }
                            
                            </style>
                            <li class="has-dropdown megamenu">
                            <a class="" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false">@lang('home.premium')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                   
								<div class="dropdown">
									<div class="dropdown-body">
                                    <div class="row">
											<div class="col-md-4">
												<h4 class="dropdown-heading">@lang('news.popularArticles')</h4>
                                                        @foreach($premium_news->slice(0,3) as $news)
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
											<div class="col-md-4">
												<h4 class="dropdown-heading">Dernier avis d'expert</h4>
												<div id="" class="">
                                              
                                                @foreach($premium_news->slice(0,1) as $news)
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
											<div class="col-md-4">
												<h4 class="dropdown-heading">Voir Plus</h4>
												<ul class="dropdown-list">
                                               <li> <a class="" href="{{route('premium-news-list')}}">@lang('navbar.consult_expert_advice')</a> </li>
                                               <li> <a class="" href="{{route('add-premium-news')}}">@lang('navbar.propose_contribution')</a>  </li>
													
												</ul>
                                                <h4 class="dropdown-heading">Newletters </h4>
                                                <div class="map-area__left">

                                                @include('frontend.newsletters.footer-subscribe')

                                                </div>
												
											</div>
                                            
											
										</div>
									</div>
								</div>
							</li>



                            <li class="has-dropdown megamenu">
                            <a class="" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false">@lang('navbar.news')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                   
								<div class="dropdown">
									<div class="dropdown-body">
                                    <div class="row">
                                    
											<div class="col-md-4">
												<h4 class="dropdown-heading">Dernieres opportunities</h4>
												<div id="" class="">
                                              
                                               
                                                        @foreach($business_opportunities->slice(1, 3) as $business_opportunity)
                                                        
                                                            <div class="item">
                                                                <div class="news-post">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-4 col-sm-4 p-0">
                                                                                <div class="news-post__left">
                                                                                    <div class="ratio-1x1" >
                                                                                        <div class="ratio-inner">
                                                                                            <img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" alt="eco-news" style="width:50px;height:50px" class="img-fluid eco-news-img">
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
											</div>
											<div class="col-md-4">
												<h4 class="dropdown-heading">Derniere opportunitie</h4>
												<div id="" class="">
                                              
                                                        @foreach($business_opportunities->slice(0, 1) as $business_opportunity)
                                                        
                                                            <div class="item">
                                                                <div class="news-post">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-md-4 col-sm-4 p-0">
                                                                                <div class="news-post__left">
                                                                                    <div class="ratio-1x1" >
                                                                                        <div class="ratio-inner">
                                                                                            <img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" alt="eco-news" style="width:150px;height:150px" class="img-fluid eco-news-img">
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
											</div>
											<div class="col-md-4">
												<h4 class="dropdown-heading">Voir Plus</h4>
												<ul class="dropdown-list">
													<li> <a  href="{{route('news-list')}}}">@lang('navbar.news1')</a> </li>
                                                    <li>  <a  href="{{route('event-list')}}">@lang('navbar.events')</a></li>
													
												</ul>
                                                <h4 class="dropdown-heading">Contactez Nous </h4>
                                                <div class="map-area__left">

                                                        <iframe class="img1-fluid" src="https://maps.google.com/maps?q=36.735925608570234, 3.0868360987020544&amp;z=15&amp;output=embed" width="95%" frameborder="0" style="border:0.5px solid black; box-shadow: 10px 10px 10px rgb(0 0 0 / 20%) ;text-align:center; " class="img-fluid "></iframe>

                                                </div>
												
											</div>
                                            
											
										</div>
									</div>
								</div>
							</li>

                            <li class="">
                            <a href="{{route('our-services')}}">@lang('navbar.ourServices')</a>
                            </li>


							
							
						</ul>
						<!-- /nav -->
					</div>
				</div>
				
				<!-- /Main Nav -->
                    </div>
                
                <div class="col-12">
                  <div class="mobile_menu d-block d-lg-none"></div>
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
               <a href="#" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('css/images/web-icon.svg')}}" alt="search" class="img-fluid globe"></a>
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
                                                            <li><a href="index.html">Home</a></li>

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
<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<script src="js/jquery.magnific-popup.js"></script>
		<script src="js/jquery.stellar.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/jn.js"></script>
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
<?php

$cookie = ++$_COOKIE['count1'];
setcookie("count1", $cookie);
//echo "You have viewed this page ".$_COOKIE['count']." times.";
}
?>
<!-- Header End -->

