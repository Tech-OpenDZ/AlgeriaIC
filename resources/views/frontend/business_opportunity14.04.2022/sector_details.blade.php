@extends('frontend.layouts.master')
@section('head')
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@lang('business_opportunity_sector_details.breadcrumb_business_opportunities') | @lang('news.placeName')</title>
@endsection

@section('content')



<section class="business-opportunities">
    <div class="discover-algeria">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                            <li class="breadcrumb-elements"><a href="#">@lang('business_opportunity_sector_details.breadcrumb_home')</a></li>
                            <li class="active">@lang('business_opportunity_sector_details.breadcrumb_business_opportunities')</li>
                        </ol>
                        <div class="business-banner">
                            <a href="#"><img src="{{ asset('images/business-banner.png') }}" alt="business-banner" class="img-fluid"></a>
                        </div>


                        <div class="slider-area table-carousel">

                            <div class="business-titles mt-3 mb-3">
                                <h1 class="main-heading mb-3">{{ $sector->localeAll[0]->name }}</h1>
                                <p class="business-content">@lang('business_opportunity_sector_details.business_content') </p>
                            </div>
                            @if(count($business_opportunities) > 0)
                            <div class="business-table">
                                <table class="table">
                                    <thead>
                                        <tr class="table-headings">
                                            <th scope="col" class="date-heading">@lang('business_opportunity_sector_details.date')</th>
                                            <th scope="col" class="reference-heading">@lang('business_opportunity_sector_details.reference')</th>
                                            <th scope="col" class="details-heading">@lang('business_opportunity_sector_details.details')</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="table-elements">
                                        @foreach($business_opportunities as $business_opportunity)
                                        @foreach($business_opportunity->localeAll as $value)
                                        <tr>
                                            <td scope="row" class="dates">{{date('d-m-Y', strtotime($business_opportunity->created_at))}} </td>
                                            <td>{{ $business_opportunity->reference_no_of_opportunity}}</td>
                                            <td><a href="{{route('business-opportunity-details', ['sector_id' => $sector->page_key,'id' => $business_opportunity->page_key ])}}">{{ $value->project_title}}</a></td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Left and right controls -->
                            {{$pagination}}
                            @else
                            <br />
                            <div class="alert-text">@lang('business_opportunity_sector_details.no_found_error')</div>
                            @endif


                        </div>
                        <!-- slider ends here -->

                    </div>
                </div>
                <!-- left area ends here -->
                {{-- @include('frontend.common.right_sidebar') --}}
            </div>
            <!-- row ends here -->
        </div>
    </div>
    
               <style>
                             .header-bottom .main-menu ul li:hover > a {
                                 color: #f9b634;
                                 text-decoration: underline;
                              }


                          </style>
    
</section>
<!-- top left and right area ends here -->
@endsection
@section('scripts')
<!-- Normal JS -->
<!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->

<script src="{{ asset('js/front-end/browser-class.js') }}"></script>
<!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
<!-- Please keep your own scripts above main.js -->
<script src="{{ asset('js/front-end/main.js') }}"></script>
<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> -->
@endsection