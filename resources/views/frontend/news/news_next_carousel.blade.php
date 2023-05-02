<div class="carousel-item active" id="carousel-item{{$page}}">
    <div class="news-area-post-elements mb-3">

        <div class="row">
            <div class="co-md-12 col-lg-12">
                <div class="news-post">
                    <div class="container">
                        @if($news->isEmpty())
                        <div class="row mt-3 mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <p class="news-post-caption">@lang('news.noNewsFound')</p>
                            </div>
                        </div>
                        @else
                        @foreach($news as $newsData)
                        <div class="row mt-3 {{($loop->iteration == 5 || $loop->last)? 'mb-3':''}}">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-12 no-padding-right">
                                <div class="news-post__left">
                                    <div class="ratio-1x1">
                                        <div class="ratio-inner">
                                            <!-- <img src="" alt="eco-news" class="img-fluid eco-news-img"> -->
                                            <img src="{{asset('storage/uploads/news_logos/'.$newsData->news_logo)}}" alt="eco-news" class="img-fluid eco-news-img">
                                        </div>
                                    </div>
                                    @if($newsData->is_premium == 1)
                                    <a href="#" class="premium-news">@lang('news.premiumNews')</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-9 col-12">
                                <div class="news-post__right">
                                    <ul class="tags-top">
                                        @foreach($newsData->sectors as $sector)
                                        @break($loop->iteration == 4)
                                        <li> <a href="#" class="yellow-box">{{$sector->localeAll[0]->name}}</a></li>
                                        @endforeach
                                    </ul>

                                    <p class="news-text text-truncate">
                                        {{ html_entity_decode(strip_tags($newsData->localeAll[0]->title)) }}
                                    </p>
                                    <p class="news-post-caption text-limit">{{ html_entity_decode(strip_tags($newsData->localeAll[0]->description)) }}</p>
                                    <div class="source">
                                        <p class="source-caption">{{-- @lang('news.source') --}}<img src="{{asset('storage/uploads/news_source/logo/'.$newsData->newsSource->logo)}}" height="30px" width="30px" class="img-fluid"></p>
                                        <div class="heading-with-arrow">
                                            <a href="{{route('news-detail', [$newsData->page_key])}}" class="more-data">@lang('news.seeMore')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
