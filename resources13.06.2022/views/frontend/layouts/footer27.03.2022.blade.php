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

<footer class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                @if(!$discover_algeria_menus->isempty())
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer-top__elements">
                        <ul class="footer-top__elements--menu">
                            <h6 class="text-white mb-2 sub-heading">@lang('footer.discoverAlgeria')</h6>
                            @foreach($discover_algeria_menus as $menu)
                            <li><a href="{{route('discover-algeria',$menu->content_key)}}">{{ $menu->localeAll[0]->title }}</a></li>
                            @endforeach
                        </ul>
                        <br>
                    </div>
                </div>

                @endif
                @if($resource_menu != null)
                    @if(!$resource_menu->isEmpty())
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="footer-top__elements">
                            <ul class="footer-top__elements--menu">
                                <h6 class="sub-heading text-white mb-2">@lang('footer.business_environment')</h6>
                                @if(!Auth::guard('customer')->check())
                                @foreach($resource_menu as $resource)
                                    <li><a href="{{route('business-environment2',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a></li>
                                @endforeach
                                @else
                                @foreach($resource_menu as $resource)
                                    <li><a href="{{route('business-environment',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a></li>
                                @endforeach
                                @endif
                            </ul>
                            <br>
                        </div>
                    </div>
                    @endif
                @endif

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer-top__elements">
                        <ul class="footer-top__elements--menu">
                            <h6 class="sub-heading text-white mb-2">@lang('footer.ourServices')</h6>
                            <li><a href="{{route('customer-register')}}">@lang('footer.customer_register')</a></li>
                        <li><a href="{{route('business-opportunity')}}">@lang('footer.business_opportunities')</a></li>
					<li><a href="{{route('our-services')}}">@lang('footer.services')</a></li>
                            <li><a href="{{route('premium-news-list')}}">@lang('news.premiumNews')</a></li>
								  <li><a href="{{route('event-list')}}">@lang('footer.events')</a></li>
						    <li><a href="{{route('news-list')}}">@lang('footer.news')</a></li>
                          
                       <!--     <li><a href="{{route('business-directory')}}">@lang('footer.business_directory')</a></li> -->
                          <!--  <li><a href="{{route('business-intelligence')}}">@lang('footer.business_intelligence')</a></li> -->
                       
						
						</ul>
                        <br>
                    </div>

                </div>
                @php
                    $setting = getContactInfo();
                @endphp

                <div class="col-lg-3 col-md-3 col-sm-12 footer-bottom">
                    <div class="footer-top__elements">
                        <h6 class="sub-heading text-white mb-2">@lang('footer.subscribeNewsletter')</h6>
                        <div class="input-group mb-3">
                            <form class="subscribe_form">
                                <input type="hidden" name="type" value="event" id="event_subscribe">
                                <input type="text" class="form-control col-5" placeholder="@lang('footer.enter_email_address')"
								 id="subscribe-email" name="email">
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
						<br>
                        <center> <p class="i2b">@lang('footer.i2b') <a href="#"><img src="{{ asset('css/images/brand-test.png') }}" alt="i2b" class="img-fluid ml-2 mr-2" style="max-width: 52px;"></a></p> </center>
                        @if($copyright != null)
                            <p class="mt-3 iso_cert">{{ $copyright }}</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>


    </div>

    <style>
        .footer-area .footer-bottom .form-control {

            font-size: 0.800rem!important;

        }
    </style>
    @php
        $main_address ='';
        $email = '';
        $telephone = '';
        $fax = '';
        $address_main = '';
        $email_main = '';
        foreach($setting as $setting_data){
            if($setting_data->key == 'address_title_main'){
                $main_address = $setting_data->localeAll[0]->value;
            }else if($setting_data->key == 'telephone_main') {
                $telephone = $setting_data->value;
            }else if($setting_data->key == 'fax') {
                $fax = $setting_data->value;
            }else if($setting_data->key == 'address_main') {
                $address_main = $setting_data->localeAll[0]->value;
            }else if($setting_data->key == 'email_main') {
                $email_main = $setting_data->value;
            }
        }
    @endphp

    <div class="footer-bottom footer_main_bottom">
        <hr class="hr_foot">
        <style>
            .hr_foot{
                border-bottom: 1px solid #4e7cbe!important;

            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    @if($main_address != '')
                        <p class="text-white"><strong>{{  isset($main_address) ? $main_address :'' }}</strong></p>
                    @endif
                    <ul class="footer-bottom__elements mt-3">
                        <li class="d-flex mt-2">
                            @if($telephone != '')
                                <a href="#" class="call-footer">{{ isset($telephone) ? $telephone :'' }}</a>
                            @endif
                            @if($fax != '')
                                <a href="#" class="printer-footer">{{ isset($fax) ? $fax :'' }}</a>
                            @endif
                        </li>
                        @if($email_main != '')
                            <li class="d-flex mt-2">
                                <a href="mailto:contact@algeria-invest.com" class="fax-footer m-0">{{  isset($email_main) ?  $email_main :'' }}</a>
                            </li>
                        @endif
                        @if($address_main != '')
                            <li class="map-footer mt-2"><a href="#">
                                    {{ isset($address_main) ? $address_main :'' }}
                                </a></li>
                        @endif
                    </ul>
                    <br>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h6 class="sub-heading text-white mb-2 text-center1">@lang('footer.follow_us')</h6>
                    <ul class="footer-socialicons text-center1">

                        @if($linkedin_url != null)
                            <li><a href="{{ $linkedin_url }}" target="_blank"><img src="{{ asset('css/images/linkedin-icon.svg') }}" alt="linkedin" class="img-fluid"></a></li>
                        @endif
                        @if($twitter_url != null)
                            <li><a href="{{ $twitter_url }}" target="_blank"><img src="{{ asset('css/images/twitter-icon.svg') }}" alt="twitter" class="img-fluid"></a></li>
                        @endif

                        @if($facebook_url != null)
                            <li><a href="{{ $facebook_url }}" target="_blank"><img src="{{ asset('css/images/facebook-icon.svg') }}" alt="facebopok" class="img-fluid"></a></li>
                        @endif
                        @if($youtube_url != null)
                            <li><a href="{{ $youtube_url }}" target="_blank"><img src="{{ asset('css/images/youtube-icon.svg') }}" alt="youtube" class="img-fluid"></a></li>
                        @endif
                        @if($rss_feed != null)
                            <li><a href="{{ $rss_feed }}" target="_blank"><img src="{{ asset('css/images/wifi.png') }}" alt="wifi" class="img-fluid"></a></li>
                        @endif
                    </ul>
                    <br>

                </div>


                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h6 class="sub-heading text-white mb-2 text-center1">@lang('footer.who_we_are')</h6>
                    <ul class="footer-socialicons text-center1">


                    </ul>
                    <ul class="footer-bottom__elements mt-3">
                        <li class=" mt-2">

                            <a href="{{ route('gallery')}}">@lang('navbar.discover') </a>

                        </li>

                        <li class="mt-2">
                            <a href="{{ route('qhse')}}">QHSE</a>
                        </li>


                        <li class="mt-2">
                            <a href="{{ route('presse')}}">
                                @lang('navbar.presse')
                            </a>
                        </li>

                        <li class="mt-2">
                            <a href="{{route('contactus')}}">
                                @lang('navbar.contact')
                            </a>
                        </li>
                        <br>

                    </ul>
                </div>
<style>
    .call-footer {
        pointer-events: none;
        cursor: default;
    }
     .printer-footer {
        pointer-events: none;
        cursor: default;
    }
    .fax-footer  {
        pointer-events: none;
        cursor: default;
    }
    .map-footer  {
        pointer-events: none;
        cursor: default;
    }
    p.mt-3.iso_cert {

        text-align: center;
    }


    @media screen and (max-width: 784px) {


        .footer-area .footer-bottom__elements .map-footer {

            padding-right: 104px!important;}



    }
</style>
                <div class="col-lg-3 col-md-3 col-sm-12 subscribe-form-footer footer-copywrite__left">
                    <h6 class="sub-heading text-white mb-2 text-center" style="opacity: 0;">
                        <!-- quick links -->
                    </h6>
                    <ul class="bottom-menu">
                        <li>
                            <a href="{{ route('sitemap')}}">@lang('footer.sitemap')</a></li>
                    <!--  <li><a href="{{ route('privacy-policy') }}">@lang('footer.privacyPolicy')</a></li> -->
                        <li><a href="{{ route('legal-notice') }}">@lang('footer.legalNotice')</a></li>
                        <li><a href="{{ route('terms-of-service')}}">@lang('footer.termsService')</a></li>

                    </ul>


                </div>
            </div>

        </div>

    <style>

        @media screen and (max-width: 784px) {
            .footer-area {
                text-align: center;


            }

            .footer-bottom {
                text-align: center !important;

            }

            .sub-heading {
                text-align: center !important;

            }

            .footer-socialicons {
                text-align: center !important;

            }

            .footer-bottom__elements {
                text-align: center !important;

            }

            form.subscribe_form {

                padding-left: 48px;
            }
        }
    </style>
    </div>
</footer>
