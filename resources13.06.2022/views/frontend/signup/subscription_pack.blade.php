@extends('frontend.layouts.master')
@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script> -->
    <title>@lang('signup.package') </title>
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
    <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:35px">@lang('signup.package') </h4>
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

                    <!-- form user info -->
                    <div class="card card-outline-secondary" style="border: 1px solid #f5f5f5;">
                       <!-- <div class="card-header">
                            <h3 class="mb-0">User Information</h3>
                        </div> -->
                        <div class="card-body" style="background-color: #f5f5f5;color:#000000;text-transform: bold; border: 1px solid #f5f5f5">
                            
                      
						<br>
                       
                           <div class="col-lg-12 col-md-12 col-sm-6"  style="background-color: #FFFFFF;opacity:0.8;color:#000000;text-transform: bold;; text-align:center; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);border-width:0px;border-style:double;border-color:#417081;border-radius:20px ">
                          <!-- <div class="col-lg-12 col-md-12 col-sm-6" style="background-color: #f9b634;opacity:0.8;color:#000000;text-transform: bold;; text-align:center; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);border-width:0px;border-style:double;border-color:#417081;border-radius:20px "> -->
                                    <h4 style="color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);text-align:center; width:auto "><center> <b>  <br> @lang('signup.package')  </b><br></center><br></h4>	
                       
                           <!-- </div> -->
                            <br>
                            <br>
                                    <div class="row">
                                        
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
						    <div  class="col-lg-5 col-md-5 col-sm-6"  style="background-image: linear-gradient(60deg,#f9b634,#f9b634);opacity:0.8; text-align:center;color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);border-width:0px;border-style:double;border-color:#417081;border-radius:20px ">
                                    <br>
                                    
                                    <h1 <center>@lang('signup.for_algerians')<center></h1>
                                       
                                        <hr>
                                        <h1 class="title main-heading mb-3" style="color:#FFFFFF;">
                                        <center>  59.381,00 DZD @lang('signup.with_taxes') / @lang('signup.year') </center>
                                    </h1>
                           </div>
                           
                           &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;  
                             <div class="col-lg-5 col-md-5 col-sm-6"  style="background-image: linear-gradient(60deg,#f9b634,#f9b634);opacity:0.8; text-align:center;color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);border-width:0px;border-style:double;border-color:  #c0616a;border-radius:20px ">
                                    <br>
                                <h1><center>@lang('signup.for_foreigners')</center></h1>
                                        <hr>
                                    <h1 class="title main-heading mb-3" style="color:#FFFFFF">
                                    <center>  499,00 € @lang('signup.with_taxes') / @lang('signup.year')   </center>
                                                <br>
                                    <center>  579,00 $ @lang('signup.with_taxes') / @lang('signup.year')   </center>
                                    </h1>
                             </div>
                             

                          </div> 
                          
                          <br>
                          <br>

                                    
                                  
                                        <h3 class="title main-heading mb-2" style="color:#413b64; font-size:15px!important">
                                         @lang('signup.text_1')
                                        </h3>
                                       <hr>
                                        <h3 class="title main-heading" style="color:#413b64; font-size:15px!important">
                                        @lang('signup.text_2')
                                        </h3>
                                        <hr>
                                        <p class="title main-heading" style="color:#413b64; font-size:15px!important">
                                        @lang('signup.text_3')
                                            </h3>
                                        <hr>
                                        <h3 class="title main-heading" style="color:#413b64; font-size:15px!important">
                                        @lang('signup.text_4')
                                           </h3>
                                        <hr>
                                        <h3 class="title main-heading" style="color:#413b64; font-size:15px!important">
                                        @lang('signup.text_5')
                                              </h3>
                                        <hr>
                                        <h3 class="title main-heading" style="color:#413b64; font-size:15px!important">
                                        @lang('signup.text_6')
                                            </h3>
                                        <hr>
                                        <h3 class="title main-heading" style="color:#413b64; font-size:15px!important">
                                        @lang('signup.text_7')
                                            </h3>
                                        <br>
                                        <br>
                                        <center><div class="" style="center:center; width:150px;text-align:center" >
                                    <label class=""></label>

                                       <!-- <input class="btn btn-secondary" type="reset" value="Cancel"> -->
                                        <a href="{{route('customer-register')}}" type="button" class="genric-btn success radius btn-lg"> @lang('signup.register') </a>

                                </div></center>
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
<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
<script>
    const info = document.querySelector(".alert-info");

    function process(event) {
        event.preventDefault();

        const phoneNumber = phoneInput.getNumber();

        info.style.display = "";
        info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
    }
</script>
<script>
$(document).on('click','#register_button', function(e){
            addLoader(true);
            e.preventDefault();
            $(".invalid-feedback").css('display','none');
            $(".invalid-feedback").html('');
            $(".form-control").removeClass('is-invalid');
            var register_text = $('#register_button').html();
            $('#register_button').html('Loading...');
            $.ajax({
                url  : "{{ route('customer-store')}}",
                type : "POST",
                data : {
                    _token                  : "{{csrf_token()}}",
                    subscription_id         : $("input[name='subscription_id']:checked").val(),
                    name                    : $('#name').val(),
                    companyName             : $('#companyName').val(),
                    address                 : $('#address').val(),
                    jobTitle                : $('#jobTitle').val(),
                    phone                   : $('#phone').val(),
                    email_customer          : $('#email_customer').val(),
                    pays                    : $('#pays').val(),
                    wilaya                  : $('#wilaya').val(),
                    username                : $('#username').val(),
                    password                : $('#password').val(),
                    password_confirmation   : $('#password_confirmation').val(),
                    general_condition       : ($('#general_condition').is(":checked")) ? $('#general_condition').is(":checked") : '',
                    promotions              : ($('#promotions').is(":checked")) ? 1 : '',
                },
                success : //function (data)
                {
                    /*addLoader(false);
                    $("html, body").animate({scrollTop: 0 }, 0);
                    if(data.success){
                        $('#personal').addClass('active tick');
                        $('#personal').attr('id', 'personal1');
                        if($("input[name='subscription_id']:checked").val() == 1) {
                            $("#continue_button").trigger('click');
                        }
                        else {
                            $('#register_button').html(register_text);
                            $('#bankTransferNav').addClass("active");
                            $("#pills-banktransfer-tab").prop("checked", true);
                            $("#register_button_main").trigger('click');
                        }*/
                        alert("Vous avez accomplis votre inscription avec succès. Vous serez contacté incessamment par un commercial concernant notamment le paiement de votre abonnement. Merci pour votre confiance");
                    }
                },
                error : function(data) {
                    addLoader(false);
                    $("html, body").animate({scrollTop: 0 }, 0);
                    $('#register_button').html(register_text);
                    $(".invalid-feedback").css('display','');
                    $.each( data.responseJSON.errors, function( key, value ) {
                        $("#"+key).addClass('is-invalid');
                        $("#"+key+'-validation-error').html(value);
                    });
                }
            });
        });


</script>   
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $(".toggle-password_confirmation").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password_confirmation") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password_confirmation");
        }
    });



</script>


<script>
    /* Scroll to Top */
    $(document).ready(function(){
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#scroll-to-top').fadeIn();
            } else {
                $('#scroll-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#scroll-to-top').click(function () {
            $('#scroll-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        $('#scroll-to-top').tooltip('show');

    });
</script>




<script>
document.getElementById('contact-inquiry').onchange = function () 
{
  

    if ((this.value == 'Entreprise'))
    {
        document.getElementById("companyName").hidden = false;
        
        document.getElementById("companyNameLabel").hidden = false;
    }

    else 
    {
        document.getElementById("companyName").hidden = true;
        document.getElementById("companyNameLabel").hidden = true;
        document.getElementById("companyName").value = "Particulier";
    }


   
}

document.getElementById('provenance').onchange = function ()
{



    if ((this.value == 'Autre'))
    {
        document.getElementById("other_provenance").hidden = false;

        document.getElementById("other_provenanceLabel").hidden = false;
    }


    else
    {
        document.getElementById("other_provenance").hidden = true;
        document.getElementById("other_provenanceLabel").hidden = true;
        document.getElementById("other_provenance").value = "Null";

    }



}
</script>
<script>
    document.getElementById('pays').onchange = function ()
    {


        if ((this.value == 'Algérie'))
        {

            document.getElementById("wilaya").hidden = false;
            document.getElementById("wilayaLabel").hidden = false;
        }


        else if ((this.value != 'Algérie'))
        {

            document.getElementById("wilaya").hidden = true;
            document.getElementById("wilayaLabel").hidden = true;

        }



    }
</script>
<!-- Scroll to Top -->

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