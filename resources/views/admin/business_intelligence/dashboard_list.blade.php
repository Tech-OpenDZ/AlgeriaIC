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
			<h3 class="card-label">Manage Business Intelligence of {{ isset($user->company_name) ? $user->company_name : 'Non-premium users'}} </h3>
		</div>
		<div class="card-toolbar">
			@if(isset($user))
			<a href="{{route('create-dashboard',[ 'id'=> request()->segment(3) ])}}" class="btn btn-primary">
				<span class="svg-icon svg-icon-md">
				</span>Add Dashboard
			</a>&nbsp;
			@else 
			<a href="{{route('create-dashboards')}}" class="btn btn-primary">
				<span class="svg-icon svg-icon-md">
				</span>Add Dashboard
			</a>&nbsp;
			@endif
			@if(isset($user))
			<a href="{{route('manage-shuttle-sheet.create',[ 'id'=> request()->segment(3) ])}}" class="btn btn-primary">
				<span class="svg-icon svg-icon-md">
				</span>Add Shuttle sheet
			</a>
			@endif
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
				<br><br><br>
				@if(isset($user))
				<div class="col-sm-12 table-responsive">
		   			<table class="table table-bordered table-hover table-checkable" id="sheet_datatable">
		   				<thead class="datatable-head">
			   				<tr>
							   <th scope="col">Shuttle Sheet</th>
							   <th scope="col">Date of uploading</th>
                               <th scope="col">Action</th>
							</tr>
		   				</thead>
		   				<tbody>

		   				</tbody>
		   			</table>
   				</div>
				@endif

				<br><br><br>
				@if(isset($user))
				<div class="col-sm-6 table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Reports</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><a href="{{ route('manage-sub-dashboard.index',['id'=> request()->segment(3),'report_id' => 1]) }}">Sector reports</a></td>
							</tr>
							<tr>
								<td><a href="{{ route('manage-sub-dashboard.index',['id'=> request()->segment(3),'report_id' => 2]) }}">PR monitoring reports</a></td>
							</tr>
							<tr>
								<td><a href="{{ route('manage-sub-dashboard.index',['id'=> request()->segment(3),'report_id' => 3]) }}">E reputation reports</a></td>
							</tr>
							<tr>
								<td><a href="{{ route('manage-sub-dashboard.index',['id'=> request()->segment(3),'report_id' => 4]) }}">Competative analysis reports</a></td>
							</tr> 
							<tr>
								<td><a href="{{ route('manage-sub-dashboard.index',['id'=> request()->segment(3),'report_id' => 5]) }}">Lagal monitoring reports</a></td>
							</tr>
							<tr>
								<td><a href="{{ route('manage-sub-dashboard.index',['id'=> request()->segment(3),'report_id' => 6]) }}">Event monitoring reports</a></td>
							</tr>
						</tbody>
					</table>	
   				</div>
				@endif
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
<div id="sheetModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='deletesheetForm' id='deletesheetForm'  method="POST">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_sheet_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this sheet?</p>
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
    var table = $('#partner_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('dashboard-list',['id' => "+id+"]) }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          	d.status = $('.searchStatus').val();
			d.id = id;
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
}); 

$(function () {
	var id = "{{ request()->segment(3) }}";
    var table = $('#sheet_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('manage-shuttle-sheet.index',['id' => "+id+"]) }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          	d.status = $('.searchStatus').val();
			d.id = id;
          }
        },
        columns: [
			{data: 'DT_RowIndex'},
            {data: 'date_of_uploading', name: 'date_of_uploading', orderable: false },
            {data: 'action', name: 'action', orderable: false },

        ],
        "order": [[ 2, "desc" ]],
    });
});

$(document).ready(function(){
	$('body').on('click', ".delete_dashboard_btn", function(e) {
        e.stopPropagation();
        console.log($(this).data('href'));
        var del_id = $(this).data('id');
        $('#deletedashboardForm').attr('action', $(this).data('href'));
        $('#delete_hidden').val(del_id);
        $('#dashboardModal').modal('show');
    });
});

$(document).ready(function(){
	$('body').on('click', ".delete_sheet_btn", function(e) {
        e.stopPropagation();
        console.log($(this).data('href'));
        var del_id = $(this).data('id');
        $('#deletesheetForm').attr('action', $(this).data('href'));
        $('#delete_sheet_hidden').val(del_id);
        $('#sheetModal').modal('show');
    });
});

$('#delete').on('click', function(e) {
	e.preventDefault();
	$("#delete").attr("disabled", true);
	this.form.submit();
});
</script>
@endsection
