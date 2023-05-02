@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('signup.signup') | @lang('news.placeName')</title>
@endsection

@section('content')
    <section class="signup-container" id="signup-form-page">
        <div class="container">
            <br>
            <div id="msform">
               <!-- <ul id="progressbar" class="signup-container__elements">
                    <li id="account" class="signup-process active"><p class="ml-2 dotted-line text-left">@lang('signup.packageSelection')</p></li>
                    <li id="personal" class="signup-process"><p class="ml-2 dotted-line text-left">@lang('signup.registrationForm')</p></li>
                    <li id="payment" class="signup-process"><p class="ml-2 dotted-line text-left">@lang('signup.modeOfPayment')</p></li>
                    <li id="confirm" class="signup-process"><p class="ml-2 dotted-line text-left">@lang('signup.useYourAccount')</p></li>
                </ul> <!-- fieldsets -->
                
                <fieldset>
                    <div class="form-card mb-4">
                       <!-- <h4 class="main-heading plan-main-heading mb-3"> @lang('signup.choosePlan')</h4> -->
                        <!-- <p class="mb-4"> @lang('signup.planDescription')</p> -->
                        <div class="alert-msg-box" id="alert_subscription">
                            <p class="danger-alert-msg" id="alert_subscription_msg">@lang('signup.subscriptionPlanError')</p>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                @php
                                    $classVal = '';
                                    $count = 1;
                                    $footerDataArr = [];
                                @endphp
                                
                                @foreach($subscriptions as $subscription)

                                <div class="col-md-3 col-lg-3 col-sm-6 mt-3">
                                  <a href="#subscription_next_button_main">
                                    @php
                                        if ($count == 2) {
                                            $classVal = ' sub-box-two yellow-sub-box';
                                            $footerDataArr[] = '<!-- <p class="mt-2"><span class="basic-user">*'.$subscription->localeAll[0]->name.':</span> '.$subscription->no_of_users .' '. __('signup.basicQuote').'</p> -->';
                                        }
                                        elseif ($count == 3) {
                                            $classVal = ' sub-box-three green-sub-box';
                                            $footerDataArr[] = '<p class="mt-2"><span class="advanced-user">*'.$subscription->localeAll[0]->name.':</span> '.$subscription->no_of_users .' '. __('signup.advancedQuote').'</p>';
                                        }
                                        elseif ($count == 4) {
                                            $classVal = ' sub-box-four red-sub-box';
                                            $footerDataArr[] = '<p class="mt-2"><span class="premium-user">*'.$subscription->localeAll[0]->name.':</span> '.$subscription->no_of_users .' '. __('signup.premiumQuote').'</p>';
                                        }
                                        else {
                                            $classVal = ' sub-box-one grey-sub-box';
                                        }
                                        $count++;
                                    @endphp
                                    <div class="subscription-box{{$classVal}} {{$loop->first ? 'planselected' : ''}}" id="subscription-box-{{$subscription->id}}">
                                        <h4 class="main-heading box-heading mb-2" style="text-align:center">Formule D'abonnement</h4> 
                                        <p class="plan-detail pb-2"><!-- {{ number_format($subscription->price_dzd, 2) }} --> 49 900.00 @lang('signup.dzd'){{'/'.__('signup.year').''}}</p>
                                        <span id="selected-dzd-price-subscription-box-{{$subscription->id}}" style="display:none;">{{ $subscription->price_dzd }}</span>
                                        <span id="selected-usd-price-subscription-box-{{$subscription->id}}" style="display:none;">{{ $subscription->price_dollar }}</span>
                                        <span id="selected-euro-price-subscription-box-{{$subscription->id}}" style="display:none;">{{ $subscription->price_euro }}</span>
                                        @php
                                            $pervModule = '';
                                            $currModule = '';
                                            $moduleCount = 1;
                                        @endphp
                                        @foreach($subscription->permissions as $permission)
                                            @php
                                                $currModule = $permission->localeAll[0]->module;
                                            @endphp
                                            @if ($pervModule != $currModule)

                                                <p class="plan-head-grey pt-{{($moduleCount ==1 )? '4': '3'}} pb-2">{{$currModule}}</p>
                                                @php
                                                    $pervModule = $currModule;
                                                    $moduleCount ++;
                                                @endphp
                                            @endif
                                                <p class="pb-2">{{$permission->localeAll[0]->value}}</p>
                                        @endforeach

                                        @if($loop->first)
                                            @php
                                            $checked ='checked';
                                            @endphp
                                        @else
                                            @php
                                            $checked ='';
                                            @endphp
                                        @endif
                                        <div class="choose-box d-flex justify-content-center">
                                            <input id="subscription_id_{{$subscription->id}}" type="radio" name="subscription_id" value="{{$subscription->id}}" $checked/>
                                            <label class="plan-select ? 'choose' : ''}}" id="choose-button-subscription-box-{{$subscription->id}}">@lang('signup.chooseButton')</label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                    </a>
                            </div>
                            <div class="user-plan-detail pt-4 pb-3">
                                @foreach($footerDataArr as $footerData)
                                {!! $footerData !!}
                                @endforeach
                            </div>

                            <div class="signup-form-area__elements">
                                <div class="privacy-policy-grid privacy-buttons">
                                    <div class="row">
                                       <div class="col-lg-6 offset-lg-3 offset-sm-0">
                                       <center>  <ul class="privacy-policy-grid__elements">
                                               <!--  <li class="mt-3"><a target="_blank" href="{{ route('privacy-policy') }}" class="pricay-btn">@lang('signup.privacyPolicy')</a></li> -->
                                                <li class="mt-3"><a target="_blank" href="{{ route('legal-notice') }}" class="pricay-btn">@lang('signup.legalNotices')</a></li>
                                                <li class="mt-3"><a target="_blank" href="{{ route('terms-of-service')}}" class="pricay-btn">@lang('signup.termsOfServices') </a></li>
                                            </ul> </center>
                                            
                                        </div> 
                                        <div class="col-lg-3">

                                            <p class="i2b">@lang('signup.i2b') <a href="#"><img src="{{ asset('css/images/i2b-big.svg') }}" alt="i2b" class="img-fluid ml-2"></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="subscription_next_button" class="register register-button action-button">@lang('signup.nextButton') </button>
                    
                    <button type="button" id="subscription_next_button_main" class="register register-button next action-button next-button" style="display:none">@lang('signup.nextButton') </button>
                </fieldset>
                <fieldset id="signup-form-fieldset">
                    <div class="form-card">
                        <div class="signup-form-area">
                            <div class="container">
                                <div class="signup-form-area__elements text-left">
                                    <h4 class="main-heading mb-3 signup-heading">@lang('signup.signup')</h4>
                                    <p class="mb-4">@lang('signup.lorem')</p>
                                    <div class="row">
                                        
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <label for="name" class="label-text">@lang('signup.nameLabel') <span class="required">*</span></label>
                                            <input type="text" class="form-control" placeholder="" id="name" name="name">
                                            <span class="invalid-feedback" id="name-validation-error" role="alert"></span>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <label for="companyName" class="label-text">@lang('signup.companyNameLabel') <span class="required">*</span></label>
                                            <input type="text" class="form-control" placeholder="" id="companyName" name="companyName">
                                            <span class="invalid-feedback" role="alert" id="companyName-validation-error">
                                            </span>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <label for="address" class="label-text">@lang('signup.companyAddressLabel') <span class="required">*</span></label>
                                            <input type="text" class="form-control" placeholder="" id="address" name="address">
                                            <span class="invalid-feedback" role="alert" id="address-validation-error">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <label for="jobTitle" class="label-text"> @lang('signup.jobTitleLabel') <span class="required">*</span></label>
                                            <input type="text" class="form-control" placeholder="" id="jobTitle" name="jobTitle">
                                            <span class="invalid-feedback" role="alert" id="jobTitle-validation-error">
                                            </span>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <label for="phone" class="label-text">@lang('signup.mobileNumberLabel') <span class="required">*</span></label>
                                            <input type="text" class="form-control" placeholder="" id="phone" name="phone">
                                            <span class="invalid-feedback" role="alert" id="phone-validation-error">
                                            </span>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <label for="email_customer" class="label-text">@lang('signup.emailAddressLabel') <span class="required">*</span></label>
                                            <input type="email" class="form-control" placeholder="" id="email_customer" name="email_customer">
                                            <span class="invalid-feedback" role="alert" id="email_customer-validation-error">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <label for="username" class="label-text"> @lang('signup.userNameLabel') <span class="required">*</span></label>
                                            <input type="text" class="form-control" placeholder="" id="username" name="username">
                                            <span class="invalid-feedback" role="alert" id="username-validation-error">
                                            </span>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <label for="password" class="label-text">@lang('signup.passwordLabel') <span class="required">*</span></label>
                                            <input type="password" class="form-control" placeholder="" id="password" name="password"> <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span> 
                                            <span class="invalid-feedback" role="alert" id="password-validation-error">
                                            </span>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <label for="password" class="label-text"> @lang('signup.confirmPasswordLabel') <span class="required">*</span></label>
                                            <input type="password"  class="form-control" placeholder="" id="password_confirmation" name="password_confirmation"> <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            <span class="invalid-feedback" role="alert" id="password_confirmation-validation-error">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-check mb-2 mr-sm-2">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="general_condition" id="general_condition">
                                        <p class="label-text-check pt-1">@lang('signup.iAccept') <a href="{{route('terms-of-service')}}" target="_blank" class="label-text-check-anchor">@lang('signup.generalConditions')</a> </p>
                                        <span class="invalid-feedback" role="alert" id="general_condition-validation-error">
                                        </span>
                                        </label>
                                    </div>
                                    <div class="form-check mb-2 mr-sm-2">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="promotions" id="promotions">
                                        <p class="label-text-check pt-1">@lang('signup.checkPromotions') </p>
                                        </label>
                                    </div>
                                    <div class="privacy-policy-grid">
                                        <div class="row">
                                            <div class="col-lg-6 offset-lg-3 offset-sm-0">
                                                <ul class="privacy-policy-grid__elements">
                                                    <!-- <li><a target="_blank" href="{{ route('privacy-policy') }}" class="pricay-btn">@lang('signup.privacyPolicy')</a></li> -->
                                                    <li><a target="_blank" href="{{ route('legal-notice') }}" class="pricay-btn">@lang('signup.legalNotices')</a></li>
                                                    <li><a target="_blank" href="{{ route('terms-of-service')}}" class="pricay-btn">@lang('signup.termsOfServices') </a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <p class="i2b">@lang('signup.i2b')
                                                    <a href="#">
                                                        <img src="{{ asset('css/images/i2b-big.svg') }}" alt="i2b" class="img-fluid ml-2">
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>

                    
                $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
            input.attr("type", "text");
            } else {
            input.attr("type", "password");
            }
            });

            $(".toggle-password_confirmation").click(function() {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password_confirmation") {
                input.attr("type", "text");
                } else {
                input.attr("type", "password_confirmation");
                }
                });



</script>


<style>
        .field-icon {
        float: right;
        padding-right:25px;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        }
input{
    text-transform: none!important;

}
        
</style>
                    <!-- <button type="button" name="previous" class="previous action-button-previous">@lang('signup.previousButton')</button> -->
                    <button type="button" class="action-button button-reg" id="register_button">@lang('signup.registerLabel')</button>
                    <button type="button" class="next action-button button-reg" id="register_button_main">@lang('signup.registerLabel')</button>
                </fieldset>
                <fieldset>
                    <div class="form-card">
                        <div class="signup-form-area text-left">
                            <div class="">
                                <h4 class="main-heading"> @lang('signup.selectPaymentMethod')</h4>
                                <p class="mt-3"> @lang('signup.paymentMethodHeader')</p>
                                <div class="alert-msg-box" id="paymentMethodAlert">
                                    <p class="danger-alert-msg" id="paymentMethodAlert_message"></p>
                                </div>
                                <div class="signup-form-area__elements pt-4">
                                    <div class="radio-buttons-area">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="radio-inline d-flex align-items-center">
                                                    <input type="radio" name="company_type" value="algerian" checked><h4 class="sub-heading ml-2"> @lang('signup.algerianCompanies')</h4>
                                                </label>
                                            </div>

                                            <div class="col-md-8">
                                                <label class="radio-inline d-flex align-items-center">
                                                    <input type="radio" name="company_type" value="foreign"><h4 class="sub-heading ml-2"> @lang('signup.nonAlgerianCompanies')</h4>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mode-selection">
                                        <div class="mod-selection__top">
                                            <h4 class="sub-heading-two mt-3 mb-2"> @lang('signup.offlineMode')</h4>
                                            <ul class="nav nav-pills mb-3 mode-selection__elements" id="pills-tab" role="tablist">
                                                <li class="nav-item not-allowed">
                                                    <label class="nav-link offline-mode-box">
                                                    <input id="pills-cheque-tab" type="radio" name="chooseOffline" value="cheque" >
                                                    <span class="cheque">@lang('signup.cheque')</span></label>
                                                </li>
                                                <li class="nav-item not-allowed">
                                                    <label class="nav-link offline-mode-box" id="bankTransferNav">
                                                        <input id="pills-banktransfer-tab" type="radio" name="chooseOffline" value="bankTransfer">
                                                        <span class="bank-transfer">
                                                            @lang('signup.bankTransfer')
                                                        </span>
                                                    </label>
                                                </li>
                                                <li class="nav-item not-allowed">

                                                    <label class="nav-link offline-mode-box">
                                                        <input id="pills-cash-tab" type="radio" name="chooseOffline" value="cash" >
                                                        <span class="cash">
                                                        @lang('signup.cash')
                                                        </span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="mod-selection__mid">
                                            <h4 class="sub-heading-two mt-4 mb-2"> @lang('signup.onlineMode')</h4>
                                            <ul class="nav nav-pills mb-3 mode-selection__elements" id="pills-tab" role="tablist">
                                                <li class="nav-item not-allowed">
                                                    <label class="nav-link offline-mode-box card-list disabled">
                                                        <input id="pills-credit-card-tab" type="radio" name="chooseOnline" value="creditCard" disabled>
                                                        <span class="credit-card"> @lang('signup.creditCard')</span>
                                                    </label>
                                                </li>
                                                <li class="nav-item not-allowed">
                                                    <label class="nav-link offline-mode-box card-list disabled">
                                                        <input id="pills-debit-card" type="radio" name="chooseOnline" value="debitCard" disabled>
                                                        <span class="debit-card"> @lang('signup.debitCard')</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mod-selection__bottom">
                                            <h4 class="sub-heading-two mt-4 mb-2">@lang('press_review.selectCurrency')</h4>
                                            <!-- <div class="row">
                                                <div class="col-md-3 col-lg-3 col-sm-4">
                                                    <select name="currency" id="currency" class="language-button">
                                                        <option id="data-dzd" data-key="" value="dzd">@lang('signup.dzd')</option>
                                                        <option id="data-usd" data-key="" value="usd">@lang('signup.usd')</option>
                                                        <option id="data-euro" data-key="" value="euro">@lang('signup.euro')</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-9 col-lg-9 col-sm-8 currency-data">
                                                    <h6 class="sub-heading">

                                                        <input type="hidden" id="currency-value" name="price">
                                                        <span class="" id="currency-value-span"></span>
                                                        <span class="" id="currency-unit">@lang('signup.dzd')</span>
                                                    </h6>
                                                </div>
                                            </div> -->

                                            <ul class="currency-detail mode-selection__elements" id="">
                                                <li>
                                                    <select name="currency" id="currency" class="language-button">
                                                        <option id="data-dzd" data-key="" value="dzd">@lang('signup.dzd')</option>
                                                        <option id="data-usd" data-key="" value="usd">@lang('signup.usd')</option>
                                                        <option id="data-euro" data-key="" value="euro">@lang('signup.euro')</option>
                                                    </select>
                                                </li>
                                                <li class="currency-display">
                                                    <h6 class="currency-text">
                                                        <input type="hidden" id="currency-value" name="price">
                                                        <span class="" id="currency-value-span"></span>
                                                        <span class="" id="currency-unit">@lang('signup.dzd')</span>
                                                    </h6>
                                                </li>
                                            </ul>
                                            <p class="mt-4 mb-2 notice"> @lang('signup.notice')</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <input type="button" name="previous" class="previous action-button-previous" value=" @lang('signup.previousButton')" />  -->
                    <button type="submit" class="action-button continue" id="continue_button">@lang('signup.continue')</button>
                    <button type="submit" class="next action-button continue" id="continue_button_main">@lang('signup.continue')</button>
                </fieldset>
                <fieldset>
                    <div class="form-card mb-5">
                        <div class="success-msg-box">

                            <h4 class="main-heading-two mt-4 mb-2 text-center">@lang('signup.successMessage')</h4>

                            <p class="sub-heading mt-4 mb-4 text-center">
                                <span id="success-signup-content">
                                </span>
                                <br/>
                                <span id="success-signup-content-two">
                                </span>
                            </p>
                        </div>

                        <!-- <input type="button" name="next" class="register action-button" value="Login"/> -->
                        <a href="#"  data-toggle="modal" data-target=".bd-example-modal-lg" class="action-button" id="login-button-for-modal">@lang('signup.login')</a>

                    </div>
                </fieldset>
            </div>
        </div>
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
        var signup_success_content = ('{{$email_activation}}' !== '') ?`@lang('signup.successActivationContent')` : `@lang('signup.successContent')`;
        var signup_success_content_next = `@lang('signup.successContentNext')`;

        $(document).ready(function(){

            $('#currency-value').val($('#selected-dzd-price-subscription-box-2').html());
            $('#currency-value-span').html($('#selected-dzd-price-subscription-box-2').html());
            $('#data-dzd').attr('data-key',$('#selected-dzd-price-subscription-box-2').html());
            $('#data-usd').attr('data-key',$('#selected-usd-price-subscription-box-2').html());
            $('#data-euro').attr('data-key',$('#selected-euro-price-subscription-box-2').html());
            if ('{{$email_activation}}' !== '') {

                $("#subscription_next_button_main").trigger('click');
                $('#account').attr('id','selected_account');
                $('#selected_account').addClass("active tick");

                $('#register_button_main').trigger('click');
                $('#personal').addClass('active tick');
                $('#personal').attr('id', 'personal1');

                $('#continue_button_main').trigger('click');
                $('#payment').addClass("active tick");
                $('#payment').attr('id', 'payment1');

                $('#signup-form-fieldset').toggle();
                $("#continue_button_main").trigger('click');
                $("#success-signup-content").html(signup_success_content);
            }
            else {

                $('#alert_subscription').toggle();
                $('#alert_registration').toggle();
                $('#subscription_next_button').toggle();
                $('#register_button_main').toggle();
                $('#continue_button_main').toggle();
                $('#paymentMethodAlert').toggle();
                $('#login-button-for-modal').toggle();
            }

            $(".subscription-box").on("click", function(){
                var subscription_box = $(this).attr('id');
                $('#subscription_next_button').css('display','none');
                $('#subscription_next_button_main').css('display','');
                $('#subscription-box-'+subscription_box).toggleClass("planselected");
                $('.plan-select').removeClass('choose');
                $('#choose-button-'+subscription_box).toggleClass("choose");
                $('#alert_subscription').css('display','none');
                $('#currency-value').val($('#selected-dzd-price-'+subscription_box).html());
                $('#currency-value-span').html($('#selected-dzd-price-'+subscription_box).html());
                $('#data-dzd').attr('data-key',$('#selected-dzd-price-'+subscription_box).html());
                $('#data-usd').attr('data-key',$('#selected-usd-price-'+subscription_box).html());
                $('#data-euro').attr('data-key',$('#selected-euro-price-'+subscription_box).html());
            });
        });

        $('#subscription_next_button_main').click(function(){

            $('#account').attr('id','selected_account');
            $('#selected_account').addClass("active tick");
            $("html, body").animate({scrollTop: 0 }, 0);
        });

        $('#subscription_next_button').click(function(){
            if ($("input[name='subscription_id']:checked").val() == undefined) {
                $("html, body").animate({scrollTop: 0 }, 0);
                $('#alert_subscription').css('display', '');
            }
        });
        $(document).on('click','#register_button', function(e){
            addLoader(true);
            e.preventDefault();
            $(".invalid-feedback").css('display','none');
            $(".invalid-feedback").html('');
            $(".form-control").removeClass('is-invalid');
            var register_text = $('#register_button').html();
            $('#register_button').html('Loading...');
            $.ajax({
                url  : "{{ route('customer-store')}}",
                type : "POST",
                data : {
                    _token                  : "{{csrf_token()}}",
                    subscription_id         : $("input[name='subscription_id']:checked").val(),
                    name                    : $('#name').val(),
                    companyName             : $('#companyName').val(),
                    address                 : $('#address').val(),
                    jobTitle                : $('#jobTitle').val(),
                    phone                   : $('#phone').val(),
                    email_customer          : $('#email_customer').val(),
                    username                : $('#username').val(),
                    password                : $('#password').val(),
                    password_confirmation   : $('#password_confirmation').val(),
                    general_condition       : ($('#general_condition').is(":checked")) ? $('#general_condition').is(":checked") : '',
                    promotions              : ($('#promotions').is(":checked")) ? 1 : '',
                },
                success : function (data)
                {
                    addLoader(false);
                    $("html, body").animate({scrollTop: 0 }, 0);
                    if(data.success){
                        $('#personal').addClass('active tick');
                        $('#personal').attr('id', 'personal1');
                        if($("input[name='subscription_id']:checked").val() == 1) {
                            $("#continue_button").trigger('click');
                        }
                        else {
                            $('#register_button').html(register_text);
                            $('#bankTransferNav').addClass("active");
                            $("#pills-banktransfer-tab").prop("checked", true);
                            $("#register_button_main").trigger('click');
                        }
                    }
                },
                error : function(data) {
                    addLoader(false);
                    $("html, body").animate({scrollTop: 0 }, 0);
                    $('#register_button').html(register_text);
                    $(".invalid-feedback").css('display','');
                    $.each( data.responseJSON.errors, function( key, value ) {
                        $("#"+key).addClass('is-invalid');
                        $("#"+key+'-validation-error').html(value);
                    });
                }
            });
        });

        $(document).on('click','#continue_button', function(e){
            e.preventDefault();
            addLoader(true);
            var continue_html = $('#continue_button').html();
            $('#continue_button').html('Loading...');
            $.ajax({
                url  : "{{ route('customer-paymentMode')}}",
                type : "POST",
                data : {
                    _token                  : "{{csrf_token()}}",
                    company_type            : $("input[name='company_type']:checked").val(),
                    chooseOffline           : $("input[name='chooseOffline']:checked").val(),
                    chooseOnline            : $("input[name='chooseOnline']:checked").val(),
                    currency                : $('#currency').find('option:selected').val(),
                    price                   : $('#currency-value').val(),
                },
                success : function (data)
                {
                    addLoader(false);
                    $("html, body").animate({scrollTop: 0 }, 0);
                    $('#continue_button').html(continue_html);
                    $('#continue_button').removeClass('disabled');
                    if(data.error){
                        $('#paymentMethodAlert_message').html(data.error);
                        $('#paymentMethodAlert').toggle();
                    }
                    if(data.success){
                        if($("input[name='subscription_id']:checked").val() == 1) {
                            $("#register_button_main").trigger('click');
                        }
                        $('#payment').addClass("active tick");
                        $('#continue_button').removeClass('disabled');
                        $('#payment').attr("id",'payment1');
                        $("#continue_button_main").trigger('click');
                        $("#success-signup-content").html(signup_success_content);
                        $("#success-signup-content-two").html(signup_success_content_next);
                    }
                },
                error : function(data) {
                    addLoader(false);
                    $("html, body").animate({scrollTop: 0 }, 0);
                    $('#continue_button').html(continue_html);
                    $(".invalid-feedback").css('display','');
                    $('#paymentMethodAlert_message').html(data.error);
                    $('#paymentMethodAlert').toggle();
                }
            });
        });

    </script>
@endsection
