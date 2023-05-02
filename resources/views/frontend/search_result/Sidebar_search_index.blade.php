@extends('frontend.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Algeria</title>
@endsection

@section('content')
<section class="news-main-area">
    <div class="discover-algeria">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="discover-algeria__left">
                        <ol class="breadcrumb-area">
                            <li class="breadcrumb-elements"><a href="#"> @lang('search_result.homeLabel')</a></li>
                            <li class="active">@lang('search_result.searchResults')</li>
                        </ol>
                        <!-- search engine starts -->
                        <section class="search-engine news-select-area">
                           <!-- <p class="select-title mt-3 mb-2">Keyword</p> -->
                            <div class="search-engine__elements">
                                <form class="search-form" id="inner-form" action="{{route('search')}}" method="POST">
                                @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="@lang('search_result.searchPlaceholder')" id="search_keyword" name="search" value="{{$search}}">
                                        <div class="input-group-append">
                                        <a href="#" id="submit-form"><span class="input-group-text"><img src="{{asset('css/images/search-engine.svg')}}" alt="search-engine" class="img-fluid"></a> </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                         <!-- search engine ends -->

                        <section class="search-result-area">
                            <div  class="search-listing">
                                @forelse($data as $d)
                                    <div class="search-find-results pb-3 mb-3">
                                        <h6 class="pb-2"><a href="{{$d['url']}}" target="_blank" class="search-result-heading">{{$d['title']}}</a></h6>
                                        <p class="pb-1">{{$d['content']}}</p>
                                        <p class="search-result-date">{{$d['date']}}</p>
                                    </div>
                                @empty
                                    <h6>@lang('search_result.notMatch') "{{$search}}"</h6>
                                @endforelse
                            </div>
                            @if($data->hasMorePages())
                            <div class="load-more text-center">
                                <span id="load_more" onclick="return loadMore();" class="btn btn-primary link-btn">@lang('search_result.loadMore')</span>
                            </div>
                            @endif
                        </section>
                   </div>
                </div>
                <!-- left area ends here -->
            </div>
            <!-- row ends here -->
        </div>
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
    <script type="text/javascript">
        $('#submit-form').on('click', function(){
            $('#inner-form').submit();
        })
    </script>

    <script>

    var page = 1;
    var search_listing = "{{ route('search') }}";
    var csrf = "{{csrf_token()}}";
    $(window).scroll(function() {

        if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - $("#footer").height())){

            page++;
                getListing(page);
        }

    });
    function loadMore()
    {
        page++;
        getListing(page);

    }
    @if($data->hasMorePages())
    var stop = false;
    @else
    var stop = true;
    @endif
    function getListing(page){
        console.log(page);
        if(stop)

            return;
        $.ajax({
            type: "GET",
            url: search_listing+"?page="+page,
            data: {
                language : 'en',
                search : $("#search_keyword").val(),
            },
            beforeSend: function()
            {
                $('.ajax-load').show();
                $('#load_more').hide();
            },
            success: function(data)
            {
                $('.ajax-load').hide();
                $('.search-listing').append(data.html);

                if(data.has_more == false){
                    $('.ajax-load').remove();
                    $('#load_more').hide();
                    stop = true;
                }
                else{
                    $('#load_more').show();
                }

                setTimeout(function() {
                    SearchImage();
                    truncateText();
                }, 2000);

            }
        });
    }

    function searchCall(){
        // alert('search');
        // if($("#search_keyword").val().length < 3)
        // {
        //     $('#element').tooltip('show');
        //     return;
        // }
        $('.search-listing').html('');
        var search_listing = "{{ route('search') }}";
        page=1;
        stop=false;
        getListing(page);
    }

</script>
@endsection
