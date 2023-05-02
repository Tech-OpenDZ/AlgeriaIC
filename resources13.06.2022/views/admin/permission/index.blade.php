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
    if (\Auth::user()->can('module-edit') || \Auth::user()->can('module-delete')) {
        $actionEnable = true;
    }
    else {
        $actionEnable = false;
    }
@endphp
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Manage Admin Permission</h3>
		</div>
        @can('module-create')
		<div class="card-toolbar">
			<a href="{{route('manage-admin-permission.create')}}" class="btn btn-primary">
				<span class="svg-icon svg-icon-md">
				</span>New Admin Permission
			</a>
		</div>
        @endcan
	</div>
   <div class="card-body">
   <form method="POST" id="search-form" class="kt-form kt-form--fit mb-15" admin_permission="form">
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
		   			<table class="table table-bordered table-hover table-checkable" id="admin_permission_datatable">
		   				<thead class="datatable-head">
			   				<tr>
							   <th scope="col">Module</th>
							   <th scope="col">Name</th>
                               <th scope="col">Created At</th>
                               @if($actionEnable)
							   <th scope="col">Action</th>
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


<div id="adminPermissionModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='deleteAdminPermissionForm' id='deleteAdminPermissionForm'  method="POST">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this admin permission?</p>
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
const actionEnable = "<?= $actionEnable?>" || 0;
var columns = [
    {data: 'module', name: 'module'},
    {data: 'name', name: 'name'},
    {
        data: 'created_at',
        type: 'num',
        render: {
            _: 'display',
            sort: 'timestamp'
        }
    },
];

if(actionEnable) {
    columns.push({data: 'action', name: 'action', orderable: false, searchable: false});
}

$(function () {
    var table = $('#admin_permission_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('manage-admin-permission.index') }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          }
        },
        columns: columns,
        "order": [[ 2, "desc" ]],
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

$(document).ready(function(){
	$('body').on('click', ".delete_admin_permission_btn", function(e) {
        e.stopPropagation();
        var del_id = $(this).data('id');
        $('#deleteAdminPermissionForm').attr('action', $(this).data('href'));
        $('#delete_hidden').val(del_id);
        $('#adminPermissionModal').modal('show');
    });
}); 

$('#delete').on('click', function(e) {
	e.preventDefault();
	$("#delete").attr("disabled", true);
	this.form.submit();
});
</script>
@endsection
