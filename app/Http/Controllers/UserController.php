<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            $lectures = DB::table('lectures')->where('lecturer', '=', $user->id)->get();

            return view('users.dash')->with('user', $user)->with('lectures', $lectures);
        }else{
            return redirect('/');
        }
    }

    public function edit()
    {
        if(Auth::check()) {
            $user = Auth::user();
            return view('users.edit', compact('user'));
        }else{
            return redirect('/');
        }
    }


    public function update()
    {
        if(Auth::check()) {
            $user = Auth::user();
            $user->name = request('name');
            $user->last_name = request('last_name');
            $user->email = request('email');

            $user->save();
            Session::flash('message-profile-edited', "Profils veiksmīgi atjaunots!");
            return back();
        }else{
            return redirect('/');
        }
    }
}
?>