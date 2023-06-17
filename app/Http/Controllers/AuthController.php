<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            "student_name" => "required |min:4",
            "student_email" => "required|email|unique:students,email",
            "student_password" => "required|min:8",
            "student_confirmPassword" => "same:student_password"
        ]);
        $verify_code = rand(100000,999999);
        logger("your verify code is".$verify_code);
        $student = new Student();
        $student->name = $request->student_name;
        $student->email = $request->student_email;
        $student->password = Hash::make($request->student_password);
        $student->verify_code = $verify_code;
        $student->user_token = md5($verify_code);
        $student->save();
        return redirect()->route('auth.login')->with(['message'=>'Register Successful']);
    }

    public function login(){
        return view('auth.login');
    }

    public function check(Request $request)
    {
        $request->validate([
            "student_email" => "required|email|exists:students,email",
            "student_password" => "required",
        ],[
            "email.exits"  => 'email or password is not work'
        ]);
        $student = Student::where('email',$request->student_email)->first();
        if (!Hash::check($request->student_password,$student->password)){
            return redirect()->route('auth.login')->with(['message'=>'email or password is not work']);
        }
        session([
            'auth' => $student
        ]);
        return redirect()->route('dashboard.home');
    }

    public function logout()
    {
        session()->forget('auth');
        return redirect()->route('auth.login');
    }

    public function changePassword()
    {
        return view('auth.changePassword');
    }

    public function chaingingPassword(Request $request)
    {
//        Validation Form Submission
        $request->validate([
            "current_password" => "required|min:8",
            "password" => "required|confirmed",
        ]);

//        Check Old Password
        if (!Hash::check($request->current_password,session('auth')->password)){
            return redirect()->back()->withErrors(['current_password'=>'current_password does not match']);
        }
        $student = Student::find(session('auth')->id);
        $student->password = Hash::make($request->password);
        $student->update();
        session()->forget('auth');
        return redirect()->route('auth.login');
    }

    public function verify()
    {
        return view('auth.verify');
    }

    public function verifying(Request $request)
    {
        $request->validate([
           "verify_code" => 'required|numeric'
        ]);
        if ($request->verify_code != session('auth')->verify_code){
//            return $request->verify_code.session('auth')->verify_code;
            return redirect()->route('mail.verify')->withErrors(['verify_code'=>"incorrect verify code"]);
        }
        $student = Student::find(session('auth')->id);
        $student->email_verified_at = now();
        $student->update();
        session(['auth'=> $student]);
        return redirect()->route('dashboard.home');
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            "email"=>'required|email|exists:students,email'
        ]);
        $student = Student::where('email',$request->email)->first();
        logger(route('auth.newPassword',['reset_token'=>$student->user_token]));
        return redirect()->route('auth.login')->with(['message'=>'check your email for your rest link ']);
    }

    public function newPassword()
    {
        $token = \request()->reset_token;
        $student = Student::where('user_token',$token)->first();
        if (is_null($student)){
            return abort(403,'Your not allowed');
        }
//        return $student;
        return view("auth.newPassword",['user_token'=>$student->user_token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            "user_token" => "required|exists:students,user_token",
            "password"=>"required|min:8"
        ],[
            "user_token.exits"=>"Something went wrong"
        ]);
        $student = Student::where("user_token",$request->user_token)->first();
        $student->password = Hash::make($request->password);
        $student->user_token = md5(rand(10000,999999999999))  ;
        $student->update();
        return redirect()->route('auth.login')->with('message','You can login now with new password');
    }



}
