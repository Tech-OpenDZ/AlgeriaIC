<div class="modal fade forgot-password-area" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="login-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-6 col-xs-4 no-padding">
                            <div class="login-modal__left d-flex justify-content-center align-center forgot-password-left">
                                <img src="{{ asset('css/images/forgot-password.svg')}}" alt="fogot-password" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-8 no-padding grey-border">
                            <button type="button" class="close grey-close" data-dismiss="modal">&times;</button>
                            <div class="login-modal__right">
                                <div class="login-modal__right--form">
                                    <div class="container form-width">
                                        <div class="login-modal__right--logo text-center">
                                            <img src="{{ asset('css/images/login-logo.svg')}}" alt="login-logo" class="img-fluid">
                                        </div>
                                         {{ Form::open(['method' => 'post', 'route' => 'customer.password.email', 'class' => 'form-elements']) }} 
                                            <h4 class="main-heading text-left">Forgot Password</h4>
                                            <p class="mt-3 text-left password-link-text">Check your inbox and follow the reset password link </p>
                                            <div class="form-group login-name">
                                                 @if(session()->has('error'))
                                                    <span class="invalid-feedback" role="alert" style="display: block">
                                                        <strong>{{ session()->get('error') }}</strong>
                                                    </span>
                                                @endif 
                                                <label for="email">Enter your email address</label>
                                                <input type="email" name="customer_email" class="form-control @error('customer_email') is-invalid @enderror" placeholder="abcd@gmail.com" id="useremail">
                                                @error('customer_email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="register mt-3">Send password</button>
                                         {!! form::close() !!}
                                        <div class="login-bottom-buttons">
                                            <div class="privacy-policy-grid">
                                                <ul class="privacy-policy-grid__elements">
                                                    <li><a href="#" class="pricay-btn">Privacy Policy</a></li>
                                                    <li><a href="#" class="pricay-btn">Legal Notices</a></li>
                                                    <li><a href="#" class="pricay-btn">Terms of Services </a></li>
                                                </ul>  
                                                <p class="i2b mt-3">algeria invest is a product of <a href="#"><img src="{{ asset('css/images/i2b-big.svg')}}" alt="i2b" class="img-fluid ml-2"></a></p>   
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
    </div>
</div>