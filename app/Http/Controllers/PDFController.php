<?php

namespace App\Http\Controllers;

use App\Exports\MarksExport;
use Illuminate\Http\Request;
use PDF;
use App\InternalTest;
use App\User;

class PDFController extends Controller
{ 
    public function getmarks($div,$sub,$sem)
    {
        $marks = InternalTest::where('division_id',$div)->where('subject_id',$sub)->with('user')->with('subject')->get()->where('subject.semester',$sem)->sortBy('user.roll_no');
        return PDF::loadView('pdf.marks', ['marks' =>$marks])->stream('marks.pdf');
    }
    public function getparent($div)
    {
        return PDF::loadView('pdf.users', ['users' => User::where('division', $div)->orderBy('roll_no', 'asc')->get()])->stream('users.pdf');
    }
    public function getclass($div,$sem)
    {
        $marks = InternalTest::where('division_id',$div)->with('user')->with('subject')->orderBy('subject_id')->get()->where('subject.semester',$sem)->sortBy('user.roll_no');
        return PDF::loadView('pdf.class', ['marks' =>$marks])->stream('class.pdf');
    }
    public function getstudent($div,$stu,$sem)
    {
        $marks = InternalTest::where('division_id',$div)->where('student_id',$stu)->with('user')->with('subject')->get()->where('subject.semester',$sem)->sortBy('subject.id');
        return PDF::loadView('pdf.student', ['marks' =>$marks])->stream('marks.pdf');
    }
}
