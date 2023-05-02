@extends('admin.layouts.master')
@section('content')
    <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
        <div class="card-header">
            <div class="card-title" style="width: 100%;">
                <h3 class="card-label pull-left"  style="width: 100%;">
                    @if(isset($admin->id))
                        Edit
                    @else
                        Add
                    @endif
                     Admin
                </h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-admin.index') }}">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['method' => 'post', 'route' => isset($admin->id) ? ['manage-admin.update', $admin->id] : ['manage-admin.store'], 'id' => 'eit_testimonial_form','files' => true]) !!}
                <div class="card-body">
                    @csrf
                    @if(isset($admin->id))
                        @method('PUT')
                    @endif

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('name', isset($admin->name) ? $admin->name: '', ['class' => 'form-control']) !!}
                                @error('name')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('email', 'Email',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('email',  isset($admin->email) ? $admin->email: '', ['class' => 'form-control']) !!}
                                @error('email')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if(!isset($admin->id))
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('password', 'Password',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                @error('password')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endif
                    </div>
                    <hr>

                    <div class="form-group">
                        {!! Form::label('', 'Status') !!}<br/><br/>
                        {!! Form::checkbox('status',1, isset( $admin->status) ? $admin->status: 1) !!}
                        {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                    </div>

                    <div class="form-group row">
                        <strong>{!! Form::label('', 'Permissions') !!}</strong>
                        <div class="col-lg-12" style="margin-top:20px; margin-left:16px; margin-bottom:20px;">
                            <label>
                                <input type="checkbox"  id="permission" onClick="select_related_permissions(this)"> Select All
                            </label>
                        </div>
                        <div class="row">
                            @foreach($permissions as $module => $permissionData)
                                <div class="col-lg-4">
                                    <div class="card card-custom card-stretch">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-label">
                                                    <label>
                                                        <input type="checkbox"  class="permission" id="{{str_replace(' ', '-', $module)}}" onClick="select_related_permissions(this)"> {{ $module }}
                                                    </label>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach($permissionData as $value)
                                                @if($value->name == "subscription-create" || $value->name == "subscription-delete")
                                                    @continue
                                                @endif
                                                <label class="col-lg-12">
                                                    {{ Form::checkbox('permission[]', $value->id, isset($rolePermissions) ? in_array($value->id, $rolePermissions) ? true : false : false, array('class' => "name ".str_replace(' ', '-', $module)." permission")) }}
                                                    {{ $value->name }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('permission')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('manage-admin.index') }}" class="btn btn-secondary" >Cancel</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('sctipts')
    <script>
        function select_related_permissions(module) {
            $('.'+module.id).prop('checked', module.checked);
        }
    </script>
@endsection

