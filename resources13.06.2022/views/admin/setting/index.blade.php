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
if (\Auth::user()->can('setting-edit')) {
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
                <h3 class="card-label">Manage Setting
            </div>
            <div class="card-toolbar">

                <!--begin::Button-->
                <!-- <a href="{{route('manage-setting.create')}}" class="btn btn-primary">
                    New Setting
                </a> -->
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <form class="kt-form kt-form--fit mb-15" id="search-form" method="post">

                <div class="row mb-6">
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Search</label>
                        <input type="text" class="form-control datatable-input" name="search" placeholder="Search" />
                    </div>
                    <<div class="col-lg-3 mb-lg-0 mb-6">
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
                                    <th>Value</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created At</th>
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

    <script type="text/javascript">
        $(function () {

            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('manage-setting.index') }}",
                    data: function (d) {
                        d.search = $('input[name=search]').val(),
                        d.status = $('.searchStatus').val();
                    }
                },
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'value', name: 'value', orderable: false},
                    {data: 'category', name: 'category', orderable: false},
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


    </script>
@endsection
