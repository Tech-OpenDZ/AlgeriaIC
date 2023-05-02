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
    if (\Auth::user()->can('subscribers-view')) {
        $actionEnable = true;
    }
    else {
        $actionEnable = false;
    }
@endphp
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label"> Demandes en attente </h3>
		</div>
        @if ($subscription != [])
        <div class="card-toolbar">
            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('manage-subscription.index') }}">Retour</a>
            </div>
        </div>
        @endif
	</div>
   <div class="card-body">
   <form method="POST" id="search-form" class="kt-form kt-form--fit mb-15" role="form">
   			<div class="row mb-6">
   				<div class="col-lg-3 mb-lg-0 mb-6">
   					<label>Rechercher</label>
					<input type="text" class="form-control datatable-input" name="search" placeholder="Rechercher" />
   				</div>
   				<div class="col-lg-3 mb-lg-0 mb-6">
					<label>Status</label>
					<!-- <select class="form-control datatable-input searchStatus" name="status">
						<option value="">Select</option>
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select> -->
                    <option class="form-control datatable-input searchStatus" name="status" value="1">Active</option>

                </div>
   				<div class="col-lg-3 mb-lg-0 mb-6">
					<label>Payment Status</label>
					<!-- <select class="form-control datatable-input payment_status" name="payment_status">
						<option value="">Select</option>
						<option value="completed">Completed</option>
						<option value="pending">Pending</option>
						<option value="cancel">Cancel</option>
					</select> -->
                    <option class="form-control datatable-input payment_status" name="payment_status" value="pending"> Pending </option>
				</div>

                <div class="col-lg-3 mb-lg-0 mb-6">
					<label>Compte désactivé</label>
					<!-- <select class="form-control datatable-input payment_status" name="payment_status">
						<option value="">Select</option>
						<option value="completed">Completed</option>
						<option value="pending">Pending</option>
						<option value="cancel">Cancel</option>
					</select> -->
                    <option class="form-control datatable-input is_deactivated" name="is_deactivated" value="1"> Désactivé </option>
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
   		</form>


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
//$status = 1;
$sql = "SELECT * FROM customers";
$stmt = $bdd->prepare($sql);
//$stmt->bindValue(1,$status,PDO::PARAM_STR);
$stmt->execute();
$nbr = $stmt->rowCount();
//echo " <td> <a href='#'> <strong> Nombre de tous les clients :   <mark> $nbr </mark>  </strong>   &nbsp;  &nbsp;   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </a></td>";


  /*              Listes des clients en attentes        */

  $payment_status = 'pending';
  $is_deactivated = 1;
  $sql2 = "SELECT * FROM customers WHERE payment_status=? && is_deactivated=?";
  $stmt2 = $bdd->prepare($sql2);
  $stmt2->bindValue(1,$payment_status,PDO::PARAM_STR);
  $stmt2->bindValue(2,$is_deactivated,PDO::PARAM_STR);
  $stmt2->execute();

  $nbr2 = $stmt2->rowCount();
  //echo " <td> <a href='new_subscriber_list'> <strong> Nombre des demandes en attente : <mark> $nbr2 </mark>   </strong>  <br> <br> </a>  </td>";



/*              Listes des clients Actifs         */

       //$payment_status = 'completed';
       $is_deactivated = 0;
       $sql1 = "SELECT * FROM customers WHERE is_deactivated=?";
       $stmt1 = $bdd->prepare($sql1);
       //$stmt1->bindValue(1,$payment_status,PDO::PARAM_STR);
       $stmt1->bindValue(1,$is_deactivated,PDO::PARAM_STR);
       $stmt1->execute();

       $nbr1 = $stmt1->rowCount();
      // echo "<td> <a href='actif_subscriber_list'> <strong> Nombre des clients actifs : <mark> $nbr1 </mark>   </strong>  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </a> </td>";


        /*              Listes des clients en suspendus        */

        $payment_status = 'completed';
        $is_deactivated = 1;
        $sql3 = "SELECT * FROM customers WHERE payment_status=? && is_deactivated=?";
        $stmt3 = $bdd->prepare($sql3);
        $stmt3->bindValue(1,$payment_status,PDO::PARAM_STR);
        $stmt3->bindValue(2,$is_deactivated,PDO::PARAM_STR);
        $stmt3->execute();
 
        $nbr3 = $stmt3->rowCount();
        //echo "<td><a href='suspended_subscriber_list'> <strong> Nombre des clients suspendus : <mark> $nbr3  </mark> </strong>  <br> <br></a></td>";
            echo "
            <center> <table>
            <tr>
            <td> <p style='font-size:15px'> <a href='manage-user'> <strong> Nombre de tous les clients :   <a href='manage-user' style='color:red'> $nbr </a>  </strong>   &nbsp;  &nbsp;   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </a> </p> </td>
            <td> <p style='font-size:15px'> <a href='#'> <strong> Nombre des demandes en attente : <a href='#' style='color:red'> $nbr2 </a>   </strong>   </a> </p>  </td>
            </tr>

            <tr>
            <td> <br><p style='font-size:15px'> <a href='actif_subscriber_list'> <strong> Nombre des clients actifs : <a href='actif_subscriber_list' style='color:red'> $nbr1 </a>  </strong> &nbsp;  &nbsp;   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </a> </p>  </td>
            <td> <br><p style='font-size:15px'><a href='suspended_subscriber_list'> <strong> Nombre des clients suspendus : <a href='suspended_subscriber_list' style='color:red'> $nbr3 </a> </strong>  </a> </p> </td>
            </tr>

            </table> </center>


"

     ?>

                    <style>
                        a{
                            color:black;
                        }
                    </style>

   		<div class="dataTables_wrapper dt-bootstrap4 no-footer">
   			<div class="row">
   				<div class="col-sm-12 table-responsive">
		   			<table class="table table-bordered table-hover table-checkable w-100" id="subscription_datatable">
		   				<thead class="datatable-head">
			   				<tr>
                               <th scope="col">Nom et Prénom </th>
                               <th scope="col">Profession</th>
                               <th scope="col">Entreprise </th>
                               <th scope="col">Email</th>
                               
							   <th scope="col">Crée Le</th>
                               <th scope="col">Téléphone</th>
                               <!-- <th scope="col"><a href="{{('manage-payment')}}">Paiement </a></th> -->
							   <!-- <th scope="col">Status</th> -->
                                <th scope="col">Wilaya</th>
							   <th scope="col">Compte Désactivé</th>
                               <th scope="col">Commentaire</th>
                               @if($actionEnable)
							   <th scope="col">Action   </th>
                               @else
                               <th scope="col"></th>
                               @endif
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
<div id="userModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='deactivateUserForm' id='deactivateUserForm'  method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="deactivate" value="" id="deactivate_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Désactiver</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment désactiver l'utilisateur ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-primary" id="delete">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="userActiveModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='activateUserForm' id='activateUserForm'  method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="activate" value="" id="activate_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Activer</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment activer l'utilisateur ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-primary" id="delete">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="userDeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='deleteUserForm' id='deleteUserForm'  method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Supprimer</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer l'utilisateur ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-primary" id="delete">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('body').on('click', ".deactive_user_btn", function(e) {
			e.stopPropagation();
			console.log($(this).data('href'));
			var user_id = $(this).data('id');
			$('#deactivateUserForm').attr('action', $(this).data('href'));
			$('#deactivate_hidden').val(user_id);
			$('#userModal').modal('show');
		}); 

		$('body').on('click', ".active_user_btn", function(e) {
			e.stopPropagation();
			console.log($(this).data('href'));
			var user_id = $(this).data('id');
			$('#activateUserForm').attr('action', $(this).data('href'));
			$('#activate_hidden').val(user_id);
			$('#userActiveModal').modal('show');
		});

        $('body').on('click', ".delete_user_btn", function(e) {
			e.stopPropagation();
			console.log($(this).data('href'));
			var user_id = $(this).data('id');
			$('#deleteUserForm').attr('action', $(this).data('href'));
			$('#delete_hidden').val(user_id);
			$('#userDeleteModal').modal('show');
		});
	});
    $(function () {
        var table = $('#subscription_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
            url: "{{ ($subscription != []) ? route('manage-subscription.subscribers', [$subscription->id]):route('manage-user') }}",
            data: function (d){
                d.search = $('input[name=search]').val();
                d.status = $('.searchStatus').val();
                d.payment_status = $('.payment_status').val();
                d.is_deactivated = $('.is_deactivated').val();
            }
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'job_title', name: 'job_title'},
                {data: 'company_name', name: 'company_name'},
                {data: 'email', name: 'email'},
                
                
                {
                    data: 'created_at',
                    type: 'num',
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                    }
                },
                {data: 'mobile_number', name: 'mobile_number'},
                //{data: 'payment_status', name: 'payment_status', orderable: false, searchable: false},
                //{data: 'status', name: 'status', orderable: false, searchable: false},
                {data: 'wilaya', name: 'wilaya'},
				{data: 'is_deactivated', name: 'is_deactivated', orderable: false, searchable: false},
                {data: 'note', name: 'note'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
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

@endsection
