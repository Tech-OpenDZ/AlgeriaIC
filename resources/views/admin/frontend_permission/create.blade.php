@extends('admin.layouts.master')

@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Add Frontend Permission</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-frontend-permission.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => 'manage-frontend-permission.store')) !!}
         @include('admin.frontend_permission.form')
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection

