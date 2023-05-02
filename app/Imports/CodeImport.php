<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class CodeImport implements ToCollection,WithHeadingRow
{

	public $data;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // return $collection;
        $this->data = $collection;
    }

	    public function headingRow(): int
	{
	    return 1;
	}
}
