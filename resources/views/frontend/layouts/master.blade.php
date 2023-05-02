<!DOCTYPE html>
    <html @if(Request::segment(1) == 'fr')lang="fr" @else lang="en" @endif @if(Request::segment(1) == 'ar') dir="rtl" @endif>
        <head>
            <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/algeria-favicon.svg')}}" />
            @yield('head')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
            <link rel="stylesheet" href="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css/vendors/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css/front-end/style.css') }}">
            <link rel="stylesheet" href="{{ asset('css/front-end/share.css') }}">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/font-awesome.min.css')}}">
            <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/style.css')}}">
            <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/share.css')}}">

            <!--my_css_here -->
            <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/slick.css')}}">
       
            <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/style.css')}}">
            <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/mon-style.css')}}">
              <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/assets/css/style_headd.css')}}">
             

              



            <meta charset="utf-8"><meta name="referrer" content="origin-when-crossorigin" id="meta_referrer"><script async="" src="https://www.google-analytics.com/analytics.js"></script><script src="https://connect.facebook.net/signals/config/1916681798651990?v=2.9.48&amp;r=stable" async=""></script><script src="https://connect.facebook.net/signals/config/1801207626762049?v=2.9.48&amp;r=stable" async=""></script><script src="https://connect.facebook.net/signals/config/983057391856088?v=2.9.48&amp;r=stable" async=""></script><script src="https://connect.facebook.net/signals/config/1654677854812921?v=2.9.48&amp;r=stable" async=""></script><script src="https://connect.facebook.net/signals/config/721503217860715?v=2.9.48&amp;r=stable" async=""></script><script src="https://connect.facebook.net/signals/config/438056466377696?v=2.9.48&amp;r=stable" async=""></script><script src="https://connect.facebook.net/signals/config/1754628768090156?v=2.9.48&amp;r=stable" async=""></script><script src="https://connect.facebook.net/signals/config/574561515946252?v=2.9.48&amp;r=stable" async=""></script><script src="https://connect.facebook.net/signals/config/675141479195042?v=2.9.48&amp;r=stable" async=""></script><script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script><script nonce="">window._cstart=+new Date();</script>
             <meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
  <meta charset="UTF-8">


            <link rel="stylesheet" href="{{ asset('css/front-end/home_page_styles/files/toastr.min.css')}}">

            <meta charset="utf-8">
            <meta property="og:title" content="salescrap.online" />
            <meta property="og:image" content="www.salescrap.online/Image-Building/5a66f4a440a12building.gif">
            <meta property="og:description" content="Ads post by Name:Awais Phone Number:03016660717">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style type="text/css">
                /*.password_left{
                     background-color: white !important;
                     background-image: none !important;
                }
                .success_message{
                    color: #35A85E!important;
                    font-size: 0.75rem;
                    font-weight: 800;
                    display:none;
                    text-align: left !important;
                }

                 .subscirbed_already{
                    font-size: 0.875rem !important;
                    font-family: 'Muli', sans-serif !important;
                    font-weight: 700 !important;
                    color: #dc3545 !important;
                    position: absolute;
                    padding-top: 5px;
                }
                #economic_error{
                    font-size: 0.875rem !important;
                    font-family: 'Muli', sans-serif !important;
                    font-weight: 700 !important;
                    color: white !important;
                    position: absolute;
                    padding-top: 5px;
                }
                #event_error{
                    font-size: 0.875rem !important;
                    font-family: 'Muli', sans-serif !important;
                    font-weight: 700 !important;
                    color: #dc3545 !important;
                    position: absolute;
                    padding-top: 5px;
                }
                #footer_subscirbed_already{
                    font-size: 0.75rem !important;
                    font-family: 'Muli', sans-serif !important;
                    font-weight: 700 !important;
                    color: white !important;
                    position: absolute;
                    padding-top: 5px;
                }
                #success_event{
                    color: #35A85E !important;
                    font-weight: 700;
                    font-size: 0.875rem !important;
                    padding-top: 5px;
                    position: absolute;
                    z-index: 1;
                }
                #success-resources{
                     color: #35A85E !important;
                     font-weight: 700;
                     font-size: 0.875rem !important;
                     padding-top: 5px;
                     position: absolute;
                     z-index: 1;
                }
                #email-error{
                    font-size: 0.75rem !important;
                    font-family: 'Muli', sans-serif !important;
                    font-weight: 700 !important;
                    color: white !important;
                    position: absolute;
                    padding-top: 5px;
                }
                #resources_error{
                    font-size: 0.875rem !important;
                    font-family: 'Muli', sans-serif !important;
                    font-weight: 700 !important;
                    color: #dc3545 !important;
                    position: absolute;
                    padding-top: 5px;
                }
                #resources_already{
                    font-size: 0.875rem !important;
                    font-family: 'Muli', sans-serif !important;
                    font-weight: 700 !important;
                    color: #dc3545 !important;
                    position: absolute;
                    padding-top: 5px;
                }*/
            </style>

            <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
            <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/algeria-favicon.svg')}}" />
            <!-- Meta Pixel Code -->

            <!-- End Meta Pixel Code -->

        </head>
        <!-- <a class="button-home" href="{{route('contactus')}}" title="@lang('navbar.contact')" target="_self" aria-hidden="false"> </a> -->
        <body>
            <div id="algeria-main-section" style="overflow-x: hidden;">
                @include('frontend/layouts/new_header')
                <div id="cover-spin-search" style="display:none;"></div>
                    <div id="div-content">
                    @yield('content')
                    </div>
                @include('frontend/layouts/footer')
                <div id="cover-spin" style="display:none;"></div>
                <div class="index-choice">
                    <select multiple class="multi-choice"></select>
                </div>
            </div>
            @yield('modals')
        </body>
        @yield('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="{{ asset('css/front-end/home_page_styles/assets/js/jquery.slicknav.min.js')}}"></script>
        <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('css/front-end/home_page_styles/assets/js/slick.min.js')}}"></script>
        <!-- Nice-select, sticky -->

        <!-- Jquery Plugins, main Jquery -->
        <script src="{{ asset('css/front-end/home_page_styles/assets/js/plugins.js')}}"></script>
        <script src="{{ asset('css/front-end/home_page_styles/assets/js/main.js')}}"></script>

        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '319416819891149');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=319416819891149&ev=PageView&noscript=1"
            /></noscript>


       <script type="text/javascript">

         $(document).ready(function(){
             changeCurrency();
            $(".login_btn").click(function(){
                $("#login-modal-id").css('display','block');
                $("#login-modal-id").addClass('show');
                $(".mid-header__right").css('display','block');
                $('#login-modal-id').css("opacity", "1");
            });

            $("button.close.grey-close").click(function(){
                $("#login-modal-id").css('display','none');
                // $(".mid-header__right").css('display','none');
            });


            $('#currency').on('change', function(e){
                /*var selected = $(this).find('option:selected');
                var currency = selected.text();
                var currency_key = selected.data('key');
                $('#currency-value').val(currency_key);
                $('#currency-value-span').html(currency_key);
                $('#currency-unit').html(currency);*/
                changeCurrency();
            });

            // --Shows forget password popup-----
             $("#forget_password").click(function(){
                   $('#login_formmodal').hide();
                   $('#forget_modal').show();
                   $(".success_message").css('display','none');
            });
             // ------------------------------------
             // --Shows Login password popup-----
            $("#loign_formshow").click(function(){
                  $('#login_formmodal').show();
                   $('#forget_modal').hide();
                   $(".success_message").css('display','none');
            });



            $('body').on('submit','.login_submit_form',function(e){
                e.preventDefault();
                addLoader(true);
                $( '#name-error' ).html( "" );
                $( '#password-error' ).html( "" );
                $("#email_password_error").html("");
                $.ajax({
                    type: "POST",
                    url:"{{route('customer-login')}}",
                    data: $(this).serialize(),
                    success: function(data) {
                        addLoader(false);
                        if(data.errors){
                            if(data.errors.customer_username){
                                $('input[name=customer_username]').addClass('is-invalid');
                                var error_username = `@lang('signup.login_username')`;
                                $( '.name-error' ).addClass('invalid-feedback ').html(error_username);
                                $('.invalid-feedback').css('display','block');

                            }
                            if(data.errors.customer_password){
                                $('input[name=customer_password]').addClass('is-invalid');
                                var error_pass = `@lang('signup.login_password')`;
                                $( '.pass_error' ).addClass('invalid-feedback ').html(error_pass);
                                $('.invalid-feedback').css('display','block');
                            }
                        }
                        if(data.success){
                            window.location.href = data.prev_route;
                        }
                        if(data.login_error){
                            $( '#email_password_error' ).html(data.login_error);
                        }
                        if(data.mail_sent){

                            $( '.invalid-feedback' ).css('display', 'none');
                            $( '.success_message' ).css('display', 'block');
                            $( '#mail_sent' ).html(data.mail_sent);
                        }
                    }
                });
            });

            @if(Session::has('openLogin') && Session::get('openLogin'))
                    @if(Session::get('openLoginCount') > 1)
                        @php
                            Session::forget('openLoginCount');
                            Session::forget('openLogin');
                        @endphp
                    @else
                    @php
                        Session::put('openLoginCount', (Session::has('openLoginCount')) ? (Session::get('openLoginCount') + 1): 1);
                    @endphp
                    $("#loign_formshow").trigger('click');
                    @endif

            @endif

            // -----------------Submit Forget Password form-------------------
            $('body').on('submit', ".forget_form", function(e){
                e.preventDefault();
                addLoader(true);
                $('.send_email_passlink').html('Sending..');
                $(".send_email_passlink").attr("disabled", true);
                $('.bd-example-modal-lg').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $.ajax({
                    type: "POST",
                    url:"{{route('customer.password.email')}}",
                    data: $(this).serialize(),
                    success: function(data) {
                        addLoader(false);
                        if(data.success){
                            $("#useremail").removeClass('is-invalid');
                            $(".invalid-feedback").find("strong").html('');
                            $(".success_message").css('display','block');
                            $('.success_message').html(data.success);
                            $(".send_email_passlink").attr("disabled", false);
                            $('.send_email_passlink').html('Send password');
                            $("#useremail").val('');
                        }
                        if(data.errors){
                            $("#useremail").addClass('is-invalid');
                            $(".invalid-feedback").find("strong").html(data.errors);
                            $(".send_email_passlink").attr("disabled", false);
                            $('.send_email_passlink').html('Send password');
                        }
                    }
                });
            });
            // -------------------End here-------------------------------------
        });

         function changeCurrency(){
             var selected = $('#currency').find('option:selected');
             var currency = selected.text();
             var currency_key = selected.data('key');
             $('#currency-value').val(currency_key);
             $('#currency-value-span').html(currency_key);
             $('#currency-unit').html(currency);
         }

        function addLoader(mode) {
            if (mode) {
                $('#cover-spin').show(0);
            }
            else {
                $('#cover-spin').css('display', 'none');
            }
        }

          // -- advertisement click
          var csrf = "{{csrf_token()}}";
          function adClick(ad_id){
            $.ajax({
                type: "POST",
                data:{
                    _token:csrf,
                    ad_id:ad_id
                },
                url: "{{route('advertisement.click')}}",
                success: function(data)
                {
                }
            });
          }
      </script>
      @include('frontend.newsletters.footer-subscribe')
    </html>
