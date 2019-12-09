<?php
namespace App\Exports;
use App\InternalTest;
use Maatwebsite\Excel\Concerns\FromCollection;
class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $division;
    public $subject;
    public function __construct($subject,$division)
    {
        $this->subject = $subject;
        $this->division = $division;
    }
    public function collection()
    {
        return InternalTest::where('division_id',$division)->where('subject_id',$subject)->orderBy('roll_no')->get();
    }
}