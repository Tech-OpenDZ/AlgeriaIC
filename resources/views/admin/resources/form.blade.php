


<form class="form" enctype="multipart/form-data">

    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('title_in_english', ' Title (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_in_english',isset($resource->title_in_english) ? $resource->title_in_english : '' , array('class' => 'form-control')) !!}
                    @error('title_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('title_in_arabic', 'Title (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_in_arabic',isset($resource->title_in_arabic) ? $resource->title_in_arabic: '' , array('class' => 'form-control')) !!}
                    @error('title_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('title_in_french', 'Title (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_in_french',isset($resource->title_in_french) ? $resource->title_in_french: '' , array('class' => 'form-control')) !!}
                    @error('title_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        @if(request()->get('level') == 2 || $level == "2")

        <div class="form-group">
            {!! Form::label('short_description_in_english', 'Short description (In english)',['class' => 'required-class']) !!}
            {!! Form::textarea('short_description_in_english',isset($resource->short_description_in_english) ? $resource->short_description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'summernote-1']) !!}
            @error('short_description_in_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('short_description_in_arabic', 'Short description (In arabic)',['class' => 'required-class']) !!}
            {!! Form::textarea('short_description_in_arabic', isset($resource->short_description_in_arabic) ? $resource->short_description_in_arabic: '', ['class' => 'form-control summernote', 'id' => 'summernote-2']) !!}
            @error('short_description_in_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('short_description_in_french', 'Short description (In french)',['class' => 'required-class']) !!}
            {!! Form::textarea('short_description_in_french', isset($resource->short_description_in_french) ? $resource->short_description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'summernote-3']) !!}
            @error('short_description_in_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        @endif
        <br> <br>
<hr>
<br> <br>
        @if(request()->get('level') == 2 || $level == "2")

        <div class="form-group">
            {!! Form::label('description_in_english', 'Long description (In english)',['class' => 'required-class']) !!}
            {!! Form::textarea('description_in_english',isset($resource->description_in_english) ? $resource->description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'summernote-1']) !!}
            @error('long_description_in_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description_in_arabic', 'Long description (In arabic)',['class' => 'required-class']) !!}
            {!! Form::textarea('description_in_arabic', isset($resource->description_in_arabic) ? $resource->description_in_arabic: '', ['class' => 'form-control summernote', 'id' => 'summernote-2']) !!}
            @error('long_description_in_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description_in_french', 'Long description (In french)',['class' => 'required-class']) !!}
            {!! Form::textarea('description_in_french', isset($resource->description_in_french) ? $resource->description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'summernote-3']) !!}
            @error('short_description_in_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        @endif
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('', 'Status') !!}<br/><br/>
                    {!! Form::checkbox('status',1, isset($resource->status) ? $resource->status : 1) !!}
                    {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                    @error('status')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('display_order', 'Display order',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('display_order',isset($resource->display_order) ? $resource->display_order : $display_order , array('class' => 'form-control')) !!}
                    @error('display_order')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                    @if(Session::has('error'))
                        <div class="bg-danger-o-50 py-2 px-4">Please enter the valid display order.</div>
                    @endif                    
                </div>
            </div>
        </div>

        @if(request()->get('level') == 2 || $level == "2")

        @if(isset($resource_translation->logo))
        {!! Form::label('', 'Selected Logo Image') !!}<br /><br />
        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="col-lg-3">
                        <a href="{{ asset('storage/uploads/bus_logos/'.$resource_translation->id.'/logo/'.$resource_tanslation->logo)}} " target="_blank"><img src="{{ asset('storage/uploads/bus_logos/'.$resource_translation->id.'/logo/'.$resource_tanslation->logo)}}" alt="business-logo" class="imageThumb"></a><br>

                    </div>
                </div>
            </div>
        </div>

      @endif
   
        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('', 'Logo') !!}<br /><br />
                    <button type="button" style="display:block;width:850px; height:40px;border:none" onclick="document.getElementById('logo').click()" id="browse_logo">Browse</button>
                    {!! Form::file('logo',['class' =>'form-control','logo','id'=>'logo','style'=>'display:none']) !!}
                    @error('logo')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
      
        @endif
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        @if(request()->get('level') == 1 || request()->get('level') == 2)
        <a class="btn btn-secondary" href="{{ route('business-environment-index',['id'=> request()->get('id'),'level'=>request()->get('level')]) }}">Cancel</a>
        @else
        <a class="btn btn-secondary" href="{{ route('manage-business-environment.index') }}">Cancel</a>
        @endif
       
    </div>

    
</form>
