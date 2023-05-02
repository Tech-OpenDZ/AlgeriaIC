<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('activity_code', 'Code',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('activity_code',isset($codes->activity_code) ? $codes->activity_code : '' , array('class' => 'form-control')) !!}
                     @error('activity_code')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
        </div> 

         <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('description',isset($codes->description) ? $codes->description: '' , ['class' => 'form-control', 'id' => '']) !!}
                    @error('description')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
        </div> 
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-code.index') }}">Cancel</a>
    </div>
</form>