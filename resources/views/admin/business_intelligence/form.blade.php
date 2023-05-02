<!--begin::Form-->
<form>
    <div class="card-body">
        {!! Form::label('image', 'Dashboard Image',['class' => 'required-class']) !!}<br><br>
        @if(isset($business_data))
            {!! Form::image($business_data->image ? 'storage/uploads/business_intelligence/images/'.$business_data->image : '','image', array('width' => 150, 'height' => 150,'id' => 'image', 'style' => 'Cursor:text !important', 'onclick' =>"return false;", 'alt' =>'Image'))  !!} <br>
        @endif
        <div class="form-group">
            @if(isset($business_data))
            <input type="hidden" name="customer_id" value="{{ $business_data->customer_id }}">
            @else
            <input type="hidden" name="customer_id" value="{{ request()->segment(3) }}">
            @endif
            
            {!! Form::file('image',['id' => 'image_file', 'class' => 'form-control']) !!}
            @error('image')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
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
                    {!! Form::text('display_order', isset($business_data->display_order) ? $business_data->display_order: $display_order,array('class' => 'form-control')) !!} 
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
                    {!! Form::checkbox('status',1,isset( $business_data->status) ? $business_data->status: 1) !!}
                    {!! Form::label('status', 'Active/Inactive') !!} 
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{route('dashboard-list',['id'=> request()->segment(3)])}}">Cancel</a>
    </div>
</form>
<!--end form-->
@section('sctipts')
    <script>
        // Code for text editor
        $('.summernote').summernote({
            height: 100
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

