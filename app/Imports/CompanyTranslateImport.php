<?php

namespace App\Imports;

use App\Models\CompanyTranslate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Models\Company;


class CompanyTranslateImport implements ToModel,WithHeadingRow,WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $company_id = Company::get()->last()->id;
        // dd($row);
        $companyTranslate = CompanyTranslate::create(
            [
                'company_id'      =>  $company_id,
                'locale'          => 'fr',
                'company_name'    =>  $row['company_name_in_french'],
                'address'         =>  $row['company_address_in_french'],
            ],
            [
                'company_id'      =>  $company_id,
                'locale'          => 'en',
                'company_name'    =>  $row['comany_name_in_english'],
                'address'         =>  $row['company_address_in_english'],
            ],
            [
                'company_id'      =>  $company_id,
                'locale'          => 'ar',
                'company_name'    =>  $row['company_name_in_arabic'],
                'address'         =>  $row['company_address_in_arabic'],
            ]
        ); 
        return $companyTranslate;
    }

    public function rules(): array
    {
        return [
            // 'activity_code' => 'required',
        ];
    }
}
