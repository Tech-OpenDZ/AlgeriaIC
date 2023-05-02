
@if($latest_news->isEmpty())
<div class="row mt-3 mb-3">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <p class="news-post-caption">@lang('news.noNewsFound')</p>
    </div>
</div>





@else
<div class="carousel-inner mt-3">
    @for($i = 0; $i < count($latest_news);)
    <div class="carousel-item @if($i==0) active @endif">
        <div class="row mb-3">
           
            <div class="col-xl-6 col-lg-12 col-md-12 mt-3">
                <div class="news-post-outer news-post-height">
                    <div class="news-post__left">
                        <div class="ratio-16x9">
                            <div class="ratio-inner">
                            
                                @if($latest_news[$i]->is_premium == 1)
                                      @if(!Auth::guard('customer')->check())
                                        <a href="{{route('premium-news_free-detail', [$latest_news[$i]->page_key])}}">
                                            <img src="{{asset('storage/uploads/news_logos/'.$latest_news[$i]->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                        </a>
                                        @else
                                        <a href="{{route('premium-news-detail', [$latest_news[$i]->page_key])}}">
                                            <img src="{{asset('storage/uploads/news_logos/'.$latest_news[$i]->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                        </a>
                                        @endif
                                @else
                                <a href="{{route('news-detail', [$latest_news[$i]->page_key])}}">
                                    <img src="{{asset('storage/uploads/news_logos/'.$latest_news[$i]->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                </a>
                                @endif
                           
                            </div>
                        </div>
                    </div>
                    <div class="news-post__right">
                        <ul class="tags-top">
                            @foreach($latest_news[$i]->sectors as $sector)
                            @break($loop->iteration == 4)
                            <li> <a href="{{url()->current().'?page=1&keyword=&sector%5B%5D='.$sector->id}}" class="yellow-box">{{$sector->localeAll[0]->name}}</a></li>
                            @endforeach
                        </ul>
                        <p class="news-time">{{Carbon\Carbon::parse($latest_news[$i]->created_at)->diffForHumans()}}</p>
                        @if($latest_news[$i]->is_premium == 1)
                        @if(!Auth::guard('customer')->check())
                        <a href="{{route('premium-news_free-detail', [$latest_news[$i]->page_key])}}">
                            <h6 class="news-text-heading text-limit-news" style="-webkit-line-clamp:3">{{ html_entity_decode(strip_tags($latest_news[$i]->localeAll[0]->title)) }}</h6>
                        </a>
                        @else
                        <a href="{{route('premium-news-detail', [$latest_news[$i]->page_key])}}">
                            <h6 class="news-text-heading text-limit-news" style="-webkit-line-clamp:3">{{ html_entity_decode(strip_tags($latest_news[$i]->localeAll[0]->title)) }}</h6>
                        </a>
                        @endif
                        <span>
                                <a href="#" class="premium-eco">@lang('news.premiumNews')</a>
                            </span>       
                         @else
                        <a href="{{route('news-detail', [$latest_news[$i]->page_key])}}">
                            <h6 class="news-text-heading text-limit-news" style="-webkit-line-clamp:3">{{ html_entity_decode(strip_tags($latest_news[$i]->localeAll[0]->title)) }}</h6>    
                        </a>
                        @endif
                          
                             
                        </a>
                   
                        <a href="{{$latest_news[$i]->source_link}}" target="_blank"><p class="source-news small-box-source"><img src="{{asset('storage/uploads/news_source/logo/'.$latest_news[$i]->newsSource->logo)}}"  alt="algeria-logo" class=""></p></a>
                    </div>
                </div>
            </div>
            @php
                $i++;
            @endphp
            <div class="col-xl-6 col-lg-12 col-md-12 mt-3">
                @if($i < count($latest_news))
                <div class="news-post-outer news-post-height">
                    <div class="news-post__left">
                        <div class="ratio-16x9">
                            <div class="ratio-inner">
                            
                                @if($latest_news[$i]->is_premium == 1)
                                      @if(!Auth::guard('customer')->check())
                                        <a href="{{route('premium-news_free-detail', [$latest_news[$i]->page_key])}}">
                                            <img src="{{asset('storage/uploads/news_logos/'.$latest_news[$i]->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                        </a>
                                        @else
                                        <a href="{{route('premium-news-detail', [$latest_news[$i]->page_key])}}">
                                            <img src="{{asset('storage/uploads/news_logos/'.$latest_news[$i]->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                        </a>
                                        @endif
                                @else
                                <a href="{{route('news-detail', [$latest_news[$i]->page_key])}}">
                                    <img src="{{asset('storage/uploads/news_logos/'.$latest_news[$i]->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                </a>
                                @endif
                           
                            </div>
                        </div>
                    </div>
                    <div class="news-post__right">
                        <ul class="tags-top">
                            @foreach($latest_news[$i]->sectors as $sector)
                            @break($loop->iteration == 4)
                            <li> <a href="{{url()->current().'?page=1&keyword=&sector%5B%5D='.$sector->id}}" class="yellow-box">{{$sector->localeAll[0]->name}}</a></li>
                            @endforeach
                        </ul>
                        <p class="news-time">{{Carbon\Carbon::parse($latest_news[$i]->created_at)->diffForHumans()}}</p>
                        @if($latest_news[$i]->is_premium == 1)
                        @if(!Auth::guard('customer')->check())
                        <a href="{{route('premium-news_free-detail', [$latest_news[$i]->page_key])}}">
                            <h6 class="news-text-heading text-limit-news" style="-webkit-line-clamp:3">{{ html_entity_decode(strip_tags($latest_news[$i]->localeAll[0]->title)) }}</h6>
                        </a>
                        @else
                        <a href="{{route('premium-news-detail', [$latest_news[$i]->page_key])}}">
                            <h6 class="news-text-heading text-limit-news" style="-webkit-line-clamp:3">{{ html_entity_decode(strip_tags($latest_news[$i]->localeAll[0]->title)) }}</h6>
                        </a>
                        @endif
                        <span>
                                <a href="#" class="premium-eco">@lang('news.premiumNews')</a>
                            </span>       
                         @else
                        <a href="{{route('news-detail', [$latest_news[$i]->page_key])}}">
                            <h6 class="news-text-heading text-limit-news" style="-webkit-line-clamp:3">{{ html_entity_decode(strip_tags($latest_news[$i]->localeAll[0]->title)) }}</h6>    
                        </a>
                        @endif
                          
                             <br> <br> 
                        </a>
                   
                        <a href="{{$latest_news[$i]->source_link}}" target="_blank"><p class="source-news small-box-source"><img src="{{asset('storage/uploads/news_source/logo/'.$latest_news[$i]->newsSource->logo)}}"  alt="algeria-logo" class=""></p></a>
                    </div>
                </div>
                @endif
                @php
                    $i++;
                @endphp
                
                   
            </div>
            
        </div>
    </div>

    @endfor
        <style>
            .news-post-outer .news-post__right .source-news img {
                height: 56px!important;
                width: 70px!important;
            }
        </style>
</div>
@endif
