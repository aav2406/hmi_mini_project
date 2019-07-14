<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Admin;
use App\Teacher;
use App\teachersData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:teacher');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }
    public function showTeacherRegisterForm()
    {
        return view('Teacher.register');
    }
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
           
        ]);
        //return redirect()->intended('login/admin');
    }
    protected function createTeacher(Request $request)
    {
        
        $masterList = teachersData::where('email',$request->input('email'))->where('emp_id',$request->input('emp_id'))->first();
        if($masterList!=null)
        {
            $this->validateTeacher($request->all())->validate();
            $teacher = $this->createT([
                'Name' => $request['name'],
                'Email' => $request['email'],
                'password' => ($request['password']),
                'phone_no' =>$request['phone_no'],
                'emp_id' =>$request['emp_id'],
            ]);
            // $checked = $request->has('class_2') ? true: false;
            // if($checked)
            // {     
            //     $teacher_div = Teacher::where('email', $request['email'])->first();
            //     $teacher_div->divisions()->attach($request['class_1'],['subject_id' =>$request['sub_1']]);
            //     $teacher_div->divisions()->attach($request['class_2'],['subject_id' =>$request['sub_2']]);
            // }
            // else
            // {
            //     $teacher_div = Teacher::where('email', $request['email'])->first();
            //     $teacher_div->divisions()->attach($request['class_1'],['subject_id' =>$request['sub_1']]);
            // }
        return redirect()->intended('login/teacher')->with('success','You are Registered Successfully!');
        }
        else{
            return redirect('register/teacher')->with('error','Invalid Registration. Please visit the General Instructions section');
        }
    }
    protected function validator(array $data)
    {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/(.*)ves\.ac\.in$/',],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'roll_no' => ['required', 'integer','min:0' ],
                'phone_no' => ['required', 'string'],
                'division' => ['required', 'string','unique:users,division,NULL,id,roll_no,'.$data['roll_no'],],
                'parentname1' => ['required', 'string', 'max:255'],
                'parentemail1' => ['required', 'string', 'email', 'max:255', ],
                'parentphone_no1' => ['required', 'string'],
                'parentname2' => [ 'nullable','string', 'max:255'],
                'parentemail2' => [ 'nullable','string', 'email', 'max:255', ],
                'parentphone_no2' => ['nullable','string',],
        ]);
    }
    protected function validateTeacher(array $data)
    {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone_no' => ['required','string'],
                // 'class_1' => ['required', 'string'],
                // 'class_2' => ['string'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roll_no' => $data['roll_no'],
            'phone_no' => $data['phone_no'],
            'division' => $data['division'],
            'parentname1'=>$data['parentname1'],
            'parentemail1'=>$data['parentemail1'],
            'parentphone_no1'=>$data['parentphone_no1'],
            'parentname2'=>$data['parentname2'],
            'parentemail2'=>$data['parentemail2'],
            'parentphone_no2'=>$data['parentphone_no2'],
        ]);
        //return redirect()->intended('/home');
    }
    protected function createT(array $data)
    {
        return Teacher::create([
            'name' => $data['Name'],
            'email' => $data['Email'],
            'password' => Hash::make($data['password']),
            'phone_no'=>$data['phone_no'],
            'emp_id'=>$data['emp_id'],
        ]);
    }
}