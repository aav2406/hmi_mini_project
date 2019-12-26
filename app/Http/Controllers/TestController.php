<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MarksExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\TestController;
use PDF;
use App\InternalTest;

class TestController extends Controller
{
    public function export() 
    {
        return Excel::download(new MarksExport(12,1), 'marks.xlsx');
    }
}
