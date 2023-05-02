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
                          <div class="presse_heading" style="height:400px; width:100%;padding-top:70px">
                            <div class="section_title text-center" style="padding-top:125px">
                                <h2 class="subtitle align-content-center justify-content-center" style="color:#FFFFFF;font-weight:bold;">@lang('navbar.presse')</h2>
                                <br>

                            </div>


                        </div>
                    </div>
                <div class="page-content" >
                   <div class="container" style="max-width:1170px;background-color:transparent">

                <div class="row" style="padding-left:10px;padding-top: 80px;padding-bottom: 80px;">
                  
                         <!--         Debout de boucle                     -->

                @foreach($press as $data)
                    <div class="galery-c col-lg-6 col-md-6 col-sm-11 mt-4">
                         <div class="agency-video-wrapper">
                                <div class="box-hover-effect tm-sc-video-popup tm-sc-video-popup-button-over-image mb-30">
                                    <div class="effect-wrapper">
                                        <div class="thumb" style="width:170%">
                                            <img class="" src="http://i1.ytimg.com/vi/<?php echo $data->img_link ?>/mqdefault.jpg"  style="width:60%;height:60%;border-radius:10px" alt="images">
                                        </div>
                                        <a class="popup-youtube iteme" href="<?php echo $data->press_link ?>"> <div class="animated-css-play-button">  <span class="play-icon"><i class="fa fa-play"></i></span></div></a>

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
                                              <h5 class="titles3" style="font-size:0.875rem;font-weight: 800"> {{$data->localeAll[0]->name}}<h5>
                                              <br>
                                              <h5 class="titles3" style="font-size:0.875rem;font-weight: 600"> {{$data->localeAll[0]->function}}</h5>
                                              <br>
                                              <h5 class="titles3" style="font-size:0.875rem"> {{$data->publication_date}}</h5>
                                        </div>

                                    </div>
                                </div>
                                <br>
                            </div>

                        <br>

                    </div>
                @endforeach  
                    <!--             Fin de boucle               -->
                            <br>



                         
                                    
                               <div class="col-md-12 col-lg-12 col-sm-12">   
                                <center>   <div class="next-prev-controls-slide mt-4">
                                                <span>{{ $press->links() }}</span>  
                                            </div></center>    
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

            <style> 
                .mb-30 {
                        margin-bottom: 5px;
                    }

                    @media only screen and (min-width: 990px) {
                        .next-prev-controls-slide{
                            padding-left:300px!important;  
                        }
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

