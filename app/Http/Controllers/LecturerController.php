<?php

namespace App\Http\Controllers;
use App\Attendance;
use App\Course;
use App\Lecture;
use App\ScheduledLecture;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
            $scheduled_lectures_ids = ScheduledLecture::where('lecturer_id', $lecturer->id)->pluck('id');
            $today_attendance = Attendance::whereDate('created_at', Carbon::today())
                ->whereIn('scheduled_lecture_id', $scheduled_lectures_ids)
                ->select('scheduled_lecture_id', 'student_id')
                ->groupBy('scheduled_lecture_id', 'student_id')->get();

            return view('lecturer.dash')
                ->with('lecturer', $lecturer)
                ->with('courses', $courses)
                ->with('lectures', $lectures)
                ->with('today_attendance', $today_attendance);
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
            $scheduledLecture->date = $request->input('date');
            $scheduledLecture->start_at = $request->input('start_at');
            $scheduledLecture->end_at = $request->input('end_at');
            $scheduledLecture->save();
            return redirect('/lectures')->with('success','Lekcija veiksmīgi ieplānota!');
        }else{
            return redirect('/')->with('error','Neesat autorizējies!');
        }
    }

}
