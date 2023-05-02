

<li>
    <div data-network="facebook" class="st-custom-button circle-fb">
        <a href="javascript:void(0);">
            <img src="{{asset('css/images/fb.svg')}}">
        </a>
    </div>
</li>


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



<li>
    <div data-network="email" class="st-custom-button circle-mail">
        <a href="javascript:void(0);">
            <img src="{{asset('css/images/mail.svg')}}">
        </a> 
    </div>
</li>
<!--@if(getMessangerAppId() != null)
<li>
    <div  class="st-custom-button circle-msg">
        <a href="https://www.facebook.com/dialog/send?app_id={{getMessangerAppId()}}&link={{url()->full()}}&redirect_uri={{url()->full()}}" target="_blank">
            <img src="{{asset('css/images/messenger.svg')}}">
        </a>
    </div>
</li>
@endif -->
<li class="circle-send dropdown">
    <button href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{asset('css/images/send.svg')}}">
    </button>
    <div class="dropdown-menu">
        <p class="more-drop mb-2">@lang('share.more_options')</p>
        <div data-network="linkedin" class="st-custom-button circle">
            <a class="dropdown-item" href="javascript:void(0);">
                <span class="in-drop">
                    <img src="{{asset('css/images/linkedin-drop.svg')}}" class="img-fluid">
                </span>@lang('share.share_on_linkedin')
            </a> 
        </div>
        <div data-network="twitter" class="st-custom-button circle">
            <a class="dropdown-item" href="javascript:void(0);">
                <span class="in-drop">
                    <img src="{{asset('css/images/twitter-drop.svg')}}" class="img-fluid">
                </span>@lang('share.share_on_twitter')
            </a> 
        </div>
        <!--<a class="dropdown-item copy_link" href="javascript:void(0);" data-link="{{url()->full()}}">
            <span class="in-drop">
                <img src="{{asset('css/images/link-drop.svg')}}" class="img-fluid">
            </span>@lang('share.copy_link')
        </a> -->
    </div>
</li>
