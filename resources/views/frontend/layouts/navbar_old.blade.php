@php
$facebook_url = null;
$linkedin_url = null;
$youtube_url = null;
$twitter_url = null;
$opening_time = null;
$contact_no = null;
$rss_feed   = null;

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
    if($setting->key == 'opening_time')
        $opening_time= $setting->value;
    if($setting->key == 'contact_no')
        $contact_no= $setting->value;
    if($setting->key == 'rss_feed')
        $rss_feed = $setting->value;
}
$localeArr = ['en','fr','ar'];
if(in_array(Request::Segment(1),$localeArr)){
   $request_route = Request::Segment(2);
}else{
   $request_route = Request::Segment(1);
}

$locale = LaravelLocalization::getCurrentLocale();

@endphp
<header>
  
    <div class="top-header for_mobile">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-3 col-8">
                    <ul class="top-header__socialicons">
                        @if($facebook_url != null)
                            <li><a href="{{ $facebook_url }}" target="_blank"><img src="{{ asset('css/images/facebook-icon.svg') }}" alt="facebopok" class="img-fluid"></a></li>
                        @endif
                        @if($twitter_url != null)
                            <li><a href="{{ $twitter_url }}" target="_blank"><img src="{{ asset('css/images/twitter-icon.svg') }}" alt="twitter" class="img-fluid"></a></li>
                        @endif
                        @if($linkedin_url != null)
                            <li><a href="{{ $linkedin_url }}" target="_blank"><img src="{{ asset('css/images/linkedin-icon.svg') }}" alt="linkedin" class="img-fluid"></a></li>
                        @endif
                        @if($youtube_url != null)
                            <li><a href="{{ $youtube_url }}" target="_blank"><img src="{{ asset('css/images/youtube-icon.svg') }}" alt="youtube" class="img-fluid"></a></li>
                        @endif
                        @if($rss_feed != null)
                        <li><a href="{{ $rss_feed }}" target="_blank"><img src="{{ asset('css/images/wifi.png') }}" alt="wifi" class="img-fluid"></a></li>
                        @endif
                    </ul>
                    <ul class="m-0 top_hdr_num">
                        @if($opening_time != null)
                            <li class="clock">{{ $opening_time}}</li>
                        @endif
                        @if($contact_no != null)
                            <li class="call">{{ $contact_no }}</li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-9 col-4 same_height">
                    <div class="equal_width">
                        <a href="#search" class="search-form-tigger" data-toggle="search-form">
                        <img src="{{ asset('css/images/search.svg')}}" alt="search" class="img-fluid"></a>
                    </div>
                    <div class="for-mobile equal_width">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="hamburger">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                                <i class="fa fa-times d-none"></i>
                            </span>
                        </button>
                    </div>
                    <!--- <a href="#" title="" class="header-more-toggle"><i class="fa fa-ellipsis-v timming-toggle d-none" aria-hidden="true"></i></a>
                    <ul class="top-header__clock">
                    <li class="clock">Sunday to Thursday from 9h - 17h</li>
                    <li class="call">+213(0)23786347</li>
                    </ul>-->
                </div>
            </div>
            <div class="timming-contact">
                <ul class="top-header__clock mobile-clock">
                    @if($opening_time != null)
                        <li class="clock">{{ $opening_time}}</li>
                    @endif
                    @if($contact_no != null)
                        <li class="call">{{ $contact_no }}</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- top header starts -->
    <div class="top-header for_desk">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-3 col-9">
                    <ul class="top-header__socialicons">
                    @if($facebook_url != null)
                        <li><a href="{{ $facebook_url }}" target="_blank"><img src="{{ asset('css/images/facebook-icon.svg') }}" alt="facebopok" class="img-fluid"></a></li>
                    @endif
                    @if($twitter_url != null)
                        <li><a href="{{ $twitter_url }}" target="_blank"><img src="{{ asset('css/images/twitter-icon.svg') }}" alt="twitter" class="img-fluid"></a></li>
                    @endif
                    @if($linkedin_url != null)
                        <li><a href="{{ $linkedin_url }}" target="_blank"><img src="{{ asset('css/images/linkedin-icon.svg') }}" alt="linkedin" class="img-fluid"></a></li>
                    @endif
                    @if($youtube_url != null)
                        <li><a href="{{ $youtube_url }}" target="_blank"><img src="{{ asset('css/images/youtube-icon.svg') }}" alt="youtube" class="img-fluid"></a></li>
                    @endif
                    @if($rss_feed != null)
                        <li><a href="{{ $rss_feed }}" target="_blank"><img src="{{ asset('css/images/wifi.png') }}" alt="wifi" class="img-fluid"></a></li>
                    @endif
                    </ul>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-9 col-3">
                    <a href="#" title="" class="header-more-toggle"><i class="fa fa-ellipsis-v timming-toggle" aria-hidden="true"></i></a>
                    <ul class="top-header__clock">
                        @if($opening_time != null)
                            <li class="clock">{{ $opening_time}}</li>
                        @endif
                        @if($contact_no != null)
                            <li class="call">{{ $contact_no }}</li>
                        @endif
                    </ul>
                </div>
            </div> 
            <div class="timming-contact">
                <ul class="top-header__clock mobile-clock">
                    @if($opening_time != null)
                        <li class="clock">{{ $opening_time}}</li>
                    @endif
                    @if($contact_no != null)
                        <li class="call">{{ $contact_no }}</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- top header ends -->
    <!-- mid header -->
    <div class="mid-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="mid-header__left">
                    <a href="{{route('customer-home')}}" class="logo-class d-flex align-items-center">
                        <img src="{{ asset('css/images/logo_algeria_invest_final.svg')}}" alt="logo" class="img-fluid logo-for-mobile">
                    </a>
                    <div class="search-hamburger">
                        <div class="search">
                            <a href="#search" class="search-form-tigger"  data-toggle="search-form"><img src="{{asset('css/images/search.svg')}}" alt="search" class="img-fluid"></a>
                            <!-- <div class="search-form-wrapper">
                                <form class="search-form" id="" action="">
                                    <div class="input-group">
                                        <input type="text" name="search" class="search form-control" placeholder="@lang('navbar.searchPlaceholder')">
                                    </div>
                                </form>
                            </div> -->
                        </div> 
                        <div class="site-user">
                            <!-- <a href="#" class=""><i class="fa fa-user-circle" aria-hidden="true"></i></a> -->
                            <div class="btn-group">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if(!Auth::guard('customer')->check())
                                    <button class="dropdown-item login_btn" type="button">@lang('navbar.toLoginIn')</button>
                                    <a href="{{route('customer-register')}}" class="register register_btn">@lang('navbar.registerLabel')</a>
                                    @else
                                    <a href="http://algeriaic.php-dev.in/customerlogout" class="register" onclick="event.preventDefault();document.getElementById('customer_logout_form').submit();">@lang('navbar.signout')</a>

                                    <a href="{{route('customer-account')}}" class="register">@lang('my_account.myAccount')</a>
                                    @endif
                                    <!-- <button class="dropdown-item " type="button">Register</button> -->
                                    <!-- <button class="dropdown-item" type="button">Something else here</button> -->
                                </div>
                            </div>
                        </div> 
                        <!-- <div id="lang_selector" class="language-dropdown">
                        @if($locale == 'en')
                            <span for="toggle" class="lang-flag"><img src="{{ asset('css/images/usa.png')}}"></span>
                        @elseif($locale == 'fr')
                            <span for="toggle" class="lang-flag"><img src="{{ asset('css/images/france.png')}}"></span>
                        @elseif($locale == 'ar')
                            <span for="toggle" class="lang-flag"><img src="{{ asset('css/images/saudi_arabia.png')}}"></span>
                        @endif
                        <ul class="lang-list">
                            @if($locale != 'en')
                            <li class="lang" title="English">
                                <a hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                    <span><img src="{{ asset('css/images/usa.png')}}"></span>
                                    <span class="cont-name" >English</span>
                                </a>  
                            </li>
                            @endif
                            @if($locale != 'fr')
                            <li class="lang" title="FR">
                                <a hreflang="fr" href="{{ LaravelLocalization::getLocalizedURL('fr', null, [], true) }}">
                                    <span><img src="{{ asset('css/images/france.png')}}"></span>
                                    <span class="cont-name">French</span>
                                </a>  
                            </li>
                            @endif
                            
                        </ul>
                        </div> -->
                        <div class="dropdown show">
                            <a href="#" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('css/images/web-icon.svg')}}" alt="search" class="img-fluid"></a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['name'] }}
                            </a>
                            @endforeach
                            </div>
                        </div>
                        <div class="for-mobile">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                </div>

                </div>
                <div class="col-lg-10 col-md-8 col-sm-12">
                    <div class="mid-header__right">
                        <ul class="mid-header__right--buttons">
                            <li class="search">
                                <a href="javascript:void(0);" class="search-form-tigger"  data-toggle="search-form"><img src="{{asset('css/images/search.svg')}}" alt="search" class="img-fluid"></a>
                                <!-- <div class="search-form-wrapper">
                                    <form class="search-form" id="" action="">
                                        <div class="input-group">
                                            <input type="text" name="search" class="search form-control" placeholder="@lang('navbar.searchPlaceholder')">
                                        </div>
                                    </form>
                                </div> -->
                            </li>
                            @if(Auth::guard('customer')->check())
                            <li class="mt-2">
                                <a href="{{route('customer-logout')}}" class="register" onclick="event.preventDefault();document.getElementById('customer_logout_form').submit();">
                                    @lang('navbar.signout')
                                </a>
                            </li>
                            <li class="mt-2">
                                <a href="{{route('customer-account')}}" class="register" >
                                    @lang('my_account.myAccount')
                                </a>
                                <form action="{{route('customer-logout')}}" id="customer_logout_form" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @else
                            <li class="mt-2"><a href="#" class="login-in" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer" id="loign_formshow">@lang('navbar.toLoginIn')</a>
                                @include('frontend.layouts.login')
                            </li>
                            <li class="mt-2"><a href="{{route('customer-register')}}" class="register"> @lang('navbar.registerLabel')</a></li>
                            @endif
                            <li>
                                <div class="dropdown show">
                                    <a href="#" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('css/images/web-icon.svg')}}" alt="search" class="img-fluid"></a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['name'] }}
                                    </a>
                                    @endforeach

                                    </div>
                                </div>
                            </li>
                            <!-- <li>
                                <div id="lang_selector" class="language-dropdown">
                                    @if($locale == 'en')
                                    <span for="toggle" class="lang-flag"><img src="{{ asset('css/images/usa.png')}}"></span>
                                    @elseif($locale == 'fr')
                                    <span for="toggle" class="lang-flag"><img src="{{ asset('css/images/france.png')}}"></span>
                                    @elseif($locale == 'ar')
                                    <span for="toggle" class="lang-flag"><img src="{{ asset('css/images/saudi_arabia.png')}}"></span>
                                    @endif
                                    <ul class="lang-list">
                                        @if($locale != 'en')
                                        <li class="lang" title="English">
                                            <a hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                                <span><img src="{{ asset('css/images/usa.png')}}"></span>
                                                <span class="cont-name">English</span>
                                            </a>  
                                        </li>
                                        @endif
                                        @if($locale != 'fr')
                                        <li class="lang" title="FR">
                                            <a hreflang="fr" href="{{ LaravelLocalization::getLocalizedURL('fr', null, [], true) }}">
                                                <span><img src="{{ asset('css/images/france.png')}}"></span>
                                                <span class="cont-name">French</span>
                                            </a>  
                                        </li>
                                        @endif
                                        
                                    </ul>
                                </div>
                            </li> -->
                            <li class="for-mobile"><button class="navbar-toggler" type="button"
                                    data-toggle="collapse" data-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="search-form-wrapper">
                <!-- <form class="search-header-form" method='post'>
                    @csrf
                    <input type="text" placeholder="Search.." id="seach-box" name="search" class="header-search" onKeyUp="getListing()">
                    <button type="submit" class="header-search-btn"><i class="fa fa-search"></i></button>
                </form> -->
                <form class="search-header-form" method="get" action="{{route('search')}}">
                    <button type="submit" class="header-search-btn"><i class="fa fa-search"></i></button>
                    <input type="hidden" name="_token" value="3sdhSaOUIExthWYi4zQBA4umcTToLKYrhc1X89A4">                    
                    <input autofocus type="text" placeholder="@lang('news.keywordPlaceholder')" id="search-box" name="search" class="header-search">
                </form>
            </div>
            
        </div>
    </div>
    <!-- mid header ends -->
    <!-- header navigations -->
    @php
        $locale =  LaravelLocalization::getCurrentLocale();
        $discover_algeria_menus = getDiscoverAlgeriaContent();
        $resource_menu = getResourcesContent();
    @endphp
    <div class="global-nav__mobile-overlay"></div>
    <div class="menu_wrap">
        <div class="container">
            <nav class="main-navigation navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse main-navigation__elements" id="navbarSupportedContent">
                <ul class="navbar-nav">
                <li class="nav-item {{ (request()->is('/') || request()->is($locale) || request()->is($locale.'/signup') || request()->is('signup')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('customer-home')}}">@lang('navbar.home') <span class="sr-only">@lang('navbar.current')</span></a>
                </li>
                @if(!$discover_algeria_menus->isempty())
                <li class="nav-item dropdown {{ ($request_route == 'discover-algeria') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="{{route('discover-algeria',$discover_algeria_menus[0]->content_key)}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.discoverAlgeria')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                        <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">

                            @foreach($discover_algeria_menus as $menu)
                                <a class="dropdown-item" href="{{route('discover-algeria',$menu->content_key)}}">{{ ucwords($menu->localeAll[0]->title) }}</a>
                            @endforeach
                                <!-- <a class="dropdown-item" href="{{route('discover-algeria',['key'=>'about_algeria'])}}">@lang('navbar.about_algeria')</a>
                                <a class="dropdown-item" href="{{route('discover-algeria',['key'=>'living_in_algeria'])}}">@lang('navbar.living_in_algeria')</a>
                                <a class="dropdown-item" href="{{route('discover-algeria',['key'=>'why_investing_in_algeria'])}}">@lang('navbar.why_investing_in_algeria')</a>
                                <a class="dropdown-item" href="{{route('discover-algeria',['key'=>'growth_markets'])}}">@lang('navbar.growth_markets')</a>
                                <a class="dropdown-item" href="{{route('discover-algeria',['key'=>'indicators'])}}">@lang('navbar.indicators')</a>
                            -->
                        </div>
                </li>
                @else
                <li class="nav-item {{ ($request_route == 'discover-algeria') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('discover-algeria')}}">@lang('navbar.discoverAlgeria')</a>
                </li>
                @endif
                @if($resource_menu != null)
                    @if(!$resource_menu->subpages->isEmpty())
                    <li class="nav-item dropdown {{ ($request_route == 'business-environment') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="resources-menu"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.business_environment')</a><span class="drop-ar-down" id="discover-re"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                            <div class="dropdown-menu" id="dr-re" aria-labelledby="resources-menu">

                                @foreach($resource_menu->subPages as $resource)
                                    <a class="dropdown-item" href="{{route('business-environment',['key'=>$resource->page_key])}}">{{ ucwords($resource->localeAll[0]->title) }}</a>
                                @endforeach
                        </div>
                    </li>
                    @else
                    <li class="nav-item {{ ($request_route == 'business-environment') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('business-environment')}}">@lang('navbar.business_environment')</a>
                    </li>
                    @endif
                @endif
                <li class="nav-item dropdown {{ ($request_route == 'news') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('news-list')}}">@lang('navbar.news')</a>
                </li>

                <li class="nav-item dropdown {{ ($request_route == 'event') || ($request_route == 'upcoming-event') || ($request_route == 'past-event') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="{{route('event-list')}}" id="event-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.events')</a><span class="drop-ar-down" id="discover-ev"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                        <div class="dropdown-menu" 
                        id="dr-ev" 
                        aria-labelledby="event-menu">
                            <a class="dropdown-item" href="{{route('event-list')}}">@lang('navbar.events')</a>
                            <a class="dropdown-item" href="{{route('upcoming-event-list')}}">@lang('navbar.upcomming_events')</a>
                            <a class="dropdown-item" href="{{route('past-event-list')}}">@lang('navbar.past_events')</a>
                        </div>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{route('business-directory')}}" id="bd-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.businessDirectory')</a><span class="drop-ar-down" id="discover-bd"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                        <div class="dropdown-menu" 
                        id="dr-bd" 
                        aria-labelledby="bd-menu">
                            <a class="dropdown-item" href="{{route('contact-file')}}">@lang('navbar.contact_file') </a>
                            <a class="dropdown-item" href="javascript:void(0);">@lang('navbar.advertinsing')</a>
                            <a class="dropdown-item" href="javascript:void(0);">@lang('navbar.visibility_pack')</a>
                        </div>
                </li> -->
                <li class="nav-item {{ ($request_route == 'business-opportunity') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('business-opportunity')}}">@lang('navbar.businessOpportunities')</a>
                </li>
               
                <li class="nav-item {{ ($request_route == 'business-intelligence') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('business-intelligence')}}">@lang('navbar.businessIntelligence')</a>
                </li>
                
                <li class="nav-item {{ ($request_route == 'our-services') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('our-services')}}">@lang('navbar.ourServices')</a>
                </li>

                <li class="nav-item nav-item {{ ($request_route == 'contactus') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('contactus')}}">@lang('navbar.contactUs')</a>
                </li>
                </ul>

            </div>
            </nav>
        </div>
    </div>
 </header>

