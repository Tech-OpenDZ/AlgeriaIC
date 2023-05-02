@extends('frontend.layouts.master')
@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script> -->
    <title>@lang('signup.registrationForm')</title>
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
    <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:35px">@lang('signup.registrationForm')</h4>
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
                        <h4 style="color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);text-align:center; "><center> <b>   @lang('signup.package') </b></center></h4>	
                        <br>
                        <br>
                           <div class="col-lg-12 col-md-12 col-sm-6"  style="background-color: #f9b634;opacity:0.8;color:#000000;text-transform: bold;; text-align:center; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);border-width:0px;border-style:double;border-color:#417081;border-radius:20px ">
                                    <br>
                                    
                                  
                                        <h3 class="title main-heading mb-2" style="color:#FFFFFF; font-size:15px!important">
                                         @lang('signup.text_1')
                                        </h3>
                                       <hr>
                                        <h3 class="title main-heading" style="color:#FFFFFF; font-size:15px!important">
                                        @lang('signup.text_2')
                                        </h3>
                                        <hr>
                                        <p class="title main-heading" style="color:#FFFFFF; font-size:15px!important">
                                        @lang('signup.text_3')
                                            </h3>
                                        <hr>
                                        <h3 class="title main-heading" style="color:#FFFFFF; font-size:15px!important">
                                        @lang('signup.text_4')
                                           </h3>
                                        <hr>
                                        <h3 class="title main-heading" style="color:#FFFFFF; font-size:15px!important">
                                        @lang('signup.text_5')
                                              </h3>
                                        <hr>
                                        <h3 class="title main-heading" style="color:#FFFFFF; font-size:15px!important">
                                        @lang('signup.text_6')
                                            </h3>
                                        <hr>
                                        <h3 class="title main-heading" style="color:#FFFFFF; font-size:15px!important">
                                        @lang('signup.text_7')
                                            </h3>
                                        <br>
                                        <br>
                                        <center><div class="" style="center:center; width:150px;text-align:center" >
                                    <label class=""></label>

                                       <!-- <input class="btn btn-secondary" type="reset" value="Cancel"> -->
                                        <a href="#form_insc" type="button" class="btn-warning btn-lg"  style="border: 2px solid white;border-radius: 3px;color:#FFFFFF"> @lang('signup.register') </a>

                                </div></center>
                                <br>
                           </div>
                           <br>
                           <br>
                           <br>			
                   <h4 style="color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);text-align:center; "><center> <b>   @lang('signup.starting_tarification') </b></center></h4>
						<br>
								
                        <br>
                        <div class="row">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
						    <div  class="col-lg-5 col-md-5 col-sm-6"  style="background-image: linear-gradient(60deg,#4e7cbe,#95cfd2);opacity:0.8; text-align:center;color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);border-width:0px;border-style:double;border-color:#417081;border-radius:20px ">
                                    <br>
                                    
                                    <h1 <center>@lang('signup.for_algerians')<center></h1>
                                       
                                        <hr>
                                        <h1 class="title main-heading mb-3" style="color:#FFFFFF;">
                                        <center>  49.900,00 DZD @lang('signup.without_taxes') / @lang('signup.year') </center>
                                    </h1>
                           </div>
                           
                           &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;  
                             <div class="col-lg-5 col-md-5 col-sm-6"  style="background-image: linear-gradient(60deg,#4e7cbe,#95cfd2);opacity:0.8; text-align:center;color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%);border-width:0px;border-style:double;border-color:  #c0616a;border-radius:20px ">
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

                          <i id="form_insc"> </i>
				 <br>
                 <br>
                 <br>
                            <h4 style="color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);text-align:center; "><center> <b>   @lang('signup.registrationForm') </b></center></h4>
                            <br>
                            <br>
                           
                        <form autocomplete="off" class="form-horizontal" role="form" method="post" action="{{ route('customer-store') }}">
                                @csrf
                                <div id="alert_enregist" style="display:none" class="alert alert-danger">
                                    <p>Erreur:</p>
                                    <span></span>
                                </div>
                                @if( Session::has( 'success' ))
                                    <div class="success-alert-msg">
                                       {{ Session::get( 'success' ) }}
                                     
                                    </div><br>

                                    <style>
                                        .success-alert-msg {
                                            color: #35A85E !important;
                                            font-weight: 700;
                                            font-size: 1.2rem !important;
                                            padding-top: 0px;
                                            position: inherit;
                                            center: center;
                                            padding-left: 10px!important;
                                            background-color: rgba(250,250,250,0.8);
                                            text-align: -webkit-center;
                                        }
                                       
                                    </style>

                                    <script>
                                        alert(.success-alert-msg);

                                        </script>


                                @elseif( Session::has( 'error' ))
                                    <div class="danger-alert-msg col-md-12">
                                        {{ Session::get( 'error' ) }}
                                    </div><br>
                                @endif
           

                                    <div class="form-group row">
                                        <label for="name" class="label-text col-md-3"></label>
                                        <div class="col-md-9">
                                            <input type="hidden" class="form-control @error('subscription_id') is-invalid  @enderror" placeholder="Inscription id " id="subscription_id" name="subscription_id" value="4">
                                            @error('subscription_id')
                                            <span class="invalid-feedback" id="subscription_id-validation-error" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                
                                            
                                <label for="contact-inquiry" class="label-text col-md-3">  @lang('signup.you_are') <span class="required" style="color: red">*</span></label>
                                <div class="col-md-9">
                                        <select class="form-control" id="contact-inquiry" name="contact-inquiry" onchange="showDiv(this)">
                                            <option value="choose" disabled="" selected="">@lang('signup.choose')...</option>
                                            <option value="Entreprise"> @lang('signup.company')</option>
                                            <option value="Particulier"> @lang('signup.individual')</option>
                                        </select>
                                </div>
                  
                        </div>    
                                <div class="form-group row">
                                    <label for="name" class="label-text col-md-3"> @lang('signup.nameLabel') <span class="required" style="color: red">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('name') is-invalid  @enderror"  id="name" name="name" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="invalid-feedback" id="name-validation-error" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="companyName" id="companyNameLabel" class="label-text col-md-3"> @lang('signup.companyNameLabel')  <span class="required" style="color: red">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('companyName') is-invalid  @enderror"  id="companyName" name="companyName" value="{{ old('companyName') }}">
                                        @error('companyName')
                                        <span class="invalid-feedback" role="alert" id="companyName-validation-error">
                                             {{ $message }}
                                         </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="jobTitle" class="label-text col-md-3"> @lang('signup.jobTitleLabel')   <span class="required" style="color: red">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('jobTitle') is-invalid  @enderror"  id="jobTitle" name="jobTitle" value="{{ old('jobTitle') }}">
                                        @error('jobTitle')
                                        <span class="invalid-feedback" role="alert" id="jobTitle-validation-error">
                                          {{ $message }}
                                         </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="address" class="label-text col-md-3"> @lang('signup.companyAddressLabel') <span class="required" style="color: red">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('address') is-invalid  @enderror"  id="address" name="address" value="{{ old('address') }}">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert" id="address-validation-error">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> @lang('signup.country')<span class="required" style="color: red">*</span></label> </label>
                                    <div class="col-lg-3">
                                        <!--<select class="form-control" id="country" size="0">
                                        <option value="#">
                                            SELECT
                                            </option>
                                            <option value="Algeria">
                                            Algeria
                                            </option>
                                        </select> -->

                                        <select name="pays" class="form-control @error('pays') is-invalid  @enderror" id="pays" onchange="choseCountry(this.value,0)">
                                                <option value="" selected disabled>@lang('signup.choose')...</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Afrique du Sud">Afrique du Sud</option>
                                                <option value="Albanie">Albanie</option>
                                                <option value="Algérie">Algérie</option>
                                                <option value="Allemagne">Allemagne</option>
                                                <option value="Andorre">Andorre</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctique">Antarctique</option>
                                                <option value="Antigua-et-Barbuda">Antigua-et-Barbuda</option>
                                                <option value="Arabie saoudite">Arabie saoudite</option>
                                                <option value="Argentine">Argentine</option>
                                                <option value="Arménie">Arménie</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australie<">Australie</option>
                                                <option value="Autriche">Autriche</option>
                                                <option value="Azerbaïdjan">Azerbaïdjan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahreïn">Bahreïn</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbade">Barbade</option>
                                                <option value="Belgique">Belgique</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Bénin">Bénin</option>
                                                <option value="Bermudes">Bermudes</option>
                                                <option value="Bhoutan">Bhoutan</option>
                                                <option value="Biélorussie">Biélorussie</option>
                                                <option value="Bolivie">Bolivie</option>
                                                <option value="Bosnie-Herzégovine">Bosnie-Herzégovine</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brésil">Brésil</option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bulgarie">Bulgarie</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodge">Cambodge</option>
                                                <option value="Cameroun">Cameroun</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cap-Vert">Cap-Vert</option>
                                                <option value="Chili">Chili</option>
                                                <option value="Chine">Chine</option>
                                                <option value="Chypre (pays)">Chypre (pays)</option>
                                                <option value="Colombie">Colombie</option>
                                                <option value="Comores (pays)">Comores (pays)</option>
                                                <option value="Corée du Nord">Corée du Nord</option>
                                                <option value="Corée du Sud">Corée du Sud</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                                <option value="Croatie">Croatie</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Danemark">Danemark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominique">Dominique</option>
                                                <option value="Égypte">Égypte</option>
                                                <option value="Émirats arabes unis">Émirats arabes unis</option>
                                                <option value="Équateur (pays)">Équateur (pays)</option>
                                                <option value="Érythrée">Érythrée</option>
                                                <option value="Espagne">Espagne</option>
                                                <option value="Estonie">Estonie</option>
                                                <option value="États fédérés de Micronésie (pays)">États fédérés de Micronésie (pays)</option>
                                                <option value="États-Unis">États-Unis</option>
                                                <option value="Éthiopie">Éthiopie</option>
                                                <option value="Fidji">Fidji</option>
                                                <option value="Finlande">Finlande</option>
                                                <option value="France">France</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambie">Gambie</option>
                                                <option value="Géorgie (pays)">Géorgie (pays)</option>
                                                <option value="Géorgie du Sud-et-les îles Sandwich du Sud">Géorgie du Sud-et-les îles Sandwich du Sud</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Grèce">Grèce</option>
                                                <option value="Grenade (pays)">Grenade (pays)</option>
                                                <option value="Groenland">Groenland</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinée">Guinée</option>
                                                <option value="Guinée équatoriale">Guinée équatoriale</option>
                                                <option value="Guinée-Bissau">Guinée-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Guyane">Guyane</option>
                                                <option value="Haïti">Haïti</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hongrie">Hongrie</option>
                                                <option value="Île Bouvet">Île Bouvet</option>
                                                <option value="Île Christmas">Île Christmas</option>
                                                <option value="Île Norfolk">Île Norfolk</option>
                                                <option value="Îles Caïmans">Îles Caïmans</option>
                                                <option value="Îles Cocos">Îles Cocos</option>
                                                <option value="Îles Cook">Îles Cook</option>
                                                <option value="Îles Féroé">Îles Féroé</option>
                                                <option value="Îles Heard-et-MacDonald">Îles Heard-et-MacDonald</option>
                                                <option value="Îles Mariannes du Nord">Îles Mariannes du Nord</option>
                                                <option value="Îles Marshall (pays)">Îles Marshall (pays)</option>
                                                <option value="Îles mineures éloignées des États-Unis">Îles mineures éloignées des États-Unis</option>
                                                <option value="Îles Pitcairn">Îles Pitcairn</option>
                                                <option value="Îles Turques-et-Caïques">Îles Turques-et-Caïques</option>
                                                <option value="Îles Vierges britanniques">Îles Vierges britanniques</option>
                                                <option value="Îles Vierges des États-Unis">Îles Vierges des États-Unis</option>
                                                <option value="Inde">Inde</option>
                                                <option value="Indonésie">Indonésie</option>
                                                <option value="Irak">Irak</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Irlande (pays)">Irlande (pays)</option>
                                                <option value="Islande">Islande</option>
                                                <option value="Italie">Italie</option>
                                                <option value="Jamaïque">Jamaïque</option>
                                                <option value="Japon">Japon</option>
                                                <option value="Jordanie">Jordanie</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kirghizistan">Kirghizistan</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Koweït">Koweït</option>
                                                <option value="La Réunion">La Réunion</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Les Antilles néerlandaises">Les Antilles néerlandaises</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Lettonie">Lettonie</option>
                                                <option value="Liban">Liban</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libye">Libye</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lituanie">Lituanie</option>
                                                <option value="Luxembourg (pays)">Luxembourg (pays)</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malaisie">Malaisie</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malouines">Malouines</option>
                                                <option value="Malte">Malte</option>*
                                                <option value="Maroc">Maroc</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Maurice (pays)">Maurice (pays)</option>
                                                <option value="Mauritanie">Mauritanie</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexique">Mexique</option>
                                                <option value="Moldavie">Moldavie</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolie">Mongolie</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibie">Namibie</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Népal">Népal</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norvège">Norvège</option>
                                                <option value="Nouvelle-Calédonie">Nouvelle-Calédonie</option>
                                                <option value="Nouvelle-Zélande">Nouvelle-Zélande</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Ouganda">Ouganda</option>
                                                <option value="Ouzbékistan">Ouzbékistan</option>
                                                <option value="Pakistank">Pakistan</option>
                                                <option value="Palaos">Palaos</option>
                                                <option value="Palestine">Palestine</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papouasie-Nouvelle-Guinée">Papouasie-Nouvelle-Guinée</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Pays-Bas">Pays-Bas</option>
                                                <option value="Pérou">Pérou</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pologne">Pologne</option>
                                                <option value="Polynésie française">Polynésie française</option>
                                                <option value="Porto Rico">Porto Rico</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="République arabe sahraouie démocratique">République arabe sahraouie démocratique</option>
                                                <option value="République centrafricaine">République centrafricaine</option>
                                                <option value="République de Macédoine (pays)">République de Macédoine (pays)</option>
                                                <option value="République démocratique du Congo">République démocratique du Congo</option>
                                                <option value="République dominicaine">République dominicaine</option>
                                                <option value="République du Congo">République du Congo</option>
                                                <option value="Roumanie">Roumanie</option>
                                                <option value="Royaume-Uni">Royaume-Uni</option>
                                                <option value="Russie">Russie</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint-Christophe-et-Niévès">Saint-Christophe-et-Niévès</option>
                                                <option value="Saint-Marin">Saint-Marin</option>
                                                <option value="Saint-Pierre-et-Miquelon">Saint-Pierre-et-Miquelon</option>
                                                <option value="Saint-Siège (État de la Cité du Vatican)">Saint-Siège (État de la Cité du Vatican)</option>
                                                <option value="Saint-Vincent-et-les-Grenadines">Saint-Vincent-et-les-Grenadines</option>
                                                <option value="Sainte-Hélène, Ascension et Tristan da Cunha">Sainte-Hélène, Ascension et Tristan da Cunha</option>
                                                <option value="Sainte-Lucie">Sainte-Lucie</option>
                                                <option value="Salomon">Salomon</option>
                                                <option value="Salvador">Salvador</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="Samoa américaines">Samoa américaines</option>
                                                <option value="Sao Tomé-et-Principe">Sao Tomé-et-Principe</option>
                                                <option value="Sénégal">Sénégal</option>
                                                <option value="Serbie-et-Monténégro">Serbie-et-Monténégro</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapour">Singapour</option>
                                                <option value="sk">Slovaquie</option>
                                                <option value="Slovaquie">Slovénie</option>
                                                <option value="Somalie">Somalie</option>
                                                <option value="Soudan">Soudan</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Suède">Suède</option>
                                                <option value="Suisse">Suisse</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard et ile Jan Mayen">Svalbard et ile Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Syrie">Syrie</option>
                                                <option value="Tadjikistan">Tadjikistan</option>
                                                <option value="Taïwan / (République de Chine (Taïwan))">Taïwan / (République de Chine (Taïwan))</option>
                                                <option value="Tanzanie">Tanzanie</option>
                                                <option value="Tchad">Tchad</option>
                                                <option value="Tchéquie">Tchéquie</option>
                                                <option value="Terres australes et antarctiques françaises">Terres australes et antarctiques françaises</option>
                                                <option value="Territoire britannique de l'océan Indien">Territoire britannique de l'océan Indien</option>
                                                <option value="tThaïlandeh">Thaïlande</option>
                                                <option value="Timor oriental">Timor oriental</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinité-et-Tobago">Trinité-et-Tobago</option>
                                                <option value="Tunisie">Tunisie</option>
                                                <option value="Turkménistan">Turkménistan</option>
                                                <option value="Turquie">Turquie</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Vanuatu">Vanuatu</option>;
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viêt Nam">Viêt Nam</option>
                                                <option value="Wallis-et-Futuna">Wallis-et-Futuna</option>
                                                <option value="Yémen">Yémen</option>
                                                <option value="Zambie">Zambie</option>
                                                <option value="Zimbabwe">Zimbabwe</option>       
                                             </select>
                                             @error('pays')
                                        <span class="invalid-feedback" role="alert" id="pays-validation-error">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <label for= "wilaya" id="wilayaLabel" class="col-lg-2 col-form-label form-control-label" hidden> @lang('signup.wilaya') <span class="required" style="color: red" >*</span></label> </label>
                                    <div class="col-lg-3">
                                        <!--<select class="form-control" id="wilaya" size="0">
                                        <option value="#">
                                            SELECT
                                            </option>
                                            <option value="Algiers">
                                            Algiers
                                            </option>
                                        </select> -->
                                        <select name="wilaya" class="form-control" id="wilaya" onchange="choseCommune(this.value,0)" hidden>
                                                                    <option value="Null"> @lang('signup.choose')...</option>
                                                                    <option value="1-Adrar ">01 - Adrar</option>
                                                                    <option value="2-Chlef">02 - Chlef</option>
                                                                    <option value="3-Laghouat">03 - Laghouat</option>
                                                                    <option value="4-Oum El Bouaghi">04 - Oum El Bouaghi</option>
                                                                    <option value="5-Batna">05 - Batna</option>
                                                                    <option value="6-Béjaïa">06 - Béjaïa</option>
                                                                    <option value="7-Biskra">07 - Biskra</option>
                                                                    <option value="8-Béchar">08 - Béchar</option>
                                                                    <option value="9-Blida">09 - Blida</option>
                                                                    <option value="10-Bouira">10 - Bouira</option>
                                                                    <option value="11-Tamanrasset">11 - Tamanrasset</option>
                                                                    <option value="12-Tébessa">12 - Tébessa</option>
                                                                    <option value="13-Tlemcen">13 - Tlemcen</option>
                                                                    <option value="14-Tiaret">14 - Tiaret</option>
                                                                    <option value="15-Tizi Ouzou">15 - Tizi Ouzou</option>
                                                                    <option value="16-Alger">16 - Alger</option>
                                                                    <option value="17-Djelfa">17 - Djelfa</option>
                                                                    <option value="18-Jijel">18 - Jijel</option>
                                                                    <option value="19-Sétif">19 - Sétif</option>
                                                                    <option value="20-Saïda">20 - Saïda</option>
                                                                    <option value="21-Skikda">21 - Skikda</option>
                                                                    <option value="22-Sidi Bel Abbès">22 - Sidi Bel Abbès</option>
                                                                    <option value="23-Annaba">23 - Annaba</option>
                                                                    <option value="24-Guelma">24 - Guelma</option>
                                                                    <option value="25-Constantine">25 - Constantine</option>
                                                                    <option value="26-Médéa">26 - Médéa</option>
                                                                    <option value="27-Mostaganem">27 - Mostaganem</option>
                                                                    <option value="28-M'Sila">28 - M'Sila</option>
                                                                    <option value="29-Mascara">29 - Mascara</option>
                                                                    <option value="30-Ouargla">30 - Ouargla</option>
                                                                    <option value="31-Oran">31 - Oran</option>
                                                                    <option value="32-El Bayadh">32 - El Bayadh</option>
                                                                    <option value="33-Illizi">33 - Illizi</option>
                                                                    <option value="34-Bordj Bou Arreridj">34 - Bordj Bou Arreridj</option>
                                                                    <option value="35-Boumerdès">35 - Boumerdès</option>
                                                                    <option value="36-El Tarf">36 - El Tarf</option>
                                                                    <option value="37-Tindouf">37 - Tindouf</option>
                                                                    <option value="38-Tissemsilt">38 - Tissemsilt</option>
                                                                    <option value="39-El Oued">39 - El Oued</option>
                                                                    <option value="40-Khenchela">40 - Khenchela</option>
                                                                    <option value="41-Souk Ahras">41 - Souk Ahras</option>
                                                                    <option value="42-Tipaza">42 - Tipaza</option>
                                                                    <option value="43-Mila">43 - Mila</option>
                                                                    <option value="44-Aïn Defla">44 - Aïn Defla</option>
                                                                    <option value="45-Naâma">45 - Naâma</option>
                                                                    <option value="46-Aïn Témouchent">46 - Aïn Témouchent</option>
                                                                    <option value="47-Ghardaïa">47 - Ghardaïa</option>
                                                                    <option value="48-Relizane">48 - Relizane</option>
                                                                    <option value="49-El M'Ghair">49 - El M'Ghair</option>
                                                                    <option value="50-El Meniaa">50 - El Meniaa</option>
                                                                    <option value="51-Ouled Djellal">51 - Ouled Djellal</option>
                                                                    <option value="52-Bordj Baji Mokhtar">52 - Bordj Baji Mokhtar</option>
                                                                    <option value="53-Béni Abbès">53 - Béni Abbès</option>
                                                                    <option value="54-Timimoun">54 - Timimoun</option>
                                                                    <option value="55-Touggourt">55 - Touggourt</option>
                                                                    <option value="56-Djanet">56 - Djanet</option>
                                                                    <option value="57-In Salah">57 - In Salah</option>
                                                                    <option value="58-In Guezzam">58 - In Guezzam</option>
                                                                    <option value="102">-</option>
                                                            </select>
                                    </div>
                                </div>
                                    

                               <div class="form-group row">
                                    <label for="phone" class="label-text col-md-3">@lang('signup.mobileNumberLabel') <span class="required" style="color: red">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('phone') is-invalid  @enderror"  id="phone" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert" id="phone-validation-error">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="email_customer" class="label-text col-md-3">@lang('signup.emailAddressLabel') <span class="required" style="color: red">*</span></label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control @error('email_customer') is-invalid  @enderror"  id="email_customer" name="email_customer" value="{{ old('email_customer') }}">
                                        @error('email_customer')
                                        <span class="invalid-feedback" role="alert" id="email_customer-validation-error">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="username" class="label-text col-md-3"> @lang('signup.userNameLabel') <span class="required" style="color: red">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('username') is-invalid  @enderror"  id="username" name="username" value="{{ old('username') }}">
                                        @error('username')
                                        <span class="invalid-feedback" role="alert" id="username-validation-error">
                                             {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="password" class="label-text col-md-3">@lang('signup.passwordLabel') <span class="required" style="color: red">*</span></label>
                                    <div class="col-md-9">
                                        <div>
                                            <input type="password" id="password-field"  class="form-control @error('password') is-invalid  @enderror"  id="password" name="password" value="{{ old('password') }}"> <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> </div>
                                        @error('password')

                                        <span class="invalid-feedback" role="alert" id="password-validation-error">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="label-text col-md-3">@lang('signup.confirmPasswordLabel')  <span class="required" style="color: red">*</span></label>
                                    <div class="col-md-9">
                                        <input type="password" id="password_confirmation-field" class="form-control @error('password_confirmation') is-invalid  @enderror"  id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"> <span toggle="#password_confirmation-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert" id="password_confirmation-validation-error">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label for="provenance" class="label-text col-md-3">  @lang('signup.origin') <span class="required" style="color: red">*</span></label>
                                <div class="col-md-9">
                                    <select class="form-control" id="provenance" name="provenance" onchange="showDiv(this)">
                                        <option value="Null" selected="" disabled>@lang('signup.choose')...</option>
                                        <option value="Moteur de recherche"> Contact commercial </option>
                                        <option value="Moteur de recherche"> Moteur de recherche </option>
                                        <option value="Facebook"> Facebook </option>
                                        <option value="Linkedin"> Linkedin </option>
                                        <option value="Twitter"> Twitter </option>
                                        <option value="Youtube"> Youtube </option>
                                        <option value="Lien sur un autre site"> Via un autre site </option>
                                        <option value="Presse"> Presse </option>
                                        <option value="Autre"> Autre... </option>
                                    </select>
                                </div>
                            </div>






                            <div class="form-group row">
                                <label for="other_provenanceLabel" id="other_provenanceLabel" class="label-text col-md-3" hidden> @lang('signup.other_origin')  <span class="required" style="color: red">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control @error('other_provenance') is-invalid  @enderror" placeholder="@lang('signup.other_origin2') " id="other_provenance" name="other_provenance" value="{{ old('other_provenance') }}" hidden>
                                    @error('other_provenance')
                                    <span class="invalid-feedback" role="alert" id="other_provenance-validation-error">
                                             {{ $message }}
                                         </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                                <div class="form-check mb-2 mr-sm-2" >
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input @error('general_condition') is-invalid  @enderror" style="top: 8px;" name="general_condition" id="general_condition">
                                        <p class="label-text-check" inline> &nbsp <strong>  <a href="{{route('terms-of-service')}}" target="_blank" id="sauve" class="label-text-check-anchor">@lang('signup.iAccept') @lang('signup.generalConditions')</a> </p> </strong>
                                        @error('general_condition')
                                        <span class="invalid-feedback" role="alert" id="general_condition-validation-error">
                                              {{ $message }}
                                        </span>
                                        @enderror
                                    </label>
                                </div>

                                <div class="form-check mb-2 mr-sm-2" >
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input @error('receive_newsletters') is-invalid  @enderror" style="top: 8px;" name="receive_newsletters" id="receive_newsletters" checked>
                                        <p class="label-text-check" inline> &nbsp <strong>  <a href="#"  id="sauve_news" class="label-text-check-anchor test">@lang('footer.subscribeNewsletter')</a> </p> </strong>
                                        @error('receive_newsletters')
                                        <span class="invalid-feedback" role="alert" id="general_condition-validation-error">
                                              {{ $message }}
                                        </span>
                                        @enderror
                                    </label>
                                </div>
<style>
    #sauve:active, #sauve:hover {
    color: #f9b634!important;
}

.test{
    pointer-events: none;
}
</style>

                                <br>
                                <center>
                                
                                    <div style="center:center">
                                        <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                        @if($errors->has('g-recaptcha-response'))
                                            <span class="invalid-feedback" style="display:block">
                                                <strong> {{$errors->first('g-recaptcha-response')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                               
                                <br>
                                    </center>

                            
                            <!--    <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="janeuser">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="11111122333">
                                        <small class="form-text text-muted" id="passwordHelpBlock">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="11111122333">
                                    </div>
                                </div> -->

                                <center><div class="form-group row" style="center:center; width:150px;text-align:center" >
                                    <label class="col-lg-3 col-form-label form-control-label"></label>

                                       <!-- <input class="btn btn-secondary" type="reset" value="Cancel"> -->
                                        <input type="submit" class="btn btn-warning" id="register_button" value="ENVOYER" target="_blank" style="border: 2px solid white;border-radius: 3px;">

                                </div></center>
                            </form>
                            <div class="alert alert-info" style="display: none;"></div>
                        </div>
                    </div><!-- /form user info -->
               
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
<script src="{{ asset('js/front-end/main.js') }}"></script>
@endsection