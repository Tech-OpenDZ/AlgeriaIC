@php
    $is_sponsored = [];
    $companydata = [];
    foreach($company as $companyData){
        if($companyData->is_sponsored == 1){
            $is_sponsored[]= $companyData;
        } else {
            $companydata[] = $companyData;
        }
    }
@endphp
<div class="carousel-item active" id="carousel-item{{$page}}">
    <section class="events-main-area">
        <div class="events-home">
            <div class="events-home__elements">
                <div class="row">
                    @if($company->isEmpty())
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12 mt-4">
                        <div class="no-post-found">
                            <p class="news-post-caption">@lang('business_directory_main.no_company_found')</p>
                        </div>
                    </div>
                    @else

                    @foreach($is_sponsored as $companyData)
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12 mt-4">
                        <div class="events-home__elements-box green-border-bottom {{($companyData->is_sponsored == 1)? 'star-border-bottom': ''}}">
                            <div class="row">
                                <div class="col-md-2 col-lg-2 col-sm-2">
                                    <div class="event-box-left">
                                        <div class="ratio-1x1">
                                            <div class="ratio-inner">
                                                <img src="{{asset('storage/uploads/company_logo/'.$companyData->company_logo)}}" alt="events-company" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 col-lg-10 col-sm-10">
                                    <div class="event-box-right">
                                        <h6 class="sub-heading sponsered-heading">
                                            <a class="sub-heading" style="color:black" href="{{route('business-directory-company-details',$companyData->page_key)}}">
                                            {{$companyData->localeAll[0]->company_name}}
                                            </a>
                                            <span class="sponsored-outer">
                                                <a href="#" class="sponsered-btn">@lang('business_directory_main.sponsored')</a>
                                                <span class="star-outer">
                                                    @for($i=1; $i <= $companyData->sponsored_rating; $i++)
                                                    <span class="fa fa-star star-ic checked"></span>
                                                    @endfor
                                                </span>
                                            </span>
                                        </h6>
                                        <div class="row mt-2">

                                            <div class="col-md-6 col-lg-5 col-sm-6">
                                                <p class="phone-text text-truncate"><span class="para-bold">@lang('business_directory_main.phone'):</span> {{$companyData->telephone}}</p>
                                                <p class="phone-text text-truncate"><span class="para-bold">@lang('business_directory_main.email'):</span> {{$companyData->email}} </p>
                                                <p class="phone-text text-truncate"><span class="para-bold">@lang('business_directory_main.website'):</span> {{$companyData->website}} </p>
                                            </div>
                                            <div class="col-md-6 col-lg-7 col-sm-6">
                                                <p class="phone-text text-truncate"><span class="para-bold">@lang('business_directory_main.sector'):</span>
                                                    @php
                                                        $coma="";
                                                    @endphp
                                                    @foreach($companyData->sectors as $sector)
                                                    {{$coma.$sector->localeAll[0]->name}}
                                                    @php
                                                        $coma=", ";
                                                    @endphp
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach($companydata as $companyData)
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12 mt-4">
                        <div class="events-home__elements-box green-border-bottom {{($companyData->is_sponsored == 1)? 'star-border-bottom': ''}}">
                            <div class="row">
                                <div class="col-md-2 col-lg-2 col-sm-2">
                                    <div class="event-box-left">
                                        <div class="ratio-1x1">
                                            <div class="ratio-inner">
                                                <img src="{{asset('storage/uploads/company_logo/'.$companyData->company_logo)}}" alt="events-company" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 col-lg-10 col-sm-10">
                                    <div class="event-box-right">
                                        <h6 class="sub-heading sponsered-heading">
                                        <a class="sub-heading" style="color:black" href="{{route('business-directory-company-details',$companyData->page_key)}}">
                                                {{$companyData->localeAll[0]->company_name}}
                                        </a>
                                        </h6>
                                        <div class="row ">

                                            <div class="col-md-6 col-lg-5 col-sm-6">
                                                <p class="phone-text text-truncate"><span class="para-bold">@lang('business_directory_main.phone'):</span> {{$companyData->telephone}}</p>
                                                <p class="phone-text text-truncate"><span class="para-bold">@lang('business_directory_main.email'):</span> {{$companyData->email}} </p>
                                                <p class="phone-text text-truncate"><span class="para-bold">@lang('business_directory_main.website'):</span> {{$companyData->website}} </p>
                                            </div>
                                            <div class="col-md-6 col-lg-7 col-sm-6">
                                                <p class="phone-text text-truncate"><span class="para-bold">@lang('business_directory_main.sector'):</span>
                                                    @php
                                                        $coma="";
                                                    @endphp
                                                    @foreach($companyData->sectors as $sector)
                                                    {{$coma.$sector->localeAll[0]->name}}
                                                    @php
                                                        $coma=", ";
                                                    @endphp
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
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
    </section>
</div>
