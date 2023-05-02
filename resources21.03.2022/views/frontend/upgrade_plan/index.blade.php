@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@if($page == 'upgrade_plan')@lang('signup.upgradePlan') @else @lang('payment.paymentTitle') @endif| @lang('news.placeName')</title>
@endsection

@section('content')
    @if($page == 'upgrade_plan')
    <div class="upgrade-plan">
        <section class="signup-container">

            <div class="container">

                <div class="mb-2">
                    <h4 class="main-heading plan-main-heading mb-3 pt-4">@lang('signup.upgradePlan') </h4>
                    <p class="mb-4 pl-3 pr-3 update-plan-caption">@lang('signup.upgradeDesc')</p>

                    <div class="container">
                        <div class="row justify-content-center">
                            @php
                                $classVal = '';
                                $count = 1;
                                $footerDataArr = [];
                            @endphp
                            @foreach($subscriptions as $subscription)
                            <div class="col-md-3 col-lg-3 col-sm-6 mt-3">

                                @php
                                    if ($count == 2) {
                                        $classVal = ' sub-box-two yellow-sub-box';
                                        $footerDataArr[] = '<p class="mt-2"><span class="basic-user">*'.$subscription->localeAll[0]->name.':</span> '.$subscription->no_of_users .' '. __('signup.basicQuote').'</p>';
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
                                <div class="current-plan-detail{{($subscription->id == Auth::guard('customer')->user()->subscription_id) ? ' current-plan-detail-show': ''}} update-plan-area mt-3" id="detail-subscription-box-{{$subscription->id}}">
                                    <p class="current-plan{{($subscription->id == Auth::guard('customer')->user()->subscription_id) ? '  current-plan-show': ''}}" id="current-subscription-box-{{$subscription->id}}">{{($subscription->id == Auth::guard('customer')->user()->subscription_id) ? __('signup.currentPlan'): __('signup.selectedPlan')}}</p>
                                    <div class="subscription-box{{$classVal}} {{($subscription->id == 2) ? 'planselected' : ''}}" id="subscription-box-{{$subscription->id}}">
                                        <h4 class="main-heading box-heading mb-2">{{$subscription->localeAll[0]->name}}</h4>
                                        <p class="plan-detail pb-2">{{ number_format($subscription->price_dzd, 2) }} @lang('signup.dzd'){{($count != 2)? '/'.__('signup.year').'*':''}}</p>
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
                                                <p class="pb-2 text-center">{{$permission->localeAll[0]->value}}</p>
                                        @endforeach
                                        @if($subscription->id >= Auth::guard('customer')->user()->subscription_id)
                                        <div class="choose-box d-flex justify-content-center">
                                            <input id="subscription_id_{{$subscription->id}}" type="radio" name="subscription_id" value="{{$subscription->id}}" {{($subscription->id == 2) ? 'checked' : ''}}/>
                                            <label class="plan-select{{($subscription->id == Auth::guard('customer')->user()->subscription_id) ? ' disabled-choose': ''}}" id="choose-button-subscription-box-{{$subscription->id}}">@lang('signup.chooseButton')</label>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <form id="payment-for-subscription" action="{{ route('payment') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="text" name="subscription_id" id="subscription_id">
                            </form>
                        </div>
                        <div class="user-plan-detail pt-4 pb-3">
                            @foreach($footerDataArr as $footerData)
                            {!! $footerData !!}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @else

    <section class="business-directory-main">
        <div class="news-main-area">
            <div class="discover-algeria">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="discover-algeria__left">
                                <!-- wizard part -->
                                <div class="bd-wizard">
                                    <form role="form" action="{{route('payment-confirm')}}" method="POST" id='payment-complete-form'>
                                        @csrf
                                        
                                        <div class="row" id="">
                                            <div class="col-lg-12">
                                                <section class="bd-search-outer payment-border">
                                                    @include('frontend.payment.index', ['page' => 'upgrade-plan'])
                                                </section>
                                            </div>
                                        </div>
                                        <!-- step three ends here -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- featured events ends here -->
                </div>
            </div>
        </div>
        <!-- top left and right area ends here -->
    </section>
    @endif

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
        var prev_id = '';
        $(document).ready(function(){
            $(document).on('click','.subscription-box', function(){
                let selectedId = 'subscription-box-{{Auth::guard('customer')->user()->subscription_id}}';
                var current_id = $(this).attr('id');
                if (current_id != 'subscription-box-1' && current_id != selectedId) {
                    // console.log(prev_id);

                    if ( prev_id != '' ) {

                        $('#detail-'+prev_id).toggleClass('current-plan-detail-show');
                        $('#current-'+prev_id).toggleClass('current-plan-show');
                        $('#choose-button-'+prev_id).toggleClass("choose");
                    }

                    $('#detail-'+current_id).toggleClass('current-plan-detail-show');
                    $('#current-'+current_id).toggleClass('current-plan-show');
                    $('#choose-button-'+current_id).toggleClass("choose");

                    prev_id = $(this).attr('id');

                    $('#subscription_id').val(prev_id.split('subscription-box-')[1]);
                    addLoader(true);
                    $("#payment-for-subscription").submit();
                }
            });
            $('#payment-complete-form').submit(function(){
                addLoader(true);
            });
            $('.globe').css('display','none');
        });
    </script>
@endsection
