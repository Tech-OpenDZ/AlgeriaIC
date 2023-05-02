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
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="discover-algeria__left">
                            <ol class="breadcrumb-area">
                            <!--<li class="breadcrumb-elements"><a href="{{ route('customer-home')}}">@lang('our_services.home_title')</a></li>
								<li class="active">@lang('our_services.services_title')</li> -->
                            </ol>
                        </div>
                    </div>
                </div>


                <div class="container2">
                    <div class="row" style="background-color: #f9b634;width:1140px;margin-left: -8px;">
                        <div class="gal-img col-md-12" style="height:180px;padding-top:70px">
                            <div class="section_title text-center" style="padding-top:7px">
                                <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:35px">@lang('navbar.discover')</h4>
                                <br>

                            </div>


                        </div>
                    </div>

                    <div class="row" style="padding-top:20px">
                        <!-- <div class="section_title text-center">
                            <p style="color:#000000">@lang('home.services_sub_title')</p>
                        </div> -->
                        <!--START SINGLE SERVICE AREA-->



                        <div class="galery-c col-lg-4 col-md-6 col-sm-6 mt-4">


                            <div class="single_service" style="background-color: #FFFFFF; box-shadow: 10px 10px 10px rgb(0 0 0 / 10%)">


                                <div class="single_service-body">
                                    <div class="video" style="width:100%;box-shadow: 2px 2px 3px rgb(0 0 0 / 20%)">
                                        <figure>
                                            <a class="popup-youtube iteme" href="https://www.youtube.com/watch?v=yR7fRmVJYBI">
                                            <i class="icon-youtube11"style="font-size:80px; color:#dc3545;position: absolute;padding-top: 60px;padding-left: 135px;"></i>
                                            <img class="videoThumb" src="http://i1.ytimg.com/vi/yR7fRmVJYBI/mqdefault.jpg" style="width:100%">
                                        </a>
                                        </figure>
                                        <div class="videoTitle" style="text-align:center; line-height: 25px; background-color:#f0f0f0;width:100%;font-family: 'Muli', sans-serif;font-size: 0.875rem;word-wrap: break-word;color: #0F2333;font-weight: 400">Algeria INVEST® propose un accès exclusif aux investisseurs nationaux et internationaux ainsi qu’un accompagnement dans tous les schémas d’investissement.</div>
                                    </div>

                                </div>
                            </div>
                            <br>

                        </div>

                        <br>

                        <div class="galery-c col-lg-4 col-md-6 col-sm-6 mt-4">
                            <div class="single_service" style="background-color: #FFFFFF; box-shadow: 10px 10px 10px rgb(0 0 0 / 10%)">


                                <div class="single_service-body">
                                    <article class="video" style="width:100%;box-shadow: 2px 2px 3px rgb(0 0 0 / 20%)">
                                        <figure>
                                            <a class="popup-youtube iteme" href="https://www.youtube.com/watch?v=k7xUH5AG11s">
                                            <i class="icon-youtube11"style="font-size:80px; color:#dc3545;position: absolute;padding-top: 60px;padding-left: 135px;"></i>
                                            <img class="videoThumb" src="http://i1.ytimg.com/vi/k7xUH5AG11s/mqdefault.jpg" style="width:100%">
                                        </a>
                                        </figure>
                                        <div class="videoTitle" style="text-align:center; line-height: 25px ; background-color:#f0f0f0;width:100%;font-family: 'Muli', sans-serif;font-size: 0.875rem;word-wrap: break-word;color: #0F2333;font-weight: 400">   La SPA i2b, intégrateur de solutions informatiques , est une société innovante qui exerce dans le secteur de la technologie de l’information et celui des télécommunications depuis 2002. </div>
                                    </article>



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



<style>
    .galery-c{
        margin-left: 125px;
    }
</style>








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
