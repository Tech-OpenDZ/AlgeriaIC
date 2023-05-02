<div class="modal-header">
    <h4 class="modal-title" id="modelHeading"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
{!! Form::open(['method' => 'post', 'url' => '#', 'class' => 'form-horizontal,submit_bannerform' ,'id' => 'bannerForm','files' => true]) !!}
    <div class="modal-body">
        <input type="hidden" name="category" value="{{$categoryId}}">
            <div class="form-group">
                {!! Form::label('banner_img', 'Banner Image',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::label('', '(Please select a Image having width 750 and height of 254 pixels)')!!}
                    {!! Form::file('image',['id' => 'banner_img', 'class' => 'form-control col-lg-12']) !!}
                     <div class="bg-danger-o-50 py-2 px-4 error_banner col-lg-12" style="display:none"></div>
            </div>
            <div class="form-group row">
                 <div class="col-lg-4">
                    <div class="form-group"> 
                        {!! Form::label('header_in_english', 'Heading (In english)') !!}
                        {!! Form::text('header_in_english',null ,array('class' => 'form-control')) !!}
                        <div class="bg-danger-o-50 py-2 px-4 error_header_in_english col-lg-12" style="display:none"></div>

                    </div> 
                 </div>
                 <div class="col-lg-4">
                    <div class="form-group"> 
                        {!! Form::label('header_in_arabic', 'Heading (In arabic)') !!}
                        {!! Form::text('header_in_arabic',null ,array('class' => 'form-control')) !!}
                        <div class="bg-danger-o-50 py-2 px-4 error_header_in_arabic col-lg-12" style="display:none"></div>

                    </div> 
                 </div>
                 <div class="col-lg-4">
                    <div class="form-group"> 
                        {!! Form::label('header_in_french', 'Heading (In french)') !!}
                        {!! Form::text('header_in_french',null ,array('class' => 'form-control')) !!}
                        <div class="bg-danger-o-50 py-2 px-4 error_header_in_french col-lg-12" style="display:none"></div>

                    </div> 
                 </div>
            </div>
            <div class="form-group row">
                 <div class="col-lg-4">
                    <div class="form-group"> 
                        {!! Form::label('content_in_english', 'Content (In english)') !!}
                        {!! Form::text('content_in_english',null ,array('class' => 'form-control')) !!}
                        <div class="bg-danger-o-50 py-2 px-4 error_content_in_english col-lg-12" style="display:none"></div>
                        
                    </div> 
                 </div>
                 <div class="col-lg-4">
                    <div class="form-group"> 
                        {!! Form::label('content_in_arabic', 'Content (In arabic)') !!}
                        {!! Form::text('content_in_arabic',null ,array('class' => 'form-control')) !!}
                        <div class="bg-danger-o-50 py-2 px-4 error_content_in_arabic col-lg-12" style="display:none"></div>
                    </div> 
                 </div>
                 <div class="col-lg-4">
                    <div class="form-group"> 
                        {!! Form::label('content_in_french', 'Content (In french)') !!}
                        {!! Form::text('content_in_french',null ,array('class' => 'form-control')) !!}
                        <div class="bg-danger-o-50 py-2 px-4 error_content_in_french col-lg-12" style="display:none"></div>
                    </div> 
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                     <div class="form-group"> 
                        {!! Form::label('link', 'Link',['class' => '']) !!}
                        {!! Form::text('link', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('display_order', 'Display Order',['class' => '']) !!}
                        {!! Form::label('', '*',['style' => 'color:red']) !!}
                        {!! Form::text('display_order',$display_order, ['class' => 'form-control']) !!}
                        <div class="bg-danger-o-50 py-2 px-4 error_display" style="display:none"></div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('status', 'Status') !!}<br/>
                        {!! Form::checkbox('status',1,1) !!}
                        {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                    </div>
                </div>
            </div>       
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary submit_banner" id="save-banner-changes">Validate</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>

   
 {!! Form::close() !!}
  
 
