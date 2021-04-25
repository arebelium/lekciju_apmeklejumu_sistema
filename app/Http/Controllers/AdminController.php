<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\lecturer;
use App\lecture;
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
            $users = DB::table('users')->get();
            $lecturers = DB::table('lecturers')->get();
            return view('admin')->with('users', $users)->with('lecturers', $lecturers);
        }else{
            return redirect('/');
        }
    }
    public function updateUser(Request $request, $id)
    {
        if(Auth::check()) {
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->save();
            Session::flash('message-user-updated', "Lietotājs veiksmīgi labots!");
            return back();
        }else{
            return redirect('/');
        }
    }
    public function deleteUser($id)
    {
        if(Auth::check()) {
            DB::table('users')->where('id', '=', $id)->delete();
            Session::flash('message-user-deleted', "Lietotājs veiksmīgi dzēsts!");
            return back();
        }else{
            return redirect('/');
        }
    }
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

    public function updateLecture(Request $request, $id)
    {
        if(Auth::check()) {
            $lecture = Lecture::find($id);
            $lecture->name = $request->input('name');
            $lecture->lecturer = $request->input('lecturer');
            $lecture->course_id = $request->input('course_id');
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
            $lecture->lecturer = $request->input('lecturer');
            $lecture->course_id = $request->input('course_id');
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
