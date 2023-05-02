@extends('frontend.layouts.master')

@section('head')
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@lang('faq.breadcrumbFaq') | @lang('home.algeria_invest')</title>
<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #myTable.div,
  th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>

@endsection

@section('content')
<!--  <section class="signup-container"> -->
<section class="discover-algeria">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-8 col-sm-12">
        <div class="discover-algeria__left">
          <ol class="breadcrumb-area">
            <li class="breadcrumb-elements"><a href="#">@lang('faq.breadcrumbHome')</a></li>
            <li class="active">@lang('faq.breadcrumbFaq')</li>
          </ol>
          <div class="business-banner">
            <a href="#"><img src="{{ asset('images/business-banner.png') }}" alt="business-banner" class="img-fluid"></a>
          </div>
          <div class="slider-area">

            @include('frontend.banner.index', ['banner' => 'faq'])

          </div>
          <!-- slider ends here -->
          <!-- search engine starts -->
          <section class="search-engine">
            <h6 class="sub-heading">@lang('faq.searchEngine')</h6>
            <p class="mt-3 mb-2">@lang('faq.keyword')</p>
            <div class="search-engine__elements">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="@lang('faq.search')" id="search-faq" name="search-faq">
                <div class="input-group-append">
                  <a href="" id="search-faq-a"><span class="input-group-text"><img src="{{ asset('images/search-engine.svg') }}" alt="search-engine" class="img-fluid"></span></a>
                </div>
              </div>
            </div>
          </section>
          <!-- search engine ends -->
          <!-- faq starts -->
          <section class="faq">
            <h4 class="mb-3 main-heading">@lang('faq.faq')</h4>
            <p>@lang('faq.faqDesc')</p>
            <div class="faq__accordian mt-3">
              <div class="accordion" id="accordionExample">
                @foreach($faqs as $key => $faq)
                @foreach($faq->localeAll as $value)
                <div class="card">
                  <div class="card-header" id="headingTwo">

                    <a href="#" data-toggle="collapse" data-target="#collapse{{ $key }}"><i class="fa fa-plus">
                        <h6 class="mt-3 mb-3 sub-heading">{{ $value->question }}</h6>
                      </i> </a>

                  </div>
                  <div id="collapse{{ $key }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <p>{{ $value->answer }}</p>
                    </div>
                  </div>
                </div>
                @endforeach
                @endforeach
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- left area ends here -->
      @include('frontend.common.right_sidebar')

    </div>
    <!-- row ends here -->
  </div>
  <!-- top left and right area ends here -->
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

<!-- Script for FAQ Jquery Filter -->
<script>
  $(document).ready(function() {
    $("#search-faq-a").on("click", function(e) {
      var value = $('input[name=search-faq]').val().toLowerCase();
      $("#accordionExample .card").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });

      var trSel = $("#accordionExample .card:visible")
      if (trSel.length == 0) {
        $("#accordionExample").append('<div class="no-records"><h5><b>{{__('faq.content_error')}}</b></h5></div>')
      } else {
        $('.no-records').remove()
      }

      e.preventDefault();
    });
  });

  $("#search-faq").keypress(function(event) {
    if (event.which == 13) {
      var value = $('input[name=search-faq]').val().toLowerCase();
      $("#accordionExample .card").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });

      var trSel = $("#accordionExample .card:visible")
      if (trSel.length == 0) {
        $("#accordionExample").append('<div class="no-records"><h5><b>{{__('faq.content_error')}}</b></h5></div>')
      } else {
        $('.no-records').remove()
      }


      event.preventDefault();
    }
  });
</script>

<!-- Please keep your own scripts above main.js -->
<script src="{{ asset('js/front-end/main.js') }}"></script>

@endsection