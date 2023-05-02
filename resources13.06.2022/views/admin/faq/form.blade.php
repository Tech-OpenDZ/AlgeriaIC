<form class="form">
    <div class="card-body">

@if(isset($faq))

    <div class="form-group row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>Question (In English)</label>
                {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
                {!! Form::text('question_in_english', $faq->localeAll[0]->question, array('class' => 'form-control')) !!}
                @error('question_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>Question (In Arabic)</label>
                {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
                {!! Form::text('question_in_arabic', $faq->localeAll[1]->question, array('class' => 'form-control')) !!}
                @error('question_in_arabic')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>Question (In French)</label>
                {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
                {!! Form::text('question_in_french', $faq->localeAll[2]->question, array('class' => 'form-control')) !!}
                @error('question_in_french')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Answer (In English)</label>
        {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
        {!! Form::textarea('answer_in_english', $faq->localeAll[0]->answer, array('class' => 'form-control')) !!}
        @error('answer_in_english')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Answer (In Arabic)</label>
        {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
        {!! Form::textarea('answer_in_arabic', $faq->localeAll[1]->answer, array('class' => 'form-control')) !!}
        @error('answer_in_arabic')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Answer (In French)</label>
        {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
        {!! Form::textarea('answer_in_french', $faq->localeAll[2]->answer, array('class' => 'form-control')) !!}
        @error('answer_in_french')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Display order:</label>
        <!-- <input type="email" class="form-control" placeholder="Enter number of users"/> -->
        {!! Form::text('display_order', $faq->display_order, ['class' => 'form-control']) !!}
        @error('display_order')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Status</label>
        <div class="checkbox-inline">
            <label class="checkbox checkbox-outline">
                <input type="checkbox" name="status" @if($faq->status == 1)checked="1" @endif />
                Active/Inactive
                <span></span>
            </label>

        </div>
    </div>

@else

    <div class="form-group row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>Question (In English)</label>
                {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
                {!! Form::text('question_in_english', null, array('class' => 'form-control')) !!}
                @error('question_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>Question (In Arabic)</label>
                {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
                {!! Form::text('question_in_arabic', null, array('class' => 'form-control')) !!}
                @error('question_in_arabic')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>Question (In French)</label>
                {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
                {!! Form::text('question_in_french', null, array('class' => 'form-control')) !!}
                    @error('question_in_french')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Answer (In English)</label>
        {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
        {!! Form::textarea('answer_in_english', null, array('class' => 'form-control')) !!}
        @error('answer_in_english')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Answer (In Arabic)</label>
        {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
        {!! Form::textarea('answer_in_arabic', null, array('class' => 'form-control')) !!}
        @error('answer_in_arabic')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Answer (In French)</label>
        {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
        {!! Form::textarea('answer_in_french', null, array('class' => 'form-control')) !!}
        @error('answer_in_french')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Display order:</label>
        <!-- <input type="email" class="form-control" placeholder="Enter number of users"/> -->
        {!! Form::text('display_order', $defaultDisplayOrder , ['class' => 'form-control']) !!}
        @error('display_order')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Status</label>
        <div class="checkbox-inline">
            <label class="checkbox checkbox-outline">
                <input type="checkbox" name="status" checked="checked"/>Active/Inactive
                <span></span>
            </label>
        </div>
    </div>

@endif


    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-faq.index') }}">Cancel</a>
    </div>
</form>
