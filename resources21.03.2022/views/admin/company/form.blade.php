<form method="post">
    <div class="card-body">
        {!! Form::label('company_logo', 'Company Logo') !!}
        {!! Form::label('', '*',['style' => 'color:red']) !!}<br />
        @if(isset($company->id))
        <div class="form-group">
            {!! Form::image('storage/uploads/company_logo/'.$company->company_logo,'company_logo', array('width' => 100, 'height' => 100, 'id'=>'logo_img'))!!}
        </div>
        <div class="form-group">
            {!! Form::file('company_logo',[
                'class' =>'form-control',
                'id'=>'logo',
                ]) !!}
            @error('company_logo')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        @else
        <div class="form-group">
            {!! Form::file('company_logo',[
                'class' =>'form-control',
                'id'=>'logo',
                'required'=>'required',
                'data-parsley-required-message' => 'Company logo is required',
                'data-parsley-trigger'=>'change focusout'
                ]) !!}
            @error('company_logo')
            <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        @endif
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="hidden" name="englishTitle" value="{{isset($company->company_name_in_english) ? $company->company_name_in_english: ''}}">
                    {!! Form::label('company_name_in_english', 'Company Name (In english)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!!Form::text('company_name_in_english',isset($company->company_name_in_english) ? $company->company_name_in_english : '' ,[
                        'class' => 'form-control',
                        'required'=>'required',
                        'data-parsley-required-message' => 'The company name in english field is required',
                        'data-parsley-trigger'=>'change focusout'
                        ]) !!}
                    @error('company_name_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('company_name_in_arabic', 'Company Name (In arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('company_name_in_arabic',isset($company->company_name_in_arabic) ? $company->company_name_in_arabic : '' , [
                        'class' => 'form-control',
                        'required'=>'required',
                        'data-parsley-required-message' => 'The company name in arabic field is required',
                        'data-parsley-trigger'=>'change focusout'
                        ]) !!}
                    @error('company_name_in_arabic')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('company_name_in_french', 'Company Name (In french)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('company_name_in_french',isset($company->company_name_in_french) ? $company->company_name_in_french: '' , [
                    'class' => 'form-control',
                    'required'=>'required',
                    'data-parsley-required-message' => 'The company name in french field is required',
                    'data-parsley-trigger'=>'change focusout'
                        ]) !!}
                    @error('company_name_in_french')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('creation_date', 'Creation Date') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}

                    {!! Form::date('creation_date', isset($company->creation_date) ? $company->creation_date : '', [
                    'class' => 'form-control',
                    'required'=>'required',
                    'data-parsley-required-message' => 'The Creation date field is required',
                    'data-parsley-trigger'=>'change focusout'
                    ]) !!}
                    <!-- <span class="far fa-calendar"></span> -->
                    @error('creation_date')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('telephone', 'Telephone') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('telephone',isset($company->telephone) ? $company->telephone : '' , [
                    'class' => 'form-control',
                    'required'=>'required',
                    'data-parsley-required-message' => 'The Telephone field is required',
                    'data-parsley-trigger'=>'change focusout'
                    ]) !!}
                    @error('telephone')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('email',isset($company->email) ? $company->email : '' , [
                        'class' => 'form-control',
                        'required'=>'required',
                        'data-parsley-required-message' => 'The Email field is required',
                        'data-parsley-trigger'=>'change focusout'
                        ]) !!}
                    @error('email')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('address_in_english', 'Address(In english)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('address_in_english',isset($company->address_in_english) ? $company->address_in_english: '' , [
                        'class' => 'form-control',
                        'id' => '',
                        'required'=>'required',
                        'data-parsley-required-message' => 'The address field in english is required',
                        'data-parsley-trigger'=>'change focusout'
                        ]) !!}
                    @error('address_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('address_in_arabic', 'Address(In Arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('address_in_arabic',isset($company->address_in_arabic) ? $company->address_in_arabic: '' , [
                    'class' => 'form-control',
                    'id' => '',
                    'required'=>'required',
                    'data-parsley-required-message' => 'The address field in arabic is required',
                    'data-parsley-trigger'=>'change focusout'
                    ]) !!}
                    @error('address_in_arabic')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('address_in_french', 'Address(In French)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('address_in_french',isset($company->address_in_french) ? $company->address_in_french: '' , [
                    'class' => 'form-control',
                    'id' => '',
                    'required'=>'required',
                    'data-parsley-required-message' => 'The address field in french is required',
                    'data-parsley-trigger'=>'change focusout'
                        ]) !!}
                    @error('address_in_french')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('fax', 'FAX') !!}
                    {!! Form::text('fax',isset($company->fax) ? $company->fax: '' , array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('website', 'Website') !!}
                    {!! Form::text('website',isset($company->website) ? $company->website : '' , array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('facebook', 'Facebook') !!}
                    {!! Form::text('facebook',isset($company->facebook) ? $company->facebook : '' , array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('youtube', 'Youtube') !!}
                    {!! Form::text('youtube',isset($company->youtube) ? $company->youtube: '' , array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('instagram', 'Instagram') !!}
                    {!! Form::text('instagram',isset($company->instagram) ? $company->instagram : '' , array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('twitter', 'Twitter') !!}
                    {!! Form::text('twitter',isset($company->twitter) ? $company->twitter : '' , array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('linkedin', 'linkedin') !!}
                    {!! Form::text('linkedin',isset($company->linkdeln) ? $company->linkdeln : '' , array('class' => 'form-control')) !!}
                </div>
            </div>

        </div>
        <div class="heading">
            <h5 class="card-label pull-left" style="width: 100%;padding-top: 15px;">Financial Information</h5>
        </div>
        <br /> <br />
        <div class="form-group row">
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('capital', 'Capital') !!}
                    {!! Form::text('capital',isset($company->capital) ? $company->capital: '' , array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('staff', 'Staff') !!}
                    {!! Form::text('staff',isset($company->staff) ? $company->staff : '' , array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('net_sales_2018', 'Consolidated net sales of 2018') !!}
                    {!! Form::text('net_sales_2018',isset($company->net_sales_2018) ? $company->net_sales_2018 : '' , array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('net_sales_2019', 'Consolidated net sales of 2019') !!}
                    {!! Form::text('net_sales_2019',isset($company->net_sales_2019) ? $company->net_sales_2019 : '' , array('class' => 'form-control')) !!}
                </div>
            </div>

        </div>
        <div class="heading">
            <h5 class="card-label pull-left" style="width: 100%;padding-top: 15px;">Company Activity codes, Sectors, Zones</h5>
        </div>
        <br /> <br />
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('sectors[]', 'Sectors',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <button type="button" class="btn btn-primary  btn-sm mr-2 ml-2 mb-3" id="select_all_sectors">Select all</button>
                    <button type="button" class="btn btn-primary btn-sm mb-3" id="remove_all_sectors">Remove all</button>
                    {!! Form::select('sectors[]',$sector_arr,$selected_sectors,[
                    'class' =>'form-control select2',
                    'multiple',
                    'id'=>'sectors',
                    'required'=>'required',
                    'data-parsley-required-message' => 'The sector field is required',
                    'data-parsley-trigger'=>'change focusout'
                    ]) !!}
                    @error('sectors')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('zones[]', 'Zones',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <button type="button" class="btn btn-primary btn-sm mr-2 ml-2 mb-3" id="select_all_zones">Select all</button>
                    <button type="button" class="btn btn-primary btn-sm mb-3" id="remove_all_zones">Remove all</button>
                    {!! Form::select('zones[]',$zone_arr,$selected_zones,[
                    'class' =>'form-control select2',
                    'multiple',
                    'id'=>'zones',
                    'required'=>'required',
                    'data-parsley-required-message' => 'The Zone field  is required',
                    'data-parsley-trigger'=>'change focusout'
                    ]) !!}
                    @error('zones')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('activity_codes[]', 'Activity Codes',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <button type="button" class="btn btn-primary  btn-sm mr-2 ml-2 mb-3" id="select_all_activity_codes">Select all</button>
                    <button type="button" class="btn btn-primary btn-sm mb-3" id="remove_all_activity_codes">Remove all</button>
                    {!! Form::select('activity_codes[]',$activity_codes_arr,$selected_activated_codes,[
                    'class' =>'form-control select2',
                    'multiple',
                    'id'=>'activity_codes',
                    'required'=>'required',
                    'data-parsley-required-message' => 'The activity codes field is required',
                    'data-parsley-trigger'=>'change focusout'
                    ]) !!}
                    @error('activity_codes')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        @if(isset($company->id))
            @if(!$company['products']->isEmpty())
                @foreach($company->products as $product)
                <div class="{{ $loop->last ? 'field_wrapper' : '' }}">
                    <div class="form-group row heading">
                        <div class="col-lg-10">
                            <h5 class="card-label" style="width: 100%;padding-top: 15px;">Products & Services</h5>
                        </div> 
                        @if(!$loop->first)
                        <div class="col-lg-2">
                            <a href="javascript:void(0);" class="delete_product_button" data-id="{{$product->id}}"><i class="far fa-trash-alt" style='color: #F64E60;margin-top: 13px;margin-left:75px;'></i>
                            </a>
                        </div>
                        @endif
                    </div>
                    {!! Form::label('', 'Add products and services') !!}
                    <div class="form-group">
                        {!! Form::select('product[]',$product_arr,$product->product_id,['class' => 'form-control']) !!} 
                    </div>
                    <div class="form-group row">
                        @foreach($product->productImages as $productImage)
                        <div class="form-group">
                            <div class="col-lg-3">
                                {!! Form::image('storage/uploads/product_image/'.$productImage->image,'product_images', array('width' => 100, 'height' => 100, 'id'=>'logo_img'))!!}<br>
                                <a href="javascript:void(0)" data-id="{{$productImage->id}}" class="removeProductImage"><i class="far fa-trash-alt" style="color: #F64E60;margin-left:40px;"></i></a>
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="product_id[]" value="{{$product->id}}">
                        <!-- {!! Form::file('product_images['.$product->id.'][]',['class' =>'form-control','multiple','id'=>'files-prod-id0']) !!} -->
                        {!! Form::file('product_images['.$product->id.'][]',['class' =>"form-control gallery_input_$product->id files-prod-id",'id'=> "files-prod-id$product->id", 'multiple','data-id'=>$product->id]) !!}
                        <input type="hidden" name="product_image_removed[{{$product->id}}]" id="removed_image" class="removed_image">
                    </div>
                    
                </div>
                @endforeach
                <div class="form-group row">
                    <div class="col-lg-10">
                    </div>
                    <div class="col-lg-2">
                        <a href="javascript:void(0);" class="btn btn-primary secondary add_button" style="margin-top: 7px;" title="Add field">+Add More</a>
                    </div>
                </div>
            @else
            <div class="field_wrapper">
                <div class="form-group row heading">
                    <div class="col-lg-12">
                        <h5 class="card-label" style="width: 100%;padding-top: 15px;">Products & Services</h5>
                    </div>
                    <!-- <div class="col-lg-2">
                        <a href="javascript:void(0);" class="delete_product_button" ><i class="far fa-trash-alt" style="color: #F64E60;margin-top: 13px;"></i>
                        </a>
                    </div> -->
                 </div>
                {!! Form::label('', 'Add products and services') !!}
                <div class="form-group">
                    {!! Form::select('product[]',$product_arr,1,['class' => 'form-control']) !!} 
                </div>
                <div class="form-group">
                    <input type="hidden" name="product_id[]" value="">
                    <!-- <button type= "button" style="display:block;border:none;width:150px;" class= "btn btn-secondary" onclick="document.getElementById('files').click()">Browse</button> -->
                    {!! Form::file('product_images[0][]',['class' =>'form-control gallery_input_0 files-prod-id','id'=> "files-prod-id0", 'multiple','data-id'=>0]) !!}
                    <input type="hidden" name="product_image_removed[0]" id="removed_image0" class="removed_image">
                </div>
            
            </div> 
            <div class="form-group row">
                <div class="col-lg-10">
                </div>
                <div class="col-lg-2">
                    <a href="javascript:void(0);" class="btn btn-primary secondary add_button" style="margin-top: 7px;" title="Add field">+Add More</a>
                </div>
            </div>
            @endif
        @else
        <div class="field_wrapper">
            <div class="form-group row heading">
                <div class="col-lg-12">
                    <h5 class="card-label" style="width: 100%;padding-top: 15px;">Products & Services</h5>
                </div>
                <!-- <div class="col-lg-2">
                    <a href="javascript:void(0);" class="delete_product_button" ><i class="far fa-trash-alt" style="color: #F64E60;margin-top: 13px;"></i>
                    </a>
                </div> -->
            </div>
            {!! Form::label('', 'Add products and services') !!}
            <div class="form-group">
                {!! Form::select('product[]',$product_arr,1,['class' => 'form-control']) !!} 
            </div>
            <div class="form-group">
                <input type="hidden" name="product_id[]" value="">
                <!-- <button type= "button" style="display:block;border:none;width:150px;" class= "btn btn-secondary" onclick="document.getElementById('files').click()">Browse</button> -->
                {!! Form::file('product_images[0][]',['class' =>'form-control gallery_input_0 files-prod-id','id'=> "files-prod-id0", 'multiple','data-id'=>0]) !!}
                <input type="hidden" name="product_image_removed[0]" id="removed_image0" class="removed_image">
            </div>
            
        </div> 
        <div class="form-group row">
            <div class="col-lg-10">
                </div>
                <div class="col-lg-2">
                    <a href="javascript:void(0);" class="btn btn-primary secondary add_button" style="margin-top: 7px;" title="Add field">+Add More</a>
                </div>
            </div> 
        </div>
        @endif


        <!-- -----Contact statrt here--------- -->
        @if(!empty($company['contacts']))
            @foreach($company->contacts as $contact)
                <div class="{{ $loop->last ? 'contact_wrapper' : '' }}">
                    <div class="form-group row heading">
                        <div class="col-lg-10">
                            <h5 class="card-label" style="width: 100%;padding-top: 15px;">Contact Information</h5>
                        </div>
                        <div class="col-lg-2">
                            @if(!$loop->first)
                            <a href="javascript:void(0);" class="delete_contact_button" data-id="{{$contact->id}}"><i class="far fa-trash-alt" style="color: #F64E60;margin-top: 13px;"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="contact_id[]" value="{{$contact->id}}">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('contact_name_in_english', 'Name(In english)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('contact_name_in_english[]',isset($contact->localeAll[0]->name) ? $contact->localeAll[0]->name : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Contact name in english field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('contact_name_in_english.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('contact_name_in_arabic', 'Name(In arabic)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('contact_name_in_arabic[]',isset($contact->localeAll[1]->name) ? $contact->localeAll[1]->name : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Contact name in arabic field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('contact_name_in_arabic.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('contact_name_in_french', 'Name(In french)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('contact_name_in_french[]',isset($contact->localeAll[2]->name) ? $contact->localeAll[2]->name : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Contact name in french field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('contact_name_in_french.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('job_in_english', 'Job Title(In english)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('job_in_english[]',isset($contact->localeAll[0]->jobtitle) ? $contact->localeAll[0]->jobtitle : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Job title in english field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('job_in_english.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('job_in_arabic', 'Job Title(In arabic)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!!Form::text('job_in_arabic[]',isset($contact->localeAll[1]->jobtitle) ? $contact->localeAll[1]->jobtitle : '', [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Job title in arabic field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('job_in_arabic.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('job_in_french', 'Job Title(In french)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('job_in_french[]',isset($contact->localeAll[2]->jobtitle) ? $contact->localeAll[2]->jobtitle : '', [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Job title in french field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('job_in_french.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('mobile_number', 'Mobile Number') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!!Form::text('mobile_number[]',isset($contact->mobile_number) ? $contact->mobile_number : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Mobile  field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('mobile_number.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('email_address', 'Email Address') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!!Form::text('email_address[]',isset($contact->email) ? $contact->email : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Email address field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('email_address.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
             <div class="form-group row">
                <div class="col-lg-10">
                </div>
                <div class="col-lg-2">
                    <a href="javascript:void(0);" class="btn btn-primary add_contacts" style="margin-top: 7px;" title="Add field">+Add More</a>
                </div>
             </div>
        @else
                <div class="contact_wrapper">
                    <div class="form-group row heading">
                        <div class="col-lg-12">
                            <h5 class="card-label" style="width: 100%;padding-top: 15px;">Contact Information</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="contact_id[]" value="">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('contact_name_in_english', 'Name(In english)',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('contact_name_in_english[]',isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Contact name in english field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('contact_name_in_english.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('contact_name_in_arabic', 'Name(In arabic)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('contact_name_in_arabic[]',isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Contact name in arabic field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('contact_name_in_arabic.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('contact_name_in_french', 'Name(In french)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('contact_name_in_french[]',isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Contact name in french field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('contact_name_in_french.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('job_in_english', 'Job Title(In english)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('job_in_english[]',isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Job title in english field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('job_in_english.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('job_in_arabic', 'Job Title(In arabic)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('job_in_arabic[]',isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Job title in arabic field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('job_in_arabic.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('job_in_french', 'Job Title(In french)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('job_in_french[]',isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Job title in french field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('job_in_french.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('mobile_number', 'Mobile Number') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('mobile_number[]',isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' ,[
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Mobile Number  field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('mobile_number.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('email_address', 'Email Address') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('email_address[]',isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' , [
                                'class' => 'form-control',
                                'required'=>'required',
                                'data-parsley-required-message' => 'The Email Address  field is required',
                                'data-parsley-trigger'=>'change focusout'
                                ]) !!}
                                @error('email_address.*')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-10">
                    </div>
                    <div class="col-lg-2">
                        <a href="javascript:void(0);" class="btn btn-primary add_contacts" style="margin-top: 7px;" title="Add field">+Add More</a>
                    </div>
                </div>
        @endif
        <div class="form-group">
            {!! Form::label('status', 'Status') !!}<br /><br />
            {!! Form::checkbox('status',1,isset($company->status) ? $company->status : 1) !!}
            {!! Form::label('status', 'Active/Inactive') !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_approved', 'Approvel') !!}<br /><br />
            {!! Form::checkbox('is_approved',1,isset($company->is_approved) ? $company->is_approved : 0) !!}
            {!! Form::label('is_approved', 'Approved/Pending') !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_featured','Is featured') !!}<br /><br />
            {!! Form::checkbox('is_featured',1,isset($company->is_featured) ? $company->is_featured : 0) !!}
            {!! Form::label('is_featured', 'Yes/No') !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_sponsored', 'Is Sponsored') !!}<br /><br />
            {!! Form::checkbox('is_sponsored',1,isset($company->is_sponsored) ? $company->is_sponsored : 0,['id'=>'is_sponsored']) !!}
            {!! Form::label('is_sponsored', 'Yes/No') !!}
        </div>
        <div class="form-group" style="display:none" id='sponsored-rating'>
            <div class="col-lg-4">
                {!! Form::label('sponsored_rating', 'Sponsored Rating',['class' => 'required-class']) !!}
                {!! Form::select('sponsored_rating',App\Models\Company::sponsored_rating, isset($company->sponsored_rating) ? $company->sponsored_rating: null, ['class' => 'form-control'])!!}
                @error('sponsored_rating')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror 
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-company.index') }}">Cancel</a>
    </div> 
</form>
<div id="removeProductModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='removeProductForm' id='removeProductForm' method="POST" action="{{route('delete-products')}}">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete_product" value="" id="delete_product_hidden">
                <input type="hidden" name="company_id" value="{{isset($company->id)?$company->id:''}}" id="">
                <div class="modal-header">
                    <h4 class="modal-title">Remove</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to remove the product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="removeContactModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='removeContactForm' id='removeContactForm' method="POST" action="{{route('delete-contacts')}}">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete_conatct" value="" id="delete_contact_hidden">
                <input type="hidden" name="company_id" value="{{isset($company->id)?$company->id:''}}" id="">
                <div class="modal-header">
                    <h4 class="modal-title">Remove</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to remove the contacts?</p>
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
            <form name='removeImageForm' id='removeImageForm' method="POST" action="{{route('destroy-product-image')}}">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="product_delete" value="" id="delete_image_hidden">
                <input type="hidden" name="company_id" value="{{isset($company->id)?$company->id:''}}" id="">
                <div class="modal-header">
                    <h4 class="modal-title">Remove</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to remove this Product image?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
