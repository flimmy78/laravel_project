<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDemoController extends Controller
{
    public function index(){
    	return view('student.index');
    }
}
