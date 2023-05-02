<table border="1" style="border: 1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th style=" border: 1px solid black;">Company Name</th>
            <th style=" border: 1px solid black;">Number</th>
            <th style=" border: 1px solid black;">Email</th>
            <th style=" border: 1px solid black;">Address</th>
            <th style=" border: 1px solid black;">Website</th>
            <th style=" border: 1px solid black;">Capital</th>
            <th style=" border: 1px solid black;">Turnover</th>
            <th style=" border: 1px solid black;">Number of employees</th>
            <th style=" border: 1px solid black;">Activity Code</th>
            <th style=" border: 1px solid black;">Activity Code</th>
            <th style=" border: 1px solid black;">Product</th>
            <th style=" border: 1px solid black;">Name</th>
            <th style=" border: 1px solid black;">Phone</th>
            <th style=" border: 1px solid black;">Email</th>
            <th style=" border: 1px solid black;">Job Title</th>

        </tr>
    </thead>
    <tbody text-align='center'>
        @foreach($companies as $company)
            @php
                $activity_code_count = count($company->activity_codes);
                $products_count = count($company->products);
                $contacts_count = count($company->contacts);
                if($activity_code_count > $company->products_count) {
                    if($activity_code_count > $contacts_count){
                        $maxCount = $activity_code_count;
                    }else{
                        $maxCount = $contacts_count;
                    }
                }else{
                    if($products_count > $contacts_count){
                        $maxCount = $products_count;
                    }else{
                        $maxCount = $contacts_count;
                    }
                }
            @endphp
        <tr>
            <td style=" border: 1px solid black;" rowspan="{{ $maxCount }}">
                @foreach ($company->localeAll as $locale)
                {{ $locale->company_name }}
                @endforeach
            </td>
            <td style=" border: 1px solid black;" rowspan="{{ $maxCount }}">{{ $company->telephone }}</td>
            <td style=" border: 1px solid black;" rowspan="{{ $maxCount }}">{{ $company->email }}</td>
            <td style=" border: 1px solid black;" rowspan="{{ $maxCount }}">
                @foreach ($company->localeAll as $locale)
                {{ $locale->address }}
                @endforeach
            </td>
            <td style=" border: 1px solid black;" rowspan="{{ $maxCount }}">{{ $company->website }}</td>
            <td style=" border: 1px solid black;" rowspan="{{ $maxCount }}">{{ $company->capital }}</td>
            <td style=" border: 1px solid black;" rowspan="{{ $maxCount }}">{{ $company->net_sales_2019 }}</td>
            <td style=" border: 1px solid black;" rowspan="{{ $maxCount }}">{{ $company->staff }}</td>
            <td style=" border: 1px solid black;"> {{ $company->activity_codes[0]->activity_code }} </td>
            <td style=" border: 1px solid black;"> {{ $company->activity_codes[0]->description }} </td>
            @if(isset($company->products[0]->productTranslate[0]->localeAll[0]->name))
            <td style=" border: 1px solid black;"> {{ $company->products[0]->productTranslate[0]->localeAll[0]->name  }}</td>
            @else
            <td style=" border: 1px solid black;"> </td>
            @endif
            <td style=" border: 1px solid black;"> {{ $company->contacts[0]->localeAll[0]->name }}</td>
            <td style=" border: 1px solid black;"> {{ $company->contacts[0]->mobile_number }}</td>
            <td style=" border: 1px solid black;"> {{ $company->contacts[0]->email }}</td>
            <td style=" border: 1px solid black;"> {{ $company->contacts[0]->localeAll[0]->jobtitle }}</td>

        </tr>
        @for ($i = 1; $i<$maxCount; $i++)
        <tr>

            @if(($i) < $activity_code_count)
            <td style=" border: 1px solid black;"> {{ $company->activity_codes[$i]->activity_code }} </td>
            <td style=" border: 1px solid black;"> {{ $company->activity_codes[$i]->description }} </td>
            @else
            <td style=" border: 1px solid black;"></td>
            <td style=" border: 1px solid black;"></td>
            @endif

            @if(($i) < $products_count)
            <td style=" border: 1px solid black;"> {{ $company->products[$i]->productTranslate[0]->localeAll[0]->name }} </td>
            @else
            <td style=" border: 1px solid black;"></td>
            @endif

            @if(($i) < $contacts_count)
            <td style=" border: 1px solid black;"> {{ $company->contacts[$i]->localeAll[0]->name }} </td>
            <td style=" border: 1px solid black;"> {{ $company->contacts[$i]->mobile_number }} </td>
            <td style=" border: 1px solid black;"> {{ $company->contacts[$i]->email }} </td>
            <td style=" border: 1px solid black;"> {{ $company->contacts[$i]->localeAll[0]->jobtitle }} </td>
            @else
            <td style=" border: 1px solid black;"></td>
            <td style=" border: 1px solid black;"></td>
            <td style=" border: 1px solid black;"></td>
            <td style=" border: 1px solid black;"></td>
            @endif

        </tr>
        @endfor

    @endforeach
    </tbody>
</table>
