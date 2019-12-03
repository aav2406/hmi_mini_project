<?php

namespace App\Exports;

use App\User;
use Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    public function __construct(int $div)
    {
        $this->div = $div;
    }
    public function view(): View
    {
        return view('exports.users', [
             'users' => User::where('division', $this->div)->orderBy('roll_no', 'asc')->get()
         ]);
        // return view('exports.marks', [
        //     'marks' => InternalTest::all()
        // ]);
    }
}
