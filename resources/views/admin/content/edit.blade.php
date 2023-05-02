@extends('admin.layouts.master')
@section('content')
    <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
        <div class="card-header">
            <div class="card-title" style="width: 100%;">
                <h3 class="card-label pull-left"  style="width: 100%;">
                    @if(isset($cms_page->id))
                        Edit
                    @else
                        Add
                    @endif
                     Content
                </h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-content.index') }}">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['method' => 'post', 'route' => isset($cms_page->id) ? ['manage-content.update', $cms_page->id] : ['manage-content.store'], 'id' => 'eit_Content_form','files' => true]) !!}
                <div class="card-body">
                    @csrf
                    @if(isset($cms_page->id))
                        @method('PUT')
                    @endif

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('title_in_english', 'Title (In English)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('title_in_english', isset($cms_page->localeAll[0]->title) ? $cms_page->localeAll[0]->title: '', ['class' => 'form-control']) !!}
                                @error('title_in_english')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('title_in_arabic', 'Title (In Arabic)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('title_in_arabic',  isset($cms_page->localeAll[2]->title) ? $cms_page->localeAll[2]->title: '', ['class' => 'form-control']) !!}
                                @error('title_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('title_in_french', 'Title (In French)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('title_in_french',  isset($cms_page->localeAll[1]->title) ? $cms_page->localeAll[1]->title: '', ['class' => 'form-control']) !!}
                                @error('title_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="englishTitle" value="{{isset($cms_page->localeAll[0]->title) ? $cms_page->localeAll[0]->title: ''}}">
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('content_in_english', 'Content (In English)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('content_in_english', isset($cms_page->localeAll[0]->content) ? $cms_page->localeAll[0]->content: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-1']) !!}
                                @error('content_in_english')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('content_in_arabic', 'Content (In Arabic)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('content_in_arabic',  isset($cms_page->localeAll[2]->content) ? $cms_page->localeAll[2]->content: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-2']) !!}
                                @error('content_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('content_in_french', 'Content (In French)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('content_in_french',  isset($cms_page->localeAll[1]->content) ? $cms_page->localeAll[1]->content: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-3']) !!}
                                @error('content_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
                        {!! Form::label('', '*',['style' => 'color:red']) !!}
                        {!! Form::text('display_order',  isset($cms_page->display_order) ? $cms_page->display_order: $defaultDisplayOrder, ['class' => 'form-control']) !!}
                        @error('display_order')
                            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('', 'Status') !!}<br/><br/>
                        {!! Form::checkbox('status',1, isset( $cms_page->status) ? $cms_page->status: 1) !!}
                        {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('manage-content.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
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
    </script>
    <!--end::Page Scripts-->
@endsection

