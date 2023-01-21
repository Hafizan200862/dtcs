<?php

namespace App\Http\Controllers\Dentist;

use App\Models\Teeth;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Session;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeethRequest;
use App\Http\Requests\Admin\SessionRequest;

class DentistSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function addSessionForm($id)
    // {
    //     $session = Appointment::findOrFail($id);
    //     $services = Service::all()->pluck('service_name', 'id');
    //     $teeth = Tooth::all()->pluck('teeth_no', 'id');

    //     return view('dashboards.dentists.sessions.add', compact('session', 'services', 'teeth'));
        
    // }

    public function add($id)
    {
        $appointments = Appointment::findOrFail($id);
        // $patients = Patient::all()->pluck('name', 'id');
        $services = Service::all()->pluck('service_name', 'id');
        
        return view('dashboards.dentists.sessions.add', compact('appointments','services'));
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SessionRequest $request, TeethRequest $teethRequest)
    {
        // dd($request->all());
        // insert to table session
        $session = Session::create($request->validated() 
        + ['session_note' => $request->session_note]
        );
        
     
        // $teeth = Teeth::updateOrCreate([
        //     'patient_id' => $session->patient->id
        // ], [
        //     'teeth_1' => $teethRequest->teeth_1,
        //     'teeth_2' => $teethRequest->teeth_2,
        //     'teeth_3' => $teethRequest->teeth_3,
        //     'teeth_4' => $teethRequest->teeth_4,
        //     'teeth_5' => $teethRequest->teeth_5,
        //     'teeth_6' => $teethRequest->teeth_6,
        //     'teeth_7' => $teethRequest->teeth_7,
        //     'teeth_8' => $teethRequest->teeth_8,
        //     'teeth_9' => $teethRequest->teeth_9,
        //     'teeth_10' => $teethRequest->teeth_10,
        //     'teeth_11' => $teethRequest->teeth_11,
        //     'teeth_12' => $teethRequest->teeth_12,
        //     'teeth_13' => $teethRequest->teeth_13,
        //     'teeth_14' => $teethRequest->teeth_14,
        //     'teeth_15' => $teethRequest->teeth_15,
        //     'teeth_16' => $teethRequest->teeth_16,
        //     'teeth_17' => $teethRequest->teeth_17,
        //     'teeth_18' => $teethRequest->teeth_18,
        //     'teeth_19' => $teethRequest->teeth_19,
        //     'teeth_20' => $teethRequest->teeth_20,
        //     'teeth_21' => $teethRequest->teeth_21,
        //     'teeth_22' => $teethRequest->teeth_22,
        //     'teeth_23' => $teethRequest->teeth_23,
        //     'teeth_24' => $teethRequest->teeth_24,
        //     'teeth_25' => $teethRequest->teeth_25,
        //     'teeth_26' => $teethRequest->teeth_26,
        //     'teeth_27' => $teethRequest->teeth_27,
        //     'teeth_28' => $teethRequest->teeth_28,
        //     'teeth_29' => $teethRequest->teeth_29,
        //     'teeth_30' => $teethRequest->teeth_30,
        //     'teeth_31' => $teethRequest->teeth_31,
        //     'teeth_32' => $teethRequest->teeth_32
        // ]);
        // 
        
        $teeth = new Teeth();
        $teeth->patient_id = $session->patient->id;
        $teeth->teeth_1 = $teethRequest->teeth_1;
        $teeth->teeth_2 = $teethRequest->teeth_2;
        $teeth->teeth_3 = $teethRequest->teeth_3;
        $teeth->teeth_4 = $teethRequest->teeth_4;
        $teeth->teeth_5 = $teethRequest->teeth_5;
        $teeth->teeth_6 = $teethRequest->teeth_6;
        $teeth->teeth_7 = $teethRequest->teeth_7;
        $teeth->teeth_8 = $teethRequest->teeth_8;
        $teeth->teeth_9 = $teethRequest->teeth_9;
        $teeth->teeth_10 = $teethRequest->teeth_10;
        $teeth->teeth_11 = $teethRequest->teeth_11;
        $teeth->teeth_12 = $teethRequest->teeth_12;
        $teeth->teeth_13 = $teethRequest->teeth_13;
        $teeth->teeth_14 = $teethRequest->teeth_14;
        $teeth->teeth_15 = $teethRequest->teeth_15;
        $teeth->teeth_16 = $teethRequest->teeth_16;
        $teeth->teeth_17 = $teethRequest->teeth_17;
        $teeth->teeth_18 = $teethRequest->teeth_18;
        $teeth->teeth_19 = $teethRequest->teeth_19;
        $teeth->teeth_20 = $teethRequest->teeth_20;
        $teeth->teeth_21 = $teethRequest->teeth_21;
        $teeth->teeth_22 = $teethRequest->teeth_22;
        $teeth->teeth_23 = $teethRequest->teeth_23;
        $teeth->teeth_24 = $teethRequest->teeth_24;
        $teeth->teeth_25 = $teethRequest->teeth_25;
        $teeth->teeth_26 = $teethRequest->teeth_26;
        $teeth->teeth_27 = $teethRequest->teeth_27;
        $teeth->teeth_28 = $teethRequest->teeth_28;
        $teeth->teeth_29 = $teethRequest->teeth_29;
        $teeth->teeth_30 = $teethRequest->teeth_30;
        $teeth->teeth_31 = $teethRequest->teeth_31;
        $teeth->teeth_32 = $teethRequest->teeth_32;
        $teeth->save();

        // $existingTeeth = Teeth::where('patient_id', '=', $session->patient->id)->first();
        // if (!$existingTeeth) {
        // } else {
        //     // Handle existing patient ID
        // }

        $services = $request->input('services', []);
        $teeth_no = $request->input('teeth_no', []);
        $service_remark = $request->input('service_remark', []);
        for($service=0; $service < count($services); $service++)
        {
            if($services[$service] != '')
            {
                $session->services()->attach($services[$service],['teeth_no' => $teeth_no[$service],'service_remark' => $service_remark[$service]]);
            }
        }

        // checking
        if ($session->save() && $teeth) {
            return redirect()->route('dentist.appointment.index')->with('success', 'Record Session have been succesfully inserted');
        } else {
            return redirect()->route('dentist.appointment.index')->with('error', 'Record Session have been unsuccesfully inserted');
        }
    }
}
