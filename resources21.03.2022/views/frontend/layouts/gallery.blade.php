@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>

@endsection

@section('content')



    <div class="business-directory-main">
        <div class="discover-algeria">



                <div class="container">
                    <div class="row"  style=" left:0;right:0 ;max-width: 100%;margin-left: 0px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
                        <div class="gal-img col-md-12" style="height:180px; width:100%;padding-top:70px">
                            <div class="section_title text-center" style="padding-top:7px">
                                <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:35px">@lang('navbar.discover')</h4>
                                <br>

                            </div>


                        </div>
                    </div>

                    <div class="row" style=" margin-right:0px;margin-left:0px; background-color:#f5f5f5;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black">
                    <!-- <div class="section_title text-center">
                            <p style="color:#000000">@lang('home.services_sub_title')</p>
                        </div> -->
                        <!--START SINGLE SERVICE AREA-->



                        <div class="galery-c col-lg-6 col-md-6 col-sm-11 mt-4">


                            <div class="single_service " style="background-color: #FFFFFF; box-shadow: 10px 10px 10px rgb(0 0 0 / 10%)">


                                <div class="single_service-body" style="box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);width:100%">
                                    <div class="video" style="width:100%;box-shadow: 2px 2px 3px rgb(0 0 0 / 20%)">
                                        <figure>
                                            <a class="popup-youtube iteme" href="https://www.youtube.com/watch?v=yR7fRmVJYBI">
                                                <i class="icon-youtube11"style="font-size:80px; color:#dc3545;position: absolute;padding-top:auto ; padding-left:auto;"></i>
                                                <img class="videoThumb" src="http://i1.ytimg.com/vi/yR7fRmVJYBI/mqdefault.jpg" style="width:100%">
                                            </a>
                                        </figure>
                                        <div class="videoTitle" style="text-align:center; line-height: 25px ;font-style: italic;font-weight: bold; background-color:#f0f0f0;width:100%;font-family: 'Muli', sans-serif;font-size: 0.875rem;word-wrap: break-word;color: #0F2333;font-weight: 400">@lang('gallery.head_1_title')</div>
                                        <div class="videoTitle" style="text-align:center; line-height: 25px; background-color:#f0f0f0;width:100%;font-family: 'Muli', sans-serif;font-size: 0.875rem;word-wrap: break-word;color: #0F2333;font-weight: 400">@lang('gallery.video_1_title')</div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="galery-c col-lg-6 col-md-6 col-sm-11 mt-4">




                            <div class="single_service" style="background-color: #FFFFFF; box-shadow: 10px 10px 10px rgb(0 0 0 / 10%)">


                                <div class="single_service-body" style="box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);width:100%">
                                    <article class="video" style="width:100%;box-shadow: 2px 2px 3px rgb(0 0 0 / 20%)">
                                        <figure>
                                            <a class="popup-youtube iteme" href="https://www.youtube.com/watch?v=k7xUH5AG11s">
                                                <i class="icon-youtube11"style="font-size:80px; color:#dc3545;position: absolute;padding-top:auto ; padding-left:auto;"></i>
                                                <img class="videoThumb" src="http://i1.ytimg.com/vi/k7xUH5AG11s/mqdefault.jpg" style="width:100%">
                                            </a>
                                        </figure>
                                        <div class="videoTitle" style="text-align:center; line-height: 25px ;font-style: italic; ;font-weight: bold; background-color:#f0f0f0;width:100%;font-family: 'Muli', sans-serif;font-size: 0.875rem;word-wrap: break-word;color: #0F2333;font-weight: 400">@lang('gallery.head_2_title')</div>
                                        <div class="videoTitle" style="text-align:center; line-height: 25px ; background-color:#f0f0f0;width:100%;font-family: 'Muli', sans-serif;font-size: 0.875rem;word-wrap: break-word;color: #0F2333;font-weight: 400">@lang('gallery.video_2_title')</div>
                                    </article>




                                </div>
                            </div>
                            <br>
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
