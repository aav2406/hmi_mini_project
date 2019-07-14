<?php
namespace App\Http\Controllers;
use auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestThreeStatus;
use App\Application;
use App\Subject;
use App\Division;
use App\User;
use Illuminate\Http\Request;
class AdminsController extends Controller
{
    protected $guard = 'admin';
    public function index()
    {
        return view('Admin.admindash');
    }
    public function showApplications()
    {
       $applications =  Application::all();
       $len = count($applications);
       for($i=0;$i<$len;$i++)
       {
            $student = User::find($applications[$i]['student_id']);
            $applications[$i]['name'] = $student['name'];
            $applications[$i]['roll_no'] =  $student['roll_no'];
            $applications[$i]['class'] =  Division::where('id',$student->division)->first()->value('class');
            $applications[$i]['subject_name'] = Subject::where('id',$applications[$i]['subject_id'])->first()['subject'];
       }
       return view('Admin.application')->with('applications',$applications);
    }
    public function Application($id)
    {
        $application = Application::find($id);
        $student = User::find($application['student_id']);
        $student['class'] =  Division::where('id',$student['division'])->first()['class'];
        $student['subject_name'] = Subject::where('id',$application['subject_id'])->first()['subject'];
        session()->flash('Subject_name',$student['subject_name']);
        return view('Admin.individualapp')->with('application',$application)->with('student',$student);
    }
    public function storeApplication(Request $request,$id)
    {
        $application = Application::find($id);
        $student = User::find($application['student_id']);
        if(isset($request['Accept']))
        {
            $application->status = 1;
            $application->remark = $request['remark'];
            $application->save();
           // $this->send($student,"Accepted",$request->session()->get('Subject_name','Error'));   
        }
        elseif(isset($request['Reject']))
        {
            $application->status = 0;
            $application->remark = $request['remark'];
            $application->save();
           // $this->send($student,"Rejected",$request->session()->get('Subject_name','Error'));   
        }
        return redirect('/admin/applications');
    }
    public function send(User $student,$status,$subject)
    {
        $admin = Auth::user();
        Mail::to($student['email'])
        ->cc($admin['email'])
        ->send(new TestThreeStatus($student,$status,$subject));
        return redirect('/admin/applications')->with('Success','The application was '.$status.' and the student was emailed about the same.');
    }
}