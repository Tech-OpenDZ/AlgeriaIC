@extends('frontend.layouts.email.master')
        @if($locale == 'en')
            @section('email_content')
                <tr>
                    <td class="content_wrapper_td" cellspacing="0" border="0" style="border-collapse:collapse; -premailer-cellpadding:0; -premailer-cellspacing:0;width:100%">
                        <table class="innerwrapper1" align="center" border="0" cellpadding="0" cellspacing="0" class="holder_wrap_inner flexible" style="width:550px; -premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; font-family:Roboto,Arial; font-weight:normal; margin:0; mso-table-lspace:0; mso-table-rspace:0; width:100%; "
                            width="550">
                            <tr>
                                <td class="bigger_wrapper_body flexible" width="100%" style="border-collapse:collapse; margin:0; padding-bottom:0px; padding-top:34px;text-align: left;font-family:Google Sans, Roboto, Arial;background-color:#ffffff; padding-left:50px;">
                                    <table width="100%" class=flexible cellpadding="0" cellspacing="0" border="0" style=width:100%;>
                                        <tr>
                                            <td id="outer_cover" class="headline" width="100%" style=border-collapse:collapse;>
                                                <table width="100%" class="flexible" cellpadding="0" cellspacing="0" border="0" style=width:100%;>
                                                    <tr>
                                                        <td class=headertd width=500 align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:0px; padding-top:7px; padding-bottom:10px; font-family: google sans,roboto,arial; font-weight:500; color:#3C4043; font-size:32px; line-height:40px; letter-spacing:0px;">
                                                            Payment canceled for the

                                                            <span style=color:#ED1C24;>{{$user['subscription']->localeAll[0]->name}} Pack.</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align=right width=100 class=calender_icon style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign=top>
                                                <img class=heroimgtd src=https://i.ibb.co/mhpL2r3/confirmation-red.png style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width=100 alt="G Suite billing info icon">
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
                        <table width=500 cellspacing="0" border="0" margin="0" padding="0" style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;padding-left:50px; padding-right:50px; border-top:1px solid #E8EAED;">
                            <tr>
                                <td class=paratxt_subtd width=500 align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:26px; padding-bottom:0px; font-family: Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Dear {{$user['name']}},
                                </td>
                            </tr>

                            <tr>
                                <td class=paratxt_subtd width=500 align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Your request for the
                                    <span style=color:#ED1C24><strong>{{$user['subscription']->localeAll[0]->name}} Pack</strong></span> subscription has been canceled
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class=paraclass width=500 align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:0px; font-family: Google Sans, Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                        Thank you for using our website,
                    </td>
                </tr>
                <tr>
                    <td class=paraclass width=500 align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:28px; font-family: Google Sans, Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                        The Algeria Invest Team
                    </td>
                </tr>
            @endsection
        @elseif($locale == 'fr')
            @section('email_content')
                <tr>
                    <td class=content_wrapper_td cellspacing=0 cellpadding=0 border=0 style="border-collapse:collapse; -premailer-cellpadding:0; -premailer-cellspacing:0;width:100%">
                        <table class=innerwrapper1 align=center border=0 cellpadding=0 cellspacing=0 class="holder_wrap_inner flexible" style="width:550px; -premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; font-family:Roboto,Arial; font-weight:normal; margin:0; mso-table-lspace:0; mso-table-rspace:0; width:100%; "
                            width=550>
                            <tr>
                                <td class="bigger_wrapper_body flexible" width=100% style="border-collapse:collapse; margin:0; padding-bottom:0px; padding-top:34px;text-align: left;font-family:Google Sans, Roboto, Arial;background-color:#ffffff; padding-left:50px;">
                                    <table width=100% class=flexible cellpadding=0 cellspacing=0 border=0 style=width:100%;>
                                        <tr>
                                            <td id=outer_cover class=headline width=100% style=border-collapse:collapse;>
                                                <table width=100% class=flexible cellpadding=0 cellspacing=0 border=0 style=width:100%;>
                                                    <tr>
                                                        <td class=headertd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:0px; padding-top:7px; padding-bottom:10px; font-family: google sans,roboto,arial; font-weight:500; color:#3C4043; font-size:32px; line-height:40px; letter-spacing:0px;">
                                                            Votre paiement a été annulé pour le

                                                            <span style=color:#ED1C24;>Pack {{$user['subscription']->localeAll[0]->name}}.</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align=right width=100 class=calender_icon style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign=top>
                                                <img class=heroimgtd src=https://i.ibb.co/mhpL2r3/confirmation-red.png style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width=100 alt="G Suite billing info icon">
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
                                    Cher {{$user['name']}},
                                </td>
                            </tr>

                            <tr>
                                <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Votre demande d'inscription pour le <span style=color:#ED1C24><strong>Pack
                                    {{$user['subscription']->localeAll[0]->name}}</strong></span> a été annulé.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class=paraclass width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:0px; font-family: Google Sans, Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                        Merci d'utiliser notre site web,
                    </td>
                </tr>
                <tr>
                    <td class=paraclass width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:28px; font-family: Google Sans, Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                        L'équipe Algeria Invest
                    </td>
                </tr>
            @endsection
        @elseif($locale == 'ar')
            @section('email_content')
                <tr>
                    <td class="content_wrapper_td" cellspacing="0" border="0" style="border-collapse:collapse; -premailer-cellpadding:0; -premailer-cellspacing:0;width:100%">
                        <table class="innerwrapper1" align="center" border="0" cellpadding="0" cellspacing="0" class="holder_wrap_inner flexible" style="width:550px; -premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; font-family:Roboto,Arial; font-weight:normal; margin:0; mso-table-lspace:0; mso-table-rspace:0; width:100%; "
                            width="550">
                            <tr>
                                <td class="bigger_wrapper_body flexible" width="100%" style="border-collapse:collapse; margin:0; padding-bottom:0px; padding-top:34px;text-align: left;font-family:Google Sans, Roboto, Arial;background-color:#ffffff; padding-left:50px;">
                                    <table width="100%" class=flexible cellpadding="0" cellspacing="0" border="0" style=width:100%;>
                                        <tr>
                                            <td id="outer_cover" class="headline" width="100%" style=border-collapse:collapse;>
                                                <table width="100%" class="flexible" cellpadding="0" cellspacing="0" border="0" style=width:100%;>
                                                    <tr>
                                                        <td class=headertd width=500 align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:0px; padding-top:7px; padding-bottom:10px; font-family: google sans,roboto,arial; font-weight:500; color:#3C4043; font-size:32px; line-height:40px; letter-spacing:0px;">
                                                            Payment canceled for the

                                                            <span style=color:#ED1C24;>{{$user['subscription']->localeAll[0]->name}} Pack.</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align=right width=100 class=calender_icon style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign=top>
                                                <img class=heroimgtd src=https://i.ibb.co/mhpL2r3/confirmation-red.png style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width=100 alt="G Suite billing info icon">
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
                        <table width=500 cellspacing="0" border="0" margin="0" padding="0" style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;padding-left:50px; padding-right:50px; border-top:1px solid #E8EAED;">
                            <tr>
                                <td class=paratxt_subtd width=500 align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:26px; padding-bottom:0px; font-family: Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Dear {{$user['name']}},
                                </td>
                            </tr>

                            <tr>
                                <td class=paratxt_subtd width=500 align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Your request for the
                                    <span style=color:#ED1C24><strong>{{$user['subscription']->localeAll[0]->name}} Pack</strong></span> subscription has been canceled.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class=paraclass width=500 align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:0px; font-family: Google Sans, Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                        Thank you for using our website,
                    </td>
                </tr>
                <tr>
                    <td class=paraclass width=500 align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:28px; font-family: Google Sans, Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                        The Algeria Invest Team
                    </td>
                </tr>
            @endsection
        @endif
