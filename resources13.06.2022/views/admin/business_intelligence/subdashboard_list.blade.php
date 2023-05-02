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
			<h3 class="card-label">Manage Business Intelligence of {{ $user->company_name}}</h3>
		</div>
		<div class="card-toolbar">
			<a href="{{route('manage-sub-dashboard.create',[ 'id'=> request()->segment(3), 'report_id' => request()->segment(4) ])}}" class="btn btn-primary">
				<span class="svg-icon svg-icon-md">
				</span>Add Sub Dashboard
			</a>&nbsp;
			<a href="{{route('manage-report.create',[ 'id'=> request()->segment(3), 'report_id' => request()->segment(4) ])}}" class="btn btn-primary">
				<span class="svg-icon svg-icon-md">
				</span>Add Report
			</a>
		</div> 
	</div>
	
   <div class="card-body">
   		
   		<div class="dataTables_wrapper dt-bootstrap4 no-footer">
   			<div class="row">
   				<div class="col-sm-12 table-responsive">
		   			<table class="table table-bordered table-hover table-checkable" id="partner_datatable">
		   				<thead class="datatable-head">
			   				<tr>
							   <th scope="col">Dashboard</th>
							   <th scope="col">Description</th>
							   <th scope="col">Date of uploading</th>
                               <th scope="col">Action</th>
							</tr>
		   				</thead>
		   				<tbody>

		   				</tbody>
		   			</table>
   				</div>
   			</div> 	
   		</div>
		<br><br>
		<div class="dataTables_wrapper dt-bootstrap4 no-footer">
   			<div class="row">
   				<div class="col-sm-12 table-responsive">
		   			<table class="table table-bordered table-hover table-checkable" id="report_datatable">
		   				<thead class="datatable-head">
			   				<tr>
							   @if(request()->segment(4) == 1)
							   <th scope="col">Sector Reports</th>
							   @endif
							   @if(request()->segment(4) == 2)
							   <th scope="col">PR monitoring Reports</th>
							   @endif
							   @if(request()->segment(4) == 3) 
							   <th scope="col">E-Reputation Reports</th>
							   @endif
							   @if(request()->segment(4) == 4)
							   <th scope="col">Competitive intelligence Reports</th>
							   @endif
							   @if(request()->segment(4) == 5) 
							   <th scope="col">Legal monitoring Reports</th>
							   @endif
							   @if(request()->segment(4) == 6) 
							   <th scope="col">Event monitoring Reports</th>
							   @endif
							   <th scope="col">Description</th>
							   <th scope="col">Date of uploading</th>
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
<div id="dashboardModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='deletedashboardForm' id='deletedashboardForm'  method="POST">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this dashboard?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary" id="delete">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="reportModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='deletereportForm' id='deletereportForm'  method="POST">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_report_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this report?</p>
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
	var id = "{{ request()->segment(3) }}";
	var report_id = "{{ request()->segment(4) }}";
    var table = $('#partner_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('manage-sub-dashboard.index',['id' => "+id+",'report_id' => "+report_id+"]) }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          	d.status = $('.searchStatus').val();
			d.id = id;
			d.report_id = report_id;
          }
        },
        columns: [
			{data: 'DT_RowIndex'},
            {data: 'description', name: 'description', orderable: false,},
            {data: 'date_of_uploading', name: 'date_of_uploading', orderable: false },
            {data: 'action', name: 'action', orderable: false },
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

$(function () {
	var id = "{{ request()->segment(3) }}";
	var report_id = "{{ request()->segment(4) }}";
    var table = $('#report_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('manage-report.index',['id' => "+id+",'report_id' => "+report_id+"]) }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          	d.status = $('.searchStatus').val();
			d.id = id;
			d.report_id = report_id;
          }
        },
        columns: [
            {data: 'title', name: 'title', orderable: false},
            {data: 'description', name: 'description', orderable: false},
            {data: 'date_of_uploading', name: 'date_of_uploading', orderable: false },
            {data: 'action', name: 'action', orderable: false },
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
	$('body').on('click', ".delete_dashboard_btn", function(e) {
        e.stopPropagation();
        console.log($(this).data('href'));
        var del_id = $(this).data('id');
		console.log(del_id);
        $('#deletedashboardForm').attr('action', $(this).data('href'));
        $('#delete_hidden').val(del_id);
        $('#dashboardModal').modal('show');
    });
});

$(document).ready(function(){
	$('body').on('click', ".delete_report_btn", function(e) {
        e.stopPropagation();
        console.log($(this).data('href'));
        var del_id = $(this).data('id');
        $('#deletereportForm').attr('action', $(this).data('href'));
        $('#delete_report_hidden').val(del_id);
        $('#reportModal').modal('show');
    });
});

$('#delete').on('click', function(e) {
	e.preventDefault();
	$("#delete").attr("disabled", true);
	this.form.submit();
});
</script>
@endsection
