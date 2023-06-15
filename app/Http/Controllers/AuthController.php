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
        $student = new Student();
        $student->name = $request->student_name;
        $student->email = $request->student_email;
        $student->password = Hash::make($request->student_password);
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
}
