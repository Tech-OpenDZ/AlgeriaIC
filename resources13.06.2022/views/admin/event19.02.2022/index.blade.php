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
    if (\Auth::user()->can('event-edit') || \Auth::user()->can('event-delete')) {
        $actionEnable = true;
    }
    else {
        $actionEnable = false;
    }
@endphp
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Manage Events</h3>
		</div> 
		@can('event-create')
		<div class="card-toolbar">
			<a href="{{route('manage-event.create')}}" class="btn btn-primary">
				<span class="svg-icon svg-icon-md">
				</span>New Events
			</a>&nbsp;
			<a href="{{route('manage-event.upload')}}" class="btn btn-primary">
				<span class="svg-icon svg-icon-md">
				</span>Upcoming Events(PDF)
			</a>
		</div> 
		
		@endcan
	</div>
   <div class="card-body">
   <form method="POST" id="search-form" class="kt-form kt-form--fit mb-15" role="form">
   			<div class="row mb-9">
   				<div class="col-lg-3 mb-lg-0 mb-9">
   					<label>Search</label>
					<input type="text" class="form-control datatable-input" name="search" placeholder="Search" />
					<br>
   				</div>
   				<div class="col-lg-3 mb-lg-0 mb-9">
					<label>Is featured</label>
					<select class="form-control datatable-input searchStatus" name="status">
						<option value="">Select</option>
						<option value="1">Yes </option>
						<option value="0">No</option>
					</select>
				</div>
				<div class="col-lg-3 mb-lg-0 mb-6">
					<label>Is active</label>
					<select class="form-control datatable-input searchActive" name="is_actif">
						<option value="">Select</option>
						<option value="1">Active </option>
						<option value="0">Inactive</option>
					</select>
				</div>
				<div class="col-lg-3 mb-lg-0 mb-9">
					<label>Type</label>
					<select class="form-control datatable-input type" name="type">
						<option value="">Select</option>
						<option value="upcoming">Upcoming </option>
						<option value="past">Past</option>
						<option value="encours">En Cours</option>
					</select>
				</div>
				<div class="col-lg-3 mb-lg-0 mb-9">
					<label>Status</label>
					<select class="form-control datatable-input searchStatu" name="statu">
						<option value="">Select</option>
						<option value="Maintenu">Maintenu</option>
						<option value="Reporté">Reporté</option>
						<option value="Annulé">Annulé</option>
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
		   			<table class="table table-bordered table-hover table-checkable" id="subscription_datatable">
		   				<thead class="datatable-head">
			   				<tr>
							   <th scope="col">Title</th>
                               <!-- <th scope="col">Description</th> -->
                               <th scope="col">Place</th>
                               <th scope="col">Sectors</th>
                               <th scope="col">Start date</th>
							   <th scope="col">End date</th>
                               <th scope="col">Type</th>
							   <th scope="col">Status</th>
							   <th scope="col">Is featured</th>
							   <th scope="col">Is active</th>
							   <th scope="col">Created At</th>
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
                    <p>Voulez-vous vraiment supprimer cet événement ?</p>
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
$(function () {
    var table = $('#subscription_datatable').DataTable({
        processing: true,
        serverSide: true,

        ajax: {
          url: "{{ route('manage-event.index') }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          	d.is_featured = $('.searchStatus').val();
			  d.is_actif = $('.searchActive').val();
			  d.status = $('.searchStatu').val();
			d.type = $('.type').val();
          }
        },
        columns: [
			{data: 'title', name: 'title'},
            // {data: 'description', name: 'description'},
            {data: 'place', name: 'place'},
            {data: 'sector', name: 'sector'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'type', name: 'type'},
			{data: 'status', name: 'status'},
            {data: 'is_featured', name: 'is_featured'},
			{data: 'is_actif', name: 'is_actif'},
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
		$('.searchActive').val('');
		$('.searchStatu').val('');
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
