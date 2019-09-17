<?php

namespace App\Http\Controllers\Auth;
<<<<<<< HEAD

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

=======
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
<<<<<<< HEAD
=======
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:teacher')->except('logout');
    }
    public function showAdminLoginForm()
    {
        return view('Admin.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function showTeacherLoginForm()
    {
        return view('Teacher.login');
    }

    public function teacherLogin(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) 
        {

            return redirect()->intended('/teacher')->with('success','You are successfully logged in!');
        }
        return back()->withInput($request->only('email', 'remember'));
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
    }
}
