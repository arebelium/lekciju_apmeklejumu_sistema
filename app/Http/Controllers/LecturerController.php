<?php

namespace App\Http\Controllers;
use App\Course;
use App\Lecture;
use App\ScheduledLecture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LecturerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @ return void
     */
    public function __construct()
    {
        $this->middleware('auth:lecturer');
    }

    /**
     * Show the application dashboard.
     *
     * @ return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $lecturer = Auth::user();
            $courses = Course::pluck('name', 'id');
            $lectures = Lecture::pluck('name', 'id');
            return view('lecturer.dash')->with('lecturer', $lecturer)->with('courses', $courses)->with('lectures', $lectures);
        }else{
            return redirect('/');
        }
    }
    public function scheduleLecture(Request $request)
    {
        if(Auth::check()) {
            $scheduledLecture = new ScheduledLecture;
            $scheduledLecture->course_id = $request->input('course_id');
            $scheduledLecture->lecture_id = $request->input('lecture_id');
            $scheduledLecture->lecturer_id = Auth::user()->id;
            $scheduledLecture->date_time = $request->input('date_time');
            $scheduledLecture->save();
            return redirect()->back()->with('success','Lekcija veiksmīgi ieplānota!');
        }else{
            return redirect('/')->with('error','Neesat autorizējies!');
        }
    }

}
