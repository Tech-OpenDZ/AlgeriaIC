

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



            <td style="text-align:right" style="background-color:#000000">
                <font style="font-size:12px;color:#FFFFFF">
                    <a style="font-size:12px;color:#FFFFFF" href="{{ route('customer-home')}}">
                        Home
                    </a> |
                <!--	 <a style="font-size:12px;" href="#">@lang('navbar.who_are_we') ? </a> | -->



                    <a style="font-size:12px;color:#FFFFFF" href="{{ route('sitemap')}}">@lang('navbar.sitemap')</a> |

                <!--   	<a style="font-size:12px;" href="{{ route('gallery')}}">Galerie</a> | -->

                    <a style="font-size:12px;color:#FFFFFF" href="{{route('contactus')}}">@lang('navbar.contact') </a>|
                </font>
                <!-- Social -->
                <!-- <a href="#"><i class="fab fa-pinterest-p"></i></a>&nbsp -->

                @if($linkedin_url != null)
                    <a href="{{ $linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in" style="color:#FFFFFF"></i></a>&nbsp
                @endif

                @if($twitter_url != null)
                    <a href="{{ $twitter_url }}" target="_blank"><i class="fab fa-twitter" style="color:#FFFFFF"></i></a>&nbsp
                @endif
                @if($facebook_url != null)
                    <a href="{{ $facebook_url }}" target="_blank"><i class="fab fa-facebook-f" style="color:#FFFFFF"></i></a>&nbsp
                @endif

                @if($youtube_url != null)
                    <a href="{{ $youtube_url }}" target="_blank"><i class="fab fa-youtube" style="color:#FFFFFF"></i></a>&nbsp&nbsp
                @endif
            </td>
        </tr>
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



                                                                <button type="submit" color="#008000" style="background-color: transparent; border: none">&nbsp
                                                                    <img src="{{asset('css/images/search.svg')}}" class="img-fluid">&nbsp&nbsp
                                                                </button>



                                                            </form>



                                                        </li>
                                                    </ul>
                                                </td>
                                                @if(Auth::guard('customer')->check())
                                                    <td class="d-none d-lg-block">
                                                        <ul>
                                                            <li><a class="genric-btn success radius" href="{{route('customer-logout')}}" onclick="event.preventDefault();document.getElementById('customer_logout_form').submit();">@lang('navbar.signout')</a></li>
                                                        </ul>
                                                        <form action="{{route('customer-logout')}}" id="customer_logout_form" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <li><a href="{{route('customer-account')}}" class="genric-btn success radius my-account-web"><i class="fa fa-user"></i> @lang('my_account.myAccount')</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                @else
                                                    <td class="d-none d-lg-block">
                                                        <ul>
                                                            <li><a href="{{route('customer-register')}}" class="genric-btn success radius">@lang('navbar.test_for_free')</a></li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <li><a href="#" class="login-in genric-btn success-border radius" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer" id="loign_formshow" class="genric-btn success-border radius"><i class="fa fa-user"></i> @lang ('navbar.toLoginIn')</a>
                                                                @include('frontend.layouts.login')
                                                            </li>
                                                        </ul>
                                                    </td>
                                                @endif




                                                <td class="d-none d-lg-block">

                                                    <div class="dropdown show">
                                                        <a href="#" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img src="{{ asset('css/images/web-icon.svg')}}" alt="search" class="img-fluid globe"></a>
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

    <div class="header-bottom header-sticky" style="background-color:rgba(255,255,255,0.3);border-top: 1px solid rgba(255,255,255,-0.6);">
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
                    <div class="main-menu text-center d-none d-lg-block" >
                        <nav>


                            <script>
                                /*$(document).ready(function() {
                                    $('.popup-youtube').magnificPopup({
                                        type: 'iframe'
                                    });
                                });*/
                            </script>

                            <ul id="navigation" class="navbar-fixed-top.scrolled">
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="https://algeriainvest.com/AlgeriaIC/public/discover-algeria/about-algeria" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.discoverAlgeria')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al" style="bacground-color:#FFFFFF">
                                        @foreach($discover_algeria_menus as $menu)
                                            <a class="dropdown-item" href="{{route('discover-algeria',$menu->content_key)}}">{{ $menu->localeAll[0]->title }}</a>
                                        @endforeach
                                    </div>
                                </li>
                             
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
										 <a class="dropdown-item" href="{{route('premium-news-list')}}">@lang('home.premium')</a>
                                      
                                    </div>
                                </li>

                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.news')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                        <a class="dropdown-item" href="{{route('news-list')}}">@lang('navbar.news1')</a>
                                        <a class="dropdown-item" href="{{route('event-list')}}">@lang('navbar.events')</a>
                                    </div>
                                </li>


                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">@lang('navbar.businessOpportunities')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                        <a class="dropdown-item" href="{{route('business-opportunity')}}">@lang('business_opportunity.breadcrumb_check_business_opportunities')</a>
                                        <a class="dropdown-item" href="/add-business-opportunity">@lang('business_opportunity.breadcrumb_add_business_opportunities')</a>
                                    </div>
                                </li>


                                <li><a href="{{route('our-services')}}">@lang('navbar.ourServices')</a></li>




                                <li class="nav-item dropdown" style="float:right;background:#00000;color:#ffffff;border-bottom:2px solid #ffb400">
                                    <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">@lang('navbar.galerie')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                        <a class="dropdown-item" href="{{ route('gallery')}}">@lang('navbar.discover')</a>
                                        <a class="dropdown-item" href="{{ route('presse')}}">@lang('navbar.presse')</a>
                                    </div>
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
                            <a href="{{route('customer-register')}}" class="register register_btn">@lang('navbar.test_for_free')</a>
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

<section class="cookie">
    <div class="txt">
        <p class="">
            En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies. <a href="https://policies.google.com/technologies/partner-sites?hl=fr" target="_blank" class=""> En savoir plus</a> | <a class="btn accept d-inline">Accepter</a>

        </p>
    </div>
    <div>

    </div>
</section>
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

