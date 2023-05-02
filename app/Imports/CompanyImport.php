<?php

namespace App\Imports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class CompanyImport implements ToModel,WithHeadingRow,WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Company([
            'company_logo'      => "",
            'page_key'          => "",
            'creation_date'     => isset($row['creation_date'])? $row['creation_date']:'',
            'telephone'         => isset($row['telephone'])? $row['telephone']:'',
            'email'             => isset($row['email'])? $row['email']:'',
            'fax'               => isset($row['fax'])? $row['fax']:'',
            'website'           => isset($row['website'])? $row['website']:'',
            'facebook'          => isset($row['facebook'])? $row['facebook']:'',
            'youtube'           => isset($row['youtube'])? $row['youtube']:'',
            'instagram'         => isset($row['instagram'])? $row['instagram']:'',
            'twitter'           => isset($row['twitter'])? $row['twitter']:'',
            'linkedin'          => isset($row['linkedin'])? $row['linkedin']:'',
            'capital'           => isset($row['capital'])? $row['capital']:'',
            'staff'             => isset($row['staff'])? $row['staff']:'',
            'net_sales_2018'    => isset($row['net_sales_2018'])? $row['net_sales_2018']:'',
            'net_sales_2019'    => isset($row['net_sales_2019'])? $row['net_sales_2019']:'',
            'terms_accepted'    => 0,
            'status'            => 0,
        ]);
    }

    public function rules(): array
    {
        return [
            // 'activity_code' => 'required',
        ];
    }
}
