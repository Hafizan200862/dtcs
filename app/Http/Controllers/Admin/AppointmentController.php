<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
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

        return view('dashboards.admins.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addAppointmentForm()
    {
        $dentists = User::all()->pluck('name', 'id');
        $patients = Patient::all()->pluck('name', 'id');

        return view('dashboards.admins.appointments.add', compact('dentists','patients'));
    }
}
