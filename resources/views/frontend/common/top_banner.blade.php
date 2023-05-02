
<div class="business-banner">
    @php
        $adv = getAdvertisement('top-header',$sidebar_key);
    @endphp
    @if($adv != null)
    @php
    if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
        $adv['url'] = "http://" . $adv['url'];
    }
    @endphp
    <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
    @endif
</div>