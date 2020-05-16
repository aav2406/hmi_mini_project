<?php

namespace App\Http\Controllers;

use App\Exports\MarksExport;
use Illuminate\Http\Request;
use PDF;
use App\InternalTest;
use App\User;

class PDFController extends Controller
{ 
    public function getmarks($div,$sub)
    {
        $marks = InternalTest::where('division_id',$div)->where('subject_id',$sub)->with('user')->get()->sortBy('user.roll_no');
        return PDF::loadView('pdf.marks', ['marks' =>$marks])->stream('marks.pdf');
    }
    public function getparent($div)
    {
        return PDF::loadView('pdf.users', ['users' => User::where('division', $div)->orderBy('roll_no', 'asc')->get()])->stream('users.pdf');
    }
    public function getclass($div)
    {
        $marks = InternalTest::where('division_id',$div)->with('user')->get()->sortBy('user.roll_no');//->groupBy('user.roll_no');
        echo $marks;

        return PDF::loadView('pdf.class', ['marks' =>$marks])->stream('class.pdf');
    }
}
