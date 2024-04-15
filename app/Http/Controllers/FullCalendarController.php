<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // Add Event Model
use Illuminate\Support\Facades\Auth;

class FullCalendarController extends Controller
{
    public function getEvent()
    {
        if (request()->ajax()) {
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            $events = Event::whereDate('start', '>=', $start)->whereDate('end', '<=', $end)
                ->get(['id', 'title', 'start', 'end']);
            return response()->json($events);
        }
        return view('fullcalendar');
    }

    public function createEvent(Request $request)
    {
        if (!in_array(Auth::user()->usertype, ['admin', 'super_admin'])) {
            abort(403, 'Only administrators can create events.');
        }
    
        $data = $request->except('_token');
        $events = Event::insert($data);
        return response()->json($events);
    }
    
    public function deleteEvent(Request $request)
    {
        if (!in_array(Auth::user()->usertype, ['admin', 'super_admin'])) {
            abort(403, 'Only administrators can delete events.');
        }
    
        $event = Event::find($request->id);
        return $event->delete();
    }    
}