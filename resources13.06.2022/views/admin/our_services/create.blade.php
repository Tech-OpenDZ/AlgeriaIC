@extends('admin.layouts.master')
@section('head')
<style>
    /*input[type="file"] {
    display: block;
    }*/
    /*.imageThumb {
    min-height: 100px;
    max-height: 100px;
    max-width: 100px;
    padding: 5px;
    cursor: pointer;
    }*/
   /* .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
    border:none;
    }*/
  /*  .remove {
    display: block;
    background: white;
    color: black;
    text-align: center;
    cursor: pointer;
    }*/
    .heading{
        width:850;
        background-color: #E5EAEE;
        height: 50px;
        padding-left:15px;
    }

</style>
@endsection
@section('content')
@include('alert_messages')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Our Services</h3>
        </div>
    </div>
    <div class="card-body">
	    {!! Form::open(array('method'=>'POST','route' => 'manage-our-services.store','files'=>true)) !!}
	    <input type="hidden" name="services_id" value="@if(isset($services_data->id)){{ $services_data->id }}@endif">
	    <div class="card-body">
	       <div class="form-group row">
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('services_title_in_english', 'Our Services Title (In english)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('services_title_in_english',isset($services_data->services_title_in_english) ? $services_data->services_title_in_english : '' , array('class' => 'form-control')) !!}
	                    @error('services_title_in_english')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('services_title_in_arabic', 'Our Services Title (In arabic)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('services_title_in_arabic',isset($services_data->services_title_in_arabic) ? $services_data->services_title_in_arabic : '' , array('class' => 'form-control')) !!}
	                    @error('services_title_in_arabic')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('services_title_in_french', 'Our Services Title (In french)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('services_title_in_french',isset($services_data->services_title_in_french) ? $services_data->services_title_in_french: '' , array('class' => 'form-control')) !!}
	                    @error('services_title_in_french')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	       </div>
	       <div class="form-group">
	            {!! Form::label('services_description_in_english', 'Description (In english)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('description_in_english',isset($services_data->description_in_english) ? $services_data->description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'editor-1']) !!}
	            @error('description_in_english')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="form-group">
	            {!! Form::label('services_description_in_arabic', 'Description (In arabic)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('description_in_arabic',isset($services_data->description_in_arabic) ? $services_data->description_in_arabic: '' , ['class' => 'form-control summernote', 'id' => 'editor-2']) !!}
	            @error('description_in_arabic')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="form-group">
	            {!! Form::label('services_description_in_french', 'Description (In french)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('description_in_french',isset($services_data->description_in_french) ? $services_data->description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'editor-3']) !!}
	            @error('description_in_french')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="heading">
	            <h5 class="card-label pull-left"  style="width: 100%;padding-top: 15px;">i2B Presentation</h5>
	        </div>
	        <br/> <br/>
	       <div class="form-group row">
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('i2b_title_in_english', 'Title (In english)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('i2b_title_in_english',isset($services_data->i2b_title_in_english) ? $services_data->i2b_title_in_english : '' , array('class' => 'form-control')) !!}
	                    @error('i2b_title_in_english')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('i2b_title_in_arabic', 'Title (In arabic)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('i2b_title_in_arabic',isset($services_data->i2b_title_in_arabic) ? $services_data->i2b_title_in_arabic : '' , array('class' => 'form-control')) !!}
	                    @error('i2b_title_in_arabic')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('i2b_title_french', 'Title (In french)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('i2b_title_in_french',isset($services_data->i2b_title_in_french) ? $services_data->i2b_title_in_french: '' , array('class' => 'form-control')) !!}
	                    @error('i2b_title_in_french')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	       </div>
	       <div class="form-group">
	            {!! Form::label('i2b_description_in_english', 'Description (In english)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('i2b_description_in_english',isset($services_data->i2b_description_in_english) ? $services_data->i2b_description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'editor-4']) !!}
	            @error('i2b_description_in_english')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="form-group">
	            {!! Form::label('i2b_description_in_arabic', 'Description (In arabic)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('i2b_description_in_arabic',isset($services_data->i2b_description_in_arabic) ? $services_data->i2b_description_in_arabic: '' , ['class' => 'form-control summernote', 'id' => 'editor-5']) !!}
	            @error('i2b_description_in_arabic')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="form-group">
	            {!! Form::label('i2b_description_in_french', 'Description (In french)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('i2b_description_in_french',isset($services_data->i2b_description_in_french) ? $services_data->i2b_description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'editor-6']) !!}
	            @error('i2b_description_in_french')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="heading">
	            <h5 class="card-label pull-left"  style="width: 100%;padding-top: 15px;">Suscription Plans</h5>
	        </div>
	        <br/> <br/>
	       <div class="form-group row">
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('subscription_title_in_english', 'Title (In english)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('subscription_title_in_english',isset($services_data->subscription_title_in_english) ? $services_data->subscription_title_in_english : '' , array('class' => 'form-control')) !!}
	                    @error('subscription_title_in_english')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('subscription_title_in_arabic', 'Title (In arabic)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('subscription_title_in_arabic',isset($services_data->subscription_title_in_arabic) ? $services_data->subscription_title_in_arabic : '' , array('class' => 'form-control')) !!}
	                    @error('subscription_title_in_arabic')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('subscription_title_french', 'Title (In french)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('subscription_title_in_french',isset($services_data->subscription_title_in_french) ? $services_data->subscription_title_in_french: '' , array('class' => 'form-control')) !!}
	                    @error('subscription_title_in_french')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	       </div>
	       <div class="form-group">
	            {!! Form::label('subscription_description_in_english', 'Description (In english)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('subscription_description_in_english',isset($services_data->subscription_description_in_english) ? $services_data->subscription_description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'editor-7']) !!}
	            @error('subscription_description_in_english')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="form-group">
	            {!! Form::label('subscription_description_in_arabic', 'Description (In arabic)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('subscription_description_in_arabic',isset($services_data->subscription_description_in_arabic) ? $services_data->subscription_description_in_arabic: '' , ['class' => 'form-control summernote', 'id' => 'editor-8']) !!}
	            @error('subscription_description_in_arabic')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="form-group">
	            {!! Form::label('subscription_description_in_french', 'Description (In french)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('subscription_description_in_french',isset($services_data->subscription_description_in_french) ? $services_data->subscription_description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'editor-9']) !!}
	            @error('subscription_description_in_french')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="heading">
	            <h5 class="card-label pull-left"  style="width: 100%;padding-top: 15px;">Online Services</h5>
	        </div>
	        <br/> <br/>
	       <div class="form-group row">
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('online_title_in_english', 'Title (In english)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('online_title_in_english',isset($services_data->online_title_in_english) ? $services_data->online_title_in_english : '' , array('class' => 'form-control')) !!}
	                    @error('online_title_in_english')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('online_title_in_arabic', 'Title (In arabic)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('online_title_in_arabic',isset($services_data->online_title_in_arabic) ? $services_data->online_title_in_arabic : '' , array('class' => 'form-control')) !!}
	                    @error('online_title_in_arabic')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('online_title_french', 'Title (In french)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('online_title_in_french',isset($services_data->online_title_in_french) ? $services_data->online_title_in_french: '' , array('class' => 'form-control')) !!}
	                    @error('online_title_in_french')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	       </div>
	       <div class="form-group">
	            {!! Form::label('online_description_in_english', 'Description (In english)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('online_description_in_english',isset($services_data->online_description_in_english) ? $services_data->online_description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'editor-10']) !!}
	            @error('online_description_in_english')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="form-group">
	            {!! Form::label('online_description_in_arabic', 'Description (In arabic)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('online_description_in_arabic',isset($services_data->online_description_in_arabic) ? $services_data->online_description_in_arabic: '' , ['class' => 'form-control summernote', 'id' => 'editor-11']) !!}
	            @error('online_description_in_arabic')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="form-group">
	            {!! Form::label('online_description_in_french', 'Description (In french)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('online_description_in_french',isset($services_data->online_description_in_french) ? $services_data->online_description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'editor-12']) !!}
	            @error('online_description_in_french')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="heading">
	            <h5 class="card-label pull-left"  style="width: 100%;padding-top: 15px;">Advertisement</h5>
	        </div>
	        <br/> <br/>
	        <div class="form-group row">
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('advertisement_title_in_english', 'Title (In english)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('advertisement_title_in_english',isset($services_data->advertisement_title_in_english) ? $services_data->advertisement_title_in_english : '' , array('class' => 'form-control')) !!}
	                    @error('advertisement_title_in_english')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('advertisement_title_in_arabic', 'Title (In arabic)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('advertisement_title_in_arabic',isset($services_data->advertisement_title_in_arabic) ? $services_data->advertisement_title_in_arabic : '' , array('class' => 'form-control')) !!}
	                    @error('advertisement_title_in_arabic')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    {!! Form::label('advertisement_title_french', 'Title (In french)',['class' => 'required-class']) !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                    {!! Form::text('advertisement_title_in_french',isset($services_data->advertisement_title_in_french) ? $services_data->advertisement_title_in_french: '' , array('class' => 'form-control')) !!}
	                    @error('advertisement_title_in_french')
	                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	                    @enderror
	                </div>
	            </div>
	       	</div>
	       <div class="form-group">
	            {!! Form::label('advertisement_description_in_english', 'Description (In english)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('advertisement_description_in_english',isset($services_data->advertisement_description_in_english) ? $services_data->advertisement_description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'editor-13']) !!}
	            @error('advertisement_description_in_english')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="form-group">
	            {!! Form::label('advertisement_description_in_arabic', 'Description (In arabic)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('advertisement_description_in_arabic',isset($services_data->advertisement_description_in_arabic) ? $services_data->advertisement_description_in_arabic: '' , ['class' => 'form-control summernote', 'id' => 'editor-14']) !!}
	            @error('advertisement_description_in_arabic')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="form-group">
	            {!! Form::label('advertisement_description_in_french', 'Description (In french)',['class' => 'required-class']) !!}
	            {!! Form::label('', '*',['style' => 'color:red']) !!}
	            {!! Form::textarea('advertisement_description_in_french',isset($services_data->advertisement_description_in_french) ? $services_data->advertisement_description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'editor-15']) !!}
	            @error('advertisement_description_in_french')
	                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
	            @enderror
	       </div>
	       <div class="form-group row">
	            <div class="col-lg-4">
	                <div class="form-group">
	                	{!! Form::label('files_in_english', 'File (In english)') !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                   {!! Form::file('files_in_english',['class' =>'form-control','id'=>'logo']) !!}
			            @error('files_in_english')
			                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			            @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                	{!! Form::label('files_in_arabic', 'File (In arabic)') !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                   {!! Form::file('files_in_arabic',['class' =>'form-control','id'=>'logo']) !!}
			            @error('files_in_arabic')
			                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			            @enderror
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                	{!! Form::label('files_in_french', 'File (In french)') !!}
	                    {!! Form::label('', '*',['style' => 'color:red']) !!}
	                   {!! Form::file('files_in_french',['class' =>'form-control','id'=>'logo']) !!}
			            @error('files_in_french')
			                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			            @enderror
	                </div>
	            </div>
	       </div>
	    </div>
	    <div class="card-footer">
	        <button type="submit" class="btn btn-primary mr-2">Submit</button>
	        <!-- <a class="btn btn-secondary" href="{{ route('manage-event.index') }}">Cancel</a> -->
	    </div>
	    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
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