<form class="form" id="event-form">
    <div class="card-body">
        {!! Form::label('event_logo', 'Event Logo') !!}
        {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
        @if(isset($event->id))
            <div class="form-group">
                {!! Form::image('storage/uploads/event_logos/'.$event->event_logo,'event_logo', array('width' => 100, 'height' => 100, 'id'=>'logo_img'))!!}
            </div>
        @endif
        @if(isset($event->id))
        <div class="form-group">
            {!! Form::file('event_logo',['class' =>'form-control','id'=>'logo-1']) !!}
            @error('event_logo')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        @else 
        <div class="form-group">
            {!! Form::file('event_logo',['class' =>'form-control','id'=>'logo','required','data-parsley-required-message'=>'The event logo field is required.']) !!}
            @error('event_logo')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        @endif
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="hidden" name="englishTitle" value="{{isset($event->event_name_in_english) ? $event->event_name_in_english: ''}}">
                    {!! Form::label('event_name_in_english', 'Event Name (In english)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('event_name_in_english',isset($event->event_name_in_english) ? $event->event_name_in_english : '' , array('class' => 'form-control','required','data-parsley-required-message'=>'Event name in english is required.')) !!}
                    @error('event_name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('event_name_in_arabic', 'Event Name (In arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('event_name_in_arabic',isset($event->event_name_in_arabic) ? $event->event_name_in_arabic : '' , array('class' => 'form-control','required','data-parsley-required-message'=>'Event name in arabic is required.')) !!}
                    @error('event_name_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('event_name_in_french', 'Event Name (In french)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('event_name_in_french',isset($event->event_name_in_french) ? $event->event_name_in_french: '' , array('class' => 'form-control','required','data-parsley-required-message'=>'Event name in french is required.')) !!}
                    @error('event_name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('event_type_in_english', 'Event Type (In english)') !!}
                    {!! Form::text('event_type_in_english',isset($event->event_type_in_english) ? $event->event_type_in_english : '' , array('class' => 'form-control')) !!}
                    @error('event_type_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('event_type_in_arabic', 'Event Type (In arabic)') !!}
                    {!! Form::text('event_type_in_arabic',isset($event->event_type_in_arabic) ? $event->event_type_in_arabic : '' , array('class' => 'form-control')) !!}
                    @error('event_type_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('event_type_in_french', 'Event Type (In french)') !!}
                    {!! Form::text('event_type_in_french',isset($event->event_type_in_french) ? $event->event_type_in_french: '' , array('class' => 'form-control')) !!}
                    @error('event_type_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('event_edition_in_english', 'Event Edition (In english)') !!}
                    {!! Form::text('event_edition_in_english',isset($event->event_edition_in_english) ? $event->event_edition_in_english : '' , array('class' => 'form-control')) !!}
                    @error('event_edition_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('event_edition_in_arabic', 'Event Edition (In arabic)') !!}
                    {!! Form::text('event_edition_in_arabic',isset($event->event_edition_in_arabic) ? $event->event_edition_in_arabic : '' , array('class' => 'form-control')) !!}
                    @error('event_edition_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('event_edition_in_french', 'Event Edition (In french)') !!}
                    {!! Form::text('event_edition_in_french',isset($event->event_edition_in_french) ? $event->event_edition_in_french: '' , array('class' => 'form-control')) !!}
                    @error('event_edition_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description_in_english', 'Description (In english)') !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_english',isset($event->description_in_english) ? $event->description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'summernote-1','required','data-parsley-required-message'=>'Description in english is required.']) !!}
            @error('description_in_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description_in_arabic', 'Description (In arabic)') !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_arabic', isset($event->description_in_arabic) ? $event->description_in_arabic: '', ['class' => 'form-control summernote', 'id' => 'summernote-2','required','data-parsley-required-message'=>'Description in arabic is required.']) !!}
            @error('description_in_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description_in_french', 'Description (In french)') !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_french', isset($event->description_in_french) ? $event->description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'summernote-3','required','data-parsley-required-message'=>'Description in french is required.']) !!}
            @error('description_in_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('summary_in_english', 'Summary (In english)') !!}
            {!! Form::textarea('summary_in_english',isset($event->summary_in_english) ? $event->summary_in_english: '' , ['class' => 'form-control summernote', 'id' => 'summernote-4']) !!}
            @error('summary_in_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('summary_in_arabic', 'Summary (In arabic)') !!}
            {!! Form::textarea('summary_in_arabic', isset($event->summary_in_arabic) ? $event->summary_in_arabic: '', ['class' => 'form-control summernote', 'id' => 'summernote-5']) !!}
            @error('summary_in_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('summary_in_french', 'Summary (In french)') !!}
            {!! Form::textarea('summary_in_french', isset($event->summary_in_french) ? $event->summary_in_french: '', ['class' => 'form-control summernote', 'id' => 'summernote-6']) !!}
            @error('summary_in_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('place_name_in_english', 'Place Name (In english)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('place_name_in_english',isset($event->place_name_in_english) ? $event->place_name_in_english : '' , array('class' => 'form-control','required','data-parsley-required-message'=>'Place name in english is required.')) !!}
                    @error('place_name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('place_name_in_arabic', 'Place Name (In arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('place_name_in_arabic',isset($event->place_name_in_arabic) ? $event->place_name_in_arabic: '' , array('class' => 'form-control','required','data-parsley-required-message'=>'Place name in arabic is required.')) !!}
                    @error('place_name_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('place_name_in_french', 'Place Name (In french)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('place_name_in_french',isset($event->place_name_in_french) ? $event->place_name_in_french: '' , array('class' => 'form-control','required','data-parsley-required-message'=>'Place name in french is required.')) !!}
                    @error('place_name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <!-- <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('source_name_in_english', 'Source Name (In english)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('source_name_in_english',isset($event->source_name_in_english) ? $event->source_name_in_english : '' , array('class' => 'form-control')) !!}
                    @error('source_name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('source_name_in_arabic', 'Source Name (In arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('source_name_in_arabic',isset($event->source_name_in_arabic) ? $event->source_name_in_arabic : '' , array('class' => 'form-control')) !!}
                    @error('source_name_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('source_name_in_french', 'Source Name (In french)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('source_name_in_french',isset($event->source_name_in_french) ? $event->source_name_in_french: '' , array('class' => 'form-control')) !!}
                    @error('source_name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>  -->
        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('sectors[]', 'Sectors',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <button  type="button" class="btn btn-primary  btn-sm mr-2 ml-2 mb-3" id="select_all_sectors">Select all</button>
                    <button  type="button" class="btn btn-primary btn-sm mb-3" id="remove_all_sectors">Remove all</button>
                    {!! Form::select('sectors[]',$sector_arr,$selected_sectors,['class' =>'form-control select2','multiple','id'=>'sectors','required','data-parsley-required-message'=>'Please select the sectors.']) !!}
                    @error('sectors')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('zones[]', 'Zones',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <button  type="button" class="btn btn-primary btn-sm mr-2 ml-2 mb-3" id="select_all_zones">Select all</button>
                    <button  type="button" class="btn btn-primary btn-sm mb-3" id="remove_all_zones">Remove all</button>
                    {!! Form::select('zones[]',$zone_arr,$selected_zones,['class' =>'form-control select2','multiple','id'=>'zones','required','data-parsley-required-message'=>'Please select the zones.']) !!}
                    @error('zones')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('start_date', 'Event start Date') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <div class="input-group">
                    {!! Form::text('start_date', isset($event->start_date) ? date('m/d/Y', strtotime($event->start_date)): date('m/d/Y'), array('class' => 'form-control','id'=> 'start_date')) !!}
                    <label class="input-group-btn" for="txtDate">
                        <span class="btn btn-default">
                            <span class="far fa-calendar"></span>
                        </span>
                    </label>
                    </div>
                    @error('start_date')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('end_date', 'Event end Date') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <div class="input-group">
                    {!! Form::text('end_date', isset($event->end_date) ? date('m/d/Y', strtotime($event->end_date)):date('m/d/Y'), array('class' => 'form-control','id'=> 'end_date')) !!}
                    <label class="input-group-btn" for="txtDate">
                        <span class="btn btn-default">
                            <span class="far fa-calendar"></span>
                        </span>
                    </label>
                    </div>
                    <!-- <span class="far fa-calendar"></span> -->
                    @error('end_date')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>



        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('old_start_date', 'Ancienne Date début [Cas : Reporté]') !!}
                    
                    <div class="input-group">
                    {!! Form::date('old_start_date', isset($event->old_start_date) ? date('m/d/Y', strtotime($event->old_start_date)): date('m/d/Y'), array('class' => 'form-control','id'=> 'old_start_date')) !!}
                    <label class="input-group-btn" for="txtDate">
                        <span class="btn btn-default">
                            <span class="far fa-calendar"></span>
                        </span>
                    </label>
                    </div>
                    @error('old_start_date')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('old_end_date', 'Ancienne Date fin [Cas : Reporté]') !!}
               
                    <div class="input-group">
                    {!! Form::date('old_end_date', isset($event->old_end_date) ? date('m/d/Y', strtotime($event->old_end_date)):date('m/d/Y'), array('class' => 'form-control','id'=> 'old_end_date')) !!}
                    <label class="input-group-btn" for="txtDate">
                        <span class="btn btn-default">
                            <span class="far fa-calendar"></span>
                        </span>
                    </label>
                    </div>
                    <!-- <span class="far fa-calendar"></span> -->
                    @error('old_end_date')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    
                    {!! Form::label('old_zone', 'Ancienne zone [Cas : Reporté]') !!}
              
                    {!! Form::text('old_zone',isset($event->old_zone) ? $event->old_zone : '' , array('class' => 'form-control','required','data-parsley-required-message'=>'Event name in english is required.')) !!}
                    @error('old_zone')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>


      

        </div>


        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                <label for="status" class="label-text col-md-3"> Status:  <span class="required" style="color: red">*</span></label>
                                <div class="col-md-9">
                                        <select class="form-control" id="status" name="status" onchange="showDiv(this)">
                                            <option value="choose" disabled="">Choisir ...</option>
                                            <option value="Maintenu"><span class="label label-inline label-light-primary font-weight-bold" selected>Maintenu</span></option>
                                            <option value="Reporté"><span class="label label-inline label-light-warning font-weight-bold">Reporté</span></option>
                                            <option value="Annulé"><span class="label label-inline label-light-danger font-weight-bold"> Annulé</span></option>
                                        </select>
                                </div>
</div>
            </div>
            

        </div>
        <div class="form-group">
            {!! Form::label('price_in_square_meter', 'Price (per square meter in DZD)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::text('price_in_square_meter', isset($event->price_per_square_meter) ? $event->price_per_square_meter : '', array('class' => 'form-control','required','data-parsley-required-message'=>'The price field is required.')) !!}
            @error('price_in_square_meter')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        @if(isset($event->id))
            {!! Form::label('', 'Selected Event Images') !!}<br/><br/>
            <div class="form-group row">
            @foreach($event->eventImage as $eventImage)
                <div class="form-group">
                    <div class="col-lg-3">
                        {!! Form::image('storage/uploads/event_images/'.$eventImage->image,'event_imge', array('width' => 100, 'height' => 100))!!} <br>
                        <a href="javascript:void(0)" data-id="{{$eventImage->id}}" class="removeSelected"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>
                    </div>
                </div>
            @endforeach
            </div>
        @endif
        <div class="form-group">
            {!! Form::label('', 'Related Event Images') !!}<br/><br/>
            <button type= "button" style="display:block;border:none;width:150px;" class= "btn btn-secondary" onclick="document.getElementById('files').click()" id="browse">Browse</button>
            {!! Form::file('event_image[]',['class' =>'form-control','multiple','id'=>'files','style'=>'display:none']) !!}
            <input type="hidden" name="event_image_removed" id="event_image_removed" class="removed_image">
            
            @error('event_image.*')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('is_featured', 'Is featured') !!}<br/><br/>
            {!! Form::checkbox('is_featured',1, isset($event->is_featured) ? $event->is_featured : '') !!}
            {!! Form::label('is_featured', 'Yes/No') !!}
            @error('status')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="heading">
            <h5 class="card-label pull-left"  style="width: 100%;padding-top: 15px;">Add Event Reference</h5>
        </div>
        <br/> <br/>
        @if(isset($event->id))
            {!! Form::label('', 'Selected Event References') !!}<br/><br/>
            <div class="form-group row">
            @foreach($event->eventReference as $eventReference)
                <div class="form-group">
                    <div class="col-lg-3">
                        {!! Form::image('storage/uploads/event_references/'.$eventReference->image,'event_imge', array('width' => 100, 'height' => 100))!!} <br>
                        <a href="javascript:void(0)" data-id="{{$eventReference->id}}" class="removeSelectedReference"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>
                    </div>
                </div>
            @endforeach
            </div>
        @endif
        <div class="form-group">
            {!! Form::label('', 'Related Event References') !!}<br/><br/>
            <button type= "button" style="display:block;border:none;width:150px;" class= "btn btn-secondary" onclick="document.getElementById('files_references').click()" id="browse_references">Browse</button>
            {!! Form::file('event_reference[]',['class' =>'form-control','multiple','id'=>'files_references','style'=>'display:none']) !!}
            <input type="hidden" name="reference_image_removed" id="reference_image_removed" class="removed_image">
            @error('event_reference.*')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="heading">
            <h5 class="card-label pull-left"  style="width: 100%;padding-top: 15px;">Add Participation file</h5>
        </div>
        <br/> <br/>
        @if(isset($event->id))
            @foreach($event->document as $document) 
                @if($document->document_type == 'participation_file')
                    @php
                        $document_name = json_decode($document->document_name);
                        $participation_file_id =  $document->id;
                        
                    @endphp
                    <h5 class="card-label pull-left">Uploaded:&nbsp;&nbsp; (english){{$document_name->en }}&nbsp; &nbsp;| &nbsp;&nbsp;(arabic){{$document_name->ar }}&nbsp;&nbsp; |&nbsp;&nbsp;(french) {{$document_name->fr }} </h5>
                @endif
            @endforeach
        @endif
        <br/>
        <div class="form-group">
            <input type="hidden" value= "{{isset($participation_file_id) ? $participation_file_id : null}}" name="participation_file_id">
           {!! Form::label('', 'English') !!}<br/>
           {!! Form::file('participation_file_english',['class' =>'form-control','id'=>'documents']) !!}
            @error('event_document_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
           {!! Form::label('', 'Arabic') !!}<br/>
           {!! Form::file('participation_file_arabic',['class' =>'form-control','id'=>'documents']) !!}
            @error('event_document_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
           {!! Form::label('', 'French') !!}<br/>
           {!! Form::file('participation_file_french',['class' =>'form-control','id'=>'documents']) !!}
            @error('event_document_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="heading">
            <h5 class="card-label pull-left"  style="width: 100%;padding-top: 15px;">Add Event Documents</h5>
        </div>
        <br/> 
        <h5 class="card-label pull-left">Document 1</h5>
        <br/>
        @if(isset($event->id))
            @foreach($event->document as $document) 
                @if($document->document_type == 'first_document')
                    @php
                        $document_name = json_decode($document->document_name);
                        $document_first_id =  $document->id;
                    @endphp
                    <h5 class="card-label pull-left">Uploaded:&nbsp;&nbsp; (english){{$document_name->en }}&nbsp; &nbsp;| &nbsp;&nbsp;(arabic){{$document_name->ar }}&nbsp;&nbsp; |&nbsp;&nbsp;(french) {{$document_name->fr }} </h5>
                @endif
            @endforeach
        @endif
        <br/>
        <div class="form-group">
        <input type="hidden" value= "{{isset($document_first_id) ? $document_first_id : null}}" name="document_first_id">

           {!! Form::label('', 'English') !!}<br/>
           {!! Form::file('first_event_document_english',['class' =>'form-control','id'=>'documents']) !!}
            @error('event_document_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
           {!! Form::label('', 'Arabic') !!}<br/>
           {!! Form::file('first_event_document_arabic',['class' =>'form-control','id'=>'documents']) !!}
            @error('event_document_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
           {!! Form::label('', 'French') !!}<br/>
           {!! Form::file('first_event_document_french',['class' =>'form-control','id'=>'documents']) !!}
            @error('event_document_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <br/>
        <h5 class="card-label pull-left">Document 2</h5>
        <hr/>
        <br/>
        @if(isset($event->id))

            @foreach($event->document as $document) 
                @if($document->document_type == 'second_document')
                    @php
                        $document_name = json_decode($document->document_name);
                        $document_second_id =  $document->id;
                    @endphp
                    <h5 class="card-label pull-left">Uploaded: &nbsp;&nbsp;(english){{$document_name->en }}&nbsp;&nbsp; | &nbsp;&nbsp;(arabic){{$document_name->ar }}&nbsp;&nbsp; |&nbsp;&nbsp;(french) {{$document_name->fr }} </h5>
                @endif
            @endforeach
        @endif
        <br/>
        <div class="form-group">
        <input type="hidden" value= "{{isset($document_second_id) ? $document_second_id : null}}" name="document_second_id">
            {!! Form::label('', 'English') !!}<br/>
            {!! Form::file('second_event_document_english',['class' =>'form-control','id'=>'documents']) !!}
            @error('event_document_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('', 'Arabic') !!}<br/>
            {!! Form::file('second_event_document_arabic',['class' =>'form-control','id'=>'documents']) !!}
            @error('event_document_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('', 'French') !!}<br/>
            {!! Form::file('second_event_document_french',['class' =>'form-control','id'=>'documents']) !!}
            @error('event_document_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="heading">
            <h5 class="card-label pull-left"  style="width: 100%;padding-top: 15px;">Add Organizer</h5>
        </div>
        <br/> <br/>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('organizer_agency_in_english', 'Organizer Agency (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('organizer_agency_in_english',isset($event->organizer_agency_in_english) ? $event->organizer_agency_in_english : '' , array('class' => 'form-control','required','data-parsley-required-message'=>'The organizer agency in english is required.')) !!}
                    @error('organizer_agency_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('organizer_agency_in_arabic', 'Organizer Agency (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('organizer_agency_in_arabic',isset($event->organizer_agency_in_arabic) ? $event->organizer_agency_in_arabic : '' , array('class' => 'form-control','required','data-parsley-required-message'=>'The organizer agency in arabic is required.')) !!}
                    @error('organizer_agency_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('organizer_agency_in_french', 'Organizer Agency (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('organizer_agency_in_french',isset($event->organizer_agency_in_french) ? $event->organizer_agency_in_french: '' , array('class' => 'form-control','required','data-parsley-required-message'=>'The organizer agency in french is required.')) !!}
                    @error('organizer_agency_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                {!! Form::label('organizer_job_title_in_english', 'Organizer Job Title(In english)',['class' => 'required-class']) !!}
                {!! Form::text('organizer_job_title_in_english', isset($event->organizer_job_title_in_english) ? $event->organizer_job_title_in_english: '' , ['class' => 'form-control']) !!}
                @error('organizer_job_title_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                {!! Form::label('organizer_job_title_in_arabic', 'Organizer Job Title(In arabic)',['class' => 'required-class']) !!}
                {!! Form::text('organizer_job_title_in_arabic', isset($event->organizer_job_title_in_arabic) ? $event->organizer_job_title_in_arabic: '' , ['class' => 'form-control']) !!}
                @error('organizer_job_title_in_arabic')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                {!! Form::label('organizer_job_title_in_french', 'Organizer Job Title(In french)',['class' => 'required-class']) !!}
                {!! Form::text('organizer_job_title_in_french', isset($event->organizer_job_title_in_french) ? $event->organizer_job_title_in_french: '' , ['class' => 'form-control']) !!}
                @error('organizer_job_title')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('organizer_address_in_english', 'Organizer Address (In english)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('organizer_address_in_english',isset($event->organizer_address_in_english) ? $event->organizer_address_in_english: '' , ['class' => 'form-control summernote', 'id' => 'summernote-7','required','data-parsley-required-message'=>'Organizer address in english is required.']) !!}
            @error('organizer_address_in_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('organizer_address_in_arabic', 'Organizer Address (In arabic)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('organizer_address_in_arabic', isset($event->organizer_address_in_arabic) ? $event->organizer_address_in_arabic: '', ['class' => 'form-control summernote', 'id' => 'summernote-8','required','data-parsley-required-message'=>'Organizer address in arabic is required.']) !!}
            @error('organizer_address_in_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('organizer_address_in_french', 'Organizer Address (In french)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('organizer_address_in_french', isset($event->organizer_address_in_french) ? $event->organizer_address_in_french: '' , ['class' => 'form-control summernote', 'id' => 'summernote-9','required','data-parsley-required-message'=>'Organizer address in french is required.']) !!}
            @error('organizer_address_in_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('organizer_contact', 'Organizer Name',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('organizer_contact',isset($event->organizer_contact) ? $event->organizer_contact : '' , array('class' => 'form-control','required','data-parsley-required-message'=>'The organizer contact is required.')) !!}
                    @error('organizer_contact')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('organizer_telephone', 'Organizer Telephone',['class' => 'required-class']) !!}
                    {!! Form::text('organizer_telephone',isset($event->organizer_telephone) ? $event->organizer_telephone : '' , array('class' => 'form-control','data-mask'=>'+999 99 99 99 99')) !!}
                                                                                                                                                                                
                    @error('organizer_telephone')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('organizer_mobile', 'Organizer Mobile',['class' => 'required-class']) !!}
                    {!! Form::text('organizer_mobile',isset($event->organizer_mobile) ? $event->organizer_mobile: '' , array('class' => 'form-control','data-mask'=>'+999 999 99 99 99')) !!}
                    @error('organizer_mobile')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('organizer_fax', 'Organizer fax',['class' => 'required-class']) !!}
                    {!! Form::text('organizer_fax',isset($event->organizer_fax) ? $event->organizer_fax : '' , array('class' => 'form-control','data-mask'=>'+999 99 99 99 99')) !!}
                    @error('organizer_fax')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('organizer_email', 'Organizer Email',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::email('organizer_email',isset($event->organizer_email) ? $event->organizer_email : '' , array('class' => 'form-control','required','data-parsley-required-message'=>'The organizer email is required.')) !!}
                    @error('organizer_email')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('organizer_website', 'Organizer Website',['class' => 'required-class']) !!}
                    {!! Form::text('organizer_website',isset($event->organizer_website) ? $event->organizer_website: '' , array('class' => 'form-control')) !!}
                    @error('organizer_website')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
       

        @if(isset($event->id))
            @if(!$event->eventExhibitor->isEmpty())
            @foreach($event->eventExhibitor as $exhibitor)
            <div class="{{ $loop->last ? 'field_wrapper' : '' }}">
                <div class="form-group row heading">
                    <div class="col-lg-10">
                        <h5 class="card-label"  style="width: 100%;padding-top: 15px;">Add Exhibitor</h5>
                    </div>
                    <div class="col-lg-2">
                    @if(!$loop->first)
                        <a href="javascript:void(0);" class="remove-exhibitor"  data-id="{{$exhibitor->id}}"><i class='far fa-trash-alt' style='color: #F64E60;margin-top: 13px;margin-left:75px;'></i></a>
                    @endif
                    </div>
                </div>
                {!! Form::label('', 'Exhibitor Logo',['class' => 'required-class']) !!}
                {!! Form::label('', '*',['style' => 'color:red']) !!}
                <div class="form-group">
                    {!! Form::image('storage/uploads/exhibitor_logos/'.$exhibitor->exhibitors_logo,'exhibitor_logo', array('width' => 100, 'height' => 100, 'id'=>'logo_img'))!!}
                </div>
                <div class="form-group">
                    <input type="hidden" name="exhibitor_id[]" value="{{$exhibitor->id}}">
                    {!! Form::file('exhibitor_logo[]',['class' =>'form-control','id'=>'exihibitor_logo']) !!}
                    @error('exhibitor_logo')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('exhibitor_name_in_english', 'Exhibitor Name (In english)',['class' => 'required-class']) !!}
                            {!! Form::label('', '*',['style' => 'color:red']) !!}
                            {!! Form::text('exhibitor_name_in_english[]',isset($exhibitor->localeAll[0]->name) ? $exhibitor->localeAll[0]->name : '' , array('class' => 'form-control')) !!}
                            @error('exhibitor_name_in_english.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('exhibitor_name_in_arabic', 'Exhibitor Name (In arabic)',['class' => 'required-class']) !!}
                            {!! Form::label('', '*',['style' => 'color:red']) !!}
                            {!! Form::text('exhibitor_name_in_arabic[]',isset($exhibitor->localeAll[1]->name) ? $exhibitor->localeAll[1]->name : '' , array('class' => 'form-control')) !!}
                            @error('exhibitor_name_in_arabic.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('exhibitor_name_in_french', 'Exhibitor Name (In french)',['class' => 'required-class']) !!}
                            {!! Form::label('', '*',['style' => 'color:red']) !!}
                            {!! Form::text('exhibitor_name_in_french[]',isset($exhibitor->localeAll[2]->name) ? $exhibitor->localeAll[2]->name: '' , array('class' => 'form-control')) !!}
                            @error('exhibitor_name_in_french.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('email', 'Email Address',['class' => 'required-class']) !!}
                            {!! Form::text('email[]',isset($exhibitor->email_address) ? $exhibitor->email_address : '' , array('class' => 'form-control')) !!}
                            @error('email.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('contact', 'Contact No',['class' => 'required-class']) !!}
                            {!! Form::label('', '*',['style' => 'color:red']) !!}
                            {!! Form::text('contact[]',isset($exhibitor->contact) ? $exhibitor->contact : '' , array('class' => 'form-control')) !!}
                            @error('contact.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
                            {!! Form::label('', '*',['style' => 'color:red']) !!}
                            {!! Form::text('display_order[]',isset($exhibitor->display_order) ? $exhibitor->display_order: '' , array('class' => 'form-control')) !!}
                            @error('display_order.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}<br/><br/>
                    {!! Form::checkbox('status[]',1, isset($exhibitor->status) ? $exhibitor->status : '') !!}
                    {!! Form::label('status', 'Active/Inactive') !!}
                </div>
            </div>
            @endforeach
            @else
            <div class="field_wrapper">
           

           </div>
            @endif
            <div class="form-group row">
                <div class="col-lg-9">
                </div>
                <div class="col-lg-3">
                    <a href="javascript:void(0);" class="btn btn-primary secondary add_button" style="margin-top: 7px;" title="Add field">+Add Exhibitor</a>
                </div>
            </div>
        @else
        <div class="field_wrapper">
           

        </div>
        <div class="form-group row">
            <div class="col-lg-9">
            </div>
            <div class="col-lg-3">
                <a href="javascript:void(0);" class="btn btn-primary add_button" style="margin-top: 7px;" title="Add field">+Add Exhibitor</a>
            </div>
        </div>

        @endif
    </div>
    <div class="form-group">
            {!! Form::label('is_actif', 'Is Active') !!}<br/><br/>
            {!! Form::checkbox('is_actif',1, isset($news->is_actif) ? $event->is_actif : 1) !!}
            {!! Form::label('is_actif', 'Active/Inactive') !!}
            @error('is_actif')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2" >Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-event.index') }}">Cancel</a>
    </div>
</form>
<div id="removeReferenceModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='removeReferenceForm' id='removeReferenceForm'  method="POST" action="{{route('destroy-reference')}}">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_reference_hidden">
                <input type="hidden" name="event_id" value="{{isset($event->id)?$event->id:''}}" id="">
                <div class="modal-header">
                    <h4 class="modal-title">Remove</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to remove this event reference?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="removeImageModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='removeImageForm' id='removeImageForm'  method="POST" action="{{route('destroy-image')}}">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_image_hidden">
                <input type="hidden" name="event_id" value="{{isset($event->id)?$event->id:''}}" id="">
                <div class="modal-header">
                    <h4 class="modal-title">Remove</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to remove this event image?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="removeExhibitorModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='removeExhibitorForm' id='removeExhibitorForm'  method="POST" action="{{route('destroy-exhibitor')}}">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_exhibitor_hidden">
                <input type="hidden" name="event_id" value="{{isset($event->id)?$event->id:''}}" id="">
                <div class="modal-header">
                    <h4 class="modal-title">Remove</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to remove the exhibitor?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="removeDocumentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='removeDocumentForm' id='removeDocumentForm'  method="GET" action="{{route('delete-document')}}">
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_document_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Remove</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to remove the document?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

