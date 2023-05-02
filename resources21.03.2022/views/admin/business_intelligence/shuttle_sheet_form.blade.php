<!--begin::Form-->
<form>
    <div class="card-body">
        {!! Form::label('image', 'Upload Style sheet',['class' => 'required-class']) !!}<br><br>
        <div class="form-group">
            <input type="hidden" name="customer_id" value="{{ request()->segment(3) }}">
            {!! Form::file('file',['id' => 'file', 'class' => 'form-control']) !!}
            @error('file')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div> 
        <hr>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}<br/><br/>
                    {!! Form::checkbox('status',1,isset( $sheet_data->status) ? $sheet_data->status: 1) !!}
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

    

@endsection

