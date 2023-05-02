
<li>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6183e5149709b0001266ba91&product=inline-share-buttons" async="async"></script>
    <?php
    $Url = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    $Url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]
    ;
     ?>













   <!-- <div class="fb-share-button" data-href="<?php echo $Url; ?>" data-layout="button_count" data-size="small">

        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $Url; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><img src="{{asset('css/images/fb.svg')}}" class="img-fluid"></a></div> -->
   <div data-network="facebook" class="st-custom-button circle-fb">

        <a target="_blank" href="javascript:void(0);">
            <img src="{{asset('css/images/fb.svg')}}" class="img-fluid">
        </a>
    </div>
</li>
<li>
    <div data-network="email" class="st-custom-button circle-mail">
        <a href="javascript:void(0);">
            <img src="{{asset('css/images/mail.svg')}}">
        </a>
    </div>
</li>





@if(getMessangerAppId() != null)
<!--<li>
    <div  class="st-custom-button circle-msg">
        <a href="https://www.facebook.com/dialog/send?app_id={{getMessangerAppId()}}&link={{url()->full()}}&redirect_uri={{url()->full()}}" target="_blank">
            <img src="{{asset('css/images/messenger.svg')}}">
        </a>
    </div>
</li> -->
@endif
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
       <div data-network="facebook" class="st-custom-button circle">
            <a class="dropdown-item" href="javascript:void(0);">
                <span class="in-drop">
                    <img src="{{asset('css/images/fb.svg')}}" class="img-fluid">
                </span> Partager sur facebook
            </a>
        </div>
        <!-- <a class="dropdown-item copy_link" href="javascript:void(0);" data-link="{{url()->full()}}">
            <span class="in-drop">
                <img src="{{asset('css/images/link-drop.svg')}}" class="img-fluid">
            </span> @lang('share.copy_link') </p>
        </a> -->


        <style>
            .copy_link{
                text-transform: lowercase!important;
            }
        </style>
    </div>
</li>
