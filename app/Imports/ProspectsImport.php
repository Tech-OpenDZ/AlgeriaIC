<?php

namespace App\Imports;

use App\Models\Prospect;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProspectsImport implements ToModel,WithHeadingRow,WithValidation
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
        return new Prospect([

            'subscription_id'          => isset($row['subscription_id'])? $row['subscription_id']:'',
            'name'                     => isset($row['name'])? $row['name']:'',
            'company_name'             => isset($row['company_name'])? $row['company_name']:'',
            'company_address'          => isset($row['company_address'])? $row['company_address']:'',
            'job_title'                => isset($row['job_title'])? $row['job_title']:'',
            'mobile_number'            => isset($row['mobile_number'])? $row['mobile_number']:'',
            'email'                    => isset($row['email'])? $row['email']:'',
            'username'                 => isset($row['username'])? $row['username']:'',
            'note'                     => "R.A.S",
            'pays'                     => isset($row['pays'])? $row['pays']:'',
            'wilaya'                   => isset($row['wilaya'])? $row['wilaya']:'',
            'provenance'               => isset($row['provenance'])? $row['provenance']:'',
            'other_provenance'         => isset($row['other_provenance'])? $row['other_provenance']:'',
            
            'is_deactivated'           => 1,
            'status'                   => 1,
            'password'                 => "AlgeriaInvest2021",
            'payment_status'          => "pending",
            'payment_type '            =>  null,
            'currency'                 => "dzd'",
            'payment_mode'             => "offline",
            'company_type'             => "algerian",
            'terms_accepted'           => 1,
            'receive_promotions'       => 1,

            'default_locale'           => "fr",

        ]);


    }

    public function rules(): array
    {
        return [
            'email'       => 'required|email|max:255|unique:prospect,email,NULL,id,deleted_at,NULL',
            //'username'             => 'required|unique:customers,username,NULL,id,deleted_at,NULL',
        ];
    }
}