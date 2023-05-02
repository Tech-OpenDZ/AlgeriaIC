@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }} | @lang('discover_algeria.algeria_invest')</title>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> 
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js"></script>
@endsection

@section('content')
<section class="discover-algeria">
    <div class="container" style="padding-top:15px">
    <div class="row" style=" left:0;right:0;max-width: 100%;margin-left: 0px;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%)">
                    <div class="main-heading2" style="height:180px; width:100%;">
                        <div class="section_title" style="padding-top:80px">
                            <h4 class="subtitle mb-1" style="color:#FFFFFF; float:left;font-weight:bold;margin-left:50px">@lang('discover_algeria.title')</h4>

                        </div>


                    </div>
                </div>
        <div class="row" style=" margin-right:0px;margin-left:0px; background-color:#f5f5f5;box-shadow: 0px 0px 10px #C8C7D9;box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);border:0px solid black">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="discover-algeria__left">


                    @include('frontend.common.top_banner')



                    <!-- slider ends here -->
                    <!-- search engine starts -->

                     <!-- search engine ends -->
					 
                    @if($algeria_content_as_per_key->isEmpty())
                        <br/>
                        <div class="alert-text">@lang('discover_algeria.content_error')</div>
                    @else



                    <section class="about-algeria">
                        <div class="about-algeria__elements">
                           <!-- <h4 class="main-heading2 mb-1" style="height:180px; color:#FFFFFF;font-weight:bold;padding-top:70px; padding-left:60px">@lang('discover_algeria.title')</h4> -->
                            <!-- tabs structure starts here -->
                            <section class="search-engine">
                                <div class="search-engine__elements">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="@lang('discover_algeria.search')" id="keyword" name="keyword">
                                        <div class="input-group-append">
                                            <button type="button" onclick="findString()" style="border:none"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></span></button>

                                        <!-- <a href="#"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></a> </span> -->
                                        </div>
                                    </div>
                                    <p id="error_msg" style="color:red; display: none"></p>
                                </div>
                            </section>
                            <div class="row">
                                <div class="reso_disc_left col-lg-3 col-md-3 col-sm-12 tabs-left">
                                    <div class="nav left-nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @foreach($algeria_content as $content)
                                        @if($content->content_key == $algeria_content_as_per_key[0]->content_key)
                                        <a class="nav-link mt-2 active" id="" href="{{route('discover-algeria',$content->content_key)}}" role="tab" aria-controls="{{ str_replace(' ','_',$content->localeAll[0]->title) }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        {{ $content->localeAll[0]->title }}
                                        </a>
                                        @else
                                        <a class="nav-link mt-2" id="" href="{{route('discover-algeria',$content->content_key)}}" role="tab" aria-controls="{{ str_replace(' ','_',$content->localeAll[0]->title) }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        {{ $content->localeAll[0]->title }}
                                        </a>
                                        @endif

                                        @endforeach
                                    </div>
                                </div>
                                <div class="reso_disc_right col-lg-9 col-md-9 col-sm-12">
                                    <div class="tab-content tabs-right mt-2">
                                    <div class="tab-content" id="v-pills-tabContent" style='min-height: 400px;'>
                                    @foreach($algeria_content_as_per_key as $content)
                                        <div class="tab-pane fade show {{ $loop->first ? 'active' : ' ' }}" id="{{ str_replace(' ','_',$content->localeAll[0]->title) }}" role="tabpanel" aria-labelledby="{{ str_replace(' ','_',$content->localeAll[0]->title) }}-tab">

                                            <ul class="nav nav-tabs " id="myTab" role="tablist">
                                                @foreach($content->subContents as $subcontent)
                                                    <li class="nav-item {{ $loop->first ? 'active' : '' }}">
                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{str_replace(' ','_',$subcontent->localeAll[0]->sub_content_title) }}-tab" data-toggle="tab" href="#{{ preg_replace('/[^a-zA-Z0-9. ]/', '',str_replace(' ','_',$subcontent->localeAll[0]->sub_content_title)) }}" role="tab" aria-controls="{{ str_replace(' ','_',$subcontent->localeAll[0]->sub_content_title) }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $subcontent->localeAll[0]->sub_content_title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="tab-content tabcontent_para" id="myTabContent">
                                                @foreach($content->subContents as $subcontent)
                                                    <div class="tab-pane tab-inner  fade show {{ $loop->first ? 'active' : '' }}" id="{{preg_replace('/[^a-zA-Z0-9. ]/', '', str_replace(' ','_',$subcontent->localeAll[0]->sub_content_title)) }}" role="tabpanel" aria-labelledby="{{ str_replace(' ','_',$subcontent->localeAll[0]->sub_content_title) }}-tab">
                                                        <div class="discover-algeria-tabs">
                                                        {!! $subcontent->localeAll[0]->sub_content_description !!}
                                                        </div>
                                                        @if(!$subcontent->document->isEmpty())
                                                        <div class="documents_list">
                                                                @php
                                                                $document = json_decode($subcontent->document[0]->document);
                                                                $document_name = json_decode($subcontent->document[0]->document_name); 

                                                                @endphp
                                                                <ul>
                                                               @if(Config::get('app.locale') == 'en' && $document->en != '')
                                                                <li>
                                                                    <a href="{{ asset('storage/uploads/discover_algeria/documents/'.$document->en)}}" style="width: max-content;" download><i class="fa fa-download" aria-hidden="true"></i> 
                                                                    {{ preg_replace('/[^a-zA-Z0-9. ]/', '', str_replace('_', ' ',   $document_name->en)) }}</a>
                                                                </li>
                                                                @endif
                                                                @if(Config::get('app.locale') == 'fr' && $document->fr  != '')
                                                                <li>
                                                                    <a href="{{ asset('storage/uploads/discover_algeria/documents/'.$document->fr)}}" style="width: max-content;" download><i class="fa fa-download" aria-hidden="true"></i> 
                                                                    {{ str_replace('_', ' ', $document_name->fr) }}</a>
                                                                </li>
                                                                @endif
                                                               
                                                            
                                                                </ul>
                                                           
                                                        </div>
                                                        @endif
                                                        <div class="tab-pane-socialmedia">
                                                            <ul>
                                                                <p>@lang('discover_algeria.sharing')</p>
                                                                @include('frontend.share')
                                                            </ul>  
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                </div>
                <br>
            </div>
            <!-- left area ends here -->
       <!--  @include('frontend.common.right_sidebar') -->
     
        </div>
       
        <!-- row ends here -->
    </div>
</section>
<!-- top left and right area ends here -->

<!-- image logo carousel -->
@include('frontend.partner.index')

<!-- image logo carousel ends here -->

@endsection

@section('scripts')
<!-- Normal JS -->
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
<!-- Minified Combine JS -->
<!-- <script src="js/bundle.min.js"></script> -->
<script>
$(document).ready(function() {
    $(document).on('click', '.copy_link', function(){
        var text= $(this).attr('data-link');
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        if(textarea.value != '' && textarea.value == text){
            toastr.success(`{{__('discover_algeria.link_copied')}}`);
        } else {
            toastr.error(`{{__('discover_algeria.link_copied_error')}}`);
        }
        document.body.removeChild(textarea);
    });
});

$('#keyword').on('click', function() {
    $("#keyword").prop('readonly', false);
    $("#keyword").focus();
});

var TRange=null;

function findString () { 

    var str = $("#keyword").val();
    
    $("#keyword").prop('readonly', true);

    if(str != '' && str != undefined){
        if (parseInt(navigator.appVersion)<4) return;
        var strFound;
        if (window.find) {

        // CODE FOR BROWSERS THAT SUPPORT window.find
            $('#error_msg').css('display', 'none')
            strFound=self.find(str);
            if (!strFound) {
                strFound=self.find(str,0,1);
                while (self.find(str,0,1)) 
                continue;
            }
        }
        else if (navigator.appName.indexOf("Microsoft")!=-1) {

        // EXPLORER-SPECIFIC CODE

            if (TRange!=null) {
                TRange.collapse(false);
                strFound=TRange.findText(str);
                if (strFound)  { 
                    TRange.select();
                }
            }
            if (TRange==null || strFound==0) {
                TRange=self.document.body.createTextRange();
                strFound=TRange.findText(str);
                if (strFound) TRange.select();
            }
        }
        else if (navigator.appName=="Opera") {
            toastr.error(`{{__('discover_algeria.browser_error')}}`);
            return;
        }
        if (!strFound){
            $('#error_msg').html(`{{__('discover_algeria.keyword_not_found')}}`)//alert ("String '"+str+"' not found!")
            $('#error_msg').css('display', 'block')//alert ("String '"+str+"' not found!")
        }
        return;
    } else {
        $("#keyword").val('');
        $('#error_msg').html(`{{__('discover_algeria.enter_keyword')}}`)//alert ("String '"+str+"' not found!")
        $('#error_msg').css('display', 'block')
    }
}

$('#myTab a').click(function(e) {
  e.preventDefault();
  $(this).tab('show');
});

// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
if(hash != '') {
    $('#myTab li').removeClass('active');
    $('#myTab a[href="' + hash + '"]').parent().addClass('active')
    $('#myTab a[href="' + hash + '"]').tab('show');
}
</script>
@endsection