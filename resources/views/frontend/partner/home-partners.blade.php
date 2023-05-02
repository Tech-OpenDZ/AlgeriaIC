@php
$partners = getPartners();
@endphp
@if(!$partners->isempty())
<section class="brand-carousel">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                <div class="partners">
                    <h4 class="main-heading">@lang('home.ourPartners')</h4>

                    <a class="partner-prev-btn carousel-control-prev green-slide" href="#brand" data-slide="prev">
                    <span class="prev-partner-icon"></span>
                    </a>
                    <a class="partner-next-btn carousel-control-next green-slide" href="#brand" data-slide="next">
                    <span class="next-partner-icon"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="our-partners owl-carousel owl-theme brand-slider active" id="brands-demo">
                @foreach($partners as $partner) 
                    <div class="brand-outer-area item">
                    <img src="{{asset('storage/uploads/partner_logo/'.$partner->logo)}}" class="img-fluid">
                    </div>
                @endforeach
                </div>
            </div>     
        </div>
    </div>
</section>
<section class="partners-logo-area">
    <div class="brand-carousel partners-brand">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-12">
                </div>
                <div class="col-md-10 col-sm-12">
                    <div class="our-partners owl-carousel owl-theme brand-slider active" id="brands-demo">
                    @foreach($partners as $partner) 
                        <div class="brand-outer-area item">
                        <img src="{{asset('storage/uploads/partner_logo/'.$partner->logo)}}" class="img-fluid">
                        </div>
                    @endforeach
                    </div>
                </div>     
            </div>
        </div>
    </div>
</section>
@endif
