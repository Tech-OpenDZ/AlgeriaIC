@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if($resource != null)

    @endif
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
    <style>
        .editor p br {
            display: block !important;
        }
        .editor p, .editor p span {
            font-size: 13px !important;
        }
    </style>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
    </style>
@endsection

@section('content')

    <section class="discover-algeria" style="padding-top:0px;padding-bottom:0px;background-color:#ffffff!important">
        <div class="container_contact" style="max-width:100%!important">
            <div class="row" style="background-color:#ffffff;margin-left: -15px;margin-right: -15px">
                <div class="environnement_heading" style="height:400px; width:100%;padding-top:70px">
                    <div class="section_title" style="padding-top:125px">
                        <h2 class="subtitle align-content-center justify-content-center" style="color:#FFFFFF;font-weight:bold;">
                            {{$resource->localeAll[0]->title}} </h2>

                    </div>


                </div>
            </div>
        <div class="page-content" >
           <div class="container" style="max-width:1170px;background-color:transparent">
            <div class="row"  style="padding-left:10px;padding-top: 80px;padding-bottom: 80px;">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                        <!--  <li class="breadcrumb-elements"><a href="#">@lang('resource.home')</a></li> -->
                        <!--  <li class="active"> @lang('resource.business_environment') - {{$resource->localeAll[0]->title}} </li> -->
                        </ol>

                    @include('frontend.common.top_banner')

                    <!-- creation of company starts -->
                        <section class="search-engine">
                        <!-- <h6 class="main-heading mb-4">{{$resource->localeAll[0]->title}}</h6> -->


                            <div class="search-engine__elements">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="@lang('resource.search')"
                                           id="keyword" name="keyword">
                                    <div class="input-group-append">
                                        <button type="button" onclick="findString()" style="border:none"><span
                                                class="input-group-text"><img
                                                    src="{{asset('css/images/search-engine.svg')}}" alt="search-engine"
                                                    class="img-fluid"></span></button>
                                    <!-- <a href="#"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></a> </span> -->
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- creation of company ends -->
                        @if(!$resource->subPages->isEmpty())
                            <p class="resource-caption resource-ld"></p>
                            <section class="company-creation">
                                <div class="about-algeria">
                                    <div class="about-algeria__elements">
                                        <p class="company-creation-content"></p>
                                        <!-- tabs structure starts here -->
                                        <div class="row">
                                            <div class="reso_disc_left col-lg-3 col-md-3 col-sm-12 tabs-left">
                                                <div class="nav left-nav nav-pills" id="v-pills-tab" role="tablist"
                                                     aria-orientation="vertical">
                                                    @foreach($resource->subPages as $content)
                                                        @if($subcontent->page_key == $content->page_key)
                                                            <a class="nav-link mt-2  active" id=""
                                                               href="{{route('business-environment',['key'=>$resource->page_key,'subkey'=>$content->page_key])}}"
                                                               role="tab"
                                                               aria-controls="{{ str_replace(' ','_',$content->localeAll[0]->title) }}"
                                                               aria-selected="{{ $loop->first ? 'true' : 'false' }}" style="box-shadow: rgb(0 0 0 / 10%) 0px 10px 60px 0px!important;">
                                                                {{ $content->localeAll[0]->title }}
                                                            </a>
                                                        @else
                                                            <a class="nav-link mt-2" id=""
                                                               href="{{route('business-environment',['key'=>$resource->page_key,'subkey'=>$content->page_key])}}"
                                                               role="tab"
                                                               aria-controls="{{ str_replace(' ','_',$content->localeAll[0]->title) }}"
                                                               aria-selected="{{ $loop->first ? 'true' : 'false' }}" style="box-shadow: rgb(0 0 0 / 10%) 0px 10px 60px 0px!important;">
                                                                {{ $content->localeAll[0]->title }}
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="reso_disc_right col-lg-9 col-md-9 col-sm-12">

                                                <div class="tab-content tabs-right mt-2">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="creation-of-company"
                                                             role="tabpanel" aria-labelledby="creation-of-company-tab" style="box-shadow: 0px 10px 60px 0px rgb(0 0 0 / 10%)">
                                                            <div class="faq__accordian">

                                                                @forelse($subcontent->subPages as $menu)
                                                                    <div class="accordion"
                                                                         id="{{preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$menu->localeAll[0]->title)) }}-accordionExample">

                                                                        <div class="card"
                                                                             style="background-color:white;padding-right: 25px; padding-left: 25px;">
                                                                            <div class="card-header"
                                                                                 id="{{preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$menu->localeAll[0]->title)) }}">

                                                                                <a href="#" data-toggle="collapse"
                                                                                   data-target="#{{preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$menu->localeAll[0]->title)) }}-tab" onclick="resizeIframe('iframe-{{$menu->id}}')"><i
                                                                                        class="fa fa-plus"><h6
                                                                                            class="mb-3 sub-heading">{{$menu->localeAll[0]->title}}</h6>
                                                                                    </i> </a>

                                                                            </div>
                                                                            <div
                                                                                id="{{preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$menu->localeAll[0]->title)) }}-tab"
                                                                                class="collapse{{$loop->first ? '':''}}"
                                                                                aria-labelledby="{{preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$menu->localeAll[0]->title)) }}"
                                                                                data-parent="#{{preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$menu->localeAll[0]->title)) }}-accordionExample">
                                                                            <!-- <div id="{{preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$menu->localeAll[0]->title)) }}-tab" class="collapse{{$loop->first ? ' show':''}}" aria-labelledby="{{preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$menu->localeAll[0]->title)) }}" data-parent="#{{preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$menu->localeAll[0]->title)) }}-accordionExample"> -->
                                                                                <div class="card-body">
                                                                                    <!-- <iframe id="iframe-{{$menu->id}}" srcdoc="<html><head><style>p, p span{font-size: 18px !important;color: #445460 !important;line-height: 1.5 !important;text-align: justify;font-weight: 300;font-family: Poppins, Helvetica, sans-serif !important;}</style></head><body>{{ $menu->localeAll[0]->description }}</body></html>" frameborder="0" scrolling="no" style="width: 100%"></iframe> -->
                                                                                        <p class="card-content">{!!$menu->localeAll[0]->short_description !!}  </p>
                                                                                        @if(!Auth::guard('customer')->check())
                                                                                       <!-- <a href="/customerlogin" class="more-data heading-with-arrow mt-1" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer; color:#4e7cbe" id="loign_formshow" class="more-data"></i>@lang('event.seeMore') <i class="fas fa-arrow-circle-right"></i> </a> -->
                                                                                       <center> <a href="/customerlogin"  type="button" class="read-more-button" style="color:#4e7cbe;font-size:20px;font-weight:bold" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer; color:#4e7cbe" id="loign_formshow" class="more-data"></i>@lang('event.seeMore') <br> <img src="{{asset('storage/uploads/icon/flech.gif')}}" alt="" style="height:40px;width:50px"> <!-- <i class="fas fa-angle-double-down" style="font-size:30px"></i> --> </a> </center> 
                                                                                       @else
                                                                                       <center> <a href="{{route('business-environment',['key'=>$resource->page_key])}}" type="button" class="read-more-button" style="color:#4e7cbe;font-size:20px;font-weight:bold"  style="color:#4e7cbe" id="loign_formshow" class="more-data"></i>@lang('event.seeMore') <br> <img src="{{asset('storage/uploads/icon/flech.gif')}}" alt="" style="height:40px;width:50px"> <!-- <i class="fas fa-angle-double-down" style="font-size:30px"></i> --> </a> </center> 

                                                                                        @endif
                                                            
                                                              </p>
                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @empty
                                                                <!-- <div class="accordion">



                                                            </div> -->
                                                                @endforelse

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </section>
                        @endif
                    </div>
                    <br>

                </div>
                <!-- left area ends here -->


            </div>
            <!-- row ends here -->
        </div>
    </section>

    <!-- image logo carousel -->
    @include('frontend.partner.index')

    <!-- image logo carousel ends here -->
@endsection
@section('scripts')
    <!-- Normal JS -->
    <script>
        var TRange = null;

        function findString() {
            var str = document.getElementById("keyword").value;

            if (parseInt(navigator.appVersion) < 4) return;
            var strFound;
            if (window.find) {

                // CODE FOR BROWSERS THAT SUPPORT window.find

                strFound = self.find(str);
                if (!strFound) {
                    strFound = self.find(str, 0, 1);
                    while (self.find(str, 0, 1)) continue;
                }
            } else if (navigator.appName.indexOf("Microsoft") != -1) {

                // EXPLORER-SPECIFIC CODE

                if (TRange != null) {
                    TRange.collapse(false);
                    strFound = TRange.findText(str);
                    if (strFound) TRange.select();
                }
                if (TRange == null || strFound == 0) {
                    TRange = self.document.body.createTextRange();
                    strFound = TRange.findText(str);
                    if (strFound) TRange.select();
                }
            } else if (navigator.appName == "Opera") {
                alert("Opera browsers not supported, sorry...")
                return;
            }
            if (!strFound) alert("String '" + str + "' not found!")
            return;
        }
        $(document).ready(function(){
            //$('.editor p, .editor p span').attr('style', 'font-size: 13px !important');
            //function resizeIframe() {}
        });
        function resizeIframe(id) {
            setTimeout(function () {
                var obj= document.getElementById(id);
                obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
            }, 1000);
        }
    </script>

    <!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/front-end/browser-class.js"></script>
    <!-- <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/front-end/main.js') }}"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">
    </script>
@endsection
