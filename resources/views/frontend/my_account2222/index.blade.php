@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('my_account.myAccount') | @lang('news.placeName')</title>
@endsection

@section('content')
    <section class="business-directory-main">
        <div class="news-main-area">
            <div class="discover-algeria">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="discover-algeria__left">
                                <ol class="breadcrumb-area">
                                    <li class="breadcrumb-elements"><a href="#">@lang('my_account.home')</a></li>
                                    <li class="active">@lang('my_account.myAccount')</li>
                                </ol>
                                <div class="msg-sent">
                                    @if(Session::has('success'))
                                    <p class="success-msg" style="position: absolute; top: 20px;">{{ Session::get('success') }}</p>
                                    @endif
                                    @if(Session::has('error'))
                                    <p class="failure-msg" style="top: 15px;">{{ Session::get('error') }}</p>
                                    @endif
                                </div>
                                <div class="title-with-logout mt-3 mb-4">
                                    <h1 class="main-heading ">@lang('my_account.hello') {{$my_data->name}}</h1>
                                    <a href="{{route('customer-logout')}}" class="common-button" onclick="event.preventDefault();document.getElementById('customer_logout_form').submit();">
                                    @lang('navbar.logoutButton')
                                </a>
                                <form action="{{route('customer-logout')}}" id="customer_logout_form" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                </div>
                                <section class="user-account">
                                    <h6 class="main-heading pb-4">@lang('my_account.profile')</h6>
                                    <div class="user-detail">
                                        <form action="{{route('customer-update')}}" method="POST" id="update-user-data-form" name="update-user-data-form">
                                            <div class="row">
                                                @csrf
                                                <div class="col-md-6 col-lg-4 col-sm-6 company-padding">
                                                    <h6 class="main-heading">@lang('my_account.companyName')</h6>
                                                    <p class="name-desc pt-2">{{$parent_data->company_name}}</p>
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-sm-6 company-padding">
                                                    <h6 class="main-heading">@lang('my_account.mainUser') @if($is_parent) <span class="required">*</span><span class="edit-info" id="main-user">@lang('my_account.edit')</span>@endif</h6>
                                                    <p class="name-desc parent-edit-name pt-2"><span class="edit-name">{{$parent_data->name}}</span>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                        @enderror
                                                    </p>

                                                </div>
                                                <div class="col-md-6 col-lg-4 col-sm-6 company-padding">
                                                    <h6 class="main-heading">@lang('my_account.jobTitle') @if($is_parent) <span class="required">*</span><span class="edit-info" id="job-title">@lang('my_account.edit')</span>@endif</h6>
                                                    <p class="name-desc parent-edit-wev-devmanager pt-2"><span class="edit-wev-devmanager">{{$parent_data->job_title}}</span>
                                                        @error('job_title')
                                                        <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                        @enderror
                                                    </p>

                                                </div>
                                                @if(!$is_parent)
                                                <div class="col-md-6 col-lg-4 col-sm-6 company-padding">
                                                    <h6 class="main-heading">@lang('my_account.user')
                                                        <!-- <span class="required">*</span><span class="edit-info" id="user-name">@lang('my_account.edit')</span> -->
                                                    </h6>
                                                    <p class="name-desc parent-edit-username pt-2"><span class="edit-username">{{$my_data->username}}</span>
                                                        @error('username')
                                                        <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                        @enderror
                                                    </p>
                                                </div>
                                                @else
                                                <div class="col-md-6 col-lg-4 col-sm-6 company-padding">
                                                    <h6 class="main-heading">@lang('my_account.email')
                                                        <!-- <span class="required">*</span><span class="edit-info" id="user-email">@lang('my_account.edit')</span> -->
                                                    </h6>
                                                    <p class="name-desc parent-edit-user-email pt-2"><span class="edit-user-email">{{$my_data->email}}</span>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                        @enderror
                                                    </p>

                                                </div>
                                                @endif
                                                <div class="col-md-6 col-lg-4 col-sm-6 company-padding">
                                                    <h6 class="main-heading">@lang('my_account.phone') <span class="required">*</span><span class="edit-info" id="user-phone">@lang('my_account.edit')</span></h6>
                                                    <p class="name-desc parent-edit-user-phone pt-2"><span class="edit-user-phone">{{$my_data->mobile_number}}</span>
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                        @enderror
                                                    </p>

                                                </div>
                                                @if(!$is_parent)
                                                <div class="col-md-6 col-lg-4 col-sm-6 company-padding">
                                                    <h6 class="main-heading">@lang('my_account.email')
                                                        <!-- <span class="required">*</span><span class="edit-info" id="user-email">@lang('my_account.edit')</span> -->
                                                    </h6>
                                                    <p class="name-desc parent-edit-user-email pt-2"><span class="edit-user-email">{{$my_data->email}}</span>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                        @enderror
                                                    </p>

                                                </div>
                                                @endif
                                                <div class="col-md-12 col-lg-12 col-sm-12 sub-detail-pack">
                                                    <div class="row">
                                                            @if($my_data->subscription_id >1 && $parent_data->payment_status == 'completed')
                                                            <?php
                                                                $plan_data->end_date = Carbon\Carbon::parse($plan_data->end_date);
                                                                $format_end_date = clone $plan_data->end_date;
                                                                $format_end_date = Carbon\Carbon::parse($format_end_date->format('Y-m-d'));
                                                                $carbon_date = Carbon\Carbon::parse(Carbon\Carbon::now()->format('Y-m-d'));
                                                            ?>
                                                            @endif
                                                            @if($is_parent)
                                                                <div class="col-md-6 col-lg-4 col-sm-12 company-padding">
                                                                    <h6 class="main-heading">@lang('my_account.subscriptionDetails')</h6>
                                                                    <p class="name-desc pt-2">{{$parent_data->subscription->localeAll[0]->name}} @lang('my_account.pack')</p>
                                                                  <!--  <p class="pack-expiry pt-2 pb-3">
                                                                    @if($my_data->subscription_id >1 && $parent_data->payment_status == 'completed')
                                                                        @if($format_end_date->greaterThan($carbon_date))@lang('my_account.expiresOn')@else @lang('my_account.expiredOn')@endif {{date('d/m/Y',strtotime($plan_data->end_date))}}
                                                                    </p>
                                                                    @endif
                                                                    @if($my_data->subscription_id == 2 || $my_data->subscription_id == 3)
                                                                       
                                                                        @if ($is_plan_confirmed)
                                                                        <div class="renew-buttons">
                                                                            <a href="javascript:void(0);" class="common-button renew-sub mt-2" id="renew-payment-btn">@lang('my_account.renewSubscription')</a>
                                                                            <a href="{{route('upgrade-plan')}}" class="common-button mt-2">@lang('my_account.changePlan')</a>
                                                                        </div>
                                                                        @elseif(!$my_data->payments->isEmpty())
                                                                            @if(($my_data->payments()->latest()->first()->module_type == 'Upgrade Subscription Plan'||$my_data->payments()->latest()->first()->module_type == 'Signup') && $my_data->payments()->latest()->first()->status == 'pending')
                                                                            <p class="pending-subscription">@lang('my_account.pendingConfirmation')</p>
                                                                            @else 
                                                                            <div class="renew-buttons">
                                                                                <a href="javascript:void(0);" class="common-button renew-sub mt-2" id="renew-payment-btn">@lang('my_account.renewSubscription')</a>
                                                                                <a href="{{route('upgrade-plan')}}" class="common-button mt-2">@lang('my_account.changePlan')</a>
                                                                            </div>
                                                                            @endif
                                                                        @else
                                                                            <p class="pending-subscription">@lang('my_account.pendingConfirmation')</p>
                                                                        @endif
                                                                    @elseif($my_data->subscription_id == 1)
                                                                        @if(!$my_data->payments->isEmpty())
                                                                            @if($my_data->payments()->latest()->first()->module_type == 'Upgrade Subscription Plan' && $my_data->payments()->latest()->first()->status == 'pending')
                                                                            <p class="pending-subscription">@lang('my_account.pendingConfirmation')</p>
                                                                            @else 
                                                                            <div class="renew-buttons">
                                                                                <a href="{{route('upgrade-plan')}}" class="common-button mt-2">@lang('my_account.changePlan')</a>
                                                                            </div>
                                                                            @endif
                                                                        @else
                                                                        <div class="renew-buttons">
                                                                        <a href="{{route('upgrade-plan')}}" class="common-button mt-2">@lang('my_account.changePlan')</a>
                                                                        </div>
                                                                        @endif
                                                                       
                                                                    @elseif($my_data->subscription_id == 4)
                                                                        @if ($is_plan_confirmed)
                                                                        <div class="renew-buttons">
                                                                            <a href="javascript:void(0);" class="common-button renew-sub mt-2" id="renew-payment-btn">@lang('my_account.renewSubscription')</a>
                                                                            <a href="{{route('upgrade-plan')}}" class="common-button mt-2">@lang('my_account.changePlan')</a>
                                                                        </div>
                                                                        @elseif(!$my_data->payments->isEmpty())
                                                                            @if(($my_data->payments()->latest()->first()->module_type == 'Upgrade Subscription Plan' || $my_data->payments()->latest()->first()->module_type == 'Signup') && $my_data->payments()->latest()->first()->status == 'pending')
                                                                            <p class="pending-subscription">@lang('my_account.pendingConfirmation')</p>
                                                                            @else 
                                                                            <div class="renew-buttons">
                                                                                <a href="javascript:void(0);" class="common-button renew-sub mt-2" id="renew-payment-btn">@lang('my_account.renewSubscription')</a>
                                                                                <a href="{{route('upgrade-plan')}}" class="common-button mt-2">@lang('my_account.changePlan')</a>
                                                                            </div>
                                                                            @endif
                                                                        @endif
                                                                    @endif  -->
                                                                </div>
                                                                <div class="col-md-6 col-lg-4 col-sm-12 company-padding">
                                                                    <h6 class="main-heading">@lang('my_account.security') <span class="edit-info" id="user-pass">@lang('my_account.edit')</span></h6>
                                                                    <div class="password-old-box">
                                                                       
                                                                        <div class="pass-set mb-2" style="display: none;">
                                                                            <p class="name-desc pt-2">@lang('my_account.oldPassword') <span class="required">*</span></p>
                                                                            <input type="password" class="user-pass-field" id="old-pass" name="old_password"
                                                                            minlength="" required>
                                                                            @error('old_password')
                                                                                <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                                            @enderror
                                                                           
                                                                        </div>
                                                                        <div class="pass-set mb-2" style="display: none;">
                                                                            <p class="name-desc pt-2">@lang('my_account.newPassword') <span class="required">*</span></p>
                                                                            <input type="password" class="user-pass-field" id="new-pass" name="password"
                                                                            minlength="" required>
                                                                            @error('password')
                                                                                <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="pass-set mb-2" style="display: none;">
                                                                            <p class="name-desc pt-2">@lang('my_account.confirmPassword') <span class="required">*</span></p>
                                                                            <input type="password" class="user-pass-field" id="cnf-pass" name="password_confirmation"
                                                                            minlength="" required>
                                                                            @error('password_confirmation')
                                                                                <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-md-6 col-lg-4 col-sm-6 company-padding">
                                                                    <h6 class="main-heading">@lang('my_account.subscriptionDetails')</h6>
                                                                    <p class="name-desc pt-2">{{$parent_data->subscription->localeAll[0]->name}} Pack</p>
                                                                    @if($my_data->subscription_id >1)
                                                                    <p class="pack-expiry pt-2 pb-3"> @if($format_end_date->greaterThan($carbon_date))@lang('my_account.expiresOn')@else @lang('my_account.expiredOn')@endif {{date('d/m/Y',strtotime($plan_data->end_date))}}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6 col-lg-4 col-sm-12 company-padding">
                                                                    <h6 class="main-heading">@lang('my_account.security') <span class="edit-info" id="user-pass">@lang('my_account.edit')</span></h6>
                                                                    <div class="password-old-box">

                                                                        <div class="pass-set mb-2" style="display: none;">
                                                                            <p class="name-desc pt-2">@lang('my_account.oldPassword') <span class="required">*</span></p>
                                                                            <input type="password" class="user-pass-field" id="old-pass" name="old_password"
                                                                            minlength="" required>
                                                                            @error('old_password')
                                                                                <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="pass-set mb-2" style="display: none;">
                                                                            <p class="name-desc pt-2">@lang('my_account.newPassword') <span class="required">*</span></p>
                                                                            <input type="password" class="user-pass-field" id="new-pass" name="password"
                                                                            minlength="" required>
                                                                            @error('password')
                                                                                <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="pass-set mb-2" style="display: none;">
                                                                            <p class="name-desc pt-2">@lang('my_account.confirmPassword') <span class="required">*</span></p>
                                                                            <input type="password" class="user-pass-field" id="cnf-pass" name="password_confirmation"
                                                                            minlength="" required>
                                                                            @error('password_confirmation')
                                                                                <span class="invalid-feedback" role="alert" >{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if($my_data->subscription_id >1)
                                                                <div class="col-md-6 col-lg-4 col-sm-6 company-padding">
                                                                    <h6 class="main-heading">@lang('my_account.accountUsers')</h6>
                                                                    @if(!$child_data->isEmpty())
                                                                        @foreach ($child_data as $customer)
                                                                        <p class="name-desc pt-2">{{$customer->email}}</p>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                                @endif
                                                            @endif
                                                        

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form id="payment-for-subscription" action="{{ route('payment') }}" method="POST" style="display: none;">
                                            @csrf
                                            <input type="text" name="subscription_id" id="subscription_id">
                                        </form>
                                      <!--  @if ($parent_data->payment_status == 'completed' && $is_parent && $my_data->subscription_id >1)
                                        <div class="col-md-12 col-lg-12 col-sm-12 mb-4 company-padding p-0">
                                            <h6 class="main-heading">@lang('my_account.accountUsers') ( <span id="sub-user-count">{{count($child_data)}}</span>/<span id="total-sub-user">{{$parent_data->subscription->no_of_users}}</span> )
                                                <!-- <span class="edit-info" id="remove-edit">@lang('my_account.edit')</span> 
                                            </h6>
                                            <span id="sub-user-list">
                                                @if(!$child_data->isEmpty())
                                                @foreach ($child_data as $customer)
                                                <div class="user-remove-box">
                                                    <p class="name-desc user-mail-width pt-2">{{$customer->email}}</p>
                                                    @if (!$customer->status)
                                                    <span class="red-cross mt-2">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </span>
                                                    @else
                                                    <span class="green-correct mt-2">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </span>
                                                    @endif
                                                    <span><a  data-toggle="modal" data-target="#email-one" href="javascript:void(0);" id='{{$customer->id}}' class="remove-plan change-id-to-remove">@lang('my_account.remove')</a></span>
                                                </div>
                                                @endforeach
                                                @endif
                                            </span>
                                            <div class="modal fade" id="email-one" tabindex="-1" role="dialog" aria-labelledby="email-oneLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="email-oneLabel">@lang('my_account.removeSubUser')</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>@lang('my_account.cnfMSG')</p>
                                                            <form id="remove-sub-user" action="{{ route('customer-remove-sub-user') }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="text" name="id" id="sub-user-id">
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('my_account.no')</button>
                                                            <button type="button" class="btn btn-primary remove-sub-user-button">@lang('my_account.yes')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-email-acct pt-2 mb-2" id="add-new-sub-user">
                                                <input type="email" class="add-user-field user-mail-width" placeholder="abc@gmail.com" id="sub-user-email" name="email" minlength="" required>
                                                <a href="javascript:void(0);" class="add-email ml-3 mr-3" id="add-sub-user">@lang('my_account.add')</a>
                                            </div>
                                            <div id="loading-msg" class="loader-add">
                                                <div class="spinner-border ml-5 mr-5" style="width: 2rem; height: 2rem;" role="status">
                                                    <span class="sr-only">@lang('my_account.loading')</span>
                                                </div>
                                            </div>
                                            <div id="alert-msgs">
                                                <span class="invalid-feedback" id="sub-user-email-error"></span>
                                                <span class="success-alert-msg" id="email-success" style="position: relative;"></span>
                                            </div>
                                            <!-- <div class="buy-more-id mt-4 mb-4 ml-5 mr-5">
                                                <button class="common-button">Buy more</button>
                                            </div> 
                                            <div class="notes-indicator">
                                                <p class="notes-head mt-4 pb-2"> <strong>@lang('my_account.note')</strong> </p>
                                                <p class="d-flex note-green"><span class="green-correct">
												<i class="fa fa-check" aria-hidden="true"></i></span> @lang('my_account.userSignedIn')</p>
                                                <p class="d-flex note-red"><span class="red-cross"><i class="fa fa-times" aria-hidden="true">
												</i></span> @lang('my_account.userSignedNotIn')</p>

                                            </div>
                                        </div>
                                        @endIf -->
                                        <div class="validate-button">
                                            <button type="submit" form="update-user-data-form" id ="update-user-data-form-submit" class="common-button">@lang('my_account.validate')</button>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- left area ends here -->
                    </div>
                    <!-- row ends here -->
                </div>
            </div>
        </div>
        <!-- top left and right area ends here -->
    </section>
@endsection

@section('scripts')
    <!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/front-end/browser-class.js') }}"></script>
    <!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
    <!-- Please keep your own scripts above main.js -->
    <script src="{{ asset('js/front-end/main.js') }}"></script>
    <script>
        $(document).ready(function(){
            if (parseInt($('#sub-user-count').html()) >= parseInt($('#total-sub-user').html())) {
                $('#add-new-sub-user').toggle();
            }

            var errors = <?php echo json_encode((array)$errors->keys()) ?>;

            if (jQuery.inArray('old_password',errors) != -1 || jQuery.inArray('password',errors) != -1) {
                $('#user-pass').trigger('click');
            }

            if (jQuery.inArray('email',errors) != -1) {
                $('#user-email').trigger('click');
            }

            if (jQuery.inArray('mobile_number',errors) != -1) {
                $('#user-phone').trigger('click');
            }

            if (jQuery.inArray('job_title',errors) != -1) {
                $('#job-title').trigger('click');
            }

            if (jQuery.inArray('username',errors) != -1) {
                $('#user-name').trigger('click');
            }

            if (jQuery.inArray('name',errors) != -1) {
                $('#main-user').trigger('click');
            }

            for (let i =0; i<= errors.length; i++) {
                $('input[name='+errors[i]+']').addClass('is-invalid');
            }

            $('#loading-msg').toggle();
            $('#add-sub-user').on('click', function(){
                if ($('#sub-user-email').val() != '') {
                    $('#add-new-sub-user').toggle();
                    $('#loading-msg').toggle();
                    $('#alert-msgs').toggle();
                    $("#email-success").html('');
                    $("#sub-user-email-error").html('');

                    $.ajax({
                        type: "POST",
                        url:"{{route('customer-add-sub-user')}}",
                        data: {
                            _token  : "{{csrf_token()}}",
                            email   : $('#sub-user-email').val()
                        },
                        success: function (data) {
                            var subUserCount = $('#sub-user-count').html();
                            var totalSubUser = $('#total-sub-user').html();
                            $('#alert-msgs').toggle();
                            $('#loading-msg').toggle();
                            $('#add-new-sub-user').toggle();
                            $('#sub-user-list').append('<div class="user-remove-box"><p class="name-desc user-mail-width pt-2">'+$('#sub-user-email').val()+'</p><span class="red-cross mt-2"><i class="fa fa-times" aria-hidden="true"></i></span><span><a data-toggle="modal" data-target="#email-one"  href="javascript:void(0);" class="remove-plan change-id-to-remove" id="'+data.id+'">{{__('my_account.remove')}}</a></span>');
                            subUserCount= parseInt(subUserCount) +1;
                            $('#sub-user-count').html(subUserCount);
                            if (subUserCount >= parseInt(totalSubUser)) {
                                $('#add-new-sub-user').toggle();
                            }
                            $('#sub-user-email').val('');
                            $("#sub-user-email-error").html('');
                            $("#sub-user-email-error").css('display','none');
                            $("#email-success").css('display','block');
                            $("#email-success").html('{{__('my_account.successMSG')}}');
                        },
                        error: function (data) {
                            $('#loading-msg').toggle();
                            $('#add-new-sub-user').toggle();
                            $('#alert-msgs').toggle();
                            $.each( data.responseJSON.errors, function( key, value ) {
                                $("#sub-user-email").addClass('is-invalid');

                                $("#sub-user-email-error").css('display','block');
                                $("#sub-user-email-error").html(value);
                            });
                        }
                    });
                }
            });

                var id = 0;
            $(document).on('click', '.change-id-to-remove', function(){

                id = $(this).attr('id');
                $('#email-one').show();
            });
            $(document).on('click', '.remove-sub-user-button', function(){
                event.preventDefault();
                $('#sub-user-id').val(id);
                $('#remove-sub-user').submit();
            });
            var edit_info = '';
            $(".edit-info").click(function() {
                edit_info = 'edited';
            });
            $("#update-user-data-form-submit").click(function() {
                if (edit_info == 'edited'){

                    $("#update-user-data-form").submit();
                }
            });
            $("#renew-payment-btn").click(function() {
                $('#subscription_id').val('{{Auth::guard('customer')->user()->subscription_id}}');
                $("#payment-for-subscription").submit();
            });
        });
    </script>
@endsection
