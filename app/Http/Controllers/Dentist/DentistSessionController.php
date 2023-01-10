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
        $patients = Patient::pluck('id','name');
        $treatments = Treatment::all()->pluck('name', 'id');
        // dd($patients);
        return view('dashboards.dentists.sessions.add',compact('addSession', 'patients', 'treatments'));

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
    public function addSession(SessionRequest $request)
    {
        $sessions = Session::create($request->validated() + [
            'note' => $request->notes
        ]);
        $sessions->treatments()->sync($request->input('treatments', []));

        // $request->validate([
        // 'appointment_id' => ['required', 'string', 'max:255'],
        // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        // 'phone' => ['required', 'string', 'min:8', 'max:11'],
        // ]);
        
        $sesions = new Session();
        // $sesions->apppointment_id = $request->patient_name;
        // $sesions->apppointment_id = $request->patient_phone;
        // $sesions->apppointment_id = $request->patient_gender;
        // $sesions->apppointment_id = $request->patient_address;
        $sesions->notes = $request->notes;

        // $sessions = DB::table('sessions')->insert([
        //         'appointment_id' => $request['name'],
        //         'notes' => $request['notes'],
        // ]);

        // return redirect()->route('admin.appointments.index')->with([
        //     'message' => 'successfully created !',
        //     'alert-type' => 'success'
        // ]);
        if ($sessions->save()) {
            return redirect()->route('dashboards.dentists.sessions.add')->with('success', 'Session have been succesfully inserted');
        } else {
            return redirect()->route('dashboards.dentists.sessions.add')->with('error', 'Session have been succesfully inserted');
        }
    }
}
