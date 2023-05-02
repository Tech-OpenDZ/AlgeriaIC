<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::hidden('englishTitle',isset($algeria_content->title_name_in_english) ? $algeria_content->title_name_in_english : '' ) !!}

                    {!! Form::label('title_name_in_english', 'Title Name (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_name_in_english',isset($algeria_content->title_name_in_english) ? $algeria_content->title_name_in_english : '' , array('class' => 'form-control')) !!}
                    @error('title_name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('title_name_in_arabic', 'Title Name (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_name_in_arabic',isset($algeria_content->title_name_in_arabic) ? $algeria_content->title_name_in_arabic: '' , array('class' => 'form-control')) !!}
                    @error('title_name_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('title_name_in_french', 'Title Name (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_name_in_french',isset($algeria_content->title_name_in_french) ? $algeria_content->title_name_in_french: '' , array('class' => 'form-control')) !!}
                    @error('title_name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::number('display_order',isset($display_order)?$display_order:$algeria_content->display_order , array('class' => 'form-control')) !!}
            @error('display_order')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
            @if(Session::has('error'))
                <div class="bg-danger-o-50 py-2 px-4">Please enter the valid display order.</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('', 'Status') !!}<br/><br/>
            {!! Form::checkbox('status',1, isset($algeria_content->status) ? $algeria_content->status : 1) !!}
            {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
            @error('status')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-discover-algeria-content.index') }}">Cancel</a>
    </div>
</form>
