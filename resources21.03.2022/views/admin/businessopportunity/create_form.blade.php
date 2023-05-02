    {{ csrf_field() }}

    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('project_title_in_english', 'Project Title (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('project_title_in_english',isset($business_opportunity->project_title_in_english) ? $business_opportunity->project_title_in_english : '' , array('class' => 'form-control')) !!}
                    @error('project_title_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('project_title_in_arabic', 'Project Title (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('project_title_in_arabic',isset($business_opportunity->project_title_in_arabic) ? $business_opportunity->project_title_in_arabic : '' , array('class' => 'form-control')) !!}
                    @error('project_title_in_arabic')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('project_title_in_french', 'Project Title (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('project_title_in_french',isset($business_opportunity->project_title_in_french) ? $business_opportunity->project_title_in_french: '' , array('class' => 'form-control')) !!}
                    @error('project_title_in_french')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <!-- Comapny name -->
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('company_name_in_english', 'Company Name (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('company_name_in_english',isset($business_opportunity->company_name_in_english) ? $business_opportunity->company_name_in_english : '' , array('class' => 'form-control')) !!}
                    @error('company_name_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('company_name_in_arabic', 'Company Name (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('company_name_in_arabic',isset($business_opportunity->company_name_in_arabic) ? $business_opportunity->company_name_in_arabic : '' , array('class' => 'form-control')) !!}
                    @error('company_name_in_arabic')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('company_name_in_french', 'Company Name (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('company_name_in_french',isset($business_opportunity->company_name_in_french) ? $business_opportunity->company_name_in_french: '' , array('class' => 'form-control')) !!}
                    @error('company_name_in_french')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Project Description name -->
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('project_description_in_english', 'Project Description (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('project_description_in_english', isset($business_opportunity->project_description_in_english) ? $business_opportunity->project_description_in_english : '', ['id' => 'project_description_in_english','class' => 'form-control']) !!}
                    @error('project_description_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror

                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('project_description_in_arabic', 'Project Description (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}

                    {!! Form::textarea('project_description_in_arabic', isset($business_opportunity->project_description_in_arabic) ? $business_opportunity->project_description_in_arabic : '', ['id' => 'project_description_in_arabic', 'class' => 'form-control']) !!}
                    @error('project_description_in_arabic')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('project_description_in_french', 'Project Description (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('project_description_in_french', isset($business_opportunity->project_description_in_french) ? $business_opportunity->project_description_in_arabic : '', ['id' => 'project_description_in_french','class' => 'form-control']) !!}
                    @error('project_description_in_french')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <!-- Contact person -->
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('contact_person_in_english', 'Contact Person (In english)',['class' => 'required-class']) !!}
                    {!! Form::text('contact_person_in_english',isset($business_opportunity->contact_person_in_english) ? $business_opportunity->contact_person_in_english : '' , array('class' => 'form-control')) !!}
                    @error('contact_person_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('contact_person_in_arabic', 'Contact Person (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::text('contact_person_in_arabic',isset($business_opportunity->contact_person_in_arabic) ? $business_opportunity->contact_person_in_arabic : '' , array('class' => 'form-control')) !!}
                    @error('contact_person_in_arabic')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('contact_person_in_french', 'Contact Person (In french)',['class' => 'required-class']) !!}
                    {!! Form::text('contact_person_in_french',isset($business_opportunity->contact_person_in_french) ? $business_opportunity->contact_person_in_french: '' , array('class' => 'form-control')) !!}
                    @error('contact_person_in_french')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('company_presentation_text_in_english', 'Company Presentation Text (In english)',['class' => 'required-class']) !!}
        
            {!! Form::textarea('company_presentation_text_in_english',isset($business_opportunity->company_presentation_text_in_english) ? $business_opportunity->company_presentation_text_in_english: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-1']) !!}
            @error('company_presentation_text_in_english')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('company_presentation_text_in_arabic', 'Company Presentation Text (In arabic)',['class' => 'required-class']) !!}
            {!! Form::textarea('company_presentation_text_in_arabic', isset($business_opportunity->company_presentation_text_in_arabic) ? $business_opportunity->company_presentation_text_in_arabic: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-2']) !!}
            @error('company_presentation_text_in_arabic')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('company_presentation_text_in_french', 'Company Presentation Text (In french)',['class' => 'required-class']) !!}
            {!! Form::textarea('company_presentation_text_in_french', isset($business_opportunity->company_presentation_text_in_french) ? $business_opportunity->company_presentation_text_in_french: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-3']) !!}
            @error('company_presentation_text_in_french')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('company_email', 'Company Email',['class' => 'required-class']) !!}
                    {!! Form::text('company_email',isset($business_opportunity->company_email) ? $business_opportunity->company_email : '' , array('class' => 'form-control')) !!}
                    @error('company_email')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('company_contact', 'Company Contact',['class' => 'required-class']) !!}
                    {!! Form::text('company_contact',isset($business_opportunity->company_contact) ? $business_opportunity->company_contact: '' , array('class' => 'form-control')) !!}
                    @error('company_contact')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('display_order',isset($business_opportunity->display_order) ? $business_opportunity->display_order: $defaultDisplayOrder , ['class' => 'form-control']) !!}
                    @error('display_order')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
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
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('zones[]', 'Zones',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <button  type="button" class="btn btn-primary btn-sm mr-2 ml-2 mb-3" id="select_all_zones">Select all</button>
                    <button  type="button" class="btn btn-primary btn-sm mb-3" id="remove_all_zones">Remove all</button>
                    {!! Form::select('zones[]',$zone_arr,$selected_zones,['class' =>'form-control select2','multiple','id'=>'zones']) !!}
                    @error('zones')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        @if(isset($business_opportunity->logo))
        {!! Form::label('', 'Selected Logo Image') !!}<br /><br />
        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="col-lg-3">
                        <a href="{{ asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}} " target="_blank"><img src="{{ asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" alt="business-logo" class="imageThumb"></a><br>

                    </div>
                </div>
            </div>
        </div>

        @endif
        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('', 'Logo') !!}
                    <br /><br />
                    <button type="button" style="display:block;width:850px; height:40px;border:none" onclick="document.getElementById('logo').click()" id="browse_logo">Browse</button>
                    {!! Form::file('logo',['class' =>'form-control','','id'=>'logo','style'=>'display:none']) !!}
                    @error('logo')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        @if(isset($business_opportunity->company_presentation_file))
        {!! Form::label('', 'Company presentation file') !!}<br /><br />
        
        <div class="form-group">
            <div class="col-lg-12">

                <a class="form-control" href="{{ asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/presentation/'.$business_opportunity->company_presentation_file)}} " target="_blank">{{ $business_opportunity->company_presentation_file }}</a><br>

            </div>
        </div>
        
        @endif
        <div class="form-group">
           
                {!! Form::label('', 'Company Presentation File') !!}
                <br /><br />

                {!! Form::file('company_presentation_file',['class' =>'form-control','','id'=>'presentation_file']) !!}
                @error('company_presentation_file')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror   
            
        </div>
        @if(isset($business_opportunity->image))
        {!! Form::label('', 'Selected Image') !!}<br /><br />
        <div class="form-group row">
            <div class="form-group">
                <div class="col-lg-3">

                    <a href="{{ asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/image/'.$business_opportunity->image)}} " target="_blank"><img src="{{ asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/image/'.$business_opportunity->image)}}" alt="business-image" class="imageThumb"></a><br>

                </div>
            </div>
        </div>
        @endif
        <div class=" form-group">
            {!! Form::label('', 'Image') !!}
           <br /><br />
            <button type="button" style="display:block;width:850px; height:40px;border:none" onclick="document.getElementById('image').click()" id="browse_image">Browse</button>
            {!! Form::file('image',['class' =>'form-control','','id'=>'image','style'=>'display:none']) !!}
            @error('image')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        <!-- multiple documents -->
        @if(isset($business_opportunity->id))
        {!! Form::label('', 'Selected Documents') !!}<br /><br />
        <div class="form-group row">
            @foreach($business_opportunity->businessOpportunityDocument as $bo_document)
            <div class="form-group">
                <div class="col-lg-12">
                    <a class="form-control" href="{{ asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/documents/'.$bo_document->document)}} " target="_blank">{{ $bo_document->document }}</a><br>

                    <a href="javascript:void(0)" data-id="{{$bo_document->id}}" data-type="document" class="removeSelected"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="form-group">
            {!! Form::label('', 'Documents') !!}
          <br /><br />
            {!! Form::file('documents[]',['class' =>'form-control','multiple','id'=>'documents']) !!}
            @error('documents.*')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <!-- end multiple documents -->
        <div class="row form-group">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('activated', 'Activated') !!}<br /><br />
                    {!! Form::checkbox('activated',1, isset($business_opportunity->activated) ? $business_opportunity->activated : 1) !!}
                    {!! Form::label('activated', 'Yes/No') !!}
                    @error('status')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('is_featured', 'is featured') !!}<br /><br />
                    {!! Form::checkbox('is_featured',1, isset($business_opportunity->is_featured) ? $business_opportunity->is_featured : '') !!}
                    {!! Form::label('is_featured', 'Yes/No') !!}
                    @error('status')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-business-opportunity.index') }}">Cancel</a>
    </div>
