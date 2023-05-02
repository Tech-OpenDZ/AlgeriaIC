

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
                <div class="col-md-4 col-sm-6 col-xs-12" style="border-radius:10px">
                    @if ($newsData->is_premium == 1)
            
                                <article class="material-card Blue" style="border-radius:10px!important;position:sticky">
                                    <h2 style="font-size:14px">
                                              @if ($newsData->is_premium == 1)
                                                    <span>
                                                        
                                                        <a href="#" class="premium-eco">@lang('news.premiumNews')</a>
                                                    </span>
                                                @endif
                                                @if(!Auth::guard('customer')->check())
                                                <a href="{{route('premium-news_free-detail', [$newsData->page_key])}}">
                                                    <span style="font-weight:bold">  {{ isset($newsData->localeAll[0]->title) ? str_limit(html_entity_decode(strip_tags($newsData->localeAll[0]->title)),40,'...') : '' }} </span>
                                                </a>
                                                @else
                                                <a href="{{route('premium-news-detail', [$newsData->page_key])}}">
                                                    <span style="font-weight:bold">  {{ isset($newsData->localeAll[0]->title) ? str_limit(html_entity_decode(strip_tags($newsData->localeAll[0]->title)),40,'...') : '' }} </span>
                                                </a>
                                                @endif
                                        
                                        <br>
                                        <strong>
                                            <i class="fa fa-calendar"></i> &nbsp; &nbsp;
                                          {{Carbon\Carbon::parse($newsData->created_at)->diffForHumans()}}

                                        </strong>
                                    </h2>
                                    <div class="mc-content" style="cursor:pointer">
                                        <div class="img-container">
                                            @if(!Auth::guard('customer')->check())
                                           
                                                <img src="{{asset('storage/uploads/news_logos/'.$newsData->news_logo)}}" alt="eco-news" style="height:100%;width:100%" class="img-responsive">
                                          
                                            @else
                                               
                                                    <img src="{{asset('storage/uploads/news_logos/'.$newsData->news_logo)}}" alt="eco-news" style="height:100%;width:100%" class="img-responsive">
                                           
                                            @endif
                                          
                                        </div>
                                        <div class="mc-description" style="height: max-content">
                                        <a href="{{route('premium-news-detail', [$newsData->page_key])}}">
                                              @foreach($newsData->sectors as $sector)
                                                  @foreach($sector->localeAll as $localeData)
                                                      @if($localeData->locale == $currentLocale)
                                                      <span>  <a href="{{url()->current().'?page=1&keyword=&sector%5B%5D='.$sector->id}}" style="color:#000000" class="">{{$localeData->name}}</a> </span>
                                                      @endif
                                                  @endforeach
                                              @break($loop->iteration == 2)
                                              @endforeach
                                              <br><br>
                                              @if(!Auth::guard('customer')->check())
                                              
                                                  <h6 class="news-text-heading-two text-limit-four heading-four">
                                                      <a href="{{route('premium-news_free-detail', [$newsData->page_key])}}">
                                                          {{ isset($newsData->localeAll[0]->title) ? html_entity_decode(strip_tags($newsData->localeAll[0]->title)) : '' }}
                                                       </a>
                                                  </h6>
                                              
                                            @else
                                            
                                                    <h6 class="news-text-heading-two text-limit-four heading-four">
                                                       <a href="{{route('premium-news-detail', [$newsData->page_key])}}">
                                                            {{ isset($newsData->localeAll[0]->title) ? html_entity_decode(strip_tags($newsData->localeAll[0]->title)) : '' }}
                                                        </a>
                                                    </h6>
                                          
                                            @endif
                                            <br><br>
                                            <a href="{{$newsData->source_link}}" target="_blank"><p class="source-news" style="float:right"><img src="{{asset('storage/uploads/news_source/logo/'.$newsData->newsSource->logo)}}"  alt="algeria-logo" class="" height="100%" width="60px"></p></a>
                                        </a>
                                        </div>
                                    </div>
                                   
                                    <div class="mc-footer">
                                      
                                           @if(!Auth::guard('customer')->check())
                                                <a class="btn_head" href="{{route('premium-news_free-detail', [$newsData->page_key])}}" class="genric-btn success radius" style="background-color:#4e7cbe!important;cursor:pointer!important;float:left;height:64%;width:48%;text-transform:none;padding: 20px 10px;">
                                                    <p style="color:#ffffff;margin-top: -10%;">  @lang('home.view_more') ➞ </p>
                                                </a>
                                            @else
                                                <a class="btn_head" href="{{route('premium-news-detail', [$newsData->page_key])}}" class="genric-btn success radius" style="background-color:#4e7cbe!important;cursor:pointer!important;float:left;height:64%;width:48%;text-transform:none;padding: 20px 10px;">
                                                    <p style="color:#ffffff;margin-top: -10%;">  @lang('home.view_more') ➞ </p>
                                                </a>
                                            @endif
                             
                                    </div>
                                </article>
                        
                     @else
                        
                        <article class="material-card Blue" style="border-radius:10px!important;position:sticky">
                                    <h2 style="font-size:14px">
                                    
                                        <a href="{{route('news-detail', [$newsData->page_key])}}">
                                               <span style="font-weight:bold">   {{ isset($newsData->localeAll[0]->title) ? str_limit(html_entity_decode(strip_tags($newsData->localeAll[0]->title)),60,'...') : '' }}
                                    
                                       </a>   
                                        </span>
                                        <br>
                                        <strong>
                                            <i class="fa fa-calendar"></i> &nbsp; &nbsp;
                                          {{Carbon\Carbon::parse($newsData->created_at)->diffForHumans()}}

                                        </strong>
                                    </h2>
                                    <div class="mc-content"  style="cursor:pointer">
                                        <div class="img-container">
                                
                                            <img src="{{asset('storage/uploads/news_logos/'.$newsData->news_logo)}}" style="height:100%;width:100%" onmouseover="bigImg(this)" class="img-responsive">
                                      
                                          
                                        </div>
                                        <div class="mc-description" style="height:max-content;">
                                        <a href="{{route('premium-news-detail', [$newsData->page_key])}}">
                                        @foreach($newsData->sectors as $sector)
                                            @foreach($sector->localeAll as $localeData)
                                                @if($localeData->locale == $currentLocale)
                                                <li> <a href="{{url()->current().'?page=1&keyword=&sector%5B%5D='.$sector->id}}" style="color:#000000">{{$localeData->name}}</a></li>
                                                @endif
                                            @endforeach
                                        @break($loop->iteration == 2)
                                        @endforeach
                                        <br>
                                            <h6 class="news-text-heading-two text-limit-four heading-four">
                                                <a href="{{route('news-detail', [$newsData->page_key])}}" >
                                                        {{ isset($newsData->localeAll[0]->title) ? html_entity_decode(strip_tags($newsData->localeAll[0]->title)) : '' }}
                                                </a>
                                            </h6>
                                            <br>
                                            <a href="{{$newsData->source_link}}" target="_blank"><p class="source-news" style="float:right"><img src="{{asset('storage/uploads/news_source/logo/'.$newsData->newsSource->logo)}}"   class="" height="40px" width="60px"></p></a>
                                        </a>
                                        </div>
                                    </div>
                                 
                                    <div class="mc-footer">
    
                                            <a class="btn_head" href="{{route('news-detail', [$newsData->page_key])}}" class="genric-btn success radius" style="background-color:#4e7cbe!important;cursor:pointer!important;float:left;height:64%;width:48%;text-transform:none;padding: 20px 10px;">
                                                <p style="color:#ffffff;margin-top: -10%;">  @lang('home.view_more') ➞ </p>
                                            </a>

                                    </div>
                                </article>
                        @endif
                        <br>
                </div>
            @endif
        @endforeach 
    @endforeach
</div>
@endif


<script>
$(function() {
        $('.material-card > .mc-btn-action').click(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });


        $('.material-card > .mc-content').click(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });

        $('.material-card > .mc-content img').hover(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 1800);
                
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 1800);
            }
        });
    
        
        

    
    });

</script>






