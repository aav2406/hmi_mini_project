<?php

namespace App\Exports;

use App\InternalTest;
use Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MarksExport implements FromView
{
    public function __construct(int $div, int $sub)
    {
        $this->div = $div;
        $this->sub = $sub;
    }
    public function view(): View
    {
        $marks = InternalTest::where('division_id', $this->div)->where('subject_id',$this->sub)->orderBy('student_id', 'asc')->get();
        return view('exports.marks', [
             'marks' => $marks
         ]);
    }
}