<?php

namespace App\Http\Controllers\Dentist;

use App\Models\Patient;
use App\Models\Session;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teeth;

class DentistRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $sessions = Session::where('patient_id', $id)->get();
        $patients = Patient::findOrFail($id);
        
        return view('dashboards.dentists.patients.records.index', compact('sessions','patients'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session, $id)
    {
        $sessions = Session::with('services')->find($id);

        return view('dashboards.dentists.patients.records.show', compact('sessions'));
    }

    // public function show($id)
    // {
    //     $sessions = Session::findOrFail($id);
    //     // $patients = Patient::find();
    //     $services = Service::
    //     return view('dashboards.dentists.patients.records.show', compact('sessions'));
    // }
}
