<?php

namespace App\Http\Controllers\Dentist;

use App\Models\Tooth;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Session;
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
        // $addSession = Appointment::findOrFail($id);
        // $patients = Patient::pluck('id', 'name');
        // $services = Service::all()->pluck('service_name', 'id');
        // $teeth = Tooth::all()->pluck('teeth_no', 'id');
        // return view('dashboards.dentists.sessions.add', compact('addSession', 'patients', 'services','teeth'));

        $session = Appointment::findOrFail($id);
        $services = Service::all()->pluck('service_name', 'id');
        $teeth = Tooth::all()->pluck('teeth_no', 'id');
        // $services = $session->services;
        // $teeth = $session->teeth;
        return view('dashboards.dentists.sessions.add', compact('session', 'services', 'teeth'));
        
    }

    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function StoreSession(SessionRequest $request)
    {
        
        $session = Session::create($request->validated() 
        + ['session_note' => $request->session_note]
        );
        
        $session->services()->attach($request->services);
        $session->teeth()->attach($request->teeth);
        

        
        if ($session->save()) {
            return redirect()->route('dentist.appointment.index')->with('success', 'Record Session have been succesfully inserted');
        } else {
            return redirect()->route('dentist.appointment.index')->with('error', 'Record Session have been succesfully inserted');
        }

    }
}
