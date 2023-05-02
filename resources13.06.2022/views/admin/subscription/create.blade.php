@extends('admin.layouts.master')

@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Add Subscriptions</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-subscription.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => 'manage-subscription.store')) !!}
         @include('admin.subscription.form')
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection
@section('sctipts')
    <script>
        // Code for text editor
        $('.summernote').summernote({
            height: 150
        });
    </script>

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('dist/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.4')}}"></script>
    <script src="{{asset('dist/assets/js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.4')}}"></script>
    <script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
    <!--end::Page Scripts-->
    <script>
        var permissionArray = <?php echo json_encode(array_keys((array)$permission_arr), true); ?>;
        var KTSelect2 = function() {
           var  demos = function (){
                $('#kt_select2_3').select2({
                    placeholder: "Choose some permissions",
                });
            };
            return {
                init: function() {
                    demos();
                }
            };
        }();

        // Selecting all permissions.
        $('#select_all_permissions').click(function(){

            $('#kt_select2_3').val(permissionArray);
            $('#kt_select2_3').select2({
                placeholder: "Choose some permissions",
            });
        });

        // Removing all permissions.
        $('#remove_all_permissions').click(function(){

            $('#kt_select2_3').val([]);
            $('#kt_select2_3').select2({
                placeholder: "Choose some permissions",
            });
        });
    </script>
@endsection
