<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('event_name_in_english', 'Event Name (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('event_name_in_english',isset($event->event_name_in_english) ? $event->event_name_in_english : '' , array('class' => 'form-control')) !!}
                    @error('event_name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('event_name_in_arabic', 'Event Name (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('event_name_in_arabic',isset($event->event_name_in_arabic) ? $event->event_name_in_arabic : '' , array('class' => 'form-control')) !!}
                    @error('event_name_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('event_name_in_french', 'Event Name (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('event_name_in_french',isset($event->event_name_in_french) ? $event->event_name_in_french: '' , array('class' => 'form-control')) !!} 
                    @error('event_name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group"> 
                    {!! Form::label('place_name_in_english', 'Place Name (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('place_name_in_english',isset($event->place_name_in_english) ? $event->place_name_in_english : '' , array('class' => 'form-control')) !!}
                    @error('place_name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('place_name_in_arabic', 'Place Name (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('place_name_in_arabic',isset($event->place_name_in_arabic) ? $event->place_name_in_arabic: '' , array('class' => 'form-control')) !!}
                    @error('place_name_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('place_name_in_french', 'Place Name (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('place_name_in_french',isset($event->place_name_in_french) ? $event->place_name_in_french: '' , array('class' => 'form-control')) !!} 
                    @error('place_name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <!-- <div class="form-group">
                    {!! Form::label('sectors[]', 'Sectors',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::select('sectors[]',$sector_arr,$selected_sectors,['class' =>'form-control selectpicker','multiple','data-live-search'=>'true','id'=>'sectors']) !!}
                    
                    @error('sectors')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> -->
                <div class="form-group">
                    {!! Form::label('sectors[]', 'Sectors',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <button  type="button" class="btn btn-primary  btn-sm mr-2 ml-2 mb-3" id="select_all_sectors">Select all</button>
                    <button  type="button" class="btn btn-primary btn-sm mb-3" id="remove_all_sectors">Remove all</button>
                    {!! Form::select('sectors[]',$sector_arr,$selected_sectors,['class' =>'form-control select2','multiple','id'=>'sectors']) !!}
                    @error('sectors')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('start_date', 'Meeting Date',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::date('start_date', isset($event->start_date) ? $event->start_date : '', array('class' => 'form-control')) !!}
                    @error('start_date')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('price_in_square_meter', 'Price (per square meter)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('price_in_square_meter', isset($event->price_per_square_meter) ? $event->price_per_square_meter : '', array('class' => 'form-control')) !!}
                    @error('price_in_square_meter')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div> 
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('is_featured', 'Is featured') !!}<br/><br/>
            {!! Form::checkbox('is_featured',1, isset($event->is_featured) ? $event->is_featured : '') !!}
            {!! Form::label('is_featured', 'Yes/No') !!}
            @error('status')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-business-meeting.index') }}">Cancel</a>
    </div>
</form>
