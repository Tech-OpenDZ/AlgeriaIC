<form class="form">
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('logo', 'Logo',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::label('', '(Please select a logo having maximum width and height of 500 pixels)')!!}
            <br/>
            <br/>
            {!! Form::file('logo',['id' => 'logo']) !!}
            @error('logo')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <hr>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('title_in_english', 'Title (in English)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_in_english',isset($news_source->localeAll[0]->title) ? $news_source->localeAll[0]->title: '' , array('class' => 'form-control')) !!}
                    @error('title_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('title_in_arabic', 'Title (in Arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_in_arabic',isset($news_source->localeAll[2]->title) ? $news_source->localeAll[2]->title: '' , array('class' => 'form-control')) !!}
                    @error('title_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('title_in_french', 'Title (in French)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('title_in_french',isset($news_source->localeAll[1]->title) ? $news_source->localeAll[1]->title: '' , array('class' => 'form-control')) !!}
                    @error('title_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('', 'Status') !!}<br/><br/>
            {!! Form::checkbox('status',1, isset($news_source->status) ? $news_source->status : 1) !!}
            {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
            @error('status')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-news_source.index') }}">Cancel</a>
    </div>
</form>
