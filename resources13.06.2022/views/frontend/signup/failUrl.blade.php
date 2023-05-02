@extends('frontend.layouts.master')
@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script> -->
    <title>Paiement échoué </title>
@endsection

@section('content')



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

    </head>
    <body>
    <!--
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });


        function getIp(callback) {
            fetch('https://ipinfo.io/json?token=<votre token>', { headers: { 'Accept': 'application/json' }})
                .then((resp) => resp.json())
                .catch(() => {
                    return {
                        country: 'Algeria',
                    };
                })
                .then((resp) => callback(resp.country));
        }

        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["us", "co", "in", "de"],
            utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>-->
    <section class="news-main-area">
        <div class="discover-algeria">
            <div class="container py-3">


                <div class="row " style="left:0;right:0 ;max-width: 100%;margin-left: 0px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
                    <div class="signup-img" style="height:180px;width:100%">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 section_title" style="padding-top:80px; float:left;">
                            <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:35px">Paiement échoué </h4>
                        </div>


                    </div>
                </div>
                <div class="row align-content-center justify-content-center" style=" margin-right:0px;margin-left:0px; background-color:#f5f5f5;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black">
                    <div class="col-md-12">
                        <br>
                        <h3 class="text-center"></h3>


                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                <span class="anchor" id="formUserEdit"></span>
                                <hr class="my-3">
                                <!-- form user info -->
                                <div class="card card-outline-secondary" style="border: 1px solid #f5f5f5;">
                                    <!-- <div class="card-header">
                                         <h3 class="mb-0">User Information</h3>
                                     </div> -->
                                    <div class="card-body" style="background-color: #f5f5f5;color:#000000;text-transform: bold; border: 1px solid #f5f5f5">


                                        <br>

                                        <div class="col-lg-12 col-md-12 col-sm-6"  style="background-color: #FFFFFF;opacity:0.8;color:#000000;text-transform: bold;; text-align:center; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);border-width:0px;border-style:double;border-color:#417081;border-radius:20px ">
                                            <!-- <div class="col-lg-12 col-md-12 col-sm-6" style="background-color: #f9b634;opacity:0.8;color:#000000;text-transform: bold;; text-align:center; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);border-width:0px;border-style:double;border-color:#417081;border-radius:20px "> -->
                                            <h4 style="color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);text-align:center; width:auto "><center> <b>  <br> Paiement échoué</b><br></center><br></h4>

                                            <!-- </div> -->




                                            <!-- <h3 class="title main-heading mb-2" style="color:red; font-size:15px!important">
                                                 « Votre transaction a été rejetée/ Your transaction was rejected/ تم رفض معاملتك »
                                             </h3> -->
                                            <br>


                                            <?php
                                            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                            // echo "$actual_link <br> <br>";
                                            $orderId = $_GET['orderId'];
                                            $userName= htmlspecialchars("i2b9hfgsd54qs821qs95qs4");
                                            $password= "3Hqsq54qsHeqsP85sdFh";

                                            //echo "$orderId <br> <br>";


                                            $response = file_get_contents('https://cib.satim.dz/payment/rest/confirmOrder.do?language=FR&orderId='.$orderId.'&password='.$password.'&userName='.$userName.'');
                                            $response = json_decode($response);

                                            $msg_error = $response->{'actionCodeDescription'};
                                            // $respCode = $response->{'respCode'};
                                           // echo
                                            //echo $respCode_desc;




                                            if(isset($response->{'params'}->{'respCode_desc'}) && !empty($response->{'params'}->{'respCode_desc'})){
                                                $respCode_desc = $response->{'params'}->{'respCode_desc'};
                                                print " <h3 class='title main-heading mb-2' style='color:red;font-weight:bold;font-size:15px!important'>
                                                $respCode_desc;

                                            </h3>";

                                            }
                                            else{
                                                print " <h3 class='title main-heading mb-2' style='color:red;font-weight:bold;font-size:15px!important'>
                                                $msg_error

                                            </h3>";

                                            }








                                            ?>
                                            <br>
                                            <br>

                                            <br>
                                            <br>

                                            <h6 style="text-align:left ; font-size:13px; line-height:30px"> En cas de problème de paiement, contactez le numéro vert de la Satim  <b> 3020 </b> <img class="satim-logo" src="{{asset('storage/uploads/cib_logos/3020_satim.png')}}"  alt=""> </h6>
                                            <br>

                                            <br>




                                        </div>


                                        <br>


                                        <br>
                                    </div>
                                </div>
                                <br>

                                <!--<div class="card-footer">
                                    <div class="float-right">
                                        <input class="btn btn-secondary" type="reset" value="Cancel">
                                        <input class="btn btn-primary" type="button" value="Send">
                                    </div>
                                </div> -->
                            </div>
                            <!--/card-->
                        </div>

                    </div><!--/row-->

                </div><!--/col-->

            </div><!--/row-->

        </div><!--/container-->

        </div>
    </section>
    <style>

        /* Scroll to Top */
        #scroll-to-top {
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
        }

        input{
            text-transform: none!important;

        }
    </style>


    </body>



    </html>
    <script src="js/formulaires-ajax.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('js/front-end/browser-class.js') }}"></script>
    <!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
    <!-- Please keep your own scripts above main.js -->
@endsection