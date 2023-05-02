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
    @php
        if (\Auth::user()->can('statistics-view')) {
            $actionEnable = true;
        }
        else {
            $actionEnable = true;
        }
    @endphp
<div class="col-xl-12">

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Gestion de visiteurs</h3>
            </div>
        </div>
        <div class="col-xl-12">
            <br>
            <?php
            // On indique au navigateur qu'on utilise l'encodage UTF-8
            header('Content-type: text/html; charset=utf-8');

            /*$servername = "localhost";
            $username = "algeriainvest_v1";
            $password = "Toe7huTp2n_ty2Xs";
            $dbname = "algeriainvest_v1";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<h1> <center> <strong> Page Under Construction ... </strong> </center> </h1> ";
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM stats_visites limit 150";
            $result = $conn->query($sql);
            $conn->close();*/
            $bd_dsn = 'mysql:host=localhost;dbname=algeriainvest_v1;charset=utf8';
            $bd_user = "algeriainvest_v1";
            $bd_pass = "Toe7huTp2n_ty2Xs";

            try{
                $bdd = new PDO($bd_dsn,$bd_user,$bd_pass);
                // echo "connexion reussite";

            }
            catch(PDOException $ex){
                echo "ECHEC".$ex->getMessage();
            }

/*
            $sqln = "SELECT * FROM stats_visites where pays = 'United Kingdom'";
            $stmtn = $bdd->prepare($sqln);
            
            $stmtn->execute();
            $rowsn = $stmtn->fetchAll();
            $nbrrowsn = $stmtn->rowCount();
            
            
            
            foreach($rowsn as $rown){
            
                $ipp = $rown['ip'];
            
                
                $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ipp;
                $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
                $rown['pays'] = $addrDetailsArr['geoplugin_countryName'];
                
                $sqlnew = "UPDATE stats_visites SET pays = :n where ip = :ip ";
                $stmtnew = $bdd ->prepare($sqlnew);
                $stmtnew ->bindValue(':n', $rown['pays'],PDO::PARAM_STR);
                 $stmtnew ->bindValue(':ip', $ipp,PDO::PARAM_STR);
                $rown['pays'] = $stmtnew->execute();
            
        
            
            }
*/
            //$status = 1;
            $sql = "SELECT * FROM `stats_visites` ORDER BY `stats_visites`.`date_visite` DESC";
            $stmt = $bdd->prepare($sql);
            //$stmt->bindValue(1,$status,PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $nbrrows = $stmt->rowCount();
            echo "<center> <h4> Nombre de visiteurs depuis le 18/11/2021 : <a href='#' style='color:red'>  $nbrrows  </a> </h4> </center>";
            echo "<br> ";

            $sum=0;
            foreach($rows as $row){
                $sum+=$row['pages_vues'];
            }

            //echo $sum ;
            echo "<center> <h4> Nombre de pages visitées depuis le 18/11/2021 :  <a href='#' style='color:red'>  $sum   </a> </h4> </center>";
            echo "<br> ";




            //$date_today = GETDATE()  ;
            $sql2 = "SELECT * FROM `stats_visites` WHERE `stats_visites`.`date_visite` = DATE_SUB(CURRENT_DATE(),INTERVAL 1 DAY)";
            $stmt2 = $bdd->prepare($sql2);
            //$stmt->bindValue(1,$status,PDO::PARAM_STR);
            $stmt2->execute();
            $rows2 = $stmt2->fetchAll();
            $nbrrows2 = $stmt2->rowCount();
            /* echo "<center> <h4> Nombre de visiteurs hier était : $nbrrows2  </h4> </center>";
             echo "<br>  ";*/

            $sum_hier = 0;
            foreach($rows2 as $row2){
                $sum_hier+=$row2['pages_vues'];
            }

            //echo $sum ;
            /*echo "<center> <h4> Nombre de pages visitées hier :  <a href='#' style='color:red'>  $sum_hier   </a> </h4> </center>";
             echo "<br> ";*/






            //$date_today = GETDATE()  ;
            $sql1 = "SELECT * FROM `stats_visites` WHERE `stats_visites`.`date_visite` = CURDATE() ORDER BY created_at DESC";
            $stmt1 = $bdd->prepare($sql1);
            //$stmt->bindValue(1,$status,PDO::PARAM_STR);
            $stmt1->execute();
            $rows1 = $stmt1->fetchAll();
            $nbrrows1 = $stmt1->rowCount();

            $sum_today = 0;
            foreach($rows1 as $row1){
                $sum_today+=$row1['pages_vues'];
            }

            //echo $sum ;



            /* echo "<center> <h4> Nombre de visiteurs aujourd'hui est : $nbrrows1  </h4> </center>";
             echo "<br>  ";*/
            $now = time(); // or your date as well
            $your_date = strtotime("2021-11-18");
            $datediff = ($now - $your_date);


            $diff =  round($datediff / (60 * 60 * 24));
            //echo $diff;
            $nbrmoyen =  (int) ($nbrrows / $diff );
            /* echo "<center> <h4> Nombre de visiteurs moyen est :  $nbrmoyen  </h4> </center>";
             echo "<br>  "; */


            $sum_moyen = (int) ($sum / $diff );



            echo "
<center> <table border=1>
<tr>

<td> <center> <p style='font-size:15px'>  <strong> Nombre de visiteurs <b> HIER </b> <br> <a href='#' style='color:red'> $nbrrows2 </strong>   &nbsp;  &nbsp;   &nbsp;   </a> </p> </center> </td>
<td> <center> <p style='font-size:15px'>  <strong> Nombre de visiteurs <b> AUJOURD'HUI </b> <br>  <a href='#' style='color:red'> $nbrrows1   </strong>  </a> </p> </center>  </td>
<td> <center> <p style='font-size:15px'><strong> Nombre moyen de visiteurs par jour  <br> <a href='#' style='color:red'> $nbrmoyen </strong>  &nbsp;  &nbsp;   &nbsp; </a> </p> </center> </td>
</tr>

<tr>

<td> <center> <p style='font-size:15px'><strong> &nbsp; Nombre de pages consultées <b> HIER </b> &nbsp; <br>  <a href='#' style='color:red'> $sum_hier </strong>  &nbsp;  &nbsp;   &nbsp; </a> </p> </center> </td>
<td> <center> <p style='font-size:15px'><strong> &nbsp; Nombre de pages consultées <b> AUJOURD'HUI </b> &nbsp;  <br> <a href='#' style='color:red'> $sum_today </strong>  </a> </p> </center> </td>
<td> <center> <p style='font-size:15px'><strong> &nbsp; Nombre moyen des pages consultées par jour  &nbsp; <br>   <a href='#' style='color:red'> $sum_moyen </strong>  </a> </p> </center> </td>
</tr>

<tr>


</table> </center>


";





            ?>


        <div class="card-body">

            <form method="POST" action="{{route('manage-statistics.index')}}" id="search-form" class="kt-form kt-form--fit mb-15" role="form">

                <div class="row mb-6">
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Rechercher par date</label>
                        <input type="date" class="form-control datatable-input" name="search" id="search" placeholder="Rechercher" />
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Rechercher par adresse IP </label>
                        <input type="text" class="form-control datatable-input searchIP" name="search_ip" placeholder="Rechercher" />
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Rechercher par pays </label>
                      
                        <select type="text" class="form-control datatable-input searchPays" name="search_pays" placeholder="Rechercher" >
                            <option value="" selected>Choisir...</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-bissau">Guinea-bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                          
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                            <option value="Korea, Republic of">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-leste">Timor-leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-8">
                    <div class="col-lg-6">
                        <button name="kt_search" class="btn btn-primary btn-primary--icon" id="kt_search">
						<span>
							<i class="la la-search"></i>
							<span>Rechercher</span>
						</span>
                        </button>&#160;&#160;
                        <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
						<span>
							<i class="la la-close"></i>
								<span>Réinitialiser</span>
						</span>
                        </button>
                    </div>
                </div>
            </form>



<script>
    document.getElementById('search').innerHTML = date1;
</script>
            <div class="dataTables_info" id="statistics_datatable_info" role="status" aria-live="polite">   </div>

            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-bordered table-checkable w-100" id="statistics_datatable">
                            <thead class="datatable-head">
                            <tr>
                                <th scope="col">Adresses IP Connectées</th>
                                <th scope="col">Pages Vues</th>
                                <th scope="col">Date Visite</th>
                                <th scope="col">Pays</th>

                               <!-- <th scope="col">Heure de visite</th> -->
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- User Reply confirmation model -->
    <div class="modal fade" id="replymodel" role="document">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <!-- User Delete confirmation model -->
    <div id="adminModal" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            var table = $('#statistics_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('manage-statistics.index')}}",
                    data: function (d){
                        d.search = $('input[name=search]').val();
                        d.search_ip = $('input[name=search_ip]').val();
                        d.search_pays = $('select[name=search_pays]').val();



                    }
                },
                columns: [
                    {data: 'ip', name: 'ip'},
                    {data: 'pages_vues', name: 'pages_vues'},
                    {data: 'date_visite', name: 'date_visite'},
                    {data: 'pays', name: 'pays'},

                  /* {
                       data: 'created_at',
                       type: 'datetime',
                       render: {
                           _: 'display',
                           sort: 'timestamp'
                       }
                    }, */


                ],
                "order": [[ 2, "desc" ]],
            });

            $('#search-form').on('submit', function(e) {
                table.draw();
                e.preventDefault();
            });





            $('#kt_reset').on('click', function(e) {
                $('input[name=search]').val('');
                $('input[name=search_ip]').val('');
                $('select[name=search_pays]').val('');
                table.draw();
                e.preventDefault();
            });






        });


    </script>

    <style>
        html, body {
            height: 100%;
            margin: 0px;
            padding: 0px;
            font-size: 11.5px !important;
            font-weight: 400;
            font-family: Poppins, Helvetica, "sans-serif";
            -ms-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }


        div.dataTables_wrapper div.dataTables_info  {
            padding-top: 0.85em;
            white-space: nowrap;
            color: red!important;
            font-weight: 800;
            font-size:15px;
        }


    </style>













</div>
@endsection