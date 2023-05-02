<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                <input type="hidden" name="englishTitle" value="{{isset($resource->title_in_english) ? $resource->title_in_english: ''}}">
                @if(isset($resource->id))
                <input type="hidden" name="parent_id" value="{{isset($resource->parent_id) ? $resource->parent_id :''  }}">
                @else
                <input type="hidden" name="parent_id" value="@if(request()->get('id') != null ) {{request()->get('id')}} @else  0 @endif">
                @endif
                <input type="hidden" name="level" value="@if(request()->get('level') != null ) {{request()->get('level')}} @else  null @endif">

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
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        @if(request()->get('level') == 1 || request()->get('level') == 2)
        <a class="btn btn-secondary" href="{{ route('business-environment-index',['id'=> request()->get('id'),'level'=>request()->get('level')]) }}">Cancel</a>
        @else
        <a class="btn btn-secondary" href="{{ route('manage-business-environment.index') }}">Cancel</a>
        @endif
    </div>
</form>
