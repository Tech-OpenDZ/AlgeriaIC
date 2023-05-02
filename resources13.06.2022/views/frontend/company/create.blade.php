@extends('frontend.layouts.master')
@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('company.title') | @lang('company.algeria_invest')</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
<section class="business-opportunities" id="company-section">
    <div class="discover-algeria">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                            <li class="breadcrumb-elements"><a href="{{route('customer-home')}}">@lang('company.home')</a></li>
                            <li class="active">@lang('company.add_company')</li>
                        </ol>
                        @include('frontend.common.top_banner')
                        @if( Session::has( 'success' ))
                        <div class="text-center">
                            <p class="success-alert-msg text-center w-100 ml-auto" style=font-size:14px;>
                                @lang('company.Form_successMessage')
                            </p>
                        </div>
                        @elseif( Session::has( 'error' ))
                        <div class="text-center">
                            <p class="danger-alert-msg text-center w-100 ml-auto" style=font-size:14px;>
                                {{ Session::get( 'error' ) }}
                            </p>
                        </div>
                        @endif
                        <div class="slider-area table-carousel add-comp">
                            <div class="business-titles mt-3 mb-3">
                                <h4 class="main-heading mb-2 add-comp-top-margin">@lang('company.heading')</h4>
                            </div>
                            <div class="business-table business-table-slide-two">
                                <div>
                                    <div class="search-header__elements">
                                        {!! Form::open(array('method'=>'POST','route' => 'companies-store','files'=>true,'id'=>'form','data-parsley-validate')) !!}
                                        <label for="projectLogo" class="label-text">@lang('company.labelLogo') <span class="required">*</span></label>
                                        <div class="row mt-3">
                                            <div class="col-md-2 col-lg-2 col-sm-2 col-3 upload-circle-outer">
                                                <div class="upload-circle">
                                                    <label for="file-input">
                                                        <img src="{{ asset('css/images/plus-circle.svg') }}" class="img-fluid plus-circle">
                                                    </label>
                                                    <input id="file-input" type="file" />
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-lg-9 col-sm-9 col-9">
                                                <div class="upload-wrapper">
                                                    <a class='choose-file-button logo-error' href='javascript:;'>
                                                        @lang('company.file_lableOne')
                                                        <input type="file" class="file-choose preview-file-choose" name="company_logo" size="40" onchange='loadFile(event)' required='required'data-parsley-required-message='@lang("company.logoRequired")' data-parsley-trigger='change focusout'>
                                                    </a>

                                                    &nbsp;
                                                    <span class='label label-info upload-text' id="image-name"></span>
                                                    <div class="upload-img-wrapper">
                                                        <img class='label label-info upload-text w-100' id="upload-file-info">
                                                    </div>

                                                </div>
                                                <p class="upload-text-content mt-3">@lang('company.file_extension')</p>
                                                @error('company_logo')
                                                    <span class="invalid-feedback" role="alert" style="display: block">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-6 mt-3">
                                                <label for="projecttitle" class="label-text">
                                                @lang('company.labelOne') <span class="required">*</span></label>
                                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid  @enderror" placeholder="" id="projecttitle" value="{{ old('company_name') }}" required='required' data-parsley-required-message='@lang("company.companyNameRequired")' data-parsley-trigger='change focusout' data-parsley-minlength='2' data-parsley-maxlength='190'>
                                                @error('company_name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6 mt-3">
                                                <label for="companyname" class="label-text">@lang('company.labelTwo')
                                                <span class="required">*</span></label>
                                                <input type="date" class="form-control @error('creation_date') is-invalid  @enderror" placeholder="" id="start"  max="{{date('Y-m-d')}}" value="{{ old('creation_date') }}" name="creation_date" required='required' data-parsley-required-message='@lang("company.creationDateRequired")' data-parsley-trigger='change focusout'>
                                                @error('creation_date')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <h4 class="main-heading add-comp-top-margin">@lang('company.headingTwo')</h4>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                <label for="telephone" class="label-text">@lang('company.labelThree')
                                                <span class="required">*</span></label>
                                                <input type="tel" class="form-control @error('telephone') is-invalid  @enderror" placeholder="" id="telephones" name="telephone" value="{{ old('telephone') }}" required='required' data-parsley-required-message='@lang("company.telephoneRequired")' data-parsley-trigger='change focusout'>
                                                @error('telephone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                <label for="email" class="label-text">@lang('company.lableFour')
                                                <span class="required">*</span></label>
                                                <input type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="" id="email" value="{{ old('email') }}" name="email" required='required' data-parsley-required-message='@lang("company.emailRequired")' data-parsley-trigger='change focusout'>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                <label for="fax" class="label-text">@lang('company.lableFive')</label>
                                                <input type="tel" class="form-control" placeholder="" id="fax" name="fax" value="{{ old('fax') }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-sm-12 mt-3">
                                                <label for="projectDescAddress" class="label-text">@lang('company.lableSix')
                                                <span class="required">*</span></label>
                                                <textarea class="form-control" id="projectDescAddress" rows="3" name="address" value="{{ old('address') }}" required='required' data-parsley-required-message="@lang('company.addressRequired')" data-parsley-trigger='change focusout'></textarea>
                                                @error('address')
                                                <span class="invalid-feedback" role="alert" style="display:block;">
                                                    {{ $message }}
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                <label for="Website" class="label-text">@lang('company.lableSeven')</label>
                                                <input type="text" class="form-control" placeholder="" id="Website" name="website" value="{{ old('website') }}">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                <label for="facebook" class="label-text">@lang('company.lableEight')</label>
                                                <input type="text" class="form-control" placeholder="" id="facebook" name="facebook" value="{{ old('facebook') }}">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                <label for="YouTube" class="label-text">@lang('company.lableNine')</label>
                                                <input type="text" class="form-control" placeholder="" id="YouTube" name="youtube" value="{{ old('youtube') }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                <label for="Instagram" class="label-text">@lang('company.lableTen')</label>
                                                <input type="text" class="form-control" placeholder="" id="Instagram" name="instagram" value="{{ old('instagram') }}">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                <label for="Twitter" class="label-text">@lang('company.lableEleven')</label>
                                                <input type="text" class="form-control" placeholder="" id="Twitter" name="twitter" value="{{ old('twitter') }}">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                <label for="LinkedIn" class="label-text">@lang('company.lableTwele')</label>
                                                <input type="text" class="form-control" placeholder="" id="LinkedIn" name="linkdeln" value="{{ old('linkdeln') }}">
                                            </div>
                                        </div>
                                        <h4 class="main-heading add-comp-top-margin">@lang('company.HeadingThree')</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4 col-sm-4 mt-3">
                                                <label for="Capital" class="label-text">@lang('company.lableThirteen')</label>
                                                <input type="tel" class="form-control" placeholder="" id="Capital" name="capital" value="{{ old('capital') }}">
                                            </div>
                                            <div class="col-md-6 col-lg-4 col-sm-4 mt-3">
                                                <label for="Staff" class="label-text">@lang('company.lableFourteen')</label>
                                                <input type="text" class="form-control" placeholder="" id="Staff" name="staff" value="{{ old('staff') }}">
                                            </div>
                                            <div class="col-md-6 col-lg-4 col-sm-4 mt-3">
                                                <label for="netsales18" class="label-text">@lang('company.lableFifteen')</label>
                                                <input type="tel" class="form-control" placeholder="" id="netsales18" name="net_sales_2018" value="{{ old('net_sales_2018') }}">
                                            </div>
                                            <div class="col-md-6 col-lg-4 col-sm-4 mt-3">
                                                <label for="netsales19" class="label-text">@lang('company.lableSixteen')</label>
                                                <input type="tel" class="form-control" placeholder="" id="netsales19" name="net_sales_2019" value="{{ old('net_sales_2019') }}">
                                            </div>
                                        </div>
                                        <h4 class="main-heading add-comp-top-margin">@lang('company.lableTwentyFour')</h4>
                                        <div class="form-group row">

                                            <div class="col-md-6 col-lg-6 col-sm-6 mt-3 activity_code_select">
                                                <label class="label-text">@lang('company.lableTwentyFive')
                                                <span class="required">*</span></label>

                                                {!! Form::select('activity_codes[]',$activity_codes_arr,$selected_activated_codes,['class' =>'multi-choice','id'=>'activity_codes','multiple','style'=>'width:300px','required'=>'required','data-parsley-required-message' => __('company.activityCodeRequired'),'data-parsley-trigger'=> 'change focusout']) !!}
                                                @error('activity_codes')
                                                    <span class="invalid-feedback" role="alert" style="display: block">
                                                        {{ $message }}
                                                    </span>
                                                @enderror

                                            </div>

                                        </div>
                                        <div class="contact-info-headings add-comp-top-margin">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12">
                                                    <h4 class="main-heading text-white">@lang('company.lableTwentySix')</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper">
                                            <div class="add-pro-section" id="product_dynamic_field">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 col-12 mt-3">
                                                        <label class="label-text">@lang('company.lableTwentySeven')</label>
                                                        <select class="form-control form-br" style="100%" name="product_name[]">
                                                            <option></option>
                                                            @foreach($product_arr as $key=>$value)
                                                            <option value="{{$key}}">{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!-- <textarea name="description[]" class="form-control" id="projectdescription"
                                                                rows="3"></textarea> -->
                                                    </div>
                                                    <div class="col-md-12 col-lg-12 col-sm-12 col-12 mt-3">
                                                        <label class="label-text product-preview-part">@lang('company.lableTwentySeven')</label>
                                                        <div class="to-display-img">
                                                            <span class="preview-img-section" id="image-preview0"></span>
                                                        </div>
                                                        <label class="form-control field filesfield">
                                                            <div class="field" id="filesfield">
                                                                <button class="file-for-button">
                                                                    <div class="choose-btn-file">
                                                                        <input type="file" name="product_image[0][]" id="files" class="hide_file gallery_input" data-id="0" multiple >{{__('company.chooseFiles')}}
                                                                    </div>
                                                                </button>

                                                                <input type="hidden" name="product_image_removed[0]" id="removed_image0" class="removed_image">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="adding-buttons">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-6">
                                                            <div class="add-more-button mt-3">
                                                                <a href="javascript:void(0)" id="add_more_product" class="common-button pt-2" >@lang('company.add_more')</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-6">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- dynamic contact info structure starts here -->
                                        <div class="contact-info-headings add-comp-top-margin">
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8 col-7">
                                                    <h4 class="main-heading text-white">@lang('company.contact_heading')</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contact-wrapper">
                                            <div class="contact-info-details" id="dynamic_field">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                        <label for="Name" class="label-text">@lang('company.contact_name') <span class="required">*</span></label>

                                                        <input type="text" class="form-control @error('name.*') is-invalid  @enderror" name="name[]" placeholder="" id="name"  required='required' data-parsley-required-message='@lang("company.contactNameReq")' data-parsley-trigger='change focusout'>
                                                        @error('name.*')
                                                        <span class="invalid-feedback" role="alert" style="display:block;">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                        <label for="Email" class="label-text">@lang('company.contact_email') <span class="required">*</span></label>

                                                        <input type="email" class="form-control @error('email_address.*') is-invalid  @enderror" name="email_address[]" placeholder="" id="Email"  required='required' data-parsley-required-message='@lang("company.contactEmailReq")' data-parsley-trigger='change focusout'>
                                                        @error('email_address.*')
                                                        <span class="invalid-feedback" role="alert" style="display:block;">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 col-lg-4 col-sm-4 mt-3">
                                                        <label for="mobile" class="label-text">@lang('company.contact_mobile') <span class="required">*</span></label>

                                                        <input type="tel" class="@error('mobile_number.*') is-invalid  @enderror form-control" placeholder="" id="mobile" name="mobile_number[]"  required='required' data-parsley-required-message='@lang("company.contactMobileReq")' data-parsley-trigger='change focusout'>
                                                        @error('mobile_number.*')
                                                        <span class="invalid-feedback" role="alert" style="display:block;">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 col-lg-4 col-sm-4 mt-3 ">
                                                        <label for="jobtitle" class="label-text">@lang('company.contact_Job_Title') <span class="required">*</span></label>

                                                        <input type="text" class="form-control @error('jobtitle.*') is-invalid  @enderror" placeholder="" id="jobtitle" name="jobtitle[]"  required='required'data-parsley-required-message='@lang("company.contactJobTitleReq")' data-parsley-trigger='change focusout'>
                                                        @error('jobtitle.*')
                                                        <span class="invalid-feedback" role="alert" style="display:block;">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="adding-buttons">
                                                    <div class="row">
                                                       <div class="col-md-6 col-sm-6 col-6">
                                                            <div class="add-more-button mt-5">
                                                                <a href="javascript:void(0)" id="add_more" class="common-button">@lang('company.Add_more')</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-6">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="common-button mt-4 mb-4">@lang('company.submit_button')</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left area ends here -->
                @include('frontend.common.right_sidebar')
            </div>
            <!-- row ends here -->
        </div>
    </div>
</section>
@endsection
@section('modals')
<div class="modal" id="addcompnaymodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body mt-4">
                <div class="msg-sent text-center">
                    <i class="fa fa-check-circle-o done-right" aria-hidden="true"></i>
                    <strong><h6 class="main-heading text-center mt-4 mb-3">@lang('company.success')</h6></strong>
                    <p class="sub-heading mb-4">@lang('company.success_message')</p>
                    <button type="button" class="btn btn-success mb-4" id="close-success-compnay-modal" data-dismiss="modal">@lang('company.ok')</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/front-end/browser-class.js') }}"></script>
<!-- <script src="{{ asset('js/front-end/select2.js') }}"></script> -->
<!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>

<!-- Please keep your own scripts above main.js -->
<script>
    window.ParsleyConfig = {
        errorsWrapper: '<div class="request-form"></div>',
        errorTemplate: '<div class="alert  parsley" role="alert"></div>',
        errorClass: 'has-error',
        successClass: 'has-success'
    };
</script>
<script src="http://parsleyjs.org/dist/parsley.js"></script> 
@if(Session::has('showSuccessModel'))
    @php
        Session::forget('showSuccessModel');
    @endphp
    <script>
        $(function(){
            $('#addcompnaymodal').css("opacity","1");
            $('#algeria-main-section').css("opacity","0.5");
            $("#addcompnaymodal").show();
            $("#close-success-compnay-modal").click(function(){
                $('#algeria-main-section').css("opacity","1");
                $("#addcompnaymodal").hide();
            });
            
        });
    </script>
@endif
<script>
    $(document).ready(function() {
        var storedFiles = [];
        var removed_file = [];
        function PreviewImage(e){
            var input = e.target;
            var targetID = e.target.id;
            var preview_image = $("#image-preview"+targetID);
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var parentId = $("#"+targetID).data('id');
            filesArr.forEach(function(f) {
                var fileReader = new FileReader();
                storedFiles.push(f);
                fileReader.onload = function(e) {
                    $("<span class=\"pip\">" +"<img  class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" + "<br/><span class='removeImage remove' data-file='"+f.name+"' data-id='"+parentId+"'>"+'{{__('company.removeBtn')}}'+"</span>" +"</span>").insertBefore("#image-preview"+parentId);
                }
                fileReader.readAsDataURL(f);
            });
        }

        $("#form").on('change', '.gallery_input', PreviewImage);
        $("#form").on('click', '.removeImage', function() {
            var file = $(this).data("file");
            var ID = $(this).data('id');
            var removed_image_list=[];
            for (var i = 0; i < storedFiles.length; i++) {
                if (storedFiles[i].name === file) {
                    if(removed_file.hasOwnProperty(ID)){
                        removed_image_list = removed_file[ID];
                    }
                    removed_image_list.push(storedFiles[i].name);
                    removed_file[ID] = removed_image_list;
                    console.log(removed_file);
                  break;
                }
            }
            $(this).parent(".pip").remove();
            console.log(storedFiles);
            $("#removed_image"+ID).val(removed_file[ID]);
            console.log($("#removed_image"+ID).val());
        });

        // ----Add More of contact information------
        var i = 1;
        var contact_data = `{!! $contact_view !!}`;
        $('#add_more').click(function() {
            i++;
            $('.contact-wrapper').append(contact_data);
        });

        $(document).on('click', '.btn_remove', function(e) {
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            i--;
        });

        var j = 0;
        $('#add_more_product').click(function() {
            j++;
            $('.product-wrapper').append('<div class="add-pro-section" id="productrow' + j + '"><div class="row"><div class="col-md-12 col-lg-12 col-sm-12 col-12 mt-3"><label class="label-text">'+'{{__('company.lableTwentySeven')}}'+'</label><select class="form-control form-br" style="100%" name="product_name[]"><option></option>@foreach($product_arr as $key=>$value)<option value="{{$key}}">{{$value}}</option>@endforeach</select></div><div class="col-md-12 col-lg-12 col-sm-12 col-12 mt-3"><label class="label-text product-preview-part">'+'{{__('company.lableTwentySeven')}}'+'</label><div class="to-display-img"><span class="preview-img-section" id="image-preview'+j+'"></span></div><label class="form-control field filesfield'+j+'"><div class="field"><button class="file-for-button"><div class="choose-btn-file"><input type="file" id="files'+ j +'" class="hide_file gallery_input" name="product_image[' + j + '][]" data-id="'+ j +'" multiple />'+'{{__('company.chooseFiles')}}'+'</div></button> <input type="hidden" name="product_image_removed[' + j + ']" id="removed_image'+ j +'" class="removed_image"></div></label></div></div><div class="adding-buttons"><div class="row"><div class="col-md-12 col-sm-12 col-12"><div class="remove-button"><a href="javascript:void(0)" id="' + j + '" class="common-button product_remove">'+'{{__('company.removeBtn')}}'+'</a></div></div></div></div></div>');
        });

        $(document).on('click', '.product_remove', function() {
            var productId = $(this).attr("id");
            console.log(productId);
            $('#productrow' + productId +'' ).remove();
        });
        // ACTIVITY CODES

        var activity_codes = <?php echo json_encode(array_keys((array)$activity_codes_arr), true); ?>;
        var KTSelect2 = function() {
            var demos = function() {
                $('#activity_codes').select2({
                    placeholder: '{{__('company.chooseActivityCodes')}}',
                });
            };
            return {
                init: function() {
                    demos();
                }
            };
        }();
        KTSelect2.init();
        // Selecting all activity codes.
        $('#select_all_activity_codes').click(function() {

            $('#activity_codes').val(activity_codes);
            $('#activity_codes').select2({
                placeholder: '{{__('company.chooseActivityCodes')}}',
            });
        });

        // Removing all activity codes.
        $('#remove_all_activity_codes').click(function() {

            $('#activity_codes').val([]);
            $('#activity_codes').select2({
                placeholder: '{{__('company.chooseActivityCodes')}}',
            });
        });

    });
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script> -->
<script src="{{ asset('js/front-end/main.js') }}"></script>
<script>
    var loadFile = function (event) {
        var imageFile = document.getElementById('upload-file-info');
        imageFile.src = URL.createObjectURL(event.target.files[0]);
        imageFile.onload = function () {
            URL.revokeObjectURL(imageFile.src)
        }
        $('#image-name').text(event.target.files[0].name);
        $('.upload-circle').css('opacity', '0');
    };
</script>
<script>
    $(".remove").click(function(){
        $(this).parent(".pip").remove();
        $('#files').val("");
      });
</script>
@endsection
