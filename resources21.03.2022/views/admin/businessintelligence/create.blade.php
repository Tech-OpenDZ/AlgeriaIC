@extends('admin.layouts.master')
@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Add Business Intelligence</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-business-intelligences.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => 'manage-business-intelligences.store','files' => true)) !!}
         @include('admin.businessintelligence.form')
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
<!--end::Page Scripts-->

@endsection