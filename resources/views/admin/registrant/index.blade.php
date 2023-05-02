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
    if (\Auth::user()->can('eregistrant-delete') || \Auth::user()->can('eregistrant-reply')) {
        $actionEnable = true;
    }
    else {
        $actionEnable = false;
    }
@endphp
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Liste de inscrits</h3>
		</div>
	</div>
	
	
	
   <div class="card-body">
   		<form method="POST" id="search-form" class="kt-form kt-form--fit mb-15" role="form">
   			<div class="row mb-6">
   				<div class="col-lg-3 mb-lg-0 mb-6">
   					<label>Rechercher</label>
					<input type="text" class="form-control datatable-input" name="search" placeholder="Rechercher" />
   				</div>
   				<div class="col-lg-3 mb-lg-0 mb-6">
					<!--<label>Status:</label>
					<select class="form-control datatable-input searchStatus" name="status">
						<option value="">Select</option>
						<option value="1">Pending</option>
						<option value="2">Replied</option>
					</select> -->
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
$sql = "SELECT * FROM events_registrants WHERE deleted_at is NULL";
$stmt = $bdd->prepare($sql);
//$stmt->bindValue(1,$status,PDO::PARAM_STR);
$stmt->execute();
$nbr = $stmt->rowCount();
echo "<center> <td> <p style='font-size:15px'> <a href='#'> <strong> Nombre de tous les inscrits :      <a href='#' style='color:red'> $nbr </a>  </strong>   &nbsp;  &nbsp;   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </a> </p></a></td> </center>";


  

?>
   		<div class="dataTables_wrapper dt-bootstrap4 no-footer">
   			<div class="row">
   				<div class="col-sm-12 table-responsive">
		   			<table class="table table-bordered table-checkable" id="registrant_datatable">
		   				<thead class="datatable-head">
			   				<tr>
							   <th scope="col">Nom et Prénom</th>
							     <th scope="col">Entreprise</th>
								 <th scope="col">Profession</th>
							   <th scope="col">Email</th>
							   <th scope="col">Téléphone</th>
							    <th scope="col">Message</th>
								<th scope="col">Commentaire</th>
							   <th scope="col">Created At</th>

							   <th scope="col">Action</th>
									

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
    var table = $('#registrant_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('manage-registrant.index') }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          	//d.status = $('.searchStatus').val();
          }
        },
        columns: [
            {data: 'username', name: 'username'},
			{data: 'company', name: 'company', orderable: false},
			{data: 'job_title', name: 'job_title', orderable: false},
			{data: 'email', name: 'email', orderable: false},
            {data: 'phone_number', name: 'phone_number', orderable: false},
            
			{data: 'message', name: 'message', orderable: false},
			{data: 'note_events', name: 'note_events', orderable: false},
            {
                data: 'created_at',
                type: 'num',
                render: {
                    _: 'display',
                    sort: 'timestamp'
                }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ],
        "order": [[ 5, "desc" ]],
    });

    $('#search-form').on('submit', function(e) {
        table.draw();
        e.preventDefault();
    });

    $('#kt_reset').on('click', function(e) {
    	$('input[name=search]').val('');
    	//$('.searchStatus').val('');
        table.draw();
        e.preventDefault();
    });

    $('body').on('click', ".saveBtn", function(e) {
        e.preventDefault();
         $(this).html('Sending..');
         $(".saveBtn").attr("disabled", true);
        $.ajax({
          data: $('#add_reply_form').serialize(),
          url: "{{ route('manage-registrant.store')}}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
	          	console.log(data);
	          	var	messageLenght = $(".messages").find(".new_message").length;
	          	if(data.success){
	          		if(messageLenght>0){
		          		$(".messages").find(".new_message:last").after().append("<div class='d-flex flex-column mb-5 align-items-end new_message'><div class='mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px reply_text_message'>" + data.replyMessage + "</div><span style='font-size:8px;'>"+data.date+"</span></div>");
		          			$(".saveBtn").attr("disabled", false);
			                $('.saveBtn').html('Reply');
			                $('.text_area').val("");
			                $(".error_message").html('');
		              		table.draw();
			        }
			        else{
			          		$(".messages").after().append("<div class='d-flex flex-column mb-5 align-items-end new_message'><div class='mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px reply_text_message'>" + data.replyMessage + "</div><span style='font-size:8px;'>"+data.date+"</span></div>");
				          		$(".saveBtn").attr("disabled", false);
					            $('.saveBtn').html('Reply');
					            $('.text_area').val("");
					            $(".error_message").html('');
				              	table.draw();
			          		}
			    }
			    if(data.errors){
			    			$(".error_message").html(data.errors);
			    			$(".saveBtn").attr("disabled", false);
			                $('.saveBtn').html('Reply');
			    }




          },
          error: function (data) {
              console.log('Error:', data);
              // $('#saveBtn').html('Save Changes');
          }
      });
    });

    $('body').on('keypress',".text_area",function(e){
    	var code = (e.keyCode ? e.keyCode : e.which);
    	if (code == 13 && !e.shiftKey){
    		 e.preventDefault();
    		 $(".saveBtn").html('Sending..');
         	 $(".saveBtn").attr("disabled", true);
	    	 $.ajax({
		          data: $('#add_reply_form').serialize(),
		          url: "{{ route('manage-registrant.store')}}",
		          type: "POST",
		          dataType: 'json',
		          success: function (data) {
		              var	messageLenght = $(".messages").find(".new_message").length;
		          	  if(data.success){
			          		if(messageLenght>0){
				          		$(".messages").find(".new_message:last").after().append("<div class='d-flex flex-column mb-5 align-items-end new_message'><div class='mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px reply_text_message'>" + data.replyMessage + "</div><span style='font-size:8px;'>"+data.date+"</span></div>");
				          			$(".saveBtn").attr("disabled", false);
					                $('.saveBtn').html('Reply');
					                $('.text_area').val("");
					                $(".error_message").html('');
				              		table.draw();
					        }
					        else{
					          		$(".messages").after().append("<div class='d-flex flex-column mb-5 align-items-end new_message'><div class='mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px reply_text_message'>" + data.replyMessage + "</div><span style='font-size:8px;'>"+data.date+"</span></div>");
						          		$(".saveBtn").attr("disabled", false);
							            $('.saveBtn').html('Reply');
							            $('.text_area').val("");
							            $(".error_message").html('');
						              	table.draw();
					          		}
			    		}
					    if(data.errors){
					    			$(".error_message").html(data.errors);
					    			$(".saveBtn").attr("disabled", false);
					                $('.saveBtn').html('Reply');
					    }

		          },
		          error: function (data) {
		              console.log('Error:', data);
		              // $('#saveBtn').html('Save Changes');
		          }
	     	 });

    	}
    });
});

$(document).ready(function(){
	$('body').on('click', '.editRegistrant', function (e) {
		e.stopPropagation();
	 	var registrant_id = $(this).data('id');
		$.ajax({
			url: "{{ route('manage-registrant.index') }}" +'/' + registrant_id +'/edit',
    		type: 'get',
    		success: function(response){
		      $('.modal-content').html(response);
		      $('#replymodel').modal('show');
    		}
		})
	});
  	var base_url =  {!! json_encode(url('/')) !!};

	$('body').on('click', ".delete_admin_btn", function(e) {
        e.stopPropagation();
        var del_id = $(this).data('id');
        var destroy_url = $(this).data('href');
        $.ajax({
			url: base_url +"/admin/manage-registrant" +'/' + del_id +'/delete',
    		type: 'get',
    		success: function(response){
		      $('.modal-content').html(response);
		      $('#adminModal').modal('show');
    		}
		})
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
