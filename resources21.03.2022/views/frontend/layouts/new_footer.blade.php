@php
$facebook_url = null;
$linkedin_url = null;
$youtube_url = null;
$twitter_url = null;
$copyright = null;
$rss_feed = null;

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
    if($setting->key == 'copyright')
        $copyright= $setting->value;
    if($setting->key == 'rss_feed')
        $rss_feed= $setting->value;
}

$discover_algeria_menus = getDiscoverAlgeriaContent();
$resource_menu = getResourcesContent();
@endphp
<table style="border:0" width="100%">
    <tr> 
    <td style="background-color:#006EA5">
        <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="footer-top">
                <div class="container">
                <div class="row">
                @if(!$discover_algeria_menus->isempty())
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="footer-top__elements">
                        <ul class="footer-top__elements--menu">
                            <h6 class="text-white mb-2 sub-heading">@lang('footer.discoverAlgeria')</h6>
                            @foreach($discover_algeria_menus as $menu)
                            <li><a href="{{route('discover-algeria',$menu->content_key)}}">{{ ucwords($menu->localeAll[0]->title) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @if($resource_menu != null)
                    @if(!$resource_menu->subpages->isEmpty())
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="footer-top__elements">
                            <ul class="footer-top__elements--menu">
                                <h6 class="sub-heading text-white mb-2">@lang('footer.business_environment')</h6>
                                @foreach($resource_menu->subPages as $resource)
                                    <li><a href="{{route('business-environment',['key'=>$resource->page_key])}}">{{ ucwords($resource->localeAll[0]->title) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                @endif
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer-top__elements">
                        <ul class="footer-top__elements--menu">
                            <h6 class="sub-heading text-white mb-2">@lang('footer.ourServices')</h6>
                            <li><a href="{{route('news-list')}}">@lang('footer.news')</a></li>
                            <li><a href="{{route('event-list')}}">@lang('footer.events')</a></li>
                            <li><a href="{{route('business-directory')}}">@lang('footer.business_directory')</a></li>
                            <li><a href="{{route('business-opportunity')}}">@lang('footer.business_opportunities')</a></li>
                            <li><a href="{{route('business-intelligence')}}">@lang('footer.business_intelligence')</a></li>
                        </ul>
                    </div>
                </div>
                @php
                    $setting = getContactInfo();
                @endphp
                <div class="col-lg-4 col-md-4 col-sm-3 col-6 footer-bottom">
                    <div class="footer-top__elements">
                        <h6 class="sub-heading text-white mb-2">@lang('footer.subscribeNewsletter')</h6>
                        <div class="input-group mb-3">
                            <form class="subscribe_form">
                                <input type="hidden" name="type" value="event" id="event_subscribe">
                                <input type="text" class="form-control col-6" placeholder="@lang('footer.enter_email_address')" id="subscribe-email" name="email">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <button type="button" class="btn btn-primary newsletter_btn footer_event">
                                            <span>
                                                <i class="fa fa-circle-o-notch fa-spin" id="spinner" style="display:none;"></i>
                                                @lang('footer.subscribe')
                                            </span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <span  id="email-error" role="alert"></span>
                        <span  id="success_event" style="display:none;">
                        </span>
                        <span  id="footer_subscirbed_already" style="display:none;">
                        </span>
                        <p class="i2b">@lang('footer.i2b') <a href="#"><img src="{{ asset('css/images/brand-test.png') }}" alt="i2b" class="img-fluid ml-2 mr-2" style="max-width: 52px;"></a></p>
                        @if($copyright != null)
                            <p class="mt-3 iso_cert">{{ $copyright }}</p>
                        @endif
                    </div>
                </div>

            </div>
                </div>
            </div>
            
            
            <div class="header-area">
                <div class="main-header ">
                    <div class="header-top d-lg-block d-none">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left d-flex justify-content-center">
                                <!-- Social -->
                                <div class="header-social">
                                @if($facebook_url != null)
                                    <a href="{{ $facebook_url }}" target="_blank"><i class="fab fa-facebook-f"></i></a>&nbsp
                                    @endif
                                    @if($linkedin_url != null)
                                    <a  href="{{ $linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>&nbsp
                                    @endif
                                    @if($youtube_url != null)
                                    <a href="{{ $youtube_url }}" target="_blank"><i class="fab fa-youtube"></i></a>&nbsp
                                    @endif
                                    @if($twitter_url != null)
                                    <a href="{{ $twitter_url }}" target="_blank"><i class="fab fa-twitter"></i></a>&nbsp&nbsp 
                                    @endif        
                                </div>
                                </div>
                                <div class="header-info-mid">
                                <!-- logo -->
                                <div class="logo">
                                    <a href="index.html"><img src="{{ asset('css/front-end/home_page_styles/assets/img/logo/logo.png')}}" alt=""></a>
                                </div>
                                </div>
                                <div class="header-info-right d-flex align-items-center">
                                <ul>
                                    <li><a href="#">@lang('navbar.who_are_we')</a></li>
                                    <li><a href="{{route('contactus')}}">@lang('navbar.contact')</a></li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="header-bottom header-bottom2 ">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <!-- Main-menu -->
                                <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                    <li>
                                        <a href="#">@lang('footer.sitemap')</a></li>
                                        <li><a href="{{ route('privacy-policy') }}">@lang('footer.privacyPolicy')</a></li>
                                        <li><a href="{{ route('terms-of-service')}}">@lang('footer.termsService')</a></li>
                                        <li><a href="{{ route('legal-notice') }}">@lang('footer.legalNotice')</a></li>
                                    </ul>
                                </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row align-items-center justify-content-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right text-center">
                            <p>
                            <font style="font-size:13px;text-transform:none;color:white"> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            @lang('footer.algeria_invest') &copy;<script>document.write(new Date().getFullYear());</script>@lang('footer.copyright') | @lang('footer.i2b') <strong>i2B</strong>
                            </font>
                            </p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
        </footer>

    </td>
    </tr>
</table>
