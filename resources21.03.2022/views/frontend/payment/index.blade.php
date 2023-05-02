<div class="signup-container">
    <div class="signup-form-area text-left">

        <h4 class="sub-heading mt-2 mb-3">@lang('signup.selectPaymentMethod')</h4>
        <p class="mt-3 mb-4">@lang('signup.paymentMethodHeader')</p>

        <div class="signup-form-area__elements">
            <div class="radio-buttons-area">
                <div class="row">
                    <div class="col-md-6">
                        <label class="radio-inline d-flex align-items-center">
                            <input type="radio" name="optradio" checked>
                            <h4 class="sub-heading ml-2">@lang('signup.algerianCompanies')</h4>
                        </label>
                    </div>

                    <div class="col-md-6">
                        <label
                            class="radio-inline d-flex align-items-center">
                            <input type="radio" name="optradio">
                            <h4 class="sub-heading ml-2">@lang('signup.nonAlgerianCompanies') </h4>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mode-selection">
                <div class="mod-selection__top">
                    <h4 class="sub-heading-two mt-3 mb-2">@lang('signup.offlineMode')</h4>
                    <ul class="nav nav-pills mb-3 mode-selection__elements mode" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <label class="nav-link offline-mode-box mode-select">
                                <input id="pills-cheque-tab" type="radio" name="chooseOffline" value="cheque" >
                                <span class="cheque">@lang('signup.cheque')</span>
                            </label>
                        </li>
                        <li class="nav-item">
                            <label class="nav-link offline-mode-box mode-select active">
                                <input id="pills-banktransfer-tab" type="radio" name="chooseOffline" value="bankTransfer" checked>
                                <span class="bank-transfer">@lang('signup.bankTransfer')</span>
                            </label>
                        </li>
                        <li class="nav-item">
                            <label class="nav-link offline-mode-box mode-select">
                                <input id="pills-cash-tab" type="radio" name="chooseOffline" value="cash">
                                <span class="cash">@lang('signup.cash')</span>
                            </label>
                        </li>
                    </ul>
                </div>

                <div class="mod-selection__mid">
                    <h4 class="sub-heading-two mt-4 mb-2">@lang('signup.onlineMode')</h4>
                    <ul class="nav nav-pills mb-3 mode-selection__elements" id="pills-tab" role="tablist">
                        <li class="nav-item not-allowed not-allowed">
                            <label class="nav-link offline-mode-box card-list disabled">
                                <input id="pills-credit-card-tab" type="radio" name="chooseOnline" value="creditCard" disabled>
                                <span class="credit-card">@lang('signup.creditCard')</span>
                            </label>
                        </li>
                        <li class="nav-item not-allowed not-allowed">
                            <label class="nav-link offline-mode-box card-list disabled">
                                <input id="pills-debit-card" type="radio" name="chooseOnline" value="debitCard" disabled>
                                <span class="debit-card">@lang('signup.debitCard')</span>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="mod-selection__bottom">
                    <h4 class="sub-heading-two mt-4 mb-2">@lang('press_review.selectCurrency')</h4>
                    @php
                        $payment_and_currency_array = getSelectedPaymentData($page);
                    @endphp
                    <!-- <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-4">
                            <select name="currency" id="currency" class="language-button">
                                <option id="data-dzd" data-key="{{$payment_and_currency_array['price_dzd']}}" value="dzd">@lang('signup.dzd')</option>
                                <option id="data-usd" data-key="{{$payment_and_currency_array['price_usd']}}" value="usd">@lang('signup.usd')</option>
                                <option id="data-euro" data-key="{{$payment_and_currency_array['price_euro']}}" value="euro">@lang('signup.euro')</option>
                            </select>
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-8 currency-data">
                            <h6 class="sub-heading">

                                <input type="hidden" id="currency-value" name="price" value="{{$payment_and_currency_array['price_dzd']}}">
                                <span class="" id="currency-value-span">{{$payment_and_currency_array['price_dzd']}}</span>
                                <span class="" id="currency-unit">@lang('signup.dzd')</span>
                            </h6>
                        </div>
                    </div> -->
                    <ul class="currency-detail mode-selection__elements" id="">
                        <li>
                            <select name="currency" id="currency" class="language-button">
                                <option id="data-dzd" data-key="{{$payment_and_currency_array['price_dzd']}}" value="dzd" {{ session()->get('user_currency') == 'dzd'?'selected':'' }}>@lang('signup.dzd')</option>
                                <option id="data-usd" data-key="{{$payment_and_currency_array['price_usd']}}" value="usd" {{ session()->get('user_currency') == 'usd'?'selected':'' }}>@lang('signup.usd')</option>
                                <option id="data-euro" data-key="{{$payment_and_currency_array['price_euro']}}" value="euro" {{ session()->get('user_currency') == 'euro'?'selected':'' }}>@lang('signup.euro')</option>
                            </select>
                        </li>
                        <li class="currency-display">
                            <h6 class="sub-heading currency-text">

                                <input type="hidden" id="currency-value" name="price" value="{{$payment_and_currency_array['price_dzd']}}">
                                <span class="" id="currency-value-span">{{$payment_and_currency_array['price_dzd']}}</span>
                                <span class="" id="currency-unit">@lang('signup.dzd')</span>
                            </h6>
                        </li>
                    </ul>
                    <p class="mt-4 mb-2 notice"> @lang('signup.notice')</p>
                </div>
                <button type="submit" class="mt-4 common-button" id="payment-continue-button">@lang('signup.continue')</button>
            </div>
        </div>
    </div>
</div>
