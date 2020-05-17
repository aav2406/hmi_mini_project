<?php
namespace App\Http\Controllers;
use auth;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestThreeStatus;
use App\Application;
use App\Subject;
use Carbon\Carbon;
use App\Division;
use App\DivisionTeacher;
use App\News;
use App\User;
use App\teachersData;
use App\InternalTest;
use Illuminate\Support\Facades\DB;
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
    //    $applications =  Application::all();
    //    $len = count($applications);
    //    for($i=0;$i<$len;$i++)
    //    {
    //         $student = User::find($applications[$i]['student_id']);
    //         $applications[$i]['name'] = $student['name'];
    //         $applications[$i]['roll_no'] =  $student['roll_no'];
    //         $applications[$i]['class'] =  Division::where('id',$student->division)->first()->value('class');
    //         $applications[$i]['subject_name'] = Subject::where('id',$applications[$i]['subject_id'])->first()['subject'];
    //    }
    //    return view('Admin.application')->with('applications',$applications);
       $applications =  Application::with('user')->with('division')->with('subject')->get();
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
            $this->send($request['remark'],$student,"Accepted",$request->session()->get('Subject_name','Error'));   
        }
        elseif(isset($request['Reject']))
        {
            $application->status = 0;
            $application->remark = $request['remark'];
            $application->save();
            $this->send($request['remark'],$student,"Rejected",$request->session()->get('Subject_name','Error'));   
        }
        return redirect('/admin/applications');
    }
    public function send($reason,User $student,$status,$subject)
    {
        $admin = Auth::user();
        Mail::to($student['email'])
        ->cc($admin['email'])
        ->send(new TestThreeStatus($reason,$student,$status,$subject));
        return redirect('/admin/applications')->with('Success','The application was '.$status.' and the student was emailed about the same.');
    }
    public function showTeacher(){
        $teacher =  DB::table('teachers_data')
                        ->leftjoin('teachers', 'teachers_data.emp_id', '=', 'teachers.emp_id')
                        ->select('teachers.name', 'teachers_data.*')
                        ->get();
        return view('Admin.showteacher')->with('teacher',$teacher); 
    }

    public function storeTeacher(Request $request){
        $teacher = new teachersData;
        $teacher->email = $request['email'];
        $teacher->emp_id = $request['emp'];
        $teacher->save();
        return redirect('/admin/teachers');

    }
    public function deleteTeacher(Request $request, $id){
        $teacher = teachersData::find($id);
        $teacher->delete();
        return redirect('/admin/teachers');
    }
    public function showNews()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('Admin.news')->with('news',$news);
    }
    public function storeNews(Request $request)
    {
        $this->validate($request,[
            'news_image' => ['image','max:1999'],
            'days' => ['integer','required'],
            'content' =>['string','required'],
        ]);
        if($request->has('news_image'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('news_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('news_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('news_image')->storeAs('public/news', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = NULL;
        }
        $news = new News();
        $news->news = $request->content;
        $news->expiry = now()->addDays($request->days);
        $news->news_image = $fileNameToStore;
        $news->save();
        return redirect('/admin/managenews');
    }
    public function deleteNews(Request $request,$id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('/admin/managenews')->with('success','News Deleted Successfully');
    }
    public function replace(){
        $teacher =  DB::table('teachers_data')
                    ->leftjoin('teachers', 'teachers_data.emp_id', '=', 'teachers.emp_id')
                    ->select('teachers.name', 'teachers_data.*')
                    ->get();
        return view('Admin.replaceteacher')->with('teacher',$teacher); 
    }
    public function replaceTeacher(Request $request){
        $new=DivisionTeacher::where('teacher_id',$request->t1)->get();
        foreach($new as $n){
            $n->teacher_id = $request->t2;
            $n->save();
        }
        return redirect('/admin/replace')->with('success','Replaced Successfully');

    }
    public function classReport(){
        $div = Division::get();
        return view('Admin.classReport')->with('div',$div);
    }
    public function classReportview(Request $request){
        $div = $request->t1;
        $sem=$request->t2;

        $marks = InternalTest::where('division_id',$div)->with('user')->with('subject')->get()->where('subject.semester',$sem)->sortBy('user.roll_no');
        return PDF::loadView('pdf.class', ['marks' =>$marks])->stream('class.pdf');
    }

}