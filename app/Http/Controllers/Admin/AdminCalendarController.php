<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCalendarController extends Controller
{
    // index
    // function index()
    // {   
    //     return view('dashboards.admins.calendar.index');
    // }

    //index
    // function index()
    // {   
    //     $events = array();
    //     $appointments = Appointment::all();
    //     // return $appointments;
    //     foreach($appointments as $appointment)
    //     {
    //         $events[] = [
    //             'title' => $appointment->title,
    //             'start' => $appointment->start_date,
    //             'end' => $appointment->end_date,
    //         ];
    //     }
    //     // return $events;
    //     return view('dashboards.admins.calendar.index', ['events' => $events]);
    //     // return view('dashboards.admins.calendar.index');
    // }
    
    
    // function store(Request $request)
    // {
    //     return $request->all();
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];

        $appointments = Appointment::with(['dentist', 'patient'])->get();

        foreach ($appointments as $appointment) {
            if (!$appointment->start_time) {
                continue;
            }

            $events[] = [
                'title' => ' ('.$appointment->patient->name.') '. $appointment->title,
                'start' => $appointment->start_time,
                // 'url'   => route('admin.appointments.edit', $appointment->id),
            ];
        }

        return view('dashboards.admins.calendar.index', compact('events'));
    }
}
