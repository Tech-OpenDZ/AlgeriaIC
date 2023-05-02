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
    if (\Auth::user()->can('business-meeting-edit') || \Auth::user()->can('business-meeting-delete')) {
        $actionEnable = true;
    }
    else {
        $actionEnable = false;
    }
@endphp
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Manage Business Meeting</h3>
		</div>
		<div class="card-toolbar">
			@can('business-meeting-create')
			<a href="{{route('manage-business-meeting.create')}}" class="btn btn-primary">
				<span class="svg-icon svg-icon-md">
				</span>New Meeting
			</a>
			@endcan
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
					<label>Is featured</label>
					<select class="form-control datatable-input searchStatus" name="status">
						<option value="">Select</option>
						<option value="1">Yes </option>
						<option value="0">No</option>
					</select>
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
   					<table class="table table-bordered table-checkable " id="business_datatable">
   						<thead class="datatable-head">
   							<tr>
							  <th scope="col">Title</th>
                              <th scope="col">Place</th>
                              <th scope="col">Sectors</th>
                              <th scope="col">Start date</th>
                              <th scope="col">Price(per square meter)</th>
							  <th scope="col">Is featured</th>
							  <th scope="col">Created At</th>
							  @if($actionEnable)
							  <th scope="col">Action</th>
                              @else
                              <th scope="col"></th>
                              @endif
							</tr>
   						</thead>
   					</table>
   				</div>
   			</div>
   		</div>
	</div>
</div>
<div id="subscriptionModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='deleteSubscriptionForm' id='deleteSubscriptionForm'  method="POST">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this business meeeting?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary" id="delete">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function () {
	var table = $('#business_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('manage-business-meeting.index') }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          	d.is_featured = $('.searchStatus').val();
          }
        },
        columns: [
			{data: 'title', name: 'title'},
            {data: 'place', name: 'place', orderable: false},
            {data: 'sector', name: 'sector'},
            {data: 'start_date', name: 'start_date'},
            {data: 'price_per_square_meter', name: 'price_per_square_meter'},
            {data: 'is_featured', name: 'is_featured', orderable: false},
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
        "order": [[ 6, "desc" ]],
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

$('#delete').on('click', function(e) {
	e.preventDefault();
	$("#delete").attr("disabled", true);
	this.form.submit();
});
</script>
@endsection
