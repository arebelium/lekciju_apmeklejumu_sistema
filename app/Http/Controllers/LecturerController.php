<?php

namespace App\Http\Controllers;
use App\User;
use App\Lecture;
use App\Lecturers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\ScheduledLecture;

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
    // public function index()
    // {
    //     $forms = DB::table('forms')->get();
    //     $lectures = DB::table('lectures')->get();
    //     $lecturers = DB::table('lecturers')->get();
    //     return view('lecturer/dash')->with('lectures', $lectures)->with('lecturers', $lecturers);
    // }
    public function index()
    {
        if(Auth::check()){
            $lecturer = Auth::user();
            $lectures = DB::table('lectures')->where('lecturer', '=', $lecturer->id)->get();
            return view('lecturer.dash')->with('lecturer', $lecturer)->with('lectures', $lectures);
        }else{
            return redirect('/');
        }
    }
    public function scheduleLecture(Request $request)
    {
        if(Auth::check()) {
        $scheduledLecture = new ScheduledLecture;
        $scheduledLecture->lecture_id = $request->input('lecture_id');
        $scheduledLecture->lecturer_id = $request->input('lecturer_id');
        $scheduledLecture->date = $request->input('date');
        $scheduledLecture->time = $request->input('time');
        $scheduledLecture->save();
        Session::flash('message-lecture-scheduled', "Lekcija veiksmīgi ieplānota!");
        return back();
        }else{
            return redirect('/');
        }
    }

}
