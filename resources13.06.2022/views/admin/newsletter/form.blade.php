<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('name', 'Name',['class' => 'required-class']) !!}
                    {!! Form::text('name',isset($newsletters->name) ? $newsletters->name : '' , array('class' => 'form-control')) !!}
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('company_name', 'Company Name',['class' => 'required-class']) !!}
                    {!! Form::text('company_name',isset($newsletters->company_name) ? $newsletters->company_name : '' , array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('job_title', 'Job Title',['class' => 'required-class']) !!}
                    {!! Form::text('job_title',isset($newsletters->job_title) ? $newsletters->job_title : '' , array('class' => 'form-control')) !!}
                </div> 
            </div> 
        </div> 

         <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('cell_phone', 'Cell Phone',['class' => 'required-class']) !!}
                    {!! Form::text('cell_phone',isset($newsletters->cell_phone) ? $newsletters->cell_phone : '' , array('class' => 'form-control')) !!}
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                     {!! Form::label('email', 'Email',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('email',isset($newsletters->email) ? $newsletters->email: '' , array('class' => 'form-control')) !!}
                    @error('email')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div> 
        </div> 
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-newsletter.index') }}">Cancel</a>
    </div>
</form>