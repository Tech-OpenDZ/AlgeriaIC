@extends('admin.layouts.master')
  
@section('content')
@include('alert_messages')

<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Edit FAQ</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-faq.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">

        @if($faq)
            {{ Form::model($faq, ['route' => ['manage-faq.update', $faq->id], 'method' => 'patch']) }}
        @else
            {!! Form::open(array('route' => 'manage-faq.store', 'method'=>'POST')) !!}  
        @endif

            @include('admin.faq.form')

        {!! Form::close() !!}

    </div>
</div>
<!--end::Card-->
@endsection