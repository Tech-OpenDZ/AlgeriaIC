<!-- <h5>Dear,</h5>
<span>Please find your Contact File link.</span>
<br>
<a href="{{route('download-contact-file', [$token])}}">Click Here</a>
<br><br>
<span>Thank You</span> -->
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
                        Your <span style=color:#22B573;>Contact file</span> request has been approved.
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td align=right width=100 class=calender_icon style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign=top>
                    <img class=heroimgtd src=https://i.ibb.co/2jhPfkH/Contact-file.png style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width=100 alt="G Suite billing info icon">
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
             Dear {{$user}},
            </td>
          </tr>
          <tr>
            <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
            Your contact file request on <span style=color:#22B573><strong>Algeria Invest</strong></span> has been approved.
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
            Please click bellow to download the contact file :
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td class=ctatd style="padding-left:50px;padding-top: 29px;padding-bottom: 32px;">
        <table class=bluecta style="margin: auto; -moz-border-radius:3px; -premailer-cellpadding:0; -premailer-cellspacing:0; -webkit-border-radius:3px; border-collapse:collapse; border-radius:3px; color:#3684C6; font-family:Google Sans,Arial; font-weight:500; mso-table-lspace:0; mso-table-rspace:0;" height=40 align=left bgcolor=#1A73E8 cellpadding=0 cellspacing=0>
          <tr>
            <td style="text-align: center; padding: 7px 4px 9px 6px; border-collapse:collapse">
              <a style="-khtml-border-radius:2px; -moz-border-radius:3px; -moz-border-radius-bottomleft:0; -moz-border-radius-bottomright:3px; -moz-border-radius-topleft:0; -moz-border-radius-topright:3px; -ms-border-radius:2px; -o-border-radius:2px; -webkit-border-bottom-left-radius:3px; -webkit-border-bottom-right-radius:3px; -webkit-border-radius:3px; -webkit-border-top-left-radius:0; -webkit-border-top-right-radius:3px; background-color:#1A73E8; border-bottom-left-radius:3px; border-bottom-right-radius:3px; border-color:#1A73E8; border-radius:3px; border-style:solid; border-top-left-radius:3px; border-top-right-radius:3px; color:#ffffff; display:inline-block; font-family:Google Sans, Arial; font-size:14px; font-weight:500; line-height:24px; margin:0; mso-hide:all; text-align:center; text-decoration:none" target=_blank bgcolor="#1A73E8" align=center href="{{route('download-contact-file', [$token])}}">
                <span align=center style="-webkit-text-size-adjust: none; display: block;padding-left:7px;padding-right:9px;">Download</span>
              </a>
            </td>
          </tr>
        </table>
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
                        Votre demande d'achat de <span style=color:#22B573;>Fichier de contacts</span> a été approuvée.
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td align=right width=100 class=calender_icon style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign=top>
                    <img class=heroimgtd src=https://i.ibb.co/2jhPfkH/Contact-file.png style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width=100 alt="G Suite billing info icon">
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
              Cher,
            </td>
          </tr>
          <tr>
            <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
            Votre demande d'achat de fichier de contacts sur <span style=color:#22B573><strong>Algeria Invest</strong></span> a été approuvée.
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
            Téléchargez votre fichier de contacts en cliquant sur le lien suivant:
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td class=ctatd style="padding-left:50px;padding-top: 29px;padding-bottom: 32px;">
        <table class=bluecta style="margin: auto; -moz-border-radius:3px; -premailer-cellpadding:0; -premailer-cellspacing:0; -webkit-border-radius:3px; border-collapse:collapse; border-radius:3px; color:#3684C6; font-family:Google Sans,Arial; font-weight:500; mso-table-lspace:0; mso-table-rspace:0;" height=40 align=left bgcolor=#1A73E8 cellpadding=0 cellspacing=0>
          <tr>
            <td style="text-align: center; padding: 7px 4px 9px 6px; border-collapse:collapse">
              <a style="-khtml-border-radius:2px; -moz-border-radius:3px; -moz-border-radius-bottomleft:0; -moz-border-radius-bottomright:3px; -moz-border-radius-topleft:0; -moz-border-radius-topright:3px; -ms-border-radius:2px; -o-border-radius:2px; -webkit-border-bottom-left-radius:3px; -webkit-border-bottom-right-radius:3px; -webkit-border-radius:3px; -webkit-border-top-left-radius:0; -webkit-border-top-right-radius:3px; background-color:#1A73E8; border-bottom-left-radius:3px; border-bottom-right-radius:3px; border-color:#1A73E8; border-radius:3px; border-style:solid; border-top-left-radius:3px; border-top-right-radius:3px; color:#ffffff; display:inline-block; font-family:Google Sans, Arial; font-size:14px; font-weight:500; line-height:24px; margin:0; mso-hide:all; text-align:center; text-decoration:none" target=_blank bgcolor="#1A73E8" align=center href="{{route('download-contact-file', [$token])}}">
                <span align=center style="-webkit-text-size-adjust: none; display: block;padding-left:7px;padding-right:9px;">Télécharger le fichier de contacts</span>
              </a>
            </td>
          </tr>
        </table>
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
                          Your <span style=color:#22B573;>Contact file</span> request has been approved.
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td align=right width=100 class=calender_icon style="font-size:32px; line-height:40px; border-collapse:collapse; vertical-align:top; padding-top: 0px; text-align:right" valign=top>
                    <img class=heroimgtd src=https://i.ibb.co/2jhPfkH/Contact-file.png style="-ms-interpolation-mode:bicubic; outline:none; text-decoration:none; width:100px;padding-top:3px;vertical-align:top;" width=100 alt="G Suite billing info icon">
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
              Dear Maulik BHOJANI,
            </td>
          </tr>
          <tr>
            <td class=paratxt_subtd width=500 align=left style="background-color:#ffffff;border-collapse:collapse; width:100%; max-width:500px; padding-right:0px; padding-left:0px; padding-top:12px; padding-bottom:0px; font-family: Roboto,arial; font-weight:normal; color:#3C4043; font-size:14px; line-height:24px; letter-spacing:0px;">
              Your contact file request on <span style=color:#22B573><strong>Algeria Invest</strong></span> has been approved.
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
              Please click bellow to download the contact file :
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td class=ctatd style="padding-left:50px;padding-top: 29px;padding-bottom: 32px;">
        <table class=bluecta style="margin: auto; -moz-border-radius:3px; -premailer-cellpadding:0; -premailer-cellspacing:0; -webkit-border-radius:3px; border-collapse:collapse; border-radius:3px; color:#3684C6; font-family:Google Sans,Arial; font-weight:500; mso-table-lspace:0; mso-table-rspace:0;" height=40 align=left bgcolor=#1A73E8 cellpadding=0 cellspacing=0>
          <tr>
            <td style="text-align: center; padding: 7px 4px 9px 6px; border-collapse:collapse">
              <a style="-khtml-border-radius:2px; -moz-border-radius:3px; -moz-border-radius-bottomleft:0; -moz-border-radius-bottomright:3px; -moz-border-radius-topleft:0; -moz-border-radius-topright:3px; -ms-border-radius:2px; -o-border-radius:2px; -webkit-border-bottom-left-radius:3px; -webkit-border-bottom-right-radius:3px; -webkit-border-radius:3px; -webkit-border-top-left-radius:0; -webkit-border-top-right-radius:3px; background-color:#1A73E8; border-bottom-left-radius:3px; border-bottom-right-radius:3px; border-color:#1A73E8; border-radius:3px; border-style:solid; border-top-left-radius:3px; border-top-right-radius:3px; color:#ffffff; display:inline-block; font-family:Google Sans, Arial; font-size:14px; font-weight:500; line-height:24px; margin:0; mso-hide:all; text-align:center; text-decoration:none" bgcolor="#1A73E8" align=center href="{{route('download-contact-file', [$token])}}">
                <span align=center style="-webkit-text-size-adjust: none; display: block;padding-left:7px;padding-right:9px;">Download</span>
              </a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    @endsection
@endif