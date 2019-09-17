<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers;
class ExportController extends Controller
{
    public function export() 
    {
        return Excel::download(new UsersExport($subject,$division), 'marks.xlsx');
    }
}