<div class="carousel-item active" id="carousel-item{{$page}}">
    <section class="events-main-area">
        <div class="events-home">

            <div class="events-home__elements">
                @if(!$businessOpportunityList->isEmpty())
                    @foreach($businessOpportunityList as $key => $data)
                        @if($key == 0 || $key%2 == 0)
                        <div class="row" style="margin-left:0px!important;margin-right:0px!important">
                        @endif
                      
                            <div class="news-card">
                                
                                <a href="{{route('business-opportunity-details', ['sector_id' => $data->sectors[0]->page_key,'id' => $data->page_key ])}}" class="news-card__card-link"></a>
                                                 @if($data->logo != null)
                                                 <img src="{{asset('storage/uploads/business_opportunity/'.$data->id.'/logo/'.$data->logo)}}" alt="events-company" class="img-fluid" style="width:100%;height:100%">
                                                @endif
                              <!--  <img src="https://images.pexels.com/photos/127513/pexels-photo-127513.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="" class="news-card__image"> -->
                                <div class="news-card__text-wrapper">
                                <h2 class="news-card__title">  <a class="news-card__title" href="{{route('business-opportunity-details', ['sector_id' => $data->sectors[0]->page_key,'id' => $data->page_key ])}}">
                                               {{ str_limit(html_entity_decode(strip_tags($data->localeAll[0]->project_title)),200,'...') }}
                                            
                                            </a> </h2>
                                <div class="news-card__post-date">{{date('d M y', strtotime($data->created_at))}} | {{ $data->zones[0]->localeAll[0]->name }},Algeria</div>
                                <div class="news-card__details-wrapper">
                                    <p class="news-card__excerpt">{{ str_limit(html_entity_decode(strip_tags($data->localeAll[0]->project_description)),150,'') }} &hellip;</p>
                                    <a href="{{route('business-opportunity-details', ['sector_id' => $data->sectors[0]->page_key,'id' => $data->page_key ])}}" class="news-card__read-more"> @lang('home.view_more') ➞</a>
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



