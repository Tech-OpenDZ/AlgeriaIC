@extends('admin.layouts.master')
@section('head')
	<style type="text/css">
	.dataTables_filter{
		display: none;
		}
	</style>
@endsection
@section('content')
@include('alert_messages')
<div class="col-xl-12">
    <!--begin::Card-->
    <div class="card card-custom gutter-b card-stretch">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Section-->
            <div class="d-flex align-items-center">

                <!--begin::Info-->
                <div class="d-flex flex-column mr-auto">
                    <!--begin: Title-->
                    <!--<a href="#" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{$user->name}}</a>
                    <span class="text-muted font-weight-bold">{{$user->job_title}} at {{$user->company_name}}</span> -->
                    <!--end::Title-->
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-user') }}">Retour</a>
                   <!-- <a class="btn btn-primary" href="{{ url()->previous() }}" disabled>Modifier</a> -->
                </div>
            </div>
            <!--end::Section-->
            <!--begin::Content-->
            <div class="d-flex flex-wrap mt-7">

                <!--<div class="mr-12 d-flex flex-column mb-7">
                    <span class="d-block font-weight-bold mb-4">Subscription</span>
                    <span>{{$subscription->localeAll[0]->name}}</span> 
                </div>
                @if ($is_parent && $parent_data->payment_status == 'completed' && $parent_data->subscription_id >1)
                <div class="mr-12 d-flex flex-column mb-7">
                    <span class="d-block font-weight-bold mb-4">Start Date</span>
                    <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{date('d M Y',strtotime($plan_data->start_date))}}</span>
                </div>
                <div class="mr-12 d-flex flex-column mb-7">
                    <span class="d-block font-weight-bold mb-4">Expiry Date</span>
                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{date('d M Y',strtotime($plan_data->end_date))}}</span>
                </div>
                @else
                <div class="mr-12 d-flex flex-column mb-7">
                    <span class="d-block font-weight-bold mb-4">Payment Status</span>
                    @if ($parent_data->subscription_id == 1)
                    <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{$parent_data->payment_status}}</span>
                    @else
                        @if ($parent_data->payment_status == 'completed')
                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{$parent_data->payment_status}}</span>
                        @else
                        <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{$parent_data->payment_status}}</span>
                        @endif
                    @endif
                </div>
                @endif
            </div> -->
            <!--begin::Text-->
           <!-- <div class="row">
                <div class="col-xl-6">
                <p class="mb-7 mt-3"><strong>Nom et Prénom: </strong>{{$user->name}}</p>
                <p class="mb-7 mt-3"><strong>Job Title: </strong>{{$user->job_title}}</p>
                <p class="mb-7 mt-3"><strong>Entreprise: </strong>{{$user->company_name}}</p>
                
                    <p class="mb-7 mt-3"><strong>Username: </strong>{{$user->username}}</p>
                    <p class="mb-7 mt-3"><strong>Téléphone: </strong>{{$user->mobile_number}}</p>
                    <p class="mb-7 mt-3"><strong>Company Address: </strong>{{$user->company_address}}</p>
                </div>
                <div class="col-xl-6">

                    @if (!$is_parent)
                    <p class="mb-7 mt-3"><strong>Main User Username: </strong>{{$parent_data->username}}</p>
                    @endif
                    <p class="mb-7 mt-3"><strong>Email: </strong>{{$user->email}}</p>
                    <p class="mb-7 mt-3"><strong>Crée le: </strong>{{date('d M Y',strtotime($user->created_at))}}</p>

                    
                </div>
            </div> -->


            <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-10 col-md-offset-1  col-sm-10 ">
            <div class="panel panel-info">
                 <div class="panel-heading">
                 <div class="panel-title" style="text-align: center"> Mise à Jour </div>
            </div>

             <div class="panel-body" >
                <form  class="form-horizontal" role="form" method="post" id="update-user-data-form" name="update-user-data-form" action="{{route('userUpdate')}}">
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
                                font-size: 0.90rem !important;
                                padding-top: 0px;
                                position: absolute;
                                center: center;
                                padding-left: 102px!important;
                            }
                        </style>


                    @elseif( Session::has( 'error' ))
                        <div class="danger-alert-msg col-md-12">
                            {{ Session::get( 'error' ) }}
                        </div><br>
                    @endif


                    <div class="form-group">
                        <!-- <label for="name" class="label-text col-md-3">Inscription id <span class="required" style="color: red">*</span></label> -->
                        <div class="col-md-9">
                            <input type="hidden" class="form-control @error('id') is-invalid  @enderror" placeholder="Inscription id " id="id" name="id" value="{{$user->id}}">
                            @error('subscription_id')
                            <span class="invalid-feedback" id="id-validation-error" role="alert">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- <label for="name" class="label-text col-md-3">Inscription id <span class="required" style="color: red">*</span></label> -->
                        <div class="col-md-9">
                            <input type="hidden" class="form-control @error('subscription_id') is-invalid  @enderror" placeholder="Inscription id " id="subscription_id" name="subscription_id" value="{{$user->subscription_id}}">
                            @error('subscription_id')
                            <span class="invalid-feedback" id="subscription_id-validation-error" role="alert">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>

                    <p class="mb-7 mt-3"><strong>Date de création :  </strong>{{date('d M Y',strtotime($user->created_at))}}</p>


                    <div class="form-group">
                        <label for="name" class="label-text col-md-3"> Nom et Prénom <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('name') is-invalid  @enderror" placeholder="Nom et Prénom " id="name" name="name" value="{{$user->name}}">
                            @error('name')
                        <span class="invalid-feedback" id="name-validation-error" role="alert">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>

                   
                    <div class="form-group">
                        <label for="companyName" class="label-text col-md-3"> Nom de l'entrprise <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('companyName') is-invalid  @enderror" placeholder="Nom de l'entrprise" id="companyName" name="companyName" value="{{$user->company_name}}">
                            @error('companyName')
                         <span class="invalid-feedback" role="alert" id="companyName-validation-error">
                             {{ $message }}
                         </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="jobTitle" class="label-text col-md-3"> Intitulé de poste  <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('jobTitle') is-invalid  @enderror" placeholder="Intitulé de poste " id="jobTitle" name="jobTitle" value="{{$user->job_title}}">
                            @error('jobTitle')
                         <span class="invalid-feedback" role="alert" id="jobTitle-validation-error">
                          {{ $message }}
                         </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="address" class="label-text col-md-3">Adresse <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('address') is-invalid  @enderror" placeholder="Adresse" id="address" name="address" value="{{$user->company_address}}">
                            @error('address')
                        <span class="invalid-feedback" role="alert" id="address-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Pays <span class="required" style="color: red">*</span></label> </label>
                        <div class="col-lg-3">
                            <!--<select class="form-control" id="country" size="0">
                            <option value="#">
                                SELECT
                                </option>
                                <option value="Algeria">
                                Algeria
                                </option>
                            </select> -->

                            <select name="pays" class="form-control" id="pays" onchange="choseCountry(this.value,0)" value="{{$user->pays}}">

                                <option value="" disabled>@lang('signup.choose') ...</option>
                                <option value="{{$user->pays}}" selected>{{$user->pays}} </option>
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
                        </div>
                        <label for= "wilaya" id="wilayaLabel" class="col-lg-2 col-form-label form-control-label" >Wilaya <span class="required" style="color: red">*</span></label> </label>
                        <div class="col-lg-3">
                            <!--<select class="form-control" id="wilaya" size="0">
                            <option value="#">
                                SELECT
                                </option>
                                <option value="Algiers">
                                Algiers
                                </option>
                            </select> -->
                            <select name="wilaya" class="form-control" id="wilaya"  value="{{$user->wilaya}}">
                                <option value=""> @lang('signup.choose')...</option>
                                <option value="{{$user->wilaya}}" selected>{{$user->wilaya}} </option>
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







                    <div class="form-group">
                        <label for="phone" class="label-text col-md-3">@lang('signup.mobileNumberLabel') <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('phone') is-invalid  @enderror" placeholder="@lang('signup.mobileNumberLabel')" id="phone" name="phone" value="{{$user->mobile_number}}">
                            @error('phone')
                        <span class="invalid-feedback" role="alert" id="phone-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="email_customer" class="label-text col-md-3">@lang('signup.emailAddressLabel') <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="email" class="form-control @error('email_customer') is-invalid  @enderror" placeholder="@lang('signup.emailAddressLabel')" id="email_customer" name="email_customer" value="{{$user->email}}">
                            @error('email_customer')
                        <span class="invalid-feedback" role="alert" id="email_customer-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="username" class="label-text col-md-3"> @lang('signup.userNameLabel') <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="text" class="form-control @error('username') is-invalid  @enderror" placeholder="@lang('signup.userNameLabel')" id="username" name="username" value="{{$user->username}}">
                            @error('username')
                        <span class="invalid-feedback" role="alert" id="username-validation-error">
                             {{ $message }}
                        </span>
                             @enderror
                        </div>
                    </div>

                
                   
                    <div class="form-group">
                        <label for="password" class="label-text col-md-3">@lang('signup.passwordLabel') <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                            <div>
                        <input type="password" id="password-field"  class="form-control @error('password') is-invalid  @enderror" placeholder="@lang('signup.passwordLabel')" id="password" name="password" value="{{$user->password}}"> <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> </div>
                            @error('password')
                            
                        <span class="invalid-feedback" role="alert" id="password-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>

                  


                    <div class="form-group">
                        <label for="password" class="label-text col-md-3"> Confirmation mot de passe  <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <input type="password" id="password_confirmation-field" class="form-control @error('password_confirmation') is-invalid  @enderror" placeholder="Confirmation mot de passe" id="password_confirmation" name="password_confirmation" value="{{$user->password}}"> <span toggle="#password_confirmation-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('password_confirmation')
                        <span class="invalid-feedback" role="alert" id="password_confirmation-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="note" class="label-text col-md-3"> Commentaire <span class="required" style="color: red">*</span></label>
                        <div class="col-md-9">
                        <textarea  id="note" class="form-control @error('note') is-invalid  @enderror" placeholder="note" rows="5" name="note" value="{{$user->note}}"> {{$user->note}} </textarea>
                            @error('password_confirmation')
                        <span class="invalid-feedback" role="alert" id="note-validation-error">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-check mb-2 mr-sm-2">
                        <label class="form-check-label">
                            <input type="hidden" class="form-check-input @error('general_condition') is-invalid  @enderror" name="general_condition" id="general_condition" value="1" checked>
                            <p class="label-text-check pt-1"> &nbsp &nbsp  <a href="{{route('terms-of-service')}}" target="_blank" class="label-text-check-anchor"></a> </p>
                            @error('general_condition')
                            <span class="invalid-feedback" role="alert" id="general_condition-validation-error">
                                  {{ $message }}
                            </span>
                            @enderror
                        </label>
                    </div>


                    <div class="form-group" >
                        <div class=" col-md-4 col-md-offset-5" style=" margin-top:20px;">

                             <button type="submit" class="btn btn-info col-md-12" id="continue_button" style="background-color: deepskyblue"> Mettre à Jour </button>
                         <center><!-- <button type="submit" value="subscribe" class="genric-btn success radius" id="btn-validate" style="border: 1px solid white;border-radius: 3px;" onclick="myFunction()"> Modifier </button> </center>-->
                        </div>


                       <!-- <div class="validate-button col-md-4 col-md-offset-5" style=" margin-top:20px;">
                                            <button type="submit" form="update-user-data-form" id ="update-user-data-form-submit" class="common-button">@lang('my_account.validate')</button>
                                        </div> -->
                    </div>
                </form>
            </div> 
        </div>
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

                var edit_info = '';
            $(".edit-info").click(function() {
                edit_info = 'edited';
            });
            $("#update-user-data-form-submit").click(function() {
                if (edit_info == 'edited'){

                    $("#update-user-data-form").submit();
                }
            });

                if ($('textarea#note') != undefined) {
                    var message = $('textarea#note').val();
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
                            document.getElementById("other_provenance").value = "NULL";

                        }



                    }
                </script>

<style>
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }
</style>
                <style>
                    .success-alert-msg {
                        color: #35A85E !important;
                        font-weight: 700;
                        font-size: 1.2rem !important;
                        padding-top: 0px;
                        position: absolute;
                        center: center;
                        text-align:center;
                        padding-left: 210px !important;
                    }
                </style>
           <!-- @if ($is_parent && $parent_data->subscription_id > 1)
            <p class="mb-7 mt-3"><strong>Account Users ( {{count($child_data)}}/{{$parent_data->subscription->no_of_users}})</strong></p>
                @if(!$child_data->isEmpty())
                    @foreach ($child_data as $customer)
                    <p class="mt-2">{{$customer->email}}</p>
                    @endforeach
                @else
                <p class="mt-2">No sub user added.</p>
                @endif
            @endif -->

        </div>

    </div>
    <!--end::Card-->
</div>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
@endsection
