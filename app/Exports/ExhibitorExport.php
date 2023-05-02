<?php

namespace App\Exports;

use App\Models\Exhibitor;
use Maatwebsite\Excel\Concerns\FromArray;

class ExhibitorExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $exhibitor;

    public function __construct(array $exhibitor)
    {
        $this->exhibitor = $exhibitor;
    }

    public function array(): array
    {
        return $this->exhibitor;
    }
}
