@extends('admin.layouts.master')
@section('head')
	<style type="text/css">
	.dataTables_filter{
		display: none;
	}
	#overlay{
		position: fixed;
		top: 0;
		z-index: 999999;
		width: 100%;
		height:100%;
		display: none;
		background: rgba(0,0,0,0.6);
	}
	.cv-spinner {
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.spinner {
		width: 40px;
		height: 40px;
		border: 4px #ddd solid;
		border-top: 4px #2e93e6 solid;
		border-radius: 50%;
		animation: sp-anime 0.8s infinite linear;
	}
	@keyframes sp-anime {
		100% {
			transform: rotate(360deg);
		}
	}
	.is-hide{
		display:none;
	}
	</style>
@endsection
@section('content')
@include('alert_messages')
@php
    if (\Auth::user()->can('press-review-validate-request') || \Auth::user()->can('press-review-cancel-request')) {
        $actionEnable = true;
    }
    else {
        $actionEnable = false;
    }
@endphp
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Pending Requests</h3>
		</div>
		<!-- <div class="card-toolbar">
			<a href="{{route('manage-event.create')}}" class="btn btn-primary">
				<span class="svg-icon svg-icon-md">
				</span>New Events
			</a>
		</div> -->
	</div>
   <div class="card-body">
	
   <form method="POST" id="search-form" class="kt-form kt-form--fit mb-15" role="form">
   			<div class="row mb-6">
   				<div class="col-lg-3 mb-lg-0 mb-6">
   					<label>Search</label>
					<input type="text" class="form-control datatable-input" name="search" placeholder="Search" />
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
   		<div class="dataTables_wrapper dt-bootstrap4 no-footer">
   			<div class="row">
   				<div class="col-sm-12 table-responsive">
		   			<table class="table table-bordered table-hover table-checkable" id="subscription_datatable">
		   				<thead class="datatable-head">
			   				<tr>
							   <th scope="col">Request Id</th>
                               <th scope="col">User</th>
							   <th scope="col">Date</th>
                               <th scope="col">Transaction Status</th>
                               <th scope="col">Criterias</th>
                               <th scope="col">Estimation</th>
							   @if($actionEnable)
							   <th scope="col">Action</th>
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
<div id="validateRequestModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='validateRequestForm' id='validateRequestForm'  method="get">
                <input type="hidden" name="delete" value="" id="delete_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
				<!-- <div class="spinner" style="display:none"></div> -->
				<div class="modal-body" id="modal-body">
					<p id="showmessageStatus"></p>
					
					<!-- <div id="myOverlay"></div>
					<div class="loader">
							<img class="loading-image" src="{{asset('images/ajax_loader_gray_64.gif')}}" alt="loading..">
					</div> -->
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td scope="col">Transaction Id:</td> 
								<td><span id="transaction_id"></span></td>
							</tr> 
							<tr>
								<td scope="col">Price:</td> 
								<td><span id="price"></span></td>
							</tr>
							<tr>
								<td scope="col">Currency:</td>
								<td><span id="currency"></span></td>
							</tr> 
							
							<tr>
								<td scope="col">Payment mode:</td> 
								<td><span id="payment_mode"></span></td> 
							</tr>
							<tr>
								<td scope="col">Payment type:</td>
								<td><span id="payment_type"></span></td>
							</tr>
							<tr>
								<td scope="col">Status:</td>
								<td><span id="status"></span></td> 
							</tr>
							<tr> 
								<td scope="col">Note:<span style="color:red">*</span></td>
								<td> <textarea type="text" value="" id="note" class="form-control"></textarea>
								<p class="error_message" style="color: #F64E60;"></p></td> 
							</tr>
						</tbody>
					</table>
					
					<input type="hidden" value="" id="token"> 
					<input type="hidden" value="" id="customer_id">
					<input type="hidden" value="" id="transaction_id_val">

					
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary validate-confirm" onclick="$('#cover-spin').show(0)">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function () {
    var table = $('#subscription_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('pending-request') }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          }
        },
        columns: [
			{data: 'id', name: 'id'},
			{data: 'user', name: 'user'},
			{data: 'created_at', name: 'created_at'},
			{data: 'transaction', name: 'transaction'},
			{data: 'search_criteria', name: 'search_criteria'},
			{data: 'estimation', name: 'estimation'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
	$('#search-form').on('submit', function(e) {
        table.draw();
        e.preventDefault();
    });

    $('#kt_reset').on('click', function(e) {
    	$('input[name=search]').val('');
    	$('.searchStatus').val('');
        table.draw();
        e.preventDefault();
    });

});

$(document).ready(function(){
	$('body').on('click', '.validate_btn', function (e) {
		e.stopPropagation();
	 	var transaction_id = $(this).data('id');
		$.ajax({
			url: "{{ route('transaction_details') }}",
			data: {transaction_id:transaction_id},
    		type: 'get',
    		success: function(response){
				console.log(response);
		      $('#transaction_id').html(response['transaction_id']);
		      $('#price').html(response['price']);
		      $('#currency').html(response['currency']);
		      $('#payment_mode').html(response['payment_mode']);
		      $('#payment_type').html(response['payment_type']);
		      $('#status').html(response['status']);
			  $('#token').val(response['token']);
			  $('#customer_id').val(response['customer_id']);
			  $('#transaction_id_val').val(response['transaction_id']);
		      $('#validateRequestModal').modal('show');
    		}
		})
	});

	$('body').on('click', '.validate-confirm', function (e) {
		e.stopPropagation();
	 	var transaction_id = $('#transaction_id_val').val(); 
		var token = $('#token').val(); 
		var customer_id = $('#customer_id').val(); 
		var note = $('#note').val(); 

		var pathUrl = '{{ route("validate-request", [":token",":customer_id"]) }}';
		pathUrl = pathUrl.replace(':token', token);
		pathUrl = pathUrl.replace(':customer_id', customer_id);

		// $('#modal-body').addClass("spinner spinner-primary mr-15");
		$("#overlay").fadeIn(300);
		$.ajax({
			url: pathUrl,
			data: {token:token,customer_id:customer_id,note:note,transaction_id:transaction_id},
    		type: 'get',
			beforeSend : function(){
				$("#overlay").fadeIn(300);
            },
            success: function(response)
            {
				// $('#modal-body').removeClass("spinner spinner-primary mr-15");
                if(response['result'] == true){
                    setTimeout(function(){
                    $('#showmessageStatus').prepend('<div class="alert alert-success" role="alert">'+response['detail']+'</div>');
                        setTimeout(function(){
                            $('#validateRequestModal').modal('hide');
                             location.reload();
                        }, 1000);
                    }, 500);
                }else{
                    setTimeout(function(){

                    }, 500);
                }
				if(response.errors){
					$('#validateRequestModal').modal('show');
					$(".error_message").html(response.errors);		
				}
            },
            complete : function(){
				$("#overlay").fadeOut(100);
            }
    		
		})
	});
});
</script>
@endsection
