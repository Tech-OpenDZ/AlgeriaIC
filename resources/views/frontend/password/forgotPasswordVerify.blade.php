<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">@lang('forgetpassword.email_verify')</div>
                   <div class="card-body">
                    @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('forgetpassword.freshLink') }}
                        </div>
                    @endif
                    <a href="{{ route('reset-password.reset', $token) }}">@lang('forgetpassword.click_here')</a>
                </div>
            </div>
        </div>
    </div>
</div>
