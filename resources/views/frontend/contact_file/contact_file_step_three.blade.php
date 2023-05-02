@extends('frontend.layouts.master')

@section('head')
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@lang('contactfile_step_three.business_directory') | @lang('news.placeName')</title>
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
                                <li class="breadcrumb-elements"><a href="#">@lang('contactfile_step_three.breadcrumb_home')</a></li>
                                <li class="active">@lang('contactfile_step_three.business_directory')</li>
                            </ol>
                            <div class="business-banner">
                                @php
                                $adv = getAdvertisement('top-header','business_directory');
                                @endphp
                                @php $count_data = getCompanyDataCount(); @endphp

                                <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>
                            </div>
                            <h1 class="main-heading mt-3 mb-3">@lang('contactfile_step_three.contact_file_detail')</h1>

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
                                <p class="mt-3 mb-3">@lang('contactfile_step_three.description')</p>
                            </div>
                            <!-- search engine starts -->


                            <!-- wizard part -->
                            <div class="bd-wizard">

                                @if($payment_status == "completed")
                                {{Form::open(array('route' => 'contact-file-excel-export','method'=>'GET'))}}


                                <div class="row" id="">
                                    <div class="col-lg-12">
                                        <section class="bd-search-outer">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 mb-3">
                                                    <img src="{{ asset('css/images/bd-search.svg')}}" alt="target-criteria" class="img-fluid">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 mb-3">
                                                    <div class="target-right">
                                                        <p>@lang('contactfile_step_three.description2') </p>
                                                        <p class="target-capt mt-1">@lang('contactfile_step_three.description3')</p>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="download-file-format mt-4 mb-4">
                                                <h6 class="sub-heading mb-4 mt-4">@lang('contactfile_step_three.description4')</h6>
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3 col-sm-3 col-6 mt-3 mb-3">
                                                        <div class="file-format-icons d-flex flex-column">
                                                            <label for="male">
                                                                @php
                                                                /*<?xml version="1.0" encoding="iso-8859-1"?>*/
                                                                @endphp
                                                                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                                <svg version="1.1" id="Capa_1" height="40" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                                    <g>
                                                                        <g>
                                                                            <path d="M282.208,19.67c-3.648-3.008-8.48-4.256-13.152-3.392l-256,48C5.472,65.686,0,72.278,0,79.99v352
                                                                    c0,7.68,5.472,14.304,13.056,15.712l256,48c0.96,0.192,1.984,0.288,2.944,0.288c3.68,0,7.328-1.28,10.208-3.68
                                                                    c3.68-3.04,5.792-7.584,5.792-12.32v-448C288,27.222,285.888,22.71,282.208,19.67z M256,460.694L32,418.71V93.27l224-41.984
                                                                    V460.694z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M496,79.99H272c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h208v288H272c-8.832,0-16,7.168-16,16
                                                                    c0,8.832,7.168,16,16,16h224c8.832,0,16-7.168,16-16v-320C512,87.158,504.832,79.99,496,79.99z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M336,143.99h-64c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h64c8.832,0,16-7.168,16-16
                                                                    C352,151.158,344.832,143.99,336,143.99z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M336,207.99h-64c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h64c8.832,0,16-7.168,16-16
                                                                    C352,215.158,344.832,207.99,336,207.99z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M336,271.99h-64c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h64c8.832,0,16-7.168,16-16
                                                                    C352,279.158,344.832,271.99,336,271.99z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M336,335.99h-64c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h64c8.832,0,16-7.168,16-16
                                                                    C352,343.158,344.832,335.99,336,335.99z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M432,143.99h-32c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h32c8.832,0,16-7.168,16-16
                                                                    C448,151.158,440.832,143.99,432,143.99z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M432,207.99h-32c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h32c8.832,0,16-7.168,16-16
                                                                    C448,215.158,440.832,207.99,432,207.99z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M432,271.99h-32c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h32c8.832,0,16-7.168,16-16
                                                                    C448,279.158,440.832,271.99,432,271.99z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M432,335.99h-32c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h32c8.832,0,16-7.168,16-16
                                                                    C448,343.158,440.832,335.99,432,335.99z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M220.064,309.462l-112-128c-5.888-6.688-15.968-7.328-22.592-1.504c-6.656,5.824-7.328,15.936-1.504,22.56l112,128
                                                                    c3.168,3.616,7.584,5.472,12.032,5.472c3.744,0,7.488-1.312,10.56-3.968C225.216,326.198,225.888,316.118,220.064,309.462z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M217.824,163.382c-6.976-5.472-17.024-4.16-22.464,2.784l-112,144c-5.408,6.976-4.16,17.056,2.816,22.464
                                                                    c2.944,2.272,6.4,3.36,9.824,3.36c4.736,0,9.472-2.112,12.608-6.144l112-144C226.048,178.838,224.8,168.79,217.824,163.382z" />
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
                                                            </label>
                                                            <input type="radio" id="excel" name="format" value="xlsx">

                                                        </div>

                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-sm-3 col-6 mt-3 mb-3">
                                                        <div class="file-format-icons d-flex flex-column ">
                                                            <label for="male">
                                                                @php
                                                                /*
                                                                <?xml version="1.0" encoding="iso-8859-1"?>*/
                                                                @endphp
                                                                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                                <svg version="1.1" id="Capa_1" height="40" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">
                                                                    <g>
                                                                        <g>
                                                                            <path d="M64,0v80H0v144h64v160h224l96-96V0H64z M16,208V96h240v112H16z M288,361.376V288h73.376L288,361.376z M368,272h-96v96H80
                                                                    V224h192V80H80V16h288V272z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M78.672,160.224c0,3.712-0.224,6.704-0.672,8.976c-0.432,2.272-1.04,4.032-1.824,5.28c-0.768,1.248-1.68,2.08-2.736,2.496
                                                                    c-1.056,0.416-2.192,0.624-3.408,0.624c-1.472,0-2.768-0.32-3.888-0.928c-1.12-0.592-2.048-1.776-2.784-3.552
                                                                    c-0.736-1.776-1.296-4.24-1.632-7.44c-0.352-3.2-0.528-7.392-0.528-12.576c0-4.864,0.112-8.976,0.384-12.336
                                                                    c0.256-3.376,0.704-6.096,1.344-8.176c0.64-2.08,1.52-3.568,2.64-4.496c1.12-0.944,2.544-1.408,4.272-1.408
                                                                    c3.136,0,5.296,1.136,6.48,3.424c1.168,2.256,1.76,5.888,1.76,10.928h13.808c0-2.496-0.176-5.168-0.528-8.016
                                                                    c-0.336-2.848-1.248-5.504-2.64-7.968c-1.392-2.464-3.52-4.496-6.368-6.096c-2.848-1.6-6.72-2.4-11.664-2.4
                                                                    c-5.168,0-9.312,0.896-12.368,2.64c-3.072,1.76-5.408,4.224-7.056,7.344c-1.616,3.136-2.688,6.912-3.168,11.28
                                                                    c-0.464,4.384-0.72,9.168-0.72,14.352c0,5.232,0.256,10.048,0.72,14.384c0.48,4.352,1.536,8.096,3.168,11.232
                                                                    c1.632,3.136,3.984,5.536,7.056,7.2c3.056,1.648,7.2,2.496,12.368,2.496c4.544,0,8.24-0.72,11.088-2.128
                                                                    c2.848-1.408,5.04-3.36,6.624-5.84c1.552-2.496,2.64-5.408,3.216-8.736c0.576-3.328,0.864-6.864,0.864-10.56H78.672z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M152.272,160.976c-0.384-1.744-1.072-3.312-2.064-4.752c-0.976-1.44-2.32-2.784-3.984-4.032
                                                                    c-1.648-1.264-3.792-2.464-6.416-3.616l-10.656-4.608c-2.944-1.2-4.864-2.528-5.76-3.984c-0.896-1.44-1.344-3.2-1.344-5.328
                                                                    c0-1.024,0.096-2.016,0.336-2.976c0.224-0.96,0.64-1.84,1.248-2.576c0.608-0.736,1.44-1.328,2.448-1.776
                                                                    c1.024-0.432,2.304-0.672,3.84-0.672c2.688,0,4.608,0.896,5.76,2.64c1.136,1.776,1.712,4.288,1.712,7.552h13.248v-1.92
                                                                    c0-3.264-0.544-6.064-1.584-8.4c-1.056-2.32-2.528-4.24-4.416-5.744c-1.888-1.52-4.128-2.592-6.72-3.264s-5.424-1.008-8.496-1.008
                                                                    c-6.592,0-11.792,1.664-15.552,4.992c-3.776,3.328-5.664,8.368-5.664,15.152c0,2.832,0.352,5.296,1.056,7.456
                                                                    c0.704,2.144,1.808,4.032,3.312,5.664c1.504,1.648,3.376,3.072,5.616,4.272c2.256,1.216,4.912,2.352,7.968,3.376
                                                                    c2.304,0.768,4.256,1.52,5.808,2.256c1.552,0.736,2.816,1.536,3.792,2.448c0.96,0.88,1.648,1.888,2.064,3.008
                                                                    c0.4,1.12,0.624,2.448,0.624,3.984c0,2.864-0.864,5.008-2.544,6.384c-1.696,1.376-3.584,2.064-5.712,2.064
                                                                    c-1.776,0-3.28-0.272-4.448-0.768c-1.184-0.512-2.144-1.216-2.848-2.128c-0.704-0.896-1.168-2-1.44-3.312
                                                                    c-0.24-1.296-0.384-2.752-0.384-4.352v-2h-13.824v2.784c0,6.336,1.664,11.2,5.024,14.592c3.376,3.392,8.96,5.088,16.768,5.088
                                                                    c7.488,0,13.328-1.664,17.52-4.96s6.288-8.56,6.288-15.792C152.848,164.624,152.656,162.688,152.272,160.976z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <polygon points="199.824,117.856 189.648,168.544 189.344,168.544 179.696,117.856 164.912,117.856 180.64,186.4 198.4,186.4 
                                                                    214.144,117.856 		" />
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
                                                            </label>
                                                            <input type="radio" id="excel" name="format" value="csv">

                                                        </div>

                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-6 mt-3 mb-3">
                                                        <div class="file-format-icons d-flex flex-column justify-content-center">
                                                            <label for="male">
                                                                @php
                                                                /*
                                                                <?xml version="1.0" encoding="iso-8859-1"?>*/
                                                                @endphp
                                                                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                                <svg version="1.1" id="Capa_1" height="40" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">
                                                                    <g>
                                                                        <g>
                                                                            <path d="M64,0v80H0v144h64v160h224l96-96V0H64z M16,208V96h240v112H16z M288,361.376V288h73.376L288,361.376z M368,272h-96v96H80
                                                                    V224h192V80H80V16h288V272z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <polygon points="45.152,117.856 45.152,129.184 60.128,129.184 60.128,186.4 73.952,186.4 73.952,129.184 88.928,129.184 
                                                                    88.928,129.184 88.928,117.856 		" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <polygon points="133.584,151.744 149.504,117.856 134.448,117.856 125.712,140.032 116.88,117.856 101.616,117.856 
                                                                    117.344,151.744 100.272,186.4 115.424,186.4 125.216,163.168 135.104,186.4 150.656,186.4 		" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <polygon points="161.984,117.856 161.984,129.184 176.96,129.184 176.96,186.4 190.768,186.4 190.768,129.184 205.76,129.184 
                                                                    205.76,117.856 		" />
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
                                                            </label>
                                                            <input type="radio" id="excel" name="format" value="txt">

                                                        </div>

                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-sm-3 col-6 mt-3 mb-3">
                                                        <div class="file-format-icons d-flex flex-column justify-content-center">
                                                            <label for="male">
                                                                @php
                                                                /*
                                                                <?xml version="1.0" encoding="iso-8859-1"?>*/
                                                                @endphp
                                                                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                                <svg version="1.1" id="Capa_1" height="40" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">
                                                                    <g>
                                                                        <g>
                                                                            <path d="M64,0v80H0v144h64v160h224l96-96V0H64z M16,208V96h240v112H16z M288,361.376V288h73.376L288,361.376z M368,272h-96v96H80
                                                                    V224h192V80H80V16h288V272z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M90.848,130.864c-0.64-2.464-1.696-4.656-3.168-6.576c-1.472-1.92-3.392-3.472-5.808-4.656
                                                                    c-2.416-1.184-5.36-1.776-8.88-1.776H48.8V186.4h13.824v-27.36h7.392c3.264,0,6.24-0.448,8.928-1.264s4.976-2.08,6.864-3.744
                                                                    c1.888-1.648,3.36-3.792,4.416-6.416c1.056-2.624,1.584-5.696,1.584-9.216C91.808,135.84,91.472,133.312,90.848,130.864z
                                                                     M75.44,146.384c-1.68,1.664-3.92,2.512-6.672,2.512h-6.144v-20.848h5.76c3.456,0,5.92,0.912,7.392,2.688
                                                                    c1.472,1.792,2.208,4.416,2.208,7.872C77.984,142.128,77.136,144.72,75.44,146.384z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path d="M153.36,137.44c-0.576-4.112-1.664-7.6-3.312-10.512c-1.632-2.928-3.92-5.152-6.864-6.72
                                                                    c-2.96-1.568-6.816-2.368-11.632-2.368h-22.656v68.544h21.824c4.608,0,8.416-0.704,11.424-2.112
                                                                    c3.008-1.408,5.408-3.536,7.2-6.432c1.792-2.88,3.056-6.56,3.792-10.992c0.736-4.448,1.088-9.68,1.088-15.696
                                                                    C154.224,146.112,153.936,141.536,153.36,137.44z M139.952,163.264c-0.272,3.152-0.848,5.68-1.728,7.6
                                                                    c-0.864,1.92-2.032,3.296-3.504,4.128c-1.472,0.832-3.424,1.248-5.856,1.248h-6.144v-48.208h5.84c2.624,0,4.72,0.512,6.288,1.504
                                                                    c1.584,0.976,2.752,2.448,3.568,4.4c0.8,1.952,1.328,4.4,1.584,7.344c0.24,2.96,0.384,6.384,0.384,10.288
                                                                    C140.384,156.24,140.24,160.144,139.952,163.264z" />
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <polygon points="211.232,129.184 211.232,117.856 172.928,117.856 172.928,186.4 186.752,186.4 186.752,156.64 209.792,156.64 
                                                                    209.792,145.312 186.752,145.312 186.752,129.184 		" />
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
                                                            </label>
                                                            <input type="radio" id="excel" name="format" value="pdf">

                                                        </div>

                                                    </div>
                                                </div>


                                            </div>

                                            <div class="download-list mt-4 mb-4 text-center">
                                                <input type="hidden" value="{{$token}}" name="token"></input>
                                                <button class="common-button  btn-lg" type="submit">@lang('contactfile_step_three.download_list')</button>

                                            </div>

                                            <h6 class="sub-heading text-center mb-4">@lang('contactfile_step_three.thankyou')</h6>


                                        </section>
                                    </div>
                                </div>
                                <!-- step three ends here -->
                                {{ Form::close() }}

                                @else

                                <div class="row" id="">
                                    <div class="col-lg-12">
                                        <section class="bd-search-outer">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 mb-3">
                                                    <img src="{{ asset('css/images/bd-search.svg')}}" alt="target-criteria" class="img-fluid">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 mb-3">
                                                    <div class="target-right">
                                                        <p>@lang('contactfile_step_three.payment_under_process')</p>

                                                    </div>

                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>

                                @endif

                            </div>

                        </div>

                    </div>

                    <!-- left area ends here -->

                    <div class="col-lg-3 col-md-3">


                        <div class="discover-algeria__right">
                            @php
                            $adv = getAdvertisement('sidebar-top','contact_list');
                            @endphp
                            @if($adv != null) 
                                @php
                                if (!preg_match("~^(?:f|ht)tps?://~i", $adv['url'])) {
                                        $adv['url'] = "http://" . $adv['url'];
                                }
                                @endphp
                        
                            <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="w-100 success"></a>
                            @endif

                            <div class="join-algeria">
                                <h6 class="mb-3 sub-heading"> @lang('news_detail.joinAlgeriaNetwork')</h6>
                                <a href="#" class="register"> @lang('news_detail.join')</a>
                            </div>
                        </div>
                        <div class="discover-algeria__right mt-4">
                            @php
                            $adv = getAdvertisement('sidebar-bottom','contact_list');
                            @endphp
                            <a href="{{$adv['url']}}" target="_blank" onclick="adClick('{{$adv['ad_id']}}')"><img src="{{ $adv['image'] }}" alt="business-banner" class="img-fluid"></a>

                            <div class="join-algeria">
                                <h6 class="mb-3 sub-heading">@lang('news_detail.downloadResources'):<br> XXXXXXXX</h6>
                                <a href="#" class="register">@lang('news_detail.join')</a>
                            </div>
                        </div>
                        <div class="discover-algeria__right mt-4">

                            <div class="join-algeria">
                                <h6 class="sub-heading mb-4"> @lang('news_detail.businessServices')</h6>
                                <a href="#" class="register view-services"> @lang('news_detail.viewServices')</a>
                            </div>
                        </div>

                    </div>


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
<script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/front-end/main.js') }}"></script>
<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> -->
@if(Session::has('openLogin'))
<script>
    $(function() {
        $("#loign_formshow").trigger('click');
    });
</script>
@endif
@endsection