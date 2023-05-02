
<div class="carousel-item" id="carousel-item{{$page}}">
    <section class="events-main-area">
        <div class="events-home">
            <div class="events-home__elements">
                @if(count($business_opportunities) < 1) <div class="row mt-3 mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <p class="news-post-caption">@lang('business_opportunity.no_business_record_found')</p>
                        <script>
                            hidePagination(true);
                        </script>
                    </div>
                    @else
                    @foreach($business_opportunities as $key => $data)
                    @if($key == 0 || $key%2 == 0)
                    <div class="row">
                        @endif
                        <div class="col-md-6 col-lg-6 col-sm-6 mt-4">
                            <div class="events-home__elements-box green-border-bottom">
                                <div class="row">
                                    <div class="col-md-4 col-lg-3 col-sm-3 for-image-padding">
                                        <div class="event-box-left">

                                            <div class="ratio-1x1">
                                                <div class="ratio-inner">
                                                    <img src="{{asset('storage/uploads/business_opportunity/'.$data->id.'/logo/'.$data->logo)}}" alt="events-company" class="img-fluid">
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
                                                <p class="semi-bold-para text-truncate">{{ str_limit(html_entity_decode(strip_tags($data->localeAll[0]->project_title)),50,'...') }}
                                                </p>
                                            </a>
                                            <p class="event-date text-truncate">{{date('d M y', strtotime($data->created_at))}} | {{ $data->zones[0]->localeAll[0]->name }},Algeria</p>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        @if(count($business_opportunities) == $key+1 && count($business_opportunities)%2 != 0)
                        <div class="col-md-6 col-lg-6 col-sm-6 col-6 mt-4">
                            
                        </div>
                        @endif
                        @if(($key+1)%2==0)
                    </div>
                    @endif
                    @endforeach
                    @endif

            </div>
        </div>
    </section>
</div>