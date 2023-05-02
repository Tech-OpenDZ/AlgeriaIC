<form class="form">
    <div class="card-body"> 
        <div class="form-group">
            {!! Form::label('top_image', 'Top image',['class' => 'required-class']) !!}
            {!! Form::label('top_image', '*',['style' => 'color:red']) !!} 
            <br/><br/>
            @if(isset($algeriaBusinessNetwork->id)) 
            {!! Form::image('storage/uploads/algeria_network_images/'.$algeriaBusinessNetwork->image_top,'', array('width' => 150, 'height' => 150,'id' => 'top_img', 'style' => 'Cursor:text !important', 'onclick' =>"return false;", 'alt' =>'Logo Image'))  !!} <br>
            @endif
            {!! Form::file('top_image',['id' => 'top_image','data-parsley-required' => 'true']) !!}
            @error('top_image')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div> 
        <hr>
        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('bottom_first_image', 'Bottom First image',['class' => 'required-class']) !!}
                    {!! Form::label('bottom_first_image', '*',['style' => 'color:red']) !!} 
                    <br/><br/>
                    @if(isset($algeriaBusinessNetwork->id)) 
                    {!! Form::image('storage/uploads/algeria_network_images/'.$algeriaBusinessNetwork->image_bottom_one,'', array('width' => 150, 'height' => 150,'id' => 'bottom_first_img', 'style' => 'Cursor:text !important', 'onclick' =>"return false;", 'alt' =>'Logo Image'))  !!} <br>
                    @endif
                    {!! Form::file('bottom_first_image',['id' => 'bottom_first_image','data-parsley-required' => 'true']) !!}
                    @error('bottom_first_image')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('bottom_second_image', 'Bottom Second image',['class' => 'required-class']) !!}
                    {!! Form::label('bottom_second_image', '*',['style' => 'color:red']) !!} 
                    <br/><br/>
                    @if(isset($algeriaBusinessNetwork->id)) 
                    {!! Form::image('storage/uploads/algeria_network_images/'.$algeriaBusinessNetwork->image_bottom_two,'', array('width' => 150, 'height' => 150,'id' => 'bottom_second_img', 'style' => 'Cursor:text !important', 'onclick' =>"return false;", 'alt' =>'Logo Image'))  !!} <br>
                    @endif
                    {!! Form::file('bottom_second_image',['id' => 'bottom_second_image','data-parsley-required' => 'true']) !!}
                    @error('bottom_second_image')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
        </div>
        <hr> 
        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('bottom_third_image', 'Bottom Third image',['class' => 'required-class']) !!}
                    {!! Form::label('bottom_third_image', '*',['style' => 'color:red']) !!} 
                    <br/><br/>
                    @if(isset($algeriaBusinessNetwork->id)) 
                    {!! Form::image('storage/uploads/algeria_network_images/'.$algeriaBusinessNetwork->image_bottom_three,'', array('width' => 150, 'height' => 150,'id' => 'bottom_third_img', 'style' => 'Cursor:text !important', 'onclick' =>"return false;", 'alt' =>'Logo Image'))  !!} <br>
                    @endif
                    {!! Form::file('bottom_third_image',['id' => 'bottom_third_image','data-parsley-required' => 'true']) !!}
                    @error('bottom_third_image')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('bottom_fourth_image', 'Bottom Fourth image',['class' => 'required-class']) !!}
                    {!! Form::label('bottom_fourth_image', '*',['style' => 'color:red']) !!} 
                    <br/><br/>
                    @if(isset($algeriaBusinessNetwork->id)) 
                    {!! Form::image('storage/uploads/algeria_network_images/'.$algeriaBusinessNetwork->image_bottom_four,'bottom_fourth_image', array('width' => 150, 'height' => 150,'id' => 'bottom_fourth_img', 'style' => 'Cursor:text !important', 'onclick' =>"return false;", 'alt' =>'Logo Image'))  !!} <br>
                    @endif
                    {!! Form::file('bottom_fourth_image',['id' => 'bottom_fourth_image','data-parsley-required' => 'true']) !!}
                    @error('bottom_fourth_image')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
        </div> 
        <hr>
        <div class="form-group">
            {!! Form::label('description_in_english', 'Description (In english)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_english',isset($algeriaBusinessNetwork->description_in_english) ? $algeriaBusinessNetwork->description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-1']) !!}
            @error('description_in_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div> 
        <div class="form-group">
            {!! Form::label('description_in_arabic', 'Description (In arabic)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_arabic', isset($algeriaBusinessNetwork->description_in_arabic) ? $algeriaBusinessNetwork->description_in_arabic: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-2']) !!}
            @error('description_in_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description_in_french', 'Description (In french)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_french', isset($algeriaBusinessNetwork->description_in_french) ? $algeriaBusinessNetwork->description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-3']) !!}
            @error('description_in_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        
    </div>
    <div class="card-footer">
        <button type="Submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-algeria-business-network.index') }}">Cancel</a>
    </div>
</form>


