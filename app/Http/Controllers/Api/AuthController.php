<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Rules\CheckPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "student_name" => "required |min:4",
            "student_email" => "required|email|unique:students,email",
            "student_password" => "required|min:8|confirmed"
        ]);
        $verify_code = rand(100000,999999);
        logger("your verify code is".$verify_code);
        $student = new Student();
        $student->name = $request->student_name;
        $student->email = $request->student_email;
        $student->password = Hash::make($request->student_password);
        $student->verify_code = $verify_code;
        $student->user_token = md5($verify_code);
        $student->api_token = md5(rand(10000000,99999999));
        $student->save();
        return response()->json([
            'message'=>'register successful'
        ],200);
    }

    public function login(Request $request)
    {
        $request->validate([
            "student_email" => "required|email|exists:students,email",
            "student_password" => ["required","min:8",new CheckPassword],
        ],[
            "student_email.exits"  => 'email or password is not work'
        ]);
//        return $request;
        $student = Student::where("email",$request->student_email)->first();
        return response()->json([
            'message'=>'login successful',
            'info' => $student,
            'api_token'=>$student->api_token
        ],200);
    }

    public function logout()
    {
    session()->forget('auth');
    return response()->json(['message'=>'logout successful']);
    }
}
