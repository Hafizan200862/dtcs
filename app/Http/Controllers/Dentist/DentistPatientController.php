<?php

namespace App\Http\Controllers\Dentist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DentistPatientController extends Controller
{
    // index
    function index()
    {
        $data = array(
            'list'=> DB::table('patients')->get()
        );
        return view('dashboards.dentists.patients.index', $data);

    }

    // register patient form
    function addPatientForm()
    {
        return view('dashboards.dentists.patients.add');
    }

    // register patient
    function addPatient(Request $request)
    {
        // return $request->input();
        $request->validate([
            'ic'=>'required|min:12|max:12|unique:patients',
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|min:8|max:11',
            'address'=>'required',
            'gender'=>'required'
        ]);

        $query = DB::table('patients')->insert([
            'ic'=>$request->input('ic'),
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address'),
            'gender'=>$request->input('gender')
        ]);

        if($query)
        {
            return back()->with('success', 'Data have been succesfully inserted');
        }
        else
        {
            return back()->with('error', 'Data cannot be inserted');
        }
    }
}
