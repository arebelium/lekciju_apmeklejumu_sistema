<?php

namespace App\Http\Controllers;

use Acaronlex\LaravelCalendar\Calendar;
use App\Attendance;
use App\ScheduledLecture;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notifiable;
use stdClass;


class LecturesController extends Controller
{


    public function index()
    {
        if (Auth::guard('web')->check()) {
            $lectures = ScheduledLecture::where('course_id', Auth::user()->course_id)->orderBy('date', 'ASC')->get();
        } else if (Auth::guard('lecturer')->check()) {
            $lectures = ScheduledLecture::where('lecturer_id', Auth::user()->id)->orderBy('date', 'ASC')->get();
        } else {
            $lectures = ScheduledLecture::orderBy('date', 'ASC')->get();
        }

        $events = [];

        foreach ($lectures as $lecture) {
            $events[] = Calendar::event(
                $lecture->lecture->name . ' (' . $lecture->course->name . ')',
                false,
                $lecture->startDate(),
                $lecture->endDate(),
                $lecture->id
            );
        }

        $calendar = new Calendar();
        $calendar->addEvents($events)
            ->setOptions([
                'locale' => 'lv',
                'displayEventTime' => true,
                'displayEventEnd' => true,
                'selectable' => true,
                'initialView' => 'dayGridMonth'
            ]);

        $calendar->setCallbacks([
            'select' => 'function(selectionInfo){}',
            'eventClick' => 'function(event) {
                $("#lecture_id").val(event.event._def.publicId);
                $("#editModal").modal();
            }'
        ]);


        return view('lectures', compact('calendar'))->with('lectures', $lectures);
    }

    public function checkAttendance()
    {
        if (Auth::guard('web')->check()) {
            if (!Attendance::where('scheduled_lecture_id', request('lecture_id'))->where('student_id', Auth::user()->id)->exists()) {
                $sc_lecture = ScheduledLecture::find(request('lecture_id'));
                $now = Carbon::now();
                $start = Carbon::createFromTimeString($sc_lecture->start_at);
                $end = Carbon::createFromTimeString($sc_lecture->end_at)->addDay();

                if ($now->between($start, $end)) {
                    $student = Auth::user();
                    $attendance = new Attendance;
                    $attendance->scheduled_lecture_id = request('lecture_id');
                    $attendance->student_id = $student->id;
                    $attendance->save();
                    return redirect()->back()->with('success', 'Apmeklējums atzīmēts!');
                } else {
                    return redirect()->back()->with('error', "Lekcija šobrīd nenotiek!");
                }
            } else {
                return redirect()->back()->with('error', "Jūs jau esat atzīmējies!");
            }
        } else {
            return redirect()->back()->with('error', "Jūs neesat students!");
        }
    }

    public function deleteLecture($id)
    {
        DB::table('scheduled_lectures')->where('id', '=', $id)->delete();
        Session::flash('success', "Lekcija veiksmīgi dzēsta!");
        return back();
    }
}
?>