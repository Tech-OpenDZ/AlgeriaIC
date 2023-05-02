
@extends('frontend.layouts.email.master')
        @if($locale == 'en')
            @section('email_content')

                <tr>
                     <td class="content_wrapper_td" cellspacing="0" border="0" style="border-collapse:collapse; -premailer-cellpadding:0; -premailer-cellspacing:0;width:100%">
                        <table class="innerwrapper1 holder_wrap_inner flexible" align="center" border="0" cellpadding="0" style="width:550px; -premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; font-family:Roboto,Arial; font-weight:normal; margin:0; mso-table-lspace:0; mso-table-rspace:0; width:100%; " width="550">
                            <tr>
                                <td class="bigger_wrapper_body flexible" width="100%" style="border-collapse:collapse; margin:0; padding-bottom:0px; padding-top:34px;text-align: left;font-family:Google Sans, Roboto, Arial;background-color:#ffffff; padding-left:50px;">
                                    <table width="100%" class="flexible" cellpadding="0"  border="0" style="width:100%;">
                                        <tr>
                                            <td id=outer_cover class="headline" width="100%" style=border-collapse:collapse;>
                                                <table width="100%" class="flexible" cellpadding="0"  border="0" style="width:100%;">
                                                    <tr>
                                                        <td class="headertd" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:0px; padding-top:7px; padding-bottom:10px; font-family: google sans,roboto,arial; font-weight:500; color:#3C4043; font-size:32px; line-height:40px; letter-spacing:0px;">
                                                            We have received your subscription request for the
                                                            <span style="color:#22B573;">{{$user['subscription']->localeAll[0]->name}} Pack.</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="right" width="100" class="calender_icon" style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign="top">
                                                <img class="heroimgtd" src="https://i.ibb.co/23DSjgM/confirmation.png" style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width="100" alt="G Suite billing info icon">
                                             </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="paratxt_td" style="border-collapse:initial; padding-left: 50px; padding-right: 50px;  ">
                        <table width="500" cellspacing="0" border="0" margin="0" padding="0" style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;padding-left:50px; padding-right:50px; border-top:1px solid #E8EAED;">
                            <tr>
                                <td class="paratxt_subtd" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:26px; padding-bottom:0px; font-family: Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Dear {{$user['name']}},
                                </td>
                            </tr>

                            <tr>
                                <td class="paratxt_subtd" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:21px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Here’s a summary of your
                                    <span style=color:#22B573><strong>{{$user['subscription']->localeAll[0]->name}} Pack</strong></span> subscription:
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="grey_section" style="padding-left: 50px;padding-top:7px; padding-right:50px;padding-bottom:9px;background-color:#ffffff;">

                        <table bgcolor="#f1f3f4" width="100%" cellspacing="0" border="0" style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0;background-color:#f1f3f4">
                            <tr>
                                <td class=left-right-spacing style="padding-left: 25px; padding-right: 25px;  padding-top:20px; padding-bottom:20px;">
                                    <table style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:initial; font-family:roboto, arial;  font-weight:normal; mso-table-lspace:0; mso-table-rspace:0;" align="center" width="100%" cellpadding="0" >
                                        <tr>
                                            <td style="border-collapse:initial; font-size:12px; padding-top:0px; padding-left: 0px; padding-bottom:0px; padding-right: 0px;  ">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" margin="0" padding="0" style="premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                            Modules:
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                            <a class="appleLinks" rel="nofollow" style="text-decoration:none; color:#3C4043;cursor: text">
                                                                <ul style="padding-left: 15px; margin-left: 0;">
                                                                    @php
                                                                        $pervModule = '';
                                                                        $currModule = '';
                                                                    @endphp
                                                                    @foreach($user['subscription']->permissions as $permission)
                                                                    @php
                                                                        $currModule = $permission->localeAll[0]->module;
                                                                    @endphp
                                                                    @if ($pervModule != $currModule)
                                                                    <li>{{$currModule}} </li>
                                                                        @php
                                                                            $pervModule = $currModule;
                                                                        @endphp
                                                                    @endif
                                                                    @endforeach
                                                                </ul>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;padding-bottom:3px;">
                                                            <span style="font-family:Roboto, arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;">
                                                                Payment method:
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                            {{__($user['paymentType'])}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                            Price:
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 2px;">
                                                            {{$user['price']}} {{$user['currency']}}
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
                    <td class="paratxt_td" style="border-collapse:initial; padding-left: 50px; padding-right: 50px; ">
                        <table width="500" cellspacing="0" cellpadding="0" border="0" margin="0" padding="0" style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                            <tr>
                                <td class="paratxt_subtd" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Your subscription will be approved once the payment is confirmed. <br>While waiting, you can enjoy the
                                    <a style="color:#3684C6"><Strong>Free Pack</strong></a> access:
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="ctatd" style="padding-left:50px;padding-top: 29px;padding-bottom: 32px;">
                        <table class="bluecta" style="margin: auto; -moz-border-radius:3px; -premailer-cellpadding:0; -premailer-cellspacing:0; -webkit-border-radius:3px; border-collapse:collapse; border-radius:3px; color:#3684C6; font-family:Google Sans,Arial; font-weight:500; mso-table-lspace:0; mso-table-rspace:0;" height="40" align="left" bgcolor="#1A73E8" cellpadding="0" >
                            <tr>
                                <td style="text-align: center; padding: 7px 4px 9px 6px; border-collapse:collapse">
                                    <a style="-khtml-border-radius:2px; -moz-border-radius:3px; -moz-border-radius-bottomleft:0; -moz-border-radius-bottomright:3px; -moz-border-radius-topleft:0; -moz-border-radius-topright:3px; -ms-border-radius:2px; -o-border-radius:2px; -webkit-border-bottom-left-radius:3px; -webkit-border-bottom-right-radius:3px; -webkit-border-radius:3px; -webkit-border-top-left-radius:0; -webkit-border-top-right-radius:3px; background-color:#1A73E8; border-bottom-left-radius:3px; border-bottom-right-radius:3px; border-color:#1A73E8; border-radius:3px; border-style:solid; border-top-left-radius:3px; border-top-right-radius:3px; color:#ffffff; display:inline-block; font-family:Google Sans, Arial; font-size:14px; font-weight:500; line-height:24px; margin:0; mso-hide:all; text-align:center; text-decoration:none" target="_blank" href="{{route('customer-home')}}" bgcolor="#1A73E8" align="center">
                                        <span align="center" style="-webkit-text-size-adjust: none; display: block;padding-left:7px;padding-right:9px;">
                                            Click here
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="paraclass" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:0px; font-family: Google Sans, Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                        Thank you for using our website,
                    </td>
                </tr>
                <tr>
                    <td class="paraclass" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:28px; font-family: Google Sans, Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                        The Algeria Invest Team
                    </td>
                </tr>
            @endsection
        @elseif($locale == 'fr')
            @section('email_content')
                <tr>
                    <td class=content_wrapper_td cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse; -premailer-cellpadding:0; -premailer-cellspacing:0;width:100%">
                        <table class="innerwrapper1" align="center" border="0" cellpadding="0" cellspacing="0" class="holder_wrap_inner flexible" style="width:550px; -premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; font-family:Roboto,Arial; font-weight:normal; margin:0; mso-table-lspace:0; mso-table-rspace:0; width:100%; "
                            width="550">
                            <tr>
                                <td class="bigger_wrapper_body flexible" width="100%" style="border-collapse:collapse; margin:0; padding-bottom:0px; padding-top:34px;text-align: left;font-family:Google Sans, Roboto, Arial;background-color:#ffffff; padding-left:50px;"> 
                                    <table width="100%" class=flexible cellpadding="0" cellspacing="0" border="0" style=width:100%;>
                                        <tr>
                                           <td id=outer_cover class=headline width="100%" style=border-collapse:collapse;>
                                                <table width="100%" class=flexible cellpadding="0" cellspacing="0" border="0" style=width:100%;>
                                                    <tr>
                                                        <td class=headertd width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:0px; padding-top:7px; padding-bottom:10px; font-family: google sans,roboto,arial; font-weight:500; color:#3C4043; font-size:32px; line-height:40px; letter-spacing:0px;">
                                                            Nous avons reçu votre demande d'inscription au

                                                            <span style=color:#22B573;>Pack {{$user['subscription']->localeAll[0]->name}}.</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="right" width="100" class="calender_icon" style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign="top">
                                                <img class="heroimgtd" src="https://i.ibb.co/23DSjgM/confirmation.png" style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width="100" alt="G Suite billing info icon">
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
                        <table width="500" cellspacing="0" cellpadding="0" border="0" margin="0" padding="0" style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;padding-left:50px; padding-right:50px; border-top:1px solid #E8EAED;">
                            <tr>
                                <td class=paratxt_subtd width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:26px; padding-bottom:0px; font-family: Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Chère {{$user['name']}},
                                </td>
                            </tr>

                            <tr>
                                <td class=paratxt_subtd width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:21px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Voici le résumé de votre inscription au <span style=color:#22B573><strong>Pack
                                    {{$user['subscription']->localeAll[0]->name}}</strong></span> :
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class=grey_section style="padding-left: 50px;padding-top:7px; padding-right:50px;padding-bottom:9px;background-color:#ffffff;">

                        <table bgcolor=#f1f3f4 width="100%" cellspacing="0" cellpadding="0" border="0" style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0;background-color:#f1f3f4">
                            <tr>
                                <td class=left-right-spacing style="padding-left: 25px; padding-right: 25px;  padding-top:20px; padding-bottom:20px;">
                                    <table style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:initial; font-family:roboto, arial;  font-weight:normal; mso-table-lspace:0; mso-table-rspace:0;" align="center" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="border-collapse:initial; font-size:12px; padding-top:0px; padding-left: 0px; padding-bottom:0px; padding-right: 0px;  ">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" margin="0" padding="0" style="premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                            Modules:</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">

                                                            <a class=appleLinks rel=nofollow style="text-decoration:none; color:#3C4043;cursor: text">
                                                                <ul style="padding-left: 15px; margin-left: 0;">
                                                                    @php
                                                                        $pervModule = '';
                                                                        $currModule = '';
                                                                    @endphp
                                                                    @foreach($user['subscription']->permissions as $permission)
                                                                    @php
                                                                        $currModule = $permission->localeAll[0]->module;
                                                                    @endphp
                                                                    @if ($pervModule != $currModule)
                                                                    <li>{{$currModule}} </li>
                                                                        @php
                                                                            $pervModule = $currModule;
                                                                        @endphp
                                                                    @endif
                                                                    @endforeach
                                                                </ul>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;padding-bottom:3px;">
                                                            <span style="font-family:Roboto, arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;">
                                                                Méthode de paiement:
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                            {{__($user['paymentType'])}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                            Prix:
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 2px;">
                                                            {{$user['price']}} {{$user['currency']}}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <tr>
                            <td class=paratxt_td style="border-collapse:initial; padding-left: 50px; padding-right: 50px; ">
                                <table width="500" cellspacing="0" cellpadding="0" border="0" margin="0" padding="0" style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                                    <tr>
                                        <td class=paratxt_subtd width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                            Votre inscription est en cours d'approbation.
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class=ctatd style="padding-left:50px;padding-top: 29px;padding-bottom: 32px;">
                                <table class=bluecta style="margin: auto; -moz-border-radius:3px; -premailer-cellpadding:0; -premailer-cellspacing:0; -webkit-border-radius:3px; border-collapse:collapse; border-radius:3px; color:#3684C6; font-family:Google Sans,Arial; font-weight:500; mso-table-lspace:0; mso-table-rspace:0;"
                                    height=40 align="left" bgcolor="#1A73E8" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="text-align: center; padding: 7px 4px 9px 6px; border-collapse:collapse">
                                            <a style="-khtml-border-radius:2px; -moz-border-radius:3px; -moz-border-radius-bottomleft:0; -moz-border-radius-bottomright:3px; -moz-border-radius-topleft:0; -moz-border-radius-topright:3px; -ms-border-radius:2px; -o-border-radius:2px; -webkit-border-bottom-left-radius:3px; -webkit-border-bottom-right-radius:3px; -webkit-border-radius:3px; -webkit-border-top-left-radius:0; -webkit-border-top-right-radius:3px; background-color:#1A73E8; border-bottom-left-radius:3px; border-bottom-right-radius:3px; border-color:#1A73E8; border-radius:3px; border-style:solid; border-top-left-radius:3px; border-top-right-radius:3px; color:#ffffff; display:inline-block; font-family:Google Sans, Arial; font-size:14px; font-weight:500; line-height:24px; margin:0; mso-hide:all; text-align:center; text-decoration:none"
                                                target="_blank" href="{{route('customer-home')}}" bgcolor="#1A73E8" align="center">
                                                <span align="center" style="-webkit-text-size-adjust: none; display: block;padding-left:7px;padding-right:9px;">Cliquez ici</span>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="paraclass" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:0px; font-family: Google Sans, Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                Merci d'utiliser notre site web,
                            </td>
                        </tr>
                        <tr>
                            <td class="paraclass" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:28px; font-family: Google Sans, Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                L'équipe Algeria Invest
                            </td>
                        </tr>
                    </td>
                </tr>
            @endsection
        @elseif($locale == 'ar')
            @section('email_content')
                <tr>
                    <td class="content_wrapper_td" cellspacing="0" border="0" style="border-collapse:collapse; -premailer-cellpadding:0; -premailer-cellspacing:0;width:100%">
                        <table class="innerwrapper1 holder_wrap_inner flexible" align="center" border="0" cellpadding="0" style="width:550px; -premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; font-family:Roboto,Arial; font-weight:normal; margin:0; mso-table-lspace:0; mso-table-rspace:0; width:100%; " width="550">
                            <tr>
                                <td class="bigger_wrapper_body flexible" width="100%" style="border-collapse:collapse; margin:0; padding-bottom:0px; padding-top:34px;text-align: left;font-family:Google Sans, Roboto, Arial;background-color:#ffffff; padding-left:50px;">
                                    <table width="100%" class="flexible" cellpadding="0"  border="0" style="width:100%;">
                                        <tr>
                                            <td id=outer_cover class="headline" width="100%" style=border-collapse:collapse;>
                                                <table width="100%" class="flexible" cellpadding="0"  border="0" style="width:100%;">
                                                    <tr>
                                                        <td class="headertd" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:0px; padding-top:7px; padding-bottom:10px; font-family: google sans,roboto,arial; font-weight:500; color:#3C4043; font-size:32px; line-height:40px; letter-spacing:0px;">
                                                            We have received your subscription request for the
                                                            <span style="color:#22B573;">{{$user['subscription']->localeAll[0]->name}} Pack.</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="right" width="100" class="calender_icon" style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign="top">
                                                <img class="heroimgtd" src="https://i.ibb.co/23DSjgM/confirmation.png" style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width="100" alt="G Suite billing info icon">
                                             </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="paratxt_td" style="border-collapse:initial; padding-left: 50px; padding-right: 50px;  ">
                        <table width="500" cellspacing="0" border="0" margin="0" padding="0" style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;padding-left:50px; padding-right:50px; border-top:1px solid #E8EAED;">
                            <tr>
                                <td class="paratxt_subtd" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:26px; padding-bottom:0px; font-family: Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Dear {{$user['name']}},
                                </td>
                            </tr>

                            <tr>
                                <td class="paratxt_subtd" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:21px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Here’s a summary of your
                                    <span style=color:#22B573;><strong>{{$user['subscription']->localeAll[0]->name}} Pack</strong></span> subscription:
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="grey_section" style="padding-left: 50px;padding-top:7px; padding-right:50px;padding-bottom:9px;background-color:#ffffff;">

                        <table bgcolor="#f1f3f4" width="100%" cellspacing="0" border="0" style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0;background-color:#f1f3f4">
                            <tr>
                                <td class=left-right-spacing style="padding-left: 25px; padding-right: 25px;  padding-top:20px; padding-bottom:20px;">
                                    <table style="-premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:initial; font-family:roboto, arial;  font-weight:normal; mso-table-lspace:0; mso-table-rspace:0;" align="center" width="100%" cellpadding="0" >
                                        <tr>
                                            <td style="border-collapse:initial; font-size:12px; padding-top:0px; padding-left: 0px; padding-bottom:0px; padding-right: 0px;  ">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" margin="0" padding="0" style="premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                            Modules:
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                            <a class="appleLinks" rel="nofollow" style="text-decoration:none; color:#3C4043;cursor: text">
                                                                <ul style="padding-left: 15px; margin-left: 0;">
                                                                    @php
                                                                        $pervModule = '';
                                                                        $currModule = '';
                                                                    @endphp
                                                                    @foreach($user['subscription']->permissions as $permission)
                                                                    @php
                                                                        $currModule = $permission->localeAll[0]->module;
                                                                    @endphp
                                                                    @if ($pervModule != $currModule)
                                                                    <li>{{$currModule}} </li>
                                                                        @php
                                                                            $pervModule = $currModule;
                                                                        @endphp
                                                                    @endif
                                                                    @endforeach
                                                                </ul>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;padding-bottom:3px;">
                                                            <span style="font-family:Roboto, arial; font-size:12px; line-height:16px; font-weight:normal;color:#3C4043;">
                                                                Payment method:
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 10px;">
                                                            {{__($user['paymentType'])}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial;  font-size:12px; line-height:16px; font-weight:normal; color:#3C4043;padding-bottom: 3px;">
                                                            Price:
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:0px; font-family:Roboto,Arial; font-size:12px; line-height:16px; font-weight:bold; color:#3C4043;padding-bottom: 2px;">
                                                            {{$user['price']}} {{$user['currency']}}
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
                    <td class="paratxt_td" style="border-collapse:initial; padding-left: 50px; padding-right: 50px; ">
                        <table width="500" cellspacing="0" cellpadding="0" border="0" margin="0" padding="0" style="width:100%; premailer-cellpadding:0; -premailer-cellspacing:0; border-collapse:collapse; mso-table-lspace:0; mso-table-rspace:0; text-align:left;">
                            <tr>
                                <td class="paratxt_subtd" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                                    Your subscription will be approved once the payment is confirmed. <br>While waiting, you can enjoy the
                                    <a style="color:#3684C6"><Strong>Free Pack</strong></a> access:
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="ctatd" style="padding-left:50px;padding-top: 29px;padding-bottom: 32px;">
                        <table class="bluecta" style="margin: auto; -moz-border-radius:3px; -premailer-cellpadding:0; -premailer-cellspacing:0; -webkit-border-radius:3px; border-collapse:collapse; border-radius:3px; color:#3684C6; font-family:Google Sans,Arial; font-weight:500; mso-table-lspace:0; mso-table-rspace:0;" height="40" align="left" bgcolor="#1A73E8" cellpadding="0" >
                            <tr>
                                <td style="text-align: center; padding: 7px 4px 9px 6px; border-collapse:collapse">
                                    <a style="-khtml-border-radius:2px; -moz-border-radius:3px; -moz-border-radius-bottomleft:0; -moz-border-radius-bottomright:3px; -moz-border-radius-topleft:0; -moz-border-radius-topright:3px; -ms-border-radius:2px; -o-border-radius:2px; -webkit-border-bottom-left-radius:3px; -webkit-border-bottom-right-radius:3px; -webkit-border-radius:3px; -webkit-border-top-left-radius:0; -webkit-border-top-right-radius:3px; background-color:#1A73E8; border-bottom-left-radius:3px; border-bottom-right-radius:3px; border-color:#1A73E8; border-radius:3px; border-style:solid; border-top-left-radius:3px; border-top-right-radius:3px; color:#ffffff; display:inline-block; font-family:Google Sans, Arial; font-size:14px; font-weight:500; line-height:24px; margin:0; mso-hide:all; text-align:center; text-decoration:none" target="_blank" href="{{route('customer-home')}}" bgcolor="#1A73E8" align="center">
                                        <span align="center" style="-webkit-text-size-adjust: none; display: block;padding-left:7px;padding-right:9px;">
                                            Click here
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="paraclass" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:0px; font-family: Google Sans, Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                        Thank you for using our website,
                    </td>
                </tr>
                <tr>
                    <td class="paraclass" width="500" align="left" style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:50px; padding-left:50px; padding-top:0px; padding-bottom:28px; font-family: Google Sans, Roboto,arial; font-weight:bold; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
                        The Algeria Invest Team
                    </td>
                </tr>
            @endsection
        @endif

