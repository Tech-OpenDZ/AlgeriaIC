<!-- <h5>{{$user}},</h5>
<span>@lang('press_review.confirmation_text')</span>
<br>
<br>
<span>@lang('press_review.thank_you_text')</span> -->
@extends('frontend.layouts.email.master')
@if($locale == 'en')
    @section('email_content')
        <tr>
            <td class=content_wrapper_td cellspacing=0 cellpadding=0 border=0 style="border-collapse:collapse; -premailer-cellpadding:0; -premailer-cellspacing:0;width:100%">
                <table class=innerwrapper1 align=center border=0 cellpadding=0 cellspacing=0 class="holder_wrap_inner flexible" style="width:550px; -premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; font-family:Roboto,Arial; font-weight:normal; margin:0; mso-table-lspace:0; mso-table-rspace:0; width:100%; " width=550>
                    <tr>
                        <td class="bigger_wrapper_body flexible" width=100% style="border-collapse:collapse; margin:0; padding-bottom:0px; padding-top:34px;text-align: left;font-family:Google Sans, Roboto, Arial;background-color:#ffffff; padding-left:50px;">
                            <table width=100% class=flexible cellpadding=0 cellspacing=0 border=0 style=width:100%;>
                                <tr>
                                    <td id=outer_cover class=headline width=100% style=border-collapse:collapse;>
                                        <table width=100% class=flexible cellpadding=0 cellspacing=0 border=0 style=width:100%;>
                                            <tr>
                                                <td class=headertd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:0px; padding-top:7px; padding-bottom:10px; font-family: google sans,roboto,arial; font-weight:500; color:#3C4043; font-size:32px; line-height:40px; letter-spacing:0px;">
                                                    @lang('press_review.your')<span style=color:#22B573;>&nbsp;@lang('press_review.press_review')&nbsp;</span>@lang('press_review.is_submitted_successfully').
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align=right width=100 class=calender_icon style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign=top>

                                        <img class=heroimgtd src=https://i.ibb.co/23DSjgM/confirmation.png style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width=100 alt="G Suite billing info icon">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class=paratxt_td style="border-collapse:initial; padding-left: 50px; padding-right: 50px;  ">
                <table width=500 cellspacing=0 cellpadding=0 border=0 margin=0 padding=0 style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;padding-left:50px; padding-right:50px; border-top:1px solid #E8EAED;">
                    <tr>
                        <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:26px; padding-bottom:0px; font-family: Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                            @lang('press_review.dear')  {{ $user }},
                        </td>
                    </tr>
                    <tr>
                        <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:21px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                            &nbsp;@lang('press_review.the_press_review_you_requested_on') <span style=color:#22B573><strong> @lang('press_review.algeria_invest') </strong></span>@lang('press_review.has_been_submitted_successfully'). <br> @lang('press_review.here_is_a_summary_of_your_press_review_request'):
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class=grey_section style="padding-left: 50px;padding-top:7px; padding-right:50px;padding-bottom:9px;background-color:#ffffff;">
                <table bgcolor="#f1f3f4" width=100% cellspacing=0 cellpadding=0 border=0 style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0;background-color:#f1f3f4">
                    <tr>
                        <td class=left-right-spacing style="padding-left: 25px; padding-right: 25px;  padding-top:20px; padding-bottom:20px;">
                            <table style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:initial; font-family:roboto, arial;  font-weight:normal; mso-table-lspace:0; mso-table-rspace:0;align=center" width=100% cellpadding=0 cellspacing=0>
                                <tr>
                                    <td style="border-collapse:initial; font-size:12px; padding-top:0px; padding-left: 0px; padding-bottom:0px; padding-right: 0px;  ">
                                        <table width=100% cellspacing=0 cellpadding=0 border=0 margin=0 padding=0 style="premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">@lang('press_review.sector'):</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                    <a class=appleLinks rel=nofollow style="text-decoration:none; color:#3C4043;cursor: text">{{ $searched_criteria['sectors']}}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;padding-bottom:3px;">
                                                    <span style="font-family:Roboto, arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;">@lang('press_review.source'):</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                {{ $searched_criteria['source']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.period'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                From {{ $searched_criteria['start_date']}} to {{ $searched_criteria['end_date']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.results'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                {{ $searched_criteria['articles']}} articles
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.price'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                {{ $searched_criteria['price']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.payment_method'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 2px;">
                                                {{ $searched_criteria['payment_method']}}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td> 
        </tr>
        <tr>
            <td class=paratxt_td style="border-collapse:initial; padding-left: 50px; padding-right: 50px; ">
                <table width=500 cellspacing=0 cellpadding=0 border=0 margin=0 padding=0 style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                    <tr>
                        <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                            @lang('press_review.confirmation_text_email')
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class=paraclass width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:12px; padding-bottom:0px; font-family: Google Sans, Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                @lang('press_review.email_thank_you_text')
            </td>
        </tr>
        <tr>
            <td class=paraclass width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:28px; font-family: Google Sans, Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                @lang('press_review.the_algeria_invest_team')
            </td>
        </tr>
    @endsection
@elseif($locale == 'fr') 
    @section('email_content')
        <tr>
            <td class=content_wrapper_td cellspacing=0 cellpadding=0 border=0 style="border-collapse:collapse; -premailer-cellpadding:0; -premailer-cellspacing:0;width:100%">
                <table class=innerwrapper1 align=center border=0 cellpadding=0 cellspacing=0 class="holder_wrap_inner flexible" style="width:550px; -premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; font-family:Roboto,Arial; font-weight:normal; margin:0; mso-table-lspace:0; mso-table-rspace:0; width:100%; " width=550>
                    <tr>
                        <td class="bigger_wrapper_body flexible" width=100% style="border-collapse:collapse; margin:0; padding-bottom:0px; padding-top:34px;text-align: left;font-family:Google Sans, Roboto, Arial;background-color:#ffffff; padding-left:50px;">
                            <table width=100% class=flexible cellpadding=0 cellspacing=0 border=0 style=width:100%;>
                                <tr>
                                    <td id=outer_cover class=headline width=100% style=border-collapse:collapse;>
                                        <table width=100% class=flexible cellpadding=0 cellspacing=0 border=0 style=width:100%;>
                                            <tr>
                                                <td class=headertd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:0px; padding-top:7px; padding-bottom:10px; font-family: google sans,roboto,arial; font-weight:500; color:#3C4043; font-size:32px; line-height:40px; letter-spacing:0px;">
                                                    @lang('press_review.your')<span style=color:#22B573;>&nbsp;@lang('press_review.press_review')&nbsp;</span>@lang('press_review.is_submitted_successfully').
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align=right width=100 class=calender_icon style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign=top>

                                        <img class=heroimgtd src=https://i.ibb.co/23DSjgM/confirmation.png style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width=100 alt="G Suite billing info icon">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class=paratxt_td style="border-collapse:initial; padding-left: 50px; padding-right: 50px;  ">
                <table width=500 cellspacing=0 cellpadding=0 border=0 margin=0 padding=0 style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;padding-left:50px; padding-right:50px; border-top:1px solid #E8EAED;">
                    <tr>
                        <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:26px; padding-bottom:0px; font-family: Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                            @lang('press_review.dear')  {{ $user }},
                        </td>
                    </tr>
                    <tr>
                        <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:21px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                            &nbsp;@lang('press_review.the_press_review_you_requested_on') <span style=color:#22B573><strong> @lang('press_review.algeria_invest') </strong></span>@lang('press_review.has_been_submitted_successfully'). <br> @lang('press_review.here_is_a_summary_of_your_press_review_request'):
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class=grey_section style="padding-left: 50px;padding-top:7px; padding-right:50px;padding-bottom:9px;background-color:#ffffff;">
                <table bgcolor="#f1f3f4" width=100% cellspacing=0 cellpadding=0 border=0 style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0;background-color:#f1f3f4">
                    <tr>
                        <td class=left-right-spacing style="padding-left: 25px; padding-right: 25px;  padding-top:20px; padding-bottom:20px;">
                            <table style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:initial; font-family:roboto, arial;  font-weight:normal; mso-table-lspace:0; mso-table-rspace:0;align=center" width=100% cellpadding=0 cellspacing=0>
                                <tr>
                                    <td style="border-collapse:initial; font-size:12px; padding-top:0px; padding-left: 0px; padding-bottom:0px; padding-right: 0px;  ">
                                        <table width=100% cellspacing=0 cellpadding=0 border=0 margin=0 padding=0 style="premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">@lang('press_review.sector'):</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                    <a class=appleLinks rel=nofollow style="text-decoration:none; color:#3C4043;cursor: text">{{ $searched_criteria['sectors']}}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;padding-bottom:3px;">
                                                    <span style="font-family:Roboto, arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;">@lang('press_review.source'):</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                {{ $searched_criteria['source']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.period'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                Du {{ $searched_criteria['start_date']}} au {{ $searched_criteria['end_date']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.results'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                {{ $searched_criteria['articles']}} articles
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.price'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                {{ $searched_criteria['price']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.payment_method'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 2px;">
                                                {{ $searched_criteria['payment_method']}}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td> 
        </tr>
        <tr>
            <td class=paratxt_td style="border-collapse:initial; padding-left: 50px; padding-right: 50px; ">
                <table width=500 cellspacing=0 cellpadding=0 border=0 margin=0 padding=0 style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                    <tr>
                        <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                            @lang('press_review.confirmation_text_email')
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class=paraclass width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:12px; padding-bottom:0px; font-family: Google Sans, Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                @lang('press_review.email_thank_you_text')
            </td>
        </tr>
        <tr>
            <td class=paraclass width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:28px; font-family: Google Sans, Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                @lang('press_review.the_algeria_invest_team')
            </td>
        </tr>
    @endsection
@elseif($locale == 'ar')
    @section('email_content')
        <tr>
            <td class=content_wrapper_td cellspacing=0 cellpadding=0 border=0 style="border-collapse:collapse; -premailer-cellpadding:0; -premailer-cellspacing:0;width:100%">
                <table class=innerwrapper1 align=center border=0 cellpadding=0 cellspacing=0 class="holder_wrap_inner flexible" style="width:550px; -premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; font-family:Roboto,Arial; font-weight:normal; margin:0; mso-table-lspace:0; mso-table-rspace:0; width:100%; " width=550>
                    <tr>
                        <td class="bigger_wrapper_body flexible" width=100% style="border-collapse:collapse; margin:0; padding-bottom:0px; padding-top:34px;text-align: left;font-family:Google Sans, Roboto, Arial;background-color:#ffffff; padding-left:50px;">
                            <table width=100% class=flexible cellpadding=0 cellspacing=0 border=0 style=width:100%;>
                                <tr>
                                    <td id=outer_cover class=headline width=100% style=border-collapse:collapse;>
                                        <table width=100% class=flexible cellpadding=0 cellspacing=0 border=0 style=width:100%;>
                                            <tr>
                                                <td class=headertd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:0px; padding-top:7px; padding-bottom:10px; font-family: google sans,roboto,arial; font-weight:500; color:#3C4043; font-size:32px; line-height:40px; letter-spacing:0px;">
                                                    @lang('press_review.your')<span style=color:#22B573;>&nbsp;@lang('press_review.press_review')&nbsp;</span>@lang('press_review.is_submitted_successfully').
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align=right width=100 class=calender_icon style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign=top>

                                        <img class=heroimgtd src=https://i.ibb.co/23DSjgM/confirmation.png style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width=100 alt="G Suite billing info icon">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class=paratxt_td style="border-collapse:initial; padding-left: 50px; padding-right: 50px;  ">
                <table width=500 cellspacing=0 cellpadding=0 border=0 margin=0 padding=0 style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;padding-left:50px; padding-right:50px; border-top:1px solid #E8EAED;">
                    <tr>
                        <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:26px; padding-bottom:0px; font-family: Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                            @lang('press_review.dear')  {{ $user }},
                        </td>
                    </tr>
                    <tr>
                        <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:21px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                            &nbsp;@lang('press_review.the_press_review_you_requested_on') <span style=color:#22B573><strong> @lang('press_review.algeria_invest') </strong></span>@lang('press_review.has_been_submitted_successfully'). <br> @lang('press_review.here_is_a_summary_of_your_press_review_request'):
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class=grey_section style="padding-left: 50px;padding-top:7px; padding-right:50px;padding-bottom:9px;background-color:#ffffff;">
                <table bgcolor="#f1f3f4" width=100% cellspacing=0 cellpadding=0 border=0 style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0;background-color:#f1f3f4">
                    <tr>
                        <td class=left-right-spacing style="padding-left: 25px; padding-right: 25px;  padding-top:20px; padding-bottom:20px;">
                            <table style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:initial; font-family:roboto, arial;  font-weight:normal; mso-table-lspace:0; mso-table-rspace:0;align=center" width=100% cellpadding=0 cellspacing=0>
                                <tr>
                                    <td style="border-collapse:initial; font-size:12px; padding-top:0px; padding-left: 0px; padding-bottom:0px; padding-right: 0px;  ">
                                        <table width=100% cellspacing=0 cellpadding=0 border=0 margin=0 padding=0 style="premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">@lang('press_review.sector'):</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                    <a class=appleLinks rel=nofollow style="text-decoration:none; color:#3C4043;cursor: text">{{ $searched_criteria['sectors']}}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;padding-bottom:3px;">
                                                    <span style="font-family:Roboto, arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;">@lang('press_review.source'):</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                {{ $searched_criteria['source']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.period'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                From {{ $searched_criteria['start_date']}} to {{ $searched_criteria['end_date']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.results'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                {{ $searched_criteria['articles']}} articles
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.price'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                {{ $searched_criteria['price']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                    @lang('press_review.payment_method'):
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 2px;">
                                                {{ $searched_criteria['payment_method']}}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td> 
        </tr>
        <tr>
            <td class=paratxt_td style="border-collapse:initial; padding-left: 50px; padding-right: 50px; ">
                <table width=500 cellspacing=0 cellpadding=0 border=0 margin=0 padding=0 style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                    <tr>
                        <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                            @lang('press_review.confirmation_text_email')
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class=paraclass width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:12px; padding-bottom:0px; font-family: Google Sans, Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                @lang('press_review.email_thank_you_text')
            </td>
        </tr>
        <tr>
            <td class=paraclass width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:28px; font-family: Google Sans, Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                @lang('press_review.the_algeria_invest_team')
            </td>
        </tr>
    @endsection
@endif
