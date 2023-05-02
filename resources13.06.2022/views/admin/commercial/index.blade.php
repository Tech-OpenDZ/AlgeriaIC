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
    if (\Auth::user()->can('commercial-quotes-edit') || \Auth::user()->can('commercial-quotes-delete')) {
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
			<h3 class="card-label">Manage Commercials Quotes</h3>
		</div>
        @can('commercial-quotes-create')
		<div class="card-toolbar">
			<a class="btn btn-primary createNewRecord" href="javascript:void(0)" id="createNewRecord">
			Add Commercials Quotes</a>
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
							   <th scope="col">Base</th>
                               <th scope="col">Devis</th>
                               <th scope="col">Cours Achat</th>
                               <th scope="col">Cours vente</th>
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
<div class="modal fade" id="commercialModel" aria-hidden="true">
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
            url: "{{ route('manage-commercial-quotes.index') }}",
            data: function (d) {
                d.search = $('input[name=search]').val();
                d.status = $('.searchStatus').val();
            }
        },
        columns: [
            {data: 'base', name: 'base'},
            {data: 'devis', name: 'devis'},
            {data: 'cours_achat', name: 'cours_achat'},
            {data: 'cours_vente', name: 'cours_vente'},
            {data: 'status', name: 'status', orderable: false,},
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
        "order": [[ 5, "desc" ]],
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
            url: '{{ route("manage-commercial-quotes.create") }}',
            type: 'get',
            success: function(response){
                $('#commercialModel').modal('show');
                $('.modal-content').html(response.html);
            }
        });
    });
    $('body').on('click', ".saveBtn", function(e) {
        e.preventDefault();
        $.ajax({
          data: $('#quoteForm').serialize(),
          url: '{{ route("manage-commercial-quotes.store") }}',
          type: "POST",
          dataType: 'json',
          beforeSend : function(){
                $('#saveBtn').attr("disabled","disabled");
          },
          success: function (data) {
            console.log(data);
            if(data.errors) {
                if(data.errors.base){
                    $('#base-error').addClass('bg-danger-o-50 py-2 px-4');
                    $( '#base-error' ).html(data.errors.base[0]);
                }
                if(data.errors.devis){
                    $('#devis-error').addClass('bg-danger-o-50 py-2 px-4');
                    $( '#devis-error' ).html(data.errors.devis[0] );
                }
                if(data.errors.cours_achat){
                    $('#cours_achat-error').addClass('bg-danger-o-50 py-2 px-4');
                    $( '#cours_achat-error' ).html(data.errors.cours_achat[0] );
                }
                if(data.errors.cours_vente){
                    $('#cours_vente-error').addClass('bg-danger-o-50 py-2 px-4');
                    $( '#cours_vente-error' ).html(data.errors.cours_vente[0] );
                }
                if(data.errors.start_date){
                    $('#start_date-error').addClass('bg-danger-o-50 py-2 px-4');
                    $( '#start_date-error').html(data.errors.start_date[0] );
                }
                if(data.errors.end_date){
                    $('#end_date-error').addClass('bg-danger-o-50 py-2 px-4');
                    $( '#end_date-error').html(data.errors.end_date[0] );
                }
                if(data.errors.display_order){
                    $('#display_order-error').addClass('bg-danger-o-50 py-2 px-4');
                    $( '#display_order-error' ).html(data.errors.display_order[0] );
                }
            }
            if(data.success){
                $('#commercialModel').modal('hide');
                table.draw();
                $(".alert-custom").css('display','block');
                $(".alert-custom").find('.alert-text').html("Commercial added successfully.");
                // location.reload();
            }
        }
    });
});


   $('body').on('click', ".editCommercial", function(e) {
        e.stopPropagation();
        var quote_id = $(this).data('id');
        var url = '{{ route("manage-commercial-quotes.edit", ":id") }}';
	    url = url.replace(':id', quote_id );
        $.ajax({
            url: url,
            type: 'get',
            data:{ id:quote_id },
            success: function(response){
            	// console.log(response);
              $('#commercialModel').modal('show');
              $('.modal-content').html(response.html);
            }
        });
    });

    $('body').on('click', ".editBtn", function(e) {
    e.preventDefault();
    var quote_id = $("#quote_id").val();
    var url = '{{ route("manage-commercial-quotes.update", ":id") }}';
	   url = url.replace(':id', quote_id );
        $.ajax({
          data: $('#quoteUpdate').serialize(),
          url: url,
          type: "POST",
          dataType: 'json',
          beforeSend : function(){
                $('#saveBtn').attr("disabled","disabled");
          },
          success: function (data) {
          	if(data.errors) {
              if(data.errors.base){
                  $('#base-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#base-error' ).html(data.errors.base[0]);
                  }
               if(data.errors.devis){
                  $('#devis-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#devis-error' ).html(data.errors.devis[0] );
                  }
              if(data.errors.cours_achat){
                  $('#cours_achat-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#cours_achat-error' ).html(data.errors.cours_achat[0] );
                  }
              if(data.errors.cours_vente){
                  $('#cours_vente-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#cours_vente-error' ).html(data.errors.cours_vente[0] );
                  }
               if(data.errors.start_date){
                  $('#start_date-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#start_date-error').html(data.errors.start_date[0] );
                }
                if(data.errors.end_date){
                  $('#end_date-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#end_date-error').html(data.errors.end_date[0] );
                }
              if(data.errors.display_order){
                  $('#display_order-error').addClass('bg-danger-o-50 py-2 px-4');
                  $( '#display_order-error' ).html(data.errors.display_order[0] );
                }
            }
          	if(data.success){
                  $('#commercialModel').modal('hide');
                  table.draw();
                  $(".alert-custom").css('display','block');
                  $(".alert-custom").find('.alert-text').html("Commercial update successfully.");
            }
          }
      });
    });

   $('body').on('click', ".delete_admin_btn", function(e) {
        e.stopPropagation();
        var del_id = $(this).data('id');
        // var destroy_url = $(this).data('href');
        var url = '{{ route("commercialDelete", ":id") }}';
        url = url.replace(':id', del_id );
        $.ajax({
            url: url,
            type: 'get',
            beforeSend: function() {
                $("#delete").attr("disabled", true);
            },
            success: function(response){
              $('.modal-content').html(response);
              $('#adminModal').modal('show');
            }
        })
    });

    var start = new Date();
    // set end date to max one year period:
    var end = new Date(new Date().setYear(start.getFullYear()+1));
  $('#commercialModel').on('shown.bs.modal', function() {
        $('#start_date').datepicker({
           startDate : start,
           endDate   : end
          }).on('changeDate', function(){
            // set the "toDate" start to not be later than "fromDate" ends:
            $('#end_date').datepicker('setStartDate', new Date($(this).val()));
        });

         $('#end_date').datepicker({
            // format: 'yy/mm/dd',
            startDate : start,
            endDate   : end
        // update "fromDate" defaults whenever "toDate" changes
        }).on('changeDate', function(){
            // set the "fromDate" end to not be later than "toDate" starts:

            $('#start_date').datepicker('setEndDate', new Date($(this).val()));
        });

        $(document).on('blur','#start_date',function(e){
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            if(new Date(end_date) < new Date(start_date)) {
                $('#end_date').val($('#start_date').val());
            }
        });
    });

});
</script>
@endsection
