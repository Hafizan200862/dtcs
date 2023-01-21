<?php

namespace App\Http\Controllers\Dentist;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DentistCalendarController extends Controller
{

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

        return view('dashboards.dentists.calendar.index', compact('events'));
    }
}
