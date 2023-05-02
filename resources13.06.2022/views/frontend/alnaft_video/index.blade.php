@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">


    <meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/new_style.css')}}">
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>

@endsection

@section('content')



    <div class="business-directory-main">
        <div class="discover-algeria">



                <div class="container">
                    <div class="row"  style=" left:0;right:0 ;max-width: 100%;margin-left: 0px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
                        <div class="gal-img col-md-12" style="height:180px; width:100%;padding-top:70px">
                            <div class="section_title text-center" style="padding-top:7px">
                                <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:35px">Video ALNAFT</h4>
                                <br>

                            </div>


                        </div>
                    </div>

                    <div class="row" style=" margin-right:0px;margin-left:0px; background-color:#f5f5f5;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black">
                    <!-- <div class="section_title text-center">
                            <p style="color:#000000">@lang('home.services_sub_title')</p>
                        </div> -->
                        <!--START SINGLE SERVICE AREA-->





                        <center><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <br>

                            <div class="agency-video-wrapper">
                                <div class="box-hover-effect tm-sc-video-popup tm-sc-video-popup-button-over-image mb-30">
                                    <div class="effect-wrapper">
                                        <div class="thumb">
                                            <img class="" src="{{asset('storage/uploads/video_naft/naft_logo.PNG')}}"  style="width:60%;height:60%;border-radius:10px" alt="images">
                                        </div>
                                        <a class="popup-youtube iteme" href="{{asset('storage/uploads/video_naft/ALNAFT French version.mp4')}}"> <div class="animated-css-play-button">  <span class="play-icon"><i class="fa fa-play"></i></span></div></a>

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
                                <div class="about-box style3" style="width:50%;height:30%">
                                    <div class="help-details" style="border-left: 5px solid #0795fe;">
                                        <div class="icon"><img src="{{asset('storage/uploads/logos/i2b_logo.png')}}" style="height:35px;width:35px"></div>
                                        <div class="content" >
                                              <h5 class="titles3">Video ALNAFT</h5>
                                        </div>

                                    </div>
                                </div>
                                <br>
                            </div> </center>




                        </div>







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
