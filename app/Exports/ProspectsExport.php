<?php

namespace App\Exports;

use App\Models\Prospect;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;







class ProspectsExport implements  ShouldAutoSize,FromCollection,WithHeadings
{

    /**
     * @return \Illuminate\Support\Collection
     */
    // protected $prospect;


    public function headings():array{
        return[
            'id',
            'subscription_id',
            'parent_id',
            'name',
            'company_name',
            'company_address',
            'pays',
            'wilaya',
            'job_title',
            'mobile_number',
            'email',
            'username',
            'payment_mode',
            'currency',

            'payment_status' ,
            'payment_type',
            'terms_accepted',
            'receive_promotions',
            'company_type',
            'status',
            'is_deactivated',
            'provenance',
            'other_provenance',
            'default_locale',
            
            'remember_token',
            'activation_token',
            'activation_at',

            'deleted_at',
            'created_at',
            'updated_at',
            'note',















        ];

    }

    public function collection()
    {
        return Prospect::all();
    }


}