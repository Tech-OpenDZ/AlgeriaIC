<div style="background-color: #ffffff;color:#000000;text-transform: bold; text-shadow: 10px 10px 10px rgb(0 0 0 / 20%);box-shadow: 10px 10px 10px rgb(0 0 0 / 10%); padding:15px">
<form action="{{ route('business-opportunity-store')}}" method="POST" role="form" name="" enctype="multipart/form-data" data-parsley-validate>
    @csrf
    <div class="search-header__elements">
        @if( Session::has( 'success' ))
        <div class="success-alert-msg">
            {{ Session::get( 'success' ) }}
        </div><br>

        @elseif( Session::has( 'error' ))
        <div class="danger-alert-msg col-md-12">
            {{ Session::get( 'error' ) }}
        </div><br>
        @endif
        <div class="row">
            <div class="col-md-2 col-lg-2 col-sm-2 upload-circle-outer col-3">
                <div class="upload-circle">
                    <label for="file-input">
                        <img src="{{ asset('images/plus-circle.svg') }}" class="img-fluid plus-circle">
                    </label>

                    <input id="file-input" type="file" />

                </div>
            </div>
            <div class="col-md-9 col-lg-9 col-sm-9 col-9">

                <div class="upload-wrapper">
                    <a class='choose-file-button' href='javascript:;'>
                    @lang('business_opportunity.choose_logo')
                        <input type="file" id="logo" class="file-choose preview-file-choose @error('logo') is-invalid   @enderror" style="cursor:pointer"  name="logo" size="40" onchange='loadFile(event)' accept=".jpg, .jpeg, .png, .gif" value="{{ old('logo') }}"  data-parsley-required-message='Logo is required' data-parsley-trigger='change focusout' data-parsley-minlength='2' data-parsley-maxlength='190' data-parsley-class-handler='#logo'>
                    </a>
                    &nbsp;
                    <span class='label label-info upload-text' id="image-name"></span>
                    <div class="upload-img-wrapper">
                        <img class='label label-info upload-text w-100' id="upload-file-info">
                    </div>
                </div>
                <p class="upload-text-content mt-3">@lang('business_opportunity.upload_text_content') </p>
                @error('logo')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>

        </div>
            <br>

        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 mt-3">
                <label for="projecttitle" class="label-text">@lang('business_opportunity.project_title') <span class="required">*</span></label>
                <input type="text" placeholder="" id="projecttitle" class="form-control @error('project_title') is-invalid  @enderror" name="project_title" value="{{ old('project_title') }}"  data-parsley-required-message='Project Title is required' data-parsley-trigger='change focusout' data-parsley-minlength='2' data-parsley-maxlength='190' data-parsley-class-handler='#project_title'>
                @error('project_title')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-md-6 col-lg-6 col-sm-6 mt-3">
                <label for="company_name" class="label-text">@lang('business_opportunity.company_name') <span class="required">*</span></label>
                <input type="text" class="form-control @error('company_name') is-invalid  @enderror" placeholder="" id="company_name" name="company_name" value="{{ old('company_name') }}"  data-parsley-required-message='Company Name is required' data-parsley-trigger='change focusout' data-parsley-minlength='2' data-parsley-maxlength='190' data-parsley-class-handler='#company_name'>
                @error('company_name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>

        </div>
            <br>

        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 mt-3">
                <label class="label-text">@lang('business_opportunity.company_presentation_file')</label>
                <label class="form-control choose-file-field">
                    <div style="position:relative">
                        <a class='choose-file-button' href='javascript:;' >
                            @lang('business_opportunity.choose_document')
                            <input type="file" style="cursor:pointer" class="file-choose @error('company_presentation_file') is-invalid  @enderror" name="company_presentation_file" size="40" onchange='$("#upload-file-info_presentation_file").html($(this).val());' accept=".ppt, .pptx, .doc, .docx, .pdf, .xls, .xlsx">

                        </a>
                        <span class='label label-info' id="upload-file-info_presentation_file"></span>
                        <p class="upload-text-content mt-3">@lang('business_opportunity.upload_document_content') </p>

                        
                        @error('company_presentation_file')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </label>

            </div>

            <div class="col-md-6 col-lg-6 col-sm-6 mt-3">
                <label for="contact_person" class="label-text">@lang('business_opportunity.contact_person') <span class="required">*</span></label>
                <input type="text" class="form-control @error('contact_person') is-invalid  @enderror" placeholder="" id="contact_person" name="contact_person" value="{{ old('contact_person') }}" data-parsley-required-message='Contact Person is required' data-parsley-trigger='change focusout' data-parsley-minlength='2' data-parsley-maxlength='190' data-parsley-class-handler='#contact_person'>
                @error('contact_person')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>


        </div>

         <br>

            <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-6 mt-3">
                    <label for="company_email" class="label-text">@lang('business_opportunity.company_email') <span class="required">*</span></label>
                    <input type="text" class="form-control @error('company_email') is-invalid  @enderror" placeholder="" id="company_email" name="company_email" value="{{ old('company_email') }}"  data-parsley-required-message='Email is required' data-parsley-trigger='change focusout' data-parsley-minlength='2' data-parsley-maxlength='190' data-parsley-class-handler='#company_email'>
                    @error('company_email')
                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                    @enderror
                </div>

                <div class="col-md-6 col-lg-6 col-sm-6 mt-3">
                    <label for="company_contact" class="label-text">@lang('business_opportunity.company_contact') <span class="required">*</span></label>
                    <input type="text" class="form-control @error('company_contact') is-invalid  @enderror" placeholder="" id="company_contact" name="company_contact" value="{{ old('company_contact') }}"  data-parsley-required-message='Contact is required' data-parsley-trigger='change focusout' data-parsley-minlength='2' data-parsley-maxlength='190' data-parsley-class-handler='#company_contact'>
                    @error('company_contact')
                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                    @enderror
                </div>


            </div>

            <br>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 mt-3">
                <label for="project_description" class="label-text">@lang('business_opportunity.project_description') <span class="required">*</span></label>
                <textarea class="form-control @error('project_description') is-invalid  @enderror" id="project_description" rows="3" name="project_description" value="{{ old('project_description') }}"  data-parsley-required-message='Project Description is required' data-parsley-trigger='change focusout' data-parsley-minlength='2' data-parsley-maxlength='5000' data-parsley-class-handler='#project_description'>{{ old('project_description') }}</textarea>
                @error('project_description')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>

        </div>

            <br>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 mt-3">
                <label class="label-text">@lang('business_opportunity.image') </label>
                <label class="form-control choose-file-field">
                    <div style="position:relative;">
                        <a class='choose-file-button' href='javascript:;'>
                            @lang('business_opportunity.choose_image')
                            <input type="file" class="file-choose @error('image') is-invalid  @enderror" style="cursor:pointer"  name="image" size="40" onchange='$("#upload-file-info_image").html($(this).val());' accept=".jpg, .jpeg, .png, .gif">
                        </a>
                        <span class='label label-info' id="upload-file-info_image"></span>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                        <p class="upload-text-content mt-3">@lang('business_opportunity.upload_text_content') </p>
                    </div>
                </label>

            </div>

            <div class="col-md-6 col-lg-6 col-sm-6 mt-3 mb-4">
                <label class="label-text">@lang('business_opportunity.documents') </label>
                <label class="form-control choose-file-field">
                    <div style="position:relative;">
                        <a class='choose-file-button' href='javascript:;'>
                            @lang('business_opportunity.choose_document')
                            <input type="file" multiple="multiple" class="file-choose @error('documents') is-invalid  @enderror" style="cursor:pointer"  name="documents[]" onchange='$("#upload-file-info_documents").html($(this).val());' accept=".ppt, .pptx, .doc, .docx, .pdf, .xls, .xlsx">
                            @error('documents.*')

                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </a>
                        <span class='label label-info' id="upload-file-info_documents"></span>
                        <p class="upload-text-content mt-3">@lang('business_opportunity.upload_document_content') </p>
                       
                        &nbsp;
                    </div>
                </label>

            </div>



        </div>

        <br>

        <center> <button type="submit" class="common-button mb-4" style="background-color: #f9b634; border-color: #f9b634">@lang('business_opportunity.add_business_opportunity')</button> </center>
    </div>
</form>
</div>


<script>
    window.ParsleyConfig = {
        errorsWrapper: '<div class="request-form"></div>',
        errorTemplate: '<div class="alert parsley" role="alert"></div>',
        errorClass: 'has-error',
        successClass: 'has-success'
    };
</script>
<script>
    var loadFile = function(event) {
        var imageFile = document.getElementById('upload-file-info');
        imageFile.src = URL.createObjectURL(event.target.files[0]);
        imageFile.onload = function() {
            URL.revokeObjectURL(imageFile.src)
        }
        $('#image-name').text(event.target.files[0].name);
        $('.upload-circle').css('opacity', '0');
    };
</script>

<script src="http://parsleyjs.org/dist/parsley.js"></script>
