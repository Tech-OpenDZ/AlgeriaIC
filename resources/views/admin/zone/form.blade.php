<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('zone_name_in_english', 'Zone Name (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('zone_name_in_english',isset($zone->zone_name_in_english) ? $zone->zone_name_in_english : '' , array('class' => 'form-control')) !!}
                    @error('zone_name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('zone_name_in_arabic', 'Zone Name (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('zone_name_in_arabic',isset($zone->zone_name_in_arabic) ? $zone->zone_name_in_arabic: '' , array('class' => 'form-control')) !!}
                    @error('zone_name_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('zone_name_in_french', 'Zone Name (In French)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('zone_name_in_french',isset($zone->zone_name_in_french) ? $zone->zone_name_in_french: '' , array('class' => 'form-control')) !!}
                    @error('zone_name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::number('display_order',isset($zone->display_order) ? $zone->display_order: $defaultDisplayOrder , ['class' => 'form-control']) !!}
            @error('display_order')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('', 'Status') !!}<br/><br/>
            {!! Form::checkbox('status',1, isset($zone->status) ? $zone->status : 1) !!}
            {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
            @error('status')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-zone.index') }}">Cancel</a>
    </div>
</form>
