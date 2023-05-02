<?php

namespace App\Imports;

use App\Models\ActivityCode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
class ActivityCodeImport implements ToModel,WithHeadingRow,WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new ActivityCode([
            'activity_code' => $row['activity_code'],
            'description'   => $row['description'],
        ]);
    }

    public function rules(): array
    {
        return [
            'activity_code' => 'required',
        ];
    }
}
