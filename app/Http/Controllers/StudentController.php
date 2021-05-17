<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{

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
            return back()->with('success', "Profils veiksmīgi atjaunots!");
        }else{
            return redirect('/');
        }
    }
}
?>