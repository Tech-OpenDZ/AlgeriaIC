<table border="1">
    <thead>
        <tr>
            <th rowspan="2">Company name</th>
            <th colspan="4">General informations</th>
            <th colspan="3">Financial informations</th>

            <th colspan="2" rowspan="2">Activity codes</th>
            <th rowspan="2">Product & services</th>
            <th colspan="4">Contacts</th>
        </tr>
        <tr>
            <th>Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Website</th>
            <th>Capital</th>
            <th>Turnover</th>
            <th>Number of employees</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Job Title</th>

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
            <td rowspan="{{ $maxCount }}">
                @foreach ($company->localeAll as $locale)
                {{ $locale->company_name }}
                @endforeach
            </td>
            <td rowspan="{{ $maxCount }}">{{ $company->id }}</td>
            <td rowspan="{{ $maxCount }}">{{ $company->email }}</td>
            <td rowspan="{{ $maxCount }}">
                @foreach ($company->localeAll as $locale)
                {{ $locale->address }}
                @endforeach
            </td>
            <td rowspan="{{ $maxCount }}">{{ $company->website }}</td>
            <td rowspan="{{ $maxCount }}">{{ $company->capital }}</td>
            <td rowspan="{{ $maxCount }}">{{ $company->net_sales_2019 }}</td>
            <td rowspan="{{ $maxCount }}">{{ $company->staff }}</td>
            <td> {{ $company->activity_codes[0]->activity_code }} </td>
            <td> {{ $company->activity_codes[0]->description }} </td>
            <td> {{ $company->products[0]->localeAll[0]->description }}</td>
            <td> {{ $company->contacts[0]->localeAll[0]->name }}</td>
            <td> {{ $company->contacts[0]->mobile_number }}</td>
            <td> {{ $company->contacts[0]->email }}</td>
            <td> {{ $company->contacts[0]->localeAll[0]->jobtitle }}</td>

        </tr>
        @for ($i = 1; $i<$maxCount; $i++) <tr>

            @if(($i) < $activity_code_count) <td> {{ $company->activity_codes[$i]->activity_code }} </td>
                <td> {{ $company->activity_codes[$i]->description }} </td>
                @else
                <td>-</td>
                <td>-</td>
                @endif

                @if(($i) < $products_count) <td> {{ $company->products[$i]->localeAll[0]->description }} </td>
                    @else
                    <td>-</td>
                    @endif

                    @if(($i) < $contacts_count) <td> {{ $company->contacts[$i]->localeAll[0]->name }} </td>
                        <td> {{ $company->contacts[$i]->mobile_number }} </td>
                        <td> {{ $company->contacts[$i]->email }} </td>
                        <td> {{ $company->contacts[$i]->localeAll[0]->jobtitle }} </td>
                        @else
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        @endif

                        </tr>
                        @endfor

                        @endforeach
    </tbody>
</table>