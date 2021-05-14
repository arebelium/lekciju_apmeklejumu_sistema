<?php

namespace App\Http\Controllers;

use App\ScheduledLecture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LecturesController extends Controller
{


    public function index()
    {
        $lectures = ScheduledLecture::orderBy('date_time', 'ASC')->get();
        return view('lectures')->with('lectures', $lectures);
    }

    public function deleteLecture($id)
    {
        DB::table('scheduled_lectures')->where('id', '=', $id)->delete();
        Session::flash('success', "Lekcija veiksmīgi dzēsta!");
        return back();
    }
}
?>