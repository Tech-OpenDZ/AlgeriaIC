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
    if (\Auth::user()->can('advertisement-report') || \Auth::user()->can('advertisement-edit') || \Auth::user()->can('advertisement-delete')) {
        $actionEnable = true;
    }
    else {
        $actionEnable = false;
    }
@endphp
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">Manage Advertisement
            </div>
            @can('advertisement-create')
            <div class="card-toolbar">

                <!--begin::Button-->
                <a href="{{route('manage-advertisement.create')}}" class="btn btn-primary">
                    New Advertisement
                </a>
                <!--end::Button-->
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
                        <table class="table table-bordered table-checkable" id="data-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Created At</th>
                                    <th>Location</th>
                                    <th>Number of Views</th>
                                    <th>Number of Clicks</th>
                                    <th>Ctr</th>
                                    <th>Status</th>
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
                        <!--end: Datatable-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Card-->
@endsection


@section('sctipts')

    <!-- Advertisement Delete confirmation model -->
    <div id="deleteAdvertisementModal" class="modal fade delete_admin_btn" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name='deleteAdvertisementForm' id='deleteAdvertisementForm'  method="POST">
                    {{method_field('DELETE')}}
                    {{ csrf_field() }}
                    <input type="hidden" name="delete" value="" id="delete_hidden">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure want to delete this content?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary" id="delete">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function () {

            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('manage-advertisement.index') }}",
                    data: function (d) {
                        d.search = $('input[name=search]').val(),
                        d.status = $('.searchStatus').val();
                    }
                },
                columns: [
                    {data: 'title', name: 'title'},
                    // {data: 'url', name: 'url'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'location', name: 'location'},
                    {data: 'number_of_views', name: 'number_of_views'},
                    {data: 'number_of_clicks', name: 'number_of_clicks'},
                    {data: 'ctr', name: 'ctr'},
                    {data: 'status', name: 'status', orderable: false},
                    // {data: 'display_order', name: 'display_order'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "order": [[ 1, "desc" ]]
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
            var del_id = $(this).data('id');
            $('#deleteAdvertisementForm').attr('action', $(this).data('href'));
            $('#delete_hidden').val(del_id);
            $('#deleteAdvertisementModal').modal('show');
        });

        $('#delete').on('click', function(e) {
            e.preventDefault();
            $("#delete").attr("disabled", true);
            this.form.submit();
        });
    </script>
@endsection
