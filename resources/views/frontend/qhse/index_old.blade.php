@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Qhse </title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />




@endsection

@section('content')

    <div class="business-directory-main">
        <div class="discover-algeria">



            <div class="container">
                <div class="row"  style=" left:0;right:0 ;max-width: 100%;margin-left: 0px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
                    <div class="qhse_heading col-md-12" style="height:180px; width:100%;padding-top:70px">
                        <div class="section_title text-center" style="padding-top:7px">
                            <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:35px"> @lang('qhse.qhse_title')</h4>
                            <br>

                        </div>


                    </div>
                </div>

                <div class="row" style=" margin-right:0px;margin-left:0px; background-color:#ffffff;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black">


                    <div class="page-content">
                        <div class="container" style="background-color:#FFFFFF">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="custom-heading">
                                        <br>
                                        <h2>@lang('qhse.introduction')</h2>
                                    </div><!-- .custom-heading end -->

                                    <p>
                                        @lang('qhse.introduction_part1')
                                    </p>

                                    <p>
                                        @lang('qhse.introduction_part2')
                                    </p>
                                    <br>
                                    <br>
                                </div><!-- .col-md-6 end -->

                                <div class=" col-md-6 animated triggerAnimation zoomIn" data-animate="zoomIn" style="opacity: 1;">
                                    <br>
                                    <br>
                                    <img src="{{asset('storage/uploads/qhse/img25.jpg')}}" alt="">
                                    <br>
                                    <br>
                                </div><!-- .col-md-6 end -->
                            </div><!-- .row end -->
                        </div><!-- .container end -->
                    </div>




                    <div class="page-content custom-bkg bkg-light-blue mb-0">
                        <div class="container" style="background-color:#f5f5f5">
                            <div class="row">
                                <div class="col-md-6">
                                    <br>
                                    <div class="custom-heading">
                                        <h2>@lang('qhse.our_commitments')</h2>
                                    </div><!-- .custom-heading end -->

                                    <ul class="fa-ul">
                                        <li>
                                            <i class="fa fa-li fa-long-arrow-right"></i>
                                            @lang('qhse.commitments_1')
                                        </li>

                                        <li>
                                            <i class="fa fa-li fa-long-arrow-right"></i>
                                            @lang('qhse.commitments_2')
                                        </li>

                                        <li>
                                            <i class="fa fa-li fa-long-arrow-right"></i>
                                            @lang('qhse.commitments_3')
                                        </li>

                                        <li>
                                            <i class="fa fa-li fa-long-arrow-right"></i>
                                            @lang('qhse.commitments_4')
                                        </li>

                                        <li>
                                            <i class="fa fa-li fa-long-arrow-right"></i>
                                            @lang('qhse.commitments_5')
                                        </li>


                                    </ul><!-- .fa-ul end -->
                                    <br>
                                    <br>
                                </div><!-- .col-md-6 end -->

                                <div class="col-md-6">
                                    <br>
                                    <div class="custom-heading">
                                        <h2>@lang('qhse.our_objectives')</h2>
                                    </div><!-- .custom-heading end -->

                                    <ul class="fa-ul">
                                        <li>
                                            <i class="fa fa-li fa-long-arrow-right"></i>
                                            @lang('qhse.objective_1')
                                        </li>

                                        <li>
                                            <i class="fa fa-li fa-long-arrow-right"></i>
                                            @lang('qhse.objective_2')
                                        </li>

                                        <li>
                                            <i class="fa fa-li fa-long-arrow-right"></i>
                                            @lang('qhse.objective_3')
                                        </li>

                                        <li>
                                            <i class="fa fa-li fa-long-arrow-right"></i>
                                            @lang('qhse.objective_4')
                                        </li>

                                        <li>
                                            <i class="fa fa-li fa-long-arrow-right"></i>
                                            @lang('qhse.objective_5')
                                        </li>
                                    </ul><!-- .fa-ul end -->
                                    <br>
                                    <br>

                                </div><!-- .col-md-6 end -->
                            </div><!-- .row end -->
                        </div><!-- .container end -->
                    </div>




                    <div class="container" style="background-color:#FFFFFF">
                        <div class="row">
                            <div class="col-md-6">
                                <br>
                                <br>
                                <div class="custom-heading">
                                    <h2>@lang('qhse.history_background')</h2>
                                </div><!-- .custom-heading end -->

                                <p>
                                    @lang('qhse.history_part1')
                                </p>

                                <p>
                                    @lang('qhse.history_part2')
                                </p>
                                <br>
                                <br>
                            </div><!-- .col-md-6 end -->

                            <div class="col-md-6 animated triggerAnimation zoomIn" data-animate="zoomIn" style="opacity: 1;">
                                <br>
                                <br>
                                <img src="{{asset('storage/uploads/qhse/iso_i2b.png')}}" alt="" style="max-width: 45%; float: left; margin-top: 15%;">
                                <img src="{{asset('storage/uploads/qhse/vertas_i2b.png')}}" alt="" style="max-width: 45%;">
                                <br>
                                <br>
                            </div><!-- .col-md-6 end -->
                        </div><!-- .row end -->

                    </div>


                    <div class="page-content custom-bkg bkg-light-blue mb-0" style="width:100%!important">
                        <div class="container" style="background-color:#f5f5f5">
<style>
    .page-content{
        width:100%!important;
    }
</style>
                            <div class="row" align="center">

                                 <div class="custom-heading02" style="text-align: center!important;" >
                                    <br>
                                    <br>
                                    <h2 class="only_lg">  &nbsp; @lang('qhse.certifications') </h2>
                                     <p class="only_lg"> &nbsp; @lang('qhse.make_all_difference') </p>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div><!-- .row end -->
                            <div class="row">

                                <div class="col-md-3 col-sm-6">
                                    <div class="service-icon-center">
                                        <div class="icon-container">
                                            <i class="fa fa-calendar float-left" style="height: 60px; padding-top: 16px;"></i>
                                            <span class="text-under-i">2014</span>
                                        </div>

                                        <h4>Original cycle Start</h4>

                                        <p>
                                        </p><ul class="fa-ul fa-ul-iso">
                                            <li>
                                                <i class="fa fa-li fa-long-arrow-down"></i>
                                                ISO 9001 V2008
                                            </li>

                                            <li>
                                                <i class="fa fa-li fa-long-arrow-down"></i>
                                                ISO 14001 V2004
                                            </li>

                                            <li>
                                                <i class="fa fa-li fa-long-arrow-down"></i>
                                                OHSAS 18001 V2007
                                            </li>
                                        </ul><!-- .fa-ul end -->
                                        <p></p>
                                    </div><!-- .service-icon-center end -->
                                </div><!-- .col-md-3 end -->

                                <div class="col-md-3 col-sm-6">
                                    <div class="service-icon-center">
                                        <div class="icon-container">
                                            <i class="fa fa-calendar float-left" style="height: 60px; padding-top: 16px;"></i>
                                            <span class="text-under-i">2017</span>
                                        </div>

                                        <h4>Transition + Reconduction</h4>

                                        <p>
                                        </p><ul class="fa-ul fa-ul-iso">
                                            <li>
                                                <i class="fa fa-li fa-long-arrow-down"></i>
                                                ISO 9001 V2015
                                            </li>

                                            <li>
                                                <i class="fa fa-li fa-long-arrow-down"></i>
                                                ISO 14001 V2015
                                            </li>

                                            <li>
                                                <i class="fa fa-li fa-long-arrow-down"></i>
                                                OHSAS 18001 V2007
                                            </li>
                                        </ul><!-- .fa-ul end -->
                                        <p></p>
                                    </div><!-- .service-icon-center end -->
                                </div><!-- .col-md-3 end -->

                                <div class="col-md-3 col-sm-6">
                                    <div class="service-icon-center">
                                        <div class="icon-container">
                                            <i class="fa fa-calendar float-left" style="height: 60px; padding-top: 16px;"></i>
                                            <span class="text-under-i">2020</span>
                                        </div>

                                        <h4>Reconduction</h4>

                                        <p>
                                        </p><ul class="fa-ul fa-ul-iso">
                                            <li>
                                                <i class="fa fa-li fa-long-arrow-down"></i>
                                                ISO 9001 V2015
                                            </li>

                                            <li>
                                                <i class="fa fa-li fa-long-arrow-down"></i>
                                                ISO 14001 V2015
                                            </li>
                                        </ul><!-- .fa-ul end -->
                                        <p></p>
                                    </div><!-- .service-icon-center end -->
                                </div><!-- .col-md-3 end -->

                                <div class="col-md-3 col-sm-6">
                                    <div class="service-icon-center">
                                        <div class="icon-container">
                                            <i class="fa fa-calendar float-left" style="height: 60px; padding-top: 16px;"></i>
                                            <span class="text-under-i">2021</span>
                                        </div>

                                        <h4>Transition SST</h4>

                                        <p>
                                        </p><ul class="fa-ul fa-ul-iso">
                                            <li>
                                                <i class="fa fa-li fa-long-arrow-down"></i>
                                                ISO 9001 V2015
                                            </li>

                                            <li>
                                                <i class="fa fa-li fa-long-arrow-down"></i>
                                                ISO 14001 V2015
                                            </li>

                                            <li>
                                                <i class="fa fa-li fa-long-arrow-down"></i>
                                                ISO 45001 V2018
                                            </li>
                                        </ul><!-- .fa-ul end -->
                                        <br>
                                        <br>
                                        <p></p>
                                    </div><!-- .service-icon-center end -->
                                </div><!-- .col-md-3 end -->

                            </div><!-- .row end -->
                        </div><!-- .container end -->



                        <div lass="page-content">
                            <div class="container" style="background-color:#FFFFFF">
                                <div class="row">
                                    <div class="col-md-9">
                                        <br>
                                        <br>
                                        <div class="custom-heading">
                                            <h2>Certifications</h2>
                                        </div><!-- .custom-heading end -->

                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="team-member">
                                                    <img src="{{asset('storage/uploads/qhse/iso-90012015.png')}}" alt="" style="max-width: 75%;">
                                                    <div class="team-details">
                                                        <h5>ISO 9001:2015</h5>
                                                        <p class="position">
                                                            <a href="{{ asset('storage/uploads/qhse/documents/iso-9k.pdf')}}" target="_blank">@lang('qhse.show')</a>
                                                        </p>
                                                    </div><!-- .team-details end -->
                                                </div><!-- .member end -->
                                            </div><!-- .col-md-4 end -->

                                            <div class="col-md-4 col-sm-4">
                                                <div class="team-member">
                                                    <img src="{{asset('storage/uploads/qhse/iso-140012015.png')}}" alt="" style="max-width: 75%;">
                                                    <div class="team-details">
                                                        <h5>ISO 14001:2015</h5>
                                                        <p class="position">
                                                            <a href="{{ asset('storage/uploads/qhse/documents/iso-14k.pdf')}}" target="_blank">@lang('qhse.show')</a>
                                                        </p>
                                                    </div><!-- .team-details end -->
                                                </div><!-- .member end -->
                                            </div><!-- .col-md-4 end -->

                                            <div class="col-md-4 col-sm-4">
                                                <div class="team-member">
                                                    <img src="{{asset('storage/uploads/qhse/pol-qhse.png')}}" alt="" style="max-width: 75%;">
                                                    <div class="team-details">
                                                        <h5>@lang('qhse.qhse_politics')</h5>
                                                        <p class="position">
                                                            <a href="{{ asset('storage/uploads/qhse/documents/file-qhse-politique.pdf')}}" target="_blank">@lang('qhse.show')</a>
                                                        </p>
                                                    </div><!-- .team-details end -->
                                                </div><!-- .member end -->
                                            </div><!-- .col-md-4 end -->
                                        </div><!-- .row end -->
                                        <br>
                                        <br>
                                    </div><!-- .col-md-9 end -->

                                  <div class="col-md-3">
                                      <br>
                                      <br>
                                        <div class="custom-heading">
                                            <h2> @lang('qhse.our_certifications_in_pdf') </h2>
                                        </div>

                                        <div class="promo-box promo-bkg-pdf">
                                            <h4>Certificats ISO </h4>

                                            <a href="{{ asset('storage/uploads/qhse/documents/download_ISO.zip')}}" class="btn btn-medium btn-yellow" style="margin-top: 80px;background-color:yellow" target="_blank">
                                                <span>@lang('qhse.download') </span>
                                            </a>
                                        </div>

                                    </div> <!--.col-md-3 end -->

                                </div><!-- .row end -->
                                <br>
                                <br>
                            </div><!-- .container end -->
                        </div>
                    </div>


                </div>


            </div>

            <br>




        </div>

<style>
    @media only screen and (min-width: 990px) {
        .only_lg {
            padding-left: 450px;
        }

    }
</style>

<style>
    /*
    Author     : Pixel Industry
    Website    : www.pixel-industry.com
*/

    /*
    TABLE OF CONTENTS
    ========================================================================= */
    /*      1. CSS RESET
        2. DOCUMENT STYLES
        3. TYPOGRAPHY
        4. HEADER
        5. PAGE TITLES
        6. CUSTOM SECTION BACKGROUNDS
        7. ELEMENTS
            7.1. ACCORDION
            7.2. BLOCKQUOTE
            7.3. BUTTONS
            7.4. CALL TO ACTION
            7.5. CLIENT CAROUSEL
            7.6. CLIENT LIST
            7.7. COMPANY TIMELINE
            7.8. CUSTOM HEADING
            7.9. CUSTOM HEADING02 - CENTERED WITH SUBTITLE
            7.10. DRIVER APPLICATION
            7.11. EVENTS
            7.12. INTRO TITLE
            7.13. LATEST POSTS STYLE 01
            7.14. LATEST POSTS STYLE 02
            7.15. LATEST POSTS STYLE 03
            7.16. LIST WITH ICONS
            7.17. NUMBERS COUNTER
            7.18. PROMO BOXES
            7.19. SERVICES FEATURE BOX
            7.20. SERVICES GALLERY
            7.21. SERVICE ICON CENTER
            7.22. SERVICE ICON CENTER BOXED
            7.23. SERVICES ICON LEFT
            7.24. SERVICES ICON LEFT BOXED
            7.25. SERVICE LIST - small icons and text
            7.26. SERVICES LIST BIG ICONS
            7.27. SERVICES LIST BIG ICONS + DETAILS (text)
            7.28. SHIPPING QUOTE FORM
            7.29. SLIDER - MASTER SLIDER
            7.30. STATEMENT ELEMENT
            7.31. TABLE
            7.32. TABS
            7.33. TEAM MEMBERS
            7.34. TEAM MEMBERS LIST
            7.35. TESTIMONIAL
            7.36. TRACKING FORM
            7.37. VEHICLE GALLERY FULL
        8. HOME MINIMAL CUSTOM STYLES
        9. BLOG
        10. LOCATIONS PAGE
        11. CONTACT
        12. WIDGETS
        13. FOOTER
*/

    /*
    1. CEE RESET
----------------------------------------------------------------------------- */
    a,
    abbr,
    acronym,
    address,
    applet,
    article,
    aside,
    audio,
    b,
    big,
    blockquote,

    canvas,
    caption,
    center,
    cite,
    code,
    dd,
    del,
    details,
    dfn,
    div,
    dl,
    dt,
    em,
    embed,
    fieldset,
    figcaption,
    figure,

    form,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,

    hgroup,
    html,
    i,
    iframe,
    img,
    ins,
    kbd,
    label,
    legend,
    li,
    mark,
    menu,
    nav,
    object,
    ol,
    output,
    p,
    pre,
    q,
    ruby,
    s,
    samp,

    small,
    span,
    strike,
    strong,
    sub,
    summary,
    sup,
    table,
    tbody,
    td,
    tfoot,
    th,
    thead,
    time,
    tr,
    tt,
    u,
    ul,
    var,
    video {
        margin: 0;
        padding: 0;
        border: 0;
        font: inherit;
        vertical-align: baseline;
    }
    article,
    aside,
    details,
    figcaption,
    figure,

    hgroup,
    menu,
    nav,


    blockquote,
    q {
        quotes: none;
    }
    blockquote:after,
    blockquote:before,
    q:after,
    q:before {
        content: "";
        content: none;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    *:focus {
        outline: 0;
        text-decoration: none;
    }
    a:focus,
    a:active {
        text-decoration: none;
        outline: 0;
    }



    /* ==========================================================================
    3. TYPOGRAPHY
    ========================================================================= */
    p,
    a,
    span {
        color: #777;
        font-family: "Open Sans", Arial, sans-serif;
        line-height: 22px;
    }
    p {
        padding-bottom: 15px;
    }
    a {
        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
        text-decoration: none;
    }
    a:hover {
        text-decoration: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Raleway", "Open Sans", Arial, sans-serif;
        font-weight: 800;
        margin-bottom: 25px;
        margin-top: 0;
        color: #333;
    }

    h1 {
        font-size: 30px;
        line-height: 30px;
    }

    h2 {
        font-size: 24px;
        line-height: 26px;
    }

    h3 {
        font-size: 21px;
        line-height: 24px;
    }

    h4 {
        font-size: 18px;
        line-height: 22px;
    }

    h5 {
        font-size: 16px;
        line-height: 18px;
    }

    h6 {
        font-size: 15px;
        line-height: 18px;
    }

    strong {
        font-weight: 600;
    }

    img {
        max-width: 100%;
        height: auto;
     
    }

    img.main-logo {
        margin-top: 8px;
    }

    img.float-left {
        float: left;
        margin: 12px 12px 12px 0;
    }
    img.float-right {
        float: right;
        margin: 12px 0px 12px 12px;
    }

    .img-fixed-bottom {
        position: relative;
        bottom: -70px;
    }

    ul,
    ol {
        list-style-position: inside;
    }
    ul li,
    ol li {
        padding-bottom: 5px;
    }

    blockquote + p {
        margin-top: 15px;
    }

    .required {
        color: #ce292d;
    }

    .text-big {
        font-size: 18px;
        line-height: 25px;
        color: #333;
    }

    .align-right {
        text-align: right;
    }

    a.read-more {
        float: right;
        position: relative;
    }

    a.read-more span {
        text-transform: uppercase;
        font-weight: 700;
        display: block;

        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    a.read-more:hover span {
        transform: translate(-15px, 0);
        -webkit-transform: translate(-15px, 0);
        -moz-transform: translate(-15px, 0);
        -ms-transform: translate(-15px, 0);
    }

    a.read-more i {
        font-size: 11px;
        line-height: 20px;
        opacity: 0;

        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    a.read-more:hover i {
        opacity: 1;
    }

    a.download-link {
        width: 100%;
        display: block;
        margin-bottom: 5px;
    }

    a.download-link span {
        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    a.download-link span i {
        padding-right: 5px;
    }

    .mb-70 {
        margin-bottom: 70px;
    }

    .mb-30 {
        margin-bottom: 30px;
    }

    .mb-0 {
        margin-bottom: 0;
    }

    .svg-white .st0 {
        fill: #fff;
    }

    /* ==========================================================================


    /* ==========================================================================
    5. PAGE TITLES
    ========================================================================= */
    .page-title-style01 {
        padding-top: 70px;
        padding-bottom: 70px;
        margin-bottom: 70px;
    }

    .page-title-negative-top {
        margin-top: 0 !important;
        padding-top: 185px;
    }

    .page-title-style01 .row,
    .page-title-style02 .row {
        margin-bottom: 0;
    }

    .page-title-style01 h1 {
        color: #fff;
        text-align: center;
    }

    .breadcrumb-container {
        width: 100%;
        float: left;
    }

    .page-title-style01 .breadcrumb {
        margin: 0 auto;
        display: table;
    }

    .breadcrumb li {
        list-style: none;
        float: left;
        padding: 0 0px 0 3px;
        color: #fff;
    }

    .breadcrumb li a {
        color: #fff;
    }

    .breadcrumb li + li::before {
        font-size: 12px;
        content: "/";
        color: #fff;
        padding: 0 8px;
    }
    .breadcrumb li:nth-child(2)::before {
        color: transparent;
    }

    .page-title-style02 {
        padding: 70px 0;
        margin-bottom: 70px;
    }

    .page-title-style02 h1 {
        color: #fff;
        margin-bottom: 0;
    }

    .page-title-style02 .breadcrumb-container {
        float: right;
        width: auto;
    }



    .pt-bkg-qhse {
        background-image: url("..../img/logos/qhse0511.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg01 {
        background-image: url("../img/pics/page-title01.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg02 {
        background-image: url("../img/pics/page-title02.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg03 {
        background-image: url("../img/pics/page-title03.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg04 {
        background-image: url("../img/pics/page-title04.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg05 {
        background-image: url("../img/pics/page-title05.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg06 {
        background-image: url("../img/pics/page-title06.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg07 {
        background-image: url("../img/pics/page-title07.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg08 {
        background-image: url("../img/pics/page-title08.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg09 {
        background-image: url("../img/pics/page-title09.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg10 {
        background-image: url("../img/pics/page-title10.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg11 {
        background-image: url("../img/pics/page-title11.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg12 {
        background-image: url("../img/pics/page-title12.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg13 {
        background-image: url("../img/pics/page-title13.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg14 {
        background-image: url("../img/pics/page-title14.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg15 {
        background-image: url("../img/pics/page-title15.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .pt-bkg16 {
        background-image: url("../img/pics/page-title16.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    /* ==========================================================================

    /* ==========================================================================
    7. ELEMENTS
    ========================================================================= */

    /*  7.1. ACCORDION
    ------------------------------------------------------------------------- */
    .accordion .title {
        width: 100%;
        background-color: #f6f6f6;
        margin-bottom: 10px;
        position: relative;
        padding: 10px 15px;
        float: left;
    }

    .accordion .title a {
        font-size: 15px;
        color: #333;
        font-family: "Raleway", "Open Sans", Arial, sans-serif;
        font-weight: 700;
        position: relative;
        width: 100%;
        padding-left: 20px;
        display: block;
        float: left;
    }

    .accordion .title::before {
        content: "\f067";
        font-family: "FontAwesome";
        font-size: 15px;
        position: absolute;
        display: block;
    }

    .accordion .title.active::before {
        content: "\f068";
        font-family: "FontAwesome";
        font-size: 15px;
        position: absolute;
        display: block;
    }

    .accordion .title a::after {
        display: none;
    }

    .accordion.careers .title {
        padding: 15px 62px 15px 20px;
    }

    .accordion.careers .title a {
        padding-left: 0;
    }

    .accordion.careers .title::before {
        display: none;
    }

    .accordion.careers .title a span {
        color: #333;
        font-weight: 600;
        width: 30%;
        display: block;
        float: left;
        font-size: 13px;
    }

    .accordion .job-position,
    .accordion .job-end-date {
        text-transform: uppercase;
    }

    .accordion.careers .title::after {
        position: absolute;
        content: "";
        display: block;
        width: 52px;
        height: 100%;
        background-color: #e6e6e6;
        background-image: url("../img/accordion-closed.png");
        background-repeat: no-repeat;
        background-position: center;
        right: 0;
        top: 0;

        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    .accordion.careers .title.active::after {
        background-image: url("../img/accordion-opened.png");
        background-repeat: no-repeat;
        background-position: center;
    }

    .accordion.careers .title:hover::after {
        background-image: url("../img/accordion-opened.png");
        background-repeat: no-repeat;
        background-position: center;
    }

    .accordion .content {
        margin-bottom: 20px;
        padding-left: 20px;
        padding-top: 20px;
    }

    /*
    7.2. BLOCKQUOTE
    ------------------------------------------------------------------------- */
    blockquote {
        margin-left: 30px;
        border-left: 3px solid;
        padding: 15px 20px;
        font-size: 18px;
        line-height: 25px;
        font-style: italic;
        color: #333;
    }

    /*  7.3. BUTTONS
    ------------------------------------------------------------------------- */
    .btn {
        text-transform: uppercase;
        font-weight: 700;
        position: relative;
        overflow: hidden;
        display: inline-block;
        backface-visibility: hidden;
        float: right;

        border-radius: 25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
    }

    .btn span {
        color: #fff;
    }

    .dark .btn span {
        color: #fff;
    }

    .btn-big {
        padding: 12px 60px;
        font-size: 12px;
    }

    .btn-medium {
        padding: 10px 40px;
        font-size: 12px;
    }

    .btn-small {
        padding: 4px 20px;
        font-size: 11px;
    }

    .btn-yellow {
        background-color: #fac312 !important;
    }

    .btn-gf-green {
        background-color: #208c93 !important;
    }

    .btn-centered {
        float: none;
        display: table;
        margin: 0 auto;
    }

    .btn-yellow:hover {
        background-color: #fcc820 !important;
    }

    /*  7.4. CALL TO ACTION
    ------------------------------------------------------------------------- */
    .call-to-action .text {
        width: 70%;
        float: left;
    }

    .call-to-action .btn {
        float: right;
        position: relative;
        top: 30px;
    }

    /*
    7.5. CLIENT CAROUSEL
    ------------------------------------------------------------------------- */
    #client-carousel .owl-item img {
        opacity: 0.7;

        transition: all 0.2s ease-in-out 0s;
        -webkit-transition: all 0.2s ease-in-out 0s;
        -moz-transition: all 0.2s ease-in-out 0s;
        -o-transition: all 0.2s ease-in-out 0s;
    }

    #client-carousel .owl-item:hover img {
        opacity: 1;
    }

    /*  7.6. CLIENT LIST
    ------------------------------------------------------------------------- */
    .clients-li {
        width: 100%;
    }

    .clients-li li {
        list-style: none;
        float: left;
        width: 33.33333333%;
        padding-left: 15px;
        padding-right: 15px;
        padding-bottom: 50px;
        padding-top: 20px;
        padding-bottom: 20px;
        border: 1px solid #eee;
    }

    .clients-li li:first-child {
        padding-left: 0;
    }

    .clients-li:nth-child(3n) {
        padding-right: 0;
    }

    .clients-li li img {
        opacity: 0.7;

        transition: all 0.2s ease-in-out 0s;
        -webkit-transition: all 0.2s ease-in-out 0s;
        -moz-transition: all 0.2s ease-in-out 0s;
        -o-transition: all 0.2s ease-in-out 0s;

        display: block;
        margin: 0 auto;
        vertical-align: middle;
    }

    .clients-li li:hover img {
        opacity: 1;
    }

    .col-md-6 .clients-li li {
        max-height: 92px;
    }

    /*  7.7. COMPANY TIMELINE
    ------------------------------------------------------------------------- */
    .company-timeline {
        width: 100%;
    }

    .company-timeline li {
        list-style: none;
        float: left;
        width: 100%;
        position: relative;
    }

    .company-timeline li .timeline-item-details::before {
        position: absolute;
        content: "";
        display: block;
        left: 35px;
        top: 0;
        width: 1px;
        height: 100%;
        background-color: #ddd;
        z-index: 1;
    }

    .company-timeline .icon-date-container {
        width: 70px;
        height: 70px;
        float: left;
        border: 2px solid #ddd;
        background-color: #fff;
        z-index: 2;
        position: relative;

        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
    }

    .company-timeline .icon-date-container i {
        width: 70px;
        height: 70px;
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        font-size: 24px;
    }

    .company-timeline .timeline-item-details {
        padding-left: 100px;
        position: relative;
        padding-bottom: 30px;
    }

    .company-timeline li:last-child .timeline-item-details {
        padding-bottom: 0;
    }

    /*
    7.8. CUSTOM HEADING
    ------------------------------------------------------------------------- */
    .row .custom-heading:only-child {
        margin-bottom: -70px;
    }

    .custom-heading {
        position: relative;
        width: 100%;
        display: block;
        padding-top: 12px;
        text-transform: uppercase;
    }

    .custom-heading::after {
        position: absolute;
        display: block;
        content: "";
        width: 40px;
        height: 3px;
        left: 0;
        top: 0;
    }

    .custom-heading.centered {
        text-align: center;
    }

    .custom-heading.centered:after {
        position: absolute;
        display: block;
        content: "";
        width: 40px;
        height: 3px;
        left: 50%;
        margin-left: -20px;
        top: 0;
    }

    /*
    7.9. CUSTOM HEADING02 - CENTERED WITH SUBTITLE
    ------------------------------------------------------------------------- */
    .col-md-12 .custom-heading02:only-child {
        margin-bottom: 0;
    }

    .row .custom-heading02:only-child {
        margin-bottom: -30px;
    }

    .custom-heading02 {
        position: relative;
        margin-bottom: 40px;
    }

    .custom-heading02 h1,
    .custom-heading02 h2,
    .custom-heading02 h3,
    .custom-heading02 h4 {
        font-size: 30px;
        line-height: 30px;
        margin-bottom: 5px;
        text-transform: none;
        text-align: center!important;
        margin-bottom: 0;
    }

    .custom-heading02 p {
        text-transform: uppercase;
        text-align: center!important;
    }

    .custom-heading02:after {
        position: absolute;
        display: block;
        content: "";
        width: 40px;
        height: 3px;
        bottom: 0;
        top: 55px;
        left: 50%;
        margin-left: -20px;
    }

    .custom-heading02.simple h1,
    .custom-heading02.simple h2,
    .custom-heading02.simple h3,
    .custom-heading02.simple h4 {
        padding-bottom: 15px;
        text-align: center!important;
    }

    /*  7.10. DRIVER APPLICATION
    ------------------------------------------------------------------------- */
    .driver-app-form fieldset {
        width: 33.33333333%;
        padding-right: 15px;
        float: left;
    }

    .driver-app-form fieldset:nth-child(3n) {
        padding-right: 0;
    }

    .driver-app-form .wpcf7-select {
        max-height: 34px;
    }

    /*
    7.11. EVENTS
    ------------------------------------------------------------------------- */
    .table-responsive {
        overflow-y: hidden;
    }

    .events-table thead {
        border-bottom: 1px solid #e6e6e6;
    }

    .events-table thead th {
        font-size: 18px;
        font-weight: 800;
        text-transform: uppercase;
        text-align: left;
        padding-left: 15px;
        padding-bottom: 10px;
    }

    .events-table thead th:first-child {
        padding-left: 0;
    }

    .events-table tbody td {
        padding: 0 15px;
        vertical-align: middle;
    }

    .events-table .event-date {
        padding: 20px 0;
    }

    .events-table .event-date .day {
        background-color: #fcfcfc;
        font-size: 36px;
        line-height: 36px;
        color: #333;
        font-weight: 800;
        text-align: center;
        padding: 20px 30px;
    }

    .events-table .event-date .month {
        padding: 5px 10px;
        text-transform: uppercase;
        font-weight: 700;
        color: #fff;
        text-align: center;
    }

    /*  7.12. INTRO TITLE
    ------------------------------------------------------------------------- */
    .intro-title {
        width: 100%;
    }

    .intro-title p {
        font-size: 24px;
        line-height: 30px;
        color: #333;
        font-family: "Raleway", "Open Sans", Arial, sans-serif;
        text-align: center;
    }

    /*  7.13. LATEST POSTS STYLE 01
    ------------------------------------------------------------------------- */
    .pi-latest-posts li {
        list-style: none;
        width: 100%;
        float: left;
        margin-bottom: 20px;
    }

    .pi-latest-posts li:last-child {
        margin-bottom: 0;
    }

    .pi-latest-posts li .post-media {
        width: 100px;
        height: 100px;
        float: left;
        margin-bottom: 0;
    }

    .pi-latest-posts li .post-details {
        padding-left: 120px;
    }

    .pi-latest-posts li .post-details h4 {
        transition: all 0.2s ease-in-out 0s;
        -webkit-transition: all 0.2s ease-in-out 0s;
        -moz-transition: all 0.2s ease-in-out 0s;
        -o-transition: all 0.2s ease-in-out 0s;
        margin-bottom: 10px;
    }

    .pi-latest-posts .post-date p {
        color: #565f66;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        padding-bottom: 5px;
    }

    .pi-latest-posts .post-date i {
        padding-right: 3px;
    }

    /*  7.14. LATEST POSTS STYLE 02
    ------------------------------------------------------------------------- */
    .pi-latest-posts02 li {
        width: 30%;
        float: left;
        margin-right: 30px;
        list-style: none;
    }

    .col-md-8 .pi-latest-posts02 li,
    .col-md-9 .pi-latest-posts02 li {
        width: 46%;
    }

    .col-md-6 .pi-latest-posts02 li,
    .col-md-4 .pi-latest-posts02 li,
    .col-md-3 .pi-latest-posts02 li {
        width: 100%;
        margin-bottom: 20px;
    }

    .pi-latest-posts02 li:nth-child(3n) {
        padding-right: 0;
    }

    .pi-latest-posts02 .post-date,
    .pi-latest-posts02 .post-date {
        width: 100px;
        float: left;
    }

    .pi-latest-posts02 .post-date .day {
        background-color: #fcfcfc;
        font-size: 36px;
        line-height: 36px;
        color: #333;
        font-weight: 800;
        text-align: center;
        padding: 20px 30px;
    }

    .pi-latest-posts02 .post-date .month {
        padding: 5px 10px;
        text-transform: uppercase;
        font-weight: 700;
        color: #fff;
        text-align: center;
    }

    .pi-latest-posts02 .post-details {
        padding-left: 120px;
    }

    .pi-latest-posts02 li .post-details h4 {
        transition: all 0.2s ease-in-out 0s;
        -webkit-transition: all 0.2s ease-in-out 0s;
        -moz-transition: all 0.2s ease-in-out 0s;
        -o-transition: all 0.2s ease-in-out 0s;
        margin-bottom: 10px;
    }

    .pi-latest-posts02 .post-category p {
        color: #565f66;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        padding-bottom: 5px;
    }

    .pi-latest-posts02 .post-category i {
        padding-right: 3px;
    }

    /*  7.15. LATEST POSTS STYLE 03
    ------------------------------------------------------------------------- */
    .pi-latest-posts03 li {
        list-style: none;
        width: 100%;
        float: left;
        margin-bottom: 20px;
    }

    .pi-latest-posts03 li:last-child {
        margin-bottom: 0;
    }

    .pi-latest-posts03 li .post-media {
        width: 60px;
        height: 60px;
        float: left;
        margin-bottom: 0;
    }

    .pi-latest-posts03 li .post-media i {
        font-size: 36px;
    }

    .pi-latest-posts03 li .post-details {
        padding-left: 70px;
    }

    .pi-latest-posts03 li .post-details h4 {
        transition: all 0.2s ease-in-out 0s;
        -webkit-transition: all 0.2s ease-in-out 0s;
        -moz-transition: all 0.2s ease-in-out 0s;
        -o-transition: all 0.2s ease-in-out 0s;
        margin-bottom: 10px;
    }

    .pi-latest-posts03 .post-date p {
        color: #565f66;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        padding-bottom: 5px;
    }

    .col-md-8 .pi-latest-posts03 li,
    .col-md-9 .pi-latest-posts03 li {
        margin-right: 30px;
        width: 48%;
    }

    .col-md-8 .pi-latest-posts03 li:nth-child(2n),
    .col-md-9 .pi-latest-posts03 li:nth-child(2n) {
        margin-right: 0;
    }

    .col-md-6 .pi-latest-posts03 li,
    .col-md-4 .pi-latest-posts03 li,
    .col-md-3 .pi-latest-posts03 li {
        width: 100%;
        margin-bottom: 20px;
    }

    /*   7.16. LIST WITH ICONS
    ------------------------------------------------------------------------- */
    .fa-ul li i {
        line-height: 20px;
    }

    .fa-ul.large-icons {
        margin-left: 0;
    }

    .fa-ul.large-icons li {
        margin-bottom: 20px;
    }

    .fa-ul.large-icons li:last-child {
        margin-bottom: 0;
    }

    .fa-ul.large-icons li i {
        font-size: 24px;
        width: 30px;
        height: 30px;
    }

    .fa-ul.large-icons .icon-container {
        float: left;
        width: 30px;
        height: 30px;
    }

    .fa-ul.large-icons .li-content {
        padding-left: 40px;
    }

    .fa-ul.large-icons .li-content h4 {
        padding-top: 3px;
    }

    /*  7.17. NUMBERS COUNTER
    ------------------------------------------------------------------------- */
    .numbers-counter {
        padding: 20px;
        background-color: #fcfcfc;
    }

    .numbers-counter .counter-container {
        width: 100%;
        position: relative;
    }

    .numbers-counter .counter-container::after {
        position: absolute;
        content: "";
        display: block;
        width: 30px;
        height: 3px;
        bottom: 0;
        left: 50%;
        margin-left: -15px;
    }

    .numbers-counter .number {
        font-size: 40px;
        line-height: 40px;
        font-weight: 800;
        text-align: center;
        color: #333;
        width: 100%;
        display: block;
        margin-bottom: 5px;
    }

    .numbers-counter p {
        text-align: center;
    }

    /*  7.18. PROMO BOXES
    ------------------------------------------------------------------------- */
    .promo-box {
        padding: 90px 20px;
    }

    .promo-box02 {
        padding: 30px 30px 90px 30px;
    }

    .promo-box02 p {
        text-align: center;
    }

    .promo-box h4,
    .promo-box p {
        text-align: center;
    }

    .promo-box .btn {
        float: none;
        margin: 0 auto;
        display: table;
    }

    .promo-bkg01 {
        background-image: url("../img/pics/promo01.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .promo-bkg02 {
        background-image: url("../img/pics/promo02.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .promo-bkg-pdf {
        background-image: url("{{ asset('storage/uploads/qhse/pdfDownload.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;
    }

    /*
    7.19. SERVICES FEATURE BOX
    ------------------------------------------------------------------------- */
    .services-negative-top {
        margin-top: -316px;
    }

    .custom-bkg .service-feature-box,
    .parallax .service-feature-box {
        box-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        border: none;
    }

    .service-feature-box {
        box-shadow: 1px 0px 3px 0 #ddd;
        -webkit-box-shadow: 1px 0px 3px 0 #ddd;
        -moz-box-shadow: 1px 0px 3px 0 #ddd;
        border: 1px solid #eee;
    }

    .service-feature-box .service-media {
        position: relative;
        overflow: hidden;
    }

    .service-feature-box .service-media img {
        width: 100%;
        transition: all 2s ease-in-out 0s;
        -webkit-transition: all 2s ease-in-out 0s;
        -moz-transition: all 2s ease-in-out 0s;
        -o-transition: all 2s ease-in-out 0s;

        opacity: 1;
    }

    .service-feature-box .service-media:hover img {
        transform: scale(1.3);
        -webkit-transform: scale(1.3);
        -moz-transform: scale(1.3);
        -ms-transform: scale(1.3);

        opacity: 0.7;
    }

    .service-feature-box .service-media a {
        background-color: #208c93;
        position: absolute;
        bottom: 0;
        right: 0;
        text-transform: uppercase;
    }

    .service-feature-box .service-media span {
        color: #fff;
        padding-left: 20px;
        font-weight: 600;
    }

    .service-feature-box .service-media i {
        background-color: #208c93;
        padding: 5px 10px;
        font-size: 10px;
        line-height: 22px;
        margin-left: 20px;

        transition: all 0.2s ease 0s;
        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
    }

    .service-feature-box .service-body {
        background-color: #fff;
        padding: 20px;
    }

    /*
    7.20. SERVICES GALLERY
    ------------------------------------------------------------------------- */
    .services-gallery .col-md-3 {
        padding: 0;
        list-style: none;
    }

    .service-item-container {
        position: relative;
        overflow: hidden;
    }

    .service-item-container .service-item {
        width: 100%;
        height: 100%;
        overflow: hidden;
        cursor: pointer;
        z-index: 1;
    }

    .service-item-container .service-item img {
        width: 100%;
        transition: all 2s ease-in-out 0s;
        -webkit-transition: all 2s ease-in-out 0s;
        -moz-transition: all 2s ease-in-out 0s;
        -o-transition: all 2s ease-in-out 0s;
    }

    .service-item-container .hover-mask-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        background-color: rgba(49, 57, 63, 0.5);

        transition: all 0.2s ease 0s;
        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
    }

    .service-item-container .service-item:hover .hover-mask-container {
        opacity: 1;
    }

    .service-item-container figcaption {
        position: absolute;
        width: 100%;
        top: 40px;
    }

    .service-item-container figcaption h1,
    .service-item-container figcaption h2,
    .service-item-container figcaption h3,
    .service-item-container figcaption h4,
    .service-item-container figcaption h5 {
        text-align: center;
        text-transform: uppercase;
        color: #fff;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 0;
    }

    .service-item-container figcaption h1:after,
    .service-item-container figcaption h2:after,
    .service-item-container figcaption h3:after,
    .service-item-container figcaption h4:after,
    .service-item-container figcaption h5:after {
        position: absolute;
        content: "";
        display: block;
        width: 40px;
        height: 3px;
        left: 50%;
        bottom: 0;
        margin-left: -20px;
    }

    .hover-mask-container .hover-details {
        position: absolute;
        bottom: 40px;
        left: 50%;

        transform: translate(0, 100px);
        -webkit-transform: translate(0, 100px);
        -moz-transform: translate(0, 100px);
        -ms-transform: translate(0, 100px);

        transition: all 0.2s ease 0s;
        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
    }

    .hover-mask-container .hover-details span {
        text-transform: uppercase;
        font-weight: 600;
        color: #fff;
        padding: 10px 30px;
        border: 3px solid;
        border-radius: 25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;

        transition: all 0.2s ease 0s;
        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
    }

    .service-item-container .service-item:hover .hover-details {
        transform: translate(0, 0);
        -webkit-transform: translate(0, 0);
        -moz-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
    }

    .service-item-container .service-item:hover img {
        transform: scale(1.3);
        -webkit-transform: scale(1.3);
        -moz-transform: scale(1.3);
        -ms-transform: scale(1.3);
    }

    /*
    7.21. SERVICE ICON CENTER
    ------------------------------------------------------------------------- */
    .service-icon-center .icon-container {
        width: 100px;
        height: 100px;
        display: table;
        margin: 0 auto 20px;
        background-color: #fcfcfc;
        border: 2px solid #ddd;

        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
    }

    .service-icon-center .icon-container i {
        font-size: 36px;
        color: #333;
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        width: 100px;
        height: 100px;
    }

    .service-icon-center .icon-container img {
        width: 60px;
        height: 60px;
        position: relative;
        left: 50%;
        margin-top: 15px;
        margin-left: -30px;
    }

    .service-icon-center h1,
    .service-icon-center h2,
    .service-icon-center h3,
    .service-icon-center h4,
    .service-icon-center h5 {
        text-align: center;
        margin-bottom: 15px;
    }

    .service-icon-center p {
        text-align: center;
    }

    /*  7.22. SERVICE ICON CENTER BOXED
    ------------------------------------------------------------------------- */
    .service-icon-center-boxed {
        width: 100%;
        background-color: #fcfcfc;
        padding: 30px 20px;
    }

    .service-icon-center-boxed .service-title {
        display: table;
        margin: 0 auto 10px;
    }

    .service-icon-center-boxed .service-title .icon-container {
        width: 60px;
        height: 60px;
        float: left;
    }

    .service-icon-center-boxed .service-title h4 {
        padding-left: 70px;
        padding-top: 20px;
    }

    .service-icon-center-boxed p {
        text-align: center;
        padding-bottom: 0;
    }

    .service-icon-center-boxed .icon-container i {
        width: 60px;
        height: 60px;
        font-size: 46px;
        display: table-cell;
        vertical-align: middle;
        text-align: center;
    }

    /*
    7.23. SERVICES ICON LEFT
    ------------------------------------------------------------------------- */
    .service-icon-left {
        width: 100%;
    }

    .service-icon-left .icon-container {
        float: left;
        width: 100px;
        height: 100px;
        background-color: #fff;

        border: 2px solid #ddd;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
    }

    .service-icon-left .icon-container img,
    .service-icon-left .icon-container svg {
        width: 60px;
        display: block;
        margin: 0 auto;
        vertical-align: middle;
        height: 60px;
        position: relative;
        top: 20px;
    }

    .service-icon-left .service-details {
        padding-left: 120px;
    }

    .service-icon-left .service-details h1,
    .service-icon-left .service-details h2,
    .service-icon-left .service-details h3,
    .service-icon-left .service-details h4 {
        margin-bottom: 15px;
    }

    .service-icon-left .icon-container i {
        font-size: 60px;
        text-align: center;
        display: table-cell;
        vertical-align: middle;
        height: 100px;
        width: 100px;
    }

    /*
    7.24. SERVICES ICON LEFT BOXED
    ------------------------------------------------------------------------- */
    .service-icon-left-boxed {
        background-color: #efefef;
        padding: 30px 40px;
    }

    .service-icon-left-boxed .icon-container {
        float: left;
        width: 100px;
    }

    .service-icon-left-boxed .service-details {
        padding-left: 120px;
    }

    .service-icon-left-boxed .service-details h1,
    .service-icon-left-boxed .service-details h2,
    .service-icon-left-boxed .service-details h3,
    .service-icon-left-boxed .service-details h4 {
        margin-bottom: 15px;
    }

    .service-icon-left-boxed .service-details p {
        padding-bottom: 0;
    }

    .col-md-3 .service-icon-left-boxed .icon-container {
        float: none;
        margin: 0 auto 20px;
    }

    .col-md-3 .service-icon-left-boxed .service-details {
        padding-left: 0;
    }

    .col-md-3 .service-icon-left-boxed .service-details h1,
    .col-md-3 .service-icon-left-boxed .service-details h2,
    .col-md-3 .service-icon-left-boxed .service-details h3,
    .col-md-3 .service-icon-left-boxed .service-details h4,
    .col-md-3 .service-icon-left-boxed .service-details p {
        text-align: center;
    }

    .service-icon-left-boxed i {
        font-size: 70px;
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        width: 100px;
    }

    /*  7.25. SERVICE LIST - small icons and text
    ------------------------------------------------------------------------- */
    .service-list li {
        list-style: none;
        width: 100%;
        float: left;
        padding-bottom: 10px;
    }

    .service-list li:last-child {
        padding-bottom: 0;
    }

    .service-list li .icon-container {
        width: 70px;
        height: 70px;
        float: left;
    }

    .service-list li p {
        font-family: "Raleway", "Open Sans", Arial, sans-serif;
        font-size: 18px;
        padding-top: 20px;
        padding-left: 95px;
    }

    .service-list li i {
        font-size: 46px;
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        width: 70px;
    }

    /*  7.26. SERVICES LIST BIG ICONS
    ------------------------------------------------------------------------- */
    .col-md-9 .service-list-big-icons li {
        width: 33.3%;
        padding-right: 15px;
        padding-left: 15px;
        margin-bottom: 30px;
    }

    .col-md-9 .service-list-big-icons li:nth-child(3n) {
        padding-right: 0;
    }

    .col-md-9 .service-list-big-icons li:first-child {
        padding-left: 0;
    }

    .service-list-big-icons {
        width: 100%;
    }

    .service-list-big-icons li {
        list-style: none;
        float: left;
        padding-right: 15px;
        padding-left: 15px;
        margin-bottom: 30px;
    }

    .service-list-big-icons li .icon-container {
        background-color: #fff;
        width: 80px;
        height: 80px;
        float: left;
        border: 2px solid #ddd;

        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
    }

    .service-list-big-icons .icon-container svg,
    .service-list-big-icons .icon-container img {
        width: 60px;
        display: block;
        margin: 0 auto;
        height: 100%;
    }

    .service-list-big-icons li h4 {
        font-weight: normal;
        padding-left: 100px;
        padding-top: 30px;
    }

    .service-list-big-icons .icon-container i {
        font-size: 36px;
        width: 80px;
        height: 80px;
        display: table-cell;
        vertical-align: middle;
        text-align: center;
    }

    /*  7.27. SERVICES LIST BIG ICONS + DETAILS (text)
    ------------------------------------------------------------------------- */
    .service-list-big-icons-details li {
        margin-bottom: 20px;
    }

    .col-md-9 .service-list-big-icons-details li {
        width: 33.3%;
        padding-right: 15px;
        padding-left: 15px;
        margin-bottom: 30px;
    }

    .col-md-9 .service-list-big-icons-details li:nth-child(3n) {
        padding-right: 0;
    }

    .col-md-9 .service-list-big-icons-details li:first-child {
        padding-left: 0;
    }

    .service-list-big-icons-details {
        width: 100%;
    }

    .service-list-big-icons-details li {
        list-style: none;
        float: left;
    }

    .service-list-big-icons-details li .icon-container {
        background-color: #fff;
        width: 100px;
        height: 100px;
        float: left;
        border: 2px solid #ddd;

        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
    }

    .service-list-big-icons-details li .icon-container svg,
    .service-list-big-icons-details li .icon-container img {
        width: 60px;
        height: 100%;
        margin: 0 auto;
        display: table-cell;
        vertical-align: middle;
    }

    .service-list-big-icons-details li .service-details {
        padding-left: 125px;
        padding-top: 10px;
    }

    .service-list-big-icons-details li .service-details h4 {
        margin-bottom: 15px;
    }

    .service-list-big-icons-details .icon-container i {
        width: 100px;
        height: 100px;
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        font-size: 50px;
    }

    /*
    7.28. SHIPPING QUOTE FORM
    ------------------------------------------------------------------------- */
    .wpcf7.shipping-quote {
        padding: 20px;
        background-color: #fcfcfc;
    }

    .wpcf7.shipping-quote label {
        width: 50%;
        float: left;
        padding-top: 8px;
    }

    .wpcf7.shipping-quote fieldset {
        width: 100%;
        margin-bottom: 5px;
    }

    .wpcf7.shipping-quote input.wpcf7-text {
        width: 50%;
        float: left;
        padding: 5px 15px;
    }

    .wpcf7.shipping-quote .submit {
        padding: 8px 30px;
        font-size: 13px;
        font-weight: 700;
        margin-top: 10px;
        text-transform: uppercase;
        border: none;
        border-radius: 25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        float: right;
        color: #fff;

        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    /*   7.29. SLIDER - MASTER SLIDER
    ------------------------------------------------------------------------- */

    .master-slider .pi-caption01 {
        color: #fff;
        font-size: 55px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .master-slider .pi-text {
        font-family: "Raleway", "Open Sans", Arial, sans-serif;
        font-size: 30px;
        color: #fff;
    }

    .master-slider {
        margin-bottom: 70px !important;
    }

    .master-slider.mb-0 {
        margin-bottom: 0 !important;
    }

    .master-slider.mb-30 {
        margin-bottom: 30px !important;
    }

    .master-slider .pi-caption02 {
        font-size: 21px;
        font-family: "Raleway", "Open Sans", Arial, sans-serif;
        font-weight: 800;
        text-transform: uppercase;
        color: #fff;
    }

    .master-slider .pi-button {
        padding: 12px 50px;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;

        border: 2px solid;
        border-radius: 25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;

        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    .master-slider .pi-caption-dark {
        color: #03253c;
    }

    .master-slider .ms-view {
        background: transparent;
    }

    .master-slider .tooltip h1,
    .master-slider .tooltip h2,
    .master-slider .tooltip h3,
    .master-slider .tooltip h4,
    .master-slider .tooltip h5,
    .master-slider .tooltip h6 {
        color: #333;
        text-transform: uppercase;
        margin-bottom: 5px;
        position: relative;
        padding-bottom: 10px;
    }

    .master-slider .tooltip h6::after {
        position: absolute;
        content: "";
        display: block;
        width: 15px;
        height: 3px;
        bottom: 0;
        left: 0;
    }

    .master-slider .tooltip p,
    .master-slider .tooltip span {
        color: #333;
    }

    .master-slider .tooltip img {
        float: left;
    }

    .master-slider .tooltip-text {
        padding-left: 85px;
    }

    .ms-skin-default .ms-tooltip {
        max-width: 300px;
    }

    /*   7.30. STATEMENT ELEMENT
    ------------------------------------------------------------------------- */
    .statement p {
        padding: 0 50px;
        font-size: 24px;
        line-height: 30px;
        text-align: center;
    }

    /*
    7.31. TABLE
    ------------------------------------------------------------------------- */
    .table {
        width: 100%;
    }

    .table caption {
        font-size: 15px;
        font-weight: 700;
        text-align: left;
        margin-bottom: 20px;
        color: #333;
        text-transform: uppercase;
    }

    .table thead {
        background-color: #f6f6f6;
    }

    .table thead tr th {
        padding: 10px;
        font-weight: 700;
        color: #333;
        text-transform: uppercase;
    }

    .table thead tr th:first-child {
        text-align: left;
    }

    .table tbody {
        background-color: #fcfcfc;
    }

    .table tbody tr td {
        padding: 10px;
        text-align: center;
    }

    .table tbody tr td:first-child {
        text-align: left;
        color: #333;
        font-weight: 700;
    }

    /*  7.32. TABS
    ------------------------------------------------------------------------- */
    .tabs {
        overflow: hidden;
    }

    .tabs li {
        list-style: none;
        float: left;
        background-color: #fcfcfc;
        overflow: hidden;
        position: relative;
        padding: 0;
        line-height: 55px;
        list-style: none;
        top: 3px;
        cursor: pointer;
        margin-right: 2px;
    }

    .tabs li a {
        color: #333;
        padding: 0 30px;
        font-size: 15px;
        font-weight: 800;
        line-height: 55px;
        text-transform: uppercase;
        display: block;
    }

    .tab-content-wrap {
        width: 100%;
        overflow: hidden;
        float: left;
        padding-top: 30px;
    }

    .tabs li.active a {
        color: #fff;
    }

    /*
    7.33. TEAM MEMBERS
    ------------------------------------------------------------------------- */
    .team-member img {
        margin-bottom: 20px;
    }

    .team-details {
        position: relative;
    }

    .team-details:after {
        position: absolute;
        content: "";
        display: block;
        width: 40px;
        height: 3px;
        bottom: 0;
        left: 0;
    }

    .team-details h1,
    .team-details h2,
    .team-details h3,
    .team-details h4,
    .team-details h5 {
        margin-bottom: 0;
        text-transform: uppercase;
    }

    .team-details .position {
        font-style: italic;
    }

    /*
    7.34. TEAM MEMBERS LIST
    ------------------------------------------------------------------------- */
    .team-list li {
        list-style: none;
        width: 100%;
        margin-bottom: 30px;
        float: left;
    }

    .team-list li:last-child {
        margin-bottom: 0;
    }

    .team-list li img {
        float: left;
    }

    .team-list li .team-details-container {
        padding-left: 293px;
    }

    .team-list li .team-details {
        margin-bottom: 20px;
    }

    .col-md-3 .team-list li img,
    .col-md-4 .team-list li img {
        float: none;
        display: table;
        margin: 0 auto 20px;
        width: 100%;
    }

    .col-md-3 .team-list li .team-details-container,
    .col-md-4 .team-list li .team-details-container {
        padding-left: 0;
    }

    /*
    7.35. TESTIMONIAL
    ------------------------------------------------------------------------- */
    .testimonial {
        background-color: #efefef;
        padding: 30px;
    }

    .testimonial p {
        font-size: 14px;
        line-height: 22px;
        font-style: italic;
        text-align: center;
    }

    .testimonial-author p {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        font-style: normal;
        color: #333;
    }

    /*   7.36. TRACKING FORM
    ------------------------------------------------------------------------- */
    .tracking {
        width: 100%;
        position: relative;
    }

    .tracking .package-id {
        padding: 5px 60px 5px 15px;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        height: 40px;
        border: 1px solid #ddd;
        background-color: #fff;
        min-width: 100%;
    }

    .tracking .submit {
        width: 40px;
        height: 40px;
        background-image: url("../img/tracking-arrow.png");
        background-repeat: no-repeat;
        background-position: center;
        position: absolute;
        top: 0;
        right: 0;
        border: none;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;

        transition: all 0.2s ease 0s;
        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
    }

    /*  7.37. VEHICLE GALLERY FULL
    ------------------------------------------------------------------------- */
    .vehicle-gallery .col-md-3 {
        padding: 0;
        list-style: none;
    }

    .gallery-item-container {
        position: relative;
        overflow: hidden;
    }

    .gallery-item-container .gallery-item {
        width: 100%;
        height: 100%;
        overflow: hidden;
        cursor: pointer;
        z-index: 1;
    }

    .gallery-item-container .gallery-item img {
        width: 100%;
        height: auto;
        transition: all 2s ease-in-out 0s;
        -webkit-transition: all 2s ease-in-out 0s;
        -moz-transition: all 2s ease-in-out 0s;
        -o-transition: all 2s ease-in-out 0s;

        transform: scale(1);
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
    }

    .gallery-item-container .hover-mask-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        background-color: rgba(49, 57, 63, 0.5);

        transition: all 0.2s ease 0s;
        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
    }

    .gallery-item-container .gallery-item:hover .hover-mask-container {
        opacity: 1;
    }

    .gallery-item-container figcaption {
        position: absolute;
        width: 100%;
        top: 40px;
    }

    .gallery-item-container figcaption h1,
    .gallery-item-container figcaption h2,
    .gallery-item-container figcaption h3,
    .gallery-item-container figcaption h4,
    .gallery-item-container figcaption h5 {
        text-align: center;
        text-transform: uppercase;
        color: #fff;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 0;
    }

    .gallery-item-container figcaption h1:after,
    .gallery-item-container figcaption h2:after,
    .gallery-item-container figcaption h3:after,
    .gallery-item-container figcaption h4:after,
    .gallery-item-container figcaption h5:after {
        position: absolute;
        content: "";
        display: block;
        width: 40px;
        height: 3px;
        left: 50%;
        bottom: 0;
        margin-left: -20px;
    }

    .hover-mask-container .hover-zoom {
        position: absolute;
        bottom: 50%;
        left: 50%;

        width: 50px;
        height: 50px;

        margin-bottom: -25px;
        margin-left: -25px;

        transform: translate(0, 50%);
        -webkit-transform: translate(0, 50%);
        -moz-transform: translate(0, 50%);
        -ms-transform: translate(0, 50%);

        transition: all 0.2s ease 0s;
        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;

        border: 2px solid;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
    }

    .hover-mask-container .hover-zoom a {
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        color: #fff;
        font-size: 18px;

        width: 50px;
        height: 50px;
    }

    .gallery-item-container .gallery-item:hover .hover-zoom {
        transform: translate(0, 0);
        -webkit-transform: translate(0, 0);
        -moz-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
    }

    .gallery-item-container .gallery-item:hover img {
        transform: scale(1.3);
        -webkit-transform: scale(1.3);
        -moz-transform: scale(1.3);
        -ms-transform: scale(1.3);
    }

    /*  VEHICLE GALLERY GRID
    ------------------------------------------------------------------------- */
    .vehicle-gallery .col-md-4 {
        padding: 0;
        list-style: none;
    }

    .col-md-4 .gallery-item-container figcaption {
        top: 20px;
    }

    /* ==========================================================================
    8. HOME MINIMAL CUSTOM STYLES
    ========================================================================= */
    .page-content.fixed.centered .container {
        position: absolute;
        top: 50%;
        left: 50%;
    }

    .page-content.fixed.centered .container .row {
        max-width: 100%;
    }

    .page-content.fixed.bottom .row {
        margin-bottom: 0;
        max-width: 100%;
    }

    .page-content.fixed.bottom .container {
        position: absolute;
        bottom: 0;
        left: 50%;
    }

    /* ==========================================================================
    9. BLOG
    ========================================================================= */

    .blog-posts li {
        list-style: none;
    }

    .blog-posts .pagination {
        padding-bottom: 0;
        margin-bottom: 0;
        border-bottom: 0;
    }

    .blog-posts .pagination ul {
        float: right;
    }

    .blog-posts .pagination li {
        float: left;
        background-color: #f5f9fc;
        border: 1px solid #ddd;
        list-style: none;
        margin-right: 5px;
        width: 30px;
        height: 30px;

        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;

        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    .blog-posts .pagination li a {
        display: table-cell;
        width: 30px;
        height: 30px;
        vertical-align: middle;
        text-align: center;
    }

    .blog-posts .pagination li.active a,
    .blog-posts .pagination li:hover a {
        color: #fff;
    }

    .blog-post .post-body h3 {
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        -ms-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }

    /*
    BLOG LIST
    ------------------------------------------------------------------------- */
    .blog-posts.post-list .blog-post {
        padding-bottom: 40px;
        margin-bottom: 40px;
        border-bottom: 1px dotted #ddd;
    }

    .post-list .blog-post .post-date,
    .post-single .blog-post .post-date {
        width: 100px;
        float: left;
    }

    .post-list .blog-post .post-date .day,
    .post-single .blog-post .post-date .day {
        background-color: #fcfcfc;
        font-size: 36px;
        line-height: 36px;
        color: #333;
        font-weight: 800;
        text-align: center;
        padding: 20px 30px;
    }

    .post-list .blog-post .post-date .month,
    .post-single .blog-post .post-date .month {
        padding: 5px 10px;
        text-transform: uppercase;
        font-weight: 700;
        color: #fff;
        text-align: center;
    }

    .post-list .blog-post .post-body,
    .post-single .blog-post .post-body {
        padding-left: 130px;
    }

    .post-list .blog-post .post-body h3 {
        font-size: 18px;

        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    /*
    BLOG STANDARD
    ------------------------------------------------------------------------- */

    .post-media {
        width: 100%;
        overflow: hidden;
        z-index: 1;
        cursor: pointer;
        margin-bottom: 25px;
    }

    .post-media .post-img img {
        -webkit-transition: all 2s ease 0s;
        -moz-transition: all 2s ease 0s;
        -o-transition: all 2s ease 0s;
        -ms-transition: all 2s ease 0s;
        transition: all 2s ease 0s;
        opacity: 1;
    }

    .post-media .post-img:hover img {
        opacity: 0.7;

        transform: scale(1.15);
        -webkit-transform: scale(1.15);
        -moz-transform: scale(1.15);
        -ms-transform: scale(1.15);
    }

    /*
    BLOG MASONRY
    ------------------------------------------------------------------------- */
    .blog-posts.isotope.masonry {
        padding: 0;
    }

    .blog-posts.isotope.masonry li.blog-post.isotope-item {
        margin-bottom: 30px;
        width: 30%;
        margin-right: 15px;
        margin-left: 15px;
        background-color: #fff;
        float: left;
    }

    .blog-post.isotope-item .post-info {
        margin-bottom: 30px;
    }

    .blog-post.isotope-item .post-date {
        float: left;
        width: 50%;
    }

    .blog-post.isotope-item .post-date p {
        color: #565f66;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        padding: 10px 0 0 20px;
    }

    .blog-post.isotope-item .post-date i {
        padding-right: 3px;
    }

    .blog-post.isotope-item .post-info .post-category {
        width: 50%;
        float: right;
        position: relative;
    }

    .blog-post.isotope-item .post-info .post-category a {
        text-transform: uppercase;
        color: #eee;
        background-color: #565f66;
        padding: 7px 15px;
        position: absolute;
        right: 0;
    }

    .blog-post.isotope-item .post-body {
        padding: 0 20px;
    }

    .blog-post.isotope-item .post-media {
        margin-bottom: 15px;
    }


    /*
    BLOG SINGLE POST
    ------------------------------------------------------------------------- */

    /*  POST COMMENTS
    ------------------------------------------------------------------------- */
    .post-comments {
        width: 100%;
        float: left;
        margin-top: 30px;
    }
    .comments-li {
        float: left;
        margin-bottom: 30px;
        background: none;
        padding-left: 0;
        list-style: none;
    }
    .comments-li > li {
        float: left;
        width: 100%;
        margin-bottom: 30px;
        list-style: none;
        min-height: 75px;
    }
    .comments-li > li:last-child .comment {
        border: none;
        margin-bottom: 0;
    }
    .comments-li .comment {
        float: left;
        min-height: 60px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 30px;
    }
    .post-comments .comment + .children {
        margin-top: 30px;
    }
    .post-comments .children + .children {
        margin-top: 30px;
    }
    .comment .avatar {
        width: 70px;
        height: 70px;
        margin-right: 30px;
        float: left;
        border: 3px solid #eee;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        overflow: hidden;
    }
    .comment-meta li {
        font-style: italic;
        list-style: none;
    }
    .comment-meta .author {
        font-size: 15px;
        font-family: "Raleway", Arial, sans-serif;
        color: #252525;
        font-weight: 600;
        font-style: normal;
    }
    .comment .comment-body {
        margin-left: 100px;
        margin-top: 15px;
    }
    .comment .comment-reply-link {
        display: block;
        margin-top: 15px;
        background: url("../img/blog/reply.png") no-repeat 0 center;
        padding-left: 22px;
        cursor: pointer;
        text-transform: uppercase;
        font-weight: 600;
        float: right;
    }
    .post-comments .children {
        margin-left: 10%;
        float: left;
        padding: 0 0 0 20px;
        width: calc(90%);
    }
    .children li {
        list-style: none;
    }

    /*  COMMENT FORM
    ------------------------------------------------------------------------ */
    .comment-form {
        width: 100%;
        float: left;
    }

    .comment-form fieldset {
        width: 50%;
        float: right;
        padding-right: 30px;
        margin-bottom: 20px;
    }

    .comment-form fieldset:nth-child(2n + 1) {
        padding-right: 0;
    }

    .comment-form .wpcf7-message {
        width: 100%;
    }

    .comment-form label {
        width: 100%;
        margin-bottom: 5px;
        display: block;
    }

    .comment-reply {
        padding: 13px 40px;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        border: none;
        border-radius: 25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        float: right;
        color: #fff;

        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    /* ==========================================================================
    10. LOCATIONS PAGE
    ========================================================================= */
    .page-title-map.page-title-negative-top #map {
        height: 800px;
        margin-top: -186px;
    }

    .locations-li > li {
        list-style: none;
        margin-bottom: 30px;
    }

    .locations-li > li h3 {
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .locations-li > li .fa-ul {
        margin-left: 20px;
    }

    /* ==========================================================================
    11. CONTACT
    ========================================================================= */
    .wpcf7 fieldset {
        margin-bottom: 15px;
    }

    .wpcf7 label {
        width: 100%;
        padding-bottom: 10px;
    }

    .wpcf7-text,
    .wpcf7-select,
    .wpcf7-textarea {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        width: 100%;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        padding: 8px 15px;
    }

    .wpcf7 .wpcf7-submit {
        padding: 13px 40px;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        border: none;
        border-radius: 25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        float: right;
        color: #fff;

        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    #map {
        width: 100%;
        height: 450px;
        margin-bottom: 20px;
    }

    #map img {
        max-width: none;
    }

    /* ==========================================================================
    12. WIDGETS
    ========================================================================= */
    .aside-widgets > li {
        list-style: none;
    }

    .widget {
        display: block;
        width: 100%;
        margin-bottom: 45px;
    }

    .widget .title h3 {
        font-size: 15px;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .widget ul > li {
        background-image: url("../img/arrow.png");
        background-repeat: no-repeat;
        background-position: 0 center;
        list-style: none;
        padding-left: 15px;
    }

    .widget li a {
        padding-top: 5px;
        display: block;
    }

    /*
   ASIDE SEARCH WIDGET
   -------------------------------------------------------------------------- */
    .widget_search form {
        position: relative;
    }
    .widget_search .a_search {
        background-color: #fff;
        border: 1px solid #ddd;
        width: 100%;
        display: block;
        color: #777;
        font-style: italic;
        left: 0;
        top: 0;
        padding: 10px 60px 10px 10px;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .widget_search .search-submit {
        background-image: url("../img/search.png");
        background-position: center;
        background-repeat: no-repeat;
        width: 40px;
        height: 100%;
        border: none;
        text-indent: -9999px;
        position: absolute;
        cursor: pointer;
        right: 0;
        top: 0;
        min-height: 40px;
        border-radius: 0 3px 3px 0;
        -webkit-border-radius: 0 3px 3px 0;
        -moz-border-radius: 0 3px 3px 0;
    }

    /*
    LATEST POSTS WIDGET 01
    ------------------------------------------------------------------------- */
    .rpw_posts_widget ul > li {
        position: relative;
        background: none;
        background-image: none !important;
        padding-left: 18px;
        border-bottom: 1px dotted #ddd;
        padding-bottom: 8px;
        margin-bottom: 8px;
    }

    .rpw_posts_widget ul > li::before {
        position: absolute;
        display: block;
        content: "\f073";
        font-family: "FontAwesome";
        font-size: 11px;
        top: 5px;
        left: 0;
    }

    .rpw_posts_widget ul > li:last-child {
        margin-bottom: 0;
        border-bottom: none;
        padding-bottom: 0;
    }

    .rpw_posts_widget li h4 {
        font-size: 13px;
        line-height: 20px;
        font-weight: normal;
        margin-bottom: 0;

        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    /*  NAV MENU WIDGET
    ------------------------------------------------------------------------- */
    .widget_nav_menu ul li {
        background-position: right center;
        padding-left: 0;
        border-bottom: 1px dotted #ddd;
    }

    .widget_nav_menu ul li:last-child {
        border-bottom: none;
    }

    /*
    NEWSLETTER WIDGET
    ------------------------------------------------------------------------- */
    .widget_newsletterwidget .newsletter {
        width: 100%;
        float: left;
        position: relative;
    }

    .widget_newsletterwidget .newsletter .email {
        padding: 5px 60px 5px 15px;
        font-style: italic;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        height: 40px;
        border: 1px solid #ddd;
        min-width: 100%;
    }

    .footer-dark .footer-widget-container .newsletter .email {
        color: #bcc0c4;
        background-color: #565f66;
        border: none;
    }

    .newsletter .submit {
        width: 40px;
        height: 40px;
        background-image: url("../img/subscribe.png");
        background-repeat: no-repeat;
        background-position: center;
        position: absolute;
        top: 0;
        right: 0;
        border: none;

        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;

        -webkit-transition: all 0.2s ease 0s;
        -moz-transition: all 0.2s ease 0s;
        -o-transition: all 0.2s ease 0s;
        -ms-transition: all 0.2s ease 0s;
        transition: all 0.2s ease 0s;
    }

    /*  NEWS CAROUSEL
    ------------------------------------------------------------------------- */
    .news-carousel-container .icon-title {
        float: left;
        border-right: 3px solid #1f2830;
        padding-right: 20px;
        margin-right: 20px;
        padding-top: 25px;
        padding-left: 15px;
        min-height: 80px;
    }

    .news-carousel-container .icon-title i,
    .news-carousel-container .icon-title h3 {
        float: left;
        font-size: 24px;
    }

    .news-carousel-container .icon-title i {
        padding-right: 10px;
    }

    .news-carousel-container .owl-item {
        padding-top: 5px;
    }

    .news-carousel-container .owl-item h4 {
        margin-bottom: 5px;
    }

    .news-carousel-container .owl-item span {
        text-transform: uppercase;
    }

    *[class^="col-"].custom-bkg .news-carousel-container {
        margin: -15px;
    }

   /*
    SCROLL UP
    ------------------------------------------------------------------------- */
    .scroll-up {
        width: 40px;
        height: 40px;
        position: fixed;
        bottom: 70px;
        right: 30px;
        display: none;
        text-indent: -9999px;
        background-image: url("../img/to-top.png");
        background-repeat: no-repeat;
        background-color: #208c93;
        z-index: 100;
        border-radius: 4px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
    }

    .logo {
        width: 200px;
        padding-bottom: 5px;
    }

    .padding-right-5p {
        padding-right: 5%;
    }

    .count-style {
        font-weight: bold;
        font-size: 35px;
        color: #208c93 !important;
    }

    .solid-color .navbar-default .navbar-nav > li > a {
        color: #053878;
        border-bottom: 3px solid transparent;
    }

    .solid-color .navbar-default .navbar-nav > li > a:hover,
    .solid-color .navbar-default .navbar-nav > li > a:focus {
        color: #208c93 !important;
        border-bottom: 3px solid transparent;
    }

    .float-right {
        float: right !important;
    }

    .float-left {
        float: left;
    }

    .clearfix > li > a > i,
    .clearfix > li > i {
        font-size: 20px;
        transition: 500ms;
    }

    .clearfix > li > a > i:hover {
        color: white !important;
        transition: 500ms;
    }

    .no-padding {
        padding: 0px !important;
    }

    .center-bottom-text {
        padding-top: 5px;
        font-size: 19px;
    }

    .footer-2nd {
        padding-left: 7%;
    }
    .footer-3rd {
        padding-left: 2%;
    }

    .espace-client {
        background-color: #208c93;
        color: white !important;
    }

    .solid-color .navbar-default .navbar-nav > li > .espace-client:hover,
    .solid-color .navbar-default .navbar-nav > li > .espace-client:focus {
        background-color: #208b93de;
        color: #053878 !important;
    }

    .hidden_dev {
        display: none;
    }

    .block_dev {
        display: block;
    }

    .text-under-i {
        font-size: 20px;
        color: #4e7cbe;
        font-weight: bold;
        padding-left: 27px;
    }


    .fa-ul-iso {
        padding-left: 55px !important;
    }

    }
</style>

        <script>
            /* <![CDATA[ */
            jQuery(document).ready(function ($) {
                'use strict';

                function equalHeight() {
                    $('.page-content.column-img-bkg *[class*="custom-col-padding"]').each(function () {
                        var maxHeight = $(this).outerHeight();
                        $('.page-content.column-img-bkg *[class*="img-bkg"]').height(maxHeight);
                    });
                };

                $(document).ready(equalHeight);
                $(window).resize(equalHeight);

                // MASTER SLIDER START
                var slider = new MasterSlider();
                slider.setup('masterslider', {
                    width: 1140, // slider standard width
                    height: 854, // slider standard height
                    space: 0,
                    speed: 50,
                    layout: "fullwidth",
                    centerControls: false,
                    loop: true,
                    autoplay: true
                    // more slider options goes here...
                    // check slider options section in documentation for more options.
                });
                // adds Arrows navigation control to the slider.
                slider.control('arrows');

                // CLIENTS CAROUSEL START
                $('#client-carousel').owlCarousel({
                    items: 6,
                    loop: true,
                    margin: 30,
                    responsiveClass: true,
                    mouseDrag: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 2,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true
                        },
                        600: {
                            items: 3,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true
                        },
                        1000: {
                            items: 6,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true,
                            mouseDrag: true
                        }
                    }
                });

                // TESTIMONIAL CAROUSELS START
                $('#testimonial-carousel').owlCarousel({
                    items: 1,
                    loop: true,
                    margin: 30,
                    responsiveClass: true,
                    mouseDrag: true,
                    dots: false,
                    autoheight: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true,
                            autoHeight: true
                        },
                        600: {
                            items: 1,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true,
                            autoHeight: true
                        },
                        1000: {
                            items: 1,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true,
                            mouseDrag: true,
                            autoHeight: true
                        }
                    }
                });
            });
            /* ]]> */
        </script>










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
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
            <script>




    @include('frontend.newsletters.footer-subscribe')
@endsection

