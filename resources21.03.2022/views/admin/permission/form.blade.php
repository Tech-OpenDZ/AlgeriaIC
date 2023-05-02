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
            {!! Form::label('module', 'Module',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::text('module', null, array('class' => 'form-control')) !!}
            @error('module')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-secondary" href="{{ route('manage-admin-permission.index') }}">Cancel</a>
        </div>
    </div>
</form>
