<form class="form">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="hidden" name="englishTitle" value="{{isset($sector->sector_name_in_english) ? $sector->sector_name_in_english : ''}}">
                        {!! Form::label('sector_name_in_english', 'Sector Name (In english)',['class' => 'required-class']) !!}
                        {!! Form::label('', '*',['style' => 'color:red']) !!}
                        {!! Form::text('sector_name_in_english',isset($sector->sector_name_in_english) ? $sector->sector_name_in_english : '' , array('class' => 'form-control')) !!}
                        @error('sector_name_in_english')
                            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('sector_name_in_arabic', 'Sector Name (In arabic)',['class' => 'required-class']) !!}
                        {!! Form::label('', '*',['style' => 'color:red']) !!}
                        {!! Form::text('sector_name_in_arabic',isset($sector->sector_name_in_arabic) ? $sector->sector_name_in_arabic: '' , array('class' => 'form-control')) !!}
                        @error('sector_name_in_arabic')
                            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('sector_name_in_french', 'Sector Name (In French)',['class' => 'required-class']) !!}
                        {!! Form::label('', '*',['style' => 'color:red']) !!}
                        {!! Form::text('sector_name_in_french',isset($sector->sector_name_in_french) ? $sector->sector_name_in_french: '' , array('class' => 'form-control')) !!}
                        @error('sector_name_in_french')
                            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
                {!! Form::label('', '*',['style' => 'color:red']) !!}
                {!! Form::number('display_order',isset($sector->display_order) ? $sector->display_order: $defaultDisplayOrder , ['class' => 'form-control']) !!}
                @error('display_order')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('', 'Status') !!}<br/><br/>
                {!! Form::checkbox('status',1, isset($sector->status) ? $sector->status : 1) !!}
                {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                @error('status')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-sector.index') }}">Cancel</a>
    </div>
</form>
