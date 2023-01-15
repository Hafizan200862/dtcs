<?php

namespace App\Http\Controllers\Dentist;

use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AppointmentRequest;

class DentistAppointmentController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();

        return view('dashboards.dentists.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addAppointmentForm()
    {
        $dentists = User::all()
            ->where('role', '<', '2')
            ->pluck('name', 'id');
        $patients = Patient::all()->pluck('name', 'id');

        return view('dashboards.dentists.appointments.add', compact('dentists', 'patients'));
    }

    // add appointment
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addAppointment(AppointmentRequest $request)
    {
        $appointment = Appointment::create($request->validated());

        if ($appointment->save()) {
            return redirect()->back()->with('success', 'Appointment have been succesfully inserted');
        } else {
            return redirect()->back()->with('error', 'Appointment have been succesfully inserted');
        }
    }

    // public function appointmentSession($id)
    // {
    //     $appointmentSession = Appointment::findOrFail($id);
    //     $patients = Patient::pluck('id','name');
    //     // dd($patients);
    //     return view('dashboards.dentists.sessions.add',compact('appointmentSession', 'patients'));

    //     // return view('dashboards.dentists.sessions.add',
    //     //     [
    //     //         'appointment' => Appointment::findOrFail($id),
    //     //         'patient' => Patient::pluck('name','id'),
    //     //     ]
    //     // );
    // }
}
