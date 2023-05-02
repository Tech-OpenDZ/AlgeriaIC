@php
$facebook_url = null;
$linkedin_url = null;
$youtube_url = null;
$twitter_url = null;
$copyright = null;

$settings = getHeaderInfo();
foreach($settings as $setting){
    if($setting->key == 'facebook_url')
        $facebook_url= $setting->value;
    if($setting->key == 'linkedin_url')
        $linkedin_url= $setting->value;
    if($setting->key == 'youtube_url')
        $youtube_url= $setting->value;
    if($setting->key == 'twitter_url')
        $twitter_url= $setting->value;
    if($setting->key == 'copyright')
        $copyright= $setting->value;
}
@endphp
<div class="modal fade bd-example-modal-lg for-login-page" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="login-modal-id">
    <div class="modal-dialog modal-lg login_modal">
        <div class="modal-content" id="login_formmodal">
            <div class="login-modal">
                    <div class="row">
                        <div class="col-md-6 col-lg-7 col-sm-6 col-xs-4 no-padding">
                            <div class="login-modal__left">
                                <div class="container">
                                    <div class="login-modal__left--titles">
                                        <h2 class="heading-one"> @lang('navbar.loginHeader')</h2>
                                        <h4 class="sub-heading"> @lang('navbar.loginSubHeader')</h4>
                                    </div>
                                    <div class="login-social">
                                        <ul class="login-social__elements">
                                            @if($facebook_url != null)
                                                <li><a href="{{ $facebook_url }}"><img src="{{ asset('css/images/login-fb.svg')}}" alt="facebook" class="img-fluid"></a></li>
                                            @endif
                                            @if($twitter_url != null)
                                                <li><a href="{{ $twitter_url }}"><img src="{{ asset('css/images/login-twitter.svg')}}" alt="twitter" class="img-fluid"></a></li>
                                            @endif
                                            @if($linkedin_url != null)
                                                <li><a href="{{ $linkedin_url }}"><img src="{{ asset('css/images/login-linkedin.svg')}}" alt="linkedin" class="img-fluid"></a></li>
                                            @endif
                                            @if($youtube_url != null)
                                            <li><a href="{{ $youtube_url }}"><img src="{{ asset('css/images/login-youtube.svg')}}" alt="youtube" class="img-fluid"></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 col-sm-6 col-xs-8 no-padding grey-border">
                            <button type="button" class="close grey-close" data-dismiss="modal">&times;</button>
                                <div class="login-modal__right">
                                    <div class="login-modal__right--form">
                                        <div class="container form-width">
                                            <div class="login-modal__right--logo text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="#" class="logo-class d-flex align-items-center"><img src="{{ asset('css/images/logo_algeria_invest_final.svg')}}" alt="logo" class="img-fluid new_logo_img">
                                                    <!-- <h3 class="logo-text">@lang('navbar.algeria')<br>@lang('navbar.invest')</h3> -->
                                                </a>
                                                </div>
                                            </div>
                                            <!-- 'route' => '' -->
                                        {{ Form::open(['method' => 'post', 'url' => '#', 'class' => 'form-elements login_submit_form','id' => 'login_submit_form']) }}
                                            <div class="form-group login-name">
                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                    <strong id="email_password_error"></strong>
                                                </span>
                                                <span class="success_message" role="alert" style="display: none">
                                                    <strong id="mail_sent"></strong>
                                                </span>
                                            </div>
                                            <div class="form-group login-name">
                                                <label for="email"> @lang('navbar.usernameEmail')
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="text" class="form-control" placeholder="" id="email" name="customer_username">
                                                <span class="name-error" role="alert">
                                                </span>
                                            </div>
                                            <div class="form-group login-name">
                                                <label for="pwd">@lang('navbar.passwordLabel')
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="password" class="form-control" placeholder="" id="pwd" name="customer_password"> <span toggle="#pwd" class="fa fa-fw fa-eye field-icon toggle-pwd"></span>
                                                        <span class="pass_error" role="alert">
                                                        </span>
                                            </div>
                                            <div class="form-group form-check">
                                                <label class="form-check-label login-name-check">
                                                <input class="form-check-input" type="checkbox" name="remember_me">  @lang('navbar.rememberMeLabel')
                                                </label>
                                                <a href="#" class="fogot-password" id="forget_password">
                                                   @lang('navbar.forgotDetails')
                                                </a>
                                            	</div>
                                            <button type="submit" class="register mt-3"> @lang('navbar.submitButton')</button>
											<br><br>
											 <div class="form-group form-check">
											<br><br>
											<a href="{{route('customer-register')}}" class="fogot-password">
                      @lang('navbar.newaccount')
                      </a>
										</div>
											
											
                                        {!! form::close() !!}
                                            <div class="login-bottom-buttons">
                                                <div class="privacy-policy-grid">
                                                    <ul class="privacy-policy-grid__elements">
                                                       <!-- <li><a target="_blank" href="{{route('privacy-policy')}}" class="pricay-btn" target="_blank">@lang('signup.privacyPolicy')</a></li> -->
                                                        <li><a target="_blank" href="{{route('legal-notice')}}" class="pricay-btn" target="_blank">@lang('signup.legalNotices')</a></li>
                                                        <li><a target="_blank" href="{{route('terms-of-service')}}" class="pricay-btn" target="_blank">@lang('signup.termsOfServices')</a></li>
                                                    </ul>
                                                    <p class="i2b mt-3">@lang('signup.i2b')<a href="#"><img src="{{asset('css/images/i2b-big.svg')}}" alt="i2b" class="img-fluid ml-2"></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

            </div>
        </div>
        </div>

<script>
$(".toggle-pwd").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
input.attr("type", "text");
} else {
input.attr("type", "password");
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
</style>
    <!-- </div> -->

<!-- ---------------Forget Password--------- -->
    <!-- <div class="modal-dialog modal-lg" id="forget_modal" style="display: none;"> -->
    <div class="forgot-password-area">
        <div class="modal-content" id="forget_modal" style="display: none;">
            <div class="login-modal">
                    <div class="row">
                        <div class="col-md-6 col-lg-7 col-sm-6 col-xs-4 no-padding">
                            <div class="login-modal__left d-flex justify-content-center align-center forgot-password-left password_left">
                                <img src="{{ asset('css/images/forgot-password.svg')}}" alt="fogot-password" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 col-sm-6 col-xs-8 no-padding grey-border">
                            <button type="button" class="close grey-close" data-dismiss="modal">&times;</button>
                            <div class="login-modal__right">
                                <div class="login-modal__right--form">
                                    <div class="container form-width">
                                        <div class="login-modal__right--logo text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href="#" class="logo-class d-flex align-items-center"><img src="{{ asset('css/images/logo_algeria_invest_final.svg')}}" alt="logo" class="img-fluid new_logo_img">
                                                </a>
                                            </div>
                                        </div>

                                         {{ Form::open(['method' => 'post', 'url' => '#', 'class' => 'form-elements forget_form','id' => 'forget_form']) }}
                                             <span class="success_message mb-2">
                                            </span>
                                            <h4 class="main-heading text-left">@lang('forgetpassword.header')</h4>
                                            <p class="mt-3 text-left password-link-text">
                                            @lang('forgetpassword.sub_header')</p>
                                            <div class="form-group login-name">
                                                 @if(session()->has('error'))
                                                    <span class="invalid-feedback" role="alert" style="display: block">
                                                        <strong>{{ session()->get('error') }}</strong>
                                                    </span>
                                                @endif
                                                <label for="email" class="mt-3">@lang('forgetpassword.emailLabel')</label>
                                                <input type="email" name="email" class="form-control" placeholder="@lang('forgetpassword.emailPlaceholder')" id="useremail">
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong></strong>
                                                        </span>
                                            </div>
                                            <button type="submit" class="register mt-3 send_email_passlink">@lang('forgetpassword.buttonReset')</button>
                                         {!! form::close() !!}
                                        <div class="login-bottom-buttons">
                                            <div class="privacy-policy-grid">
                                                <ul class="privacy-policy-grid__elements">
                                                    <li><a target="_blank" href="{{route('privacy-policy')}}" class="pricay-btn">@lang('signup.privacyPolicy')</a></li>
                                                    <li><a target="_blank" href="{{route('legal-notice')}}" class="pricay-btn">@lang('signup.legalNotices')</a></li>
                                                    <li><a target="_blank" href="{{route('terms-of-service')}}" class="pricay-btn">@lang('signup.termsOfServices')</a></li>
                                                </ul>
                                                <p class="i2b mt-3">@lang('signup.i2b')<a href="#"><img src="{{ asset('css/images/i2b-big.svg')}}" alt="i2b" class="img-fluid ml-2"></a></p>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<style>
    .login-modal .grey-close {
   
    right: 0px;
    }
</style>
                <style>

                    input{
                        text-transform: none!important;

                    }

                </style>
            </div>
        </div>
    </div>
    </div>
</div>
