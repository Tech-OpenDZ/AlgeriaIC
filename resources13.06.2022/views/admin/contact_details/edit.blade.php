@extends('admin.layouts.master')
@section('content')
    <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
        <div class="card-header">
            <div class="card-title" style="width: 100%;">
                <h3 class="card-label pull-left"  style="width: 100%;">
                    @if(isset($setting->id))
                        Edit Setting
                    @else
                        Add Setting
                    @endif
                </h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-contact-details.index') }}">Back</a>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="card-body">
            {!! Form::open(['method' => 'post', 'route' => isset($setting->id) ? ['manage-contact-details.update', $setting->id] : ['manage-contact-details.store'], 'id' => 'eit_setting_form']) !!}
                <div class="card-body">
                    @csrf
                    @if(isset($setting->id))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        Title :- <?php echo $setting->title; ?>
                    
                    </div>
                    @if(isset($setting->is_locale) && $setting->is_locale == 1)
                            <div class="form-group row setting_value" style="display: none;">
                    @else
                            <div class="form-group row setting_value">
                    @endif
                        <div class="col-lg-3">
                            <div class="form-group">
                                {!! Form::label('value', 'value') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                               
                                @if($setting->key == "want_to_show_testimonials_on_home_page")
                                    {!! Form::text('value', isset($setting->value) ? $setting->value: '', ['class' => 'form-control','readonly']) !!}
                                @else
                                    {!! Form::text('value', isset($setting->value) ? $setting->value: '', ['class' => 'form-control']) !!}
                                @endif
                                @error('value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @if(isset($setting->is_locale) && $setting->is_locale == 1)
                            <div class="form-group row translate_value"  >
                    @else
                            <div class="form-group row translate_value" style="display: none;">
                    @endif
                        <div class="col-lg-4">  
                            <div class="form-group">
                                {!! Form::label('value_en', 'value_en') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('value_en', isset($setting->localeAll[0]->value) ? $setting->localeAll[0]->value: '', ['class' => 'form-control']) !!}
                                @error('value_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('value_ar', 'value_ar',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('value_ar',  isset($setting->localeAll[2]->value) ? $setting->localeAll[1]->value: '', ['class' => 'form-control']) !!}
                                @error('value_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('value_fr', 'value_fr',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('value_fr',  isset($setting->localeAll[1]->value) ? $setting->localeAll[2]->value: '', ['class' => 'form-control']) !!}
                                @error('value_fr')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        {!! Form::label('', 'Status') !!}<br/><br/>
                        {!! Form::checkbox('status',1, isset( $setting->status) ? $setting->status: '') !!}
                        {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('manage-contact-details.index') }}">Cancel</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('sctipts')
    <script>
        $('#is_locale').on('click', function () {
            $('.translate_value').toggle();
            $('.setting_value').toggle();
        });
    </script>

@endsection

