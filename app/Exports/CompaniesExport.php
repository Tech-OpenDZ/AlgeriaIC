<?php

namespace App\Exports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;



class CompaniesExport implements FromView, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $company;

    public function __construct(object $company)
    {
        $this->company = $company;
    }

    public function view(): View
    {
        return view('frontend.exports.companies', [
            'companies' => $this->company
        ]);
    }
}
