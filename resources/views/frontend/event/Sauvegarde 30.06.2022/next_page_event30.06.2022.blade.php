<div class="carousel-item active" id="carousel-item{{$page}}">
    <section class="events-main-area">
        <div class="events-home">
            <div class="events-home__elements">
                @if(!$eventList->isEmpty())
                    @php
                        $routeVal = ($listFor == 'Upcoming event') ? 'upcoming-event-detail' : 'past-event-detail';
                    @endphp
                    @foreach($eventList as $key => $data)
                        @if($key == 0 || $key%2 == 0)
                        <div class="row">
                        @endif
                            <div class="col-md-6 col-lg-6 col-sm-6 mt-4">
                                <div class="events-home__elements-box green-border-bottom">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-3 col-sm-3 for-image-padding mid-img">
                                            <div class="event-box-left">
                                                <div class="ratio-1x1">
                                                    <div class="ratio-inner">
                                                        <a href="{{route($routeVal, [$data->page_key])}}">
                                                            <img src="{{asset('storage/uploads/event_logos/'.$data->event_logo)}}" alt="events-company" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-9 col-sm-9">
                                            <div class="event-box-right">
                                                <p class="print-month">{{$data->sectors[0]->localeAll[0]->name}}</p>

                                                <a href="{{route($routeVal, [$data->page_key])}}">
                                                    <p class="semi-bold-para threelinetext">{{ html_entity_decode(strip_tags($data->localeAll[0]->title)) }}</p>
                                                </a>
                                                <p class="event-date text-truncate">
                                                    @lang('home.from') {{Carbon\Carbon::parse($data->start_date)->isoFormat('LL') }} @lang('home.to') {{Carbon\Carbon::parse($data->end_date)->isoFormat('LL') }} | {{ html_entity_decode(strip_tags($data->localeAll[0]->place)) }}
                                                </p>
                                                <p class="event-date text-truncate">
                                                    {{ html_entity_decode(strip_tags($data->localeAll[0]->place)) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
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

