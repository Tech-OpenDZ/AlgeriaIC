<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Exports\ProspectsExport;

use App\Imports\ProspectsImport;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\Prospect;

class FileController extends Controller
{
/**
* @return \Illuminate\Support\Collection
*/
public function index()
{
    return view('admin.prospect.index');
}

/**
* @return \Illuminate\Support\Collection
*/
public function importExcelCSV(Request $request)
{
$validatedData = $request->validate([

'file' => 'required',

]);

Excel::import(new ProspectsImport,$request->file('file'));


return redirect('import-manage-prospect')->with('status', 'The file has been excel/csv imported to database in laravel 8');
}

/**
* @return \Illuminate\Support\Collection
*/
public function exportExcelCSV($slug)
{
return Excel::download(new ProspectsExport, 'prospects.'.$slug);
}

}