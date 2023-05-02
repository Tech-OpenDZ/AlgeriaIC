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
            <div class="dataTables_info" id="statistics_datatable_info" role="status" aria-live="polite"> </div>

            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-bordered table-checkable w-100" id="statistics_datatable">
                            <thead class="datatable-head">
                            <tr>
                                <th scope="col">Adresses IP Connectées</th>
                                <th scope="col">Pages Vues</th>
                                <th scope="col">Date Visite</th>

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



                    }
                },
                columns: [
                    {data: 'ip', name: 'ip'},
                    {data: 'pages_vues', name: 'pages_vues'},
                   {data: 'date_visite', name: 'date_visite'},

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


        div.dataTables_wrapper div.dataTables_info {
            padding-top: 0.85em;
            white-space: nowrap;
            color: red!important;
            font-weight: 800;
            font-size:15px;
        }


    </style>













</div>
@endsection