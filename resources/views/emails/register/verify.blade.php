@extends('layouts.app')

@section('content')
    <div style="width:100% !important;">
        <!--[if (!mso)&(!IE)]><!-->
        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
            <!--<![endif]-->
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: 'Trebuchet MS', Tahoma, sans-serif"><![endif]-->
            <div style="color:#0D0D0D;font-family:'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                <div style="font-size: 12px; line-height: 14px; font-family: 'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif; color: #0D0D0D;">
                    <p style="font-size: 14px; line-height: 33px; text-align: center; margin: 0;"><span style="font-size: 28px;"><strong><span style="line-height: 33px; font-size: 28px;">

                                    {{trans('mails.Hello')}} {{$user->name}},
                                </span></strong></span><br/><span style="font-size: 28px; line-height: 33px;">
                            {{trans('mails.Registration completed')}}

                        </span>
                    </p>
                </div>
            </div>

            <!--[if mso]></td></tr></table><![endif]-->
            <div align="center" class="img-container center autowidth">
                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center autowidth" src="http://194.58.90.163/assets_mail/images/divider.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 316px; display: block;" title="Image" width="316"/>
                <!--[if mso]></td></tr></table><![endif]-->
            </div>
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: 'Trebuchet MS', Tahoma, sans-serif"><![endif]-->
            <div style="color:#555555;font-family:'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;line-height:150%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                <div style="font-size: 12px; line-height: 18px; font-family: 'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif; color: #555555;">


                    <p style="font-size: 14px; line-height: 21px; text-align: center; margin: 0;">

                        {{trans('mails.Thanks so much for joining Our Site')}}!<br/>{{trans('mails.Your username is')}}:

                        <span style="color: #2276fa; font-size: 14px; line-height: 21px;">
                            <strong>{{$user->name}}<br/></strong></span>
                    </p>


                </div>
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 10px; font-family: 'Trebuchet MS', Tahoma, sans-serif"><![endif]-->
            <div style="color:#0D0D0D;font-family:'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;line-height:150%;padding-top:20px;padding-right:10px;padding-bottom:10px;padding-left:10px;">

                <div style="font-size: 12px; line-height: 18px; font-family: 'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif; color: #0D0D0D;">
                    <p style="font-size: 14px; line-height: 21px; text-align: center; margin: 0;">


                        {{trans('mails.TO FINISH SIGNING UP AND ACTIVATE YOUR ACCOUNT')}}<br/>{{trans('mails.YOU JUST NEED TO SET YOUR PASSWORD')}}</p>


                </div>
            </div>

            <!--[if mso]></td>


            </tr>



            </table><![endif]-->
            <div align="center" class="button-container" style="padding-top:25px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 25px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:46.5pt; width:153.75pt; v-text-anchor:middle;" arcsize="7%" stroke="false" fillcolor="#a8bf6f"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:'Trebuchet MS', Tahoma, sans-serif; font-size:16px"><![endif]-->
                <div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#5a98f0;border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;width:auto; width:auto;;border-top:1px solid #a8bf6f;border-right:1px solid #a8bf6f;border-bottom:1px solid #a8bf6f;border-left:1px solid #a8bf6f;padding-top:15px;padding-bottom:15px;font-family:'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;">
                    <a style="color: white" href="http://194.58.90.163/verify/{{$user->verify_token}}"><span style="padding-left:15px;padding-right:15px;font-size:16px;display:inline-block;"><span style="font-size: 16px; line-height: 32px;">

                                {{trans('mails.ACTIVATE MY ACCOUNT')}}

                            </span></span></a>
                </div>
                <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
            </div>


            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                <tbody>
                <tr style="vertical-align: top;" valign="top">
                    <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 30px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-top: 0px solid transparent;" valign="top" width="100%">
                            <tbody>
                            <tr style="vertical-align: top;" valign="top">
                                <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <!--[if (!mso)&(!IE)]><!-->
        </div>
        <!--<![endif]-->
    </div>
@endsection
