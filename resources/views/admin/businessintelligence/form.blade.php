<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
               <div class="form-group"> 
                    {!! Form::label('title_in_english', 'Title(In english)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_in_english',isset($business_data->title_in_english) ? $business_data->title_in_english : '' , array('class' => 'form-control')) !!}
                    @error('title_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
               <div class="form-group"> 
                    {!! Form::label('title_in_arabic', 'Title(In arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_in_arabic',isset($business_data->title_in_arabic) ? $business_data->title_in_arabic : '' , array('class' => 'form-control')) !!}
                    @error('title_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
               <div class="form-group"> 
                    {!! Form::label('title_in_french', 'Title(In french)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_in_french',isset($business_data->title_in_french) ? $business_data->title_in_french : '' , array('class' => 'form-control')) !!}
                    @error('title_in_french')
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
                    {!! Form::textarea('description_in_english',isset($business_data->description_in_english) ? $business_data->description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'editor-1']) !!}
                    @error('description_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('description_in_arabic', 'Description (In Arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('description_in_arabic',isset($business_data->description_in_arabic) ? $business_data->description_in_arabic: '' , ['class' => 'form-control summernote', 'id' => 'editor-2']) !!}
                    @error('description_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('description_in_french', 'Description (In French)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('description_in_french',isset($business_data->description_in_french) ? $business_data->description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'editor-3']) !!}
                    @error('description_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
        </div> 
        <hr>
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('display_order',isset($business_data->display_order) ? $business_data->display_order: $display_order , array('class' => 'form-control')) !!} 
                    @error('display_order.*')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                     @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}<br/><br/>
                    {!! Form::checkbox('status',1,isset($business_data->status) ? $business_data->status : '1') !!}
                    {!! Form::label('status', 'Active/Inactive') !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('services', 'Display on Service') !!}<br/><br/>
                    {!! Form::checkbox('services',1, isset($business_data->services) ? $business_data->services : '') !!}
                    {!! Form::label('services', 'Service') !!}
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-business-intelligences.index') }}">Cancel</a>
    </div>
</form>