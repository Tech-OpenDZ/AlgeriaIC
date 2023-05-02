<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <input type=hidden name="content_id" value="{{request()->get('id')}}">
                <div class="form-group">
                    {!! Form::label('sub_title_name_in_english', 'Title Name (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('sub_title_name_in_english',isset($algeria_content->sub_title_in_english) ? $algeria_content->sub_title_in_english: '' , array('class' => 'form-control')) !!}
                    @error('sub_title_name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('sub_title_name_in_arabic', 'Title Name (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('sub_title_name_in_arabic',isset($algeria_content->sub_title_in_arabic) ? $algeria_content->sub_title_in_arabic: '' , array('class' => 'form-control')) !!}
                    @error('sub_title_name_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('sub_title_name_in_french', 'Title Name (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('sub_title_name_in_french',isset($algeria_content->sub_title_in_french) ? $algeria_content->sub_title_in_french: '' , array('class' => 'form-control')) !!}
                    @error('sub_title_name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('description_in_english', 'Description (In english)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_english',isset($algeria_content->description_in_english) ? $algeria_content->description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-1']) !!}
            @error('description_in_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description_in_arabic', 'Description (In arabic)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_arabic',isset($algeria_content->description_in_arabic) ? $algeria_content->description_in_arabic: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-2']) !!}
            @error('description_in_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description_in_french', 'Description (In french)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_french',isset($algeria_content->description_in_french) ? $algeria_content->description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-3']) !!}
            @error('description_in_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::number('display_order',isset($display_order) ? $display_order : $algeria_content->display_order , array('class' => 'form-control')) !!}
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
        {!! Form::label('', 'Uploaded Documents') !!}<br/><br/>
        @if(isset($algeria_content->id))
        <ul>
            @foreach($algeria_content->document as $document)
                @php
                    $document_name = json_decode($document->document_name);
                @endphp
                <li>
                    <div class='form-group row'>
                        <div class='col-lg-12'>
                            {{ preg_replace('/[^a-zA-Z0-9. ]/', '', str_replace('_', ' ',   $document_name->en)) }}
                        </div>

                    </div>
                </li>
                <li>
                    <div class='form-group row'>
                        <div class='col-lg-12'>
                            {{ preg_replace('/[^a-zA-Z0-9. ]/', '', str_replace('_', ' ',   $document_name->fr)) }}
                        </div>

                    </div>
                </li>
            @endforeach
        </ul>
        @endif

        {!! Form::label('', 'Upload Documents') !!}<br/><br/>
        <div class="form-group">
            {!! Form::label('', 'Document In English') !!}<br/><br/>
            {!! Form::file('document_in_english',['class' =>'form-control','id'=>'document_in_english']) !!}
            @error('document_in_english')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('', 'Document In French') !!}<br/><br/>
            {!! Form::file('document_in_french',['class' =>'form-control','id'=>'document_in_french']) !!}
            @error('document_in_french')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-algeria-subcontent.index',['id'=>request()->get('id')]) }}">Cancel</a>
    </div>
</form>
