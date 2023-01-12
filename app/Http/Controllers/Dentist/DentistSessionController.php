<?php

namespace App\Http\Controllers\Dentist;

use App\Models\Session;
use App\Models\Patient;
use App\Models\Treatment;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SessionRequest;

class DentistSessionController extends Controller
{

    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSessionForm($id)
    {
        $addSession = Appointment::findOrFail($id);
        $patients = Patient::pluck('id', 'name');
        $treatments = Treatment::all()->pluck('name', 'id');
        // dd($patients);
        return view('dashboards.dentists.sessions.add', compact('addSession', 'patients', 'treatments'));

        // return view('dashboards.dentists.sessions.add',
        //     [
        //         'appointment' => Appointment::findOrFail($id),
        //         'patient' => Patient::pluck('name','id'),
        //     ]
        // );
    }

    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function StoreSession(Request $request)
    {
        Session::create($request->validate([
            'session_desc' => 'nullable',
            'patient_id' => 'nullable',
            'appointment_id' => 'nullable'
        ]));
        return redirect()->route('dentist.appointment.index')->with('success', 'Session have been succesfully inserted');
    }
}
