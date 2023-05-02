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
    if (\Auth::user()->can('economical-indicator-edit') || \Auth::user()->can('economical-indicator-delete')) {
        $actionEnable = true;
    }
    else {
        $actionEnable = false;
    }
@endphp
<div class="alert alert-custom alert-notice alert-light-primary fade show mb-5" role="alert" style="display: none;">
    <div class="alert-text"></div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                <i class="ki ki-close"></i>
            </span>
        </button>
    </div>
</div>
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Manage Economical Indicator</h3>
		</div>
        @can('economical-indicator-create')
		<div class="card-toolbar">
			<a class="btn btn-primary createNewRecord" href="javascript:void(0)" id="">
			Add Economical Indicator</a>
		</div>
        @endcan
	</div>
   <div class="card-body">
   <form method="POST" id="search-form" class="kt-form kt-form--fit mb-15" role="form">
   			<div class="row mb-6">
   				<div class="col-lg-3 mb-lg-0 mb-6">
   					<label>Search</label>
					<input type="text" class="form-control datatable-input" name="search" placeholder="Search" />
   				</div>
   				<div class="col-lg-3 mb-lg-0 mb-6">
					<label>Status</label>
					<select class="form-control datatable-input searchStatus" name="status">
						<option value="">Select</option>
						<option value="1">Active</option>
						<option value="0">Inactive</option>
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
   		<div class="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
   			<div class="row">
   				<div class="col-sm-12 table-responsive">
		   			<table class="table table-bordered table-hover table-checkable" id="data-table">
		   				<thead class="datatable-head">
			   				<tr>
							    <th scope="col">Indicator</th>
                                <th scope="col">Value</th>
                                <th scope="col">Date</th>
							    <th scope="col">Status</th>
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
<div class="modal fade" id="economicalModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>
<div id="adminModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>
<script type="text/javascript">
$(function () {

  var table = $('#data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: "{{ route('manage-economical.index') }}",
        data: function (d) {
            d.search = $('input[name=search]').val();
            d.status = $('.searchStatus').val();
            }
        },
        columns: [
            {data: 'indicator', name: 'indicator'},
            {data: 'value', name: 'value'},
            {data: 'date', name: 'date', orderable: false},
            {data: 'status', name: 'status', orderable: false},
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
        "order": [[ 4, "desc" ]],
    });

    $('#search-form').on('submit', function(e) {
        $('#exportSearch').val($('input[name=search]').val());
        $('#exportNewsletterType').val($('.searchNewsletterType').val());
        table.draw();
        e.preventDefault();
    });

    $('#kt_reset').on('click', function(e) {
    	$('input[name=search]').val('');
    	$('.searchStatus').val('');
        table.draw();
        e.preventDefault();
    })

   $('body').on('click', ".createNewRecord", function(e) {
   		e.stopPropagation();
        $.ajax({
            url: '{{ route("manage-economical.create") }}',
            type: 'get',
            success: function(response){
              $('#economicalModel').modal('show');
              $('.modal-content').html(response.html);
            }
        });
   });

   $('body').on('click', ".saveBtn", function(e) {
        e.preventDefault();
        $.ajax({
          data: $('#indicatorForm').serialize(),
          url: '{{ route("manage-economical.store") }}',
          type: "POST",
          dataType: 'json',
          beforeSend : function(){
                $('#saveBtn').attr("disabled","disabled");
          },
          success: function (data) {
          	console.log(data);
            if(data.errors) {
              if(data.errors.indicator_name_in_english){
                  $('#indicator_name_in_english-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#indicator_name_in_english-error' ).html(data.errors.indicator_name_in_english[0] );
                  }
               if(data.errors.indicator_name_in_arabic){
                  $('#indicator_name_in_arabic-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#indicator_name_in_arabic-error' ).html(data.errors.indicator_name_in_arabic[0] );
                  }
              if(data.errors.indicator_name_in_french){
                  $('#indicator_name_in_french-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#indicator_name_in_french-error' ).html(data.errors.indicator_name_in_french[0] );
                  }
              if(data.errors.value){
                  $('#value-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#value-error' ).html(data.errors.value[0] );
                  }
               if(data.errors.date){
                  $('#date-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#date-error' ).html(data.errors.date[0] );
                }
              if(data.errors.display_order){
                  $('#display_order-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#display_order-error' ).html(data.errors.display_order[0] );
                }
            }
          	if(data.success){
                  $('#economicalModel').modal('hide');
                  table.draw();
                  $(".alert-custom").css('display','block');
                  $(".alert-custom").find('.alert-text').html("Economical indicator added successfully.");
                  // location.reload();
                }
          }
        });
    });


   $('body').on('click', ".editEconomic", function(e) {
        e.stopPropagation();
        var eco_id = $(this).data('id');
        var url = '{{ route("manage-economical.edit", ":id") }}';
        url = url.replace(':id', eco_id );
        $.ajax({
            url: url,
            type: 'get',
            data:{ id:eco_id },
            success: function(response){
              // console.log(response);
              $('#economicalModel').modal('show');
              $('.modal-content').html(response.html);
            }
        });
    });

  $('body').on('click', ".editBtn", function(e) {
        e.preventDefault();
      var economic_id = $("#economic_id").val();
      var url = '{{ route("manage-economical.update", ":id") }}';
      url = url.replace(':id', economic_id );
        $.ajax({
          data: $('#indicatorUpdate').serialize(),
          url: url,
          type: "POST",
          dataType: 'json',
          beforeSend : function(){
                $('#saveBtn').attr("disabled","disabled");
          },
          success: function (data) {
            if(data.errors) {
              if(data.errors.indicator_name_in_english){
                  $('#indicator_name_in_english-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#indicator_name_in_english-error' ).html(data.errors.indicator_name_in_english[0] );
                  }
               if(data.errors.indicator_name_in_arabic){
                  $('#indicator_name_in_arabic-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#indicator_name_in_arabic-error' ).html(data.errors.indicator_name_in_arabic[0] );
                  }
              if(data.errors.indicator_name_in_french){
                  $('#indicator_name_in_french-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#indicator_name_in_french-error' ).html(data.errors.indicator_name_in_french[0] );
                  }
              if(data.errors.value){
                  $('#value-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#value-error' ).html(data.errors.value[0] );
                  }
               if(data.errors.date){
                  $('#date-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#date-error' ).html(data.errors.date[0] );
                }
              if(data.errors.display_order){
                  $('#display_order-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#display_order-error' ).html(data.errors.display_order[0] );
                }
            }
            if(data.success){
                $('#economicalModel').modal('hide');
                 table.draw();
                  $(".alert-custom").css('display','block');
                  $(".alert-custom").find('.alert-text').html("Economical indicator updated successfully.");
                }
          },
      });
    });

   $('body').on('click', ".delete_admin_btn", function(e) {
        e.stopPropagation();
        var del_id = $(this).data('id');
        // var destroy_url = $(this).data('href');
        var url = '{{ route("economicDelete", ":id") }}';
        url = url.replace(':id', del_id );
        $.ajax({
            url: url,
            type: 'get',
            success: function(response){
              $('.modal-content').html(response);
              $('#adminModal').modal('show');
            }
        })
    });


    $('body').on('click', ".delete_partner_btn", function(e) {
        e.stopPropagation();
        console.log($(this).data('href'));
        var del_id = $(this).data('id');
        $('#deletePartnerForm').attr('action', $(this).data('href'));
        $('#delete_hidden').val(del_id);
        $('#partnerModal').modal('show');
    });

    var start = new Date();
    // set end date to max one year period:
    var end = new Date(new Date().setYear(start.getFullYear()+1));
    $('#economicalModel').on('shown.bs.modal', function() {
        $('#start_date').datepicker({
          startDate : start,
          endDate   : end
        });
    });
}); 

</script>
@endsection
