@extends('admin.layouts.master')
@section('head')
<style type="text/css">
.dataTables_filter{
	display: none;
	}
</style>
@endsection
@section('content')
@php
    if ( \Auth::user()->can('banner-edit')) {
        $actionEnable = true;
    }
    else {
        $actionEnable = false;
    }
@endphp
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Manage Banner</h3>
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
		<div class="dataTables_wrapper dt-bootstrap4 no-footer">
   			<div class="row">
   				<div class="col-sm-12 table-responsive">
		   			<table class="table table-bordered table-checkable" id="banner_datatable">
		   				<thead class="datatable-head">
			   				<tr>
							   <th scope="col">Category</th>
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
<script type="text/javascript">
$(function () {
	var table = $('#banner_datatable').DataTable({
    	processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('manage-banner.index') }}",
          data: function (d){
          	d.search = $('input[name=search]').val();
          }
        },
        columns: [
            {data: 'name', name: 'name'},
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
</script>
@endsection
