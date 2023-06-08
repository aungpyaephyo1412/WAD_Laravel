<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    //Index Home
    public function home(){
        return view('index');
    }
}
