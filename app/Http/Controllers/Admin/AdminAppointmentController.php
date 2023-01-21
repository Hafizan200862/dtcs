<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AppointmentRequest;

class AdminAppointmentController extends Controller
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
    public function add()
    {
        $dentists = User::all()
            ->where('role', '<', '2')
            ->pluck('name', 'id');
        $patients = Patient::all()->pluck('name', 'id');

        return view('dashboards.admins.appointments.add', compact('dentists', 'patients'));
    }

    // store appointment
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        $appointments = Appointment::create($request->validated());

        if ($appointments->save()) {
            return redirect()->back()->with('success', 'Appointment have been succesfully inserted');
        } else {
            return redirect()->back()->with('error', 'Appointment have been succesfully inserted');
        }
    }

    // edit appointment
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointments = Appointment::find($id);
        $dentists = User::all()
            ->where('role', '<', '2')
            ->pluck('name', 'id');
        $patients = Patient::all()->pluck('name', 'id');
        return view('dashboards.admins.appointments.edit', compact('appointments','dentists', 'patients'));
    }

    // update appointment
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, $id)
    {
        $appointments = Appointment::find($id);
        $appointments->update($request->validated());

        if ($appointments) {
            return redirect()->back()->with('success', 'Appointment have been succesfully updated');
        } else {
            return redirect()->back()->with('error', 'Appointment have been unsuccesfully updated');
        }
    }

    // delete appointment
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointments = Appointment::find($id);
        $appointments->delete();

        if ($appointments) {
            return redirect()->back()->with('success', 'Appointment have been succesfully deleted');
        } else {
            return redirect()->back()->with('error', 'Appointment have been unsuccesfully deleted');
        }
    }
    
}
