@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('news.economicNews') | @lang('news.placeName')</title>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />




@endsection

@section('content')



<div class="overlay col-md-12 col-lg-12 col-ms-12 col-xs-12">
</div>
<div class="text">
    <br><br><br>


    <h1>Add a contribution</h1>
    <br>

    <br>
    <br>
    <h2>Page Currently Under Construction</h2>
</div>
<br>
<br>
<div class="image">
    <img height="130" width="190" src="https://i.imgur.com/fBnjQ1i.png" alt="Big Boat">
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br>


<style>
    body
    {
        background-image:url('https://i.imgur.com/SUHmERE.png');
       /*background-repeat:repeat; */
    }
    h1 {
        text-shadow: 1px 1px 1px #606060;
        opacity:0.95;
        margin-top:15px;
        font-size:35px;
        color:#202020;
        font-family:Verdana, Geneva, sans-serif;
    }
    h2 {
        text-shadow: 1px 1px 1px #606060;
        opacity:0.95;
        margin-top:-20px;
        font-size:25px;
        color:#202020;
        font-family:Verdana, Geneva, sans-serif;
    }
    div.overlay{
        width:100%;
        /*position:absolute; */
        top:0; right:0; bottom:0;
        background-color:black;
        opacity:0.4;
        filter:alpha(opacity=40);
    }
    div.text{
        text-align:center;
    }
    div.image{
        width:100%;
        text-align:center;
        opacity:0.60;
        box-shadow:2px 2px 2px #606060;
    }

    </style>

</div>
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