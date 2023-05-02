@extends('admin.layouts.master')
@section('content')
    <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
        <div class="card-header">
            <div class="card-title" style="width: 100%;">
                <h3 class="card-label pull-left"  style="width: 100%;">
                @if(isset($testimonial->id))
                        Edit
                    @else
                        Add
                    @endif
                     Testimonial
                </h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-testimonial.index') }}">Back</a>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="card-body">
            {!! Form::open(['method' => 'post', 'route' => isset($testimonial->id) ? ['manage-testimonial.update', $testimonial->id] : ['manage-testimonial.store'], 'id' => 'eit_testimonial_form','files' => true]) !!}
                <div class="card-body">
                    @csrf
                    @if(isset($testimonial->id))
                        @method('PUT')
                    @endif

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('name_in_english', 'Name (In English)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('name_in_english', isset($testimonial->localeAll[0]->name) ? $testimonial->localeAll[0]->name: '', ['class' => 'form-control']) !!}
                                @error('name_in_english')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('name_in_arabic', 'Name (In Arabic)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('name_in_arabic',  isset($testimonial->localeAll[2]->name) ? $testimonial->localeAll[2]->name: '', ['class' => 'form-control']) !!}
                                @error('name_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('name_in_french', 'Name (In French)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('name_in_french',  isset($testimonial->localeAll[1]->name) ? $testimonial->localeAll[1]->name: '', ['class' => 'form-control']) !!}
                                @error('name_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('sub_title_in_english', 'Sub Title (In English)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('sub_title_in_english', isset($testimonial->localeAll[0]->sub_title) ? $testimonial->localeAll[0]->sub_title: '', ['class' => 'form-control']) !!}
                                @error('sub_title_in_english')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('sub_title_in_arabic', 'Sub Title (In Arabic)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('sub_title_in_arabic',  isset($testimonial->localeAll[2]->sub_title) ? $testimonial->localeAll[2]->sub_title: '', ['class' => 'form-control']) !!}
                                @error('sub_title_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('sub_title_in_french', 'Sub Title (In French)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('sub_title_in_french',  isset($testimonial->localeAll[1]->sub_title) ? $testimonial->localeAll[1]->sub_title: '', ['class' => 'form-control']) !!}
                                @error('sub_title_in_french')
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
                                {!! Form::textarea('description_in_english', isset($testimonial->localeAll[0]->description) ? $testimonial->localeAll[0]->description: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-1']) !!}
                                @error('description_in_english')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('description_in_arabic', 'Description (In Arabic)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('description_in_arabic',  isset($testimonial->localeAll[2]->description) ? $testimonial->localeAll[2]->description: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-2']) !!}
                                @error('description_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('description_in_french', 'Description (In French)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('description_in_french',  isset($testimonial->localeAll[1]->description) ? $testimonial->localeAll[1]->description: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-3']) !!}
                                @error('description_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group">
                        {!! Form::label('image', 'Image',['class' => 'required-class']) !!}
                        {!! Form::label('', '(Please select the image of having maximum width and height of 500 pixels)')!!}
                        @if(isset($testimonial->image))
                            <br/><br/>
                            {!! Form::image($testimonial->image ? 'storage/uploads/testimonial/'.$testimonial->image : '/default-logo.png','image', array('width' => 150, 'height' => 150,'id' => 'image', 'style' => 'Cursor:text !important', 'onclick' =>"return false;", 'alt' =>'Image'))  !!} <br>
                        @else 
                            <br/>
                            {!! Form::image(asset('/default-logo.png'),'image', array('width' => 150, 'height' => 150,'id' => 'image', 'style' => 'Cursor:text !important;border-radius: 50%;', 'onclick' =>"return false;", 'alt' =>'Image'))  !!} <br>
                        @endif
                        {!! Form::file('image',['id' => 'image_file', 'class' => 'form-control']) !!}
                        @error('image')
                            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
                        {!! Form::label('', '*',['style' => 'color:red']) !!}
                        {!! Form::text('display_order',  isset($testimonial->display_order) ? $testimonial->display_order: $display_order, ['class' => 'form-control']) !!}
                        @error('display_order')
                            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('', 'Status') !!}<br/><br/>
                        {!! Form::checkbox('status',1, isset( $testimonial->status) ? $testimonial->status: 1) !!}
                        {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('manage-testimonial.index') }}">Cancel</a>
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

