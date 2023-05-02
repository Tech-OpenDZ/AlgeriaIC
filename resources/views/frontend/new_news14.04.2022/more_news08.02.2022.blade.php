@if(count($more_news) == 0)
<div class="row mt-3 mb-3">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <p class="news-post-caption">@lang('news.noNewsFound')</p>
    </div>
</div>
@else
<div class="row more-news-box">
    @foreach($more_news as $more_news_data)
        @foreach($more_news_data as $newsData)
            @if($newsData != null)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mt-3">
                    @if ($newsData->is_premium == 1)
                    <div class="news-post-outer news-post-height">

                        <div class="news-post__left news-small-box">

                            <div class="ratio-1x1">

                                <div class="ratio-inner">
                                    <a href="{{route('premium-news-detail', [$newsData->page_key])}}">
                                        <img src="{{asset('storage/uploads/news_logos/'.$newsData->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="news-post__right latest-more-news">
                            <ul class="tags-top">
                                @foreach($newsData->sectors as $sector)
                                    @foreach($sector->localeAll as $localeData)
                                        @if($localeData->locale == $currentLocale)
                                        <li> <a href="{{url()->current().'?page=1&keyword=&sector%5B%5D='.$sector->id}}" class="yellow-box">{{$localeData->name}}</a></li>
                                        @endif
                                    @endforeach
                                @break($loop->iteration == 2)
                                @endforeach
                            </ul>
                            <p class="news-time">{{Carbon\Carbon::parse($newsData->created_at)->diffForHumans()}}</p>
                            <a href="{{route('premium-news-detail', [$newsData->page_key])}}">
                                <h6 class="news-text-heading-two text-limit-four heading-four">
                                    @if ($newsData->is_premium == 1)
                                        <span>
                                            <a href="#" class="premium-eco">@lang('news.premiumNews')</a>
                                        </span>
                                    @endif
                                        {{ isset($newsData->localeAll[0]->title) ? html_entity_decode(strip_tags($newsData->localeAll[0]->title)) : '' }}
                                </h6>
                            </a>
                            <a href="{{$newsData->source_link}}" target="_blank"><p class="source-news"><img src="{{asset('storage/uploads/news_source/logo/'.$newsData->newsSource->logo)}}"  alt="algeria-logo" class="" height="24px" width="60px"></p></a>




                        </div>
                    </div>
                        @else
                        <div class="news-post-outer news-post-height">

                            <div class="news-post__left news-small-box">

                                <div class="ratio-1x1">

                                    <div class="ratio-inner">
                                        <a href="{{route('news-detail', [$newsData->page_key])}}">
                                            <img src="{{asset('storage/uploads/news_logos/'.$newsData->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="news-post__right latest-more-news">
                                <ul class="tags-top">
                                    @foreach($newsData->sectors as $sector)
                                        @foreach($sector->localeAll as $localeData)
                                            @if($localeData->locale == $currentLocale)
                                                <li> <a href="{{url()->current().'?page=1&keyword=&sector%5B%5D='.$sector->id}}" class="yellow-box">{{$localeData->name}}</a></li>
                                            @endif
                                        @endforeach
                                        @break($loop->iteration == 2)
                                    @endforeach
                                </ul>
                                <p class="news-time">{{Carbon\Carbon::parse($newsData->created_at)->diffForHumans()}}</p>
                                <a href="{{route('news-detail', [$newsData->page_key])}}">
                                    <h6 class="news-text-heading-two text-limit-four heading-four">
                                        @if ($newsData->is_premium == 1)
                                            <span>
                                            <a href="#" class="premium-eco">@lang('news.premiumNews')</a>
                                        </span>
                                        @endif
                                        {{ isset($newsData->localeAll[0]->title) ? html_entity_decode(strip_tags($newsData->localeAll[0]->title)) : '' }}
                                    </h6>
                                </a>
                                <a href="{{$newsData->source_link}}" target="_blank"><p class="source-news"><img src="{{asset('storage/uploads/news_source/logo/'.$newsData->newsSource->logo)}}"  alt="algeria-logo" class="" height="24px" width="60px"></p></a>




                            </div>
                        </div>
                        @endif
                </div>
            @endif
        @endforeach 
    @endforeach
</div>
@endif




