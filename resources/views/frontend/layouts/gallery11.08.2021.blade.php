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

    <div style="background-color: #fafafa; height:50px">

    </div>

    <div style="background-color: #fafafa; width:100%">
        <div class="container" style="background-color: #fafafa">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                            <li class="breadcrumb-elements"><a href="{{ route('customer-home')}}">Accueil</a></li>
                            <li class="active">Nous Découvrir</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="background-color: #fafafa">
        <div class="col-md-12">
            <div class="section_title text-center">
                <h2>Nous Découvrir</h2>
                <div class="brand_border">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    <i class="fas fa-handshake"></i>
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </div>
                <p style="font-family: 'Muli', sans-serif;color: #333333;font-size: 14px;line-height: 25px;font-weight: 600;"><center> A travers son réseau d’experts conseils, Algeria INVEST met ses compétences au service des investisseurs en leur assurant, dans des domaines d’activités variés, un </br> accompagnement adapté</cneter></p>
            </div>
        </div>
    </div>
    <div class="row" style="background-color:#fafafa">
        <div class="video-gallery col-md-12 col-sm-12" style="align:center">
            <div class="video-gallery" style="height:500px">

                <div class="video" style="width:40%;height:260px;box-shadow: 2px 2px 3px rgb(0 0 0 / 20%)">
                    <figure>
                        <a class="popup-youtube iteme" href="https://www.youtube.com/watch?v=yR7fRmVJYBI"><img class="videoThumb" src="http://i1.ytimg.com/vi/yR7fRmVJYBI/mqdefault.jpg" style="width:100%"></a>
                    </figure>
                    <div class="videoTitle" style="text-align:center; line-height: 25px; background-color:#f0f0f0;width:100%;font-family: 'Muli', sans-serif;font-size: 0.875rem;word-wrap: break-word;color: #0F2333;font-weight: 400">Algeria INVEST® propose un accès exclusif aux investisseurs nationaux et internationaux ainsi qu’un accompagnement dans tous les schémas d’investissement.</div>
                </div>



                <article class="video" style="width:40%;height:260px;box-shadow: 2px 2px 3px rgb(0 0 0 / 20%)">
                    <figure>
                        <a class="popup-youtube iteme" href="https://www.youtube.com/watch?v=k7xUH5AG11s"><img class="videoThumb" src="http://i1.ytimg.com/vi/k7xUH5AG11s/mqdefault.jpg" style="width:100%"></a>
                    </figure>
                    <div class="videoTitle" style="text-align:center; line-height: 25px ; background-color:#f0f0f0;width:100%;font-family: 'Muli', sans-serif;font-size: 0.875rem;word-wrap: break-word;color: #0F2333;font-weight: 400">   La SPA i2b, intégrateur de solutions informatiques , est une société innovante qui exerce dans le secteur de la technologie de l’information et celui des télécommunications depuis 2002. </div>
                </article>


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


@endsection

@section('scripts')
    <!-- Normal JS -->
    <!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/browser-class.js"></script>
    <!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/front-end/main.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <!-- Minified Combine JS -->
    <!-- <script src="js/bundle.min.js"></script> -->
@endsection





