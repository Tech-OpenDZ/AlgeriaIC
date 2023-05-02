<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('module_name_in_english', 'Module Name (In English)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('module_name_in_english', isset($frontendPermission->localeAll[0]->module) ? $frontendPermission->localeAll[0]->module: '', ['class' => 'form-control']) !!}
                    @error('module_name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('module_name_in_arabic', 'Module Name (In Arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('module_name_in_arabic',  isset($frontendPermission->localeAll[2]->module) ? $frontendPermission->localeAll[2]->module: '', ['class' => 'form-control']) !!}
                    @error('module_name_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('module_name_in_french', 'Module Name (In French)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('module_name_in_french',  isset($frontendPermission->localeAll[1]->module) ? $frontendPermission->localeAll[1]->module: '', ['class' => 'form-control']) !!}
                    @error('module_name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('permission_name_in_english', 'Permission Name (In English)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('permission_name_in_english', isset($frontendPermission->localeAll[0]->value) ? $frontendPermission->localeAll[0]->value: '', ['class' => 'form-control']) !!}
                    @error('permission_name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('permission_name_in_arabic', 'Permission Name (In Arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('permission_name_in_arabic',  isset($frontendPermission->localeAll[2]->value) ? $frontendPermission->localeAll[2]->value: '', ['class' => 'form-control']) !!}
                    @error('permission_name_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('permission_name_in_french', 'Permission Name (In French)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('permission_name_in_french',  isset($frontendPermission->localeAll[1]->value) ? $frontendPermission->localeAll[1]->value: '', ['class' => 'form-control']) !!}
                    @error('permission_name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-secondary" href="{{ route('manage-frontend-permission.index') }}">Cancel</a>
        </div>
    </div>
</form>
