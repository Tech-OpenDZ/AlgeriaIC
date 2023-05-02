@extends('admin.layouts.master')
@section('content')
    <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
        <div class="card-header">
            <div class="card-title" style="width: 100%;">
                <h3 class="card-label pull-left"  style="width: 100%;">
                @if(isset($service->id))
                        Edit
                    @else
                        Add
                    @endif
                     Service
                </h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-service.index') }}">Back</a>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="card-body">
            {!! Form::open(['method' => 'post', 'route' => isset($service->id) ? ['manage-service.update', $service->id] : ['manage-service.store'], 'id' => 'eit_service_form','files' => true]) !!}
                <div class="card-body">
                    @csrf
                    @if(isset($service->id))
                        @method('PUT')
                    @endif

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('name_in_english', 'Name (In English)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('name_in_english', isset($service->localeAll[0]->name) ? $service->localeAll[0]->name: '', ['class' => 'form-control']) !!}
                                @error('name_in_english')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('name_in_arabic', 'Name (In Arabic)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('name_in_arabic',  isset($service->localeAll[2]->name) ? $service->localeAll[2]->name: '', ['class' => 'form-control']) !!}
                                @error('name_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('name_in_french', 'Name (In French)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('name_in_french',  isset($service->localeAll[1]->name) ? $service->localeAll[1]->name: '', ['class' => 'form-control']) !!}
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
                                {!! Form::textarea('description_in_english', isset($service->localeAll[0]->description) ? $service->localeAll[0]->description: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-1']) !!}
                                @error('description_in_english')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('description_in_arabic', 'Description (In Arabic)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('description_in_arabic',  isset($service->localeAll[2]->description) ? $service->localeAll[2]->description: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-2']) !!}
                                @error('description_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('description_in_french', 'Description (In French)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('description_in_french',  isset($service->localeAll[1]->description) ? $service->localeAll[1]->description: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-3']) !!}
                                @error('description_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group">
                        {!! Form::label('category_id', 'Service Category',['class' => 'required-class']) !!}
                        {!! Form::label('', '*',['style' => 'color:red']) !!}

                        {!!Form::select('category_id', $categories, isset($service->category_id) ? $service->category_id: null, ['class' => 'form-control'])!!}
                        @error('category_id')
                            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
                        {!! Form::label('', '*',['style' => 'color:red']) !!}
                        {!! Form::text('display_order',  isset($service->display_order) ? $service->display_order: $defaultDisplayOrder , ['class' => 'form-control']) !!}
                        @error('display_order')
                            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('', 'Status') !!}<br/><br/>
                        {!! Form::checkbox('status',1, isset( $service->status) ? $service->status: 1) !!}
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
    <!--begin::Page Scripts(used by this page)-->
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
    <!--end::Page Scripts-->

@endsection

