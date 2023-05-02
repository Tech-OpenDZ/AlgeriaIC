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
    <div class="discover-algeria" style="padding-top:0px;padding-bottom:0px;background-color:#ffffff!important">
        <div class="container_contact" style="max-width:100%!important">
           <div class="row" style="background-color:#ffffff;margin-left:-15px;margin-right:-15px">
                    <div class="opportunity_heading" style="height:400px; width:100%;padding-top:70px">
                        
                        <div class="section_title" style="padding-top:125px">
									<h2 class="subtitle align-content-center justify-content-center" style="color:#FFFFFF;font-weight:bold">@lang('business_opportunity_listing.business_opportunities')</h2>
								</div>
                    </div>
                </div>
    <div class="page-content" >
        <div class="container" style="max-width:1500px;background-color:transparent">
            <div class="row" style="padding-top:80px;padding-bottom:80px;">
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


                            <div class="print-area" style="box-shadow: rgb(0 0 0 / 10%) 0px 10px 60px 0px!important;">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                                    
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                                        <ul class="print-area__right">
                                
                                        </ul>
                                    </div>
                                </div>
                               
                                <div class="print-area__elements" id="printDiv">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="print-area__elements--left log mb-2" style="height: 100%;width: 100%;">
                                            @if($business_opportunity->logo != null)
                                            <div style="height:100%;width:100%">
                                            <img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" style="border-radius: 10px ;width:100%;height:100%"  alt="print-page-post" class="img-fluid" >
                                </div>
                                            @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="print-area__elements--right">
                                            <p class="print-business mb-2" >@lang('business_opportunity_details.sector') {{ $sector->id }} : {{ $sector->localeAll[0]->name }}</p>
                                                <h2 class="print-content mb-2" style="font-weight: 800;line-height: 1.3;color: #092a49;font-size: 1.525rem">{{ $business_opportunity->localeAll[0]->project_title}}</h2>
                                                  <br> <br>
                                                @if($business_opportunity->company_contact !='')
                                                <div class="row" style="line-height:2px">
                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="print-contact">@lang('business_opportunity_details.contact') </p> 
                                                    </div> 
                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="print-business mb-2" >{{ $business_opportunity->company_contact}}</p>
                                                    </div>
                                                </div>
                                                @endif
                                             
                                                @if($business_opportunity->company_email !='')
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="print-contact" style="line-height:2.5rem">@lang('business_opportunity.company_email')</p>
                                                    </div>
                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="print-business mb-2" >{{ $business_opportunity->company_email}}</p>
                                                    </div>
                                                </div>
                                                @endif
                                               
                                                @if($business_opportunity->localeAll[0]->contact_person !='')
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="print-contact" style="line-height:2.5rem">@lang('business_opportunity.contact_person')</p>
                                                    </div>
                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="print-business mb-2" >{{ $business_opportunity->localeAll[0]->contact_person}}</p>
                                                    </div>
                                                </div>
                                                @endif
                                               
                                                @if($business_opportunity->localeAll[0]->company_name !='')
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="print-contact" style="line-height:2.5rem">@lang('business_opportunity.company_name'):
                                                        </p>
                                                    </div>
                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="print-business mb-2" >{{ $business_opportunity->localeAll[0]->company_name}}
                                                        </p>
                                                    </div>
                                                   
                                                </div>
                                              

                                                @endif
                                                <br>
                                                @if($business_opportunity->localeAll[0]->company_email !='')
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="print-contact" style="line-height:2.5rem">@lang('business_opportunity.company_email') 
                                                        </p>
                                                    </div>    
                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="print-business mb-2" >{{ $business_opportunity->company_email}}</p>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <br> <br>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-radius:1px solid black">
                                            @if($business_opportunity->localeAll[0]->company_presentation_text != null)      
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color:black">@lang('business_opportunity_details.presentation_of_the_company')</a>
                                            </li> 
                                            @endif
                                            @if($business_opportunity->company_presentation_file != null)
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" style="color:black">@lang('business_opportunity.company_presentation_file')</a>
                                            </li>
                                            @endif
                                            <li class="nav-item">
                                                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false" style="color:black">@lang('business_opportunity_details.presentation_of_the_project')</a>
                                            </li>
                                            @if($business_opportunity->image != null)
                                            <li class="nav-item">
                                                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false" style="color:black">@lang('business_opportunity.image')</a>
                                            </li>
                                            @endif
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content client_info">
                                            @if($business_opportunity->localeAll[0]->company_presentation_text != null)  
                                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"> {{ html_entity_decode(strip_tags($business_opportunity->localeAll[0]->company_presentation_text))}} </div>
                                            @endif
                                            @if($business_opportunity->company_presentation_file != null)
                                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <a href="{{ asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/presentation/'.$business_opportunity->company_presentation_file)}}" download><i class="fa fa-download" aria-hidden="true"></i> @lang('business_opportunity.company_presentation_file') </a>
                                            </div>
                                            @endif

                                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                               
                                                <iframe id="iframe-{{$business_opportunity->id}}"  srcdoc="<html><head><style>p, p span{ line-height:2rem; color: #092a49;  font-size: 1.2rem;   word-wrap: break-word;text-align: justify;font-weight: 300;font-family: Poppins !important;}</style></head><body>{{ $business_opportunity->localeAll[0]->project_description }}</body></html>" allowfullscreen="" frameborder="0"  width="100%" height="300px" scrolling="yes" onload="resizeIframe(this)" ></iframe> 
                                           

                                            </div>
                                            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                            <div class="print-area__elements--left mb-2">
                                                <img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/image/'.$business_opportunity->image)}}" alt="print-page-post" class="img-fluid">
                                            </div>
                                            </div>
                                            </div>

                                        <script> 
                                        $('#myTab a').on('click', function (e) {
                                            e.preventDefault()
                                            $(this).tab('show')
                                            })
                                            //You can activate individual tabs in several ways:


                                            $('#myTab a[href="#profile"]').tab('show') // Select tab by name
                                            $('#myTab li:first-child a').tab('show') // Select first tab
                                            $('#myTab li:last-child a').tab('show') // Select last tab
                                            $('#myTab li:nth-child(3) a').tab('show') // Select third tab
                                        
                                        
                                        </script>



                            <br> <br> <br>

                            <div class="col-md-12" style="bottom: 45px;z-index: 2;background-color:transparent">

                                        <section class="services" >
                                        <br> <br> <br>
                                                 @if(count($similar_announcements) > 0)
                                                    <div class="title-headings">
                                                        <a href="{{route('business-opportunity')}}">  <h2 class="title";style="color:#092a49"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@lang('business_opportunity_details.similar_announcements') </font></font></h2> </a>
                                                    </div>
                                             
                                                @endif
                                            <div class="service-item-container" style="height:auto">
                                            
                                            
                                                @if(count($similar_announcements) > 0)
                                                
                                                    @foreach($similar_announcements->slice(0,3) as $business_opportunity)
                                                        @foreach($business_opportunity->localeAll as $value)
                                                
                                                            <div class="service-item">
                                                                <div class="bar"></div>
                                                                    <div class="item" style="height:200px;width:100%;margin:0;border-top-left-radius:10px">
                                                                            <a href="{{route('business-opportunity-details', ['sector_id' => $sector->page_key,'id' => $business_opportunity->page_key ])}}"><img src="{{asset('storage/uploads/business_opportunity/'.$business_opportunity->id.'/logo/'.$business_opportunity->logo)}}" style="height:200px;width:100%;border-top-left-radius: 10px 10px;border-top-right-radius:10px 10px;" alt="post-card-one" class="img-fluid">
                                                                                <br> </a>
                                                                    </div>
                                                                    <div class="p-30 pt-40" style="margin:5px">
                                                                        <h6 class="font-weight-bold"  style="font-weight: 700;line-height: 1.4">  <p class="print-month mt-3 mb-2">{{date('M y', strtotime($business_opportunity->created_at))}}</p> </h6>
                                                                        <br>
                                                                        <h6 style="color:#66788a;font-size:1rem;font-family:Poppins;font-weight: 400;line-height: 2">  <p class="print-content mb-2">{{ $business_opportunity->localeAll[0]->project_title}}</p></h6>
                                                                        
                                                                    </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                 @else
                                                    <br>
                                                    <div class="alert-text"> @lang('business_opportunity_details.no_similar_found_error') </div>
                                                @endif

                                            
                                            </div>
                                        </section>

                            </div>


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
                              .print-area__elements--left img {
                                   max-width: 500px;
                                    max-height: 500px;
                                    -o-object-fit: cover;
                                    object-fit: cover;
                                }

                                .print-contact{
                                    line-height:2.5rem;
                                    color: #092a49;
                                    font-weight:700;
                                    font-size: 1rem;
                                   
                                }
                                .nav-link{
                                    line-height:2.5rem;
                                    color: #092a49;
                                    font-weight:700;
                                    font-size: 1rem;
                                }
                                .print-business{
                                    line-height:2rem;
                                    color: #092a49;
                                    font-weight:400;
                                    font-size: 1rem;

                                }
                                .tab-pane{
                                    line-height:2rem;
                                    color: #092a49;
                                    font-weight:400;
                                    font-size: 1rem;

                                }
                                .nav-tabs .nav-link {
                                    border:1px solid #d2d2d2;
                                }
                                .nav-link:hover {
                                    background-color:#4d7cbd;
                                    border:1px solid black;
                                }
                                .nav-link:active {
                                    background-color:#4d7cbd;
                                    border:1px solid black;
                                }
                            
                                .client_info{
                                   
                                    border:1px solid #d2d2d2;
                                    padding:15px;
                                    border-radius:10px
                                }

                              

                                .log img {
                                        
                                     transition: 0.5s all ease-in-out;
                                    }
                                
                                .log:hover img {
                                        transform: scale(1.02);
                                    }
                             

                          </style>
                          <script> 
                        
                        
                        </script>

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
