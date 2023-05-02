@extends('admin.layouts.master')
@section('content')
    <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
        <div class="card-header">
            <div class="card-title" style="width: 100%;">
                <h3 class="card-label pull-left"  style="width: 100%;">
                @if(isset($serviceCategory->id))
                        Edit
                    @else
                        Add
                    @endif
                     Service Category
                </h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-service-category.index') }}">Back</a>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="card-body">
            {!! Form::open(['method' => 'post', 'route' => isset($serviceCategory->id) ? ['manage-service-category.update', $serviceCategory->id] : ['manage-service-category.store'], 'id' => 'eit_testimonial_form','files' => true]) !!}
                <div class="card-body">
                    @csrf
                    @if(isset($serviceCategory->id))
                        @method('PUT')
                    @endif

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('name_in_english', 'Name (In English)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('name_in_english', isset($serviceCategory->localeAll[0]->name) ? $serviceCategory->localeAll[0]->name: '', ['class' => 'form-control']) !!}
                                @error('name_in_english')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('name_in_arabic', 'Name (In Arabic)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('name_in_arabic',  isset($serviceCategory->localeAll[2]->name) ? $serviceCategory->localeAll[2]->name: '', ['class' => 'form-control']) !!}
                                @error('name_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('name_in_french', 'Name (In French)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('name_in_french',  isset($serviceCategory->localeAll[1]->name) ? $serviceCategory->localeAll[1]->name: '', ['class' => 'form-control']) !!}
                                @error('name_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('description_in_english', 'Description (In English)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('description_in_english', isset($serviceCategory->localeAll[0]->description) ? $serviceCategory->localeAll[0]->description: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-1']) !!}
                                @error('description_in_english')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('description_in_arabic', 'Description (In Arabic)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('description_in_arabic',  isset($serviceCategory->localeAll[2]->description) ? $serviceCategory->localeAll[2]->description: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-2']) !!}
                                @error('description_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('description_in_french', 'Description (In French)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('description_in_french',  isset($serviceCategory->localeAll[1]->description) ? $serviceCategory->localeAll[1]->description: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-3']) !!}
                                @error('description_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
                        {!! Form::label('', '*',['style' => 'color:red']) !!}
                        {!! Form::text('display_order',  isset($serviceCategory->display_order) ? $serviceCategory->display_order:  $defaultDisplayOrder , ['class' => 'form-control']) !!}
                        @error('display_order')
                            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('', 'Status') !!}<br/><br/>
                        {!! Form::checkbox('status',1, isset( $serviceCategory->status) ? $serviceCategory->status: 1) !!}
                        {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            <!-- </form> -->
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('sctipts')
    <script>
        // Code for text editor
        $('.summernote').summernote({
            height: 150
        });

        $(document).ready(function() {

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image_file").change(function(){
                readURL(this);
            });
        })
    </script>

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('dist/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.4')}}"></script>
    <script src="{{asset('dist/assets/js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.4')}}"></script>
    <!--end::Page Scripts-->

@endsection

