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
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Canceled Requests</h3>
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
                               <th scope="col">Criterias</th>
                               <th scope="col">Estimation</th>
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
    var table = $('#subscription_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('canceled-request') }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          	d.is_featured = $('.searchStatus').val();
          }
        },
        columns: [
			{data: 'id', name: 'id'},
			{data: 'user', name: 'user'},
			{data: 'created_at', name: 'created_at'},
			{data: 'search_criteria', name: 'search_criteria'},
			{data: 'estimation', name: 'estimation'},
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
	$('body').on('click', ".delete_subscription_btn", function(e) {
        e.stopPropagation();
        console.log($(this).data('href'));
        var del_id = $(this).data('id');
        $('#deleteSubscriptionForm').attr('action', $(this).data('href'));
        $('#delete_hidden').val(del_id);
        $('#subscriptionModal').modal('show');
    });
});
</script>
@endsection
