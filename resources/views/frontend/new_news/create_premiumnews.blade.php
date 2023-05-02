@extends('frontend.layouts.master')
@section('head')

<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> Ajouter une contribution </title>
<style>
    input[type="file"] {
    display: block;
    }
    .imageThumb {
    min-height: 100px;
    max-height: 100px;
    max-width: 100px;
    padding: 5px;
    cursor: pointer;


    }
    .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
    border:none;
    }
    .remove {
    display: block;
    background: white;
    color: black;
    text-align: center;
    cursor: pointer;
    }
</style>
<style>
    #upload-file-info {
        font-size: 0.563rem;
    }

    #upload-file-info_image {
        font-size: 0.563rem;
    }

    #upload-file-info_documents {
        font-size: 0.563rem;
    }

    #upload-file-info_presentation_file {
        font-size: 0.563rem;
    }
</style>
@endsection
@section('content')
<section class="business-opportunities">
     <div class="discover-algeria" style="padding-top:0px;padding-bottom:0px;background-color:#ffffff!important">
         <div class="container_contact" style="max-width:100%!important">
            <div class="row" class="row" style="background-color:#ffffff;margin-left: -15px;margin-right: -15px">
                <div class="expert_heading" style="height:400px; width:100%;padding-top:70px">

                    <div class="section_title" style="padding-top:125px;">
                        <h2 class="subtitle align-content-center justify-content-center" style="color:#FFFFFF;font-weight:bold"> @lang('news.add_contribution') </h2>
                    </div>

                   <!-- <div class="section_title" style="width:40%;float:right;padding-top:59px">
                        <p class="business-content" style="color:#FFFFFF">@lang('business_opportunity_listing.business_content')</p>
                    </div> -->

                </div>
            </div>
       <div class="page-content" >
           <div class="container" style="max-width:1170px;background-color:transparent">
            <div class="row" style="padding-top: 80px;padding-bottom: 80px;">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                        <!--<li class="breadcrumb-elements"><a href="#">@lang('business_opportunity.breadcrumb_home')</a></li>
                            <li class="active">@lang('business_opportunity.breadcrumb_add_business_opportunities')</li> -->
                        </ol>
                        <!--
                        <div class="business-banner" style="width:103%">
                            <a href="#"><img src="{{ asset('images/business-banner.png') }}" alt="business-banner" class="img-fluid"></a>
                        </div> -->


                        <div class="slider-area table-carousel">


                            <!-- <img src="images/slider-one.png" alt="slider-one" class="img-fluid"> -->
                            <!-- <div class="business-titles mt-3 mb-3">
                                <h1 class="main-heading mb-3">@lang('business_opportunity.request_form')</h1>

                            </div> -->
                            <div class="business-table business-table-slide-two">


                                <div class=" mt-3">
                                <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
                                <!--<div class="card-header"> 
                                    <div class="card-title" style="width: 100%;"> 
                                        <h3 class="card-label pull-left"  style="width: 100%;">Add News</h3>
                                        <div class="pull-right"> 
                                           <a class="btn btn-primary" href="{{ route('manage-news.index') }}">Back</a> 
                                         </div> 
                                    </div>
                                   
                                </div> -->
                                <div class="card-body" style="margin-right:0px;margin-left:0px;border-right: 5px solid #0795fe;border-top-left-radius:20px;border-bottom-left-radius:20px;color:#000000;text-transform: bold;box-shadow: 0px 10px 60px 0px rgb(0 0 0 / 10%) ">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section_title mb-5" style="float:right;padding-top:10px;padding-left:30px;background-color: #f9b634;color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%); ">

                                        <p style="color: #000000;padding:3px!important;padding-right:15px; font-size:16px" ><strong>  <h1 class="title main-heading mb-3" style="color:#FFFFFF; text-align:center"> Algeria Invest® sélectionne les contributions les plus pertinentes de ses usagers et partenaires et les publie dans sa rubrique avis d’experts  </h1> <br>

                                                <h5 class="subtitle mb-1" style="color:#000000; font-size:1rem"> Vous souhaitez participer et faire connaître vos analyses relatives à l’économie Algérienne, vous serez le bienvenu, il vous suffit de renseigner 	<b> <i><a style="color:red;font-size:22px" id="link" href="#link_form"> le formulaire ci-dessous </a> </i> </b> pour transmettre votre texte. <br> <br>

                                                    Les contributions publiées doivent porter sur des analyses en lien avec l’économie et l’investissement en Algérie. </h5> </strong> </p>
                                    </div>
                                    <style>
                                        #link:active, #link:hover {
                                            color: #ffffff!important;
                                        }
                                    </style>


                                {!! Form::open(array('method'=>'POST','route' => 'premium-news-store','files'=>true)) !!}

                                    @include('frontend.new_news.form')

                                {!! Form::close() !!}

                                </div>
                            </div>
                                   
                                </div>

                            </div>

                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <!-- left area ends here -->
                {{-- @include('frontend.common.right_sidebar') --}}
            </div>
            <!-- row ends here -->

        </div>

    </div>
    <style>
        
            input{
                text-transform: none!important;

            }
        
</style>
</section>
<!-- top left and right area ends here -->
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
    $(document).ready(function() {
        $('.datepicker').datepicker();
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
                var files = e.target.files,
                filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<br/><a href=\"javascript:void(0)\" class=\"remove\"><i class=\"far fa-trash-alt\" style=\"color: #F64E60;\"></i></a>" +
                        "</span>").insertBefore("#browse");
                    $(".remove").click(function(){
                        $(this).parent(".pip").remove();
                    });

                    // Old code here
                    /*$("<img></img>", {
                        class: "imageThumb",
                        src: e.target.result,
                        title: file.name + " | Click to remove"
                    }).insertAfter("#files").click(function(){$(this).remove();});*/

                });
                fileReader.readAsDataURL(f);
            }
        });
        } else {
            alert("Your browser doesn't support to File API")
        }

        $(document).on('submit-btn', '#submit-btn', function() {
            $('#submit-btn').attr('disabled', 'disabled');
        });
    });
    
    // Code for text editor
    $('.summernote').summernote({
        height: 150
    });
    </script>
    <script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
    <script>
    var sectors = <?php echo json_encode(array_keys((array)$sector_arr), true); ?>;
    var KTSelect2 = function() {
        var  demos = function (){
            $('#sectors').select2({
                placeholder: "Choose some sectors",
            });
        };
        return {
            init: function() {
                demos();
            }
        };
    }();
    KTSelect2.init();
    // Selecting all sectors.
    $('#select_all_sectors').click(function(){

        $('#sectors').val(sectors);
        $('#sectors').select2({
            placeholder: "Choose some sectors",
        });
    });

    // Removing all sectors.
    $('#remove_all_sectors').click(function(){

        $('#sectors').val([]);
        $('#sectors').select2({
            placeholder: "Choose some sectors",
        });
    });

    var zones = <?php echo json_encode(array_keys((array)$zone_arr), true); ?>;
    var KTSelect2 = function() {
        var  demos = function (){
            $('#zones').select2({
                placeholder: "Choose some zones",
            });
        };
        return {
            init: function() {
                demos();
            }
        };
    }();

    // Selecting all zones.
    $('#select_all_zones').click(function(){

        $('#zones').val(zones);
        $('#zones').select2({
            placeholder: "Choose some zones",
        });
    });

    // Removing all zones.
    $('#remove_all_zones').click(function(){

        $('#zones').val([]);
        $('#zones').select2({
            placeholder: "Choose some zones",
        });
    });
</script>
@endsection