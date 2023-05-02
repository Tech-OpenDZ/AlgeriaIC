
<form class="form">
    <div class="card-body">
        <div class="form-group">
        {!! Form::label('logo', 'Partner Logo',['class' => 'required-class']) !!}
        {!! Form::label('', '*',['style' => 'color:red']) !!}
        {!! Form::label('', '(Please select a logo having maximum width and height of 500 pixels)')!!}
        <br/><br/>
        @if(isset($partner->id))
        {!! Form::image($partner->logo ? 'storage/uploads/partner_logo/'.$partner->logo : 'storage/uploads/partner_logo/default-logo.png','logo', array('width' => 150, 'height' => 150,'id' => 'logo_img', 'style' => 'Cursor:text !important', 'onclick' =>"return false;", 'alt' =>'Logo Image'))  !!} <br>
        @endif
        {!! Form::file('logo',['id' => 'logo','data-parsley-required' => 'true']) !!}
        @error('logo')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
        @enderror
        </div>
        <hr>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('name_in_english', 'Name (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('name_in_english',isset($partner->name_in_english)?$partner->name_in_english:'', ['class' => 'form-control ']) !!}
                    @error('name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('name_in_arebic', 'Name (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('name_in_arebic',isset($partner->name_in_arebic)?$partner->name_in_arebic:'', ['class' => 'form-control ']) !!}
                    @error('name_in_arebic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('name_in_french', 'Name (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('name_in_french',isset($partner->name_in_french)?$partner->name_in_french:'', ['class' => 'form-control ']) !!}
                    @error('name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status') !!}<br/><br/>
            {!! Form::checkbox('status',1,isset($partner->status)?$partner->status:1) !!}
            {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
        </div>

        </div>
        <div class="card-footer">
            <button type="Submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-secondary" href="{{ route('manage-partner.index') }}">Cancel</a>
        </div>
    </div>
</form>


