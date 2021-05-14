<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::check()){
            $student = Auth::user();
            return view('students.dash')->with('student', $student);
        }else{
            return redirect('/');
        }
    }

    public function edit()
    {
        if(Auth::check()) {
            $student = Auth::user();
            return view('students.edit', compact('student'));
        }else{
            return redirect('/');
        }
    }


    public function update()
    {
        if(Auth::check()) {
            $student = Auth::user();
            $student->name = request('name');
            $student->last_name = request('last_name');
            $student->email = request('email');

            $student->save();
            Session::flash('message-profile-edited', "Profils veiksmīgi atjaunots!");
            return back();
        }else{
            return redirect('/');
        }
    }
}
?>