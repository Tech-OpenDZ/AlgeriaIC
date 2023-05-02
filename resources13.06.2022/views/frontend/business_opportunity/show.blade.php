@extends('frontend.layouts.master')
@section('head')
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@lang('business_opportunity_details.breadcrumb_business_opportunities') | @lang('news.placeName')</title>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
@endsection
@section('content')


<section class="business-opportunities">
    <div class="discover-algeria">
        <div class="container">
        <div class="row" style=" left:0;right:0;max-width:100%;margin-left: 0px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
                    <div class="business-heading" style="height:180px; width:100%;">
                        
                        <div class="section_title" style="padding-top:80px;width:50%; float:left;">
									<h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:50px">@lang('business_opportunity_listing.business_opportunities')</h4>
								</div>

								

                    </div>
                </div>
            <div class="row" style=" margin-right:0px;margin-left:0px; background-color:#f5f5f5;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black">
                <div class="col-md-9 col-lg-9 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                           <!-- <li class="breadcrumb-elements"><a href="#">@lang('business_opportunity_details.breadcrumb_home')</a></li> -->
                           <!--<li class="active">@lang('business_opportunity_details.breadcrumb_business_opportunities')</li> -->
                        </ol>
                        @include('frontend.common.top_banner')

                        <div class="table-carousel">
                            <style>
                               @media only screen and (min-width: 768px) {
                                        .table-carousel {
                                            left: 150px;
                                            right:150px
                                            
                                        }
                                    }

                            </style>


                            <div class="print-area" >
                                <div class="row">
                                    <div class="col-md-6 col-lg-8 col-sm-6 col-12">
                                        <h1 class="main-heading">@lang('business_opportunity_details.sector') {{ $sector->id }} : {{ $sector->localeAll[0]->name }}</h1>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                                        <ul class="print-area__right">
                                             <!-- @if($business_opportunity->is_featured)
                                            <li class="circle-star">
                                                <a id="favorite" data-id="{{ $business_opportunity->id}} " href="javascript:void(0);"><img src="{{ asset('images/star.svg') }}" alt="star" class="img-fluid"></a>
                                            </li> 
                                            @endif -->
                                            <!-- <li class="circle-send">
                                                <a href="javascript:void(0);" data-link="{{url()->full()}}" class="copy_link"><img src="{{asset('css/images/send.svg')}}"></a>
                                            </li> -->
                                            
                                           <!-- <li class="register" style="background-color:#f9b634; border:#f9b634 ; "><a href="javascript:void(0);" class="print-icon" onclick="print_code()" >@lang('business_opportunity_details.print')</a></li> -->
                                            <!-- <style>
                                                  a:hover{
                                                    background-color:#4e7cbe;
                                                  }

                                                  a:active{
                                                    background-color:#4e7cbe;
                                                  }

                                                  a:focus{
                                                    background-color:#4e7cbe;
                                                  }
                                                </style> -->
                                        </ul>
                                    </div>
                                </div>
                               
                                <div class="print-area__elements" id="printDiv">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3">
                                            <div class="print-area__elements--left mb-2">
                                            @if($business_opportunity->logo != null)
                                                <img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" alt="print-page-post" class="img-fluid">
                                            @endif
                                            </div>

                                        </div>
                                        <div class="col-md-9 col-lg-9">
                                            <div class="print-area__elements--right">
                                                <p class="print-month mb-2">{{date('M y', strtotime($business_opportunity->created_at))}}</p>
                                                <p class="print-content mb-2">{{ $business_opportunity->localeAll[0]->project_title}}</p>
                                                <p class="print-business mb-2">
                                                @foreach($business_opportunity->sectors as $sector)
                                                    @foreach($sector->localeAll as $localeData)
                                                    @if($localeData->locale == Config::get('app.locale'))
                                                    {{$localeData->name}} &nbsp;
                                                    @endif
                                                    @endforeach
                                                @endforeach
                                                </p>
                                                @if($business_opportunity->company_contact !='')
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <p class="print-contact">@lang('business_opportunity_details.contact'):</p>
                                                    </div>
                                                    <div class="col-md-8 col-lg-8">
                                                        <p class="print-business mb-2" >{{ $business_opportunity->company_contact}}</p>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($business_opportunity->company_email !='')
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <p class="print-contact">@lang('business_opportunity.company_email'):</p>
                                                    </div>
                                                    <div class="col-md-8 col-lg-8">
                                                        <p class="print-business mb-2" >{{ $business_opportunity->company_email}}</p>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($business_opportunity->localeAll[0]->contact_person !='')
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <p class="print-contact">@lang('business_opportunity.contact_person'):</p>
                                                    </div>
                                                    <div class="col-md-8 col-lg-8">
                                                        <p class="print-business mb-2" >{{ $business_opportunity->localeAll[0]->contact_person}}</p>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($business_opportunity->localeAll[0]->company_name !='')
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <p class="print-contact">@lang('business_opportunity.company_name'): 
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-lg-8">
                                                        <p class="print-business mb-2" >{{ $business_opportunity->localeAll[0]->company_name}}
                                                        </p>
                                                    </div>
                                                   
                                                </div>
                                                <br>

                                              

                                               <!-- <div class="row">
                                                    <div class="col-md-8 col-lg-8">
                                                        <p class="print-contact" style="color:#dd4f41"> Contact service commercial Algeria INVEST : 
                                                        </p>
                                                    </div>
                                                </div>
                                               
                                                  
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <p class="print-contact"> Email: 
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-lg-8">
                                                        <p class="print-business mb-2"> contact@algeriainvest.com
                                                        </p>
                                                    </div>
                                                   
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <p class="print-contact"> Phone: 
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-lg-8">
                                                        <p class="print-business mb-2"> +213 770 00 84 96
                                                        </p>
                                                    </div>
                                                   
                                                </div> -->







                                                @endif
                                                @if($business_opportunity->localeAll[0]->company_email !='')
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <p class="print-contact">@lang('business_opportunity.company_email'): 
                                                        </p>
                                                    </div>    
                                                    <div class="col-md-8 col-lg-8">
                                                        <p class="print-business mb-2" >{{ $business_opportunity->company_email}}</p>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if($business_opportunity->localeAll[0]->company_presentation_text != null)
                                    <p class="print-contact mt-4 mb-3">@lang('business_opportunity_details.presentation_of_the_company'):</p>
                                    <p class="presentation-content"> {{ html_entity_decode(strip_tags($business_opportunity->localeAll[0]->company_presentation_text))}} </p>
                                    @endif
                                    @if($business_opportunity->company_presentation_file != null)
                                    <ul>
                                        <li>
                                            <a href="{{ asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/presentation/'.$business_opportunity->company_presentation_file)}}" download><i class="fa fa-download" aria-hidden="true"></i> @lang('business_opportunity.company_presentation_file')
                                           </a>
                                        </li>
                                    </ul>
                                    @endif
                                    
                                    <p class="print-contact mt-4 mb-3">@lang('business_opportunity_details.presentation_of_the_project')</p>
                                    <ul>
                                    <p class="presentation-content mb-4">  <iframe id="iframe-{{$business_opportunity->id}}" srcdoc="<html><head><style>p, p span{font-size: 0.875rem !important;color: #8A969B !important;    word-wrap: break-word;line-height: 1.5 !important;text-align: justify;font-weight: 300;font-family: muli, sans-serif !important;}</style></head><body>{{ $business_opportunity->localeAll[0]->project_description }}</body></html>" allowfullscreen="" frameborder="0"  width="100%" scrolling="yes" onload="resizeIframe(this)" ></iframe> </p>
                                    <script>
                                            function resizeIframe(obj) {
                                                obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
                                            }
                                            </script>
                                   <!-- <p class="presentation-content mb-2">{{ html_entity_decode(strip_tags($business_opportunity->localeAll[0]->project_description))}} </p> -->
                                   <!-- <ul>
                                    <p class="print-contact mt-4 mb-3">@lang('business_opportunity.documents')</p>
                                    @foreach($business_opportunity->businessOpportunityDocument as $document) 
                                        <li>
                                            <a href="{{ asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/documents/'.$document->document)}}" download><i class="fa fa-download" aria-hidden="true"></i> 
                                            @lang('business_opportunity.document')({{$loop->iteration}})
                                         </a>
                                        </li> 
                                    @endforeach
                                    </ul> -->
                                    @if($business_opportunity->image != null)
                                    <p class="print-contact mt-4 mb-3">@lang('business_opportunity.image')</p>
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3">
                                            <div class="print-area__elements--left mb-2">
                                                <img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/image/'.$business_opportunity->image)}}" alt="print-page-post" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @if(count($similar_announcements) > 0)
                            <div class="print-area-posts mb-3">
                                <h6 class="sub-heading mb-3">@lang('business_opportunity_details.similar_announcements')</h6>
                                <div class="print-area-posts-elements">

                                    <div class="print-posts owl-carousel owl-theme brand-slider active" id="">

                                        @foreach($similar_announcements as $business_opportunity)
                                        @foreach($business_opportunity->localeAll as $value)
                                        <div class="post-card">
                                            <a href="{{route('business-opportunity-details', ['sector_id' => $sector->page_key,'id' => $business_opportunity->page_key ])}}"><img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" alt="post-card-one" class="img-fluid">
                                                <p class="print-month mt-3 mb-2">{{date('M y', strtotime($business_opportunity->created_at))}}</p>
                                                <p class="print-content mb-2">{{ $business_opportunity->localeAll[0]->project_title}}</p>
                                               <!-- <p class="print-month  mb-2">{{ $business_opportunity->localeAll[0]->project_description}} </p> -->
                                            </a>
                                        </div>
                                        @endforeach
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            @else
                            <br>
                            <div class="alert-text">@lang('business_opportunity_details.no_similar_found_error')</div>
                            @endif

                            <!-- Left and right controls -->
                            <div class="next-prev-controls mt-3 mb-4">
                                @if($previous)
                                <a class="login-in" href="{{route('business-opportunity-details', ['sector_id' => $sector_id,'id' => $previous->id ])}}" role="button">
                                    <span class="previous-area">@lang('business_opportunity_details.previous')</span>
                                </a>
                                @else
                                <a style="visibility: hidden;" class="login-in" href="" role="button">
                                    <span class="previous-area">@lang('business_opportunity_details.previous')</span>
                                </a>
                                @endif
                                @if($next)
                                <a class="register" href="{{route('business-opportunity-details', ['sector_id' => $sector_id,'id' => $next->id ])}}" role="button">
                                    <span class="next-area">@lang('business_opportunity_details.next')</span>
                                </a>
                                @endif
                            </div>

                        </div>
                        <!-- slider ends here -->

                    </div>

                </div>
                <!-- left area ends here -->

                {{-- @include('frontend.common.right_sidebar') --}}
                <style>
                             a:hover , a:active {
                                 color: #f9b634;
                                 text-decoration: underline;
                              }


                          </style>

            </div>
            <!-- row ends here -->
        </div>
    </div>
</section>

<style> 
a:hover{
    text-decoration: none;
}

a:active{
    text-decoration: none;
}

</style>
<!-- top left and right area ends here -->
@endsection
@section('scripts')

<!-- Normal JS -->
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{ asset('js/front-end/browser-class.js') }}"></script>
<!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
<!-- Please keep your own scripts above main.js -->
<script src="{{ asset('js/front-end/main.js') }}"></script>
</script>

<script>
    // print-posts
    $('.print-posts').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        responsive: {
            0: {
                items: 1,

            },
            400: {
                items: 2,

            },
            500: {
                items: 3,

            },
            1000: {
                items: 3
            }
        }
    })
    var owl = $('.owl-carousel');
    owl.owlCarousel();
    $('.slide-to-right').click(function() {
        owl.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('.slide-to-left').click(function() {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl.trigger('prev.owl.carousel', [300]);
    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js" integrity="sha512-d5Jr3NflEZmFDdFHZtxeJtBzk0eB+kkRXWFQqEc1EKmolXjHm2IKCA7kTvXBNjIYzjXfD5XzIjaaErpkZHCkBg==" crossorigin="anonymous"></script>

<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> -->
<script>
    $(document).ready(function() {
        $(document).on('click', '.copy_link', function() {
            var text = $(this).attr('data-link');
            var textarea = document.createElement("textarea");
            textarea.textContent = text;
            textarea.style.position = "fixed";
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            if (textarea.value != '' && textarea.value == text) {
                toastr.success(`{{__('discover_algeria.link_copied')}}`);
            } else {
                toastr.error(`{{__('discover_algeria.link_copied_error')}}`);
            }
            document.body.removeChild(textarea);
        });

        // for print the div
        
        
    });
    function print_code() {
          
        var printContents = document.getElementById('printDiv').innerHTML;
        var originalContents = document.body.outerHTML;
        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents; 
         
    }
</script>

@endsection
