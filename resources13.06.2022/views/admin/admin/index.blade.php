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
    if (\Auth::user()->can('admin-edit') || \Auth::user()->can('admin-delete')) {
        $actionEnable = true;
    }
    else {
        $actionEnable = false;
    }
@endphp
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header flex-wrap py-3">
        <div class="card-title">
            <h3 class="card-label">Manage Admin
        </div>
        <div class="card-toolbar">
            @can('admin-create')
                <!--begin::Button-->
                <a href="{{route('manage-admin.create')}}" class="btn btn-primary">
                    New Admin
                </a>
                <!--end::Button-->
            @endcan
        </div>
    </div>
    <div class="card-body">
        <!--begin: Search Form-->
        <form class="kt-form kt-form--fit mb-15" id="search-form" method="post">
            <div class="row mb-6">
            <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Search</label>
                        <input type="text" class="form-control datatable-input" name="search" placeholder="Search" />
            </div>
            <div class="col-lg-3 mb-lg-0 mb-6">
                <label>Status:</label>
                <select class="form-control datatable-input searchStatus" name="status" id="status">
                    <option value="">Select</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>

            <div class="row mt-8">
                <div class="col-lg-12">
                <button type="submit" class="btn btn-primary btn-primary--icon" id="kt_search">
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
        <!--begin::Example-->
        <div class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table table-bordered data-table" id="admin_datatable">
                        <thead class="datatable-head">
                            <tr>
                               <th scope="col">Name</th>
                               <th scope="col">Email</th>
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
        <!--end::Example-->
    </div>
</div>
<!--end::Card-->
 <!-- User Delete confirmation model -->
 <div id="adminModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='deleteAdminForm' id='deleteAdminForm' method="POST">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <div class="modal-header">

                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this Admin?</p>
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
    var table = $('#admin_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('manage-admin.index') }}",
          data: function (d) {
                d.search = $('input[name=search]').val(),
                d.status = $('.searchStatus').val();
            }
        },
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email', orderable: false},
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
        "order": [[ 3, "desc" ]],
    });


     $('#search-form').on('submit', function(e) {
        table.draw();
        e.preventDefault();
    });

     $('#kt_reset').on('click', function(e) {
        $('input[name=search]').val('');
        $('#status').val('');
        table.draw();
        e.preventDefault();
    })

  });

$(document).on('click', ".delete_admin_btn", function(e) {
    e.stopPropagation();
    console.log($(this).data('href'));
    $('#deleteAdminForm').attr('action', $(this).data('href'));
    $('#adminModal').modal('show');
});

$('#delete').on('click', function(e) {
    e.preventDefault();
    $("#delete").attr("disabled", true);
    this.form.submit();
});
</script>
@endsection


