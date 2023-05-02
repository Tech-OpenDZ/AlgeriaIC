<script type="text/javascript">
    $(document).ready(function(){
        // ----Footer Events Subscribe------
            $(document).on('click','.footer_event',function(e){
                e.preventDefault();
                var type = $("#event_subscribe").val();
                var email = $("#subscribe-email").val();

                $.ajax({
                    url : '{{route("subscribe_newsletters")}}',
                    type : "POST",
                    data : {type:type,email:email, _token:"{{csrf_token()}}"},
                    beforeSend: function() {
                        $('#spinner').css('display','inline-block');
                        $('.footer_event').prop('disabled', true);
                    },
                    success : function (data)
                    {
                        $('#spinner').css('display','none');
                        $('.footer_event').prop('disabled', false);

                        if(data.errors){
                            if(data.errors.email){
                                // $("#email-error").addClass("invalid-feedback");
                                // $(".invalid-feedback").css('display','block');
                                $("#email-error").html(data.errors.email);
                                $("#success_event").css('display','none');
                                $("#footer_subscirbed_already").css('display','none');
                            }
                        }
                        if(data.success){

                            $("#email-error").html('');
                            $("#subscribe-email").val('');
                            $("#success_event").css('display','block');
                            $("#success_event").html(data.success);
                            $("#footer_subscirbed_already").css('display','none');
                            // $(".invalid-feedback").html(data.errors.email);
                        }
                        if(data.subscribed){
                            $(".success-event").css('display','none');
                            $("#success_event").css('display','none');
                            $("#email-error").html('');
                            $("#subscribe-email").val('');
                            // $("#footer_subscirbed_already").addClass('subscirbed_already');s
                            $("#footer_subscirbed_already").css('display','block');
                            $("#footer_subscirbed_already").html(data.subscribed);
                            // $(".invalid-feedback").html(data.errors.email);
                        }
                    }
                });
            });
        // ----Events END-----
        // ----Events Subscribe------
            $(document).on('click','.event_submit',function(e){
                e.preventDefault();
                    var type = $(".event_subscribe").val();
                    var email = $(".subscribe_email").val();
                    $.ajax({
                            url : '{{route("subscribe_newsletters")}}',
                            type : "POST",
                            data : {type:type,email:email, _token:"{{csrf_token()}}"},
                            beforeSend: function() {
                                $('#spinner-event').css('display','inline-block');
                                $('.event_submit').prop('disabled', true);
                            },
                            success : function (data)
                            {
                                console.log("event");
                                $('#spinner-event').css('display','none');
                                $('.event_submit').prop('disabled', false);
                                if(data.errors){
                                    if(data.errors.email){
                                        // $(".subscribe_email").addClass('is-invalid');
                                        $("#event_error").css('display','block');
                                        $("#event_error").html(data.errors.email);
                                        $(".success-event").css('display','none');
                                        $(".subscirbed_already").css('display','none');
                                    }
                                }
                                if(data.success){
                                    console.log(5456);

                                    // $(".subscribe_email").removeClass('is-invalid');
                                    $("#event_error").html('');
                                    $(".subscribe_email").val('');
                                    $(".success-event").css('display','block');
                                    $(".success-event").html(data.success);
                                    $(".subscirbed_already").css('display','none');
                                    // $(".invalid-feedback").html(data.errors.email);
                                }
                                if(data.subscribed){
                                    $(".success-event").css('display','none');
                                    // $(".subscribe_email").removeClass('is-invalid');
                                    $("#event_error").html('');
                                    $(".subscribe_email").val('');
                                    $(".subscirbed_already").css('display','block');
                                    $(".subscirbed_already").html(data.subscribed);
                                    // $(".invalid-feedback").html(data.errors.email);
                                }
                            }
                    });
            });
        // ----Events END-----

        $(document).on('click','.event_newsletter_submit',function(e){
                e.preventDefault();
                    var type = $(".event_subscribe").val();
                    var email = $(".subscribe_email").val();
                    $.ajax({
                            url : '{{route("subscribe_newsletters")}}',
                            type : "POST",
                            data : {type:type,email:email, _token:"{{csrf_token()}}"},
                            beforeSend: function() {
                                $('#spinner-economic').css('display','inline-block');
                                $('.event_newsletter_submit').prop('disabled', true);
                            },
                            success : function (data)
                            {
                                $('#spinner-economic').css('display','none');
                                $('.event_newsletter_submit').prop('disabled', false);
                                if(data.errors){
                                    if(data.errors.email){
                                        // $(".subscribe_email").addClass('is-invalid');
                                        $("#event_error").css('display','block');
                                        $("#event_error").html(data.errors.email);
                                        $(".success-event").css('display','none');
                                        $(".subscirbed_already").css('display','none');
                                    }
                                }
                                if(data.success){
                                    // $(".subscribe_email").removeClass('is-invalid');
                                    $("#event_error").html('');
                                    $(".subscribe_email").val('');
                                    $(".success-event").css('display','block');
                                    $(".success-event").html(data.success);
                                    $(".subscirbed_already").css('display','none');
                                    // $(".invalid-feedback").html(data.errors.email);
                                }
                                if(data.subscribed){
                                    console.log(5456);
                                    $(".success-event").css('display','none');
                                    // $(".subscribe_email").removeClass('is-invalid');
                                    $("#event_error").html('');
                                    $(".subscribe_email").val('');
                                    $(".subscirbed_already").css('display','block');
                                    $(".subscirbed_already").html(data.subscribed);
                                    // $(".invalid-feedback").html(data.errors.email);
                                }
                            }
                    });
            });
    });

</script>
