@extends('admin.layouts.master')
@section('head')
<style>
    input[type="file"] {
    display: block;
    }
    .imageThumb {
    min-height: 100px;
    max-height: 100px;
    max-width: 100px;
    padding: 5px;
    cursor: pointer;
    

    }
    .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
    border:none;
    }
    .remove {
    display: block;
    background: white;
    color: black;
    text-align: center;
    cursor: pointer;
    }
</style>
@endsection 
@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Add Meeting Event</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-business-meeting.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => 'manage-business-meeting.store','files'=>true)) !!}
        @include('admin.businessmeeting.form')
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection
@section('sctipts')
<script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
<script>
    var sectors = <?php echo json_encode(array_keys((array)$sector_arr), true); ?>;
    var KTSelect2 = function() {
        var  demos = function (){
            $('#sectors').select2({
                placeholder: "Choose some sectors",
            });
        };
        return {
            init: function() {
                demos();
            }
        };
    }();
    KTSelect2.init();
    // Selecting all sectors.
    $('#select_all_sectors').click(function(){

        $('#sectors').val(sectors);
        $('#sectors').select2({
            placeholder: "Choose some sectors",
        });
    });

    // Removing all sectors.
    $('#remove_all_sectors').click(function(){

        $('#sectors').val([]);
        $('#sectors').select2({
            placeholder: "Choose some sectors",
        });
    });

</script>
@endsection
