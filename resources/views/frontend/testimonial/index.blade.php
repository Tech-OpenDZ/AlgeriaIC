@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('testimonial.testimonials') | @lang('home.algeria_invest')</title>
@endsection

@section('content')
    <section class="discover-algeria">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-12">
                <div class="discover-algeria__left">
                    <ol class="breadcrumb-area">
                        <li class="breadcrumb-elements"><a href="#">@lang('testimonial.home')</a></li>
                        <li class="active">@lang('testimonial.testimonials')</li>
                    </ol>
                    
                    @include('frontend.common.top_banner')
                    
                    <section class="testimonial-area mt-4">
                    <h1 class="main-heading mb-3">@lang('testimonial.testimonials')</h1>
                    <p>@lang('testimonial.testimonials_description')</p>
                    <div class="testimonial-area__elements">
                    @if (count($data['testimonials']) > 0)
                        <div class="container" id="load-data">
                            <div class="row">
                            @foreach($data['testimonials'] as $key => $value)
                                <?php $testimonial_id = $value->id; ?>
                                @foreach ($value->localeAll as $testimonial)
                                <div class="col-md-6 col-sm-6 col-xs-12 no-left-padding">
                                    <div class="testimonial-area__elements--box mt-4">
                                       <!-- <img src="images/quote-new.png" alt="quote" class="img-fluid"> -->
                                       <div class="quote-font  pb-3">
                                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                                    </div>
                                        <p class="testimonial-content">{{ html_entity_decode(strip_tags(str_limit($testimonial->description, 165, '....'))) }}
                                        <a type="button" class="modal-read-more" data-toggle="modal" data-target="#myModal" data-id="{{ $value->id }}">
                                        @lang('testimonial.read_more')
                                        </a>
                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog">
                                            </div>
                                        </div> 
                                        </p>
                                        <div class="authour-detail">
                                           <div class="authour-detail__left">
                                           <img src="{{ isset($value->image) ? asset('storage/uploads/testimonial/'.$value->image) : asset('storage/uploads/testimonial/default-image.png')  }}" alt="authour" class="img-fluid">
                                           </div>
                                            <div class="authour-detail__right">
                                                <strong><p class="authour-name">{{$testimonial->name}}</p></strong>
                                                <p>{{$testimonial->sub_title}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                @endforeach
                            @endforeach     
                            </div>                       
                                @if ($data['total_testimonials'] > 10)
                                    <div id="remove-row" class="text-center">
                                        <a href="javascript:void(0);" id="btn-more" data-id="{{ $testimonial_id }}" class="register button-center loadmore-btn">@lang('testimonial.view_more')</a>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="container" id="load-data" style="margin-top: 20px;">
                                <div class="row">
                                @lang('testimonial.no_testimonial')
                                </div>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
         </div>
            <!-- left area ends here -->
            @include('frontend.common.right_sidebar')
        </div>
        <!-- row ends here -->
    </div>
</section>
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
    // load more testimonials ajax call
    $(document).ready(function(){
        $(document).on('click','#btn-more',function(){
        var id = $(this).data('id');
            console.log(id);
            $("#btn-more").html("Loading....");
            $.ajax({
                url : '{{route('loadmoredata')}}',
                method : "POST",
                data : {id:id, _token:"{{csrf_token()}}"},
                dataType : "text",
                success : function (data)
                {
                    if(data != '') {
                        $('#remove-row').remove();
                        $('#load-data').append(data);
                    } else{
                        $('#btn-more').hide();
                    }
                }
            });
        }); 

        $(document).on('click','.modal-read-more',function(){
            var id = $(this).data('id');
            console.log(id);
            // $("#btn-more").html("Loading....");
            $.ajax({
                url : '{{route("read-more-data")}}',
                method : "POST",
                data : {id:id, _token:"{{csrf_token()}}"},
                dataType : "text",
                success : function (response)
                {
                    $('.modal-dialog').html(response);
                    $('#myModal').modal('show'); 
                }
            });
        }); 
    });
</script> 

@endsection
