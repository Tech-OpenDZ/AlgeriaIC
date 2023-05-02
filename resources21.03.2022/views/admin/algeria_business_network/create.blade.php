@extends('admin.layouts.master')
  
@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Add Algeria Business Network</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-algeria-business-network.index') }}">Back</a>
            </div>
        </div>
    </div> 
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => 'manage-algeria-business-network.store','files' => true)) !!}
        @include('admin.algeria_business_network.form')
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection 
@section('sctipts')
<!--begin::Page Scripts(used by this page)-->
<script>
    // Code for text editor
    $('.summernote').summernote({
        height: 150
    });
</script>
<script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
<!--end::Page Scripts-->
@endsection