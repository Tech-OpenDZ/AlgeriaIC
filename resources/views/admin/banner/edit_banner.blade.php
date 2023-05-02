
@extends('admin.layouts.master')
@section('content')
    <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
        <div class="card-header">
            <div class="card-title" style="width: 100%;">
                <h3 class="card-label pull-left"  style="width: 100%;">
                 Edit banner
                </h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-banner.index') }}">Back</a>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="card-body">
        {!! Form::open(['method' => 'post', 'route' => ['update-banner',$bannerImage->id], 'class' => 'form-horizontal' ,'id' => 'bannerForm','files' => true]) !!}
        {{ csrf_field() }}

        <div class="form-group">
            <input type="hidden" value="{{ $bannerImage->id}}" name="banner_id" id="banner_id">
            {{ Form::label('banner_img', 'Banner Image',['class' => 'required-class']) }}
            {!! Form::label('', '*',['style' => 'color:red']) !!} <br>
            @if(isset($bannerImage->banner_img))
                {!! Form::image('storage/uploads/banner/'.$bannerImage->banner_img,'', array('width' => 150, 'height' => 150,'id' => 'banner_img', 'style' => 'Cursor:text !important', 'onclick' =>"return false;", 'alt' =>'Banner Image'))  !!} <br>
            @endif
            {!! Form::label('', '(Please select a Image having width 728 and height of 90 pixels)')!!}
            {!! Form::file('image',['id' => 'banner_img', 'class' => 'form-control col-lg-12']) !!}
            @error('image')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
       
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('header_in_english', 'Heading (In english)') !!}
                    {!! Form::text('header_in_english',isset($banners->header_in_english) ? $banners->header_in_english : '' ,array('class' => 'form-control','id'=>'header_in_english')) !!}
                    @error('header_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('header_in_arabic', 'Heading (In arabic)') !!}
                    {!! Form::text('header_in_arabic',isset($banners->header_in_arabic) ? $banners->header_in_arabic : '' ,array('class' => 'form-control')) !!}
                    @error('header_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('header_in_french', 'Heading (In french)') !!}
                    {!! Form::text('header_in_french',isset($banners->header_in_french) ? $banners->header_in_french : '' ,array('class' => 'form-control')) !!}
                    @error('header_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('content_in_english', 'Content (In english)') !!}
                    {!! Form::text('content_in_english',isset($banners->content_in_english) ? $banners->content_in_english: '' ,array('class' => 'form-control')) !!}
                    @error('content_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('content_in_arabic', 'Content (In arabic)') !!}
                    {!! Form::text('content_in_arabic',isset($banners->content_in_arabic) ? $banners->content_in_arabic : '' ,array('class' => 'form-control')) !!}
                    @error('content_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('content_in_french', 'Content (In french)') !!}
                    {!! Form::text('content_in_french',isset($banners->content_in_french) ? $banners->content_in_french: '' ,array('class' => 'form-control')) !!}
                    @error('content_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('link', 'Link',['class' => '']) !!}
                    {!! Form::text('link', isset($bannerImage->link) ? $bannerImage->link : '', ['class' => 'form-control']) !!}
                   
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('display_order', 'Display Order',['class' => '']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('display_order',isset($bannerImage->display_order) ? $bannerImage->display_order : '', ['class' => 'form-control']) !!}
                    @error('display_order')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}<br/>
                    {!! Form::checkbox('status',1,1) !!}
                    {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                </div>
            </div>
        </div>       
</div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary update_banner">Validate</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-button">Close</button>
    </div>
{!! Form::close() !!}

        </div>
    </div>
@endsection




 
