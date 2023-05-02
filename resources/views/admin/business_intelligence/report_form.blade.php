<!--begin::Form-->
<form>
    <div class="card-body">
        {!! Form::label('file', 'Upload file',['class' => 'required-class']) !!}<br><br>
        <div class="form-group">
            <input type="hidden" name="customer_id" value="{{ request()->segment(3) }}">
            <input type="hidden" name="report_id" value="{{ request()->segment(4) }}">
            {!! Form::file('file',['id' => 'file', 'class' => 'form-control']) !!}
            @error('file')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div> 
        <hr>
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('title_in_english', 'Title (In English)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('title_in_english',isset($report_data->title_in_english) ? $report_data->title_in_english: '' , ['class' => 'form-control summernote', 'id' => 'editor-1']) !!}
                    @error('title_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('title_in_arabic', 'Title (In Arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('title_in_arabic',isset($report_data->title_in_arabic) ? $report_data->title_in_arabic: '' , ['class' => 'form-control summernote', 'id' => 'editor-2']) !!}
                    @error('title_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('title_in_french', 'Title (In French)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('title_in_french',isset($report_data->title_in_french) ? $report_data->title_in_french: '' , ['class' => 'form-control summernote', 'id' => 'editor-3']) !!}
                    @error('title_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
        </div> 
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('period_in_english', 'Period (In English)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('period_in_english',isset($report_data->period_in_english) ? $report_data->period_in_english: '' , ['class' => 'form-control summernote', 'id' => 'editor-1']) !!}
                    @error('period_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('period_in_arabic', 'Period (In Arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('period_in_arabic',isset($report_data->period_in_arabic) ? $report_data->period_in_arabic: '' , ['class' => 'form-control summernote', 'id' => 'editor-2']) !!}
                    @error('period_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('period_in_french', 'Period (In French)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('period_in_french',isset($report_data->period_in_french) ? $report_data->period_in_french: '' , ['class' => 'form-control summernote', 'id' => 'editor-3']) !!}
                    @error('period_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
        </div> 
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('description_in_english', 'Description (In English)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('description_in_english',isset($report_data->description_in_english) ? $report_data->description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'editor-1']) !!}
                    @error('description_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('description_in_arabic', 'Description (In Arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('description_in_arabic',isset($report_data->description_in_arabic) ? $report_data->description_in_arabic: '' , ['class' => 'form-control summernote', 'id' => 'editor-2']) !!}
                    @error('description_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
            <div class="col-lg-12">
                <div class="form-group"> 
                    {!! Form::label('description_in_french', 'Description (In French)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('description_in_french',isset($report_data->description_in_french) ? $report_data->description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'editor-3']) !!}
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
                    {!! Form::text('display_order', isset($report_data->display_order) ? $report_data->display_order: $display_order,array('class' => 'form-control')) !!} 
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
                    {!! Form::checkbox('status',1,isset( $report_data->status) ? $report_data->status: 1) !!}
                    {!! Form::label('status', 'Active/Inactive') !!} 
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{route('manage-sub-dashboard.index',['id'=> request()->segment(3),'report_id' => request()->segment(4)])}}">Cancel</a>
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

