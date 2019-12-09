<?php

namespace App\Http\Controllers;

use App\Exports\MarksExport;
use Illuminate\Http\Request;
use PDF;
use App\InternalTest;
use App\User;

class PDFController extends Controller
{ 
    public function getmarks($div,$sub){
        return PDF::loadView('pdf.marks', ['marks' => InternalTest::where('division_id',$div)->where('subject_id',$sub)->orderBy('student_id','asc')->get()])->stream('marks.pdf');
    }
    public function getparent($div){
        return PDF::loadView('pdf.users', ['users' => User::where('division', $div)->orderBy('roll_no', 'asc')->get()])->stream('users.pdf');
    }
}
