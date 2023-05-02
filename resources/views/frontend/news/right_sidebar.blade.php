<div class="col-lg-4 col-md-4">
    <div class="discover-algeria__right">
        <div class="search-sub-form">
            <form class="subscribe_form" method="get" action="{{ route('search') }}">
                <div class="input-group">
                    <input type="text" class="form-control col-lg-8 col-md-8 col-12" placeholder="@lang('news.sideSearchPlaceholder')" id="side-search" name="search">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <button type="submit" class="btn btn-primary search_btn">
                            @lang('news.search')
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="discover-algeria__right">
        @php
            $adv = getAdvertisement('sidebar-top','discover_algeria');
            if($adv != null) { 
                if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                        $adv['url'] = "http://" . $adv['url'];
                }
            }
        @endphp
        @if($adv != null)
        <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
        @endif
        <div class="join-algeria">
            <h6 class="mb-3 sub-heading"> @lang('news.joinAlgeriaNetwork')</h6>
            <a href="#" class="register"> @lang('news.join')</a>
        </div>
    </div>
    <div class="discover-algeria__right mt-4">
        @php
            $adv = getAdvertisement('sidebar-bottom','discover_algeria');
        @endphp
        <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>

        <div class="join-algeria">
            <h6 class="mb-3 sub-heading">@lang('news.downloadResources'):<br> XXXXXXXX</h6>
            <a href="#" class="register">@lang('news.join')</a>
        </div>
    </div>
    <div class="discover-algeria__right mt-4">

        <div class="join-algeria">
            <h6 class="sub-heading mb-4"> @lang('news.businessServices')</h6>
            <a href="#" class="register view-services"> @lang('news.viewServices')</a>
        </div>
    </div>
    <div class="discover-algeria__right mt-4">

        <div class="join-algeria">
            <h6 class="sub-heading mb-4">@lang('news.contactSupport')</h6>
            <a href="#" class="register view-services">@lang('news.viewDetails')</a>
        </div>
    </div>
</div>
