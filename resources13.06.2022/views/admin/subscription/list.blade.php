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
        if (\Auth::user()->can('subscription-edit') || \Auth::user()->can('subscription-delete') || \Auth::user()->can('subscribers-list')) {
            $actionEnable = true;
        }
        else {
            $actionEnable = false;
        }
    @endphp
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


    <?php
$servername = "localhost";
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

$sql = "SELECT * FROM customers limit 150";
$result = $conn->query($sql);
$conn->close();
/*$bd_dsn = 'mysql:host=localhost;dbname=algeriainvest_v1;charset=utf8';
$bd_user = "root";
$bd_pass = "";

try{
    $bdd = new PDO($bd_dsn,$bd_user,$bd_pass);
     echo "connexion reussite";

}
catch(PDOException $ex){
    echo "ECHEC".$ex->getMessage();
}
//$status = 1;
$sql = "SELECT * FROM customers";
$stmt = $bdd->query($sql);
//$stmt->bindValue(1,$status,PDO::PARAM_STR);
/*$stmt->execute();*/
/*$rows = $stmt->fetchAll();*/



?>




<div class="dataTables_wrapper dt-bootstrap4 no-footer">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table class="table table-bordered table-hover table-checkable w-100" id="subscription_datatable">
                <thead class="datatable-head">
                        <tr>
                            <th>ID</th>
                            <th>Nom et prénom</th>
                            <th>Fonction</th>
                            <th>Entreprise </th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Crée Le</th>
                           
                           
                            <th>Commentaire</th>
                            <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                        <?php while($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id'] ;?></td>
                            <td><?php echo $row['name'] ;?></td>
                            <td><?php echo $row['job_title'] ;?></td>
                            <td><?php echo $row['company_name']; ?></td>
                            <td><?php echo $row['email']; ?> </td>
                            <td><?php echo $row['mobile_number']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            
                           
                            <td><?php echo $row['note'] ;?></td>
                            <td><a class="edit_user_btn" href="{{route('update')}}?idd=<?php echo $row['id']  ?>" title="edit"> <i class="fas fa-edit" aria-hidden="true" style="color:#3699FF" ></i> </a></td>
                        </tr>
                    <?php } ;?>
                </tbody>

            </table>
        </div>
    </div>
</div>


@endsection