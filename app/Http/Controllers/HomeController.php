<?php
namespace App\Http\Controllers;
use Auth;
use App\Application;
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
    public function index()
    {
        $user = Auth::user();
        $now = now();
        $test = InternalTest::where('division_id',$user->division)->where('roll_no',$user->roll_no)->get();
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
                    $data=InternalTest::where('division_id',$user->division)->where('roll_no',$user->roll_no)->where('subject_id',$sub_list['0'])->first();
                    $data->status1 = $value;
                    $data->save();
                }
                elseif($sub_list['1'] == 2)
                {
                    $data=InternalTest::where('division_id',$user->division)->where('roll_no',$user->roll_no)->where('subject_id',$sub_list['0'])->first();
                    $data->status2 = $value;
                    $data->save();
                }
            }
        }
      
        return back()->with('success','Choice Updated!');
    }
    public function application($id)
    {
        $student = Auth::user();
        $record = Application::where('student_id',$student->id)->where('subject_id',$id)->first();
        if($record == NULL)
        {
            $failed = InternalTest::where('division_id',$student->division)
                        ->where('roll_no',$student->roll_no)
                        ->where('subject_id',$id)
                        ->where('IA1','-2')->orWhere('IA2','-2')->first();
            $number = $failed->count();
            if($number != NULL)
            {
                session()->put('subject_id',$id);
                $failed['subject_name'] = Subject::where('id',$failed['subject_id'])->first()['subject'];
                return view('auth.application')->with('failed',$failed);
            }
            else{
            return redirect('home/marks');
            }
        }
        else
        {
            return redirect('home/marks')->with('error','You have already applied for test 3 of this subject.');
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
            $record =   InternalTest::where('division_id',$student->division)->where('roll_no',$student->roll_no)->where('subject_id',$request->session()->get('subject_id','Error'))->first();
            $teacher_id = DivisionTeacher::where('division_id',$student->division)->where('subject_id',$request->session()->get('subject_id','Error'))->first()->value('teacher_id'); 
            if($record['ia1'] == -2 && $record['ia2'] == -2 )
            {
                $ans = 3;
            }
            elseif($record['ia1'] == -2)
            {
                $ans = 1;
            }
            elseif($record['ia1'] == -2)
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
                ]
            );
            $request->session()->forget('subject_id');
            return redirect('home/marks');
}
}