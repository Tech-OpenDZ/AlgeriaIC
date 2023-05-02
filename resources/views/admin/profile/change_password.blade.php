@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    @include('alert_messages')
        <div class="card card-primary">
            {!! Form::open(['method' => 'post', 'route' => 'change-password', 'id' => 'change_password_form']) !!}
            <div class="card-body">
                <div class="form-group">
                    <h3>Change Password</h3> 
                </div>

                <div class="form-group">
                    {!! Form::label('existing_password', 'Existing Password',['class' => 'required-class']) !!}
                    {!! Form::password('existing_password', ['class' => 'form-control','placeholder' => 'Existing Password']) !!}
                    @error('existing_password')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('new_password', 'New Password',['class' => 'required-class']) !!}
                    {!! Form::password('new_password', ['class' => 'form-control','id' => 'new_password', 'placeholder' => 'New Password']) !!}
                    @error('new_password')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('confirm_password', 'Confirm Password',['class' => 'required-class']) !!}
                    {!! Form::password('confirm_password', ['class' => 'form-control','placeholder' => 'Confirm New assword']) !!}
                    @error('confirm_password')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
            {!! Form::submit('Change Password', ['class' => 'btn btn-primary btn-order', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;']) !!}
            </div>
            {!! form::close() !!}
        </div>
    </div>
  </div>
</div>
@endsection
