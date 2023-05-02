@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/new_style.css')}}">


@endsection

@section('content')



    <div class="business-directory-main">
        <div class="discover-algeria" style="padding-top:0px;padding-bottom:0px;background-color:#ffffff!important">



                 <div class="container_contact" style="max-width:100%!important">
                    <div class="row" style="background-color:#ffffff;margin-left: -15px;margin-right: -15px">
                          <div class="about_heading" style="height:400px; width:100%;padding-top:70px">
                            <div class="section_title text-center" style="padding-top:125px">
                                <h2 class="subtitle align-content-center justify-content-center" style="color:#FFFFFF;font-weight:bold;">@lang('navbar.discover')</h2>
                                <br>

                            </div>


                        </div>
                    </div>
                <div class="page-content" >
                   <div class="container" style="max-width:1170px;background-color:transparent">

                    <div class="row" style="padding-left:10px;padding-top: 80px;padding-bottom: 80px;">
                  



                        <div class="galery-c col-lg-6 col-md-6 col-sm-11 mt-4">


                      


                        <div class="agency-video-wrapper">
                                <div class="box-hover-effect tm-sc-video-popup tm-sc-video-popup-button-over-image mb-30">
                                    <div class="effect-wrapper">
                                        <div class="thumb" style="width:170%">
                                            <img class="" src="http://i1.ytimg.com/vi/yR7fRmVJYBI/mqdefault.jpg"  style="width:60%;height:60%;border-radius:10px" alt="images">
                                        </div>
                                        <a class="popup-youtube iteme" href="https://www.youtube.com/watch?v=yR7fRmVJYBI"> <div class="animated-css-play-button">  <span class="play-icon"><i class="fa fa-play"></i></span></div></a>

                                        <script type="text/javascript">
                                            /* $(window).on('load', function() {
                                                 $('#myModal').modal('show');
                                             });*/

                                            $('.modal').on('hide.bs.modal', function() {
                                                var memory = $(this).html();
                                                $(this).html(memory);
                                            });
                                        </script>
                                        <!--<a class="hover-link" data-lightbox-gallery="youtube-video" href="https://www.youtube.com/watch?v=yR7fRmVJYBI" title=""></a> -->
                                    </div>
                                </div>
                                <div class="about-box style3" style="height:30%">
                                    <div class="help-details" style="border-left: 5px solid #0795fe;padding-left: 10px;padding-top: 10px;padding-right: 10px">
                                       
                                        <div class="content" >
                                              <h5 class="titles3" style="font-size:0.875rem;font-weight: 600"> @lang('gallery.head_1_title')</h5>
                                              <br>
                                              <h5 class="titles3" style="font-size:0.875rem"> @lang('gallery.video_1_title')</h5>
                                        </div>

                                    </div>
                                </div>
                                <br>
                            </div>

                        <br>

                        </div>
                        <div class="galery-c col-lg-6 col-md-6 col-sm-11 mt-4">

                            <div class="agency-video-wrapper">
                                <div class="box-hover-effect tm-sc-video-popup tm-sc-video-popup-button-over-image mb-30">
                                    <div class="effect-wrapper">
                                        <div class="thumb" style="width:170%">
                                            <img class="" src="http://i1.ytimg.com/vi/k7xUH5AG11s/mqdefault.jpg"  style="width:60%;height:60%;border-radius:10px" alt="images">
                                        </div>
                                        <a class="popup-youtube iteme" href="https://www.youtube.com/watch?v=k7xUH5AG11s"> <div class="animated-css-play-button">  <span class="play-icon"><i class="fa fa-play"></i></span></div></a>

                                        <script type="text/javascript">
                                            /* $(window).on('load', function() {
                                                 $('#myModal').modal('show');
                                             });*/

                                            $('.modal').on('hide.bs.modal', function() {
                                                var memory = $(this).html();
                                                $(this).html(memory);
                                            });
                                        </script>
                                        <!--<a class="hover-link" data-lightbox-gallery="youtube-video" href="https://www.youtube.com/watch?v=yR7fRmVJYBI" title=""></a> -->
                                    </div>
                                </div>
                                <div class="about-box style3" style="height:30%">
                                    <div class="help-details" style="border-left: 5px solid #0795fe;padding-left: 10px;padding-top: 10px;padding-right: 10px">
                                       
                                        <div class="content" >
                                              <h5 class="titles3" style="font-size:0.875rem;font-weight: 600">@lang('gallery.head_2_title')</h5>
                                              <br>
                                              <h5 class="titles3" style="font-size:0.875rem">@lang('gallery.video_2_title')</h5>
                                        </div>

                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                            <br>







                    </div>

                </div>


            </div>

        </div>

            <script>
                $(document).ready(function() {
                    $('.popup-youtube').magnificPopup({
                        type: 'iframe'
                    });
                });

            </script>











            <!-- services-section-end -->



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
                <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
                <!-- Please keep your own scripts above main.js -->
                <script src="{{ asset('js/front-end/main.js') }}"></script>
@endsection
