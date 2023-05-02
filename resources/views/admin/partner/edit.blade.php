@extends('admin.layouts.master')
  
@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Edit Partner</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-partner.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => ['manage-partner.update',$partner->id],'files' => true)) !!}
    {{ method_field('PATCH') }} 
         @include('admin.partner.form')
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection 
@section('sctipts')
<script>
 $(document).ready(function() {

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#logo_img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#logo").change(function(){
        readURL(this);
    });
})
</script>
@endsection


