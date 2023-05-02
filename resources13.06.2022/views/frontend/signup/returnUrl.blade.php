@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script> -->



    <title>Paiement effectué </title>
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
                            <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:35px">Paiement effectué</h4>
                        </div>


                    </div>
                </div>
                <div class="row align-content-center justify-content-center" style=" margin-right:0px;margin-left:0px; background-color:#f5f5f5;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black" >
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

                                    <div class="card-body" style="background-color: #f5f5f5;color:#000000;text-transform: bold; border: 1px solid #f5f5f5" id="content1">


                                        <br>

                                        <div class="col-lg-12 col-md-12 col-sm-6"  style="background-color: #FFFFFF;opacity:0.8;color:#000000;text-transform: bold;; text-align:center; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);border-width:0px;border-style:double;border-color:#417081;border-radius:20px " >

                                            <br>
                                            <br>
                                            <?php


                                            $bd_dsn = 'mysql:host=127.0.0.1;dbname=algeriainvest_v1;charset=utf8';
                                            $bd_user = "algeriainvest_v1";
                                            $bd_pass = "Toe7huTp2n_ty2Xs";

                                            try{
                                                $bdd = new PDO($bd_dsn,$bd_user,$bd_pass);
                                                // echo "connexion reussite";
                                            }
                                            catch(PDOException $ex){
                                                echo "ECHEC".$ex->getMessage();
                                            }

                                            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                            // echo "$actual_link <br> <br>";
                                            $orderId = $_GET['orderId'];
                                            $userName= "i2b9hfgsd54qs821qs95qs4";
                                            $password= "3Hqsq54qsHeqsP85sdFh";
                                            //echo "$orderId <br> <br>";


                                            $response = file_get_contents('https://cib.satim.dz/payment/rest/confirmOrder.do?language=FR&orderId='.$orderId.'&password='.$password.'&userName='.$userName.'');
                                            $response = json_decode($response);


                                            //$respCode_desc = $response->{'respCode_desc'};
                                            ////$orderId = $response->{'orderId'};
                                            $orderNumber = $response->{'OrderNumber'};

                                            $approvalCode = $response->{'approvalCode'};
                                            $client = $response->{'cardholderName'};


                                            $sql = "SELECT * FROM payment_transactions WHERE customer_id = ? ";
                                            $stmt = $bdd->prepare($sql);
                                            $stmt->bindValue(1,$orderNumber,PDO::PARAM_STR);
                                            //$stmt->bindValue(1,$status,PDO::PARAM_STR);
                                            $stmt->execute();

                                            $client_info = $stmt->fetch();

                                            $client_date =  $client_info['created_at'];








                                            $msg_error = $response->{'actionCodeDescription'};


                                            print " <h3 class='title main-heading mb-2' style='color:green;font-weight:bold;font-size:15px!important'>
                                                $msg_error

                                            </h3>";

                                            ?>
                                            <div id="content">
                                                <hr>

                                                <div style="float:left;width:40%;float:left">
                                                    <img style="max-width: 30%" src="{{ asset('css/images/logo_algeria_invest_final.svg') }}" alt="" />
                                                </div>
                                                <!-- <div class="col-lg-12 col-md-12 col-sm-6" style="background-color: #f9b634;opacity:0.8;color:#000000;text-transform: bold;; text-align:center; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);border-width:0px;border-style:double;border-color:#417081;border-radius:20px "> -->
                                                <h4 style="color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);text-align:center; width:auto "><center> <b>  <br> Reçu de paiement </b><br></center><br></h4>

                                                <!-- </div> -->




                                                <!-- <h3 class="title main-heading mb-2" style="color:green; font-size:15px!important">
                                                     Votre transaction a été effectuée aves succés
                                                 </h3> -->
                                                <br>
                                                <br>
                                                <br>




                                                <center> <table>
                                                        <tr>
                                                            <td> <h6 style="text-align:left; font-size:13px; line-height:30px"> L’identifiant de la transaction :  </h6> </td>
                                                            <td> <h6 style="text-align:left; font-size:13px; line-height:30px"><b> <?php echo $orderId   ?></b></h6></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <h6 style="text-align:left; font-size:13px; line-height:30px"> Client :  </h6> </td>
                                                            <td> <h6 style="text-align:left; font-size:13px; line-height:30px"> <b><?php echo $client   ?></b> </h6></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <h6 style="text-align:left; font-size:13px; line-height:30px"> Le numéro de commande :  </h6> </td>
                                                            <td> <h6 style="text-align:left; font-size:13px; line-height:30px"> <b><?php echo $orderNumber  ?></b></h6></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <h6 style="text-align:left; font-size:13px; line-height:30px"> Le numéro d’autorisation :  </h6> </td>
                                                            <td> <h6 style="text-align:left; font-size:13px; line-height:30px"> <b> <?php echo $approvalCode   ?>  </b></h6></td>
                                                        </tr>
                                                        <tr>
                                                            <td>  <h6 style="text-align:left; font-size:13px; line-height:30px"> Transaction faite le :  </h6> </td>
                                                            <td>  <h6 style="text-align:left; font-size:13px; line-height:30px"><b> <?php   echo $client_date;?>
                                                                    </b> </h6></td>

                                                        </tr>
                                                        <tr>
                                                            <td>  <h6 style="text-align:left; font-size:13px; line-height:30px"> Le montant de paiement : </h6>  </td>
                                                            <td>  <h6 style="text-align:left; font-size:13px; line-height:30px"> <b> 59.381,00 DZD </b> </h6></td>
                                                        </tr>
                                                        <tr>
                                                            <td>  <h6 style="text-align:left; font-size:13px; line-height:30px"> Le mode de paiement :  </h6>  </td>
                                                            <td>  <h6 style="text-align:left; font-size:13px; line-height:30px"> <b> Carte CIB </b> </h6></td>
                                                        </tr>
                                                    </table> </center>

                                                <div >
                                                <!-- <h6 style="text-align:left; font-size:13px; line-height:30px"> L’identifiant de la transaction :  </h6>
                                                <h6 style="text-align:left; font-size:13px; line-height:30px"> Le numéro de commande :  </h6>
                                                <h6 style="text-align:left; font-size:13px; line-height:30px"> Le numéro d’autorisation :  </h6>
                                                <h6 style="text-align:left; font-size:13px; line-height:30px"> Transaction faite le : <b> <?php $date = date('d/m/Y'); $date2 = date('h:i'); echo "$date à $date2" ?> </b> </h6>
                                                <h6 style="text-align:left; font-size:13px; line-height:30px"> Le montant de paiement : <b> 59.381,00 DZD </b> </h6>
                                                <h6 style="text-align:left; font-size:13px; line-height:30px"> Le mode de paiement : <b> carte CIB </b>  </h6> -->



                                                    <br>
                                                    <br>

                                                    <br>
                                                    <br>


                                                    <?php


                                                    $message = '';

                                                    if(isset($_GET["btnmail"]))
                                                    {
                                                    include('/var/www/vhosts/algeriainvest.com/httpdocs/AlgeriaIC/resources/views/frontend/signup/pdf.blade.php');
                                                    $file_name = md5(rand()) . '.pdf';
                                                    $html_code = "<center> <h2> Reçu de paiement </h2></center>" ;
                                                    $html_code .= "<center> <table border='1' width='100%' cellpadding='6'>" ;
                                                    $html_code .= "<tr>
                                                            <td> <h2 style='text-align:left;  line-height:15px'> L’identifiant de la transaction :  </h2> </td>
                                                            <td> <h2 style='text-align:left;  line-height:15px'><b> $orderId   </b></h2></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <h2 style='text-align:left;  line-height:15px'> Client :  </h2> </td>
                                                            <td> <h2 style='text-align:left;  line-height:15px'> <b> $client   </b> </h2></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <h2 style='text-align:left;  line-height:15px'> Le numéro de commande :  </h2> </td>
                                                            <td> <h2 style='text-align:left;  line-height:15px'> <b> $orderNumber </b></h2></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <h2 style='text-align:left;  line-height:15px'> Le numéro d’autorisation :  </h2> </td>
                                                            <td> <h2 style='text-align:left;  line-height:15px'> <b>  $approvalCode</b></h2></td>
                                                        </tr>
                                                        <tr>
                                                            <td>  <h2 style='text-align:left;  line-height:15px'> Transaction faite le :  </h2> </td>
                                                            <td>  <h2 style='text-align:left;  line-height:15px'><b>  $client_date
                                                                    </b> </h2></td>

                                                        </tr>
                                                        <tr>
                                                            <td>  <h2 style='text-align:left;  line-height:15px'> Le montant de paiement : </h2>  </td>
                                                            <td>  <h2 style='text-align:left;  line-height:15px'> <b> 59.381,00 DZD </b> </h2></td>
                                                        </tr>
                                                        <tr>
                                                            <td>  <h2 style='text-align:left;  line-height:15px'> Le mode de paiement :  </h2>  </td>
                                                            <td>  <h2 style='text-align:left;  line-height:15px'> <b> Carte CIB </b> </h2></td>
                                                        </tr>" ;
                                                    $html_code .= "</table></center>" ;
                                                        $html_code .= "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> " ;

                                                    $html_code .= "<p> Siège social i2B SPA , Adresse : 6, rue Ahmed Chérifi, Kouba, ALGER <br> Email : contact@algeriainvest.com , Téléphone : +213 770 008 496 </p>";
                                                    $pdf = new Pdf();
                                                    $pdf->load_html($html_code);
                                                    $pdf->render();
                                                    $file = $pdf->output();
                                                    file_put_contents($file_name, $file);

                                                    require '/var/www/vhosts/algeriainvest.com/httpdocs/AlgeriaIC/resources/views/frontend/signup/class/class.phpmailer.php';
                                                    $mail = new PHPMailer;
                                                    $mail->IsSMTP();								//Sets Mailer to send message using SMTP
                                                        ini_set('display_errors', 1);
                                                        error_reporting('E_ALL');

                                                    $mail->Host = '197.140.11.52';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
                                                    $mail->Port = 587;								//Sets the default SMTP server port
                                                    $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
                                                    $mail->Username = '';					//Sets SMTP username
                                                    $mail->Password = '2-qE1Gao';					//Sets SMTP password
                                                    $mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
                                                    $mail->From = 'confirmation@algeriainvest.com';			//Sets the From email address for the message
                                                    $mail->FromName = 'Algeria Invest';			//Sets the From name of the message
                                                    $mail->AddAddress($_GET['email_client']);		//Adds a "To" address
                                                    $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
                                                        $mail->SMTPDebug = 1;
                                                    $mail->IsHTML(true);							//Sets message type to HTML
                                                    $mail->AddAttachment($file_name);     				//Adds an attachment from a path on the filesystem
                                                    $mail->Subject = "Recu de paiement en ligne";			//Sets the Subject of the message
                                                    $mail->Body = "Bonjour, <br> Nous vous invitons à trouver en pièce jointe votre reçu de paiement. Merci d’avoir utilisé le service paiement en ligne de Algeria Invest via la carte monétique CIB.";				//An HTML or plain text message body
                                                    if($mail->Send())								//Send an Email. Return true on success or false on error
                                                    {
                                                    $message = '<label class="text-success">Reçu de paiement envoyé avec succès a votre adresse email...</label>';
                                                    }
                                                    unlink($file_name);
                                                    }

                                                    ?>

                                                    <h6 style="text-align:left ; font-size:13px; line-height:30px"> En cas de problème de paiement, contactez le numéro vert de la Satim  <b> 3020 </b> <img class="satim-logo" src="{{asset('storage/uploads/cib_logos/3020_satim.png')}}"  alt=""> </h6>
                                                    <br>
                                                </div>
                                                <div id="editor"></div>


                                            </div>
                                        </div>

                                    </div>
                                    <div style="background-color: #f5f5f5;color:#000000;text-transform: bold; border: 1px solid #f5f5f5">
                                        <table style="width:100%;">
                                            <tr>
                                                <td> <button id="downloadPDF" class="genric-btn success radius"> <i class="fas fa-download"></i> Télécharger</button> </td>


                                                <td> &nbsp; <button name="b_print"  class="genric-btn success radius" onClick="printdiv('content');" value=" Print "> <i class="fas fa-print"></i> Imprimer </button> &nbsp; &nbsp; </td>
                                                <td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                                                    <form  method="get"  action="https://algeriainvest.com/checkout_succes?orderId=<?php $_GET['orderId']?>" >
                                                        @csrf
                                                        <input input   name="orderId"  type="hidden"  value="<?php echo $_GET['orderId']?>" maxlength="70"  style="width:300px;background-color:#ffffff" required>
                                                        <input input   name="email_client"  type="text"  value="" maxlength="70"  style="width:300px;background-color:#ffffff" required><?php echo $message; ?>
                                                        <div class="input-group-append">
                                    <span class="input-group-text">
                                        <button type="submit" name="btnmail" id="btnmail"  class="genric-btn success radius" >
                                            <span>
                                                <i class="fa fa-circle-o-notch fa-spin" id="spinner" style="display:none;"></i>
                                                <i class="fas fa-envelope"></i> Envoyer un mail                                            </span>
                                        </button>
                                    </span>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script type="text/javascript">

        $('#downloadPDF').click(function() {
            var options = {
                //'width': 800,
            };
            var pdf = new jsPDF('p', 'pt', 'a4');
            pdf.addHTML($("#content1"), 0, 0, options, function() {
                pdf.save('reciept_details.pdf');
            });
        });



    </script>

    <script language="javascript">
        function printdiv(printpage) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = " <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br><br> <br><br> <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>  <br><div style=\"float:left;width:40%\">\n" +
                "        <img style=\"max-width: 30%\" src=\"{{ asset('css/images/logo_algeria_invest_final.svg') }}\" alt=\"\" />\n" +
                "    </div>" +
                "<p> Siège social i2B SPA , Adresse : 6, rue Ahmed Chérifi, Kouba, ALGER <br> Email : contact@algeriainvest.com , Téléphone : +213 770 008 496 </p> </body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
             document.body.innerHTML = headstr + newstr + footstr;

            window.print();

            return false;


        }


    </script>





    </body>
    </html>


    </body>



    </html>



    <!-- Please keep your own scripts above main.js -->
@endsection