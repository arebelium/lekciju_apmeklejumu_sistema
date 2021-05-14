<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Lecturer;
use App\Lecture;
use App\Course;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        if(Auth::check()) {
            return view('admin')
                ->with('students', Student::all())
                ->with('lecturers', Lecturer::all())
                ->with('lectures', Lecture::all())
                ->with('courses', Course::all());
        }else{
            return redirect('/');
        }
    }

    // Studenti

    public function updateStudent(Request $request, $id)
    {
        if(Auth::check()) {
            $student = Student::find($id);
            $student->name = $request->input('name');
            $student->last_name = $request->input('last_name');
            $student->email = $request->input('email');
            $student->save();
            Session::flash('message-student-updated', "Students veiksmīgi labots!");
            return back();
        }else{
            return redirect('/');
        }
    }
    public function deleteStudent($id)
    {
        if(Auth::check()) {
            DB::table('students')->where('id', '=', $id)->delete();
            Session::flash('message-student-deleted', "Students veiksmīgi dzēsts!");
            return back();
        }else{
            return redirect('/');
        }
    }

    public function addStudent(Request $request)
    {
        if(Auth::check()) {
            $student = new Student;
            $student->name = $request->input('name');
            $student->last_name = $request->input('last_name');
            $student->email = $request->input('email');
            $student->password = Hash::make($request->input('password'));
            $student->course_id = $request->input('course_id');
            $student->save();
            Session::flash('message-student-added', "Students veiksmīgi pievienots!");
            return back();
        }else{
            return redirect('/');
        }
    }

    // Lektori
    public function updateLecturer(Request $request, $id)
    {
        if(Auth::check()) {
            $lecturer = Lecturer::find($id);
            $lecturer->name = $request->input('name');
            $lecturer->last_name = $request->input('last_name');
            $lecturer->email = $request->input('email');
            $lecturer->save();
            Session::flash('message-lecturer-edited', "Lektors veiksmīgi labots!");
            return back();
        }else{
            return redirect('/');
        }
    }
    public function addLecturer(Request $request)
    {
        if(Auth::check()) {
        $lecturer = new Lecturer;
        $lecturer->name = $request->input('name');
        $lecturer->last_name = $request->input('last_name');
        $lecturer->email = $request->input('email');
        $lecturer->password = Hash::make($request->input('password'));
        $lecturer->save();
        Session::flash('message-lecturer-added', "Lektors veiksmīgi pievienots!");
        return back();
        }else{
            return redirect('/');
        }
    }
    public function deleteLecturer($id)
    {
        if(Auth::check()) {
            DB::table('lecturers')->where('id', '=', $id)->delete();
            Session::flash('message-lecturer-deleted', "Lektors veiksmīgi dzēsts!");
            return back();
        }else{
            return redirect('/');
        }
    }

    // Lekcijas

    public function updateLecture(Request $request, $id)
    {
        if(Auth::check()) {
            $lecture = Lecture::find($id);
            $lecture->name = $request->input('name');
            $lecture->save();
            Session::flash('message-lecture-edited', "Lekcija veiksmīgi labota!");
            return back();
        }else{
            return redirect('/');
        }
    }
    public function addLecture(Request $request)
    {
        if(Auth::check()) {
            $lecture = new Lecture;
            $lecture->name = $request->input('name');
            $lecture->save();
            Session::flash('message-lecture-added', "Lekcija veiksmīgi pievienota!");
            return back();
        }else{
            return redirect('/');
        }
    }
    public function deleteLecture($id)
    {
        if(Auth::check()) {
            DB::table('lectures')->where('id', '=', $id)->delete();
            Session::flash('message-lecture-deleted', "Lekcija veiksmīgi dzēsta!");
            return back();
        }else{
            return redirect('/');
        }
    }

    // Kursi

    public function updateCourse(Request $request, $id)
    {
        if(Auth::check()) {
            $course = Course::find($id);
            $course->name = $request->input('name');
            $course->save();
            Session::flash('message-course-edited', "Kurss veiksmīgi labots!");
            return back();
        }else{
            return redirect('/');
        }
    }
    public function addCourse(Request $request)
    {
        if(Auth::check()) {
            $course = new Course;
            $course->name = $request->input('name');
            $course->save();
            Session::flash('message-course-added', "Kurss veiksmīgi pievienots!");
            return back();
        }else{
            return redirect('/');
        }
    }
    public function deleteCourse($id)
    {
        if(Auth::check()) {
            DB::table('courses')->where('id', '=', $id)->delete();
            Session::flash('message-course-deleted', "Kurss veiksmīgi dzēsts!");
            return back();
        }else{
            return redirect('/');
        }
    }
}
