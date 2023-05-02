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
    if (\Auth::user()->can('company-edit') || \Auth::user()->can('company-delete')) {
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
                <h3 class="card-label">Manage Company
            </div>
            <div class="card-toolbar">
                @can('company-create')
                <!--begin::Button-->
                <a href="{{route('import-company')}}" class="btn btn-primary">
                    <span class="svg-icon svg-icon-md">
                    </span>Add Company From Excel
                </a>&nbsp;&nbsp;&nbsp;
                <!--end::Button--> 

                <!--begin::Button-->
                <a href="{{route('manage-company.create')}}" class="btn btn-primary">
                    <span class="svg-icon svg-icon-md">
                    </span>Add Company Manually
                </a>
                <!--end::Button-->
                @endcan
            </div>
        </div>
        <div class="card-body">
            <form method="POST" id="search-form" class="kt-form kt-form--fit mb-15" role="form">
                <div class="row mb-6">
                    <div class="col-lg-3 mb-lg-0 mb-4">
                        <label>Search</label>
                        <input type="text" class="form-control datatable-input" name="search" placeholder="Search" />
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-4">
                        <label>Status</label>
                        <select class="form-control datatable-input searchStatus" name="status">
                            <option value="">Select</option>
                            <option value="1">Active </option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-lg-0 mb-4">
                        <label>Approval</label>
                        <select class="form-control datatable-input searchApproval" name="approval">
                            <option value="">Select</option>
                            <option value="1">Approved </option>
                            <option value="0">Pending</option>
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
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Approval</th>
                                    <th>Added/Updated On</th>
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
<div id="companyModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='deleteCompanyForm' id='deleteCompanyForm'  method="POST">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this company?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary" id="delete">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('sctipts')
    <script>
        $(function () {

            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('manage-company.index') }}",
                    data: function (d) {
                        d.search = $('input[name=search]').val();
                        d.status = $('.searchStatus').val();
                        d.approval =  $('.searchApproval').val();
                    }
                },
                columns: [
                    {data: 'company_name', name: 'company_name'},
                    {data: 'email', name: 'email', orderable: false,},
                    {data: 'status', name: 'status', orderable: false,},
                    {data: 'is_approved', name: 'is_approved', orderable: false,},
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
        });

$(document).ready(function(){
    $('body').on('click', ".delete_company_btn", function(e) {
        e.stopPropagation();
        console.log($(this).data('href'));
        var del_id = $(this).data('id');
        $('#deleteCompanyForm').attr('action', $(this).data('href'));
        $('#delete_hidden').val(del_id);
        $('#companyModal').modal('show');
    });
});

$('#delete').on('click', function(e) {
    e.preventDefault();
    $("#delete").attr("disabled", true);
    this.form.submit();
});
</script>
@endsection
