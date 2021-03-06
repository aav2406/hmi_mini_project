<?php
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
namespace App\Http\Controllers;
use Auth;
use PDF;
use App\Application;
use App\User;
use App\DivisionTeacher;
use App\InternalTest;
use App\Division;
use App\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {

        $user = Auth::user();
        // $chetas = User::where('id',$user->id)->with('subjects')->get();
        // return $chetas;
        $testthreestatus = Application::where('student_id',$user->id)->get();
        $status = 0;
        if($testthreestatus == null)
        {
            $status = 0;
        }
        else
        {
            $status = 1;
        }
      //  return $status;
        return view('auth.home')->with('status',$status);
      
    }
    public function testThreeMarks()
    {
        $user = Auth::user();
        $test = Application::where('student_id',$user->id)->with('subject')->get();
      //  return $test;
        return view('auth.testthreemarks')->with('test',$test);
    }
    public function index()
    {
        $user = Auth::user();
        $now = now();
        $test = InternalTest::where('student_id',$user->id)->get();
        $length = count($test);
        for($i=0;$i<$length;$i++)
        {
            $test[$i]['div_name'] = Division::where('id',$test[$i]['division_id'])->first()['class'];
            $test[$i]['subject_name'] = Subject::where('id',$test[$i]['subject_id'])->first()['subject'];
            $date = DivisionTeacher::where('division_id',$user->division)
                                                    ->where('subject_id',$test[$i]['subject_id'])->first();
            if (Carbon::parse($date['Expiry_1'])->gt(Carbon::now()))
            {
                $test[$i]['expiry_1'] = 1;   
            }
            else
            {
                $test[$i]['expiry_1'] = -1;   
            }
            if (Carbon::parse($date['Expiry_2'])->gt(Carbon::now()))
            {
                $test[$i]['expiry_2'] = 1;                   
            }
            else
            {
                $test[$i]['expiry_2'] = -1;   
            }
        }
        return view('auth.marks')->with('test',$test);
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        foreach($_POST as $key=>$value)
        {
            if($value == 1 || $value == 0)
            {
                $sub_list = explode('_',$key);
                if($sub_list['1'] == 1)
                {
                    $data=InternalTest::where('student_id',$user->id)->where('subject_id',$sub_list['0'])->first();
                    $data->status1 = $value;
                    $data->save();
                }
                elseif($sub_list['1'] == 2)
                {
                    $data=InternalTest::where('student_id',$user->id)->where('subject_id',$sub_list['0'])->first();
                    $data->status2 = $value;
                    $data->save();
                }
            }
        }
        return back();
    }
    public function studentpdf(){
        $find=Auth::user()->division;
        $div=Division::where('id',$find)->first();
        return view('auth.studentpdf')->with('div',$div);
    }
    public function studentpdfview(Request $request){
        $find=Auth::user();
        $div=$find->division;
        $stu=$find->id;
        $sem=$request['sem'];
        $marks = InternalTest::where('division_id',$div)->where('student_id',$stu)->with('user')->with('subject')->get()->where('subject.semester',$sem)->sortBy('subject.id');
        return PDF::loadView('pdf.student', ['marks' =>$marks])->stream('marks.pdf');

    }
    public function application($id,$testno)
    {
        $student = Auth::user();
        $record = Application::where('student_id',$student->id)->where('subject_id',$id)->get();
        $countOfApplication = $record->count();
        $date = DivisionTeacher::where('division_id',$student->division)->first();
        
        $search = $testno==1?'Expiry_1':'Expiry_2';
        if($testno != 1 and $testno != 2)
        {
            return redirect('home/marks')->with('error','Access Denied');
        }
        if(is_null($date[$search]))
        {
            return redirect('home/marks')->with('error','Access Denied');
        }
        if($countOfApplication >= 3)
        {
            return redirect('home/marks')->with('error','You Have exceeded the Maximum number of times you can apply');
        }

        if(Carbon::parse($date[$search])->addHours(72)->lt(Carbon::now()) )
        {
            return redirect('home/marks')->with('error','You Have exceeded the time to apply for test '.$testno);
        }

        else{
        $failed = InternalTest::where('student_id',$student->id)
                    ->where('subject_id',$id)
                    ->where('IA1','-2')->orWhere('IA2','-2')->first();
        $number = $failed->count();
        if($number > 0)
        {
            session()->put('subject_id',$id);
            $failed['subject_name'] = Subject::where('id',$failed['subject_id'])->first()['subject'];
            return view('auth.application')->with('failed',$failed);
        }
        else{
        return redirect('home/marks');
        }
    }
    
    }
    public function storeApplication(Request $request)
    {
            $this->validate($request,[
                'certificate' => 'image|max:1999',
                'reason' =>['string','required'],
            ]);
            $ans = 0;
            $student = Auth::user();
            // $teacher = $student->division_class->divisions;
            // return $teacher;
            $record =   InternalTest::where('student_id',$student->id)->where('subject_id',$request->session()->get('subject_id','Error'))->first();
            $teacher_id = DivisionTeacher::where('division_id',$student->division)->where('subject_id',$request->session()->get('subject_id','Error'))->first()->value('teacher_id'); 
            if($record['ia1'] == -2 && $record['ia2'] == -2 )
            {
                $ans = 3;
            }
            elseif($record['ia1'] == -2)
            {
                $ans = 1;
            }
            elseif($record['ia2'] == -2)
            {
                $ans = 2;
            }
            // Get filename with the extension
            $filenameWithExt = $request->file('certificate')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('certificate')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('certificate')->storeAs('public/certificate', $fileNameToStore);
            Application::create(
                [
                    'reason' => $request['reason'],
                    'certificate' => $fileNameToStore,
                    'subject_id' => $request->session()->get('subject_id','Error'),
                    'student_id' => $student->id,
                    'status' => -1,
                    'test_no' => $ans,
                    'teacher_id' => $teacher_id,
                    'division_id' => $student->division,
                    'created_at' => now(),
                ]
            );
            $request->session()->forget('subject_id');
            return redirect('home/marks');
    }
    public function testThree()
    {
        $student = Auth::user();
        $applications = Application::where('student_id',$student->id)->with('subject')->get();
        return view('auth.TestThree')->with('applications',$applications);
    }
    public function testThreeStatusStore(Request $request)
    {
     //   return $request;  
        $user = Auth::user();
        foreach($_POST as $id=>$status)
        {
            if(is_numeric($id))
                if($status == 1 || $status == 0)
                {
                    $data = Application::where('id',$id)->first();
                    $data->student_status = $status;
                    $data->save();
                }
        }
        return back()->with('success','Status Updated Successfully!!');
    }
}
