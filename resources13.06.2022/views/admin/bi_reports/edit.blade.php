@extends('admin.layouts.master')
@section('content')
    <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
        <div class="card-header">
            <div class="card-title" style="width: 100%;">
                <h3 class="card-label pull-left"  style="width: 100%;">
                @if(isset($tender->id))
                        Edit
                    @else
                        Add
                    @endif
                     Tender
                </h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-tender.index') }}">Back</a>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="card-body">
            {!! Form::open(['method' => 'post', 'route' => isset($section->id) ? ['manage-bi-report.update', $section->id] : ['manage-bi-report.store'], 'id' => 'eit_section_form','files' => true]) !!}
                <div class="card-body">
                    @csrf
                    @if(isset($section->id))
                        @method('PUT')
                    @endif
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('logo', 'Image',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!} 
                                {!! Form::label('', '(Please select a image having maximum width and height of 500 pixels)')!!}
                                <br/><br/>
                                @if(isset($section->id)) 
                                {!! Form::image($section->image ? 'storage/uploads/bi_report_section/'.$section->image : 'storage/uploads/bi_report_section/default-logo.png','image', array('width' => 150, 'height' => 150,'id' => 'logo_img', 'style' => 'Cursor:text !important', 'onclick' =>"return false;", 'alt' =>'Image'))  !!} <br>
                                @endif
                                {!! Form::file('image',['id' => 'image','data-parsley-required' => 'true']) !!}
                                @error('image')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div> 
                            <hr>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group"> 
			                    {!! Form::label('title_in_english', 'Title (In english)') !!}
			                    {!! Form::label('', '*',['style' => 'color:red']) !!}
			                    {!! Form::text('title_in_english',isset($section->localeAll[0]->title) ? $section->localeAll[0]->title : '' , array('class' => 'form-control')) !!}
			                    @error('title_in_english')
			                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			                    @enderror
			                </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('title_in_arabic', 'Title (In arabic)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('title_in_arabic', isset($section->localeAll[1]->title) ? $section->localeAll[1]->title : '', ['class' => 'form-control']) !!}
                                @error('title_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('title_in_french', 'Title (In french)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('title_in_french', isset($section->localeAll[2]->title) ? $section->localeAll[2]->title : '', ['class' => 'form-control']) !!}
                                @error('title_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group"> 
			                    {!! Form::label('description_in_english', 'Description (In english)') !!}
			                    {!! Form::label('', '*',['style' => 'color:red']) !!}
			                    {!! Form::textarea('description_in_english',isset($section->localeAll[0]->description) ? $section->localeAll[0]->description : '' , array('class' => 'form-control')) !!}
			                    @error('description_in_english')
			                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			                    @enderror
			                </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('description_in_arabic', 'Description (In arabic)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('description_in_arabic', isset($section->localeAll[1]->description) ? $section->localeAll[1]->description : '', ['class' => 'form-control']) !!}
                                @error('description_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('description_in_french', 'Description (In french)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('description_in_french', isset($section->localeAll[2]->description) ? $section->localeAll[2]->description : '', ['class' => 'form-control']) !!}
                                @error('description_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group">
                        {!! Form::label('', 'Status') !!}<br/><br/>
                        {!! Form::checkbox('status',1, isset( $section->status) ? $section->status: '') !!}
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
