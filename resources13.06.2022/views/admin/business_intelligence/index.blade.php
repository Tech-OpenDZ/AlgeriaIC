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
    if (\Auth::user()->can('partner-edit') || \Auth::user()->can('partner-delete')) {
        $actionEnable = true;
    }
    else {
        $actionEnable = false;
    }
@endphp
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Manage Business Intelligence</h3>
		</div>
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
		<h5 class="card-label">For Non-premium users</h3>
		<div class="table-responsive">
			<table class="table ">
				<tbody>
					<tr>
						<td><a href="{{ route('dashboard') }}">Add Dashboard</a></td>
					</tr>
				</tbody>
			</table>
		</div>	
		<br>
		<h5 class="card-label">For Premium users</h3>
   		<div class="dataTables_wrapper dt-bootstrap4 no-footer">
   			<div class="row">
   				<div class="col-sm-12 table-responsive">
		   			<table class="table table-bordered table-hover table-checkable" id="partner_datatable">
		   				<thead class="datatable-head">
			   				<tr>
							   <th scope="col">Companies</th>
							   <th scope="col">Customer Name</th>
							   <th scope="col">No of users</th>
							   <th scope="col">End of subscription</th>
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

<script type="text/javascript">
$(function () {
    var table = $('#partner_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('manage-business-intelligence.index') }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          	d.status = $('.searchStatus').val();
          }
        },
        columns: [
			{data: 'company_name', name: 'company_name', orderable: false,},
			{data: 'customer_name', name: 'customer_name', orderable: false,},
            {data: 'no_of_users', name: 'no_of_users', orderable: false,},
            {data: 'end_of_subscription', name: 'end_of_subscription', orderable: false },
        ],
        "order": [[ 2, "desc" ]],
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
    })

});

$(document).ready(function(){
	$('body').on('click', ".delete_partner_btn", function(e) {
        e.stopPropagation();
        console.log($(this).data('href'));
        var del_id = $(this).data('id');
        $('#deletePartnerForm').attr('action', $(this).data('href'));
        $('#delete_hidden').val(del_id);
        $('#partnerModal').modal('show');
    });
});

$('#delete').on('click', function(e) {
	e.preventDefault();
	$("#delete").attr("disabled", true);
	this.form.submit();
});
</script>
@endsection
