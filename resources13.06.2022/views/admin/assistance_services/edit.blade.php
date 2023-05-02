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
    border:none;
    }
    .removeSelected {
        text-align: center;
        padding-left: 40px;
    }
    .heading{
        width:850;
        background-color: #E5EAEE;
        height: 50px;
        padding-left:15px;
    }
</style> 
@endsection 
@section('content')
@include('alert_messages')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Edit Assistance Service</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-assistance-services.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => ['manage-assistance-services.update',$assistance_data->id],'files'=>true)) !!}
    {{ method_field('PATCH') }} 
         @include('admin.assistance_services.form')
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection 
@section('sctipts')
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('dist/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.4')}}"></script>
<script src="{{asset('dist/assets/js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.4')}}"></script>
<!--end::Page Scripts-->

<script>
    
</script>


@endsection