<div class="carousel-item active" id="carousel-item{{$page}}">
    <section class="events-main-area">
        <div class="events-home">

            <div class="events-home__elements">
                @if(!$businessOpportunityList->isEmpty())
                    @foreach($businessOpportunityList as $key => $data)
                        @if($key == 0 || $key%2 == 0)
                        <div class="row">
                        @endif
                        <div class="col-md-6 col-lg-6 col-sm-6 mt-4">
                            <div class="events-home__elements-box green-border-bottom box">
                                <div class="row">
                                    <div class="col-md-4 col-lg-3 col-sm-3 for-image-padding">
                                        <div class="event-box-left">

                                            <div class="ratio-1x1">
                                                <div class="ratio-inner">
                                                @if($data->logo != null)
                                                    <img src="{{asset('storage/uploads/business_opportunity/'.$data->id.'/logo/'.$data->logo)}}" alt="events-company" class="img-fluid">
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-9 col-sm-9">
                                        <div class="event-box-right">
                                            <p class="print-month">
                                                {{$data->sectors[0]->localeAll[0]->name}}
                                            </p>
                                            <a href="{{route('business-opportunity-details', ['sector_id' => $data->sectors[0]->page_key,'id' => $data->page_key ])}}">
                                                <p class="semi-bold-para">{{ str_limit(html_entity_decode(strip_tags($data->localeAll[0]->project_title)),200,'...') }}
                                                </p>
                                            </a>
                                            <p class="event-date text-truncate">{{date('d M y', strtotime($data->created_at))}} | {{ $data->zones[0]->localeAll[0]->name }},Algeria</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!isset($businessOpportunityList[$key+1]) && count((array)$businessOpportunityList)%2 != 0)
                        </div>
                        @elseif ($key == 1 || $key%2 == 1)
                        </div>
                        @endif
                    @endforeach
                @else
                <div class="no-post-found">
                    <p class="news-post-caption">@lang('business_opportunity.no_business_record_found')</p>
                </div>
                @endif
            </div>
        </div>
        <!-- upcoming events ends here -->
    </section>
    <style>
.box:hover {
    box-shadow: -8px 3px 25px 1px rgba(0,0,0,0.75);
	transition: all ease 0.3s;
}
        </style>
</div>

