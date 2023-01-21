<?php

namespace App\Http\Controllers\Receptionist;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceptionistAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();

        return view('dashboards.receptionists.appointments.index', compact('appointments'));
    }
}
