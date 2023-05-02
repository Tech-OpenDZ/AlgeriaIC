@extends('frontend.layouts.master')

@section('head')
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> @lang('business_directory_main.business_directory') | @lang('news.placeName')</title>
@endsection

@section('content')
<section class="business-directory-main">
    <div class="discover-algeria">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                            <li class="breadcrumb-elements"><a href="#">@lang('business_directory_main.breadcrumb_home')</a></li>
                            <li class="active">@lang('business_directory_main.business_directory')</li>
                        </ol>

                        @include('frontend.common.top_banner')
                        @php $count_data = getCompanyDataCount(); @endphp


                        <h4 class="main-heading mt-3 mb-3">@lang('business_directory_main.business_directory')</h4>


                        <div class="business-directory-main__elements">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                    <div class="directory-box">
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 col-sm-8">
                                                <h3 class="companies-heading text-white">{{ $count_data['company_count'] }}</h3>
                                                <h6 class="sub-heading text-white">@lang('business_directory_main.companies') </h6>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4 d-flex align-item-center">
                                                <img src="{{ asset('css/images/bd-companies.svg')}}" alt="companies" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-4 col-sm-4">
                                    <div class="directory-box">
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 col-sm-8">
                                                <h3 class="companies-heading text-white">{{ $count_data['mobile_count'] }}</h3>
                                                <h6 class="sub-heading text-white">@lang('business_directory_main.Cell_Phone') </h6>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4 d-flex align-item-center">
                                                <img src="{{ asset('css/images/bd-cellphone.svg')}}" alt="cellphone" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-4 col-sm-4">
                                    <div class="directory-box">
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 col-sm-8">
                                                <h3 class="companies-heading text-white">{{ $count_data['email_count'] }}</h3>
                                                <h6 class="sub-heading text-white">@lang('business_directory_main.email') </h6>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4 d-flex align-item-center">
                                                <img src="{{ asset('css/images/bd-mail.svg')}}" alt="mail" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-3">@lang('business_directory_main.description')</p>
                        </div>


                        <section class="business-directory-search mt-4">
                            <h6 class="sub-heading mb-4">@lang('business_directory_main.business_directory')</h6>
                            <p>@lang('business_directory_main.business_directory_section_description')</p>
                            <div class="business-directory-search__elements">
                                <div class="row mb-4">
                                    <div class="col-md-4 col-sm-4 col-12 text-center">
                                        <div class="bd-search pt-4">
                                            <img src="{{ asset('css/images/bd-search.svg')}}" alt="bd-search" class="img-fluid">
                                        </div>
                                        <h6 class="sub-heading">@lang('business_directory_main.business_directory_sub_heading')</h6>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-12">
                                        <div class="bd-list">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <ul class="search-engine-home company-list">
                                                        <li class="company mb-2"><a href="#">@lang('business_directory_main.business_directory_section_company')</a></li>
                                                        <li class="company mb-2"><a href="#">@lang('business_directory_main.business_directory_section_sector_of_activity') </a></li>
                                                        <li class="company mb-2"><a href="#">@lang('business_directory_main.business_directory_section_creation_date')</a></li>
                                                        <li class="company mb-2"><a href="#">@lang('business_directory_main.business_directory_section_area')</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <ul class="search-engine-home company-list-two">
                                                        <li class="company mb-2"><a href="#">@lang('business_directory_main.business_directory_section_employees')</a></li>
                                                        <li class="company mb-2"><a href="#">@lang('business_directory_main.business_directory_section_capital')</a></li>
                                                        <li class="company mb-2"><a href="#">@lang('business_directory_main.business_directory_section_turnover')</a></li>
                                                        <li class="company mb-2"><a href="#">@lang('business_directory_main.business_directory_section_activities_code')</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- row ends here -->
                                <div class="find-contact">
                                    <a href="{{route('business-directory-details')}}" class="common-button mb-2">@lang('business_directory_main.business_directory_section_btn')</a>
                                </div>
                            </div>
                        </section>

                        <section class="bd-add-company-red mt-3 mb-2 text-center">
                            <a href="{{route('add-company-profile')}}" class="common-button">@lang('business_directory_main.btn_add_your_company')</a>
                        </section>

                        <section class="business-directory-contact mt-4">
                            <h6 class="sub-heading mb-4">@lang('business_directory_main.contactfile_section')</h6>
                            <p>@lang('business_directory_main.contactfile_section_desc')</p>
                            <div class="business-directory-contact__elements">
                                <div class="row mb-4">
                                    <div class="col-md-6 col-lg-6 col-sm-6 mt-2">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 col-sm-3 mt-2">
                                                <img src="{{ asset('css/images/contact-search.svg')}}" alt="contact-search" class="img-fluid">
                                            </div>
                                            <div class="col-md-9 col-lg-9 col-sm-9 mt-2">
                                                <h6 class="sub-heading">@lang('business_directory_main.contactfile_section_left')</h6>
                                                <h6 class="print-month mt-2">@lang('business_directory_main.contactfile_section_left_desc')</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 mt-2">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 col-sm-3 mt-2">
                                                <img src="{{ asset('css/images/contact-map.svg')}}" alt="contact-map" class="img-fluid">
                                            </div>
                                            <div class="col-md-9 col-lg-9 col-sm-9 mt-2">
                                                <h6 class="sub-heading">@lang('business_directory_main.contactfile_section_right')</h6>
                                                <h6 class="print-month mt-2">@lang('business_directory_main.contactfile_section_right_desc')</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- row ends here -->
                                <div class="find-contact">
                                    <a href="{{route('contact-file')}}" class="common-button mb-2">@lang('business_directory_main.contactfile_section_btn')</a>
                                </div>

                            </div>
                        </section>

                        <!-- sponsered link starts -->
                        <section class="business-directory-sponserdlink mt-4">
                            <h6 class="sub-heading mb-4">@lang('business_directory_main.contactfile_2_section')</h6>
                            <p>@lang('business_directory_main.contactfile_2_section_desc')</p>
                            <div class="business-directory-sponserdlink__elements">
                                <div class="row mb-4">
                                    <div class="col-md-6 col-lg-6 col-sm-6 mt-2">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 col-sm-3 mt-2">
                                                <img src="{{ asset('css/images/link.svg')}}" alt="link" class="img-fluid">
                                            </div>
                                            <div class="col-md-9 col-lg-9 col-sm-9 mt-2">
                                                <h6 class="sub-heading">@lang('business_directory_main.contactfile_2_section_left')</h6>
                                                <h6 class="print-month mt-2">@lang('business_directory_main.contactfile_2_section_left_desc')</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 mt-2">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 col-sm-3 mt-2">
                                                <img src="{{ asset('css/images/yellow-mail.svg')}}" alt="mail" class="img-fluid">
                                            </div>
                                            <div class="col-md-9 col-lg-9 col-sm-9 mt-2">
                                                <h6 class="sub-heading">@lang('business_directory_main.contactfile_2_section_right')</h6>
                                                <h6 class="print-month mt-2">@lang('business_directory_main.contactfile_2_section_right_desc')</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- row ends here -->
                                <div class="find-contact">
                                    <a href="{{route('contact-file')}}" class="common-button mb-2">@lang('business_directory_main.contactfile_2_section_btn')</a>
                                </div>

                            </div>
                        </section>


                    </div>
                </div>
                <!-- left area ends here -->

                @include('frontend.common.right_sidebar')


            </div>
            <!-- row ends here -->

            <!-- References starts here -->
            <section class="brand-carousel">


                <h4 class="sub-heading mb-3">@lang('business_directory_main.featured_companies')</h4>
                <div class="our-partners owl-carousel owl-theme brand-slider active" id="brands-demo">

                    @foreach($count_data['featured_companies'] as $companyData)
                    <div class="brand-outer-area item">
                        <img src="{{ asset('storage/uploads/company_logo/'.$companyData->company_logo) }}" alt="logo1" class="img-fluid">
                    </div>
                    @endforeach
                </div>


            </section>
            <!-- References ends here -->
        </div>
    </div>
</section>

@endsection

@section('scripts')
<!-- Normal JS -->
<!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/front-end/browser-class.js') }}"></script>
<!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
<script src="{{ asset('js/front-end/main.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> -->
@endsection
