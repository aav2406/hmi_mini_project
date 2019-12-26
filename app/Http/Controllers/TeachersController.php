<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\DivisionTeacher;
use App\Subject;
use App\Application;
use App\Division;
use App\Teacher;
use App\User;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\DB;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use App\InternalTest;
class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showClassesSubjects()
    {
        $user = Auth::user();
        $details = DivisionTeacher::where('teacher_id',$user->id)->with('division')->with('subject')->get();
        return view('Teacher.home')->with('details',$details);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSessionForTeacher(Request $request)
    {
        $teacher = Auth::user();
        $request->session()->put('subject_no'.$teacher->id,$request['subject_no']);
        $request->session()->put('division_no'.$teacher->id,$request['division_id']);
        $request->session()->put('test_no'.$teacher->id,$request['test_no']);
        return redirect('teacher/studentmarks');
    }
    public function showStudents()
    {
        $teacher = Auth::user();
        $search = 'Expiry_'.session()->get('test_no'.$teacher->id,'Error');
        $expiry = DivisionTeacher::where('teacher_id',$teacher->id)->where('subject_id',session()->get('subject_no'.$teacher->id,'Error'))->value($search);
        if(!isset($expiry))
        {
            $teacher = Auth::user();
            $test_no = session()->get('test_no'.$teacher->id,'Error');
            $students = User::where('division',session()->get('division_no'.$teacher->id,'Error'))->orderBy('roll_no')                       
                                ->get();
            return view('Teacher.putMarks')->with('students',$students)->with('test_no',$test_no);
        }
        else
        {
            return redirect('teacher/putmarks')->with('error','You have already entered marks for this subject, test and division combination. If you wish to edit them kindly go to edit marks.');
        }
    }
    public function showTestThree()
    {
        $teacher = Auth::user();
        $students = Application::where('status','1')->where('teacher_id',$teacher->id)->with('user:id,name,roll_no,division')->with('division')->with('subject:id,subject')->get();
        return view('Teacher.test3')->with('students',$students);
    }
    public function storeTestThree(Request $request)
    {
        $teacher = Auth::user();
        $students = Application::where('teacher_id',$teacher->id);
        $data = array();
        foreach($_POST as $roll=>$mark)
        { 
            if(is_numeric($roll))
            {
               
                 $data[$roll] = $mark;
            }
        }
        $this->updateTestThreeValues($data);
        return redirect('/teacher/test3')->with('success','Marks Entered successfully!');
    }
    public static function updateTestThreeValues(array $values)
    {
        $table = Application::getModel()->getTable();
        $cases = [];
        $ids = [];
        foreach ($values as $id => $value) {
            $id = (int) $id;
            $cases[] = "WHEN {$id} then $value";
            $ids[] = $id;
        }
        $ids = implode(',', $ids);
        $cases = implode(' ', $cases);
        return \DB::update("UPDATE `{$table}` SET `marks` = CASE `id` {$cases} END WHERE `id` in ({$ids})");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = array();
        $subject_id = $request->session()->get('subject_no'.$user->id,'Error');
        $division_id = $request->session()->get('division_no'.$user->id,'Error');
        if($request->session()->get('test_no'.$user->id) == '1')
        {
            foreach($_POST as $id=>$mark)
            {
                if(is_numeric($id))
                {
                        $data[] = array( 'student_id' => $id, 
                                         'division_id' => $division_id, 
                                         'subject_id' => $subject_id, 
                                         'IA1' => $mark,
                                           'status1'=> 0,
                                           'IA2' => -1, 
                                           'status2' => 0,
                                           'Avg' => -1);
                }
            }
            InternalTest::insert($data);
            $divtoteacher = DivisionTeacher::where('teacher_id',$user->id)
                                            ->where('division_id',$request->session()->get('division_no'.$user->id,'Error'))
                                            ->where('subject_id',$request->session()->get('subject_no'.$user->id,'Error'))->first();
            $divtoteacher->Expiry_1 = now()->addHours(48);
            $divtoteacher->save();
        }
        else if($request->session()->get('test_no'.$user->id) == '2')
        {
            $table = InternalTest::getModel()->getTable();
            $cases = [];
            $ids = [];
            foreach($_POST as $id=>$mark)
            {
                if(is_numeric($id))
                {
                    $id = (int) $id;
                    $cases[] = "WHEN {$id} then $mark";
                    $ids[] = $id;
                }
            }
                $ids = implode(',', $ids);
                $cases = implode(' ', $cases);
                // If student is absent for any test, set his average to 0
                \DB::update("UPDATE `{$table}` SET `IA2` = CASE `student_id` {$cases} END, `Avg`= CASE WHEN `IA1` = -2 THEN 0 WHEN `IA2` = -2 THEN 0 ELSE CEIL((`IA1`+`IA2`)/2) END WHERE `student_id` in ({$ids})");
            
            $divtoteacher = DivisionTeacher::where('teacher_id',$user->id)
                                             ->where('division_id',$request->session()->get('division_no'.$user->id,'Error'))
                                             ->where('subject_id',$request->session()->get('subject_no'.$user->id,'Error'))->first();
            $divtoteacher->Expiry_2 = now()->addHours(48);
            $divtoteacher->save();  
        }
        $subject = Subject::where('id',$subject_id)->first()->value('subject');
        $division = Division::where('id',$division_id)->first();
        session()->forget(['division_no'.$user->id, 'subject_no'.$user->id,'test_no'.$user->id]);
      //  return redirect('teacher/putmarks');
        return $this->send($subject,$division);
    }
    public function editMarks()
    {
        $user = Auth::user();
        $details = DivisionTeacher::where('teacher_id',$user->id)->with('division')->with('subject')->get();
        return view('Teacher.editmarks')->with('details',$details);
    }
    public function editMarksCreateSession(Request $request)
    {
        $teacher = Auth::user();
        $request->session()->put('subject_no'.$teacher->id,$request['subject_no']);
        $request->session()->put('division_no'.$teacher->id,$request['division_id']);
        $request->session()->put('test_no'.$teacher->id,$request['test_no']);
        return redirect('teacher/editmarkslist');
    }
    public function storeMarks(Request $request)
    {
    
        $teacher = Auth::user();
        $put = '';
        $test_no = session()->get('test_no'.$teacher->id,$request['test_no'],"Error");
        $ids = [];
        $requiredIds = array();
        if($test_no == '1')
        {
            $put = 'ia1';
        }
        elseif($test_no == '2')
        {
            $put = 'ia2';
        }
            $table = InternalTest::getModel()->getTable();
            $cases = [];
            foreach($_POST as $id=>$mark)
            {
                if(is_numeric($id))
                {
                        $id = (int) $id;
                        $requiredIds[] = $id;

                        $cases[] = "WHEN {$id} then $mark";
                        $ids[] = $id;
                }
            }
            $ids = implode(',', $ids);
            $cases = implode(' ', $cases);
            \DB::update("UPDATE `{$table}` SET {$put} = CASE `id` {$cases} END WHERE `id` in ({$ids})");
            $students = InternalTest::whereIn('id', $requiredIds)->with('user')->with('subject')->get();
            foreach($students as $user)
            {
                dispatch(new SendEmailJob($teacher->email,$user->user->email,$user->subject->subject,$user->user->name));
            }
            return redirect('teacher/editmarks')->with('success','You have edited marks successfully!!');
    }
    public function showStudentList()
    {
        $teacher = Auth::user();
        $subject_id = session()->get('subject_no'.$teacher->id,'Error');
        $division_id = session()->get('division_no'.$teacher->id,'Error');
        $test_no = session()->get('test_no'.$teacher->id,'Error');
        $test = $test_no == 1 ? 'ia1':'ia2';
        $search = $test_no==1?'Expiry_1':'Expiry_2';
        $exists = DivisionTeacher::where('division_id',$division_id)
                                 ->where('subject_id',$subject_id)
                                 ->whereNotNull($search)->first();
        $timeExpired = $exists[$search];
        // return now();
        // return Carbon::parse($timeExpired);
        $exists = isset($exists)?$exists->count():0;
        if($exists > 0)
        {
            if(Carbon::parse($timeExpired) < (Carbon::now()))
            {
                return redirect('teacher/editmarks')->with('error',"Time to edit marks for this subject, test, class combination has expired.");
            }
            $users = DB::select("select users.roll_no,users.name,internal_test.id,internal_test.".$test." FROM users INNER JOIN internal_test ON internal_test.student_id = users.id WHERE internal_test.division_id = ? AND internal_test.subject_id = ? ORDER BY users.roll_no"
                                                                                                                                            ,[session()->get('division_no'.$teacher->id,'Error'),
                                                                                                                                            session()->get('subject_no'.$teacher->id,'Error')]);
            return view('Teacher.editmarkslist')->with('users',$users)->with('test_no',$test_no);
        }                        
        else
            {
                return redirect('teacher/editmarks')->with('error',"You haven't put marks for this test of this subject yet.");

            }
    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkstatus()
    {
        $user = Auth::user();
        $details = DivisionTeacher::where('teacher_id',$user->id)->with('division')->with('subject')->get();
        return view('Teacher.checkstatus')->with('details',$details);
    }
    public function send($subject,Division $division)
    {
        $teacher = Auth::user();
        Mail::to($division['email'])
        ->cc($teacher->email)
        ->send(new Email($subject , $division));
       // return $this->index();
      // session()->forget(['division_no'.$user->id, 'subject_no'.$user->id,'test_no'.$user->id]);
      return redirect('teacher/putmarks');
        
    }
    public function status(Request $request)
    {
        $teacher = Auth::user();
        $request->session()->put('subject_no'.$teacher->id,$request['subject_no']);
        $request->session()->put('division_no'.$teacher->id,$request['division_id']);
        $request->session()->put('test_no'.$teacher->id,$request['test_no']);
        return redirect('teacher/status');
    }
    public function showStatus()
    {
        $teacher = Auth::user();
        $test_no = session()->get('test_no'.$teacher->id,"Error");
        $students =  DB::table('users')
                        ->join('internal_test', 'users.id', '=', 'internal_test.student_id')
                        ->join('divisions', 'users.division', '=', 'divisions.id')
                        ->select('users.name','users.name','users.roll_no', 'internal_test.*', 'divisions.*')
                        ->where('users.division',session()->get('division_no'.$teacher->id,'Error'))
                        ->orderBy('users.roll_no')
                        ->get();
        session()->forget(['division_no'.$teacher->id, 'subject_no'.$teacher->id,'test_no'.$teacher->id]);
        return view('Teacher.status')->with('students',$students)->with('test_no',$test_no);
    }
    public function show($id)
    {
    }
    public function marks(Request $request)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}