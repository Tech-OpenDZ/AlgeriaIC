@php
$bannerImages = getBannerImages($banner);
if(count((array)$bannerImages)>0) {
@endphp

<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
    @foreach($bannerImages->bannerImages as $bannerImage)
        <li data-target="#demo" data-slide-to="{{$loop->iteration}}" class="{{($loop->first)? 'active': ''}}"></li>
    @endforeach
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner @if($banner !='home') for-small-slider @endif">
        @foreach($bannerImages->bannerImages as $bannerImage)

        <div class="carousel-item {{($loop->first)? 'active': ''}}">
            @if($bannerImage->link)
            <a href="{{$bannerImage->link}}">
                <img src="{{asset('storage/uploads/banner/'.$bannerImage->banner_img)}}" alt="slider-one" class="img-fluid mb-2">
            </a>
            @else
                <img src="{{asset('storage/uploads/banner/'.$bannerImage->banner_img)}}" alt="slider-one" class="img-fluid mb-2">
            @endif    
            <div class="slider-content">
                @foreach($bannerImage->localeAll as $banner_translate)
                    @if($banner_translate->header_text)
                        <h4 class="main-heading text-white">
                            {{ html_entity_decode(strip_tags($banner_translate->header_text)) }}</h4>
                    @else
                        <h4 class="main-heading text-white"></h4>
                    @endif
                   @if($banner_translate->header_text)
                        <p class="text-white ">{{ html_entity_decode(strip_tags($banner_translate->content)) }}</p>
                    @else
                        <p class="text-white "></p>
                    @endif
                @endforeach
            </div>  
             <div class="slider-next-prev">
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@php
}
@endphp
