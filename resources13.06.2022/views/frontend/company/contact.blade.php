<div class="contact-info-details" id="">
	<div class="row mb-4">
		<div class="col-md-4 col-lg-4 col-sm-4 mt-3">
			<label for="Name" class="label-text">@lang('company.contact_name') <span class="required">*</span></label>

			<input type="text" class="form-control" placeholder="" id="" name="name[]" required='required' data-parsley-required-message='@lang("company.contactNameReq")' data-parsley-trigger='change focusout'>
		</div>
		<div class="col-md-4 col-lg-4 col-sm-4 mt-3">
			<label for="Email" class="label-text">@lang('company.contact_email') <span class="required">*</span></label>

			<input type="email" class="form-control" placeholder="" id="" name="email_address[]" required='required' data-parsley-required-message='@lang("company.contactEmailReq")' data-parsley-trigger='change focusout'>
		</div>
		<div class="col-md-4 col-lg-4 col-sm-4 mt-3">
			<label for="mobile" class="label-text">@lang('company.contact_mobile') <span class="required">*</span></label>

			<input type="tel" class="form-control" placeholder="" id="" name="mobile_number[]" required='required' data-parsley-required-message='@lang("company.contactMobileReq")' data-parsley-trigger='change focusout'>
		</div>
		<div class="col-md-4 col-lg-4 col-sm-4 mt-3 ">
			<label for="jobtitle" class="label-text">@lang('company.contact_Job_Title') <span class="required">*</span></label>

			<input type="text" class="form-control" placeholder="" id="" name="jobtitle[]" required='required'data-parsley-required-message='@lang("company.contactJobTitleReq")' data-parsley-trigger='change focusout'>
		</div>
	</div>
	<div class="remove-button">
		<a href="javascript:void(0)" id="" class="common-button btn_remove">{{__('company.removeBtn')}}</a>
	</div>
</div>
