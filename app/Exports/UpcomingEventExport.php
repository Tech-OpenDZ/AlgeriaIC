<?php

namespace App\Exports;

use App\Event;
use App\Models\EventTranslate;
use Maatwebsite\Excel\Concerns\FromCollection;

class UpcomingEventExport implements FromCollection
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
        return Event::select($this->fields)->whereIn('id', $this->id)->get();
    }
}
