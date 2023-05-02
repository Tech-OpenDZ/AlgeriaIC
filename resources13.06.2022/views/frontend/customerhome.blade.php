@extends('frontend.layouts.master')
@section('head')
	<meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @lang('home.algeria_invest')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
@endsection
@section('content')
<!-- discover algeria home here -->
<section class="algeria-home">
	<div class="discover-algeria">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-lg-9 col-sm-12">
					<div class="discover-algeria__left">

						@include('frontend.common.top_banner')

	                    <!-- Banner slider start here -->
	                    <div class="slider-area">
	                    	@include('frontend.banner.index', ['banner' => 'home'])
	                    </div>
                        <!-- ---Economic News--- -->
                        <section class="economic-news">
                            <div class="title-headings">
                                <div class="row align-items-center title-border">
                                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 p-0 title-data">
                                        <h4 class="main-heading">@lang('home.news')</h4>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 p-0 title-more-data">
                                        <div class="heading-with-arrow">
                                            <a href="{{route('news-list')}}" class="more-data">@lang('home.newMore')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- -------news start here---- -->
                            <div class="economic-news__elements">
                                <div class="row">
                                @foreach($news as $newsData)
                                    <div class="co-md-6 col-lg-6 mt-3"  onclick="pageRedirect('{{route('news-detail', [$newsData->page_key])}}')">
                                        <div class="news-post">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-2  p-0">
                                                        <div class="news-post__left">
                                                            <div class="ratio-1x1">
                                                                <div class="ratio-inner">
                                                                    <img src="{{asset('storage/uploads/news_logos/'.$newsData->news_logo)}}" alt="eco-news"class="img-fluid eco-news-img">
                                                                </div>
                                                            </div>

                                                            @if($newsData->is_premium == 1)
                                                            <a href="#" class="premium-news">@lang('news.premiumNews')</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- <a href="{{route('news-detail', [$newsData->id])}}" class="more-data"> -->
                                                    <div class="col-md-9 col-sm-10">
                                                        <div class="news-post__right">
                                                            <ul class="tags-top">
                                                            @foreach($newsData->sectors as $sector)
                                                             @break($loop->iteration == 3)
                                                                <li> <a href="{{route('news-detail', [$newsData->id])}}" class="yellow-box">{{$sector->localeAll[0]->name}}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                            <p class="news-text text-limit">
                                                                 {{ html_entity_decode(strip_tags($newsData->localeAll[0]->title)) }}</p>
                                                            <p class="news-post-caption text-limit">
                                                                {{ html_entity_decode(strip_tags($newsData->localeAll[0]->description)) }}
                                                        </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            <!-- --------news end here---- -->
                            <!-- ----Press review start here--->
                            <section class="press-review mt-3 mb-3">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-2 col-lg-2 col-sm-2">
                                            <div class="press-review-left">
                                                <img src="{{asset('images/press-review.svg')}}" alt="press-review" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                            <div class="press-review-mid">
                                                <p class="press-review-caption">@lang('home.press_review')
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <div class="press-review-right">
                                                <a href="{{route('press-review')}}" class="common-button">@lang('home.press_button')</a>
                                            </div>
                                        </div>
                                    </div>
                            </section>
                            <!-- ----Press review end here--->
                            <!-- Subscribe economic newsletter--- -->
                            <div class="economic-newsletter-green mt-3">
                                <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="economic-newsletter-green-left">
                                                    <h6 class="sub-heading text-white">@lang('home.economic_newsletter')</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="economic-newsletter-green-right pt-1">
                                                    <form class="subscribe_form yellow_btn">
                                                        <div class="input-group">
                                                            <input type="hidden" name="type" value="business" class="business_subscribe">
                                                            <input type="text" class="form-control col-8 economic_email" placeholder="@lang('newsletter.emailPlaceholder')"  name="email">
                                                            <div class="input-group-append"><span class="input-group-text">
                                                                <!-- <a href="javascript:void(0)" class="economic_submit">@lang('home.subscribe')</a></span> -->
                                                                <button type="button" class="btn btn-primary newsletter_btn economic_submit"><i id="spinner" class="fa fa-circle-o-notch fa-spin" style="display:none"></i> @lang('home.subscribe')</button>
                                                            </div>
                                                        </div>
                                                        <span class="" id="economic_error" role="alert" style="display: none" id="">
                                                        </span>
                                                        <span  id="economic_success" style="display: none"></span>
                                                        <span class="" id="economic_sub_already">
                                                        </span>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- ---end here--- ---------->
                        </section>
                        <!-- -----End Economic News----- -->
                        <!-- ----Events Start--------->
                        <div class="events-home">
                            <div class="title-headings">
                                <div class="row align-items-center title-border">
                                    <div class="col-lg-8 col-md-6 col-sm-6 col-12 p-0 title-data">
                                        <h4 class="main-heading">@lang('home.event')</h4>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0 title-more-data">
                                       <div class="heading-with-arrow">
                                           <a href="{{route('event-list')}}" class="more-data">@lang('home.eventMore')</a>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="events-home__elements">
                                <div class="row">
                                    @foreach($events as $event)
                                         <?php
                                            $event->start_date = Carbon\Carbon::parse($event->start_date);
                                            $format_start_date = clone $event->start_date;
                                            $format_start_date = $format_start_date->format('Y-m-d');
                                            // echo "<pre>";print_r($format_start_date);exit();
                                            $carbon_date = Carbon\Carbon::now()->format('Y-m-d');
                                            $route = (($format_start_date == $carbon_date)||($event->start_date->greaterThan(Carbon\Carbon::now()))) ? 'upcoming-event-detail' : 'past-event-detail';

                                         ?>
                                        <div class="col-md-6 col-lg-6 col-sm-6  mt-4" onclick="pageRedirect('{{route($route,[$event->page_key])}}')">
                                            <div class="events-home__elements-box">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-3 col-sm-3 for-image-padding">
                                                      <div class="event-box-left">
                                                         <div class="ratio-1x1">
                                                                <div class="ratio-inner">
                                                                    <img src="{{ asset('storage/uploads/event_logos/'.$event->event_logo)}}" alt="events-company" class="img-fluid">
                                                                </div>
                                                            </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-8 col-lg-9 col-sm-9">
                                                       <div class="event-box-right">
                                                            <p class="print-month">
                                                            @foreach($event->sectors as $sector)
                                                            @break($loop->iteration == 3)
                                                                {{ $sector->localeAll[0]->name}}
                                                            @endforeach()</p>
                                                            <p class="semi-bold-para text-truncate">
                                                                {{ html_entity_decode(strip_tags($event->localeAll[0]->title)) }}
                                                                </p>
                                                           <p class="event-date">
                                                            {{date('d M y', strtotime($event->start_date))}} |
                                                            {{ str_limit(html_entity_decode(strip_tags($event->localeAll[0]->place)),50,'...') }}
                                                             </p>
                                                       </div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- ---------Events Subscriber NewsLetter start----------- -->
                            @include('frontend.newsletters.home_events_subscribe')
                            <!-- -----------End Here------------------------ -->
                        </div>
                        <!-- ------Events End----- -->
					</div>
				</div>
				<!-- left area ends here -->
				<div class="col-lg-3 col-md-3 sidebar-data">
					<div class="discover-algeria__right">
							<div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-5">
                                @php
                                $adv = getAdvertisement('sidebar-top','home');
                                @endphp
                                <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid success"></a>
                                </div>

								<div class="col-lg-12 col-md-12 col-sm-7 sidebar-table  top-table">
                                    <h6 class="main-heading">@lang('home.commercial_heading')</h6>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                               <th class="table-heading-text">@lang('home.commercial_row1')</th>
                                               <th class="table-heading-text">@lang('home.commercial_row2')</th>
                                               <th class="table-heading-text">@lang('home.commercial_row3')</th>
                                               <th class="table-heading-text">@lang('home.commercial_row4')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($commercial)>0)
                                                @foreach($commercial as $commercail_data)
                                                <tr>
                                                   <td>{{number_format($commercail_data->base,2)}}</td>
                                                   <td>{{number_format($commercail_data->devis,2)}}</td>
                                                   <td>{{number_format($commercail_data->cours_achat,2)}}</td>
                                                   <td>{{number_format($commercail_data->cours_vente,2)}}</td>
                                                </tr>
                                            @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4" class="text-center">@lang('home.no_data_found')</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                     </table>
                                    <div class="tab-pane-socialmedia">
                                            <ul>
                                                <p class="sharing">@lang('algeria_business_network.sharing')</p>
                                                @include('frontend.share')
                                            </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6">
                                    <div class="sidebar-table eco-indicat">
                                        <h6 class="main-heading">@lang('home.economic_head')</h6>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="table-heading-text">@lang('home.economic_row1')</th>
                                                    <th class="table-heading-text">@lang('home.economic_row2')</th>
                                                    <th class="table-heading-text">@lang('home.economic_row3')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($economic)>0)
                                                    @foreach($economic as $economicData)
                                                        <tr>
                                                            <td class="td-bold">
                                                            {{ str_limit(html_entity_decode($economicData->localeAll[0]->indicator),11,'') }}
                                                            </td>
                                                            <td>{{date('d-m-Y', strtotime($economicData->date))}}</td>
                                                            <td>{{number_format($economicData->value,2)}}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="3" class="text-center">
                                                            @lang('home.no_data_found')
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="tab-pane-socialmedia">
                                                <ul>
                                                <p class="sharing">@lang('algeria_business_network.sharing')</p>
                                                @include('frontend.share')
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @if($business_network != null)
                                <div class="col-lg-12 col-md-12 col-sm-6 network-algeria">
                                        <!-- start of algeria invest netowrk area -->
                                        <div class="algeria-invest-network-home">
                                            <a href="#" class=""><img src="{{ asset('storage/uploads/algeria_network_images/'.$business_network->image_top)}}"alt="invest-network" class="img-fluid"></a>
                                            <h5 class="main-heading-two mb-4 mt-4">@lang('home.algeria_network')</h5>
                                            <p class="invest-caption mb-4">
                                                {{ str_limit(html_entity_decode(strip_tags($business_network->localeAll[0]->description)),320,'') }}</p>
                                            <a href="{{route('algeria-business-network')}}" class="common-button mb-4">@lang('home.business_more')</a>
                                        </div>
                                </div>
                                @endif
							</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- discover algeria home end here -->
<!-- discover algeria invest start here -->
<section class="discover-algeria-invest">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-4">
                    <div class="discover-algeria-invest-box-yellow">
                        <a href="{{route('discover-algeria',['key'=>'about_algeria'])}}"><img src="{{asset('images/Discover-Algeria-invest.png')}}" alt="discover-algeria"
                                class="img-fluid invest-image">
                            <div class="discovera-algeria-caption-box">
                                <h4 class="main-heading mb-2 text-truncate">@lang('home.discover_algeria')</h4>
                                <p class="discover-algeria-invest-text text-limit">@lang('home.algeria_content')</p>
                                <a href="{{route('discover-algeria',['key'=>'about_algeria'])}}" class="more-news">@lang('home.algeria_news')<span class="more-news-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                            </div>
                        </a>
                    </div>
                </div>

                @if(!$resource->isEmpty())
                @foreach($resource as $resourceData)
                    @if ($resourceData->page_key == 'invest-in-algeria')
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="box-green-outer">
                            <div class="discover-algeria-invest-box-yellow">
                                <a href="{{route('business-environment','invest-in-algeria')}}"><img src="{{asset('images/Invest in-Algeria-invest.png')}}" alt="discover-algeria"
                                        class="img-fluid invest-image">
                                    <div class="discovera-algeria-caption-box box-green">

                                        <h4 class="main-heading mb-2 text-white text-truncate">{{$resourceData->localeAll[0]->title}}</h4>
                                        <p class="discover-algeria-invest-text text-white text-limit">{{$resourceData->localeAll[0]->short_description}}</p>
                                        <a href="{{route('business-environment','invest-in-algeria')}}" class="more-news text-white">@lang('home.algeria_news')<span class="more-news-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @elseif ($resourceData->page_key == 'legal-legislative-framework')
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="box-blue-outer">
                            <div class="discover-algeria-invest-box-yellow">
                                <a href="{{route('business-environment','legal-legislative-framework')}}"><img src="{{asset('images/Algerian-Legislation-invest.png')}}" alt="discover-algeria"class="img-fluid invest-image">
                                    <div class="discovera-algeria-caption-box box-blue">
                                        <h4 class="main-heading mb-2 text-white text-truncate">@lang('home.algeria_legslation')</h4>
                                        <p class="discover-algeria-invest-text text-white text-limit">{{$resourceData->localeAll[0]->short_description}}</p>
                                        <a href="{{route('business-environment','legal-legislative-framework')}}" class="more-news text-white">@lang('home.algeria_news')<span class="more-news-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @endif
            </div>
        </div>
</section>
<!-- discover algeria invest ends here -->
<!-- discover resources newsletter here -->
<section class="resource-news-letter">
    <div class="container">
        <div class="event-home-letter">
            <div class="row">
                <div class="col-lg-4 col-md-12 subscribe-letter-zindex">
                    <h6 class="sub-heading">@lang('home.economic_subscribe')</h6>
                </div>
                <div class="col-lg-6 col-md-12">
                    <form id="resources_from1" class="subscribe_form red_btn" method="POST">
                        <div class="input-group">
                            <input type="hidden" name="type" value="resource" id="resource_subscribe">
                            <input type="text" class="form-control col-8" placeholder="@lang('newsletter.emailPlaceholder')" name="email" id="resource_email">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <!-- <a href="javascript:void(0)" class="resources_submit">@lang('home.subscribe')</a></span> -->
                                        <button type="submit" class="btn btn-primary newsletter_btn resources_submit">
                                            <i id="spinner-economic" class="fa fa-circle-o-notch fa-spin" style="display:none"></i>  @lang('home.subscribe')
                                        </button> 
                                    </div>
                        </div>
                        <span  id="resources_error" role="alert"></span>
                        <span  id= "success-resources" style="display:none;"></span>
                        <span  id="resources_already" style="display:none;"></span>
                    </form>
                </div>
            </div>
            <div class="event-news-back">
                <img src="{{asset('images/event-back-2.svg')}}" class="img-fluid event-back-one">
                <img src="{{asset('images/event-back-1.svg')}}" class="img-fluid event-back-two">
                <img src="{{asset('images/event-back-3.svg')}}" class="img-fluid event-back-three">
            </div>
        </div>
    </div>
</section>
 <!-- discover resources newsletter end here -->
 <!-- business opp start here -->
<section class="business-opps-tenders">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="business-opps-tenders--left mt-3">
                    <div class="title-headings">
                        <div class="row align-items-center title-border">
                            <div class="col-lg-7 col-md-12 col-sm-12 p-0 title-data">
                                <h4 class="main-heading">@lang('home.business_title')</h4>
                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12 p-0 title-more-data">
                                <div class="heading-with-arrow more-data-height">
                                    <a href="{{route('business-opportunity')}}" class="more-data">@lang('home.business_more')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- post strarts here -->
                    <div class="print-area__elements">
                        @foreach($business_opportunity as $businessData)
                        <div class="row mt-3" onclick="pageRedirect('{{route('business-opportunity-details', ['sector_id' => $businessData->sectors[0]->page_key,'id' => $businessData->page_key ])}}')">
                            <div class="col-md-5 col-lg-4 col-sm-4">
                                <div class="print-area__elements--left mb-2">
                                    <div class="ratio-1x1">
                                        <div class="ratio-inner">
                                            <img src="{{ asset('storage/uploads/business_opportunity/'.$businessData->id.'/logo/'.$businessData->logo)}}" alt="home-business-opps-one" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-8">
                                <div class="print-area__elements--right">
                                    <p class="print-month mt-1 mb-2">
                                     {{ $businessData->created_at->format('M d') }}
                                    </p>
                                    <p class="print-data mb-2 text-truncate">
                                        {{ html_entity_decode(strip_tags($businessData->localeAll[0]->project_title)) }}
                                    </p>
                                    <p class="print-month  mb-3 text-limit">
                                        {{ html_entity_decode(strip_tags($businessData->localeAll[0]->project_description)) }}
                                    </p>
                                    <p class="print-business mb-2">
                                        @foreach($businessData->sectors as $sector)
                                            @if(!$loop->first)
                                              ,
                                            @endif
                                            @if(Config::get('app.locale') == "ar")
                                                {{$sector->localeAll[0]->name}}
                                            @else
                                                {{$sector->localeAll[0]->name}}

                                            @endif
                                        @endforeach()
                                    <!-- Algeria . Business . Agriculture -->
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="business-opps-button text-center">
                            <a href="{{route('add-business-opportunity')}}" class="common-button">@lang('home.business_opportunity_button')</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left section ends here -->
            <div class="col-md-6">
                    <div class="business-opps-tenders--right">
                        <div class="title-headings">
                            <div class="row align-items-center title-border title-white-back">
                                <div class="col-lg-8 col-md-12 col-sm-12 p-0 title-data">
                                    <h4 class="main-heading-two">@lang('home.algeria_tenders')</h4>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12  p-0 title-more-data">
                                    <div class="heading-with-arrow">
                                        <a href="http://algeriatenders.com/" target="_blank" class="more-data">@lang('home.business_more')</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- title ends here -->
                        <div class="algeria-tenders-table">
                            <div class="sidebar-table  top-table">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="table-heading-text">@lang('home.publication')<br>
                                                @lang('home.pub_date')</th>
                                            <th class="table-heading-text">@lang('home.tendering')<br>
                                                @lang('home.tender_sector')</th>
                                            <th class="table-heading-text">@lang('home.type_of')<br>@lang('home.type_tender')</th>
                                            <th class="table-heading-text">@lang('home.cap_tender')<br>
                                                @lang('home.cap_Detail')</th>
                                            <th class="table-heading-text">@lang('home.deadline')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($tenders)>0)
                                            @foreach($tenders as $tenders_data)
                                            <tr @if ($loop->last) class="last-child-no-boder" @endif>
                                                <td>{{date('d-m-Y', strtotime($tenders_data->publication_date))}}</td>
                                                <td>{{date('d-m-Y', strtotime($tenders_data->localeAll[0]->tendering_sector))}}</td>
                                                <td class="single-stage">{{ str_limit(html_entity_decode($tenders_data->localeAll[0]->tender_type),12,'') }}</td>
                                                <td class="single-stage tender-click" onclick="pageRedirect('http://algeriatenders.com/')"><strong>
                                                {{ str_limit(html_entity_decode($tenders_data->localeAll[0]->tender_detail),11,'') }}</strong>
                                                </td>
                                                <td>{{date('d-m-Y', strtotime($tenders_data->deadline))}}</td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    @lang('home.no_data_found')
                                                </td>
                                            </tr>

                                        @endif
                                    </tbody>

                                </table>

                            </div>
                            <div class="advice-button text-center mb-3">
                                <a href="http://algeriatenders.com/" target="_blank" class="common-button">@lang('home.tenders_button')</a>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
 <!-- business opp end here -->
 <!-- --business intellegence---- -->
<section class="BI-home">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="BI-home--left">
                    <!-- title headings -->
                    <div class="title-headings">
                        <div class="row align-items-center title-border">
                            <div class="col-lg-8 col-md-8 col-sm-12 p-0 title-data">
                                <h4 class="main-heading">@lang('home.business_intelligence')</h4>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 p-0 title-more-data">
                                <div class="heading-with-arrow">
                                    <a href="{{route('business-intelligence')}}" class="more-data">@lang('home.business_more')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="print-month mt-3">@lang('home.b_intelligenceDescription')</p>
                    <div class="row">
                        @if(count($b_intelligence)>0)
                            @foreach($b_intelligence as $b_iData)
                            <div class="col-md-6 col-lg-6 col-sm-12  mt-3">
                                <div class="BI-box">
                                    <h6 class="sub-heading text-truncate" onclick="pageRedirect('{{route('business-intelligence')}}')">{{$b_iData->localeAll[0]->title}}</h6>
                                    <p class="print-month mt-2 text-limit">
                                        {{ html_entity_decode(strip_tags($b_iData->localeAll[0]->description)) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                        <!-- title headings ends -->
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="BI-home--right">
                        <!-- heading area -->
                    <h4 class="main-heading">@lang('home.business_network')</h4>
                    <a href="{{route('business-intelligence')}}" class="more-news">@lang('home.more_reports')<span class="more-news-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                    <div class="BI-posts mt-3">
                            @if(count($b_i_reports)>0)
                                @foreach($b_i_reports as $report_data)
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4 col-sm-2">
                                            <div class="BI-posts-left mt-3">
                                                <div class="ratio-1x1">
                                                    <div class="ratio-inner">
                                                        <img src="{{ asset('storage/uploads/bi_report_section/'.$report_data->image) }}" alt="bi-report" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-8 col-sm-10 bi-nopadding-left">
                                            <div class="BI-posts-right mt-3">
                                                <p class="pt-1 bi-post-head text-limit" onclick="pageRedirect('{{route('business-intelligence')}}')">{{ html_entity_decode($report_data->localeAll[0]->title) }}</p>
                                                <p class="light-black text-limit">{{ html_entity_decode($report_data->localeAll[0]->description) }}</p>
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
</section>
 <!-- --business end intellegence---- -->
 <!-- business directory strats here -->
 <!-- business directory end here -->
<section class="business-direcory-home">
        <div class="container">
            <div class="title-headings">
                <div class="row align-items-center title-border">
                    <div class="col-lg-8 col-md-6 col-sm-6 p-0 title-data">
                        <h4 class="main-heading">@lang('home.business_directory')</h4>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0 title-more-data">
                        <div class="heading-with-arrow">
                            <a href="{{route('business-directory')}}" class="more-data">@lang('home.business_more')</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">

                <div class="col-md-4 col-sm-4 col-4 mt-3">
                    <div class="bd-box">
                        <div class="row align-items-center">
                            <div class="col-md-8 col-sm-8 col-12">
                                <div class="bd-box-left">
                                    <h4 class="bold-text">{{$company_count}}</h4>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-12">
                                <div class="bd-box-right">

                                    <svg id="Capa_1" enable-background="new 0 0 512 512" height="56px"
                                        viewBox="0 0 512 512" width="56px" class="img-fluid bd-icons"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="m487 444.811h-6.347v-123.851c0-4.142-3.357-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v123.852h-159.104v-203.88h152.975c3.38 0 6.13 2.75 6.13 6.129v38.565c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-38.565c0-11.651-9.479-21.129-21.13-21.129h-152.975v-136.294c0-10.913-8.491-20.13-19.352-21.049v-15.045c0-10.956-8.556-20.209-19.479-21.065l-194.24-15.224c-12.265-.969-22.78 8.758-22.78 21.065v12.011c-11.123.95-19.351 10.254-19.351 21.05v373.429h-6.347c-13.785 0-25 11.215-25 25s11.215 25 25 25h462c13.785 0 25-11.215 25-25s-11.215-24.999-25-24.999zm-421.302-406.49c0-3.592 3.057-6.392 6.609-6.111l194.24 15.223c3.168.249 5.65 2.933 5.65 6.111v13.863l-206.5-16.184v-12.902zm-19.351 33.061c0-3.621 3.097-6.399 6.608-6.111l232.942 18.256c3.169.249 5.651 2.933 5.651 6.111v355.173h-20.957v-107.38c0-6.826-5.553-12.379-12.379-12.379h-69.68c-6.826 0-12.379 5.553-12.379 12.379v48.653c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-46.032h64.438v104.759h-64.438v-23.664c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v23.664h-129.806zm440.653 408.429h-462c-5.514 0-10-4.486-10-10s4.486-10 10-10h462c5.514 0 10 4.486 10 10s-4.486 10-10 10z" />
                                                    <path
                                                        d="m75.905 162.943h30.358c7.137 0 12.943-5.806 12.943-12.942v-23.357c0-7.136-5.806-12.942-12.943-12.942h-30.358c-7.136 0-12.942 5.806-12.942 12.942v23.357c0 7.136 5.806 12.942 12.942 12.942zm2.058-34.242h26.244v19.242h-26.244z" />
                                                    <path
                                                        d="m151.599 162.943h30.358c7.136 0 12.942-5.806 12.942-12.942v-23.357c0-7.136-5.806-12.942-12.942-12.942h-30.358c-7.136 0-12.942 5.806-12.942 12.942v23.357c-.001 7.136 5.805 12.942 12.942 12.942zm2.057-34.242h26.243v19.242h-26.243z" />
                                                    <path
                                                        d="m227.292 162.943h30.358c7.137 0 12.942-5.806 12.942-12.942v-23.357c0-7.136-5.806-12.942-12.942-12.942h-30.358c-7.136 0-12.942 5.806-12.942 12.942v23.357c-.001 7.136 5.805 12.942 12.942 12.942zm2.057-34.242h26.243v19.242h-26.243z" />
                                                    <path
                                                        d="m75.905 230.38h30.358c7.137 0 12.943-5.806 12.943-12.942v-23.358c0-7.136-5.806-12.942-12.943-12.942h-30.358c-7.136 0-12.942 5.806-12.942 12.942v23.357c0 7.137 5.806 12.943 12.942 12.943zm2.058-34.242h26.244v19.242h-26.244z" />
                                                    <path
                                                        d="m151.599 230.38h30.358c7.136 0 12.942-5.806 12.942-12.942v-23.358c0-7.136-5.806-12.942-12.942-12.942h-30.358c-7.136 0-12.942 5.806-12.942 12.942v23.357c-.001 7.137 5.805 12.943 12.942 12.943zm2.057-34.242h26.243v19.242h-26.243z" />
                                                    <path
                                                        d="m227.292 230.38h30.358c7.137 0 12.942-5.806 12.942-12.942v-23.358c0-7.136-5.806-12.942-12.942-12.942h-30.358c-7.136 0-12.942 5.806-12.942 12.942v23.357c-.001 7.137 5.805 12.943 12.942 12.943zm2.057-34.242h26.243v19.242h-26.243z" />
                                                    <path
                                                        d="m75.905 297.816h30.358c7.137 0 12.943-5.806 12.943-12.942v-23.357c0-7.136-5.806-12.942-12.943-12.942h-30.358c-7.136 0-12.942 5.806-12.942 12.942v23.357c0 7.136 5.806 12.942 12.942 12.942zm2.058-34.242h26.244v19.242h-26.244z" />
                                                    <path
                                                        d="m144.551 325.052h-67.188c-7.94 0-14.4 6.46-14.4 14.4v20.442c0 7.94 6.46 14.4 14.4 14.4h67.188c7.94 0 14.4-6.46 14.4-14.4v-20.442c0-7.94-6.46-14.4-14.4-14.4zm-.6 34.242h-65.988v-19.242h65.988z" />
                                                    <path
                                                        d="m151.599 297.816h30.358c7.136 0 12.942-5.806 12.942-12.942v-23.357c0-7.136-5.806-12.942-12.942-12.942h-30.358c-7.136 0-12.942 5.806-12.942 12.942v23.357c-.001 7.136 5.805 12.942 12.942 12.942zm2.057-34.242h26.243v19.242h-26.243z" />
                                                    <path
                                                        d="m227.292 297.816h30.358c7.137 0 12.942-5.806 12.942-12.942v-23.357c0-7.136-5.806-12.942-12.942-12.942h-30.358c-7.136 0-12.942 5.806-12.942 12.942v23.357c-.001 7.136 5.805 12.942 12.942 12.942zm2.057-34.242h26.243v19.242h-26.243z" />
                                                    <path
                                                        d="m380.573 291.297c0-7.607-6.189-13.797-13.797-13.797h-30.628c-7.607 0-13.797 6.189-13.797 13.797v24.293c0 7.607 6.189 13.797 13.797 13.797h30.628c7.607 0 13.797-6.189 13.797-13.797zm-15 23.09h-28.222v-21.887h28.222z" />
                                                    <path
                                                        d="m366.776 346.717h-30.628c-7.607 0-13.797 6.189-13.797 13.797v24.293c0 7.607 6.189 13.797 13.797 13.797h30.628c7.607 0 13.797-6.189 13.797-13.797v-24.293c0-7.608-6.189-13.797-13.797-13.797zm-1.203 36.887h-28.222v-21.887h28.222z" />
                                                    <path
                                                        d="m450.333 291.297c0-7.607-6.189-13.797-13.797-13.797h-30.627c-7.607 0-13.797 6.189-13.797 13.797v24.293c0 7.607 6.189 13.797 13.797 13.797h30.627c7.607 0 13.797-6.189 13.797-13.797zm-15 23.09h-28.221v-21.887h28.221z" />
                                                    <path
                                                        d="m436.536 346.717h-30.627c-7.607 0-13.797 6.189-13.797 13.797v24.293c0 7.607 6.189 13.797 13.797 13.797h30.627c7.607 0 13.797-6.189 13.797-13.797v-24.293c0-7.608-6.189-13.797-13.797-13.797zm-1.203 36.887h-28.221v-21.887h28.221z" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-4 mt-3">
                    <div class="bd-box">
                        <div class="row align-items-center">
                            <div class="col-md-8 col-sm-8 col-12">
                                <div class="bd-box-left">
                                    <h4 class="bold-text">{{$totalEmailContact}}</h4>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-12">
                                <div class="bd-box-right">

                                    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        class="img-fluid bd-icons" height="56px" width="53px"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 511.974 511.974" style="enable-background:new 0 0 511.974 511.974;"
                                        xml:space="preserve">
                                        <g>
                                            <g>
                                                <g>
                                                    <path d="M511.872,195.725c-0.053-0.588-0.17-1.169-0.35-1.732c-0.117-0.503-0.28-0.994-0.486-1.468
                                            c-0.239-0.463-0.525-0.901-0.853-1.306c-0.329-0.481-0.71-0.924-1.135-1.323c-0.137-0.119-0.196-0.282-0.341-0.401
                                            l-82.065-63.735V59.704c0-14.138-11.462-25.6-25.6-25.6h-92.476L271.539,5.355c-9.147-7.134-21.974-7.134-31.121,0
                                            l-37.035,28.749h-92.476c-14.138,0-25.6,11.461-25.6,25.6v66.057L3.268,189.496c-0.145,0.12-0.205,0.282-0.341,0.401
                                            c-0.425,0.398-0.806,0.842-1.135,1.323c-0.328,0.405-0.614,0.842-0.853,1.306c-0.207,0.473-0.369,0.965-0.486,1.468
                                            c-0.178,0.555-0.295,1.127-0.35,1.707c0,0.179-0.102,0.333-0.102,0.512V486.37c0.012,5.428,1.768,10.708,5.009,15.061
                                            c0.051,0.077,0.06,0.171,0.119,0.239c0.06,0.068,0.188,0.145,0.273,0.239c4.794,6.308,12.25,10.027,20.173,10.061h460.8
                                            c7.954-0.024,15.441-3.761,20.241-10.103c0.068-0.085,0.171-0.111,0.23-0.196c0.06-0.085,0.068-0.162,0.12-0.239
                                            c3.241-4.354,4.997-9.634,5.009-15.061V196.237C511.974,196.058,511.881,195.904,511.872,195.725z M250.854,18.82
                                            c2.98-2.368,7.2-2.368,10.18,0l19.686,15.283h-49.493L250.854,18.82z M27.725,494.904l223.13-173.321
                                            c2.982-2.364,7.199-2.364,10.18,0l223.189,173.321H27.725z M494.908,481.6L271.539,308.117c-9.149-7.128-21.972-7.128-31.121,0
                                            L17.041,481.6V209.233L156.877,317.82c3.726,2.889,9.088,2.211,11.977-1.515c2.889-3.726,2.211-9.088-1.515-11.977
                                            L25.276,194.018l60.032-46.652v65.937c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-153.6
                                            c0-4.713,3.82-8.533,8.533-8.533h290.133c4.713,0,8.533,3.82,8.533,8.533v153.6c0,4.713,3.82,8.533,8.533,8.533
                                            s8.533-3.821,8.533-8.533v-65.937l60.032,46.652l-142.31,110.507c-2.448,1.855-3.711,4.883-3.305,7.928s2.417,5.637,5.266,6.786
                                            c2.849,1.149,6.096,0.679,8.501-1.232l140.083-108.774V481.6z" />
                                                    <path d="M358.374,204.77v-34.133c0-56.554-45.846-102.4-102.4-102.4c-56.554,0-102.4,45.846-102.4,102.4
                                            s45.846,102.4,102.4,102.4c4.713,0,8.533-3.82,8.533-8.533s-3.82-8.533-8.533-8.533c-47.128,0-85.333-38.205-85.333-85.333
                                            s38.205-85.333,85.333-85.333s85.333,38.205,85.333,85.333v34.133c0,9.426-7.641,17.067-17.067,17.067
                                            s-17.067-7.641-17.067-17.067v-34.133c0-4.713-3.82-8.533-8.533-8.533s-8.533,3.82-8.533,8.533
                                            c0,18.851-15.282,34.133-34.133,34.133c-18.851,0-34.133-15.282-34.133-34.133s15.282-34.133,34.133-34.133
                                            c4.713,0,8.533-3.82,8.533-8.533s-3.82-8.533-8.533-8.533c-22.915-0.051-43.074,15.13-49.354,37.168
                                            c-6.28,22.038,2.847,45.565,22.347,57.601c19.5,12.036,44.622,9.65,61.507-5.843c1.858,18.046,17.543,31.464,35.659,30.505
                                            C344.25,237.91,358.431,222.912,358.374,204.77z" />
                                                </g>
                                            </g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-4 mt-3">
                    <div class="bd-box">
                        <div class="row align-items-center">
                            <div class="col-md-8 col-sm-8 col-12">
                                <div class="bd-box-left">
                                    <h4 class="bold-text">{{$totalMobileContact}}</h4>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-12">
                                <div class="bd-box-right">
                                    @php
                                    /*<?xml version="1.0" encoding="iso-8859-1"?>*/
                                    @endphp
                                    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                    <svg version="1.1" id="Capa_1" height="56px" width="56px" class="img-fluid bd-icons"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                        xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M64.006,212.872c-5.522,0-10,4.499-10,10.022s4.477,10,10,10c5.522,0,10-4.477,10-10v-0.044
                                                C74.006,217.327,69.528,212.872,64.006,212.872z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M407.994,0H104.006c-27.57,0-50,22.43-50,50v133.16c0,5.523,4.478,10,10,10c5.522,0,10-4.477,10-10V50
                                                c0-16.542,13.458-30,30-30h303.988c16.542,0,30,13.458,30,30v332c0,16.542-13.458,30-30,30H104.006
                                                c-11.248,0-21.638,3.735-30,10.027V261.708c0-5.523-4.478-10-10-10c-5.522,0-10,4.477-10,10V462c0,27.57,22.43,50,50,50h303.988
                                                c27.57,0,50-22.43,50-50V50C457.994,22.43,435.564,0,407.994,0z M437.994,462c0,16.542-13.458,30-30,30H104.006
                                                c-16.542,0-30-13.458-30-30s13.458-30,30-30h303.988c11.245,0,21.635-3.732,29.996-10.021
                                                c-0.079,16.475-13.503,29.854-29.996,29.854H154.339c-5.522,0-10,4.477-10,10s4.478,10,10,10h253.655
                                                c11.248,0,21.638-3.735,30-10.027V462z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M127.781,455.038c-1.859-1.86-4.439-2.93-7.069-2.93c-2.63,0-5.209,1.07-7.07,2.93c-1.861,1.86-2.93,4.44-2.93,7.07
                                                s1.07,5.21,2.93,7.07c1.86,1.86,4.44,2.93,7.07,2.93c2.63,0,5.21-1.07,7.069-2.93c1.861-1.86,2.931-4.44,2.931-7.07
                                                C130.712,459.468,129.641,456.898,127.781,455.038z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M373.205,246.836l-37.435-37.434c-5.588-5.588-13.018-8.666-20.921-8.666c-7.902,0-15.332,3.078-20.92,8.666
                                                l-12.178,12.178c-1.205,1.204-2.612,1.384-3.343,1.384c-0.731,0-2.137-0.179-3.341-1.384l-36.525-36.525
                                                c-1.843-1.842-1.843-4.84,0-6.683l12.179-12.178c11.535-11.535,11.535-30.305,0-41.841L213.317,86.95
                                                c-5.98-5.98-14.242-9.12-22.691-8.613c-8.441,0.506-16.278,4.612-21.5,11.264h-0.001l-8.032,10.232
                                                c-29.746,37.892-26.491,92.154,7.572,126.218l65.438,65.438c18.477,18.477,42.889,27.887,67.415,27.887
                                                c20.69,0,41.463-6.703,58.803-20.315l10.232-8.033c6.652-5.223,10.757-13.059,11.264-21.5
                                                C382.323,261.087,379.184,252.816,373.205,246.836z M361.85,268.333c-0.166,2.775-1.461,5.249-3.648,6.965l-10.232,8.033
                                                c-29.939,23.503-72.813,20.931-99.726-5.983l-65.438-65.438c-26.914-26.914-29.486-69.787-5.982-99.726l8.032-10.232
                                                c1.717-2.187,4.191-3.483,6.966-3.65c2.781-0.167,5.386,0.825,7.352,2.791l37.404,37.403c3.737,3.738,3.737,9.82,0,13.557
                                                l-12.179,12.179c-9.641,9.641-9.641,25.327,0,34.968l36.525,36.525c4.67,4.67,10.879,7.242,17.483,7.242
                                                s12.813-2.572,17.484-7.242l12.179-12.179c1.81-1.811,4.217-2.808,6.777-2.808c2.56,0,4.967,0.997,6.778,2.808l37.435,37.434
                                                C361.026,262.946,362.017,265.558,361.85,268.333z" />
                                            </g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="access-business-directory">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="access-business-directory__left">
                            <h4 class="main-heading text-white">@lang('home.business_directory')</h4>
                            <p class="text-white pt-3 pb-4">@lang('home.directory_description')</p>
                            <div class="row mt-4">
                                <div class="col-md-3 col-sm-3 col-6 text-center mt-3 mb-3">

                                    <svg id="Line_expand" height="70px" viewBox="0 0 512 512" width="70px"
                                        class="bd-icons img-fluid" xmlns="http://www.w3.org/2000/svg"
                                        data-name="Line expand">
                                        <g>
                                            <path
                                                d="m478 120h-14v-96a8 8 0 0 0 -8-8h-312v16h304v32h-384v-32h64v-16h-72a8 8 0 0 0 -8 8v96h-14a18.021 18.021 0 0 0 -18 18v260a18.021 18.021 0 0 0 18 18h166v3.17a31.957 31.957 0 0 1 -21.88 30.357l-6.974 2.325a27.966 27.966 0 0 0 -19.146 26.563v9.585a8 8 0 0 0 8 8h192a8 8 0 0 0 8-8v-9.585a27.966 27.966 0 0 0 -19.146-26.563l-6.973-2.325a31.957 31.957 0 0 1 -21.881-30.357v-3.17h64v-16h-342a2 2 0 0 1 -2-2v-54h16v16a8 8 0 0 0 8 8h400a8 8 0 0 0 8-8v-16h16v54a2 2 0 0 1 -2 2h-86v16h86a18.021 18.021 0 0 0 18-18v-260a18.021 18.021 0 0 0 -18-18zm-182 296v3.17a47.938 47.938 0 0 0 32.821 45.537l6.973 2.324a11.985 11.985 0 0 1 8.206 11.384v1.585h-176v-1.585a11.986 11.986 0 0 1 8.205-11.384l6.975-2.324a47.939 47.939 0 0 0 32.82-45.537v-3.17zm-264-88v-190a2 2 0 0 1 2-2h14v192zm32 24v-272h384v272zm400-24v-192h14a2 2 0 0 1 2 2v190z" />
                                            <path d="m416 40h16v16h-16z" />
                                            <path d="m144 40h16v16h-16z" />
                                            <path d="m80 40h16v16h-16z" />
                                            <path d="m112 40h16v16h-16z" />
                                            <path d="m168 224h40v16h-40z" />
                                            <path d="m224 224h56v16h-56z" />
                                            <path d="m168 256h24v16h-24z" />
                                            <path d="m208 256h72v16h-72z" />
                                            <path d="m168 288h96v16h-96z" />
                                            <path d="m168 120h16v32h-16z" />
                                            <path
                                                d="m392 176a39.966 39.966 0 0 0 -16-31.98v-20.02a28.032 28.032 0 0 0 -28-28h-184a28.032 28.032 0 0 0 -28 28v24a28.032 28.032 0 0 0 28 28h148a39.769 39.769 0 0 0 3.34 16h-171.34a8 8 0 0 0 -8 8v128a8 8 0 0 0 8 8h224a8 8 0 0 0 8-8v-120.02a40.168 40.168 0 0 0 4.5-3.947l31.379 18.827 8.232-13.72-30.879-18.528a39.8 39.8 0 0 0 2.768-14.612zm-16 0a24 24 0 1 1 -24-24 24.028 24.028 0 0 1 24 24zm-212-16a12.013 12.013 0 0 1 -12-12v-24a12.013 12.013 0 0 1 12-12h184a12.013 12.013 0 0 1 12 12v12.8a40.026 40.026 0 0 0 -44.66 23.2zm196 160h-208v-112h176v-.02a39.986 39.986 0 0 0 32 7.216z" />
                                        </g>
                                    </svg>
                                    <p class="text-white pt-3">@lang('home.keywords')</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-6 text-center mt-3 mb-3">

                                    <svg id="Capa_1" enable-background="new 0 0 512 512" height="70px"
                                        viewBox="0 0 512 512" width="70px" class="bd-icons img-fluid"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="_x31_0_briefcase_2_">
                                            <path
                                                d="m0 437.007c0 23.435 19.065 42.5 42.5 42.5h42.414c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-42.414c-15.164 0-27.5-12.336-27.5-27.5v-143.328c7.419 6.313 17.019 10.134 27.5 10.134h169.673v31.658c0 9.649 7.851 17.5 17.5 17.5h52.654c9.65 0 17.5-7.851 17.5-17.5v-31.658h84.879c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-342.206c-15.164 0-27.5-12.336-27.5-27.5v-105.694c0-15.163 12.336-27.5 27.5-27.5h427c15.164 0 27.5 12.337 27.5 27.5v105.694c0 15.164-12.336 27.5-27.5 27.5h-51.906c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h51.906c10.481 0 20.082-3.822 27.5-10.134v143.328c0 15.164-12.336 27.5-27.5 27.5h-351.698c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h351.698c23.435 0 42.5-19.065 42.5-42.5v-281.388c0-23.434-19.065-42.5-42.5-42.5h-102.422v-35.626c0-24.813-20.186-45-45-45h-76.684c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h76.684c16.542 0 30 13.458 30 30v35.626h-20v-25.626c0-11.028-8.972-20-20-20h-112.156c-11.028 0-20 8.972-20 20v25.626h-20v-35.626c0-16.542 13.458-30 30-30h22.585c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-22.585c-24.814 0-45 20.187-45 45v35.626h-102.422c-23.435 0-42.5 19.065-42.5 42.5zm284.827-133.194v31.658c0 1.378-1.121 2.5-2.5 2.5h-52.654c-1.379 0-2.5-1.122-2.5-2.5v-31.658zm-89.905-216.32c0-2.757 2.243-5 5-5h112.156c2.757 0 5 2.243 5 5v25.626h-122.156z" />
                                            <circle cx="256" cy="320.892" r="7.5" />
                                            <path
                                                d="m451.345 445.638c9.649 0 17.5-7.851 17.5-17.5v-23.924c0-9.649-7.851-17.5-17.5-17.5h-81.767c-9.649 0-17.5 7.851-17.5 17.5v23.924c0 9.649 7.851 17.5 17.5 17.5zm2.5-41.424v23.924c0 1.378-1.121 2.5-2.5 2.5h-39.004l13.17-28.924h25.834c1.379 0 2.5 1.121 2.5 2.5zm-86.767 23.924v-23.924c0-1.379 1.121-2.5 2.5-2.5h39.45l-13.17 28.924h-26.28c-1.379 0-2.5-1.122-2.5-2.5z" />
                                        </g>
                                    </svg>
                                    <p class="text-white pt-3">@lang('home.Sectors')</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-6 text-center mt-3 mb-3">

                                    <svg height="70px" viewBox="0 0 128 128" width="70px" class="bd-icons img-fluid"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="m80.229 82.863c.231-.376.462-.745.693-1.128 10.389-17.2 15.617-32.246 15.542-44.715a32.464 32.464 0 0 0 -64.927-.011c-.076 12.48 5.153 27.528 15.542 44.726.231.383.462.752.693 1.128-21.872 2.703-36.372 10.52-36.372 19.801 0 11.652 23.1 20.779 52.6 20.779s52.6-9.127 52.6-20.779c0-9.281-14.5-17.098-36.371-19.801zm-45.192-45.843a28.964 28.964 0 1 1 57.927.011c.15 24.858-23.09 55.517-28.964 62.869-5.874-7.352-29.115-38.012-28.963-62.88zm28.963 82.923c-29.371 0-49.1-8.935-49.1-17.279 0-7.4 14.629-14.285 34.934-16.518a185.3 185.3 0 0 0 12.833 17.654 1.748 1.748 0 0 0 2.666 0 185.3 185.3 0 0 0 12.834-17.654c20.3 2.233 34.934 9.114 34.934 16.518-.001 8.344-19.73 17.279-49.101 17.279z" />
                                            <path
                                                d="m49.692 109.807c-7.766-.994-14-2.744-17.548-4.925a1.75 1.75 0 1 0 -1.833 2.981c3.963 2.436 10.689 4.36 18.937 5.415a1.7 1.7 0 0 0 .224.014 1.75 1.75 0 0 0 .22-3.485z" />
                                            <path
                                                d="m66.939 110.643c-2.439.056-4.979.043-7.458-.048a1.75 1.75 0 1 0 -.129 3.5c1.538.056 3.1.085 4.648.085q1.527 0 3.021-.036a1.75 1.75 0 0 0 1.709-1.79 1.73 1.73 0 0 0 -1.791-1.711z" />
                                            <path
                                                d="m78.777 37.02a14.778 14.778 0 1 0 -14.777 14.78 14.795 14.795 0 0 0 14.777-14.78zm-26.055 0a11.278 11.278 0 1 1 11.278 11.28 11.29 11.29 0 0 1 -11.278-11.28z" />
                                        </g>
                                    </svg>
                                    <p class="text-white pt-3">@lang('home.Area')</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-6 text-center mt-3 mb-3">
                                    <svg height="70px" viewBox="-26 -26 853.33331 853.33331" width="70px"
                                        class="bd-icons img-fluid" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m484.34375 398.25h14.484375c18.078125-.023438 32.734375-14.675781 32.753906-32.757812v-41.148438c-.019531-18.085938-14.675781-32.738281-32.753906-32.757812h-14.484375c-18.082031.019531-32.734375 14.671874-32.761719 32.757812v41.148438c.027344 18.082031 14.679688 32.734374 32.761719 32.757812zm-6.09375-73.90625c.003906-3.363281 2.734375-6.082031 6.09375-6.09375h14.484375c3.359375.011719 6.082031 2.730469 6.085937 6.09375v41.148438c-.003906 3.359374-2.726562 6.089843-6.085937 6.09375h-14.484375c-3.359375-.003907-6.089844-2.734376-6.09375-6.09375zm0 0" />
                                        <path
                                            d="m411.585938 471.007812c7.363281 0 13.328124-5.964843 13.328124-13.332031.007813-3.359375 2.734376-6.085937 6.09375-6.09375h14.484376c3.363281.007813 6.082031 2.734375 6.089843 6.09375v41.152344c0 7.355469 5.96875 13.328125 13.339844 13.328125 7.355469 0 13.328125-5.972656 13.328125-13.328125v-41.152344c-.019531-18.078125-14.671875-32.734375-32.757812-32.761719h-14.484376c-18.078124.027344-32.734374 14.683594-32.757812 32.761719 0 7.367188 5.96875 13.332031 13.335938 13.332031zm0 0" />
                                        <path
                                            d="m411.585938 398.25c7.363281 0 13.328124-5.964844 13.328124-13.335938v-80c0-7.355468-5.964843-13.328124-13.328124-13.328124-7.367188 0-13.335938 5.972656-13.335938 13.328124v80c0 7.371094 5.96875 13.335938 13.335938 13.335938zm0 0" />
                                        <path
                                            d="m571.585938 398.25c7.359374 0 13.328124-5.964844 13.328124-13.335938v-80c0-7.355468-5.96875-13.328124-13.328124-13.328124-7.367188 0-13.335938 5.972656-13.335938 13.328124v80c0 7.371094 5.96875 13.335938 13.335938 13.335938zm0 0" />
                                        <path
                                            d="m518.25 424.914062c-7.363281 0-13.335938 5.972657-13.335938 13.335938v53.335938c0 7.359374 5.972657 13.328124 13.335938 13.328124s13.332031-5.96875 13.332031-13.328124v-53.335938c0-7.363281-5.96875-13.335938-13.332031-13.335938zm0 0" />
                                        <path
                                            d="m571.585938 478.25c7.359374 0 13.328124-5.972656 13.328124-13.328125v-26.671875c0-7.363281-5.96875-13.335938-13.328124-13.335938-7.367188 0-13.335938 5.972657-13.335938 13.335938v26.671875c0 7.355469 5.96875 13.328125 13.335938 13.328125zm0 0" />
                                        <path
                                            d="m758.25-1.75h-720c-22.089844 0-40 17.910156-40 40v720c0 22.089844 17.910156 40 40 40h720c22.089844 0 40-17.910156 40-40v-720c0-22.089844-17.910156-40-40-40zm-733.335938 40c0-7.363281 5.972657-13.335938 13.335938-13.335938h720c7.363281 0 13.335938 5.972657 13.335938 13.335938v66.664062h-746.671876zm746.671876 93.332031v533.339844h-746.671876v-533.339844zm0 626.667969c0 7.363281-5.972657 13.335938-13.335938 13.335938h-720c-7.363281 0-13.335938-5.972657-13.335938-13.335938v-66.664062h746.671876zm0 0" />
                                        <path
                                            d="m318.25 384.914062c-.085938 67.691407 39.28125 129.230469 100.792969 157.507813 61.492187 28.285156 133.839843 18.125 185.164062-26.011719l117.949219 117.933594c5.234375 5.050781 13.550781 4.980469 18.691406-.160156 5.148438-5.148438 5.214844-13.460938.167969-18.691406l-117.9375-117.949219c49.949219-58.304688 55.566406-142.53125 13.804687-206.957031-41.757812-64.425782-120.945312-93.679688-194.558593-71.882813-73.621094 21.789063-124.113281 89.433594-124.074219 166.210937zm173.335938-146.664062c81 0 146.664062 65.664062 146.664062 146.664062 0 81.007813-65.664062 146.667969-146.664062 146.667969-81.007813 0-146.664063-65.660156-146.664063-146.667969.097656-80.957031 65.703125-146.570312 146.664063-146.664062zm0 0" />
                                        <path
                                            d="m64.921875 198.25h293.328125c7.363281 0 13.335938-5.964844 13.335938-13.335938 0-7.363281-5.972657-13.328124-13.335938-13.328124h-293.328125c-7.371094 0-13.339844 5.964843-13.339844 13.328124 0 7.371094 5.96875 13.335938 13.339844 13.335938zm0 0" />
                                        <path
                                            d="m64.921875 251.582031h119.992187c7.371094 0 13.335938-5.96875 13.335938-13.332031s-5.964844-13.335938-13.335938-13.335938h-119.992187c-7.371094 0-13.339844 5.972657-13.339844 13.335938s5.96875 13.332031 13.339844 13.332031zm0 0" />
                                        <path
                                            d="m651.582031 198.25h53.332031c7.371094 0 13.335938-5.964844 13.335938-13.335938 0-7.363281-5.964844-13.328124-13.335938-13.328124h-53.332031c-7.359375 0-13.332031 5.964843-13.332031 13.328124 0 7.371094 5.972656 13.335938 13.332031 13.335938zm0 0" />
                                        <path
                                            d="m704.914062 224.914062h-26.664062c-7.363281 0-13.328125 5.972657-13.328125 13.335938s5.964844 13.332031 13.328125 13.332031h26.664062c7.371094 0 13.335938-5.96875 13.335938-13.332031s-5.964844-13.335938-13.335938-13.335938zm0 0" />
                                        <path
                                            d="m704.914062 491.585938h-26.664062c-7.363281 0-13.328125 5.972656-13.328125 13.328124 0 7.371094 5.964844 13.335938 13.328125 13.335938h26.664062c7.371094 0 13.335938-5.964844 13.335938-13.335938 0-7.355468-5.964844-13.328124-13.335938-13.328124zm0 0" />
                                        <path
                                            d="m704.914062 278.25h-26.664062c-7.363281 0-13.328125 5.96875-13.328125 13.335938 0 7.359374 5.964844 13.328124 13.328125 13.328124h26.664062c7.371094 0 13.335938-5.96875 13.335938-13.328124 0-7.367188-5.964844-13.335938-13.335938-13.335938zm0 0" />
                                        <path
                                            d="m611.585938 598.25h-26.671876c-7.363281 0-13.328124 5.96875-13.328124 13.335938 0 7.363281 5.964843 13.328124 13.328124 13.328124h26.671876c7.363281 0 13.328124-5.964843 13.328124-13.328124 0-7.367188-5.964843-13.335938-13.328124-13.335938zm0 0" />
                                        <path
                                            d="m64.921875 304.914062h159.992187c7.371094 0 13.335938-5.96875 13.335938-13.328124 0-7.367188-5.964844-13.335938-13.335938-13.335938h-159.992187c-7.371094 0-13.339844 5.96875-13.339844 13.335938 0 7.359374 5.96875 13.328124 13.339844 13.328124zm0 0" />
                                        <path
                                            d="m64.921875 358.25h26.664063c7.359374 0 13.328124-5.972656 13.328124-13.328125 0-7.371094-5.96875-13.339844-13.328124-13.339844h-26.664063c-7.371094 0-13.339844 5.96875-13.339844 13.339844 0 7.355469 5.96875 13.328125 13.339844 13.328125zm0 0" />
                                        <path
                                            d="m224.914062 411.585938h26.667969c7.367188 0 13.339844-5.972657 13.339844-13.335938s-5.972656-13.335938-13.339844-13.335938h-26.667969c-7.355468 0-13.328124 5.972657-13.328124 13.335938s5.972656 13.335938 13.328124 13.335938zm0 0" />
                                        <path
                                            d="m278.25 344.921875c0-7.371094-5.972656-13.339844-13.328125-13.339844h-93.335937c-7.367188 0-13.335938 5.96875-13.335938 13.339844 0 7.355469 5.96875 13.328125 13.335938 13.328125h93.335937c7.355469 0 13.328125-5.972656 13.328125-13.328125zm0 0" />
                                        <path
                                            d="m171.585938 504.914062c0 7.371094 5.964843 13.335938 13.328124 13.335938h93.335938c7.363281 0 13.335938-5.964844 13.335938-13.335938 0-7.355468-5.972657-13.328124-13.335938-13.328124h-93.335938c-7.363281 0-13.328124 5.972656-13.328124 13.328124zm0 0" />
                                        <path
                                            d="m64.921875 411.585938h80c7.355469 0 13.328125-5.972657 13.328125-13.335938s-5.972656-13.335938-13.328125-13.335938h-80c-7.371094 0-13.339844 5.972657-13.339844 13.335938s5.96875 13.335938 13.339844 13.335938zm0 0" />
                                        <path
                                            d="m64.921875 464.921875h119.992187c7.371094 0 13.335938-5.972656 13.335938-13.339844 0-7.359375-5.964844-13.332031-13.335938-13.332031h-119.992187c-7.371094 0-13.339844 5.972656-13.339844 13.332031 0 7.367188 5.96875 13.339844 13.339844 13.339844zm0 0" />
                                        <path
                                            d="m64.921875 518.25h66.660156c7.367188 0 13.339844-5.964844 13.339844-13.335938 0-7.355468-5.972656-13.328124-13.339844-13.328124h-66.660156c-7.371094 0-13.339844 5.972656-13.339844 13.328124 0 7.371094 5.96875 13.335938 13.339844 13.335938zm0 0" />
                                        <path
                                            d="m64.921875 571.585938h280c7.355469 0 13.328125-5.972657 13.328125-13.335938s-5.972656-13.328125-13.328125-13.328125h-280c-7.371094 0-13.339844 5.964844-13.339844 13.328125s5.96875 13.335938 13.339844 13.335938zm0 0" />
                                        <path
                                            d="m171.585938 598.25h-106.664063c-7.371094 0-13.339844 5.96875-13.339844 13.335938 0 7.363281 5.96875 13.328124 13.339844 13.328124h106.664063c7.359374 0 13.328124-5.964843 13.328124-13.328124 0-7.367188-5.96875-13.335938-13.328124-13.335938zm0 0" />
                                        <path
                                            d="m491.585938 598.25h-173.335938c-7.363281 0-13.335938 5.96875-13.335938 13.335938 0 7.363281 5.972657 13.328124 13.335938 13.328124h173.335938c7.359374 0 13.328124-5.964843 13.328124-13.328124 0-7.367188-5.96875-13.335938-13.328124-13.335938zm0 0" />
                                        <path
                                            d="m78.25 64.921875c0 7.355469-5.972656 13.328125-13.328125 13.328125-7.371094 0-13.339844-5.972656-13.339844-13.328125 0-7.371094 5.96875-13.339844 13.339844-13.339844 7.355469 0 13.328125 5.96875 13.328125 13.339844zm0 0" />
                                        <path
                                            d="m131.582031 64.921875c0 7.355469-5.96875 13.328125-13.332031 13.328125s-13.335938-5.972656-13.335938-13.328125c0-7.371094 5.972657-13.339844 13.335938-13.339844s13.332031 5.96875 13.332031 13.339844zm0 0" />
                                        <path
                                            d="m184.914062 64.921875c0 7.355469-5.96875 13.328125-13.328124 13.328125-7.367188 0-13.335938-5.972656-13.335938-13.328125 0-7.371094 5.96875-13.339844 13.335938-13.339844 7.359374 0 13.328124 5.96875 13.328124 13.339844zm0 0" />
                                        </svg>
                                    <p class="text-white pt-3">@lang('home.activity_code')</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-6 text-center mt-3 mb-3">
                                    @php
                                    /*<?xml version="1.0"?>*/
                                    @endphp
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="70px"
                                        height="70px" class="bd-icons img-fluid">
                                        <g id="Calendar">
                                            <path
                                                d="M57,8H52V6a4,4,0,0,0-8,0V8H36V6a4,4,0,0,0-8,0V8H20V6a4,4,0,0,0-8,0V8H7a5,5,0,0,0-5,5V53a5,5,0,0,0,5,5H35a1,1,0,0,0,0-2H7a3.009,3.009,0,0,1-3-3V22H60V39a1,1,0,0,0,2,0V13A5,5,0,0,0,57,8ZM46,6a2,2,0,0,1,4,0v6a2,2,0,0,1-4,0ZM30,6a2,2,0,0,1,4,0v6a2,2,0,0,1-4,0ZM14,6a2,2,0,0,1,4,0v6a2,2,0,0,1-4,0ZM60,20H4V13a3.009,3.009,0,0,1,3-3h5v2a4,4,0,0,0,8,0V10h8v2a4,4,0,0,0,8,0V10h8v2a4,4,0,0,0,8,0V10h5a3.009,3.009,0,0,1,3,3Z" />
                                            <path
                                                d="M30,29a2,2,0,0,0-2-2H24a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2h4a2,2,0,0,0,2-2Zm-6,3V29h4v3Z" />
                                            <path
                                                d="M18,29a2,2,0,0,0-2-2H12a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2h4a2,2,0,0,0,2-2Zm-6,3V29h4v3Z" />
                                            <path
                                                d="M52,34a2,2,0,0,0,2-2V29a2,2,0,0,0-2-2H48a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2Zm-4-5h4v3H48Z" />
                                            <path
                                                d="M30,38a2,2,0,0,0-2-2H24a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2h4a2,2,0,0,0,2-2Zm-6,3V38h4v3Z" />
                                            <path
                                                d="M18,38a2,2,0,0,0-2-2H12a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2h4a2,2,0,0,0,2-2Zm-6,3V38h4v3Z" />
                                            <path
                                                d="M28,45H24a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2h4a2,2,0,0,0,2-2V47A2,2,0,0,0,28,45Zm-4,5V47h4v3Z" />
                                            <path
                                                d="M36,34h4a2,2,0,0,0,2-2V29a2,2,0,0,0-2-2H36a2,2,0,0,0-2,2v3A2,2,0,0,0,36,34Zm0-5h4v3H36Z" />
                                            <path
                                                d="M34,41a2,2,0,0,0,2,2,1,1,0,0,0,0-2V38h4a1,1,0,0,0,0-2H36a2,2,0,0,0-2,2Z" />
                                            <path
                                                d="M16,45H12a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2h4a2,2,0,0,0,2-2V47A2,2,0,0,0,16,45Zm-4,5V47h4v3Z" />
                                            <path
                                                d="M49,36A13,13,0,1,0,62,49,13.015,13.015,0,0,0,49,36Zm0,24A11,11,0,1,1,60,49,11.013,11.013,0,0,1,49,60Z" />
                                            <path
                                                d="M54.778,44.808,47,52.586,43.465,49.05a1,1,0,0,0-1.414,1.414l4.242,4.243a1,1,0,0,0,1.414,0l8.485-8.485a1,1,0,0,0-1.414-1.414Z" />
                                        </g>
                                    </svg>

                                    <p class="text-white pt-3">@lang('home.creation_date')</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-6 text-center mt-3 mb-3">

                                    <svg height="70px" viewBox="0 0 512 512" width="70px" class="bd-icons img-fluid"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="Outline">
                                            <path
                                                d="m212.854 480h-121.708a59.146 59.146 0 0 1 -48.739-92.653l73.801-107.347h71.584l63.616 92.532 13.184-9.064-64.592-93.953v-26.849l18.3-24.4a28.674 28.674 0 0 0 5.7-17.1 28.5 28.5 0 0 0 -41.243-25.489l-30.757 15.379-30.757-15.378a28.5 28.5 0 0 0 -41.243 25.489 28.674 28.674 0 0 0 5.7 17.1l18.3 24.4v26.849l-74.777 108.767a75.144 75.144 0 0 0 61.923 117.717h121.708c1.165 0 2.347-.027 3.513-.081l-.734-15.983c-.923.043-1.858.064-2.779.064zm-92.854-216v-16h64v16zm-24-62.833a12.5 12.5 0 0 1 18.088-11.179l34.334 17.167a8 8 0 0 0 7.156 0l34.334-17.167a12.5 12.5 0 0 1 18.088 11.179 12.58 12.58 0 0 1 -2.5 7.5l-17.5 23.333h-72l-17.5-23.333a12.58 12.58 0 0 1 -2.5-7.5z" />
                                            <path
                                                d="m176 376v-1.167a22.873 22.873 0 0 0 -16-21.788v-9.045h-16v9.045a22.834 22.834 0 0 0 -3.378 42.21l15.6 7.8a6.833 6.833 0 0 1 -3.055 12.945h-2.334a6.84 6.84 0 0 1 -6.833-6.833v-1.167h-16v1.167a22.873 22.873 0 0 0 16 21.788v9.045h16v-9.045a22.834 22.834 0 0 0 3.378-42.21l-15.6-7.8a6.833 6.833 0 0 1 3.055-12.945h2.334a6.84 6.84 0 0 1 6.833 6.833v1.167z" />
                                            <path d="m96 384h16v16h-16z" />
                                            <path d="m192 384h16v16h-16z" />
                                            <path
                                                d="m376 408a24.027 24.027 0 0 0 -24-24h-96a23.985 23.985 0 0 0 -22.3 32.846 24 24 0 0 0 0 46.308 23.985 23.985 0 0 0 22.3 32.846h96a24 24 0 0 0 6.3-47.154 23.9 23.9 0 0 0 0-17.692 24.039 24.039 0 0 0 17.7-23.154zm-136 24h96a8 8 0 0 1 0 16h-96a8 8 0 0 1 0-16zm112 48h-96a8 8 0 0 1 0-16h96a8 8 0 0 1 0 16zm0-64h-96a8 8 0 0 1 0-16h96a8 8 0 0 1 0 16z" />
                                            <path
                                                d="m350.265 95.81 65.735 14.607v73.583h16v-80a8 8 0 0 0 -6.265-7.81l-9.735-2.163v-30.027h-16v26.471l-16-3.555v-38.916h-16v35.36l-14.265-3.17z" />
                                            <path d="m176 80h32v16h-32z" />
                                            <path d="m224 80h32v16h-32z" />
                                            <path d="m272 80h32v16h-32z" />
                                            <path d="m176 112h32v16h-32z" />
                                            <path d="m224 112h32v16h-32z" />
                                            <path d="m272 112h32v16h-32z" />
                                            <path d="m224 144h32v16h-32z" />
                                            <path d="m176 144h32v16h-32z" />
                                            <path d="m272 144h32v16h-32z" />
                                            <path d="m240 176h16v16h-16z" />
                                            <path d="m272 176h32v16h-32z" />
                                            <path d="m240 208h16v16h-16z" />
                                            <path d="m272 208h32v16h-32z" />
                                            <path d="m240 240h16v16h-16z" />
                                            <path d="m272 240h32v16h-32z" />
                                            <path d="m240 272h16v16h-16z" />
                                            <path d="m272 272h32v16h-32z" />
                                            <path d="m272 304h32v16h-32z" />
                                            <path d="m408 240h32v16h-32z" />
                                            <path d="m408 272h32v16h-32z" />
                                            <path d="m408 304h32v16h-32z" />
                                            <path d="m408 336h32v16h-32z" />
                                            <path d="m408 368h32v16h-32z" />
                                            <path d="m408 400h32v16h-32z" />
                                            <path d="m408 432h32v16h-32z" />
                                            <path d="m360 240h32v16h-32z" />
                                            <path d="m360 272h32v16h-32z" />
                                            <path d="m360 304h32v16h-32z" />
                                            <path d="m360 336h32v16h-32z" />
                                            <path
                                                d="m136 64h8v104h16v-104h160v304h16v-304h8a8 8 0 0 0 8-8v-32a8 8 0 0 0 -8-8h-208a8 8 0 0 0 -8 8v32a8 8 0 0 0 8 8zm8-32h192v16h-192z" />
                                            <path d="m472 480v-272a8 8 0 0 0 -8-8h-112v16h104v264h-72v16h112v-16z" />
                                            <path d="m384 160h16v16h-16z" />
                                            <path d="m352 160h16v16h-16z" />
                                            <path d="m384 128h16v16h-16z" />
                                            <path d="m352 128h16v16h-16z" />
                                        </g>
                                    </svg>
                                    <p class="text-white pt-3">@lang('home.Capital')</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-6 text-center mt-3 mb-3">
                                    @php
                                    /*<?xml version="1.0" encoding="iso-8859-1"?>*/
                                    @endphp
                                    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                    <svg version="1.1" id="Capa_1" height="70px" width="70px" class="bd-icons img-fluid"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 496 496" style="enable-background:new 0 0 496 496;"
                                        xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M104,104c-8.824,0-16-7.176-16-16s7.176-16,16-16s16,7.176,16,16h16c0-17.648-14.352-32-32-32S72,70.352,72,88
                                                s14.352,32,32,32c8.824,0,16,7.176,16,16c0,8.824-7.176,16-16,16s-16-7.176-16-16H72c0,17.648,14.352,32,32,32s32-14.352,32-32
                                                S121.648,104,104,104z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <rect x="96" y="40" width="16" height="24" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <rect x="96" y="160" width="16" height="24" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M0,448v48h144v-48H0z M128,480H16v-16h112V480z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M0,416v48h144v-48H0z M128,448H16v-16h112V448z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M0,384v48h144v-48H0z M128,416H16v-16h112V416z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <polygon
                                                    points="208,448 208,464 288,464 288,480 176,480 176,464 192,464 192,448 160,448 160,496 304,496 304,448         " />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <polygon
                                                    points="160,416 160,456 176,456 176,432 288,432 288,456 304,456 304,416         " />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M160,384v48h144v-48H160z M288,416H176v-16h112V416z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M160,352v48h144v-48H160z M288,384H176v-16h112V384z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M160,320v48h144v-48H160z M288,352H176v-16h112V352z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M320,448v48h144v-48H320z M448,480H336v-16h112V480z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M320,416v48h144v-48H320z M448,448H336v-16h112V448z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M320,384v48h144v-48H320z M448,416H336v-16h112V416z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M320,352v48h144v-48H320z M448,384H336v-16h112V384z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <polygon
                                                    points="432,320 432,336 448,336 448,352 336,352 336,336 416,336 416,320 320,320 320,368 464,368 464,320         " />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <polygon
                                                    points="320,288 320,328 336,328 336,304 448,304 448,328 464,328 464,288         " />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M320,256v48h144v-48H320z M448,288H336v-16h112V288z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M376,0c-13.232,0-24,10.768-24,24s10.768,24,24,24h36.688l-117.84,117.848L231.48,126.24L3.056,305.656l9.888,12.584
                                                L232.52,145.768l64.632,40.392L451.312,32H376c-4.416,0-8-3.592-8-8s3.584-8,8-8h104v104c0,4.408-3.584,8-8,8
                                                c-4.416,0-8-3.592-8-8V52.688L302.608,214.072L231.192,174.4L27,337.752l10,12.496L232.808,193.6l72.584,40.328L448,91.312V120
                                                c0,13.232,10.768,24,24,24s24-10.768,24-24V0H376z" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <rect x="32" y="104" width="16" height="16" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <rect x="160" y="104" width="16" height="16" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M104,8C46.656,8,0,54.656,0,112s46.656,104,104,104s104-46.656,104-104S161.344,8,104,8z M104,200
                                                c-48.52,0-88-39.48-88-88c0-48.52,39.48-88,88-88s88,39.48,88,88S152.52,200,104,200z" />
                                            </g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </svg>

                                    <p class="text-white pt-3">@lang('home.Turn_Over')</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-6 text-center mt-3 mb-3">

                                    <svg height="70px" viewBox="0 0 512 512" width="70px" class="bd-icons img-fluid"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="m296 368a40 40 0 1 0 -40 40 40.045 40.045 0 0 0 40-40zm-40 24a24 24 0 1 1 24-24 24.028 24.028 0 0 1 -24 24z" />
                                            <path
                                                d="m290 408h-68a38.043 38.043 0 0 0 -38 38v50a8 8 0 0 0 8 8h128a8 8 0 0 0 8-8v-50a38.043 38.043 0 0 0 -38-38zm22 80h-16v-32a8 8 0 0 0 -16 0v32h-48v-32a8 8 0 0 0 -16 0v32h-16v-42a22.025 22.025 0 0 1 22-22h68a22.025 22.025 0 0 1 22 22z" />
                                            <path
                                                d="m296 48a40 40 0 1 0 -40 40 40.045 40.045 0 0 0 40-40zm-40 24a24 24 0 1 1 24-24 24.028 24.028 0 0 1 -24 24z" />
                                            <path
                                                d="m290 88h-68a38.043 38.043 0 0 0 -38 38v50a8 8 0 0 0 8 8h128a8 8 0 0 0 8-8v-50a38.043 38.043 0 0 0 -38-38zm22 80h-16v-32a8 8 0 0 0 -16 0v32h-48v-32a8 8 0 0 0 -16 0v32h-16v-42a22.025 22.025 0 0 1 22-22h68a22.025 22.025 0 0 1 22 22z" />
                                            <path
                                                d="m120 208a40 40 0 1 0 -40 40 40.045 40.045 0 0 0 40-40zm-40 24a24 24 0 1 1 24-24 24.028 24.028 0 0 1 -24 24z" />
                                            <path
                                                d="m144 344a8 8 0 0 0 8-8v-50a38.043 38.043 0 0 0 -38-38h-68a38.043 38.043 0 0 0 -38 38v50a8 8 0 0 0 8 8zm-120-58a22.025 22.025 0 0 1 22-22h68a22.025 22.025 0 0 1 22 22v42h-16v-32a8 8 0 0 0 -16 0v32h-48v-32a8 8 0 0 0 -16 0v32h-16z" />
                                            <path
                                                d="m472 208a40 40 0 1 0 -40 40 40.045 40.045 0 0 0 40-40zm-40 24a24 24 0 1 1 24-24 24.028 24.028 0 0 1 -24 24z" />
                                            <path
                                                d="m466 248h-68a38.043 38.043 0 0 0 -38 38v50a8 8 0 0 0 8 8h128a8 8 0 0 0 8-8v-50a38.043 38.043 0 0 0 -38-38zm22 80h-16v-32a8 8 0 0 0 -16 0v32h-48v-32a8 8 0 0 0 -16 0v32h-16v-42a22.025 22.025 0 0 1 22-22h68a22.025 22.025 0 0 1 22 22z" />
                                            <path
                                                d="m156.166 420.037a192.08 192.08 0 0 1 -53.77-48.823 8 8 0 1 0 -12.796 9.611 208.016 208.016 0 0 0 58.23 52.872 8 8 0 0 0 8.332-13.66z" />
                                            <path
                                                d="m420.819 369.6a8 8 0 0 0 -11.2 1.591 192.071 192.071 0 0 1 -53.784 48.842 8 8 0 1 0 8.332 13.66 208.028 208.028 0 0 0 58.245-52.892 8 8 0 0 0 -1.593-11.201z" />
                                            <path
                                                d="m325.119 76.814a192.175 192.175 0 0 1 84.5 63.991 8 8 0 0 0 12.793-9.61 208.167 208.167 0 0 0 -91.53-69.306 8 8 0 1 0 -5.762 14.925z" />
                                            <path
                                                d="m91.181 142.4a8 8 0 0 0 11.2-1.591 192.175 192.175 0 0 1 84.5-63.991 8 8 0 1 0 -5.762-14.925 208.167 208.167 0 0 0 -91.53 69.307 8 8 0 0 0 1.592 11.2z" />
                                            <path
                                                d="m256 288a32 32 0 1 0 -32-32 32.036 32.036 0 0 0 32 32zm0-48a16 16 0 1 1 -16 16 16.019 16.019 0 0 1 16-16z" />
                                        </g>
                                    </svg>
                                    <p class="text-white pt-3">@lang('home.workforce')</p>
                                </div>
                            </div>
                            <a href="{{route('business-directory-details')}}" class="more-news text-white">@lang('home.access_business') <span class="more-news-icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="featured-container">
                            <div class="access-business-directory__right">
                          
                                <h6 class="sub-heading">@lang('home.featured_companies')</h6>
                                @foreach($companies as $companyData)
                                <div class="featured-company-box mt-3">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-2 col-sm-2  f-company-left-outer">
                                            <div class="f-company-left">
                                                <div class="ratio-1x1">
                                                    <div class="ratio-inner">
                                                        <img src="{{ asset('storage/uploads/company_logo/'.$companyData->company_logo) }}" alt="bd-brand" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-10 col-sm-10">
                                            <h6 class="sub-heading-two mb-2">
                                            {{$companyData->localeAll[0]->company_name}}</h6>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-6">
                                                    <div class="f-company-mid">
                                                        <p class="small-para">Phone: +{{$companyData->telephone}}</p>
                                                        <p class="small-para">Email:{{$companyData->email}}</p>
                                                        <p class="small-para">Website: {{$companyData->website}}</p>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-6 f-company-right-outer">
                                                    <div class="f-company-right">
                                                        <p class="small-para">@lang('home.Sectors'):
                                                            @foreach($companyData->sectors as $sector)
                                                            {{ $loop->first ? '' : ', ' }}
                                                            {{$sector->localeAll[0]->name}}
                                                            @endforeach
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="heading-with-arrow">
                                                <a href="{{route('business-directory-company-details',$companyData->page_key)}}" class="more-data">@lang('home.company_details')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                <div class="add-your-company mt-4 mb-2">
                                    <div class="d-flex justify-content-center">
                                        <div class="plus-icon">
                                            @php
                                            /*<?xml version="1.0" encoding="iso-8859-1"?>*/
                                            @endphp
                                            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                            <svg version="1.1" id="Capa_1" height="30px" width="30px"
                                                class="bd-icon-green" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M368,176c-8.832,0-16,7.168-16,16c0,88.224-71.776,160-160,160S32,280.224,32,192S103.776,32,192,32
                                                                c42.952,0,83.272,16.784,113.544,47.264c6.216,6.272,16.352,6.312,22.624,0.08c6.272-6.224,6.304-16.352,0.08-22.624
                                                                C291.928,20.144,243.536,0,192,0C86.128,0,0,86.128,0,192s86.128,192,192,192s192-86.128,192-192C384,183.168,376.832,176,368,176
                                                                z" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M256,176h-48v-48c0-8.832-7.168-16-16-16c-8.832,0-16,7.168-16,16v48h-48c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16
                                                                h48v48c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16v-48h48c8.832,0,16-7.168,16-16C272,183.168,264.832,176,256,176z" />
                                                    </g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                            </svg>

                                        </div>

                                        <div class="add-comp-button">
                                            <a href="{{route('add-company-profile')}}" class="common-button">@lang('home.company_button')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- row ends here -->

            </div>

        </section>
        <section class="contact-list mt-4 pb-4">
            <div class="container">
                <div class="contact-list-area">
                    <h4 class="main-heading mb-3">@lang('home.contact_list')</h4>
                    <p>@lang('home.contact_content')</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mt-4 contact-group">
                                <div class="contact-list-area-box">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-2">
                                            <div class="group">


                                                <svg height="70px" viewBox="0 0 512 512" width="70px"
                                                    class="bd-icon-green" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="m408.886719 103.414062c0 .003907.054687.058594.058593.058594 1.945313 1.949219 4.488282 2.917969 7.03125 2.917969 2.558594 0 5.121094-.984375 7.082032-2.9375 3.902344-3.902344 3.882812-10.257813-.019532-14.167969l-.210937-.210937c-3.933594-3.875-10.265625-3.835938-14.144531.101562-3.875 3.929688-3.832032 10.261719.101562 14.140625zm0 0" />
                                                    <path
                                                        d="m502 246h-10.226562c-1.90625-44.597656-16.382813-88.023438-41.96875-124.738281-3.15625-4.53125-9.390626-5.644531-13.921876-2.488281-4.53125 3.160156-5.648437 9.390624-2.488281 13.921874 24.007813 34.453126 36.703125 73.777344 38.511719 113.304688h-9.90625c-5.523438 0-10 4.476562-10 10s4.476562 10 10 10h9.90625c-2.445312 52.203125-23.824219 103.386719-63.171875 142.734375-38.429687 38.429687-88.792969 60.589844-142.734375 63.03125v-9.765625c0-5.523438-4.476562-10-10-10s-10 4.476562-10 10v9.765625c-53.941406-2.441406-104.304688-24.601563-142.734375-63.03125s-60.589844-88.792969-63.03125-142.734375h9.765625c5.523438 0 10-4.476562 10-10s-4.476562-10-10-10h-9.765625c2.441406-53.941406 24.601563-104.304688 63.03125-142.734375 39.347656-39.347656 90.53125-60.726563 142.734375-63.171875v9.90625c0 5.523438 4.476562 10 10 10s10-4.476562 10-10v-9.90625c39.53125 1.8125 78.855469 14.503906 113.308594 38.515625 4.53125 3.15625 10.765625 2.042969 13.921875-2.488281 3.160156-4.527344 2.046875-10.761719-2.484375-13.921875-36.71875-25.589844-80.148438-40.066407-124.746094-41.972657v-10.226562c0-5.523438-4.476562-10-10-10s-10 4.476562-10 10v10.21875c-3.261719.136719-6.527344.335938-9.792969.609375-55.445312 4.640625-107.683593 28.894531-147.085937 68.292969-42.207032 42.210937-66.445313 97.59375-68.898438 156.878906h-10.222656c-5.523438 0-10 4.476562-10 10s4.476562 10 10 10h10.222656c2.453125 59.285156 26.691406 114.667969 68.898438 156.878906 42.210937 42.207032 97.59375 66.445313 156.878906 68.898438v10.222656c0 5.523438 4.476562 10 10 10s10-4.476562 10-10v-10.222656c59.285156-2.453125 114.667969-26.691406 156.878906-68.898438 39.398438-39.402344 63.652344-91.640625 68.292969-147.085937.273437-3.265625.472656-6.53125.609375-9.792969h10.21875c5.523438 0 10-4.476562 10-10s-4.476562-10-10-10zm0 0" />
                                                    <path
                                                        d="m386.753906 214.617188v-4.300782c0-23.292968-18.949218-42.242187-42.242187-42.242187-23.296875 0-42.246094 18.949219-42.246094 42.242187v4.300782c0 11.179687 4.371094 21.351562 11.488281 28.914062-4.171875 1.894531-8.175781 4.179688-11.957031 6.828125-4.289063-2.953125-8.875-5.503906-13.703125-7.601563 8.015625-8.109374 12.972656-19.242187 12.972656-31.519531v-5.066406c0-24.742187-20.128906-44.867187-44.867187-44.867187h-.394531c-24.742188 0-44.867188 20.125-44.867188 44.867187v5.066406c0 12.277344 4.957031 23.410157 12.972656 31.519531-4.832031 2.097657-9.417968 4.648438-13.707031 7.601563-3.777344-2.648437-7.78125-4.933594-11.953125-6.828125 7.113281-7.5625 11.488281-17.734375 11.488281-28.914062v-4.300782c0-23.292968-18.953125-42.242187-42.246093-42.242187-23.292969 0-42.246094 18.949219-42.246094 42.242187v4.300782c0 11.179687 4.375 21.351562 11.492187 28.917968-25.769531 11.730469-43.738281 37.707032-43.738281 67.816406v8.597657c0 5.523437 4.476562 10 10 10h72.0625v10.746093c0 5.523438 4.476562 10 10 10h141.875c5.523438 0 10-4.476562 10-10v-10.746093h72.0625c5.523438 0 10-4.476563 10-10v-8.597657c0-30.109374-17.96875-56.085937-43.734375-67.816406 7.117187-7.566406 11.488281-17.738281 11.488281-28.917968zm-64.488281 0v-4.300782c0-12.265625 9.976563-22.242187 22.246094-22.242187 12.265625 0 22.242187 9.976562 22.242187 22.242187v4.300782c0 12.265624-9.976562 22.246093-22.242187 22.246093-12.269531 0-22.246094-9.980469-22.246094-22.246093zm-66.460937 21.492187c-13.714844 0-24.871094-11.15625-24.871094-24.867187v-5.070313c0-13.710937 11.15625-24.867187 24.871094-24.867187h.390624c13.714844 0 24.871094 11.15625 24.871094 24.867187v5.070313c0 13.710937-11.15625 24.867187-24.871094 24.867187zm-110.558594-21.492187v-4.300782c0-12.265625 9.976562-22.242187 22.242187-22.242187 12.269531 0 22.246094 9.976562 22.246094 22.242187v4.300782c0 12.265624-9.976563 22.246093-22.246094 22.246093-12.265625 0-22.242187-9.980469-22.242187-22.246093zm22.242187 42.246093c9.652344 0 19.042969 2.570313 27.28125 7.34375-10.808593 12.507813-17.859375 28.339844-19.378906 45.742188h-62.375c.746094-29.402344 24.894531-53.085938 54.472656-53.085938zm149.449219 73.832031h-121.875v-13.644531c0-33.605469 27.335938-60.941406 60.9375-60.941406s60.9375 27.335937 60.9375 60.941406zm82.042969-20.746093h-62.371094c-1.523437-17.402344-8.570313-33.234375-19.378906-45.742188 8.238281-4.773437 17.628906-7.34375 27.277343-7.34375 29.582032 0 53.730469 23.683594 54.472657 53.085938zm0 0" />
                                                    </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-10 col-sm-10">
                                            <p class="mb-2 solution-para text-truncate"><strong>@lang('home.solution_headingOne')</strong></p>
                                            <p class="text-limit" >@lang('home.solution_content')</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4 contact-group">
                                <div class="contact-list-area-box">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-2">
                                            <div class="group">


                                                <svg height="70px" viewBox="-38 0 511 511.99843" width="70px"
                                                    class="bd-icon-green" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="m364.882812 31.050781c-16.519531 0-29.960937 13.441407-29.960937 29.960938 0 16.523437 13.441406 29.960937 29.960937 29.960937 16.523438 0 29.964844-13.4375 29.964844-29.960937 0-16.519531-13.441406-29.960938-29.964844-29.960938zm0 39.925781c-5.492187 0-9.960937-4.46875-9.960937-9.964843 0-5.492188 4.46875-9.960938 9.960937-9.960938 5.492188 0 9.960938 4.472657 9.960938 9.960938 0 5.492187-4.46875 9.964843-9.960938 9.964843zm0 0" />
                                                    <path
                                                        d="m309.433594 51.011719h-145.273438c-5.523437 0-10 4.480469-10 10 0 5.523437 4.476563 10.003906 10 10.003906h145.273438c5.523437 0 10-4.480469 10-10.003906 0-5.519531-4.476563-10-10-10zm0 0" />
                                                    <path
                                                        d="m145.371094 185.273438c-12.765625-4.328126-26.492188-5.40625-39.695313-3.117188-5.441406.945312-9.089843 6.121094-8.144531 11.566406.941406 5.4375 6.117188 9.082032 11.5625 8.140625 9.921875-1.722656 20.246094-.90625 29.855469 2.351563 31.746093 10.765625 48.8125 45.355468 38.046875 77.101562-17.285156 50.96875-88.1875 55.816406-112.089844 7.375-7.1875-14.5625-8.273438-31.050781-3.058594-46.429687 1.773438-5.226563-1.027344-10.90625-6.257812-12.679688-5.226563-1.773437-10.910156 1.027344-12.683594 6.257813-6.929688 20.4375-5.488281 42.351562 4.0625 61.703125 31.863281 64.570312 125.96875 58.019531 148.96875-9.804688 14.308594-42.191406-8.375-88.15625-50.566406-102.464843zm0 0" />
                                                    <path
                                                        d="m72.609375 218.667969h.023437c5.523438 0 9.988282-4.480469 9.988282-10 0-5.523438-4.488282-10.003907-10.011719-10.003907s-10 4.480469-10 10.003907c0 5.519531 4.476563 10 10 10zm0 0" />
                                                    <path
                                                        d="m421.800781 111.785156c7.960938-7.222656 12.96875-17.648437 12.96875-29.222656v-43.101562c0-21.757813-17.703125-39.460938-39.460937-39.460938h-241.613282c-21.757812 0-39.460937 17.703125-39.460937 39.460938v43.101562c0 11.835938 5.246094 22.464844 13.523437 29.703125-7.960937 7.226563-12.96875 17.648437-12.96875 29.222656v1.414063c-16.46875.636718-32.769531 4.734375-47.992187 12.25-28.484375 14.054687-49.789063 38.363281-59.988281 68.441406-17.640625 52.019531 2.929687 107.933594 46.574218 137.089844l-8.921874 26.472656c-8.863282.804688-16.507813 6.679688-19.417969 15.257812l-17.464844 50.925782c-7.859375 23.183594 4.601563 48.441406 27.785156 56.300781.019531.007813.039063.011719.058594.019531 22.964844 7.757813 48.300781-4.367187 56.234375-27.769531l17.460938-50.925781c2.992187-8.816406.269531-18.089844-6.136719-23.976563l8.933593-26.496093c20.984376 1.363281 41.464844-2.855469 60.132813-12.066407 28.484375-14.058593 49.789063-38.367187 59.992187-68.445312 8.675782-25.582031 8.101563-52.105469.097657-75.929688h163.726562c21.757813 0 39.460938-17.703125 39.460938-39.460937v-43.101563c-.003907-11.835937-5.246094-22.464843-13.523438-29.703125zm-268.105469-9.757812c-10.730468 0-19.460937-8.730469-19.460937-19.460938v-43.105468c0-10.730469 8.730469-19.460938 19.460937-19.460938h241.613282c10.726562 0 19.460937 8.730469 19.460937 19.460938v43.101562c0 10.730469-8.730469 19.460938-19.460937 19.460938h-241.613282zm-63.503906 322.484375-17.464844 50.925781c-4.328124 12.765625-18.167968 19.59375-30.9375 15.265625-.015624-.003906-.03125-.011719-.046874-.015625-12.765626-4.355469-19.535157-18.203125-15.234376-30.890625 18.503907-52.652344 16.847657-51.496094 18.8125-52.464844 1.507813-.742187-1.636718-1.382812 43.183594 13.816407.867188.292968 1.316406.894531 1.539063 1.351562.226562.453125.429687 1.175781.148437 2.011719zm1.636719-47.050781-7.167969 21.265624-20.636718-7 7.164062-21.242187c6.378906 2.824219 13.410156 5.246094 20.640625 6.976563zm121.269531-83.902344c-15.535156 45.804687-61.546875 72.820312-107.785156 66.140625-61.648438-8.964844-99.253906-71.625-79.5625-129.679688 13.957031-41.160156 52.523438-67.152343 93.753906-67.152343 67.332032 0 115.347656 66.546874 93.59375 130.691406zm202.222656-108.96875c0 10.730468-8.726562 19.460937-19.460937 19.460937h-172.476563c-6.535156-11.800781-14.894531-22.234375-24.722656-31.011719h111.328125c5.523438 0 10-4.476562 10-10 0-5.523437-4.476562-10-10-10h-142.441406c-10.480469-4.617187-21.519531-7.71875-32.757813-9.207031v-2.34375c0-10.730469 8.730469-19.460937 19.460938-19.460937h241.613281c10.730469 0 19.460938 8.730468 19.460938 19.460937v43.101563zm0 0" />
                                                    <path
                                                        d="m365.4375 133.078125c-16.519531 0-29.960938 13.4375-29.960938 29.960937 0 16.519532 13.441407 29.960938 29.960938 29.960938s29.960938-13.441406 29.960938-29.960938c0-16.523437-13.4375-29.960937-29.960938-29.960937zm0 39.921875c-5.492188 0-9.960938-4.46875-9.960938-9.960938 0-5.492187 4.46875-9.960937 9.960938-9.960937s9.960938 4.46875 9.960938 9.960937c0 5.492188-4.46875 9.960938-9.960938 9.960938zm0 0" />
                                                    </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-10 col-sm-10">
                                            <p class="mb-2 solution-para text-truncate"><strong>@lang('home.solution_headingTwo')</strong></p>
                                            <p class="text-limit">@lang('home.solution_contentOne') </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- more-details -->
                        <div class="heading-with-arrow mt-3">
                            <a href="{{route('contact-file')}}" class="more-data">@lang('home.find_contact')</a>
                        </div>
                        <!-- more-details-ends -->
                    </div>
                </div>
            </div>
        </section>
</section>
 <!-- --online-services---- -->
<section class="online-services">
    <div class="container">
        <!-- Assistance services -->
        <div class="Assistance-services">
            <div class="title-headings">
                <div class="row align-items-center title-border">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12 p-0 title-data">
                         <h4 class="main-heading text-white">@lang('home.assistance_service')</h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 p-0 title-more-data">
                        <div class="heading-with-arrow">
                            <a href="{{route('our-services')}}" class="more-data text-white">@lang('home.business_more')</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(count($assistance_services)>0)
                    @foreach($assistance_services as $assistance_services)
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4 text-center">
                            <div class="assistance-icon">
                                <?php
                                    $services_image =$assistance_services->services_image;
                                    $service_icon =  trim($services_image, '"');
                                    echo $service_icon;
                                ?>
                                <p class="sub-heading-two text-white">{{$assistance_services->localeAll[0]->title}}</p>
                            </div>
                        </div>
                 @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
 <!-- --online-end-services---- -->
@include('frontend.partner.index')
<!-- testimonial-home -->
@php
    $setting = getTestimonialStatus(); 
@endphp
@if($setting->status == 1)
<section class="testimonial-home">
    <div class="testimonial-area">
        <div class="testimonial-area__elements">
            <div class="container">
                <div class="title-headings">
                    <div class="row align-items-center title-border">
                            <div class="col-lg-8 col-md-6 col-sm-6 p-0 title-data">
                                <h4 class="main-heading">@lang('home.testimonial')</h4>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0 title-more-data">
                                <div class="heading-with-arrow">
                                    <a href="{{route('testimonials')}}" class="more-data">@lang('home.view_more')</a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($testimonials as $testimonial)
                        @foreach($testimonial['localeAll'] as $testimonial_translate)
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="testimonial-area__elements--box mt-4">
                                  <div class="quote-font pt-3 pb-3">
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                  </div>
                                    <p class="testimonial-content">
                                            {{ html_entity_decode(strip_tags(str_limit($testimonial_translate->description, 165, '....'))) }}
                                            <a type="button" class="modal-read-more" data-toggle="modal" data-target="#myModal{{$testimonial->id}}" data-id="{{ $testimonial->id }}">
                                                @lang('home.read_more')
                                           </a>
                                            <div class="modal" id="myModal{{$testimonial->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <input type="hidden" name="id" value="{{$testimonial->id}}">
                                                        <div class="modal-header">
                                                          <h4 class="sub-heading">{{$testimonial_translate->name}}</h4><br>
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="modal-innner-text mb-2">
                                                                {{ html_entity_decode(strip_tags($testimonial_translate->description))}}
                                                            </p>
                                                            <div class="authour-detail">
                                                                <div class="authour-detail__left">
                                                                <img src="{{ isset($testimonial->image)? asset('storage/uploads/testimonial/'.$testimonial->image):  asset('storage/uploads/testimonial/default-image.png') }}" alt="authour" class="img-fluid">
                                                                 </div>
                                                                <div class="authour-detail__right">
                                                                    <strong><p class="authour-name">{{$testimonial_translate->name}}</p></strong>
                                                                    <p class="mt-1">{{$testimonial_translate->sub_title}}</p>
                                                                    <p class="mt-1">Company one</p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="common-button" data-dismiss="modal">@lang('home.close')</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </p>
                                    <div class="authour-detail">
                                        <div class="authour-detail__left">
                                            <img src="{{ asset('storage/uploads/testimonial/'.$testimonial->image) }}" alt="authour" class="img-fluid">
                                        </div>
                                        <div class="authour-detail__right">
                                            <strong><p class="authour-name">{{$testimonial_translate->name}}</p></strong>
                                            <p>{{$testimonial_translate->sub_title}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- -----testimonial end-------- -->
@endsection
@section('scripts')
	 <!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/front-end/browser-class.js') }}"></script>
    <!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
    <!-- Please keep your own scripts above main.js -->
    <script src="{{ asset('js/front-end/main.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script>
function pageRedirect(route) {
// alert(route);
    window.location.href = route;
}

$(document).ready(function(){
    // ------Submit Economic NewsLetter--------------
    $(document).on('click','.economic_submit',function(e){
                e.preventDefault();
                var type = $(".business_subscribe").val();
                var email = $(".economic_email").val();

                $.ajax({
                    url: '{{route("subscribe_newsletters")}}',
                    type : "POST",
                    data : {type:type,email:email, _token:"{{csrf_token()}}"},
                    beforeSend : function() {
                        $('#spinner').css('display','inline-block');
                        $('.economic_submit').prop('disabled', true);
                    },
                    success : function (data)
                    {
                        $('#spinner').css('display','none');
                        $('.economic_submit').prop('disabled', false);

                        if(data.errors){
                            if(data.errors.email){
                                // $(".economic_email").addClass('is-invalid');
                                $("#economic_error").css('display','block');
                                // $("#economic_error").html(data.errors.email);
                                $("#economic_error").html(`{{__('home.email_errors')}}`);
                                $("#economic_success").css('display','none');
                                $("#economic_sub_already").css('display','none');
                            }
                        }
                        if(data.success){
                            // $(".economic_email").removeClass('is-invalid');
                            $("#economic_error").html('');
                            $(".economic_email").val('');
                            $("#economic_success").css('display','block');
                            $("#economic_success").html(data.success);
                            $("#economic_sub_already").css('display','none');
                        }
                        if(data.subscribed){
                            $("#economic_success").css('display','none');
                            // $(".economic_email").removeClass('is-invalid');
                            $("#economic_error").html('');
                            $(".economic_email").val('');
                            $("#economic_sub_already").css('display','block');
                            $("#economic_sub_already").html(data.subscribed);
                        }
                    }
                });

    });
    // -------------End here---------------------
    // ------Submit Resources NewsLetter--------------
    $(document).on('click','.resources_submit',function(e){
            e.preventDefault();
            var type = $("#resource_subscribe").val();
            var email = $("#resource_email").val();
            $.ajax({
                url: '{{route("subscribe_newsletters")}}',
                type : "POST",
                data : {type:type,email:email, _token:"{{csrf_token()}}"},
                beforeSend : function() {
                        $('#spinner-economic').css('display','inline-block');
                        $('.resources_submit').prop('disabled', true);
                    },
                success : function (data)
                {
                    $('#spinner-economic').css('display','none');
                    $('.resources_submit').prop('disabled', false);
                    if(data.errors){
                        if(data.errors.email){
                            // $("#resource_email").addClass('is-invalid');
                            $("#resources_error").css('display','block');
                            // $("#economic_error").addClass('invalid-feedback');
                            // $("#resources_error").html(data.errors.email);
                            $("#resources_error").html(`{{__('home.email_errors')}}`);
                            $("#success-resources").css('display','none');
                            $("#resources_already").css('display','none');
                        }
                    }
                    if(data.success){
                        // $("#resource_email").removeClass('is-invalid');
                        $("#resources_error").html('');
                        $("#resource_email").val('');
                        $("#success-resources").css('display','block');
                        $("#success-resources").html(data.success);
                        $("#resources_already").css('display','none');
                    }
                    if(data.subscribed){
                        $("#success-resources").css('display','none');
                        // $("#resource_email").removeClass('is-invalid');
                        $("#resources_error").html('');
                        $("#resource_email").val('');
                        $("#resources_already").css('display','block');
                        $("#resources_already").html(data.subscribed);
                    }
                }
            });
    });
    // -------------End here---------------------
    // $(document).on('click','.modal-read-more',function(){
        //     var id = $(this).data('id');
        //     console.log(id);
        //     // $("#btn-more").html("Loading....");
        //     $.ajax({
        //         url : '{{route("readmoredata")}}',
        //         method : "POST",
        //         data : {id:id, _token:"{{csrf_token()}}"},
        //         dataType : "text",
        //         success : function (response)
        //         {
        //             $('#myModal'+id).modal('show');
        //             $('.modal-dialog').html(response);
        //         }
        //     });
    // });
    $(document).on('click', '.copy_link', function(){
        var text= $(this).attr('data-link');
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
            textarea.style.position = "fixed";
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand("copy");
                if(textarea.value != '' && textarea.value == text){
                    toastr.success(`{{__('discover_algeria.link_copied')}}`);
                }else {
                    toastr.error(`{{__('discover_algeria.link_copied_error')}}`);
                 }
                document.body.removeChild(textarea);
    });
});
</script>
@endsection
