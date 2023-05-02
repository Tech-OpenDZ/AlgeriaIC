@extends('admin.layouts.master')
@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Edit dashboard</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('dashboard-list',['id'=> request()->segment(3)])}}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => ['manage-shuttle-sheet.update',$sheet_data->id],'files' => true)) !!}
        @include('admin.business_intelligence.shuttle_sheet_form') 
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection 