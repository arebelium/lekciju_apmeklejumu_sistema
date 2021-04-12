<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LecturerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:lecturer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $forms = DB::table('forms')->get();
    //     $lectures = DB::table('lectures')->get();
    //     $users = DB::table('users')->get();
    //     return view('lecturers/dash')->with('forms', $forms)->with('lectures', $lectures)->with('users', $users);
    // }
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            $lectures = DB::table('lectures')->where('lecturer', '=', $user->id)->get();

            return view('lecturer.dash')->with('user', $user)->with('lectures', $lectures);
        }else{
            return redirect('/');
        }
    }

}
