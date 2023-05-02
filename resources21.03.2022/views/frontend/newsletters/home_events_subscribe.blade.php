<div class="event-home-letter">
    <div class="row">
        <div class="col-lg-4 col-md-12 subscribe-letter-zindex">
            <h6 class="sub-heading">@lang('home.newsletter')</h6>
        </div>
        <div class="col-lg-6 col-md-12">
            <form class="subscribe_form red_btn">    
                <div class="input-group">
                    <input type="hidden" name="type" value="event" class="event_subscribe">
                    <input type="text" class="form-control col-8 subscribe_email" placeholder="@lang('newsletter.emailPlaceholder')" id="demo" name="email">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <!-- <a href="javascript:void(0)" class="event_submit">@lang('home.subscribe')</a> -->
                            <button type="button" class="btn btn-primary newsletter_btn event_submit">
                            <i id="spinner-event" class="fa fa-circle-o-notch fa-spin" style="display:none"></i> @lang('home.subscribe')</button>
                        </span>
                    </div>
                </div>
                <span class="" id="event_error" role="alert"></span>
                <span class="success-event" style="display:none;">
                </span>
                <span class="subscirbed_already" style="display:none;">
                </span>
            </form>
        </div>
    </div>
    <div class="event-news-back">
        <img src="{{asset('images/event-back-2.svg')}}" class="img-fluid event-back-one">
        <img src="{{asset('images/event-back-1.svg')}}" class="img-fluid event-back-two">
        <img src="{{asset('images/event-back-3.svg')}}" class="img-fluid event-back-three">
    </div>
</div>