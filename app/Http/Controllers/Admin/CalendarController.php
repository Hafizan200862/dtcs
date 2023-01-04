<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    // index
    // function index()
    // {   
    //     return view('dashboards.admins.calendar.index');
    // }

    //index
    function index()
    {   
        // $events = array();
        // $appointments = Appointment::all();

        // foreach($appointments as $appointment)
        // {
        //     $events[] = [
        //         'title' => $appointment->title,
        //         'start' => $appointment->start_date,
        //         'end' => $appointment->end_date,
        //     ];
        // }
        // return $events;
        // return view('dashboards.admins.calendar.index', ['events' => $events]);
        return view('dashboards.admins.calendar.index');
    }
    
    
    // function store(Request $request)
    // {
    //     return $request->all();
    // }
}
