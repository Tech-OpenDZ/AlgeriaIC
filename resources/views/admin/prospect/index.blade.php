@extends('admin.layouts.master')
@section('head')
<style type="text/css">
.dataTables_filter{
	display: none;
	}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection
@section('content')
@include('alert_messages')

<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Liste des prospects</h3>
		</div>
	</div>

	
	
   <div class="card-body">
   		<form method="POST" id="search-form" class="kt-form kt-form--fit mb-15" role="form">
   			<div class="row mb-6">
   				<div class="col-lg-3 mb-lg-0 mb-6">
   					<label>Search</label>
					<input type="text" class="form-control datatable-input" name="search" placeholder="Search" />
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
							<span>Search</span>
						</span>
					</button>&#160;&#160;
					<button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
						<span>
							<i class="la la-close"></i>
								<span>Reset</span>
						</span>
					</button>
				</div>
			</div>
   		</form>
	   <div class="col-sm-12 table-responsive" align="center">
		   <div class="container">
			   <div class="card bg-light mt-3">
				   <div class="card-header">
					   Choisissez le fichier à importer puis cliquez sur le button < Importer des données >
				   </div>
				   <div class="card-body">
					   <form action="{{ route('import-prospect') }}" method="POST" enctype="multipart/form-data">
						   @csrf
						   <input type="file" name="file" class="form-control">
						   <br>

						   <button class="btn btn-primary ">Importer des données </button> &nbsp; &nbsp; &nbsp; &nbsp;
						   <a class="btn btn-danger" href="{{ route('export-prospect-Excel') }}">Exporter des données</a>
					   </form>
				   </div>
			   </div>
		   </div>
		   <br>
	   </div>


		
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
$sql = "SELECT * FROM prospect WHERE deleted_at is NULL";
$stmt = $bdd->prepare($sql);
//$stmt->bindValue(1,$status,PDO::PARAM_STR);
$stmt->execute();
$nbr = $stmt->rowCount();
echo "<center> <td> <p style='font-size:15px'> <a href='#'> <strong> Nombre de tous les prospects :      <a href='#' style='color:red'> $nbr </a>  </strong>   &nbsp;  &nbsp;   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </a> </p></a></td> </center>";


  

?>

<br>
   		<div class="dataTables_wrapper dt-bootstrap4 no-footer">
   			<div class="row">

		   		<table class="table table-bordered table-hover table-checkable w-100" id="prospect_datatable">
		   				<thead class="datatable-head">
			   				<tr>
							   <th scope="col">Nom et Prénom </th>
                               <th scope="col">Profession </th>
                               <th scope="col">Entreprise </th>
                               <th scope="col">Email</th>
                               
							   <th scope="col" aria-sort="descending">Crée Le</th>
                               <th scope="col">Téléphone</th>
								<th scope="col">Wilaya</th>
                               <!-- <th scope="col"><a href="{{('manage-payment')}}">Paiement </a></th> -->
							   <!-- <th scope="col">Status</th> -->
							  <!-- <th scope="col">Compte Désactivé </th> -->
                             
                              <th scope="col">Commentaire</th>
							   <th scope="col">Action   </th>
                               
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
    var table = $('#prospect_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('manage-prospect.index') }}",
        data: function (d){
                d.search = $('input[name=search]').val();
                d.status = $('.searchStatus').val();
                d.payment_status = $('.payment_status').val();
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
                    ordering: true,
                   
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                        
                    }
                },
                {data: 'mobile_number', name: 'mobile_number'},
				{data: 'wilaya', name: 'wilaya'},
                //{data: 'payment_status', name: 'payment_status', orderable: false, searchable: false},
                //{data: 'status', name: 'status', orderable: false, searchable: false},
			//	{data: 'is_deactivated', name: 'is_deactivated', orderable: false, searchable: false},
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
	$('body').on('click', '.editProspect', function (e) {
		e.stopPropagation();
	 	var registrant_id = $(this).data('id');
		$.ajax({
			url: "{{ route('manage-prospect.index') }}" +'/' + registrant_id +'/edit',
    		type: 'get',
    		success: function(response){
		      $('.modal-content').html(response);
		     
    		}
		})
	});
  	var base_url =  {!! json_encode(url('/')) !!};

	$('body').on('click', ".delete_admin_btn", function(e) {
        e.stopPropagation();
        var del_id = $(this).data('id');
        var destroy_url = $(this).data('href');
        $.ajax({
			url: base_url +"/manage-prospect" +'/' + del_id +'/delete',
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
@section('scripts')


@endsection
@endsection
