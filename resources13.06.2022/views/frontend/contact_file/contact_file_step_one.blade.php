@extends('frontend.layouts.master')

@section('head')
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> @lang('contactfile_step_one.business_directory') | @lang('news.placeName')</title>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
<section class="business-directory-main">
    <div class="news-main-area">
        <div class="discover-algeria">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-9 col-sm-12">
                        <div class="discover-algeria__left">
                            <ol class="breadcrumb-area">
                                <li class="breadcrumb-elements"><a href="#">@lang('contactfile_step_one.breadcrumb_home')</a></li>
                                <li class="active">@lang('contactfile_step_one.business_directory')</li>
                            </ol>
                            <div class="business-banner">
                                @php $adv = getAdvertisement('top-header','contact_list'); @endphp
                                @php $count_data = getCompanyDataCount(); @endphp
                                <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
                            </div>
                            <h1 class="main-heading mt-3 mb-3">@lang('contactfile_step_one.contact_file_detail')</h1>

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
                                <p class="mt-3 mb-3">@lang('contactfile_step_one.description')</p>
                            </div>
                            <!-- search engine starts -->


                            <!-- wizard part -->
                            <div class="bd-wizard">

                                @if( Session::has( 'error' ))
                                <div class="danger-alert-msg text-center" style="left:15px; color: red; font-size: 0.75rem; font-weight: 700; padding-top: 5px; text-align: center; ">
                                    @lang('contactfile_step_one.records_not_found')
                                </div><br>
                                @endif
                                <!-- <form action="{{ route('contact-file-estimation')}}" method="POST" data-parsley-validate> -->
                                <form id="contact-file-estimation" data-parsley-validate>
                                    @csrf
                                    <div class="row" id="">
                                        <div class="col-lg-12">
                                            <section class="bd-search-outer">

                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-2 mb-3">
                                                        <img src="{{ asset('css/images/target-criteria.svg')}}" alt="target-criteria" class="img-fluid">
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-10 mb-3">
                                                        <div class="target-right">
                                                            <p>@lang('contactfile_step_one.description2')</p>
                                                            <p class="target-capt mt-1">@lang('contactfile_step_one.description3')</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- search engine ends -->

                                                <section class="news-select-area">
                                                    <section class="search-engine">

                                                        <!-- <p class="select-title pb-2">@lang('contactfile_step_one.keyword')</p> -->
                                                        <div class="search-engine__elements">
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" placeholder="@lang('contactfile_step_one.Search')" id="keyword" name="keyword">
                                                                <div class="advance-search">
                                                                    <a href="javascript:void(0);" class="ad-search-button" id="advanced_search_btn">@lang('news.advancedSearch')</a>
                                                                </div>
                                                            </div>
                                                          
                                                        </div>
                                                    </section>
                                                    <div id="advanced_search_area"> 
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-6">
                                                                <p class="select-title pb-3">@lang('contactfile_step_one.Turn_over')</p>
                                                                <div class="row">

                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-left">
                                                                        <input type="text" class="form-control" placeholder="" id="turnover_from" name="turnover_from" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-right">

                                                                        <input type="text" class="form-control mb-4" placeholder="" id="turnover_to" name="turnover_to" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-lg-6">
                                                                <p class="select-title pb-3">@lang('contactfile_step_one.Capital')</p>
                                                                <div class="row">

                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-left">

                                                                        <input type="text" name="capital_from" class="form-control" placeholder="" id="capital_from" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-right">

                                                                        <input type="text" name="capital_to" class="form-control mb-4" placeholder="" id="capital_to" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="row bd-source">
                                                            <div class="col-md-6 col-lg-6 col-sm-6 mb-4 ">
                                                                <p class="select-title">@lang('contactfile_step_one.Sector')</p>
                                                                <select name="sector[]" id="sector" multiple id="" class="multi-choice select-button mb-4 select-alert" style="width: 100%;">
                                                                    @foreach($sectors as $sector)
                                                                    <option value="{{$sector->id}}">{{$sector->localeAll[0]->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 col-sm-6 mb-4">
                                                                <p class="select-title">@lang('contactfile_step_one.Area')</p>
                                                                <select name="zone[]" id="zone" multiple id="" class="multi-choice select-button mb-4" style="width: 100%;">
                                                                    @foreach($zones as $zone)
                                                                    <option value="{{$zone->id}}">{{$zone->localeAll[0]->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-6">
                                                                <p class="select-title pb-3">@lang('contactfile_step_one.Creation_Date')</p>
                                                                <div class="row">

                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-left">

                                                                        <div class="date-pik">
                                                                            <input type="date" id="creation_date_from" name="creation_date_from" min="2019-01" value="2020-08" class="select-button mb-4">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-right">

                                                                        <div class="date-pik">
                                                                            <input type="date" id="creation_date_to" name="creation_date_to" min="2019-01" value="2020-08" class="select-button mb-4">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-lg-6">
                                                                <p class="select-title pb-3">@lang('contactfile_step_one.Number_of_employees')</p>
                                                                <div class="row">

                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-left">

                                                                        <input type="text" name="number_of_employees_from" class="form-control mb-4" placeholder="" id="number_of_employees_from" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 bd-select-right">

                                                                        <input type="text" name="number_of_employees_to" class="form-control mb-4" placeholder="" id="number_of_employees_to" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row search-target-button mb-3">
                                                        <div class="col-md-12 col-sm-12">
                                                            <button class="common-button" type="submit">@lang('contactfile_step_one.Search') </button>
                                                        </div>

                                                    </div>
                                                    

                                                </section>

                                            </section>


                                        </div>
                                    </div>


                                </form>
                                <div class="stepwizard">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step">
                                            <a href="business-directory-step-one.html" type="button" class="btn btn-default btn-primary btn-circle">1</a>
                                            <p>@lang('contactfile_step_one.Step1')</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="business-directory-step-two.html" type="button" class="btn btn-default btn-circle disabled">2</a>
                                            <p>@lang('contactfile_step_one.Step2')</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="business-directory-step-three.html" type="button" class="btn btn-default btn-circle disabled">3</a>
                                            <p>@lang('contactfile_step_one.Step3')</p>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>

                    </div>

                    <!-- left area ends here -->

                    @include('frontend.common.right_sidebar')


                </div>
                <!-- row ends here -->
                <!-- featured events starts here -->
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
                <!-- featured events ends here -->
            </div>
        </div>
    </div>
    <!-- top left and right area ends here -->
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

@if(Session::has('openLogin'))
<script>
    $(function() {
        $("#loign_formshow").trigger('click');
    });
</script>
@endif

<script>
    $(document).ready(function() {
        $('#advanced_search_area').toggle();
        $('#advanced_search_btn').click(function(){
            $('#advanced_search_area').toggle();
        }); 


        $('form').on('submit', function(e) {
            e.preventDefault();
            var keyword = $('#keyword').val();
            var turnover_from = $('#turnover_from').val();
            var turnover_to = $('#turnover_to').val();
            var capital_from = $('#capital_from').val();
            var capital_to = $('#capital_to').val();
            var creation_date_from = $('#creation_date_from').val();
            var creation_date_to = $('#creation_date_to').val();
            var number_of_employees_from = $('#number_of_employees_from').val();
            var number_of_employees_to = $('#number_of_employees_to').val();
            var sector = $('#sector').val();
            var zone = $('#zone').val();

            //if ((keyword != "" || turnover_from != [] || turnover_to != [] || capital_from != [] || capital_to != [] || creation_date_from != [] || creation_date_to != [] || number_of_employees_from != [] || number_of_employees_to != [])) {
            window.location.href = "{{route('contact-file-estimation')}}" + "?" + $('#contact-file-estimation').serialize();

            // }

        });
        $(document).on('change', '#start_date', function(e) {
            console.log($('#start_date').val());
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            if (end_date < start_date) {
                $('#end_date').val($('#start_date').val());
                $('#end_date').attr('min', $('#start_date').val() + "");
            }
        })
    });
</script>

<script>
    window.ParsleyConfig = {
        errorsWrapper: '<div class="request-form"></div>',
        errorTemplate: '<div class="alert parsley gg" role="alert"></div>',
        errorClass: 'has-error',
        successClass: 'has-success'
    };
</script>
<script src="http://parsleyjs.org/dist/parsley.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection