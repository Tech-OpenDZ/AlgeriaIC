@extends('admin.layouts.master')
  
@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Add Dashboard</h3>
            <div class="pull-right">
                @if(request()->segment(3) != null)
                    <a class="btn btn-primary" href="{{ route('dashboard-list',['id'=> request()->segment(3)]) }}">Back</a>
                @else
                    <a class="btn btn-primary" href="{{ route('dashboard') }}">Back</a>
                @endif
            </div>
        </div>
    </div> 
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => 'store-dashboard','files' => true)) !!}
         @include('admin.business_intelligence.form')
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection 