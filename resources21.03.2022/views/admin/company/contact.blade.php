<div class="contact_dynamic">
    <div class="form-group row heading">
                <div class="col-lg-11">
                    <h5 class="card-label"  style="width: 100%;padding-top: 15px;">Contact Information</h5>
                </div>
                <div class="col-lg-1">
                    <a href='javascript:void(0);' class='remove_contact_button'><i class='far fa-trash-alt' style='color: #F64E60;margin-top: 13px;'></i></a>
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
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('mobile_number', 'Mobile Number') !!}
                        {!! Form::label('', '*',['style' => 'color:red']) !!}
                        {!! Form::text('mobile_number[]',isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' , [
                        'class' => 'form-control',
                        'required'=>'required',
                        'data-parsley-required-message' => 'The Mobile number  field is required',
                        'data-parsley-trigger'=>'change focusout'
                        ]) !!}
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
                    </div>
                </div>
            </div>
</div>