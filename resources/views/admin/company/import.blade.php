@extends('admin.layouts.master')
@section('content')

<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Import File</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-company.index') }}">Back</a>
            </div>&nbsp;&nbsp;
        </div>
    </div>
    {!! Form::open(array('method'=>'POST','route' => ['store-company'],'files' => true)) !!}
      	<div class="card-body">
        	<div class="form-group">
        		<div class="col-lg-7">
				    {!! Form::label('file', 'Choose File',['class' => 'required-class']) !!}
				    {!! Form::label('', '*',['style' => 'color:red']) !!} 
	        		<br/><br/>
				    {!! Form::file('file',['id' => 'file','class' =>'form-control','data-parsley-required' => 'true']) !!}<br><br>
				     @error('file')
				        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
				     @enderror 

				     @error('error_msg')
				        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
				     @enderror
				     
				     @if($error_msg)
				     	@foreach($error_msg as $single_error)
				        <div class="bg-danger-o-50 py-2 px-4">{{ $single_error }}</div>
				        @endforeach
				     @endif
					 {!! Form::label('', 'Download sample file.') !!} <br>
					 <a class="btn btn-primary" href="{{asset('company.ods')}}">Download</a>
				</div>
        	</div> 
        </div>
	    <div class="card-footer">
	        <button type="Submit" class="btn btn-primary mr-2">Submit</button>
	        <a class="btn btn-secondary" href="{{ route('manage-company.index') }}">Cancel</a>
	    </div>
    {!! Form::close() !!}
    </div>
@endsection