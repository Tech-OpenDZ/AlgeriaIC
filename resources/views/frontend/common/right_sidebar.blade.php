
@php
$sidebar_var = ['news', 'news_details'];
@endphp
@if (!in_array($sidebar_key,$sidebar_var))
<div class="col-lg-3 col-md-3 sidebar-data">
    <div class="discover-algeria__right">
       
	 
	   
	   
	  
    </div>
    
    <div class="discover-algeria__right sidebar-space">
        @php
            $adv = getAdvertisement('sidebar-top',$sidebar_key);
        @endphp


        @if($adv != null)
            @php
            if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                $adv['url'] = "http://" . $adv['url'];
            }
            @endphp
        <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
    
            @if(!Auth::guard('customer')->check())
                <div class="join-algeria">
                    <h6 class="mb-3 sub-heading"> @lang('news.joinAlgeriaNetwork')</h6>
                    <a href="{{route('customer-register')}}" class="register"> @lang('news.join')</a>
                </div>
            @endif
        @endif
    </div>
   

    
    <div class="discover-algeria__right sidebar-space">
        @php
            $adv = getAdvertisement('sidebar-bottom',$sidebar_key);
        @endphp
        @if($adv != null)
            @php
            if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                $adv['url'] = "http://" . $adv['url'];
            }
            @endphp
        <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
            @if(!Auth::guard('customer')->check())
                <div class="join-algeria">
                    <h6 class="mb-3 sub-heading">@lang('news.downloadResources'):<br> XXXXXXXX</h6>
                    <a href="{{route('customer-register')}}" class="register">@lang('news.join')</a>
                </div>
            @endif
        @endif
    </div>
    
    
    <div class="discover-algeria__right sidebar-space">

        <div class="join-algeria">
            <h6 class="sub-heading mb-4"> @lang('news.businessServices')</h6>
            <a href="{{route('our-services')}}" target="_blank" class="register view-services"> @lang('news.viewServices')</a>
        </div>
    </div>
    @if(in_array($sidebar_key,$sidebar_var))
    <div class="discover-algeria__right sidebar-space">
        <div class="join-algeria">
            <h6 class="sub-heading mb-4">@lang('news.contactSupport')</h6>
            <a href="#" class="register view-services">@lang('news.viewDetails')</a>
        </div>
    </div>
    @endif
</div>
@else
    <div class="col-lg-12 col-md-12 sidebar-data new-sidebar">
        <div class="col-lg-12 col-md-12 col-sm-12 sidebar-row">
            <div class="row">
                @php
                    $adv = getAdvertisement('sidebar-top',$sidebar_key);
                @endphp
                @if($adv !=null)
                    @php
                        if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                            $adv['url'] = "http://" . $adv['url'];
                        }
                    @endphp
                <div class="col-lg-12 col-md-12 col-sm-6">
                    <div class="discover-algeria__right for-ad-img">

                        <a href="{{$adv['url']}}"  target="_blank" onclick="adClick('{{$adv['ad_id']}}')">
                            <img src="{{ $adv['image'] }}" alt="way-to-success" class="img-fluid success">
                        </a>
                    </div>
                </div>
                @endif
               <!-- <div class="col-lg-12 col-md-12 col-sm-6">
                    <div class="discover-algeria__right mt-4">
                        <div class="generate-review-box">
                            <img src="{{asset('images/generate-intersection.svg')}}" class="img-fluid intersection-one">
                            <img src="{{asset('images/generate-intersection2.svg')}}" class="img-fluid intersection-two">
                            <div class="col-lg-12 p-0">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-3 col-md-3 col-sm-3 col-4 d-flex align-items-center">
                                        <div class="news-fig text-center">
                                            <img src="{{asset('images/news-sidebar.svg')}}" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-9 col-md-9 col-sm-9 col-8">
                                        <div class="news-generate">
                                            <h6 class="sub-heading text-white mb-2">@lang('news.generateYour') @lang('news.freeReview')</h6>
                                            <a href="{{route('press-review')}}" target="_blank" class="generate-yellow">@lang('news.generateBTN')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                @if (!$popularNews->isEmpty())
                <div class="col-lg-12 col-md-12 col-sm-6 ">
                    <div class="discover-algeria__right">

                        <ul class="popular-articles">
                            <h4 class="main-heading mb-2">@lang('news.popularArticles')</h4>
                            @foreach($popularNews as $news)
                            <li class="pop-listing">
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4 listing-articles d-flex align-items-center">
                                    <a href="{{$news->source_link}}" target="_blank"><p class="source-news small-box-source"><img src="{{asset('storage/uploads/news_source/logo/'.$news->newsSource->logo)}}"  alt="algeria-logo" class="" style="width:85px"></p></a>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-8 listing-details">
                                        <a href="{{route('news-detail', [$news->page_key])}}" class="popular-artcle-title text-limit-three">
                                            {{ html_entity_decode(strip_tags($news->localeAll[0]->title)) }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                <div class="col-lg-12 col-md-12 col-sm-6">
                    <div class="discover-algeria__right mt-4">

                        <div class="generate-review-box-green">
                            <img src="{{ asset('images/generate-intersection.svg')}}" class="img-fluid intersection-one">
                            <img src="{{ asset('images/generate-intersection2.svg')}}" class="img-fluid intersection-two">
                            <div class="col-lg-12 p-0">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-flex align-items-center">
                                        <div class="news-fig">
                                            <img src="{{ asset('images/green-mailbox.svg')}}" class="img-fluid">
                                            <img src="{{ asset('images/mail-thread.svg')}}" class="img-fluid mail-thread">
                                            <img src="{{ asset('images/mail-arrow.svg')}}" class="img-fluid mail-arrow">
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9 d-flex align-items-center">
                                        <div class="news-generate">
                                            <h6 class="sub-heading text-white mb-2">@lang('home.economic_newsletter')</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-news-letter">
                                    <form class="subscribe_form sidebar_form yellow_btn">
                                        <div class="input-group">
                                            <input type="hidden" name="type" value="business" class="business_subscribe">
                                            <input type="text" class="form-control col-8 economic_email"placeholder="@lang('newsletter.emailPlaceholder')"  name="email">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <!-- <a href="javascript:void(0)" class="economic_submit">@lang('home.subscribe')</a></span> -->
                                                    <button type="submit" class="btn btn-primary newsletter_btn economic_submit"><i id="spinner-economic-newsletter" class="fa fa-circle-o-notch fa-spin" style="display:none"></i> @lang('home.subscribe')</button>
                                            </div>
                                            <p class="alert-sidebar">
                                                <span  id="economic_success" style="display: none"></span>
                                                <span class="" id="economic_error" role="alert" style="display: none"></span>
                                                <span class="" id="economic_sub_already"></span>
                                            </p>
                                        </div>
                                    </form>
                                </div>
								
                            </div>
                        </div>
                    </div>
				<br>
                </div>
            </div>
        </div>
    </div>
@endif

<style>
.pop-listing {
    padding-bottom: 5px!important;
   
}

</style>