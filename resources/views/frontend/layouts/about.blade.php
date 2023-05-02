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

                    <div class="row" style="padding-left:10px;padding-top:80px">
                  
                        <div class="galery-c col-lg-6 col-md-6 col-sm-11 mt-4">

                                    <div class="custom-heading">
                                        
                                        <h3 style="font-weight:700;color:#000000">@lang('footer.who_we_are')</h3>
                                        <br>
                                    </div><!-- .custom-heading end -->

                                    <p>
                                        @lang('qhse.introduction_part1')
                                    </p>
                                    <br>
                                    <p>
                                        @lang('qhse.introduction_part2')
                                    </p>
                      
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
                             
                                <br>
                            </div>
                        </div>
                    </div>
                         


              
                    <div class="row" style="padding-left:10px;padding-top:20px">
                  
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
                            
                                <br>
                            </div>
                        <br>
                      </div>

                        <div class="galery-c col-lg-6 col-md-6 col-sm-11 mt-4">
                                    <div class="custom-heading">
                                        
                                        <h4 style="font-weight:700;color:#000000">Algeria INVEST® : @lang('home.home_slide_text1')</h4>
                                        <br>
                                    </div><!-- .custom-heading end -->

                                    <p>
                                        @lang('gallery.ai_presentation_1')
                                    </p>
                                    <br>
                                    <p>
                                        @lang('gallery.ai_presentation_2')
                                    </p>
                                    <br>
                                    <p>
                                        @lang('gallery.ai_presentation_3')
                                    </p>
                                    <br>
                        </div>

                    </div>




                    <section id="about" class="ftco-section p-0">
                        <div class="container">
                            <div class="row justify-content-center pb-5">
                                <div class="col-lg-9 heading-section text-center ftco-animate fadeInUp ftco-animated">
                                    <h3 class="mb-4" style="font-weight:700;color:#000000">les <span style="color:#4e7cbe">valeurs</span> fondatrices de notre culture</h3>
                                    <p style="text-align:justify;" style="font-size:0.875rem">
                                        Une culture d'entreprise basée sur un esprit d’équipe solide.
                                        nous mettons l’accent sur la nécessité de repousser continuellement les frontières de notre expertise et notre maitrise de la technologie 
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="services-2 text-center">
                                        <div class="icon">
                                        <img src="{{ asset('css/images/web3.png')}}" class="img-fluid globe" style="color:white!important;width:120px"></a>
                                        </div>
                                        <br>
                                        <div class="text">
                                            <h3 style="font-weight:700;color:#000000">Performances</h3>
                                            <br>
                                            <p style="font-size:0.875rem"> Rendement optimal afin de demeurer le partenaire de choix </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="https://www.i2b-dz.com/images/hero-img.png" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-4">
                                    <div class="services-2 text-center">
                                        <div class="icon">
                                        <img src="{{ asset('css/images/secure3.png')}}"  class="img-fluid globe" style="color:white!important;width:120px"></a>
                                        </div>
                                        <br>
                                        <div class="text">
                                            <h3 style="font-weight:700;color:#000000">Précision et fiabilité</h3>
                                            <br>
                                            <p style="font-size:0.875rem">Données exactes et informations crédibles sur toutes nos publications </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
	                 </section>
    
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
