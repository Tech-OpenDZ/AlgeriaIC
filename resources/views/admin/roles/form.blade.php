<form class="form">
    <div class="card-body">
        <div class="form-group row">
            {!! Form::label('name', 'Name',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
            @error('name')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            {!! Form::label('', 'Permissions') !!}
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
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-secondary" href="{{ route('roles.index') }}">Cancel</a>
        </div>
    </div>
</form>
