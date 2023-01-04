<?php

namespace App\Http\Controllers\Dentist;

use App\Models\Patient; 
use App\Models\Appointment; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DentistSessionController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $sessionAdd = DB::table('patients')->where('id',$id)->get();

        // return view('dashboards.dentists.sessions.add',compact('sessionAdd'));
        return view('dashboards.dentists.sessions.show');
    }

    public function update()
    {
        
    }
}
