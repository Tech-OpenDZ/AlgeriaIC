<form class="form">
    <div class="card-body">
    <div class="form-group">
        {!! Form::label('',isset($configuration->key)?ucWords(str_replace('_',' ',$configuration->key)): '' ,['class' => 'required-class']) !!}
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
            {!! Form::label('','Value in DZD' ,['class' => 'required-class']) !!}
            <div class="form-group">
            {!! Form::number('value_dzd',isset($configuration->value_DZD) ? $configuration->value_DZD : '' , array('class' => 'form-control')) !!}
                @error('value')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            {!! Form::label('', 'Value in USD',['class' => 'required-class']) !!}
            <div class="form-group">
                {!! Form::number('value_usd',isset($configuration->value_USD) ? $configuration->value_USD : '' , array('class' => 'form-control')) !!}
                @error('value')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            {!! Form::label('','Value in Euro' ,['class' => 'required-class']) !!}
            <div class="form-group">
                {!! Form::number('value_euro',isset($configuration->value_Euro) ? $configuration->value_Euro : '' , array('class' => 'form-control')) !!}
                @error('value')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-payment-configuration.index') }}">Cancel</a>
    </div>
</form>
