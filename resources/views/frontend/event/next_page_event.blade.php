<div class="carousel-item active" id="carousel-item{{$page}}">
    <section class="events-main-area">
        <div class="events-home">
            <div class="events-home__elements" style="padding:15px!important">
                @if(!$eventList->isEmpty())
                    @php
                        $routeVal = ($listFor == 'Upcoming event') ? 'upcoming-event-detail' : 'past-event-detail';
                    @endphp
                    @foreach($eventList as $key => $data)
                        @if($key == 0 || $key%2 == 0)
                        <div class="row" >
                        @endif
                        <div class="event-card col-md-6 col-lg-6" style="width:450px;height:100%">
                                            <div class="row">
                                                <div class="col-md-5">
                                                <a href="{{route('upcoming-event-detail', [$data->page_key])}}">
                                                    <img src="{{asset('storage/uploads/event_logos/'.$data->event_logo)}}" alt=""  style="border-top-left-radius: 10px;border-top-right-radius:10px;width:200px;height:200px"/>
                                                </a> 
                                                </div>
                                              
                                                <div class="col-md-7" style="padding-top: 40px">
                                                <a href="{{route('upcoming-event-detail', [$data->page_key])}}">
                                                     <h3 style="padding-bottom: 5px;font-size: 20px;font-weight:bold;padding-left:10px"> {{ html_entity_decode(strip_tags($data->localeAll[0]->title)) }}</h3>
                                                  </a>
                                                 </div>
                                            </div>
                                                <div class="description" style="padding-left:10px">
                                                <p class="print-month" style="font-size:15px">{{$data->sectors[0]->localeAll[0]->name}}</p>
                                                 
                                                <p class="location" >  <i class="fas fa-calendar-alt"></i> &nbsp;&nbsp;    @lang('home.from') {{Carbon\Carbon::parse($data->start_date)->isoFormat('LL') }} @lang('home.to') {{Carbon\Carbon::parse($data->end_date)->isoFormat('LL') }} </p>
                                                <i class="fas fa-map-marker"></i> &nbsp;&nbsp;   {{ html_entity_decode(strip_tags($data->localeAll[0]->place)) }} <br>
                                            
                                                <div class="controls" style="text-align:center;margin-right: 20px;">
                                                    <br>
                                                    <a href="{{route('upcoming-event-detail', [$data->page_key])}}" class="news-card__read-more" style="Background-color:#ffffff;color:#000000"> @lang('home.view_more') ➞</a>
                                                </div>
                                                <br>
                                                </div> 
                                            </div> 

                        @if(!isset($eventList[$key+1]) && count((array)$eventList)%2 != 0)
                        </div>
                        @elseif ($key == 1 || $key%2 == 1)
                        </div>
                        @endif
                    @endforeach
                @else
                    @if($page == 1)
                    <div class="no-post-found">
                        @if($listFor == 'Upcoming event')
                        <p class="news-post-caption">@lang('event.noUpcomingEventFound')</p>
                        @else
                        <p class="news-post-caption">@lang('event.noPastEventFound')</p>
                        @endif
                    </div>
                    @endif
                @endif
            </div>
        </div>
        <!-- upcoming events ends here -->
    </section>
</div>

<style>
    .event-card {
    box-shadow: rgb(0 0 0 / 10%) 0px 2px 12px 0px;}
</style>