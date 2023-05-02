<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('press_review.title')</title>
    <style>
    * { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>

<body style="background-color: #FBE4D5;border: 1px solid #C8C5C3;outline: 8px solid #606060;">

        <page size="A4" style="display: block;padding-left: 15px;padding-right: 15px;padding: 25px;page-break-after:always">

            <div>
                <!-- <div class="blue" style="padding: 20px;width: 60px;margin: 5px;background-color: #1D3360;"></div>
                <div style="padding: 20px;width: 60px;margin: 5px;background-color:yellow;"></div>
                <div style="padding: 20px; width: 60px;margin: 5px;background-color: #3784C5;"></div>
                <div style="padding: 20px;width: 60px;margin: 5px;background-color: #29B473;"></div>
                <div style="padding: 20px; width: 60px;margin: 5px;background-color:#EF534A"></div> -->
                <div style="text-align: center;">
                    <img src="{{ public_path('css/images/pdf-img.png')}}" alt="pdf-img" class="img-fluid" >
                </div>
                <div style="text-align: center;">
                    <h1 style="font-size: 3rem;
                        color: #001F60;
                        font-style: italic;
                        font-weight: bold;
                        margin: 1rem;">@lang('press_review.pdf_title')
                    </h1>
                    <h6 style="font-size: 2rem;font-weight: 800;margin: 2rem 0px;">@lang('press_review.pdf_title')</h6>
                    <address style="font-style: italic;margin-bottom: 2rem;">
                        <p>@lang('press_review.mobile'): 0770 88 90 80</p>
                        <p>@lang('press_review.address_line_1')</p>
                        <p>@lang('press_review.address_line_2')</p>
                        <p>@lang('press_review.mobile'): 0770 88 90 80 </p>
                        <p>communication@fce.dz</p>
                        <p>www.fce.dz.</p>
                    </address>
                </div>
            </div>
        </page>

        <page size="A4" style="display: block;padding-left: 15px;padding-right: 15px;padding: 25px;page-break-after:always">
            <div style="padding: 50px;">
                <h2 style="font-size: 2rem; font-weight: bold;"><u>SOMMAIRE</u></h2>
                <a href="#" style="font-weight: bold; color: black; font-size: 18px;">A la
                    une..................................................................3</a>
                <ol>
                @foreach($news_details as $news_detail)
                    <li style="font-size: 18px;">{{ isset($news_detail->localeAll[0]->title) ? $news_detail->localeAll[0]->title : '' }}</li>
                @endforeach
                </ol>

            </div>
        </page>
        @foreach($news_details as $news_detail)
        <page size="A4" style="display: block;padding-left: 15px;padding-right: 15px;padding: 25px;page-break-after:always">
            <div style="padding: 50px;">
                <p style="font-size: 14px; font-weight: bold;"><u>A la une</u></p>
                <h1 style="font-size: 20px;">
                <h1 style="font-size: 20px;">
                    {{ isset($news_detail->localeAll[0]->title) ? $news_detail->localeAll[0]->title : '' }}
                </h1>
                </h1>
                <p style="font-size: 16px;">
                {!! isset($news_detail->localeAll[0]->description) ? $news_detail->localeAll[0]->description : ''!!}
                </p>
            </div>
        </page>
        @endforeach


</body>

</html>
