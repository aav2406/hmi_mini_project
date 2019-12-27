<?php
namespace App\Http\Controllers;
use App\Teacher;
use App\Division;
use App\DivisionTeacher;
use App\Subject;
use App\InternalTest;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile= Auth::user();
        $classes = DivisionTeacher::where('teacher_id',$profile->id)->get();
        $profile_count = count($classes);   
        for($i=0;$i<count($classes);$i++)
        {
            $classes[$i]['div_name'] = Division::where('id',$classes[$i]['division_id'])->first()['class'];
            $classes[$i]['subject_name'] = Subject::where('id',$classes[$i]['subject_id'])->first()['subject'];
        }
        return view('Teacher.profile',compact('profile_count','classes','profile'));
    }
    public function indexTeacher()
    {
        $profile= Auth::user();
        $classes = DivisionTeacher::where('teacher_id',$profile->id)->get();
        $profile_count = count($classes);   
        for($i=0;$i<count($classes);$i++)
        {
            $classes[$i]['div_name'] = Division::where('id',$classes[$i]['division_id'])->first()['class'];
            $classes[$i]['subject_name'] = Subject::where('id',$classes[$i]['subject_id'])->first()['subject'];
        }
        return view('Teacher.updateprofile',compact('profile_count','classes','profile'));
    }
    public function indexStudent()
    {
        $profile = Auth::user();
        $elec = Subject::where('elective','1')->get();
        return view('studentProfile')->with(compact('profile'))->with(compact('elec'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $teacher = Teacher::find($id);
        $teacher->name = $request['name'];
        $teacher_div = Teacher::where('email', $request['email'])->first();
        $teacherDivisionSubject = DivisionTeacher::where('teacher_id',$teacher->id)->get();
        foreach($teacherDivisionSubject as $teach)
        {
            InternalTest::where('subject_id',$teach->subject_id )->where('division_id',$teach->division_id)->delete();
        }    
        $teacher_div->divisions()->detach();
        if($request->has('class_2'))
        {     
            $teacher_div->divisions()->attach($request['class_1'],['subject_id' =>$request['sub_1']]);
            $teacher_div->divisions()->attach($request['class_2'],['subject_id' =>$request['sub_2']]);
        }
        elseif($request->has('class_1'))
        {
            $teacher_div->divisions()->attach($request['class_1'],['subject_id' =>$request['sub_1']]);
        }
        $teacher->phone_no = $request['phone_no'];
        $teacher->save();
        
        return redirect("teacher");
    }
    public function updateStudent(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->phone_no = $request['phone_no'];
        // $user->roll_no = $request['roll_no'];
        $myelec=DB::table('user_subject')->insert(
            ['user_id' => $id, 'subject_id' => $request['elec']]
        );
        $user->save();
        return redirect("home");
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