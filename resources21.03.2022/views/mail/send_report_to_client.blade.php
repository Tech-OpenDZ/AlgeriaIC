<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
            font-size:14px;
        }
        p{
            margin: 0 0 20px 0;
        }
        .font-weight-bolder {
            font-weight: 600 !important;
        }
        .pad {
            padding-right: 30px;
        }
        .mb-3 {
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <table width="700" align="center" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #f3f3f3; border-top:3px solid #ea5d36;">
        <tr>
            @include('mail.header')
        </tr>
        <tr>
            <td align="left" style="padding-bottom:20px; padding-left:20px; padding-right:20px;">
                <p style=" font-family: Arial, Helvetica, sans-serif; margin: 0 0 20px 0;">Advertisement Report :</p>
                <p style=" font-family: Arial, Helvetica, sans-serif; margin: 0 0 20px 0;"> Ads : {{ $advertisement->title }}</p>
                <p style=" font-family: Arial, Helvetica, sans-serif; margin: 0 0 20px 0;"> <img src="{{asset('storage/uploads/advertisement/'.$advertisement->ad)}}" alt="" width="100%"> </p>

                <p style=" font-family: Arial, Helvetica, sans-serif; margin: 0 0 20px 0;">
                    <table>
                    <tr>
                    <td class="pad" >
                        <span class="font-weight-bolder mb-2">Location</span> <br>
                        <span class="opacity-70">{{ App\Models\Advertisement::location[$advertisement->location] }}</span>
                    </td>
                    <td class="pad" >
                        <span class="font-weight-bolder mb-2">Adv. Type</span> <br>
                        <span class="opacity-70">{{ App\Models\Advertisement::advertisement_type[$advertisement->advertisement_type] }}</span>
                    </td>
                    <td class="pad" >
                        <span class="font-weight-bolder mb-2">Formula Type</span> <br>
                        <span class="opacity-70">{{ App\Models\Advertisement::formula_type[$advertisement->formula_type] }}</span>
                    </td>
                    @if($advertisement->formula_type == 'date')
                    <td class="pad" >
                        <span class="font-weight-bolder mb-2">Date</span> <br>
                        <span class="opacity-70">{{$advertisement->start_date}} - {{$advertisement->end_date}}</span>
                    </td>
                    @endif
                    @if($advertisement->formula_type == 'clicks')

                    <td class="pad" >
                        <span class="font-weight-bolder mb-2">Number of Clicks</span> <br>
                        <span class="opacity-70">{{$advertisement->number_of_clicks ?? 0}}</span>
                    </td>
                    @endif
                    @if($advertisement->formula_type == 'displays')

                    <td class="pad" >
                        <span class="font-weight-bolder mb-2">Number of Displays</span> <br>
                        <span class="opacity-70">{{$advertisement->number_of_displays ?? 0}}</span>
                    </td>
                    @endif
                    @if($advertisement->formula_type == 'keyword')

                        <td class="pad" >
                            <span class="font-weight-bolder mb-2">Keywords</span> <br>
                            <span class="opacity-70">{{$advertisement->keywords}}</span>
                        </td>

                            @if($advertisement->for_keyword == 'clicks')

                            <td class="pad" >
                                <span class="font-weight-bolder mb-2">Number of Clicks</span> <br>
                                <span class="opacity-70">{{$advertisement->number_of_clicks ?? 0}}</span>
                            </td>
                            @endif
                            @if($advertisement->for_keyword == 'displays')

                            <td class="pad" >
                                <span class="font-weight-bolder mb-2">Number of Displays</span> <br>
                                <span class="opacity-70">{{$advertisement->number_of_displays ?? 0}}</span>
                            </td>
                            @endif
                        @endif
                    </tr>
                    </table>
                </p>

                <p style=" font-family: Arial, Helvetica, sans-serif; margin: 0 0 20px 0;">
                    <div class="font-weight-bolder font-size-lg mb-3">Advertisement Campaign Audience</div>
                    <table>

                    <tr class="mb-3">
                        <td class="pad">Number of Displays:</td>
                        <td class="pad">{{ $advertisement->actual_number_of_displays }}</td>
                    </tr>
                    <tr class="mb-3">
                        <td class="pad">Number of Clicks:</td>
                        <td class="pad">{{ $advertisement->actual_number_of_clicks }}</td>
                    </tr>
                    <tr>
                        @php
                            if($advertisement->actual_number_of_displays == 0)
                                $dctr = '0 %';
                            else{
                                $ctr = $advertisement->actual_number_of_clicks / $advertisement->actual_number_of_displays * 100;

                                $dctr = round($ctr,2).' %';
                            }
                        @endphp
                        <td class="pad">CTR:</td>
                        <td class="pad">{{$dctr}}</td>
                    </tr>
                    </table>
                </p>

                <p style=" font-family: Arial, Helvetica, sans-serif; margin: 0 0 20px 0;">Regards,<br>Algeria Invest</p>
            </td>
        </tr>
        <tr>
            @include('mail.footer')
        </tr>
    </table>
</body>
</html>
