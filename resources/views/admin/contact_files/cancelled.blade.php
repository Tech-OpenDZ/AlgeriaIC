@extends('admin.layouts.master')

@section('head')
<style type="text/css">
    .dataTables_filter {
        display: none;
    }
</style>
@endsection

@section('content')
@include('alert_messages')
<!--begin::Card-->
<div class="card card-custom gutter-b">
    <div class="card-header flex-wrap py-3">
        <div class="card-title">
            <h3 class="card-label"> Canceled Conatct File
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
                <!-- <div class="col-lg-3 mb-lg-0 mb-6">
                    <label>Status:</label>
                    <select class="form-control datatable-input searchStatus" name="status" id="status">
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
            </div> -->
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
                                <th>Request ID</th>
                                <th>User</th>
                                <th>Criteria</th>
                                <th>Estimation</th>
                                <th>Created At</th>
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

<div id="validatedModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='validateForm' id='validateForm' method="POST">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="request_id" value="" id="delete_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to validate this request?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="cancelledModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='cancelledForm' id='cancelledForm' method="POST">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="request_id" value="" id="delete_hidden_cancelled">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to cancel this request?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@section('sctipts')

<script type="text/javascript">
    $(function() {

        var table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('cancelled-contact-file-request') }}",
                data: function(d) {
                    d.search = $('input[name=search]').val(),
                        d.status = $('.searchStatus').val();
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'user',
                    name: 'user',
                    orderable: false
                },
                {
                    data: 'search_criteria',
                    name: 'search_criteria',
                    orderable: false
                },
                {
                    data: 'estimation',
                    name: 'estimation',

                },
                {
                    data: 'created_at',
                    type: 'num',
                    render: {
                        _: 'display',
                        sort: 'timestamp'
                    }
                },
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

    // cancelled
    $(document).ready(function() {
        $('body').on('click', ".validated_btn", function(e) {
            e.stopPropagation();
            console.log($(this).data('href'));
            var del_id = $(this).data('id');
            $('#validateForm').attr('action', $(this).data('href'));
            $('#delete_hidden').val(del_id);
            $('#validatedModal').modal('show');
        });
    });

    // validated
    $(document).ready(function() {
        $('body').on('click', ".cancelled_btn", function(e) {
            e.stopPropagation();
            var del_id = $(this).data('id');
            console.log(del_id);
            $('#cancelledForm').attr('action', $(this).data('href'));
            $('#delete_hidden_cancelled').val(del_id);
            $('#cancelledModal').modal('show');
        });
    });
</script>
@endsection
