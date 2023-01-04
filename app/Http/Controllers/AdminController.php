<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    //
    function index()
    {
        return view('dashboards.admins.index');
    }

    // list dentist
    function dentist()
    {
        $data = array(
            'list'=> DB::table('users')
                        ->where('role', '0')
                        ->get() 
        );

        // $data = array(
        //     'list'=> DB::table('users')->get() 
        // );

        return view('dashboards.admins.listDentist', $data);
    }

    // list patient
    function patient()
    {
        $data = array(
            'list'=> DB::table('patients')->get()
        );
        return view('dashboards.admins.listPatient', $data);
    }

    // function appointment()
    // {
    //     return view('dashboards.admins.appointment');
    // }

    // function dentist()
    // {
    //     return view('dashboards.admins.dentist');
    // }
}
