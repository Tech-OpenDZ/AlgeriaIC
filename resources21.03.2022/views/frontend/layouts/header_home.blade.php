<?php
// On indique au navigateur qu'on utilise l'encodage UTF-8
header('Content-type: text/html; charset=utf-8');

// Paramètres de connexion à la base
define('DB_HOST' , '127.0.0.1');
define('DB_NAME' , 'algeriainvest_v1');
define('DB_USER' , 'algeriainvest_v1');
define('DB_PASS' , 'Toe7huTp2n_ty2Xs');

// Connexion à la base avec PDO
try{
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch(Exception $e) {
    echo "Impossible de se connecter à la base de données '".DB_NAME."' sur ".DB_HOST." avec le compte utilisateur '".DB_USER."'";
    echo "<br/>Erreur PDO : <i>".$e->getMessage()."</i>";
    die();
}






// On prépare les données à insérer
$ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
$date = date('Y-m-d');           // La date d'aujourd'hui, sous la forme AAAA-MM-JJ

// Mise à jour de la base de données
// 1. On initialise la requête préparée

$query = $pdo->prepare("
        INSERT INTO stats_visites (ip , date_visite , pages_vues) VALUES (:ip , :date , 1)
        ON DUPLICATE KEY UPDATE pages_vues = pages_vues + 1
    ");
// 2. On execute la requête préparée avec nos paramètres
$visit = $query->execute(array(
    ':ip'   => $ip,
    ':date' => $date
));
//echo $visit;






?>

<div id="algeria-main-section" style="position:absolute;z-index: 9;background-color:rgba(255,255,255,-0.7);left:0; right:0; linear-gradient(0.25turn, #f0f0f0, #ffffff, #ffffff, #ffffff, #f0f0f0) ">
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
    <table class="headertoplink" style="border:0;background-color:rgba(255,255,255,0.3);color:#FFFFFF" width="100%">
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
                                                    <ul>
                                                        <li class="d-none d-lg-block">

                                                            <form class="search-header-form" method="get" action="{{route('search')}}" style="background-color:#00000">
                                                                <input class="headerserchbar" type="hidden" name="_token" value="3sdhSaOUIExthWYi4zQBA4umcTToLKYrhc1X89A4" id="search-text" >
                                                                <input class="headerserchbar" type="text" style="width: 310px" name="Search" placeholder="@lang('navbar.search_placeholder')" id="search-box" name="search" style="background-color:#000000;border-color:black">



                                                                <button type="submit" color="#ffffff" style="background-color: transparent; border: none">&nbsp
                                                                    <img src="{{asset('css/images/search.svg')}}" class="img-fluid" >&nbsp&nbsp
                                                                </button>



                                                            </form>



                                                        </li>
                                                    </ul>
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

    <div class="mobile_header header-bottom header-sticky" style="background-color:rgba(255,255,255,0.3);border-top: 1px solid rgba(255,255,255,-0.6);">
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
                    <div class=" black main-menu text-center d-none d-lg-block" >
                        <nav>


                            <script>
                                /*$(document).ready(function() {
                                    $('.popup-youtube').magnificPopup({
                                        type: 'iframe'
                                    });
                                });*/

                            </script>


                            <script>

                                $(document).ready(function(){
                                    $(window).scroll(function(){
                                        var scroll = $(window).scrollTop();
                                        if (scroll > 300) {
                                            $(".black").css("background" , "#000000");
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
                                        $(".mobile_header").css("background" , "#000000");
                                    }

                                    else{
                                        $(".mobile_header").css("background" , "rgba(255,255,255,0.3)");
                                    }
                                })
                            })
                            </script>

                            <ul id="navigation">
                               <!-- <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="https://algeriainvest.com/AlgeriaIC/public/discover-algeria/about-algeria" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.discoverAlgeria')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al" style="bacground-color:#FFFFFF">
                                        @foreach($discover_algeria_menus as $menu)
                                            <a class="dropdown-item" href="{{route('discover-algeria',$menu->content_key)}}">{{ $menu->localeAll[0]->title }}</a>
                                        @endforeach
                                    </div>
                                </li> -->




                               @if(!Auth::guard('customer')->check())
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="{{route('business-environment2')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.business_environment')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                        
                                        @if($resource_menu != null)
                                            @if(!$resource_menu->isEmpty())
                                                @foreach($resource_menu as $resource)
                                                    <a class="dropdown-item" href="{{route('business-environment2',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a>
                                                @endforeach
                                            @endif
                                        @endif
						 <!--    <a class="dropdown-item" href="{{route('premium-news-list')}}">@lang('home.premium')</a> -->
                                    </div>
                                </li>
                                @else
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.business_environment')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                        
                                        @if($resource_menu != null)
                                            @if(!$resource_menu->isEmpty())
                                                @foreach($resource_menu as $resource)
                                                    <a class="dropdown-item" href="{{route('business-environment',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a>
                                                @endforeach
                                            @endif
                                        @endif
						 <!--    <a class="dropdown-item" href="{{route('premium-news-list')}}">@lang('home.premium')</a> -->
                                    </div>
                                </li>
                                @endif



                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">@lang('navbar.businessOpportunities')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                        <a class="dropdown-item" href="{{route('business-opportunity')}}">@lang('business_opportunity.breadcrumb_check_business_opportunities')</a>
                                        <a class="dropdown-item" href="/add-business-opportunity">
                                        @lang('business_opportunity.breadcrumb_add_business_opportunities')</a>
                                    </div>
                                </li>


                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('home.premium')</a>
                                    <span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                    <a class="dropdown-item" href="{{route('premium-news-list')}}">@lang('navbar.consult_expert_advice')</a>
                                    <a class="dropdown-item" href="{{route('add-premium-news')}}">@lang('navbar.propose_contribution')</a>
                                                                        </div>
                                </li>



                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.news')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                        <a class="dropdown-item" href="{{route('news-list')}}">@lang('navbar.news1')</a>
                                        <a class="dropdown-item" href="{{route('event-list')}}">@lang('navbar.events')</a>
                                    </div>
                                </li>

                                <style>
                                        .header-bottom .main-menu ul li:hover > a {
                                            color: #f9b634;
                                            text-decoration: underline;
                                        }

                                 </style>


                           






                  <!--         
				
				<li><a href="{{route('our-services')}}">@lang('navbar.ourServices')</a></li>
				  
				  <li class="nav-item dropdown" style="float:right;color:FFFFFF;border-bottom:2px solid #ffb400">
                                    <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">@lang('navbar.galerie')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                        <a class="dropdown-item" href="{{ route('gallery')}}">@lang('navbar.discover')</a>
                                        <a class="dropdown-item" href="{{ route('presse')}}">@lang('navbar.presse')</a>
                                    </div>
                                </li>

<li><a class="dropdown-item" href="{{route('premium-news-list')}}">@lang('home.premium')</a>
</li>
  -->


                              

 <li style="float:right;color:#f9b634;border-bottom:2px solid #4e7cbe">
<a style="color:#4e7cbe!important" href="{{route('our-services')}}">@lang('navbar.ourServices')</a>
		</li>


                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Mobile Menu -->
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

