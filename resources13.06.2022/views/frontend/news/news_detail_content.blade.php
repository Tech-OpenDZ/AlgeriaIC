<section class="news-artcle mt-4">
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="news-detail-article mt-4">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-4 col-12">
                        <div class="news-detail-article__left">
                            <div class="ratio-1x1">
                                <div class="ratio-inner">
                                    <img src="{{asset('storage/uploads/news_logos/'.$news->news_logo)}}" alt="news-detail" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-8 col-lg-7 col-12">
                        <div class="news-detail-article__right">
                            <ul class="tags-top">
                                @foreach($news->sectors as $sector)
                                <li> <a href="#" class="yellow-box">{{$sector->localeAll[0]->name}}  </a></li>
                                @endforeach
                            </ul>
                            <p class="sub-heading-two">{{$news->localeAll[0]->title}}</p>
                        </div>
                    </div>
                </div>
                <div class="news-article-content pt-3 pb-3">{!! str_replace('<p>&nbsp;</p>', "<br>", $news->localeAll[0]->description) !!}</div>
                <p class="news-article-content">{{date('d M Y', strtotime($news->insertion_date))}} | <img src="{{asset('storage/uploads/news_source/logo/'.$news->newsSource->logo)}}" height="30px" width="30px" class="img-fluid"></p>
                <div class="news-detail-custome-img">
                    <div class="row">
                        @foreach($news->newsImages as $newsImage)
                        <div class="col-md-3 col-sm-3 mt-4">
                            <div class="ratio-1x1">
                                <div class="ratio-inner">
                                    <!-- <img src="" alt="eco-news" class="img-fluid eco-news-img"> -->
                                    <img src="{{asset('storage/uploads/news_images/'.$newsImage->image)}}" alt="news-detail" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane-socialmedia pt-4">
                    <ul>
                        <p class="sharing">@lang('algeria_business_network.sharing')</p>
                        @include('frontend.share')
                    </ul>
                </div>
            </div>
        </div>
        <!-- left article section ends here -->
        <div class="col-lg-4 col-md-12">
            <div class="news-paper">
                <div class="free-review">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-sm-4 col-4">
                            <div class="free-review__right">
                                <img src="{{asset('css/images/newspaper.svg')}}" alt="newspaper" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-8">
                            <div class="free-review__left">
                                <h6 class="sub-heading">@lang('news_detail.pressNews')</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($similarNews) > 0)
            <div class="container">
                <div class="row">
                    <div class="similart-article  col-md-12 col-sm-12">
                        <h6 class="sub-heading pb-2">@lang('news_detail.similarArticles')</h6>
                        <ul class="similar-article__elements">
                            @foreach($similarNews as $news)
                            <li class="article-box">
                                <p class="article-title pb-2">@lang('news_detail.article'){{$loop->iteration}}: </p>
                                <a href="{{route('news-detail', [$news->page_key])}}">
                                    <p class="article-title-caption text-limit">{{ html_entity_decode(strip_tags($news->localeAll[0]->title)) }}</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @else
            <div class="container">
                <div class="row">
                    <div class="similart-article col-md-12 col-sm-12">
                        <h6 class="sub-heading pb-2">@lang('news_detail.similarArticles')</h6>
                        <ul class="similar-article__elements">
                            <li class="article-box">
                                <!-- <p class="article-title pb-2">@lang('news_detail.article'): </p> -->
                                    <p class="article-title-caption">@lang('news.noSimilarArticle')</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
