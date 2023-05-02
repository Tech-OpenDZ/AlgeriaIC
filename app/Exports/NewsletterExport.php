<?php

namespace App\Exports;

use App\Models\Newsletter;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsletterExport implements FromCollection
{

    public function __construct($id, $fields)
    {
    	$this->id = $id;
    	$this->fields = $fields;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Newsletter::all();
        return Newsletter::select($this->fields)->whereIn('id', $this->id)->get();
    }
}
