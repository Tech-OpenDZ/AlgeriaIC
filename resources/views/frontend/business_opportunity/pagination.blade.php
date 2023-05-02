<div class="next-prev-controls mt-3">
    <a class="left carousel-control login-in" href="{{$previousPageUrl}}" role="button" data-link="{{$previousPageUrl}}">
        <span class="previous-area">@lang('business_opportunity_listing.previous')</span>
    </a>
    <a class="right carousel-control register" href="{{$nextPageUrl}}" role="button" data-link="{{$listPageUrl}}">
    {{ $business_opportunities->links() }}
        
    </a>
 
    <a class="right carousel-control register" href="{{$nextPageUrl}}" role="button" data-link="{{$nextPageUrl}}">

        <span class="next-area">@lang('business_opportunity_listing.next')</span>
    </a>
</div>