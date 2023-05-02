@extends('admin.layouts.master')
@section('head')
	<style type="text/css">
	.dataTables_filter{
		display: none;
		}
	</style>
@endsection
@section('content')
<div class="col-xl-12">
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
    $sql2 = "SELECT * FROM `stats_visites` WHERE `stats_visites`.`date_visite` = CURDATE()-1";
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
    $sql1 = "SELECT * FROM `stats_visites` WHERE `stats_visites`.`date_visite` = CURDATE()";
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
<td> <center> <p style='font-size:15px'><strong> &nbsp; Nombre moyen des pages consultés par jour  &nbsp; <br>   <a href='#' style='color:red'> $sum_moyen </strong>  </a> </p> </center> </td>
</tr>

<tr>


</table> </center>


";





    ?>
    <br>
    <br>
    <!--<form method="GET" id="search-form" class="kt-form kt-form--fit mb-15" role="form">
        <div class="row mb-6">
            <div class="col-lg-3 mb-lg-0 mb-6">
                <label> <b> Rechercher les statistiques par date </b></label>
                <input type="text" class="form-control datatable-input" name="search" placeholder="Rechercher" />
            </div>
            <!--<div class="col-lg-3 mb-lg-0 mb-6">
             <label>Status</label>
             <select class="form-control datatable-input searchStatus" name="status">
                 <option value="">Select</option>
                 <option value="1">Active</option>
                 <option value="0">Inactive</option>
             </select>
         </div> -->
            <!--<div class="col-lg-3 mb-lg-0 mb-6">
             <label>Payment Status</label>
             <select class="form-control datatable-input payment_status" name="payment_status">
                 <option value="">Select</option>
                 <option value="completed">Completed</option>
                 <option value="pending">Pending</option>
                 <option value="cancel">Cancel</option>
             </select>
         </div>
        </div>
        <div class="row mt-8">
            <div class="col-lg-12">
                <button class="btn btn-primary btn-primary--icon" id="kt_search">
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
    </form>-->








    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                                <center><table  class="table table-bordered table-hover table-checkable w-100" id="statistic_datatable" border="1" width="80%" cellpadding="4">
                                    <thead class="datatable-head">
                                    <tr>
                                        <th>Adresses IP Connectées </th>
                                        <th>Date Visite </th>
                                        <th>Pages Vues</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($rows  as $row): ?>
                                    <tr>
                                        <td><?php echo $row['ip'] ;?></td>
                                        <td><?php echo $row['date_visite'] ;?></td>
                                        <td><?php echo $row['pages_vues'] ;?></td>

                                    </tr>
                    <?php endforeach; ;?>
                    </tbody>

                </table> </center>
                </div>
        </div>
    </div>

    <script type="text/javascript">

        $(function () {
            var table = $('#statistic_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('statistics-visitors') }}",
                    data: function (d){
                        d.search = $('input[name=search]').val();

                    }
                },

                "order": [[ 4, "desc" ]],

            });

            $('#search-form').on('submit', function(e) {
                table.draw();
                e.preventDefault();
            });

            $('#kt_reset').on('click', function(e) {
                $('input[name=search]').val('');

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
    </style>



</div>
@endsection